@extends('../layouts.app')
@section('sub-title','Contact Information')
@section('navbar')
    @include('../components.navbar')
@endsection
@section('main-sidebar')
    @include('../components.main-sidebar')
@endsection

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Contact Information Records</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item " ><button type="button" name="create_record" id="create_record" data-toggle="modal" data-target="#exampleModal" class="btn-info">Create Record</button></li>
                    <li class="breadcrumb-item"><a href="/contactinfos">Contact Info</a></li>
                    <li class="breadcrumb-item " ><a href="/dashboard" class="text-dark">Dashboard</a></li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="card-body table-responsive">
            <table id="table" class="table table-bordered table-hover">
            <thead class="bg-light">
                <tr>
                    <th width=50>No.</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th width=160>Action</th>
                </tr>
            </thead>
            <tbody>
            <tfoot class="bg-light">
                <tr>
                    <th width=50>No.</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th width=160>Action</th>
                </tr>
            </tfoot>
            </table>
        </div>


        <div class="loading"></div>

    <form method="post" id="myForm" class="form-horizontal ">
            @csrf
            <div class="modal" id="formModal">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                
                        <!-- Modal Header -->
                        <div class="modal-header bg-light">
                            <p class="modal-title text-info font-weight-bold">Modal Heading</p>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                
                        <!-- Modal body -->
                        <div class="modal-body">
                            <span id="form_result"></span>
                            
                            <div class="form-group">
                                <label class="control-label col-md-4" >Category : </label>
                                <select name="category_id" id="category_id" class="form-control select2">
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-category_id"></strong>
                                </span>
                            </div>
                               
                            <div class="form-group">
                                <label class="control-label col-md-12" >Value: </label>
                                <input type="text" name="valueofcontact" id="valueofcontact" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-valueofcontact"></strong>
                                </span>
                            </div>
                            


                            <input type="hidden" name="action" id="action" value="Add" />
                            <input type="hidden" name="hidden_id" id="hidden_id" />
                        </div>
                
                        <!-- Modal footer -->
                        <div class="modal-footer bg-light">
                            <input type="submit" name="action_button" id="action_button" class="btn btn-info" value="Save" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                
                    </div>
                </div>
            </div>
        </form>

        
    </div>
    
       
    <!-- /.content-wrapper -->
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
                    url: "{{ route('contactinfos.index') }}",
                    beforeSend: function() { $('.loading').show() },
                    complete: function() { $('.loading').hide() },
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'valueofcontact',
                        name: 'valueofcontact'
                    },
                    
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
             });

            
            $('#create_record').click(function(){
                $('#myForm')[0].reset();
                $('#category_id').select2({
                    theme:'bootstrap4',
                    placeholder: 'Select category'
                })
                $('.form-control').removeClass('is-invalid')
                $('.modal-title').text('Add New Record');
                $('#action_button').val('Save');
                $('#action').val('Add');
                $('#form_result').html('');
                $('#formModal').modal('show');
            });


            $('#myForm').on('submit', function(event){
                event.preventDefault();
                $('.form-control').removeClass('is-invalid')
                var action_url = "{{ route('contactinfos.store') }}";
                var type = "POST";

                if($('#action').val() == 'Edit'){
                    var id = $('#hidden_id').val();
                    action_url = "contactinfos/" + id;
                    type = "PUT";
                }

                $.ajax({
                    url: action_url,
                    method:type,
                    data:$(this).serialize(),
                    dataType:"json",
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
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            $('.form-control').removeClass('is-invalid')
                            $('#myForm')[0].reset();
                            $('#category_id').select2({
                                theme:'bootstrap4',
                                placeholder: 'Select category'
                            })
                            $('#table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    }
                });
            });

            
            $(document).on('click', '.edit', function(){
                $('#myForm')[0].reset();
                $('#category_id').select2({
                    theme:'bootstrap4',
                    placeholder: 'Select category'
                })
                $('.form-control').removeClass('is-invalid')
                $('#form_result').html('');
                var id = $(this).attr('edit');

                $.ajax({
                    url :"contactinfos/"+id+"/edit",
                    dataType:"json",
                    success:function(data){
                        $.each(data.result, function(key,value){
                            if(key == $('#'+key).attr('id')){
                                $('#'+key).val(value)
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



            $(document).on('click', '.delete', function(){
                var id = $(this).attr('delete');
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
                                    url:"contactinfos/"+id,
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
                                            setTimeout(function(){
                                                $('#' + id).text('Deleted');
                                                $('#table').DataTable().ajax.reload();
                                                 $.alert({
                                                     title: 'success',
                                                     content: 'Click ok to continue.',
                                                     type: 'blue',
                                                 })
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
                            action: function(){
                                 $.alert('Canceled!');
                             }
                        }
                    }
                });
                
            });

        })
    </script>
@endsection



    