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
        <div class="row">
          <div class="col-md-12">
            <div class="app-title">
              <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><b>Bảng điều khiển</b></li>
              </ul>
              <div id="clock"></div>
            </div>
          </div>
        </div>
        <section class="content">
          @yield('content')
        </section>
        <div class="row">
          <!--Left-->
          <!-- col-6 -->
          <div class="col-md-4">
            <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-book fa-3x'></i>
              <div class="info">
                <a href="{{ route('motels.index') }}">
                  <h4>Tổng các nhà trọ</h4>
                  <p><b>{{$motels}} nhà trọ</b></p>
                </a>
              </div>
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-4">
            <div class="widget-small warning coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
              <div class="info">
                <a href="{{ route('admin_users.index') }}">
                  <h4>Tổng thành viên</h4>
                  <p><b>{{$users}} người thành viên</b></p>
                </a>
              </div>
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-4">
            <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-chart'></i>
              <div class="info">
                <a href="#">
                  <h4>Tổng phòng trọ đã đăng</h4>
                  <p><b> {{$summotels1}} nhà trọ đã đăng  </b></p>
                </a>
              </div>
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-4">
            <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-chart'></i>
              <div class="info">
                <a href="#">
                  <h4>Tổng phòng trọ đã cho thuê</h4>
                  <p><b> {{$summotels2}} nhà trọ thuê  </b></p>
                </a>
              </div>
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-4">
            <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-chart'></i>
              <div class="info">
                <a href="#">
                  <h4>Tổng phòng trọ chờ duyệt</h4>
                  <p><b> {{$summotels3}} nhà trọ đang chờ duyệt  </b></p>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-chart'></i>
              <div class="info">
                <a href="#">
                  <h4>Tổng tin đăng trong tháng</h4>
                  <p><b> {{$summotels4}} tin </b></p>
                </a>
              </div>
            </div>
          </div>
        </div>
        
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title"> Tin đăng gần đây</h3>
            <div>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên phòng trọ</th>
                    <th>Địa chỉ </th>
                    <th>Giá phòng</th>
                    <th>Trạng thái</th>
                  </tr>
                </thead>
  
                <tbody>
                    @foreach($motel as $stt => $motel)
                        <tr>
                            <td>{{$stt+1}}</td>
                            <td>{{$motel->title}}</td>
                            <td>{{$motel->address}}</td>
                            <td>{{$motel->price}}</td>
                            <td>@if($motel->approve == 1)
                                    <span class="badge bg-success">Đã duyệt</span>
                                @elseif($motel->approve == 2)
                                    <span class="badge bg-danger">Đã cho thuê</span>
                                @else
                                    <span class="badge bg-info">Chờ duyệt</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                </tbody>
              </table>
            </div>
          
        </div>
      </main>  
  @include('admin.footer')
</body>
</html>

@endif