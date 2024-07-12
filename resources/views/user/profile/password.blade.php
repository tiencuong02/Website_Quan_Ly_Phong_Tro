<!DOCTYPE html>
<html lang="en">

<head>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reset Password</title>

	<link rel="stylesheet" href="{{url('/')}}/dist/css/pass.css">
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
	    <h3 class="tile-title">Đổi mật khẩu</h3>
		<ul class="app-breadcrumb breadcrumb side">
			<li class="breadcrumb-item active">
				<a href="{{route('home')}}">
					<b>Quay lại trang chủ</b>
				</a>
			</li>
		</ul>
	</div>
	<div class="container">
		<div class="card">
			<div class="card-header">
                <div class="card-body">
					<form action="{{route('reset', $user->id)}}" method ="POST">
						@csrf
                        <div class="form-group  col-md-12">
                            <span class="thong-tin-thanh-toan">
                            <h5>Đổi mật khẩu:</h5>
                            </span>
                        </div>
                        <div class="form-group  col-md-12">
                        	<div class="form-group  col-md-12">
	                        	<label for="old-password">Mật khẩu cũ: </label>
							    <div class="input-group mb-3">
							    	<input type="password" class="form-control" id="old-password" name="old-password"/>
							    	<button class="btn btn-outline-secondary" type="button" id="btnold-password">
							            <span class="fas fa-eye"></span>
							        </button>
							    </div>
							</div>
							<div class="form-group  col-md-12">
	                        	<label for="newpassword">Mật khẩu mới: </label>
							    <div class="input-group mb-3">
							    	<input type="password" class="form-control" id="newpassword" name="password"/>
							    	<button class="btn btn-outline-secondary" type="button" id="btnnew-password">
							            <span class="fas fa-eye"></span>
							        </button>
							    </div>
							</div>
							<div class="form-group  col-md-12">
	                        	<label for="re-password">Nhập lại mật khẩu:</label>
							    <div class="input-group mb-3">
							    	<input type="password" class="form-control" id="re-password" name="re-password"/>
							    	<button class="btn btn-outline-secondary" type="button" id="btnre-password">
							            <span class="fas fa-eye"></span>
							        </button>
							    </div>
							</div>
			            </div>
			            <div class="col-md-4"></div>
			            <div class="col-md-2">
				            <div class="form-group col-md-4">
                                <button class="btn btn-info" type="submit">Đổi mật khẩu </button>
                            </div>
                        </div>
                        @csrf
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		const ipnElement1 = document.querySelector('#old-password')
		const ipnElement2 = document.querySelector('#newpassword')
		const ipnElement3 = document.querySelector('#re-password')
		const btnElement1 = document.querySelector('#btnold-password')
		const btnElement2 = document.querySelector('#btnnew-password')
		const btnElement3 = document.querySelector('#btnre-password')

		btnElement1.addEventListener('click', function() {
		  const currentType = ipnElement1.getAttribute('type')
		  ipnElement1.setAttribute(
		    'type',
		    currentType === 'password' ? 'text' : 'password'
		  )
		})
		btnElement2.addEventListener('click', function() {
		  const currentType = ipnElement2.getAttribute('type')
		  ipnElement2.setAttribute(
		    'type',
		    currentType === 'password' ? 'text' : 'password'
		  )
		})
		btnElement3.addEventListener('click', function() {
		  const currentType = ipnElement3.getAttribute('type')
		  ipnElement3.setAttribute(
		    'type',
		    currentType === 'password' ? 'text' : 'password'
		  )
		})
	</script>
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