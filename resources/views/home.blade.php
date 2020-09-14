@extends('layouts.app')

@section('content')

    <h3>My Messages</h3>
    @if(count($msgs) > 0)
        @foreach($msgs as $msg)
         
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 ">
                        <div class="card  bg-card card-border">
                            <div class="card-header bg-header"> <a href="/adminsite/{{$msg->id}}">FROM : {{$msg->name}}</a> </div>

                            <div class="card-body  bg-card">
                                <small>Email : {{$msg->email}} </small><br>
                                <small>Subject : {{$msg->subject}} </small><br>
                                <small>Message : {{$msg->msg}} </small><br>

                                <small>Date and Time: {{$msg->created_at}} </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>



        @endforeach
    <div class="container">
    
        <div class="row justify-content-center">
        <div class="col-md-8 ">
            {{$msgs->links()}}
        </div>
        </div>

    </div>

    <a href="/adminsite/personalInfo/show" class="btn btn-primary">View Personal Information</a>
    @else
        <p>No msg found</p>
    @endif


    
    

@endsection