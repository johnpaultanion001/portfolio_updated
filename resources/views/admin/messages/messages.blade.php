@extends('../layouts.admin')
@section('sub-title','Messages')
@section('navbar')
    @include('../components.navbar-admin')
@endsection
@section('sidebar')
    @include('../components.sidebar-admin')
@endsection

@section('content')
<div class="main-container">
    <div class="main-header">
        <a class="menu-link-main" href="#">Messages</a>
    </div>
    
    <div class="content-wrapper">
        <div class="content-section">
            <div class="content-section-title">All Messages</div>
                <div id="loaddata">
                
                </div>
        </div>
        
    </div>
    
</div>
<div class="loading"></div>



@endsection

@section('script')
<script>
//loading messages
$(function () {
  return loadData();
});

//load data
function loadData(){
    $.ajax({
        url: "loadmessages", 
        type: "get",
        dataType: "HTMl",
        beforeSend: function() { $('.loading').show() },
        success: function(response){
            $('.loading').hide();
            $("#loaddata").html(response);
        }	
    })
}
//open messages
$('#open_msg').click(function(){
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('.modal-title').text('Add New Record');
    $('#action_button').val('Save');
    $('#action').val('Add');
    $('#form_result').html('');
    $('#msgModal').modal('show');
});


//delete messages
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
                        url:'/admin/messages/'+id,
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
               
            }
        }
    });
    
});

  </script>
@endsection

