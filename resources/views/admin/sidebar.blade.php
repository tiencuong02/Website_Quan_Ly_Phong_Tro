
    <aside class="app-sidebar">
    <div class="app-sidebar__user">
      <a href="{{ route('dashboard') }}"> 
        <img class="app-sidebar__user-avatar" src="{{url('/')}}/dist/img/avatar2.png" width="50px" alt="User Image">
      </a>
      <div>
          <p class="app-sidebar__user-name"><b>{{$adminLogin->getName()}}</b></p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
        <li>
          <a class="app-menu__item" href="{{ route('admin_users.index') }}">
            <i class='app-menu__icon bx bx-id-card'></i>
            <span class="app-menu__label">Quản lý thành viên</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="{{ route('motels.index') }}">
            <i class='app-menu__icon bx bx-task'></i>
            <span class="app-menu__label">Quản lý phòng trọ</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="{{ route('dashboard') }}">
            <i class='app-menu__icon bx bx-pie-chart-alt-2'></i>
            <span class="app-menu__label">Báo cáo thống kê</span>
          </a>
        </li>
  </aside>