@extends('../layouts.app')
@section('sub-title','Personal Information')
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
                <h1 class="m-0 text-dark">Personal Information Records</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item " ><button type="button" name="create_record" id="create_record" data-toggle="modal" data-target="#exampleModal" class="btn-info">Set to default</button></li>
                    <li class="breadcrumb-item"><a href="/personalinfo">Personal Info</a></li>
                    <li class="breadcrumb-item " ><a href="/dashboard" class="text-dark">Dashboard</a></li>
                </ol>

                </div><!-- /.col -->

            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
              <h3>{{Session::get('msg')}}</h3>


                <div id="showAllDataHere" class="card-body table-responsive">
                  <table id="table" class="table table-bordered table-hover">
                  <thead class="bg-light">
                      <tr>
                          <th width=200>Action</th>
                          <th>Intro Greetings</th>
                          <th>What I do</th>
                          <th>Profile Pic</th>

                          <th width=160>More About Me</th>
                          <th width=160>College Desc</th>
                          <th width=160>SeniorHigh Desc</th>
                          <th width=160>JuniorHigh Desc</th>
                          <th>Resume File</th>
                          <th>Cover Img</th>
                          
                          
                          
                      </tr>
                  </thead>
                  <tbody>
                  <tfoot class="bg-light">
                      <tr>
                          <th width=200>Action</th>
                          <th>Intro Greetings</th>
                          <th>What I do</th>
                          <th>Profile Pic</th>

                          <th width=160>More About Me</th>
                          <th width=160>College Desc</th>
                          <th width=160>SeniorHigh Desc</th>
                          <th width=160>JuniorHigh Desc</th>
                          <th>Resume File</th>
                          <th>Cover Img</th>

                      
                      </tr>
                  </tfoot>
                  </table>
               </div>

                        {{--insert  modal  --}}
                    <!-- Button trigger modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <form id="form-submit" action="" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <span id="form_result"></span>
                                  <div class="form-group">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required />
                                  </div>
                                  <div class="form-group">
                                    <textarea class="form-control" id="description" name="description" placeholder="Enter description" required></textarea>
                                  </div>
                                <input id="Imag" type="file" accept="image/*" name="image" />
                                <div id="preview"><img src="" /></div><br>
                                <input class="btn btn-success" type="submit" value="Upload">
                                <input type="hidden" name="_token" id="csrftoken" value="{{ csrf_token() }}">
                              </form>
                          </div>
                          <div class="modal-footer showError">


                          </div>
                        </div>
                      </div>
                    </div>



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
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{url('personalinfo/2')}}" method="post" id="edit" enctype="multipart/form-data">
                             


                            </form>
                          </div>
                          <div class="modal-footer showError">


                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
  </div>

  <div class="load"></div>
  <div class="loading"></div>

@endsection

@section('footer')
    @include('../components.footer')
@endsection

@section('script')

  <script>

   $(document).ready(function(){
            $('.loading').hide()
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('personalinfo.index') }}",
                    beforeSend: function() { $('.loading').show() },
                    complete: function() { $('.loading').hide() },
                },
                columns: [
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                    {
                        data: 'intro_greetings',
                        name: 'intro_greetings'
                    },
                    {
                        data: 'what_i_do',
                        name: 'what_i_do'
                    },
                    {
                    "data": "profile_pic",
                    "render": function (data) {
                        return '<img src="' + data + '" class="avatar" width="100" height="70"/>';
                        }
                    },
                    {
                        data: 'more_about_me',
                        name: 'more_about_me'
                    },
                    {
                        data: 'college_desc',
                        name: 'college_desc'
                    },
                    {
                        data: 'senior_high_desc',
                        name: 'senior_high_desc'
                    },
                    {
                        data: 'junior_high_desc',
                        name: 'junior_high_desc'
                    },
                    {
                        data: 'resume',
                        name: 'resume'
                    },
                    {
                    "data": "cover_img",
                    "render": function (data) {
                        return '<img src="' + data + '" class="avatar" width="100" height="70"/>';
                        }
                    },
                    
                    
                    
                ]
             });

            $("#edit").on("submit", function(arg){
                arg.preventDefault();
                // var form =$(this);
                var ids= $('#update').val()
                $.ajax({
                  url: "personalinfo/"+ids,
                  type: "POST",
                        dataType: "JSON",
                        contentType: false,
                        cache: false,
                        processData: false,
                        data:  new FormData(this),
                  beforeSend: function(){
                    $(".load").fadeIn();
                  },
                  success: function(response){
                    if(response == "success"){
                      setTimeout(function(){
                            $('#table').DataTable().ajax.reload();
                            $('#exampleModal2').modal('hide');
                            $.alert({
                                title: 'Updated Data',
                                content: 'Click ok to continue.',
                                type: 'green',
                                  })
                            }, 500);
                     
                      
                    }
                  },
                        error: function(xhr, XMLHttpRequest, textStatus, errorThrown) {
                            // alert(xhr.responseText);
                            return getErrorData(xhr.responseText);

                          }

                });

             });
           
  
          })
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
function singleview(v){
    $.ajax({
        type:"get",
        url:'personalinfo/'+v,
        dataType: "html",
        success: function(response){
        $('#view').html(response);
        }
    })
}

//Edit
function edit(v){
    $.ajax({
        type:"get",
        url:'personalinfo/'+v+'/edit',
        dataType: "html",
        success: function(response){
        $('#edit').html(response);

        }
    })
}


// Delete Data
$(document).on("click", "#delete", function(arg){
    arg.preventDefault();
    var id = $(this).val();
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
                      url: 'personalinfo/'+id,
                      type: "DELETE",
                      data:{
                      _token:token,
                      },
                      dataType: "JSON",
                      success(response){
                        setTimeout(function(){
                            
                            $('#table').DataTable().ajax.reload();
                            $.alert({
                                title: 'Deleted Data',
                                content: 'Click ok to continue.',
                                type: 'blue',
                                  })
                            }, 500);
                        }
                    })
                }
            },
            cancel:  {
                text: 'cancel',
                btnClass: 'btn-red',
                keys: ['enter', 'shift'],
                action: function(){
                      $.alert('Canceled!');
                  }
            }
        }
    });

})



  </script>
@endsection
