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
       
        <section class="s1">
		<div class="main-container">
			
		
			<div class="greeting-wrapper">
				<h1>Hi, I'm Johnpaul Tanion</h1>
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
					<img id="profile_pic" src="images/model1.jpg">
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
							<p>To know something new and enhance my skills in a dynamic and stable workplace.</p>
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

					<p>To know something new and enhance my skills in a dynamic and stable workplace. </p>

					<p> And to gain new experience and to utilize my interpersonal skills to achieve my goals.</p>


					<hr>
					<h5>My Education Backgound</h5>

					<p><b> • College :</b> Bachelor of Science in Computer Science At ICCT Colleges in Antipolo Branch And I am now 2yr college.</p>
					<p><b> • Senior High : </b>  Information and Communication Technology Strand And i graduate at Sti Ortigas Cainta.</p>
					<p><b> • Junior High : </b>  San Jose National High School  Brgy San Jose , Antipolo City Rizal S.Y. 2015 – 2016. </p>
					


					<hr>
					<p> <a target="_blank" href="resume.docx">Download My Resume</a></p>

					<h4>My Studies </h4>

				
					<div id="skills">
						<ul>
							<li>Python</li>
							<li>Php</li>
							<li>JavaScript</li>
							<li>C#</li>
							<li>Visual Basic</li>
						</ul>

						<ul>
							<li>Jquery</li>
							<li>My Sql</li>
							<li>Bootstrap</li>
							<li>Asp.net</li>
							<li>HTML/CSS</li>
						</ul>

					</div>

				</div>

				
				<div class="social-links">

					<img id="social_img" src="images/laptop.jpg">
					<h3>Find me on </h3>
					
				<p><i class="fa fa-envelope"></i> johnpaultanion003@gmail.com</p>
				<p><i class="fa fa-phone"></i> 09776668820</p>
						 
					<div class="social-icons">
							<a target="_blank" href="#"><li><i class="fa fa-linkedin"></i></li></a>
							<a target="_blank" href="https://github.com/johnpaultanion"><li><i class="fa fa-github"></i></li></a>
							<a target="_blank" href="https://codepen.io/johnpaultanion001"><li><i class="fa fa-codepen"></i></li></a>
							<a target="_blank" href="https://www.facebook.com/johnpaul.tanion.773"><li><i class="fa fa-facebook"></i></li></a>
							
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
						<img class="thumbnail" src="images/p1.JPG">
						<div class="post-preview">
							<h6 class="post-title">Library system with Barcode</h6>
							<p class="post-intro">I create this projects using c# , mysql for database </p>
						<!--	<a href="post.html">Read More</a>-->
							
				
						</div>
					</div>
				</div>

				<div>
					<div class="post">
						<img class="thumbnail" src="images/p2.JPG">
						<div class="post-preview">
							<h6 class="post-title">Treasury System With barcode  </h6>
							<p class="post-intro">I create this projects using Visual Basic , mysql for database </p>
							<!--	<a href="post.html">Read More</a>-->
						</div>
					</div>
				</div>

				<div>
					<div class="post">
						<img class="thumbnail" src="images/p3.JPG">
						<div class="post-preview">
							<h6 class="post-title">Entrance Exam And Monitoring Students</h6>
							<p class="post-intro">I create this projects using C# , mysql for database </p>
							<!--<a href="post.html">Read More</a>-->
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>


	
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
