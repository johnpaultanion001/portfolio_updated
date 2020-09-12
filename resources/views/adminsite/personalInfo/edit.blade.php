@extends('layouts.app')

@section('content')



		{!! Form::open(['action' => ['personalController@update', $personal_info->id], 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
	
		
	
				<section class="s1">
					<div class="main-container">
					<br>
					<a href="/adminsite" class="btn btn-primary"> Go Back </a>

					{!!Form::open(['action'=>['personalController@destroy', $personal_info->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
						
						{{Form::hidden('_method','DELETE')}}
						{{Form::submit('Set To Default' , ['id' => 'submit-btn'])}}

					{!!Form::close()!!}
				
						
							<div class="greeting-wrapper">
								<h1>{{$personal_info->intro_greetings}} </h1>
								{{Form::text('IntroGreetings', $personal_info->intro_greetings, ['class' => 'form-control', 'placeholder'=>'Intro Greetings'])}}
							</div>

						

							<div class="intro-wrapper">
								

								<div class="left-column">
								
								
									<img id="profile_pic" src="{{URL::to('/')}}/uploadedimages/{{$personal_info->profile_pic}}">
									<div class="form-control">
									{{Form::file('profile_pic')}}<br>
									<small>Current Profile Pic: {{Form::label('CurrentProfilePic', $personal_info->profile_pic)}}</small>
									</div>
								
					

								</div>
								
								<div class="right-column">
							

							
								
								
									<div id="preview-shadow">
								
										<div id="preview">
											<div id="corner-tl" class="corner"></div>
											<div id="corner-tr" class="corner"></div>
											<h3>What I Do</h3>
											<p>{{Form::textarea('WhatIDo', $personal_info->what_i_do, ['class' => 'form-control', 'style' => 'height: 100px;' , 'placeholder'=>'What I Do'])}}</p>
											<div id="corner-br" class="corner"></div>
											<div id="corner-bl" class="corner"></div>

											
										</div>
										
									
									</div>
								

									

								</div>
							</div>
						
					
					</div>
				</section>


				<section id="about" class="s2">
					<div class="main-container">

						<div class="about-wrapper">
							<div class="about-me">
								<h4>More about me</h4>

								{{Form::textarea('MoreAboutMe', $personal_info->more_about_me, ['class' => 'form-control','style' => 'height: 130px; ', 'placeholder'=>'More About Me'])}}


								


								<hr>
								<h5>My Education Backgound</h5>
							
				
									
						
						
					

								<p><b> • College :</b> {{Form::text('college_desc', $personal_info->college_desc, ['class' => 'form-control', 'placeholder'=>'College Desciption'])}}</p>
								<p><b> • Senior High : </b>{{Form::text('senior_high_desc', $personal_info->senior_high_desc, ['class' => 'form-control', 'placeholder'=>'Senior High Desciption'])}}</p>
								<p><b> • Junior High : </b>{{Form::text('junior_high_desc', $personal_info->junior_high_desc, ['class' => 'form-control', 'placeholder'=>'Junior High Desc'])}}</p>
								


								<hr>
								
								<div class="form-group">
								<h5>Resume</h5>
								{{Form::file('resume')}}
								<small>Current Resume File: {{Form::label('CurrentResumeFile', $personal_info->resume)}}</small>
								</div>


								<h4>My Studies </h4>

							
								<div id="skills">
									<ul>
										<li>{{Form::text('mystudies1', $personal_info->mystudies1)}}</li>
										<li> {{Form::text('mystudies2', $personal_info->mystudies2)}}</li>
										<li> {{Form::text('mystudies3', $personal_info->mystudies3)}}</li>
										<li> {{Form::text('mystudies4', $personal_info->mystudies4)}}</li>
										<li> {{Form::text('mystudies5', $personal_info->mystudies5)}}</li>
									</ul>

									<ul>
										<li> {{Form::text('mystudies6', $personal_info->mystudies6)}}</li>
										<li> {{Form::text('mystudies7', $personal_info->mystudies7)}}</li>
										<li>{{Form::text('mystudies8', $personal_info->mystudies8)}}</li>
										<li>{{Form::text('mystudies9', $personal_info->mystudies9)}}</li>
										<li>{{Form::text('mystudies10', $personal_info->mystudies10)}}</li>
									</ul>

								</div>

							</div>

							
							<div class="social-links">


						
					

								<h5>My Links</h5>
									<img id="social_img" src="{{URL::to('/')}}/uploadedimages/{{$personal_info->cover_img}}">

										<div class="form-group">
										{{Form::file('cover_img')}}
									<small>Current Cover Image: {{Form::label('CurrentCoverImg', $personal_info->cover_img)}}</small>
										</div>

										<h3>Find me on </h3>
										
									<p>{{Form::text('gmail', $personal_info->gmail, ['placeholder'=>'Gmail'])}} <i class="fa fa-envelope"></i></p>
									<p>{{Form::text('contact_number', $personal_info->contact_number, [ 'placeholder'=>'Contact Number'])}} <i class="fa fa-phone"></i></p>
									<p> {{Form::text('link1', $personal_info->link1 , ['placeholder'=>'link1'])}} <i class="fa fa-linkedin"></i><small><a target="_blank" href="https://github.com/{{$personal_info->link1}}">https://github.com/{{$personal_info->link1}}</a></small></p>
									<p>{{Form::text('link2', $personal_info->link2 , ['placeholder'=>'link2'])}} <i class="fa fa-github"></i><small><a target="_blank" href="https://github.com/{{$personal_info->link2}}">https://github.com/{{$personal_info->link2}}</a></small></p>
									<p>{{Form::text('link3', $personal_info->link3 , ['placeholder'=>'link3'])}} <i class="fa fa-codepen"></i><small><a target="_blank" href="https://codepen.io/{{$personal_info->link3}}">https://codepen.io/{{$personal_info->link3}}</a></small></p>
									<p>{{Form::text('link4', $personal_info->link4 , ['placeholder'=>'link4'])}} <i class="fa fa-facebook"></i><small><a target="_blank" href="https://www.facebook.com/{{$personal_info->link4}}">https://www.facebook.com/{{$personal_info->link4}}</a></small></p>
											
						
						
								
							</div>
						</div>

					</div>

					
				</section>

		{{Form::hidden('_method','PUT')}}
		{{Form::submit('Submit' , ['class' => 'btn btn-primary'])}}
		


		
		{!! Form::close() !!}


            
            
    





@endsection