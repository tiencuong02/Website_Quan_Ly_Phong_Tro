@if(in_array($adminLogin->getRole(), [1]))

<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body onload="time()" class="app sidebar-mini rtl">
   <!-- Navbar-->
   <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
      <li>
        <a class="app-nav__item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
          <i class='bx bx-log-out bx-rotate-180'>
            <form id="frm-logout" action="{{route('logout')}}" method="POST" style="display: none;">{{ csrf_field() }}
          </form>
          </i> 
        </a>
      </li>
    </ul>
  </header>
    @include('admin.sidebar')
    <main class="app-content">
      <div class="app-title">
        <div id="clock"></div>
      </div>
      <section class="content">
        @include('alert')
        @yield('content')
      </section>
    </main>
  @include('admin.footer')
</body>
</html>

@endif