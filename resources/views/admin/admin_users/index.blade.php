@extends('admin.main')
@section('content')
    <div class="row">
	    <div class="col-md-12">
	        <div class="tile">
	            <div class="tile-body">
	              	<div class="row element-button">
	              		@if (Session::has('thongbao'))
		                  	<div class="alert alert-success"> {{Session::get('thongbao')}}
		                  	</div>
	                	@endif
	                    <div class="col-sm-2">
							<a class="btn btn-add btn-sm" href="{{route($tableName.'.create')}}" title="Thêm">
								<i class="fas fa-plus"></i>Thêm người dùng
							</a>
	                    </div>
	              		<div class="col-sm-2">
	                        <a class="btn btn-excel btn-sm" href="" title="In">
	                            <i class="fas fa-file-excel"></i> Xuất Excel
	                        </a>
	                    </div>
	                </div>
					<table class="table table-hover table-bordered" id="sampleTable">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên</th>
								<th>Tên đăng nhập</th>
								<th>Email</th>
								<th>Điện thoại</th>
								<th>Quyền</th>
								<th>Chức năng</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $stt => $user)
							<tr>
								<td>{{$stt+1}}</td>
								<td>{{$user->name}}</td>
								<td>{{$user->username}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->phone}}</td>
								<td>{{config('app.role')[$user->role] ?? '' }}</td>
								<td>
									<form action="{{route($tableName.'.destroy', $user->id)}}" method="POST">
										<a href="{{route($tableName.'.edit', $user->id)}}" class ="btn btn-primary btn-sm edit"><i class="fas fa-edit"></i></a>
										
										@method('delete')
										<button class="btn btn-primary btn-sm trash" type ="submit" title="Xóa"><i class="fas fa-trash-alt"></i> </button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>					
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection