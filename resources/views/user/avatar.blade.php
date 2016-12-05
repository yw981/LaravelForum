@extends('app')
@section('content')
    <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3" role="main">
                <div class="text-center">
                    <img src="{{ Auth::user()->avatar }}" width="120" alt="avatar" class="img-circle" />

                </div>
                {!! Form::open(['url'=>'/avatar','files'=>true]) !!}
                {!! Form::file('avatar') !!}
                <div>
                    {!! Form::submit('Commit',['class'=>'btn btn-primary pull-right']) !!}
                </div>

                {!! Form::close() !!}
            </div>
          </div>
    </div>
@stop