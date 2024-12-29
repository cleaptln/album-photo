<?php 
namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


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

        $albums = Album::where('user_id', Auth::id()) 
        ->with(['photos' => function ($query) {
            $query->take(4);  // 4 photos par album
        }])->get();

        return view('userAlbums', compact('albums'));


    }

    function creerAlbum() {
        return view("creerAlbum");
    }

    function saveAlbum(Request $request) {
        $request->validate([ //va verifier chaque regle suvante, si c pas le cas ca renvoie a la page d'avant
            'titre'=>"required",
            'creation'=>"required|date",
            'img'=>"required|mimes:jpg,png,bmp|max:2048",
            'titrePhoto'=>"required",
            'note'=>"required|numeric|min:1|max:5",
        ]);


        $hashname=$request->file("img")->hashName();//on cree un nom pour l'image telechargee
        $request->file("img")->storeAs("public/images",$hashname); 
         //ca marche : l'album s'enregistre :

         $album= new Album();
         $album->titre = $request->input(key:'titre');
         $album->creation = $request->input(key:'creation');
         $album->user_id=Auth::id();
         $album->save();
        $photos=new Photo();
        $photos->titre = $request->input(key:'titrePhoto');
        $photos->image = env("APP_URL")."/storage/images/$hashname"; 
        $photos->note = $request->input(key:'note');
        $photos->album_id = $album->id;
        $photos->save();

        return redirect(route("userAlbums", ['id' => $album->id]))->with('success', 'Album et photo enregistrés avec succès.');    
    }

    public function deleteAlbum($id) {
        $album = Album::findOrFail($id);
    
        // Supprimer les photos associées à l'album
        foreach ($album->photos as $photo) {
            // Supprimer le fichier image de la photo
            if (Storage::exists('public/images/' . basename($photo->image))) {
                Storage::delete('public/images/' . basename($photo->image));
            }
            $photo->delete();
        }
    
        // Supprimer l'album
        $album->delete();
    
        return redirect()->route("userAlbums",['id'=>Auth::id])->with('success', 'Album et toutes ses photos ont été supprimés.');
    }
        

    public function deletePhoto($id) {
        $photo = Photo::findOrFail($id);

        if (Storage::exists('public/images/' . basename($photo->image))) {
            Storage::delete('public/images/' . basename($photo->image));
        }
    
        $photo->delete();
    
        return redirect()->back()->with('success', 'Photo supprimée avec succès.');
    }




}