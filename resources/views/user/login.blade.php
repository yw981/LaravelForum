@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                @if($errors->any())
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                @if(Session::has('user_login_failed'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('user_login_failed') }}
                </div>
                @endif
                @if(Session::has('email_confirm'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('email_confirm') }}
                </div>
                @endif
                {!! Form::open(['url'=>'/user/login','method' => 'post']) !!}
                <!--- Email Field --->
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>
                <!---  Field --->
                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Login',['class'=>'btn btn-success form-control']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop