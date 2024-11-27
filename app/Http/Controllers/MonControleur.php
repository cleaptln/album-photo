<?php 
namespace App\Http\Controllers;

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

    function detailsAlbum($id) {
        $albums = DB::select("SELECT * FROM albums where id=?", [$id]);
            if(count($albums) ==0)
            abort(404);
            $album =$albums[0];

            $photosAlbum = DB::select("SELECT photos.* FROM photos JOIN albums ON album_id=albums.id WHERE albums.id=?", [$id]);
            
            $tagPhoto =  [];
            
            foreach($photosAlbum as $p)
            $tagPhoto[$p->id] = DB::select("SELECT tags.* FROM tags JOIN possede_tag ON tags.id=possede_tag.tag_id WHERE photo_id=?", [$p->id]);
            
            $photosTrie = DB::select("SELECT photos.* FROM photos JOIN albums ON album_id=albums.id WHERE albums.id=? ORDER BY photos.note DESC", [$id]);

            return view('detailsAlbum',
            [
                "album" => $album,
                'photo'=>$photosAlbum,
                'tag'=>$tagPhoto,
                'photosTrie'=>$photosTrie
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
 

}