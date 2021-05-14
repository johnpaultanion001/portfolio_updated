<div class="pop-up__title">Date: {{ $message->created_at->format('l jS \\of F Y h:i:s A') }}
    <svg class="close" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
        <circle cx="12" cy="12" r="10" />
        <path d="M15 9l-6 6M9 9l6 6" />
    </svg>
</div>
<div class="pop-up__title">Email: {{ $message->email }}
    
</div>
<div class="pop-up__title">Name: {{ $message->name}}
    
</div>
<div class="pop-up__subtitle"><svg viewBox="0 0 512 512" fill="currentColor">
                        <path d="M352 0H64C28.704 0 0 28.704 0 64v320a16.02 16.02 0 009.216 14.496A16.232 16.232 0 0016 400c3.68 0 7.328-1.248 10.24-3.712L117.792 320H352c35.296 0 64-28.704 64-64V64c0-35.296-28.704-64-64-64z" />
                        <path d="M464 128h-16v128c0 52.928-43.072 96-96 96H129.376L128 353.152V400c0 26.464 21.536 48 48 48h234.368l75.616 60.512A16.158 16.158 0 00496 512c2.336 0 4.704-.544 6.944-1.6A15.968 15.968 0 00512 496V176c0-26.464-21.536-48-48-48z" />
                    </svg>{{$message->msg}}</div>

<div class="pop-up__title"></div>

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

 $(".status-button:not(.open)").click(function () {
    $(".pop-up").addClass("visible");
});

$(".pop-up .close").click(function () {
    $(".pop-up").removeClass("visible");
});

</script>