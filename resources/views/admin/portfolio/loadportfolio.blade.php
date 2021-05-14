
   
    <form method="post" id="myForm" class="form-horizontal">
     @csrf
        <span id="form_result"></span>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div class="progress" style="height: 2px;">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Intro greetings:</small>
                        <input name="intro" id="intro" class="form-control" type="text" placeholder="Intro Greetings" value="{{$portfolio->intro_greetings}}">
                        <span class="invalid-feedback" role="alert">
                        <strong id="error-intro"></strong>
                        </span>
                    </div>
                  
                    <div class="form-group">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <small>Profile:</small>
                                    <input class="form-control form-input" id="profile" type="file" accept="image/*" name="profile" />
                                    <br>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-profile"></strong>
                                    </span>
                                </div>
                                <div class="col-6">
                                    
                                    <img id="profile_pic" src="/{{$portfolio->profile_pic}}" alt="profile" width=330 height=150/><br>
                                    <small>Current Profile:</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <small>What I do:</small>
                        <textarea class="form-control form-input" id="wid" name="wid" placeholder="What I Do">{{$portfolio->what_i_do}}</textarea>
                        <span class="invalid-feedback" role="alert">
                        <strong id="error-wid"></strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <small>Resume:</small>
                                    <input class="form-control form-input" id="resume" type="file" name="resume" />
                                    <br>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-resume"></strong>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <br>
                                    <a href="/{{$portfolio->resume}}">My Resume</a> <br>
                                    <small>Current Resume:</small>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="content-section-title">About Page</div>
                    <div class="form-group">
                        <small>More About Me:</small>
                        <textarea class="form-control form-input" id="mam" name="mam" placeholder="More About Me">{{$portfolio->more_about_me}}</textarea>
                        <span class="invalid-feedback" role="alert">
                        <strong id="error-mam"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <small>College Description:</small>
                        <textarea class="form-control form-input" id="college" name="college" placeholder="College Description">{{$portfolio->college_desc}}</textarea>
                        <span class="invalid-feedback" role="alert">
                        <strong id="error-college"></strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <small>Senior High Description:</small>
                        <textarea class="form-control form-input" id="sh" name="sh" placeholder="Senior High Description">{{$portfolio->senior_high_desc}}</textarea>
                        <span class="invalid-feedback" role="alert">
                        <strong id="error-sh"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <small>Junior High Description:</small>
                        <textarea class="form-control form-input" id="jh" name="jh" placeholder="Junior High Description">{{$portfolio->junior_high_desc}}</textarea>
                        <span class="invalid-feedback" role="alert">
                        <strong id="error-jh"></strong>
                        </span>
                    </div>




                    
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="hidden" name="hidden_id" id="hidden_id" value="{{ csrf_token() }}" />
                </div>
            </div>
            
                <input type="submit" name="action_button" id="action_button" class="form-control mt-4 btn" style="background-color: var(--theme-bg-color);  color: var(--theme-color); border: 2px solid gray;" value="Save" />                 
    </form>


    
<script>
//tooltip
$(function () {
    $(document).ready(function(){
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
    var action_url = "/admin/portfolio/1";
    var type = "POST";

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
                   $('.progress').show();
                   percent.css("width", "100%");
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



</script>