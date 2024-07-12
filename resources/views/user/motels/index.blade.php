@if(in_array($adminLogin->getRole(), [2]))
<!DOCTYPE html>
<html lang="en">

<head>
  	<title>Danh sách bài đăng | Nhà trọ</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{url('/')}}/dist/css/main.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
	  <!-- or -->
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

	  <!-- Font-icon css-->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body onload="time()" class="app sidebar-mini rtl">
	    <div class="app-title">
	        <h3 class="tile-title">Danh sách bài đăng</h3>
			<ul class="app-breadcrumb breadcrumb side">
				<li class="breadcrumb-item active">
					<a href="{{route('home')}}">
						<b>Quay lại trang chủ</b>
					</a>
				</li>
			</ul>
		</div>
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
								<i class="fas fa-plus"></i>Thêm phòng trọ mới
							</a>
	                    </div>
	                </div>
					<table class="table table-hover table-bordered" id="sampleTable">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên phòng trọ</th>
								<th>Địa chỉ</th>
								<th>Giá phòng</th>
								<th>Số điện thoại</th>
								<th>Trạng thái</th>
								<th>Chức năng</th>
							</tr>
						</thead>
						<tbody>
							@foreach($motels as $stt => $motels)
							<tr>
								<td>{{$stt+1}}</td>
								<td>{{$motels->title}}</td>
								<td>{{$motels->address}}</td>
								<td>{{$motels->price}} VNĐ</td>
								<td>{{$motels->phone}}</td>
								<td>@if($motels->approve == 1)
										<span class="badge bg-success">Đã duyệt</span>
									@elseif($motels->approve == 2)
										<span class="badge bg-danger">Đã cho thuê</span>
									@elseif($motels->approve == 3)
										<span class="badge bg-info">Chờ duyệt</span><br></br>
									@else
										<span class="badge bg-success">Đã duyệt</span><br></br>
										<form action="{{route('approve',$motels->id)}}" method ="POST">
											@csrf
											<button class="badge bg-danger" type ="submit">Đã cho thuê</button>
										</form>
									@endif
								</td>
								<td>
									<form action="{{route('motels.destroy', $motels->id)}}" method="POST">
										<a href="{{route('motels.edit', $motels->id)}}" class ="btn btn-primary btn-sm edit"><i class="fas fa-edit"></i></a>
										@csrf
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

	<script src="{{url('/')}}/dist/js/main.js"></script>
	  <!-- The javascript plugin to display page loading on top-->
	<script src="{{url('/')}}/plugins/boot/pace.min.js"></script>
	  <!-- Page specific javascripts-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	  <!-- Data table plugin-->
	<script type="text/javascript" src="{{url('/')}}/plugins/boot/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="{{url('/')}}/plugins/boot/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">$('#sampleTable').DataTable();</script>
	
</body>
</html>
@endif