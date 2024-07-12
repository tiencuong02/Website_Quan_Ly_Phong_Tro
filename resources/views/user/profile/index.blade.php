<!DOCTYPE html>
<html lang="en">

<head>
  	<title>Danh sách đơn hàng | Quản trị Admin</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
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
	        <h3 class="tile-title">Thông tin cá nhân</h3>
			<ul class="app-breadcrumb breadcrumb side">
				<li class="breadcrumb-item active"><a href="{{route('home')}}"><b>Quay lại trang chủ</b></a></li>
			</ul>
		</div>
      	<div class="row">
        	<div class="col-md-12">
         		<div class="tile">
         			<div class="row element-button">
                		<div class="col-sm-2">
	                		<img alt="{{$adminLogin->avatar}}" src = "{{url('/')}}/upload/{{$adminLogin->avatar}}" style= width="100", height = "100">
	                	</div>
	                </div>
		            <div class="tile-body">
		              	<table>
			                <thead>
			                  	<tr>
				                    <th>Họ và Tên</th>
				                    <th>{{$adminLogin->name }}</th>
				                </tr>
				                <tr>
				                    <th>Tên đăng nhập</th>
				                    <th>{{$adminLogin->username }}</th>
			                  	</tr>
			                  	<tr>
				                    <th>Email</th>
				                    <th>{{$adminLogin->email }}</th>
			                  	</tr>
			                  	<tr>
				                    <th>Số điện thoại</th>
				                    <th>{{$adminLogin->phone }}</th>
			                    </tr>
			                </thead>
	              		</table>
	              	</div>
	              	<br>
	              	<div class="tile-body" style="text-align: center">
							<a href="{{route('profile.edit', $adminLogin->id)}}" class ="btn btn-primary btn-sm edit"><i class="fas fa-edit"></i> SỬA</a>
							@csrf

	            	</div>
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