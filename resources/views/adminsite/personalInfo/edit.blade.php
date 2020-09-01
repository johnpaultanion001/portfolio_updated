    
@extends('layouts.app')

@section('content')
    <h5>Edit Personal Information</h5>

    <a href="/adminsite/personalInfo/show" class="btn btn-primary"> Go Back </a>


    @foreach($personal_infos as $personal_info)

    {!!Form::open(['action'=>['personalController@destroy', $personal_info->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Set To Default' , ['class' => 'btn btn-primary'])}}

    {!!Form::close()!!}

    
    {!! Form::open(['action' => ['personalController@update', $personal_info->id], 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
            
            <div class="form-group">
                {{Form::label('IntroGreetings', 'Intro Greetings')}}
                {{Form::text('IntroGreetings', $personal_info->intro_greetings, ['class' => 'form-control', 'placeholder'=>'Intro Greetings'])}}
            </div>

            <div class="form-group">
                {{Form::label('WhatIDo', 'What I Do')}}
                {{Form::text('WhatIDo', $personal_info->what_i_do, ['class' => 'form-control', 'placeholder'=>'What I Do'])}}
            </div>
        

            <div class="form-group">
                
            <hr>
            <p>Profile Pic</p>
                {{Form::file('profile_pic')}}

               <small>Current Profile Pic: {{Form::label('CurrentProfilePic', $personal_info->profile_pic)}}</small>
            </div>

            <div class="form-group">
            {{Form::label('MoreAboutMe', 'More About me')}}
            {{Form::textarea('MoreAboutMe', $personal_info->more_about_me, ['class' => 'form-control', 'placeholder'=>'More About Me'])}}
            </div>

            <h5>Educational Background</h5>
            <div class="form-group">
                {{Form::label('College', 'College Desciption')}}
                {{Form::text('college_desc', $personal_info->college_desc, ['class' => 'form-control', 'placeholder'=>'College Desciption'])}}
            </div>
            <div class="form-group">
                {{Form::label('senior_high_desc', 'Senior High Desciption')}}
                {{Form::text('senior_high_desc', $personal_info->senior_high_desc, ['class' => 'form-control', 'placeholder'=>'Senior High Desciption'])}}
            </div>
            <div class="form-group">
                {{Form::label('junior_high_desc', 'Junior High Desciption')}}
                {{Form::text('junior_high_desc', $personal_info->junior_high_desc, ['class' => 'form-control', 'placeholder'=>'Junior High Desc'])}}
            </div>

            <div class="form-group">
            <h5>Resume</h5>
            {{Form::file('resume')}}
            <small>Current Resume File: {{Form::label('CurrentResumeFile', $personal_info->resume)}}</small>
            </div>
       

            

            <div class="form-group">
                <h5>My Studies</h5>
                {{Form::text('mystudies1', $personal_info->mystudies1)}}
                {{Form::text('mystudies2', $personal_info->mystudies2)}}
                {{Form::text('mystudies3', $personal_info->mystudies3)}}
                {{Form::text('mystudies4', $personal_info->mystudies4)}}
                {{Form::text('mystudies5', $personal_info->mystudies5)}}
                <br>
                <br>
                {{Form::text('mystudies6', $personal_info->mystudies6)}}
                {{Form::text('mystudies7', $personal_info->mystudies7)}}
                {{Form::text('mystudies8', $personal_info->mystudies8)}}
                {{Form::text('mystudies9', $personal_info->mystudies9)}}
                {{Form::text('mystudies10', $personal_info->mystudies10)}}

            </div>


            <div class="form-group">
                
                <hr>
                <p>Cover Image</p>
                    {{Form::file('cover_img')}}
    
                   <small>Current Cover Image: {{Form::label('CurrentCoverImg', $personal_info->cover_img)}}</small>
            </div>


            <div class="form-group">
                {{Form::label('gmail', 'Gmail')}}
                {{Form::text('gmail', $personal_info->gmail, ['class' => 'form-control', 'placeholder'=>'Gmail'])}}
            </div>
            <div class="form-group">
                {{Form::label('contact_number', 'Contact Number')}}
                {{Form::text('contact_number', $personal_info->contact_number, ['class' => 'form-control', 'placeholder'=>'Contact Number'])}}
            </div>

            <h5>My Links</h5>
            <div class="form-group">
                
                    {{Form::text('link1', $personal_info->link1 , ['placeholder'=>'link1'])}}
                    <small>Link1: <a target="_blank" href="https://github.com/{{$personal_info->link1}}">https://github.com/{{$personal_info->link1}}</a> </small>
            </div>
            <div class="form-group">
                
                    {{Form::text('link2', $personal_info->link2 , ['placeholder'=>'link2'])}}
                    <small>Link2: <a target="_blank" href="https://github.com/{{$personal_info->link2}}">https://github.com/{{$personal_info->link2}}</a> </small>
            </div>
            <div class="form-group">
                
                    {{Form::text('link3', $personal_info->link3 , ['placeholder'=>'link3'])}}
                    <small>Link3: <a target="_blank" href="https://codepen.io/{{$personal_info->link3}}">https://codepen.io/{{$personal_info->link3}}</a> </small>
            </div>
            <div class="form-group">
                
                    {{Form::text('link4', $personal_info->link4 , ['placeholder'=>'link4'])}}
                    <small>Link4: <a target="_blank" href="https://www.facebook.com/{{$personal_info->link4}}">https://www.facebook.com/{{$personal_info->link4}}</a> </small>
            </div>

            <div class="form-group">
                
                <hr>
                <p>Project 1 Setup</p>
                    {{Form::file('project1_img')}}
                    <small>Current Project 1  Image: {{Form::label('Project 1 Current Image', $personal_info->project1_img)}}</small>
                    {{Form::text('project1_title', $personal_info->project1_title, ['class' => 'form-control', 'placeholder'=>'Project 1 Title'])}}
                    {{Form::text('project1_desc', $personal_info->project1_desc, ['class' => 'form-control', 'placeholder'=>'Project 1 Desciption'])}}

            </div>

            <div class="form-group">
                
                <hr>
                <p>Project 2 Setup</p>
                    {{Form::file('project2_img')}}
                    <small>Current Project 2  Image: {{Form::label('Project 2 Current Image', $personal_info->project2_img)}}</small>
                    {{Form::text('project2_title', $personal_info->project2_title, ['class' => 'form-control', 'placeholder'=>'Project 2 Title'])}}
                    {{Form::text('project2_desc', $personal_info->project2_desc, ['class' => 'form-control', 'placeholder'=>'Project 2 Desciption'])}}

            </div>

            <div class="form-group">
                
                <hr>
                <p>Project 3 Setup</p>
                    {{Form::file('project3_img')}}
                    <small>Current Project 3  Image: {{Form::label('Project 3 Current Image', $personal_info->project3_img)}}</small>
                    {{Form::text('project3_title', $personal_info->project3_title, ['class' => 'form-control', 'placeholder'=>'Project 3 Title'])}}
                    {{Form::text('project3_desc', $personal_info->project3_desc, ['class' => 'form-control', 'placeholder'=>'Project 3 Desciption'])}}

            </div>






    
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit' , ['class' => 'btn btn-primary'])}}


       

    {!! Form::close() !!}



   

       
            
       


    @endforeach

@endsection