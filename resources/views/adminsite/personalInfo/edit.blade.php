    
       
        @method('PUT')
        @csrf
        <small>Intro Greetings:</small>
        <div class="input-group mb-3">
            
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="{{$personalinfo->intro_greetings}}" placeholder="Intro Greetings" name="intro_greetings">
            <input type="hidden" id="update" class="form-control" value="{{$personalinfo->id}}" name="id">
        </div>

        <small>What i do:</small>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-sticky-note"></i></span>
            </div>
            <textarea class="form-control" name="what_i_do" placeholder="What i do">{{$personalinfo->what_i_do}}</textarea>
        </div>
            
        <div class="input-group mb-3">
            <div class="col-md-12">
                <div class="row">
                    
                    <div class="col-md-6">
                    <small>Profile Image Upload Here:</small> 
                    <input type="file" class="form-control btn-default"  name="profile_pic">
                    </div>
                    <div class="col-md-6">
                    <small>Current Profile Image:</small> <br>
                    <img src="{{$personalinfo->profile_pic}}" alt="" width="100" height="50">
                    </div>
                </div>
            </div>
        </div>
        <small>More about me:</small>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-sticky-note"></i></span>
            </div>
            <textarea class="form-control" name="more_about_me" placeholder="More about me">{{$personalinfo->more_about_me}}</textarea>
        </div>

        <small>College Description:</small>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
            </div>
            <textarea class="form-control" name="college_desc" placeholder="College Description">{{$personalinfo->college_desc}}</textarea>
        </div>
        <small>SeniorHigh Description:</small>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
            </div>
            <textarea class="form-control" name="senior_high_desc" placeholder="SeniorHigh Description">{{$personalinfo->senior_high_desc}}</textarea>
        </div>
        <small>JuniorHigh Description:</small>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
            </div>
            <textarea class="form-control" name="junior_high_desc" placeholder="JuniorHigh Description">{{$personalinfo->junior_high_desc}}</textarea>
        </div>

        <div class="input-group mb-3">
            <div class="col-md-12">
                <div class="row">
                    
                    <div class="col-md-6">
                    <small>Resume File Upload Here:</small> 
                    <input type="file" class="form-control btn-default"  name="resume">
                    </div>
                    <div class="col-md-6">
                    <small>Current resume file:</small> <br>
                    <small>{{$personalinfo->resume}}</small>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="input-group mb-3">
            <div class="col-md-12">
                <div class="row">
                    
                    <div class="col-md-6">
                    <small>Cover Image Upload Here:</small> 
                    <input type="file" class="form-control btn-default"  name="coverimg">
                    </div>
                    <div class="col-md-6">
                    <small>Current Profile Image:</small> <br>
                    <img src="{{$personalinfo->cover_img}}" alt="" width="100" height="50">
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-md-12">
            <input class="btn btn-success form-control" type="submit" value="Update">
        </div>