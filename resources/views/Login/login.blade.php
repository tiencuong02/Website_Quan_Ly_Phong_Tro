<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{url('/')}}/dist/css/css.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
  <body>
    <section>
      <div class="img-bg">
        <img src="https://niemvuilaptrinh.ams3.cdn.digitaloceanspaces.com/tao_trang_dang_nhap/hinh_anh_minh_hoa.jpg" alt="Hình Ảnh Minh Họa">
      </div>
      <div class="noi-dung">
        <div class="form">
          <h2>Trang Đăng Nhập</h2>
          @include('alert')
          <form action="{{route('store')}}" method="post">
              <div class="input-form">
                <span>Tên đăng nhập</span>
                <input type="text" name ="username" class="input" placeholder="Username">
              </div>
              <div class="input-form">
                <span>Mật khẩu</span>
                <input type="password" name="password" class="input" placeholder="Password">
              </div>
              <div class="input-form">
                <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
              </div>
              <div class="input-form">
                <input type="submit" value="Đăng Nhập">
              </div>
              <div class="input-form">
                <p>Bạn Chưa Có Tài Khoản? <a href="{{route('register')}}">Đăng Ký</a></p>
              </div>
            @csrf
          </form>
        </div>      
      </div>
    </section>
  @include('admin.footer')
  </body>
</html>
