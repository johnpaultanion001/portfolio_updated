@extends('layouts.app')

@section('content')

    {!! Form::open(['action' => 'msgsController@store' , 'method' => 'POST' ])!!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder'=>'Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('subject', 'Subject')}}
            {{Form::text('subject', '', ['class' => 'form-control', 'placeholder'=>'Subject'])}}
        </div>

        
        <div class="form-group">
            {{Form::label('msg', 'msg')}}
            {{Form::textarea('msg', '', ['class' => 'form-control', 'placeholder'=>'Body']) }}
            
            
        </div>
       
            {{Form::submit('Submit' , ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection