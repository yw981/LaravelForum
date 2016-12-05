<?php

namespace App\Http\Controllers;

use Image;
use Mail;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function register(){
        return view('user.register');
    }

    public function store(Requests\UserRegisterRequest $request){
        //dd($request->all());
        $data = [
            'avatar'=>'/images/default_avatar.png',
            'confirm_code'=>str_random(32),
        ];
        $user = User::create(array_merge($request->all(),$data));
        $subject = 'Confirm your Email';
        $view = 'email.register';
        $this->sendTo($user,$subject,$view,$data);
        return redirect('/');
    }

    public function confirmEmail($confirm_code)
    {
        $user = User::where('confirm_code',$confirm_code)->first();
        if(is_null($user)){
            return redirect('/');
        }
        $user->is_confirmed=1;
        $user->confirm_code = str_random(32);
        $user->save();

        \Session::flash('email_confirm','邮箱验证成功');
        return redirect('user/login');
    }

    private function sendTo($user, $subject, $view, $data)
    {
        Mail::queue($view, $data, function ($m) use ($user,$subject) {
            $m->from('hello@app.com', 'Your Application');
            $m->to($user->email, $user->name)->subject($subject);
        });
    }

    public function login(){
        return view('user.login');
    }

    public function avatar(){
        return view('user.avatar');
    }

    public function changeAvatar(Request $request){
        $file = $request->file('avatar');
        //dd($file);
        $destinationPath = 'upload/';
        $user = \Auth::user();
        $filename = $user->id.'_'.substr(time(),-6,6).'_'.$file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        Image::make($destinationPath.$filename)->fit(200)->save();
        $user->avatar = '/'.$destinationPath.$filename;
        $user->save();
        return redirect('/user/avatar');
    }

    public function signIn(Requests\UserLoginRequest $request){
        if(\Auth::attempt([
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'is_confirmed'=>1,
        ])){
            //dd('login suc');
            return redirect('/');
        }
        \Session::flash('user_login_failed','用户名密码错误或没有验证');
        return redirect('/user/login')->withInput();
    }

    public function logout(){
        \Auth::logout();
        return redirect('/');
    }
}
