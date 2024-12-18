<?php 
namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonControleur extends Controller 

{

    function index() {
        return view('index');
    }

    function photos(){
        $photos = DB::select("SELECT * FROM photos");
        return view('photos',["photos" => $photos]);
    }

    function albums(){
        $albums = DB::select("SELECT * FROM albums");
        return view('albums', ["albums" => $albums]);
    }

    function detailsAlbum(Request $request, $id) {
        $albums = DB::select("SELECT * FROM albums where id=?", [$id]);
            if(count($albums) ==0)
            abort(404);
            $album =$albums[0];

            if($request->input('trie')==null)
            $photosAlbum = DB::select("SELECT photos.* FROM photos JOIN albums ON album_id=albums.id WHERE albums.id=?", [$id]);
            else {
            $photosAlbum = Photo::where('album_id', $id)->orderBy($request->input('trie'))->get();
            }

            $tagPhoto =  [];
            
            foreach($photosAlbum as $p)
            $tagPhoto[$p->id] = DB::select("SELECT tags.* FROM tags JOIN possede_tag ON tags.id=possede_tag.tag_id WHERE photo_id=?", [$p->id]);
            
            

            return view('detailsAlbum',
            [
                "album" => $album,
                'photo'=>$photosAlbum,
                'tag'=>$tagPhoto,
            ]);
    }

    function tag($tag){
        $tags = DB::select("SELECT * FROM tags where nom=?",[$tag]);
        if(count($tags)==0)
        abort(404);
        $tag=$tags[0];

        $photosTag = DB::select("SELECT photos.* FROM photos JOIN possede_tag ON photos.id = possede_tag.photo_id  WHERE tag_id=?", [$tag->id]);
        return view('tag',
        [
            "tag" => $tag,
            'photo'=>$photosTag
        ]);

    }
 
    function register(){
        return view("auth/register");
    }

    function login(){
        return view("auth/login");
    }

    function userAlbums($id) {
        $albums = DB::select("SELECT * FROM albums where user_id=?", [$id]);
      

        return view('userAlbums',
        [
            "albums" => $albums,
        ]);


    }

    function creerAlbum() {
        return view("creerAlbum");
    }

    function saveAlbum(Request $request) {
        $request->validate([ //va verifier chaque regle suvante, si c pas le cas ca renvoie a la page d'avant
            'titre'=>"required",
            'creation'=>"required|numeric",
            'url'=>"required|mimes:jpg,png,bmp",
            'titrePhoto'=>"required",
            'note'=>"required|numeric|min:1|max:5",
        ]);

         //ca marche : le film s'enregistre :

         $albums= new Album();
         $album->titre = $request->input(key:'titre');
         $album->creation = $request->input(key:'creation');
         $album->save();

        $photos=new Photo();
        $photos->titre = $request->input(key:'titrePhoto');
        $photos->url = $request->input(key:'url');
        $photos->note = $request->input(key:'note');
        $photos->save();

        return redirect(route("userAlbums"));
    }
}