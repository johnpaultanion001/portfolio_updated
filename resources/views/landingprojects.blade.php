<style>
.btnmodal{
    outline: none!important; 
    background-color:transparent; 
    border-color: transparent; 
    
}
.btnmodal:hover{
    transform: scale(1.1);
}
</style>


@if(count($projects) > 0)
    @foreach($projects as $project)
    <button class="btnmodal" onclick="singleview(this.value)" value="{{$project->id}}" id="v{{$project->id}}" data-toggle="modal" data-target="#viewModal">
        <div class="projects">
    
            <div class="post">
                <img class="thumbnail" src="{{URL::to('/')}}/{{$project->image}}">
                <div class="post-preview" style="height: 160px;">
                    <h6 class="post-title text-left text-uppercase">{{$project->title}}</h6>
                    <p class="post-intro text-left">{{\Illuminate\Support\Str::limit($project->description,100)}}</p>   
                </div>
            </div>
        </div>
    </button>
    @endforeach
    
@else
    <p>No projects found</p>
@endif



<script>  
	function singleview(v){
	$.ajax({
		type:"get",
		url:'project/'+v,
		dataType: "html",
        beforeSend: function() { $('.loading').show() },
		success: function(response){
		$('#view').html(response);
		}
		
	})
}
</script>