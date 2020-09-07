@extends('layouts.app')

@section('content')

    <a href="/adminsite/projects/all/create" class="btn btn-primary"> Create a new project </a>
    <section class="s1" id="projects">
		<div class="main-container">
			<h3 style="text-align: center;">Some of my past projects</h3>    
            <div class="post-wrapper"> 
 
    @if(count($projects) > 0)
        @foreach($projects as $project)
        


            <div>
            <a href="/adminsite/projects/all/{{$project->id}}">
                <div class="post">
                    <img class="thumbnail" src="{{URL::to('/')}}/uploadedimages/{{$project->image}}">
                    <div class="post-preview">
                        <h6 class="post-title">{{$project->title}}</h6>
                        <p class="post-intro">{{$project->description}}</p>
                    <!--	<a href="post.html">Read More</a>-->
                        

                    </div>
                </div>
                </a>
            </div>

 
       


        
        @endforeach
    
     {{$projects->links()}} 
    @else
        <p>No projects found</p>
    @endif
    </div>

    </div>
        </section>

@endsection