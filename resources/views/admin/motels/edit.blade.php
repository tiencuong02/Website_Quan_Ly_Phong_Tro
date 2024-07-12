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
@endsection