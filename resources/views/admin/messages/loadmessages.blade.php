<ul>
    @if(count($messages) > 0)
        @foreach($messages as $msg)
            <li class="adobe-product">
                <div class="products">
                    <svg viewBox="0 0 512 512" fill="currentColor">
                        <path d="M352 0H64C28.704 0 0 28.704 0 64v320a16.02 16.02 0 009.216 14.496A16.232 16.232 0 0016 400c3.68 0 7.328-1.248 10.24-3.712L117.792 320H352c35.296 0 64-28.704 64-64V64c0-35.296-28.704-64-64-64z" />
                        <path d="M464 128h-16v128c0 52.928-43.072 96-96 96H129.376L128 353.152V400c0 26.464 21.536 48 48 48h234.368l75.616 60.512A16.158 16.158 0 00496 512c2.336 0 4.704-.544 6.944-1.6A15.968 15.968 0 00512 496V176c0-26.464-21.536-48-48-48z" />
                    </svg>
                    {{$msg->name}}
                </div>
                <span class="status">
                    <i class="fas fa-calendar-day" style="color: #fff; font-size: 22px; padding-right: 10px;"></i> {{ $msg->created_at->format('l jS \\of F Y h:i:s A') }}
                </span>
                <div class="button-wrapper">

                    
                    <button  type="button" onclick="singleview(this.value)" value="{{$msg->id}}"  id="v{{$msg->id}}"  class="content-button status-button btn btn-primary m-2"><i class="far fa-envelope"></i></button>
                    <button  type="button" name="delete"  delete="{{  $msg->id ?? '' }}" id="{{  $msg->id ?? '' }}"  class="delete btn btn-danger"><i class="far fa-trash-alt"></i></button>
                   

                </div>
            </li>
        @endforeach
    @else
        <li class="adobe-product">
            <span class="status">
               No messages found
            </span>
        </li>
    @endif   
<!-- modal -->
<div class="pop-up" id="msgview">
    
</div>
<!-- modal -->
</ul>

<script>
 
 //dark bg
 $(function () {
  $(".status-button:not(.open)").on("click", function (e) {
   $(".overlay-app").addClass("is-active");
  });
  $(".pop-up .close").click(function () {
   $(".overlay-app").removeClass("is-active");
  });
 });
 
 //open modal
 function singleview(v){
    $(".status-button:not(.open)").click(function () {
        $(".pop-up").addClass("visible");
    });
 
    $(".pop-up .close").click(function () {
        $(".pop-up").removeClass("visible");
    });
    
	$.ajax({
		type:"get",
		url:'/admin/messages/'+v,
		dataType: "html",
        beforeSend: function() { $('.loading').show() },
		success: function(response){
		    $('#msgview').html(response);
            $('.loading').hide();
		}
		
	})
}

</script>