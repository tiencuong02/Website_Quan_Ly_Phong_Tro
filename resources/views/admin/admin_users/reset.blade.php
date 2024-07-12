@extends('admin.main')
@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">
                <div class="card-body">
					<form action="{{route('updatepass', $GetId->id)}}" method ="POST">
						@csrf
						@method('PATCH') 
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<strong>Mật khẩu mới:</strong>
									<input type="password" name="password" value="" class="form-control" placeholder="password new">
								</div>
								<div class="form-group">
									<strong>Nhập lại mật khẩu:</strong>
									<input type="password" name="re-password" value="" class="form-control" placeholder="Re-password">
								</div>					
							</div>
						</div>
						<button type="submit" class ="btn btn-info">Cập nhật</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection