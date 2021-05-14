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
		<link rel="icon" href="https://n7.nextpng.com/sticker-png/649/178/sticker-png-cartoon-blog-graphics-red-j-hat-orange-copyright-cartoon.png"/>
        <!-- Styles -->
        
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  
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

								<a href="/">
									<div class="dots-wrapper">
										<div id="dot-1" class="browser-dot"></div>
										<div id="dot-2" class="browser-dot"></div>
										<div id="dot-3" class="browser-dot"></div>
									</div>
								</a>

								<ul id="navigation">
									<li><a href="/#projects" class="text-uppercase">Projects</a></li>
									<li><a href="/#about" class="text-uppercase">About</a></li>
									<li><a href="/#contact" class="text-uppercase">Contact</a></li>
									
									@if (Auth::user())
									<li><a class="text-uppercase" href="/admin/dashboard">Dashboard</a></li>
									<li><a class="text-uppercase" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>                  
									@else
									<li><button type="button" name="create_record" id="create_record" class="text-uppercase" data-toggle="modal" data-target="#exampleModal" style="color: var(--secondaryText); outline: none!important; background-color:transparent; border-color: transparent; ">Admin login</button></li>
									@endif
								</ul>
							</div>

							<div class="left-column">
								<img class="mb-3" id="profile_pic" src="{{$personal_info->profile_pic}}">
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
		@endforeach

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-body bg-card">
							<div class="card card-border" style="margin-top: 10px; width: 100%; padding-top: 10px;	padding-bottom:5px; border: none; color: #fff; background-color: var(--buttonColor);">
								<div class="col-md-12 mb-3">
									<div class="row">
										<div class="col-md-10">
											<div class="font-weight-bold">{{ __('Admin Login') }}</div>
										</div>
										<div class="col-md-2">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									</div>
								</div>

								<div class="card-body bg-card">
									
									<form method="POST" action="{{ route('login') }}">
										@csrf

										<div class="form-group row">
											<label for="email" class="col-md-12 col-form-label">{{ __('E-Mail Address') }}</label>

											<div class="col-md-12">
												<input id="email" type="email" class="input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

												@error('email')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>

										<div class="form-group row">
											<label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>

											<div class="col-md-12">
												<input id="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

												@error('password')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>

										<div class="form-group row">
											<div class="col-md-12">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

													<label class="form-check-label" for="remember">
														{{ __('Remember Me') }}
													</label>
												</div>
											</div>
										</div>

										<div class="form-group row mb-0">
											<div class="col-md-12">
												<button type="submit" id="submit-btn" class="btn text-uppercase font-weight-bold">
													{{ __('Login') }}
												</button>

												<!-- @if (Route::has('password.request'))
													<a class="btn btn-link" href="{{ route('password.request') }}">
														{{ __('Forgot Your Password?') }}
													</a>
												@endif -->
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
		<!-- projects -->
		<section class="s2" id="projects">
			<div class="main-container mt-4">
				<h3 style="text-align: center;">Some of my past projects</h3>    
				
				
				<div class="post-wrapper" id="projectswrapper"> 
					<div class="loading"></div>
				</div>
				<div class="col-md-12">
					<div class="row justify-content-center">
						<div class="col-md-6">
							<a id="submit-btn" class="btn  mb-4 text-uppercase font-weight-bold text-decoration-none" target="_blank" href="{{URL::to('/')}}/uploadedimages/{{$personal_info->resume}}">Download my resume</a>
						</div>
					</div>
				</div>
			</div>
			<!-- single view -->
			<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<div class="container">
								<div class="row" id="view">
									<div class="loading"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
   		</section>
		<!-- projects -->
		@foreach($personal_infos as $personal_info)
			<section id="about" class="s1">
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
								<div class="col-md-12">
									<div class="row mt-3">
										@if(count($studies) > 0)
											@foreach($studies as $study)
												<div class="col-md-4 ">
													<ul>
														<li>{{$study->nameofstudy}}</li>
													</ul>
												</div>
											@endforeach
											@else
										<p>No data found</p>
										@endif
									</div>
								</div>
							</div>
							
						</div>

						
						<div class="social-links text-sm-left">

							<img id="social_img" src="{{$personal_info->cover_img}}">
							<h3 class="text-center mt-3">Find me on </h3>
							@if(count($contacts) > 0)
								@foreach($contacts as $contact)
									@if($contact->category->name == "gmail")
										<p><i class="fa fa-envelope mr-2"></i>{{$contact->valueofcontact}}</p>
									@endif
									@if($contact->category->name == "phone")
										<p><i class="fa fa-phone mr-2"></i>{{$contact->valueofcontact}}</p>
									@endif
								@endforeach
							@else
							<p>No data found</p>
							@endif

							@if(count($contacts) > 0)
								@foreach($contacts as $contact)
										@if($contact->category->name == "facebook")
										<a target="_blank" href="{{$contact->valueofcontact}}"><p><i class="fa fa-{{$contact->category->name}} mr-2"></i>{{$contact->valueofcontact}}</p></a>
										@endif
										@if($contact->category->name == "codepen")
										<a target="_blank" href="{{$contact->valueofcontact}}"><p><i class="fa fa-{{$contact->category->name}} mr-2"></i>{{$contact->valueofcontact}}</p></a>
										@endif
										@if($contact->category->name == "github")
										<a target="_blank" href="{{$contact->valueofcontact}}"><p><i class="fa fa-{{$contact->category->name}} mr-2"></i>{{$contact->valueofcontact}}</p></a>
										@endif
										@if($contact->category->name == "others")
										<a target="_blank" href="{{$contact->valueofcontact}}"><p><i class="fa fa-globe mr-2"></i>{{$contact->valueofcontact}}</p></a>
										@endif
								@endforeach
							@else
							<p>No data found</p>
							@endif
						</div>
					</div>

				</div>
			</section>
		@endforeach



	

	
     <section class="s2" id="contact">
		<div class="main-container mt-5">
			<a href="contact"></a>
			<h3 style="text-align: center;">Get In Touch</h3>
			

			<form id="contact-form" method="POST">
				<label for="name" class="text-uppercase font-weight-bold">Name</label>
				<input type="text" id="name" name="name" class="input-field">

				<label for="email" class="text-uppercase font-weight-bold">Email</label>
				<input type="email" id="email" name="email" class="input-field">
				
				<label for="contact" class="text-uppercase font-weight-bold">Contact Number / Optional</label>
				<input type="number" id="contact" name="contact" class="input-field">
				
				<label for="msg" class="text-uppercase font-weight-bold">Message</label>
				<textarea name="msg" id="msg" class="input-field"></textarea>

				<input type="sumbit" id="submit-btn" class="btn text-uppercase font-weight-bold" value="Send">
			</form>

		


		</div>
	</section>




<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('script/script.js') }}"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>


	<script>  
		$(document).ready(function(){ 
			$.ajax({
				type:"get",
				url:'landingprojects',
				dataType: "html",
				beforeSend: function() { $('.loading').show() },
				success: function(response){
					$('#projectswrapper').html(response);
					$('.loading').hide();
				}
			});
		});
	</script>


    </body>
</html>
