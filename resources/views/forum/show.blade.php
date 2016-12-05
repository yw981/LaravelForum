@extends('app')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" alt="64x64" src="{{ $discussion->user->avatar }}" style="width: 64px; height: 64px;">
                    </a>
                </div>
                <div class="media-body">
                    @if(Auth::check() && Auth::user()->id == $discussion->user_id)
                    <h1>
                        <a class="btn btn-lg btn-primary pull-right" href="{{ url('discussion/'.$discussion->id.'/edit') }}" role="button">Edit this »</a>
                    </h1>
                    @endif
                    <h4 class="media-heading">{{ $discussion->title }}</h4>
                    {{ $discussion->user->name }}
                </div>
            </div>

        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                <div class="blog-post">
                    {!! $html !!}
                </div>
                <hr>
                @foreach($discussion->comments as $comment)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                              <img class="media-object img-circle" alt="64x64" src="{{ $comment->user->avatar }}" style="width: 64px; height: 64px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $comment->user->name }}</h4>
                            {{ $comment->body }}
                        </div>
                    </div>
                @endforeach
                <hr>
                @if(Auth::check())
                {!! Form::open(['url'=>'/comment']) !!}
                    {!! Form::hidden('discussion_id',$discussion->id ) !!}
                    <!--- Body Field --->
                    <div class="form-group">
                        {!! Form::label('body', 'Body:') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                    </div>
                    <div>
                        {!! Form::submit('Comment',['class'=>'btn btn-success pull-right']) !!}
                    </div>
                {!! Form::close() !!}
                @else
                    <a href="/user/login" class="btn btn-block btn-success">Login to comment</a>
                @endif
            </div>
        </div>
    </div>
@stop