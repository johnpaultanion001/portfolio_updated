@extends('../layouts.admin')
@section('sub-title','Dashboard')
@section('navbar')
    @include('../components.navbar-admin')
@endsection
@section('sidebar')
    @include('../components.sidebar-admin')
@endsection

@section('content')
<div class="main-container">
    <div class="main-header">
        <a class="menu-link-main" href="#">Dashboard</a>
    </div>
    
    <div class="content-wrapper">
        <div class="content-wrapper-header">
            <div class="content-wrapper-context">
            <h3 class="img-content">{{$greetings}} Boss, {{ auth()->user()->name }} </h3>            
            </div>
            <img class="content-wrapper-img" src="https://assets.codepen.io/3364143/glass.png" alt="">
        </div>

       <div class="content-section">
          <div class="content-section-title">Today</div>
            <div class="apps-card">
                <div class="app-card">
                
                    <span>
                        <svg viewBox="0 0 512 512" fill="currentColor">
                            <path d="M352 0H64C28.704 0 0 28.704 0 64v320a16.02 16.02 0 009.216 14.496A16.232 16.232 0 0016 400c3.68 0 7.328-1.248 10.24-3.712L117.792 320H352c35.296 0 64-28.704 64-64V64c0-35.296-28.704-64-64-64z" />
                            <path d="M464 128h-16v128c0 52.928-43.072 96-96 96H129.376L128 353.152V400c0 26.464 21.536 48 48 48h234.368l75.616 60.512A16.158 16.158 0 00496 512c2.336 0 4.704-.544 6.944-1.6A15.968 15.968 0 00512 496V176c0-26.464-21.536-48-48-48z" />
                        </svg>
                        Total Messages 
                            <span class="notification-number totals">
                                @if($msgs->count() > 0 ) 
                                    {{ count($msgs) }}
                                @else
                                    0
                                @endif
                            </span>
                    </span>
                    
                    <div class="app-card__subtext">Newest Message From:@if($msg_new === null) No Data @else {{ $msg_new->name }}  @endif</div>
                    <div class="app-card-buttons">
                        <button class="content-button status-button">More Info.</button>
                    </div>
                </div>
                <div class="app-card">
                    <span>
                     <i class="nav-icon fas fa-project-diagram text-white" style="padding-right: 6px;"></i>
                        Total Projects  
                            <span class="notification-number totals">
                                @if($projects->count() > 0 ) 
                                    {{ count($projects) }}
                                @else
                                    0
                                @endif
                            </span>
                    </span>
                    <div class="app-card__subtext">Newest Project Titled: {{$project_new->title}}</div>
                    <div class="app-card-buttons">
                        <button class="content-button status-button">More Info.</button>
                    </div>
                </div>
                <div class="app-card">
                    <span>
                        <svg viewBox="0 0 512 512" fill="currentColor">
                        <path d="M196 151h-75v90h75c24.814 0 45-20.186 45-45s-20.186-45-45-45z" />
                        <path d="M467 0H45C20.186 0 0 20.186 0 45v422c0 24.814 20.186 45 45 45h422c24.814 0 45-20.186 45-45V45c0-24.814-20.186-45-45-45zM196 271h-75v105c0 8.291-6.709 15-15 15s-15-6.709-15-15V136c0-8.291 6.709-15 15-15h90c41.353 0 75 33.647 75 75s-33.647 75-75 75zm210-60c8.291 0 15 6.709 15 15s-6.709 15-15 15h-45v135c0 8.291-6.709 15-15 15s-15-6.709-15-15V241h-15c-8.291 0-15-6.709-15-15s6.709-15 15-15h15v-45c0-24.814 20.186-45 45-45h30c8.291 0 15 6.709 15 15s-6.709 15-15 15h-30c-8.276 0-15 6.724-15 15v45h45z" />
                        </svg>
                        Portfolio
                    </span>
                    <div class="app-card__subtext">Portfolio Last Updated: {{ $portfolio->updated_at->format('l jS \\of F Y h:i:s A') }}</div>
                    <div class="app-card-buttons">
                        <button class="content-button status-button">More Info.</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- modal -->
 <div class="pop-up">
    <div class="pop-up__title">Update This App
        <svg class="close" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
        <circle cx="12" cy="12" r="10" />
        <path d="M15 9l-6 6M9 9l6 6" />
        </svg>
        </div>
        <div class="pop-up__subtitle">Adjust your selections for advanced options as desired before continuing. <a href="#">Learn more</a></div>
        <div class="checkbox-wrapper">
        <input type="checkbox" id="check1" class="checkbox">
        <label for="check1">Import previous settings and preferences</label>
        </div>
        <div class="checkbox-wrapper">
        <input type="checkbox" id="check2" class="checkbox">
        <label for="check2">Remove old versions</label>
        </div>
        <div class="content-button-wrapper">
        <button class="content-button status-button open close">Cancel</button>
        <button class="content-button status-button">Continue</button>
    </div>
</div>
<!-- modal -->
@endsection
