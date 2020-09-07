@extends('layouts.app')

@section('content')
    <h1>Edit Project</h1>

    {!! Form::open(['action' => ['ProjectController@update', $project->id], 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('Description', 'Title')}}
            {{Form::text('title', $project->title, ['class' => 'form-control', 'placeholder'=>'Title'])}}
        </div>
        
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::text('description', $project->description, ['class' => 'form-control', 'placeholder'=>'Description'])}}
        </div>
     

        <div class="form-group">
            {{Form::file('image')}} {{Form::label('Current Image Saved: ', $project->image)}}
        </div>
        <hr>
        <div class="form-group">
            {{Form::label('ui_title1', 'UI Title')}}
            {{Form::text('ui_title1', $project->ui_title1, ['class' => 'form-control', 'placeholder'=>'ui_title'])}}
        </div>
     

        <div class="form-group">
            {{Form::file('uiimage1')}} {{Form::label('Current Image Saved: ', $project->uiimage1)}}
        </div>
        <hr>
        <div class="form-group">
            {{Form::label('ui_title2', 'UI Title')}}
            {{Form::text('ui_title2', $project->ui_title2, ['class' => 'form-control', 'placeholder'=>'ui_title'])}}
        </div>
     

        <div class="form-group">
            {{Form::file('uiimage2')}} {{Form::label('Current Image Saved: ', $project->uiimage2)}}
        </div>
        <hr>
        <div class="form-group">
            {{Form::label('ui_title3', 'UI Title')}}
            {{Form::text('ui_title3', $project->ui_title3, ['class' => 'form-control', 'placeholder'=>'ui_title'])}}
        </div>
     

        <div class="form-group">
            {{Form::file('uiimage3')}} {{Form::label('Current Image Saved: ', $project->uiimage3)}}
        </div>
        <hr>
        <div class="form-group">
            {{Form::label('ui_title4', 'UI Title')}}
            {{Form::text('ui_title4', $project->ui_title4, ['class' => 'form-control', 'placeholder'=>'ui_title'])}}
        </div>
     

        <div class="form-group">
            {{Form::file('uiimage4')}} {{Form::label('Current Image Saved: ', $project->uiimage4)}}
        </div>
        <hr>
        <div class="form-group">
            {{Form::label('ui_title5', 'UI Title')}}
            {{Form::text('ui_title5', $project->ui_title5, ['class' => 'form-control', 'placeholder'=>'ui_title'])}}
        </div>
     

        <div class="form-group">
            {{Form::file('uiimage5')}} {{Form::label('Current Image Saved: ', $project->uiimage5)}}
        </div>
        
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit' , ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection