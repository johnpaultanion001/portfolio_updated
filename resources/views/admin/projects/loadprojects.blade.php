<div class="app-project">
    <button type="button" id="create" name="create" style="outline: none!important; background-color:transparent; border-color: transparent; border: 1px var(--border-color) solid">
        <div class="app-project__image">
            <img src="https://modifyinkonline.com/img/mn/plusicon.png" alt="" >
        </div>
    </button>
</div>
@foreach($projects as $project)
<div class="app-project">
    <div class="app-project__image">
        <img src="/{{$project->image}}" alt="" >
    </div>
    <br>
    <span>{{\Illuminate\Support\Str::limit($project->title,39)}}</span>
    <div class="app-project__subtext">{{\Illuminate\Support\Str::limit($project->description,39)}}</div>
    
    <div class="app-project-buttons">
        <button type="button" name="view" id="view" view="{{  $project->id ?? '' }}"  class="view btn btn-success  ml-1 " data-toggle="tooltip" data-placement="right" data-original-title="Click this to view your project"><i class="far fa-eye"></i></button>
        <button type="button" name="edit" id="edit" edit="{{  $project->id ?? '' }}"  class="edit btn btn-info ml-1 " data-toggle="tooltip" data-placement="right" data-original-title="Click this to edit your project"><i class="far fa-edit"></i></button>
        <button type="button" name="delete" delete="{{  $project->id ?? '' }}" id="{{  $project->id ?? '' }}" class="delete btn btn-danger  ml-1" data-toggle="tooltip" data-placement="right" data-original-title="Click this to delete your project"><i class="far fa-trash-alt"></i></button>
    </div>
</div>
@endforeach



<div class="pop-up" id="msgview">
    <div class="pop-up__title"> <div class="title">Date:</div>
        
        <svg class="close" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
            <circle cx="12" cy="12" r="10" />
            <path d="M15 9l-6 6M9 9l6 6" />
        </svg>
    </div>

    <form method="post" id="myForm" class="form-horizontal">
     @csrf
        <span id="form_result"></span>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div class="progress" style="height: 2px;">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Title:</small>
                        <input type="text" class="form-control form-input" id="title" name="title" placeholder="Enter title" />
                        <span class="invalid-feedback" role="alert">
                        <strong id="error-title"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <small>Description:</small>
                        <textarea class="form-control form-input" id="description" name="description" placeholder="Enter description"></textarea>
                        <span class="invalid-feedback" role="alert">
                        <strong id="error-description"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <small>Image:</small>
                        <input class="form-control form-input" id="img" type="file" accept="image/*" name="img" />
                        <br>
                        <span class="invalid-feedback" role="alert">
                            <strong id="error-img"></strong>
                        </span>

                        
                    </div>
                    <img id="image" alt="image" width=430 height=200/><br>
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="hidden" name="hidden_id" id="hidden_id" value="{{ csrf_token() }}" />
                </div>
            </div>
            
                <input type="submit" name="action_button" id="action_button" class="form-control mt-4 btn" style="background-color: var(--theme-bg-color);  color: var(--theme-color); border: 2px solid gray;" value="Save" />
                
                                 
    </form>
</div>

<script>
//tooltip
$(function () {
    $(document).ready(function(){
        $("button").tooltip();
        $('.progress').hide();
    });
});
//store and update
$('#myForm').on('submit', function(event){
    event.preventDefault();
    var bar = $('.bar');
    var percent = $('.progress-bar');

    var form = $(this);
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.projects.store') }}";
    var type = "POST";

    if($('#action').val() == 'Edit'){
        var id = $('#hidden_id').val();
        action_url = "/admin/projectsupdate/" + id;
        type = "POST";
    }

    $.ajax({
        url: action_url,
        method:type,
        dataType:"json",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
                 $('.progress').show();
                percent.css("width", "0%");
        },
        xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                    // var percentComplete = (evt.loaded / evt.total) * 100;
                    // // bar.width(percentComplete);
                    $('.progress').show();
                    percent.css("width", "100%");
                    // percent.html('Loading...');
                }
            }, false);
            return xhr;
        },
        
        success:function(data){
            var html = '';
            if(data.errors){
                $('.progress').hide();
                $.each(data.errors, function(key,value){
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                })
            }
            if(data.success){
                $('.progress').hide();
                $('.form-control').removeClass('is-invalid')
                form[0].reset();
                $(".pop-up").addClass("visible");
                $.alert({
                  title: 'Success Message',
                  content: data.success,
                  type: 'green',
                });
                $(".pop-up").removeClass("visible");
                return loadData();
            }
            $('#form_result').html(html);
        }
    });
});


//modal create
$('#create').click(function(){
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('.title').text('Add New Record');
    $('#action_button').val('Save');
    $('#action').val('Add');
    $('#form_result').html('');
    $("#image").hide();
    $(".pop-up").addClass("visible");
    $('.form-input').attr("disabled", false);
    $('#img').show();
    $('#action_button').show();
    $('.progress').hide();
});

//close modal
$(".pop-up .close").click(function () {
    $(".pop-up").removeClass("visible");
});



//edit modal
$(document).on('click', '#edit', function(){
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('#form_result').html('');
    $('.form-input').attr("disabled", false);
   
    var id = $(this).attr('edit');

    $.ajax({
        url :"/admin/projects/"+id+"/edit",
        dataType:"json",
        success:function(data){
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).val(value)
                    if(key == 'image'){
                      $('#image').attr("src", "/"+value);
                    }
                }
            })
            $('#hidden_id').val(id);
            $('.title').text('Edit Record');
            $('#action_button').val('Update');
            $(".pop-up").addClass("visible");
            $('#img').show();
            $('#action_button').show();
            $("#image").show();
            $('#action').val('Edit');
        }
    })
});

</script>