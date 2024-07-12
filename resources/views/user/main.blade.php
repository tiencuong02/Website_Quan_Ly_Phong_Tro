@if(in_array($adminLogin->getRole(), [2,3]))
<!DOCTYPE html>
<html lang="en">
<head>
  @include('user.head')
</head>
<body class="animsition">

  <!--Header-->
  @include('user.header')

  <!-- Sidebar -->
  @include('user.sidebar')
  <section class="section-intro">
    <div class="content-intro bg-white p-t-77 p-b-133">
      <div class="container">
        <h3 class="m-b-13"><center>DANH SÁCH PHÒNG TRỌ</center></h3>
          <form action="{{ route('search') }}" method="GET">
            <div class="row">
              <div class="col-md-6">
                <input type="text" name="address" class="form-control" placeholder="Địa chỉ"><br>
              </div>
              <div class="col-md-6">
                <input type="text" name="utilities" class="form-control" placeholder="Tiện ích"><br>
              </div>
              <div class="col-md-6">             
                <select name="area" id="" class="form-control">
                  <option value="0">Tìm kiếm theo diện tích</option>
                  <option value="1">20m2 - 30m2</option>
                  <option value="2">30m2 - 40m2</option>
                  <option value="3">40m2 - 50m2</option>
                  <option value="4">Trên 50m2</option>
                </select>
              </div>
              <div class="col-md-6">             
                <select name="price" id="" class="form-control">
                  <option value="0">Tìm kiếm theo giá</option>
                  <option value="1">500.000 VNĐ - 1.000.000 VNĐ</option>
                  <option value="2">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                  <option value="3">2.000.000 VNĐ - 3.000.000 VNĐ</option>
                  <option value="4">Trên 3.000.000 VNĐ</option>
                </select>
                <br> 
              </div>      
            </div>     
            <center><input type="submit" value="Tìm kiếm" class="btn btn-secondary"></center>
          </form>
        <div class="row">
          @foreach($motels as $i => $motel)
            <div class="col-md-4 p-t-30">
              <!-- Block1 -->
              <div class="blo1">
                <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                  <div class="wrap">
                    <div class="slick1">
                      @foreach (json_decode($motel->images) as $picture)
                        <div class="item1-slick1">
                          <a href="{{route('detail', $motel->id)}}">
                            <img src="{{url('/')}}/upload/{{$picture}}" alt="IMG-INTRO" width="500" height="300">
                          </a>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="wrap-text-blo1 p-t-35">
                  <a href="{{route('detail', $motel->id)}}"><h3 class="m-b-13">{{$motel->title}}</h3></a>
                  <p class="m-b-20"><i class="fa fa-stop-circle "></i> Diện tích: {{$motel->area}} m2</p>
                  <p class="m-b-20"><i class="fa fa-map-marker "></i> Địa chỉ: {{$motel->address}}</p>
                  <p class="m-b-20"><i class="fa fa-money "></i> Giá phòng: {{$motel->price}}VNĐ</p>
                <a href="{{route('detail', $motel->id)}}"><h6 class="m-b-13">CHI TIẾT</h6></a>
                @csrf
                </div>
              </div>
            </div>
          @endforeach
          <div class = col-md-10></div>
          {{$motels->links("pagination::bootstrap-4")}}
        </div>
        <br>
        <h3 class="m-b-13"><center>DANH SÁCH PHÒNG TRỌ MỚI ĐĂNG</center></h3>
        <div class="row">
          @foreach($news as $i => $new)
            <div class="col-md-4 p-t-30">
              <!-- Block1 -->
              <div class="blo1">
                <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                  <div class="wrap">
                    <div class="slick1">
                      @foreach (json_decode($motel->images) as $picture)
                        <div class="item1-slick1">
                          <a href="{{route('detail', $motel->id)}}">
                            <img src="{{url('/')}}/upload/{{$picture}}" alt="IMG-INTRO" width="500" height="300">
                          </a>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>

                <div class="wrap-text-blo1 p-t-35">
                  <a href="{{route('detail', $new->id)}}"><h3 class="m-b-13">{{$new->title}}</h3></a>
                  <p class="m-b-20"><i class="fa fa-stop-circle "></i> Diện tích: {{$new->area}} m2</p>
                  <p class="m-b-20"><i class="fa fa-map-marker "></i> Địa chỉ: {{$new->address}}</p>
                  <p class="m-b-20"><i class="fa fa-money "></i> Giá phòng: {{$new->price}}VNĐ</p>
                  <a href="{{route('detail', $new->id)}}"><h6 class="m-b-13">CHI TIẾT</h6></a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <br>
        <h3 class="m-b-13"><center>DANH SÁCH PHÒNG TRỌ XEM NHIỀU NHẤT</center></h3>
        <div class="row">
          @foreach($view as $i => $view)
            <div class="col-md-4 p-t-30">
              <!-- Block1 -->
              <div class="blo1">
                <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                  <div class="wrap">
                    <div class="slick1">
                      @foreach (json_decode($motel->images) as $picture)
                        <div class="item1-slick1">
                          <a href="{{route('detail', $motel->id)}}">
                            <img src="{{url('/')}}/upload/{{$picture}}" alt="IMG-INTRO" width="500" height="300">
                          </a>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>

                <div class="wrap-text-blo1 p-t-35">
                  <a href="{{route('detail', $view->id)}}"><h3 class="m-b-13">{{$view->title}}</h3></a>
                  <p class="m-b-20"><i class="fa fa-stop-circle "></i> Diện tích: {{$view->area}} m2</p>
                  <p class="m-b-20"><i class="fa fa-map-marker "></i> Địa chỉ: {{$view->address}}</p>
                  <p class="m-b-20"><i class="fa fa-money "></i> Giá phòng: {{$view->price}}VNĐ</p>
                  <a href="{{route('detail', $view->id)}}"><h6 class="m-b-13">CHI TIẾT</h6></a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

  </section>

  @include('user.footer')


<!--===============================================================================================-->
  <script type="text/javascript" src="{{url('/')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="{{url('/')}}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="{{url('/')}}/vendor/bootstrap/js/popper.js"></script>
  <script type="text/javascript" src="{{url('/')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="{{url('/')}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="{{url('/')}}/vendor/daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="{{url('/')}}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="{{url('/')}}/vendor/slick/slick.min.js"></script>
  <script type="text/javascript" src="{{url('/')}}/js/slick-custom.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="{{url('/')}}/vendor/parallax100/parallax100.js"></script>
  <script type="text/javascript">
        $('.parallax100').parallax100();
  </script>
<!--===============================================================================================-->
  <script type="text/javascript" src="{{url('/')}}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="{{url('/')}}/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
  <script src="{{url('/')}}/js/main.js"></script>

</body>
</html>

@endif