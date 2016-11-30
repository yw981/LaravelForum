<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    //
    public function index(){
        $discussions = Discussion::all();
        //$d = Discussion::find(1);
        //dd($d->user);
        return view('forum.index',compact('discussions'));
    }
}
