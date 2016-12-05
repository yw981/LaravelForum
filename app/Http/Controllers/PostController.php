<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Markdown\Markdown;

use App\Http\Requests;

class PostController extends Controller
{
    /**
     * PostController constructor.
     * @var Markdown $parser
     */
    public function __construct(Markdown $parser)
    {
        $this->middleware('auth',[
            'only'=>[
                'create','store','edit','update'
            ]
        ]);
        $this->parser = $parser;
    }

    /**
     * Markdown Parser
     */
    protected $parser;

    public function index(){
        $discussions = Discussion::all();
        //$d = Discussion::find(1);
        //dd($d->user);
        return view('forum.index',compact('discussions'));
    }

    public function show($id){
        //dd($id);
        $discussion = Discussion::findOrFail($id);
        $html = $this->parser->markdown($discussion->body);
        return view('forum.show',compact('discussion','html'));
    }

    public function edit($id){
        //dd($id);
        $discussion = Discussion::findOrFail($id);
        if(\Auth::user()->id !== $discussion->user_id){
            return redirect('');
        }
        return view('forum.edit',compact('discussion'));
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

    public function update(Requests\PostCreateRequest $request,$id)
    {
        $discussion = Discussion::findOrFail($id);
        if(\Auth::user()->id !== $discussion->user_id){
            return redirect('');
        }
        $discussion->update($request->all());
        // redirect('')函数的参数中如果使用/无法跳转
        return redirect()->action('PostController@show',['id'=>$discussion->id]);
    }
}
