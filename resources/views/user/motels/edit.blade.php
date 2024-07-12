@if(in_array($adminLogin->getRole(), [2]))
<!DOCTYPE html>
<html lang="en">

<head>
  	<title>Sửa bài đăng | Nhà trọ</title>
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
	        <h3 class="tile-title">Sửa bài đăng</h3>
			<ul class="app-breadcrumb breadcrumb side">
				<li class="breadcrumb-item active">
					<a href="{{route('motels.index')}}">
						<b>Quay lại quản lý</b>
					</a>
				</li>
			</ul>
		</div>
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
									<strong>Tên phòng trọ</strong>
									<input type="text" name="title" value="{{$GetId->title}}" class="form-control">
								</div>
								<div class="form-group">
									<strong>Mô tả chi tiết phòng trọ</strong>
									<input type="text" name="description" value="{{$GetId->description}}" class="form-control">
								</div>	
								<div class="form-group">
									<strong>Giá phòng trọ</strong>
									<input type="text" name="price" value="{{$GetId->price}}" class="form-control">
								</div>						
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<strong>Diện tích phòng</strong>
									<input type="text" name="area" value="{{$GetId->area}}" class="form-control" >
								</div>
								<div class="form-group">
									<strong>Địa chỉ trọ</strong>
									<input type="text" name="address" value="{{$GetId->address}}" class="form-control" >
								</div>
								<div class="form-group">
									<strong>Số điện thoại chủ trọ</strong>
									<input type="text" name="phone" value="{{$GetId->phone}}" class="form-control" >
								</div>
							</div>
							<div class="col-md-10">
							</div>
							<div class="col-md-1">
								<button type="submit" class ="btn btn-info">Cập nhật</button>
							</div>
						</div>
					</form>
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