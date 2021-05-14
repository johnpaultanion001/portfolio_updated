@extends('../layouts.app')
@section('sub-title','Projects')
@section('navbar')
    @include('../components.navbar')
@endsection
@section('main-sidebar')
    @include('../components.main-sidebar')
@endsection

@section('main-content')
<div class="content-wrapper">
<div class="container">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Projects Records</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item " ><button type="button" name="create_record" id="create_record" class="btn btn-dark">Create Record</button></li>
                    <li class="breadcrumb-item"><a href="/projects">Projects</a></li>
                    <li class="breadcrumb-item " ><a href="/dashboard" class="text-dark">Dashboard</a></li>
                </ol>

                </div><!-- /.col -->

            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
           
        <div class="card-body">
          <div id="loadtable" class="table-responsive">               
             
          </div>
        </div>
               
      
        <!-- form for all -->
        <form method="post" id="myForm" class="form-horizontal ">
            @csrf
            <div class="modal" id="formModal">
            <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                
                        <!-- Modal Header -->
                        <div class="modal-header bg-light">
                            <p class="modal-title text-dark font-weight-bold">Modal Heading</p>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                
                        <!-- Modal body -->
                        <div class="modal-body">
                            <span id="form_result"></span>
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                      <input type="text" class="form-control form-input" id="title" name="title" placeholder="Enter title" />
                                      <span class="invalid-feedback" role="alert">
                                        <strong id="error-title"></strong>
                                      </span>
                                    </div>
                                    <div class="form-group">
                                      <textarea class="form-control form-input" id="description" name="description" placeholder="Enter description"></textarea>
                                      <span class="invalid-feedback" role="alert">
                                        <strong id="error-description"></strong>
                                      </span>
                                    </div>
                                    <div class="form-group">
                                       <input class="form-control form-input" id="img" type="file" accept="image/*" name="img" />
                                        <span class="invalid-feedback" role="alert">
                                          <strong id="error-img"></strong>
                                        </span>
                                    </div>
                                    <img id="image" alt="image" width=100/><br>
                                </div>
                            </div>                     
                            
                            <input type="hidden" name="action" id="action" value="Add" />
                            <input type="hidden" name="hidden_id" id="hidden_id" />
                        </div>
                
                        <!-- Modal footer -->
                        <div class="modal-footer bg-light">
                            <input type="submit" name="action_button" id="action_button" class="btn text-white btn-dark" value="Save" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                
                    </div>
                </div>
            </div>
        </form>



                    {{--  //viewModal  --}}
                    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-vcard"></i> View Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container">
                              <div class="row" id="view">

                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            {{-- <button type="submit" class="btn btn-dark" id="addbutton">Save</button> --}}
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Edit Modal -->
                    {{-- <input type="hidden" name="_token" id="csrftoken2" value="{{ csrf_token() }}"> --}}
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{url('projects/2')}}" method="post" id="edit" enctype="multipart/form-data">
                             


                            </form>
                          </div>
                          <div class="modal-footer showError">


                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
  </div>

  <div class="loading"></div>

@endsection

@section('footer')
    @include('../components.footer')
@endsection

@section('script')
<script>
$(function () {
  return loadData();
});
          
$('#create_record').click(function(){
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('.modal-title').text('Add New Record');
    $('#action_button').val('Save');
    $('#action').val('Add');
    $('#form_result').html('');
    $('#formModal').modal('show');
});

$('#myForm').on('submit', function(event){
    event.preventDefault();
    var form = $(this);
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('projects.store') }}";
    var type = "POST";

    if($('#action').val() == 'Edit'){
        var id = $('#hidden_id').val();
        action_url = "/projects/" + id;
        type = "PUT";
    }

    $.ajax({
        url: action_url,
        method:type,
        dataType:"json",
        data:  new FormData(this),
        contentType: false,
         cache: false,
         processData: false,
      
        
        success:function(data){
            var html = '';
            if(data.errors){
                $.each(data.errors, function(key,value){
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                })
            }
            if(data.success){
                $('.form-control').removeClass('is-invalid')
                $('.modalloading').hide();
                form[0].reset();
                $('#formModal').modal('hide');
                $.alert({
                  title: 'Success Message',
                  content: data.success,
                  type: 'green',
                });
                return loadData();
            }
            $('#form_result').html(html);
        }
    });
});

$(document).on('click', '.edit', function(){
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('#form_result').html('');
    var id = $(this).attr('edit');

    $.ajax({
        url :"/projects/"+id+"/edit",
        dataType:"json",
        success:function(data){
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).val(value)
                    if(key == 'image'){
                      $('#image').attr("src", value);
                    }
                }
            })
            $('#hidden_id').val(id);
            $('.modal-title').text('Edit Record');
            $('#action_button').val('Update');
            $('#action').val('Edit');
            $('#formModal').modal('show');
        }
    })
});

$(document).on('click', '.view', function(){
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('.form-input').attr("disabled", true)
    $('#form_result').html('');
    var id = $(this).attr('view');
    $.ajax({
        url :"/projects/"+id,
        dataType:"json",
        success:function(data){
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).val(value)
                    if(key == 'image'){
                      $('#image').attr("src", value);
                    }
                }
            })
            $('.modal-title').text('View Record');
            $('#action_button').hide();
            $('#formModal').modal('show');
        }
    })
});

function loadData(){
    $.ajax({
        url: "load", 
        type: "get",
        dataType: "HTMl",
        beforeSend: function() { $('.loading').show() },
        success: function(response){
            $('.loading').hide();
            $("#loadtable").html(response);
        }	
    })
}

// $("#edit").on("submit", function(arg){
//     arg.preventDefault();
//     // var form =$(this);
//     var ids= $('#update').val()
//     $.ajax({
//       url: "projects/"+ids,
//       type: "POST",
//             dataType: "JSON",
//             contentType: false,
//             cache: false,
//             processData: false,
//             data:  new FormData(this),
//       beforeSend: function(){
//         $(".load").fadeIn();
//       },
//       success: function(response){
//         if(response == "success"){
          
//           setTimeout(function(){
//                 $('#table').DataTable().ajax.reload();
//                 $('#exampleModal2').modal('hide');
//                 $.alert({
//                     title: 'Updated Data',
//                     content: 'Click ok to continue.',
//                     type: 'green',
//                       })
//                 }, 500);
          
          
//         }
//       },
//             error: function(xhr, XMLHttpRequest, textStatus, errorThrown) {
//                 // alert(xhr.responseText);
//                 return getErrorData(xhr.responseText);

//               }

//     });

//   });
  
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


//single view
// function singleview(v){
//     $.ajax({
//         type:"get",
//         url:'projects/'+v,
//         dataType: "html",
//         success: function(response){
//         $('#view').html(response);
//         }
//     })
// }

//Edit
function edit(v){
    $.ajax({
        type:"get",
        url:'projects/'+v+'/edit',
        dataType: "html",
        success: function(response){
        $('#edit').html(response);

        }
    })
}

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
                        url:'projects/'+id,
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
