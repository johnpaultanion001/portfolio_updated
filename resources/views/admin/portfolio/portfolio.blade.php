@extends('../layouts.admin')
@section('sub-title','Portfolio')
@section('navbar')
    @include('../components.navbar-admin')
@endsection
@section('sidebar')
    @include('../components.sidebar-admin')
@endsection

@section('content')
<div class="main-container">
    <div class="main-header">
        <a class="menu-link-main" href="#">Portfolio</a>
    </div>
    
    <div class="content-wrapper">
        <div class="content-section">
            <div class="content-section-title">Edit Portfolio</div>
                <div id="loaddata">
                
                </div>
        </div>
        
    </div>
    
</div>
<div class="loading"></div>



@endsection

@section('script')
<script>
//loading prortfolio
$(function () {
  return loadData();
});

//load data
function loadData(){
    $.ajax({
        url: "loadportfolio", 
        type: "get",
        dataType: "HTMl",
        beforeSend: function() { $('.loading').show() },
        success: function(response){
            $('.loading').hide();
            $("#loaddata").html(response);
        }	
    })
}
</script>
@endsection

