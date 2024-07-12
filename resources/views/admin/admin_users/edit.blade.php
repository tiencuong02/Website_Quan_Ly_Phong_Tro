@extends('admin.main')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">
                <div class="card-body">
					<form action="{{route($tableName.'.update', $GetId->id)}}" method ="POST">
						@csrf
						@method('PUT')
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<strong>Họ tên</strong>
									<input type="text" name="name" value="{{$GetId->name}}" class="form-control" placeholder="Name">
								</div>
								<div class="form-group">
									<strong>Tên đăng nhập</strong>
									<input type="text" name="username" value="{{$GetId->username}}" class="form-control" placeholder="User Name">
								</div>
								<div class="form-group">
									<strong>Email</strong>
									<input type="text" name="email" value="{{$GetId->email}}" class="form-control" placeholder="Email">
								</div>						
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<strong>Điện thoại</strong>
									<input type="text" name="phone"
									value="{{$GetId->phone}}" class="form-control" placeholder="Phone">
								</div>									
	                            <div class="form-group">
	                                <label for="menu">Phân quyền</label>
	                                <select name="role" id="" class="form-control">
	                                    @foreach ($roles as $roleId => $roleName)
	                                        <option value="{{ $roleId }}">{{ $roleName }}</option>
	                                    @endforeach
	                                </select>
	                            </div>
							</div>
						</div>
						<button type="submit" class ="btn btn-info">Cập nhật</button>
						<a href="{{route('reset', $GetId->id)}}" class ="btn btn-primary btn-sm edit"><i class="fas fa-edit"></i></a>
						@csrf
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection