<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth',[
            'only'=>[
                'create','store','edit','update'
            ]
        ]);
    }

    public function index(){
        $discussions = Discussion::all();
        //$d = Discussion::find(1);
        //dd($d->user);
        return view('forum.index',compact('discussions'));
    }

    public function show($id){
        //dd($id);
        $discussion = Discussion::findOrFail($id);
        return view('forum.show',compact('discussion'));
    }

    public function create(){
        return view('forum.create');
    }

    public function store(Requests\PostCreateRequest $request)
    {
        $data = [
            'user_id'=>\Auth::user()->id,
            'last_user_id'=>\Auth::user()->id,
        ];
        $discussion = Discussion::create(array_merge($request->all(),$data));
        return redirect('discussion/'.$discussion->id);
    }
}
