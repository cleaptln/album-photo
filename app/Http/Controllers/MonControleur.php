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
            return view('detailsAlbum',
            [
                "album" => $album,
                'photo'=>$photosAlbum

            ]);
    }

}