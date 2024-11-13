<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonControleur extends Controller 

{

    function index() {
        return view('index');
    }


}