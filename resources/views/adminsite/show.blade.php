@extends('layouts.app')

@section('content')

    
  

            <div class="container">
            <a href="/adminsite" class="btn btn-primary"> Go Back </a>
            <br>
                <div class="row justify-content-center show-msg">
                    <div class="col-md-12">
                        <div class="card  bg-card card-border">
                            <b><div class="card-header bg-header">FROM : {{$msg->name}}</div></b>

                            <div class="card-body  bg-card">
                                <p><b>Email :</b> {{$msg->email}} </p><br>
                                <p><b>Subject :</b> {{$msg->subject}} </p><br>
                                <p><b>Message :</b> {{$msg->msg}} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                {!!Form::open(['action'=>['msgsController@destroy', $msg->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete' , ['class' => 'btn btn-danger'])}}

            {!!Form::close()!!}
            </div>
            
            
    

@endsection