@extends('admin.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title"> Thêm người dùng </h3>
            <div class="tile-body">
                <form class="row" action="{{route($tableName.'.store')}}" method ="POST">
                    @csrf
                        <div class="form-group col-md-4">
                            <label class="control-label">Họ tên <span style="color: red" title="Trường bắt buộc">(*)</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Tên đăng nhập <span style="color: red" title="Trường bắt buộc">(*)</span></label>
                            <input type="text" class="form-control" name="username" placeholder="User Name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Email <span style="color: red" title="Trường bắt buộc">(*)</span></label>
                            <input type="text" class="form-control" name ="email" placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Điện thoại</label>
                            <input type="text" class="form-control" name ="phone" placeholder="Phone">                           
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Mật khẩu <span style="color: red" title="Trường bắt buộc">(*)</span></label>
                            <input type="password" class="form-control" id ="password" name ="password" placeholder="Password" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Nhập lại mật khẩu <span style="color: red" title="Trường bắt buộc">(*)</span></label>
                            <input type="password" class="form-control" id ="re-password" name ="re-password" placeholder="RE-Password" required>
                        </div>
                        <div class="registrationFormAlert" id="divCheckPasswordMatch">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Phân quyền</label>
                            <select name="role" id="" class="form-control">
                                @foreach ($roles as $roleId => $roleName)
                                    <option value="{{ $roleId }}">{{ $roleName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-5">
                        </div>
                        <div class="form-group col-md-4">
                            <button class="btn btn-info" type="submit">Lưu lại</button>
                            <a class="btn btn-cancel" href="{{route($tableName.'.index')}}">Hủy bỏ</a>
                        </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection