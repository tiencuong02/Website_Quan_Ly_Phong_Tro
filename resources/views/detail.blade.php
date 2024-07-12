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

  <!-- Slide1 -->
  <!-- Intro -->
  <section class="section-intro">
    <div class="content-intro bg-white p-t-77 p-b-133">
      <div class="container">
        <h3 class="m-b-13"><center>CHI TIẾT PHÒNG TRỌ</center></h3>
        <div class="row">
            <div class="col-md-6 p-t-30">
              <!-- Block1 -->
              <div class="blo1">
                <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                  <div class="wrap-slick1">
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
                <br>
                <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                  <h4>Mô tả: </h4>{{$motel->description}}
                </div>
              </div>
            </div>
            <div class="col-md-6 p-t-30">
              <!-- Block1 -->
              <div class="blo1">
                  <h3 class="m-b-13">{{$motel->title}}</h3></a>
                  <h4 class="box-title mt-5">Thông tin người đăng</h4>
                  <button class="btn btn-warning btn-rounded btn-block"><i class="fa fa-user-circle"></i>{{$motel->user->name}}</button>
                  <button class="btn btn-warning btn-rounded btn-block"><i class="fa fa-phone-square"></i>{{$motel->phone}}</button>
                  <hr>
                  <p><i class="fa fa-map-marker "></i><b> Địa chỉ: </b>{{$motel->address}}</p>
                  <p><i class="fa fa-money "></i><b> Giá phòng: </b>{{$motel->price}} VNĐ</p>
                  <p><i class="fa fa-stop-circle "></i><b> Diện tích: </b>{{$motel->area}}m2</p>
                  <p><i class="fa fa-check"></i><b> Tiện ích phòng trọ: </b>{{$motel->utilities}}</p>
                  <form action="{{route('baocao',$motel->id)}}" method ="POST">
                    @csrf
                    <button class="btn btn-primary btn-rounded" type ="submit">Gửi báo cáo</button>
                  </form>
                  @if(in_array($adminLogin->getRole(), [2]))
                    @if($motel->user->id == $adminLogin->id )

                      <button class="btn btn-primary btn-rounded">Sửa bài đăng</button>
                    @endif
                  @endif
                @csrf
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="bg1">
    <div class="container p-t-40 p-b-70">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5423.343058580458!2d105.6892291367499!3d18.66835929171485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139cdd115ecc427%3A0xb9f573bb5f5a57a3!2zVHLGsOG7nW5nIFRp4buDdSBo4buNYyBUcsaw4budbmcgVGhp!5e0!3m2!1svi!2s!4v1670984609092!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </footer>


<script src="{{url('/')}}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{url('/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{url('/')}}/dist/js/adminlte.min.js"></script>

  <script src="{{url('/')}}/dist/js/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
  <script src="{{url('/')}}/dist/js/jquery-3.2.1.min.js"></script>
  <script src="{{url('/')}}/dist/js/popper.min.js"></script>
  <script src="{{url('/')}}/dist/js/bootstrap.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- The javascript plugin to display page loading on top-->
  <script src="{{url('/')}}/plugins/boot/pace.min.js"></script>
    <!-- Page specific javascripts-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Data table plugin-->
  <script type="text/javascript" src="{{url('/')}}/plugins/boot/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="{{url('/')}}/plugins/boot/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>


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