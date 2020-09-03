<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Johnpaulsite</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Icons -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link href="{{ asset('css/default.css') }}" rel="stylesheet">
		
        <link id="theme-style" rel="stylesheet" type="text/css" href="">
		

	

    </head>
    <body>
	@foreach($personal_infos as $personal_info)
			<section class="s1">
				<div class="main-container">
			
					
						<div class="greeting-wrapper">
							<h1>{{$personal_info->intro_greetings}} </h1>
							@include('inc.messages')				
						</div>

					

						<div class="intro-wrapper">
							<div class="nav-wrapper">

								<a href="index.html">
									<div class="dots-wrapper">
										<div id="dot-1" class="browser-dot"></div>
										<div id="dot-2" class="browser-dot"></div>
										<div id="dot-3" class="browser-dot"></div>
									</div>
								</a>

								<ul id="navigation">
									<li><a href="index.php#contact">Contact</a></li>

									<li><a href="index.php#projects">Projects</a></li>
									<li><a href="{{ route('login') }}">Admin</a></li>
								

								</ul>
								


							</div>

							<div class="left-column">
								<img id="profile_pic" src="{{URL::to('/')}}/uploadedimages/{{$personal_info->profile_pic}}">
								<h5 style="text-align: center;line-height: 0;">Personalize Theme</h5>

								<div id="theme-options-wrapper">
									<div data-mode="green" id="green-mode" class="theme-dot"></div>
									<div data-mode="blue" id="blue-mode" class="theme-dot"></div>
									<div data-mode="light" id="light-mode" class="theme-dot"></div>
									<div data-mode="purple" id="purple-mode" class="theme-dot"></div>
									
								</div>

								<p id="settings-note">*Theme settings will be saved for<br>your next vist</p>
							</div>

							<div class="right-column">

						


								<div id="preview-shadow">
									<div id="preview">
										<div id="corner-tl" class="corner"></div>
										<div id="corner-tr" class="corner"></div>
										<h3>What I Do</h3>
										<p>{{$personal_info->what_i_do}}</p>
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

					<p>{{$personal_info->more_about_me}}</p>

					


					<hr>
					<h5>My Education Backgound</h5>

					<p><b> • College :</b> {{$personal_info->college_desc}}</p>
					<p><b> • Senior High : </b>  {{$personal_info->senior_high_desc}}</p>
					<p><b> • Junior High : </b>  {{$personal_info->junior_high_desc}} </p>
					


					<hr>
					<p> <a target="_blank" href="{{URL::to('/')}}/uploadedimages/{{$personal_info->resume}}">Download My Resume</a></p>

					<h4>My Studies </h4>

				
					<div id="skills">
						<ul>
							<li>{{$personal_info->mystudies1}}</li>
							<li>{{$personal_info->mystudies2}}</li>
							<li>{{$personal_info->mystudies3}}</li>
							<li>{{$personal_info->mystudies4}}</li>
							<li>{{$personal_info->mystudies5}}</li>
						</ul>

						<ul>
							<li>{{$personal_info->mystudies6}}</li>
							<li>{{$personal_info->mystudies7}}</li>
							<li>{{$personal_info->mystudies8}}</li>
							<li>{{$personal_info->mystudies9}}</li>
							<li>{{$personal_info->mystudies10}}</li>
						</ul>

					</div>

				</div>

				
				<div class="social-links">

					<img id="social_img" src="{{URL::to('/')}}/uploadedimages/{{$personal_info->cover_img}}">
					<h3>Find me on </h3>
					
				<p><i class="fa fa-envelope"></i> {{$personal_info->gmail}}</p>
				<p><i class="fa fa-phone"></i> {{$personal_info->contact_number}}</p>
						 
					<div class="social-icons">
							<a target="_blank" href="https://github.com/{{$personal_info->link1}}"><li><i class="fa fa-linkedin"></i></li></a>
							<a target="_blank" href="https://github.com/{{$personal_info->link2}}"><li><i class="fa fa-github"></i></li></a>
							<a target="_blank" href="https://codepen.io/{{$personal_info->link3}}"><li><i class="fa fa-codepen"></i></li></a>
							<a target="_blank" href="https://www.facebook.com/{{$personal_info->link4}}"><li><i class="fa fa-facebook"></i></li></a>
							
						</div>

				

					
				</div>
			</div>

		</div>
	</section>



    <section class="s1" id="projects">
		<div class="main-container">
			<h3 style="text-align: center;">Some of my past projects</h3>

			<div class="post-wrapper">

				<div>
					<div class="post">
						<img class="thumbnail" src="{{URL::to('/')}}/uploadedimages/{{$personal_info->project1_img}}">
						<div class="post-preview">
							<h6 class="post-title">{{$personal_info->project1_title}}</h6>
							<p class="post-intro">{{$personal_info->project1_desc}}</p>
						<!--	<a href="post.html">Read More</a>-->
							
				
						</div>
					</div>
				</div>

				<div>
					<div class="post">
						<img class="thumbnail" src="{{URL::to('/')}}/uploadedimages/{{$personal_info->project2_img}}">
						<div class="post-preview">
						<h6 class="post-title">{{$personal_info->project2_title}}</h6>
							<p class="post-intro">{{$personal_info->project2_desc}}</p>
							<!--	<a href="post.html">Read More</a>-->
						</div>
					</div>
				</div>

				<div>
					<div class="post">
						<img class="thumbnail" src="{{URL::to('/')}}/uploadedimages/{{$personal_info->project3_img}}">
						<div class="post-preview">
						<h6 class="post-title">{{$personal_info->project3_title}}</h6>
							<p class="post-intro">{{$personal_info->project3_desc}}</p>
							<!--<a href="post.html">Read More</a>-->
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	@endforeach
	
     <section class="s2" id="contact">
		<div class="main-container">
			<a href="contact"></a>
			<h3 style="text-align: center;">Get In Touch</h3>
			
			{!! Form::open(['id' => 'contact-form' ,'action' => 'msgsController@store' , 'method' => 'POST' ])!!}
					
						{{Form::label('name', 'Name')}}
						{{Form::text('name', '', ['class' => 'input-field'])}}
						{{Form::label('email', 'Email')}}
						{{Form::text('email', '', ['class' => 'input-field'])}}
						{{Form::label('subject', 'Subject')}}
						{{Form::text('subject', '', ['class' => 'input-field']) }}
						{{Form::label('message', 'Message')}}
						{{Form::textarea('msg', '', ['class' => 'input-field']) }}
						
					
            	{{Form::submit('Submit' , ['id' => 'submit-btn'])}}
		    {!! Form::close() !!}



		</div>
	</section>  



    <script type="text/javascript" src="{{ asset('script/script.js') }}"></script>

    </body>
</html>
