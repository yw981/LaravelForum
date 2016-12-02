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
            <!-- Form 表单默认方法就是POST -->
            {!! Form::open(['url'=>'/user/register','method' => 'post']) !!}
                <!--- Name Field --->
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
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
                <!---  Field --->
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Password_confirmation:') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Submit',['class'=>'btn btn-primary form-control']) !!}
            {!! Form::close() !!}
        </div>        
      </div>        
</div>        
@stop