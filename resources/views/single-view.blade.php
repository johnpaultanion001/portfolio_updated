<div class="col-md-12">
    <div class="row">
        
        <div class="col-md-12">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-dark" aria-hidden="true">&times;</span>
            </button>
            <div class="input-group mb-3">
                <h3 class="card-title text-dark text-uppercase">{{$project->title}}</h3>
            </div>     
            <div class="input-group mb-3">
                 <p class="card-title text-dark">{{$project->description}}</p>
            </div>
        </div>

        <div class="col-md-12">
            <div class="input-group mb-3">
                <img src="{{$project->image}}" alt="" width="100%" height="200">
            </div>
        </div>
    </div>
</div>
