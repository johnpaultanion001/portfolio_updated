<div class="header">
  <div class="menu-circle"></div>
  <div class="header-menu">
   <a class="menu-link {{ request()->is('admin/dashboard') || request()->is('admin/dashboard/*') ? 'is-active' : '' }} " href="/admin/dashboard">Dashboard</a>
   <a class="menu-link notify {{ request()->is('admin/messages') || request()->is('admin/messages/*') ? 'is-active' : '' }} " href="{{ route("admin.messages.index") }}">Messages</a>
   <a class="menu-link notify {{ request()->is('admin/projects') || request()->is('admin/projects/*') ? 'is-active' : '' }} " href="{{ route("admin.projects.index") }}">Projects</a>
   <a class="menu-link {{ request()->is('admin/portfolio') || request()->is('admin/portfolio/*') ? 'is-active' : '' }} " href="/admin/portfolio">Portfolio</a>
   
  </div>
  <div class="search-bar">
   <input type="text" placeholder="Search">
  </div>
  <div class="header-profile">

   
    <div class="dark-light">
        <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" /></svg>
    </div>
   
   <a href="">
      <i class="fas fa-sign-out-alt " style="color: #fff; font-size: 22px; padding-left: 20px;"></i>
    </a> 

   <img class="profile-img" src="/{{$portfolio->profile_pic}}" alt="">
    
  </div>
 </div>