<aside class="sidebar trans-0-4">
    <!-- Button Hide sidebar -->
    <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

    <!-- - -->
    <ul class="menu-sidebar p-t-95 p-b-70">
      <li class="t-center m-b-13">
        <a href="{{route('home')}}" class="txt19">Home</a>
      </li>
      <li class="t-center m-b-13">
        <a href="{{route('profile.index')}}" class="txt19">Thông tin cá nhân</a>
      </li>
      @if(in_array($adminLogin->getRole(), [2]))
      <li class="t-center m-b-13">
        <a href="{{route('motels.create')}}" class="txt19">Đăng phòng thuê</a>
      </li>
      <li class="t-center m-b-13">
        <a href="{{route('motels.index')}}" class="txt19">Quản lý tin đăng</a>
      </li>
      @endif
      <li class="t-center m-b-13">
        <a href="{{route('password',$adminLogin->id)}}" class="txt19">Đổi mật khẩu</a>
      </li>
      <li class="t-center m-b-13">
        <a class="app-nav__item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"> LOGOUT
            <form id="frm-logout" action="{{route('logout')}}" method="POST" style="display: none;">{{ csrf_field() }} </form>
        </a>  
      </li>
    </ul>
  </aside>