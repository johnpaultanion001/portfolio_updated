@extends('../layouts.admin')
@section('sub-title','Projects')
@section('navbar')
    @include('../components.navbar-admin')
@endsection
@section('sidebar')
    @include('../components.sidebar-admin')
@endsection

@section('content')
<div class="main-container">
    <div class="main-header">
        <a class="menu-link-main" href="#">Projects</a>

        <!-- <div class="header-menu">
           
            <button type="button" id="create" name="create" class="main-header-link" style="outline: none!important; background-color:transparent; border-color: transparent; color: var(--theme-color); border-bottom: 1px var(--theme-color) solid"><i class="nav-icon fas fa-project-diagram" style="color: var(--theme-color);  padding-right: 6px;"></i> Create Project</button>
            
        </div> -->
    </div>
    
    <div class="content-wrapper">

        <div class="content-section">
          <div class="content-section-title">All Projects</div>
            <div class="apps-project" id="loaddata">
                
            </div>
        </div>
       
    </div>
    
</div>
<div class="loading"></div>

@endsection

@section('script')
<script>

$(function () {
  return loadData();
});

//view modal
$(document).on('click', '#view', function(){
     $('#myForm')[0].reset();
     $('.form-control').removeClass('is-invalid');
     $('.form-input').attr("disabled", true);
     $('#form_result').html('');
     var id = $(this).attr('view');
     $.ajax({
        url :"/admin/projects/"+id,
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
            $('.title').text('View Record');
            $('#img').hide();
            $('#action_button').hide();
            $(".pop-up").addClass("visible");
            $("#image").show();
            
        }
    })
  
});



function loadData(){
    $.ajax({
        url: "loadproject", 
        type: "get",
        dataType: "HTMl",
        beforeSend: function() { $('.loading').show() },
        success: function(response){
            $('.loading').hide();
            $("#loaddata").html(response);
        }	
    })
}


  
function getErrorData(error){
    $.ajax({
        url: "errordata/"+error,
        type: "get",
        dataType: "HTMl",
        success: function(response){
            console.log(response);
            $(".showError").html(response);
        }
    })
};



$('.modal').on('hidden.bs.modal', function () {
$('.showError').html('');
})



// function edit(v){
//     $.ajax({
//         type:"get",
//         url:'projects/'+v+'/edit',
//         dataType: "html",
//         success: function(response){
//         $('#edit').html(response);

//         }
//     })
// }

$(document).on('click', '.delete', function(){
    var id = $(this).attr('delete');
    var token = $('meta[name="csrf-token"]').attr('content')

    $.confirm({
        title: 'Confirmation',
        content: 'You really want to delete this record?',
        autoClose: 'cancel|10000',
        type: 'red',
        buttons: {
            confirm: {
                text: 'confirm',
                btnClass: 'btn-blue',
                keys: ['enter', 'shift'],
                action: function(){
                    return $.ajax({
                        url:'/admin/projects/'+id,
                        method:'DELETE',
                        data: {
                            _token: '{!! csrf_token() !!}',
                        },
                        dataType:"json",
                        beforeSend:function(){
                            $('#' + id).text('Deleting...');
                        },
                        success:function(data){
                            if(data.success){
                                $('#' + id).text('Deleted');
                                $.alert({
                                    title: 'Success Message',
                                    content: 'Data Deleted',
                                    type: 'green',
                                })
                                setTimeout(function(){
                                  return loadData();
                                }, 2000);
                            }
                        }
                    })
                }
            },
            cancel:  {
                text: 'cancel',
                btnClass: 'btn-red',
                keys: ['enter', 'shift'],
                // action: function(){
                //     $.alert('Canceled!');
                // }
            }
        }
    });
    
});



</script>
@endsection

