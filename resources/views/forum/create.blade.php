@extends('app')
@section('content')
    <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2" role="main">
                {!! Form::open(['url'=>'discussion']) !!}
                    <!--- Title Field --->
                    <div class="form-group">
                        {!! Form::label('Title', 'Title:') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    <!--- Body Field --->
                    <div class="form-group">
                        {!! Form::label('body', 'Body:') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                    </div>
                    <div>
                        {!! Form::submit('Submit',['class'=>'btn btn-primary pull-right']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
          </div>
    </div>
@stop