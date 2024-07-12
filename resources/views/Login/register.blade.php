

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="{{url('/')}}/dist/css/css.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <section>
            <div class="img-bg">
                <img src="https://niemvuilaptrinh.ams3.cdn.digitaloceanspaces.com/tao_trang_dang_nhap/hinh_anh_minh_hoa.jpg" alt="Hình Ảnh Minh Họa">
            </div>
            <div class="noi-dung">
                <div class="form">
                    <h2>Trang Đăng Ký</h2>
                    @include('alert')
                    <form action="{{route('create')}}" enctype="multipart/form-data" method ="POST" >
                        <div class="input-form">
                            <span>Tên đăng nhập <span style="color: red" title="Trường bắt buộc">(*)</span></span>
                            <input type="text" name ="username" class="input" placeholder="Username" required>
                        </div>
                        <div class="input-form">
                            <span>Mật khẩu<span style="color: red" title="Trường bắt buộc">(*)</span></span >
                            <input type="password" name="password" class="input" placeholder="Password" required>
                        </div>
                        <div class="input-form">
                            <span>Nhập lại mật khẩu<span style="color: red" title="Trường bắt buộc">(*)</span></span>
                            <input type="password" name="repeatpassword" class="input" placeholder="Repeat Password" required>
                        </div>
                        <div class="input-form">
                            <span>Tên hiển thị</span>
                            <input type="text" name ="name" class="input" placeholder="Name" >
                        </div>
                        <div class="input-form">
                            <span>Avatar</span>
                            <input type="file" name="avatar" accept="image" id="avatar" class="form-control">
                        </div>
                        <div class="input-form">
                            <span >Số điện thoại</span>
                            <input type="text" name ="phone" class="input" placeholder="Phone">
                        </div>
                        <div class="input-form">
                            <span >Kiểu người dùng<span style="color: red" title="Trường bắt buộc">(*)</span></span>
                            <select name="role" id="" class="input" required>
                                <option value="2">Nhà trọ</option>
                                <option value="3">Người thuê</option>
                            </select>
                        </div>
                        <div class="input-form">
                            <input type="submit" value="Đăng ký">
                        </div>
                    @csrf
                    </form>
                </div>
            </div>
            <!--Kết Thúc Phần Nội Dung-->
        </section>
        @include('admin.footer')
    </body>
</html>
