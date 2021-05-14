<table id="table" class="table table-bordered  table-hover datatable-projects">
                  <thead class="bg-light">
                      <tr>
                          <th width="10"></th>
                          <th>Action</th>
                          <th>ID.</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Image</th>
                      </tr>
                  </thead>
                    <tbody>
                      @foreach($projects as $key => $project)
                          <tr data-entry-id="{{ $project->id ?? '' }}">
                              <td></td>
                              <td>
                              <button type="button" name="view" view="{{  $project->id ?? '' }}" class="view btn btn-success btn-sm mt-1 " data-toggle="tooltip" data-placement="right" data-original-title="Click this to view your project"><i class="far fa-eye"></i></button>
                              <button type="button" name="edit" edit="{{  $project->id ?? '' }}" class="edit btn btn-info btn-sm mt-1 " data-toggle="tooltip" data-placement="right" data-original-title="Click this to edit your project"><i class="far fa-edit"></i></button>
                              <button type="button" name="delete" delete="{{  $project->id ?? '' }}" id="{{  $project->id ?? '' }}" class="delete btn btn-danger btn-sm mt-1" data-toggle="tooltip" data-placement="right" data-original-title="Click this to delete your project"><i class="far fa-trash-alt"></i></button>
                              </td>
                              <td>
                                  {{  $project->id ?? '' }}
                              </td>
                              <td>
                                  {{  $project->title ?? '' }}
                              </td>
                              <td>
                                  {{  $project->description ?? '' }}
                              </td>
                              <td>
                                  <img src="{{  $project->image ?? '' }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" width=100 height=100>
                              </td>
                          </tr>
                      @endforeach
                    </tbody>
                  <tfoot class="bg-light">
                      <tr>
                          <th width="10"></th>
                          <th>Action</th>
                          <th>ID.</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Image</th>
                      </tr>
                  </tfoot>
            </table>

<script>
$(function () {
  $('.showError').html('');
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,

  });

  $('.datatable-projects:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });

    $(document).ready(function(){
        $("button").tooltip();
    });
});

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
                      url: 'projects/'+id,
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

});


</script>