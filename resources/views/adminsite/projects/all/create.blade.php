@extends('layouts.app')

@section('content')
    <h4>Create a new Project</h4>

    {!! Form::open(['action' => 'ProjectController@store' , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::text('description', '', ['class' => 'form-control', 'placeholder'=>'Description'])}}
        </div>
        <div class="form-group">
            {{Form::file('image')}}
        </div>

        <hr>
        <div class="form-group">
            {{Form::label('ui_title1', 'UI Title')}}
            {{Form::text('ui_title1', '', ['class' => 'form-control', 'placeholder'=>'UI Title'])}}
        </div>
        <div class="form-group">
            {{Form::file('uiimage1')}}
        </div>

        <hr>
        <div class="form-group">
            {{Form::label('ui_title2', 'UI Title')}}
            {{Form::text('ui_title2', '', ['class' => 'form-control', 'placeholder'=>'UI Title'])}}
        </div>
        <div class="form-group">
            {{Form::file('uiimage2')}}
        </div>

        <hr>
        <div class="form-group">
            {{Form::label('ui_title3', 'UI Title')}}
            {{Form::text('ui_title3', '', ['class' => 'form-control', 'placeholder'=>'UI Title'])}}
        </div>
        <div class="form-group">
            {{Form::file('uiimage3')}}
        </div>

        <hr>
        <div class="form-group">
            {{Form::label('ui_title4', 'UI Title')}}
            {{Form::text('ui_title4', '', ['class' => 'form-control', 'placeholder'=>'UI Title'])}}
        </div>
        <div class="form-group">
            {{Form::file('uiimage4')}}
        </div>

        <hr>
        <div class="form-group">
            {{Form::label('ui_title5', 'UI Title')}}
            {{Form::text('ui_title5', '', ['class' => 'form-control', 'placeholder'=>'UI Title'])}}
        </div>
        <div class="form-group">
            {{Form::file('uiimage5')}}
        </div>

       
            {{Form::submit('Submit' , ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection