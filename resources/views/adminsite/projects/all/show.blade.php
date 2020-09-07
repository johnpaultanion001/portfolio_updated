
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
        <link href="{{ asset('css/default.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
		
        <link id="theme-style" rel="stylesheet" type="text/css" href="">
		

	

    </head>
    <body>

    <section class="s1" id="projects">
		<div class="main-container">

			<h3 style="text-align: center;">{{$project->title}}</h3>

            <img style="width: 100%; height: 400px;" src="{{URL::to('/')}}/uploadedimages/{{$project->image}}">
            <br>
            <br>
            <br>
			<div style="width: 100%;">

				

				<div>
					<div class="post">
						
						<div class="post-preview">
						<h6 class="post-title">{{$project->title}}</h6>
							<p class="post-intro">{{$project->description}}</p>
							<!--	<a href="post.html">Read More</a>-->
						</div>
					</div>
				</div>

				
			</div>
            <br>

            <div style="width: 100%;">

				<div>
					<div class="post">
						
						<div class="post-preview">
						<h6 class="post-title">{{$project->ui_title1}}</h6><br>
                        <img style="width: 100%; height: 350px;" src="{{URL::to('/')}}/uploadedimages/{{$project->uiimage1}}">
							
						</div>
					</div>
				</div>

				
			</div>
            <br>
            <div style="width: 100%;">

            <div>
                <div class="post">
                    
                    <div class="post-preview">
                    <h6 class="post-title">{{$project->ui_title2}}</h6><br>
                    <img style="width: 100%; height: 350px;" src="{{URL::to('/')}}/uploadedimages/{{$project->uiimage2}}">
                        
                    </div>
                </div>
            </div>


            </div>
            <br>

            <div style="width: 100%;">

                <div>
                    <div class="post">
                        
                        <div class="post-preview">
                        <h6 class="post-title">{{$project->ui_title3}}</h6><br>
                        <img style="width: 100%; height: 350px;" src="{{URL::to('/')}}/uploadedimages/{{$project->uiimage3}}">
                            
                        </div>
                    </div>
                </div>


            </div>
            <br>
            <div style="width: 100%;">

                <div>
                <div class="post">
                    
                    <div class="post-preview">
                    <h6 class="post-title">{{$project->ui_title4}}</h6><br>
                    <img style="width: 100%; height: 350px;" src="{{URL::to('/')}}/uploadedimages/{{$project->uiimage4}}">
                        
                    </div>
                </div>
                </div>


            </div>
            <br>
           
            <div style="width: 100%;">

                <div>
                <div class="post">
                    
                    <div class="post-preview">
                    <h6 class="post-title">{{$project->ui_title5}}</h6><br>
                    <img style="width: 100%; height: 350px;" src="{{URL::to('/')}}/uploadedimages/{{$project->uiimage5}}">
                        
                    </div>
                </div>
                </div>


            </div>
            <br>

</div>


            @if(!Auth::guest())
                   
                        <a href="/adminsite/projects/all/{{$project->id}}/edit" class="btn btn-primary">Edit</a>

                        {!!Form::open(['action'=>['ProjectController@destroy', $project->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete' , ['class' => 'btn btn-danger'])}}

                        {!!Form::close()!!}
                   
                @endif


	
	</section>

    <script type="text/javascript" src="{{ asset('script/script.js') }}"></script>

    </body>
</html>




