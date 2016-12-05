@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" role="main">
                {!! Form::model($discussion,['method'=>'PATCH','url'=>'discussion/'.$discussion->id]) !!}
                @include('forum.form')
                <div>
                    {!! Form::submit('Submit Edit',['class'=>'btn btn-primary pull-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop