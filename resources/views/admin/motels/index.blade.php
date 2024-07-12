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
								<i class="fas fa-plus"></i>Thêm phòng trọ mới
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
										<form action="{{route('duyet',$motels->id)}}" method ="POST">
											@csrf
											<button class="btn btn-delete btn-sm nhap-tu-file" type ="submit">Duyệt bài</button>
										</form>
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
@endsection