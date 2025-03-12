<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class ActorController extends Controller{

    public function listactors(){
        $title = "Todos los actores";
        $actors = DB::table('actors')->get();

        return view('actors.list', ["actors" => $actors, "title" => $title]);
    }

}

?>