@extends('admin.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title"> Thêm bài đăng </h3>
                <div class="tile-body">
                    <form class="row" action="{{route($tableName.'.store')}}" method ="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group col-md-4">
                                <label for="menu">Tên phòng trọ<span style="color: red" title="Trường bắt buộc">(*)</span></label>
                                <input type="text" class="form-control" name="title" placeholder="Title" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="menu">Giá phòng trọ</label>
                                <input type="text" class="form-control" name ="price" placeholder="Price" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="menu">Diện tích phòng trọ</label>
                                <input type="text" class="form-control" name ="area" placeholder="Area" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="menu">Địa chỉ trọ</label>
                                <input type="text" class="form-control" name ="address" placeholder="Address" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="menu">Số điện thoại chủ trọ</label>
                                <input type="text" class="form-control" name ="phone" placeholder="Phone" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="menu">Mô tả chi tiết phòng trọ</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                                <script>CKEDITOR.replace('specified');</script>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="menu">Các tiện ích của phòng trọ</label>
                                <textarea class="form-control" name="utilities" id="utilities"></textarea>
                                <script>CKEDITOR.replace('specified');</script>
                            </div>
                                <input type="hidden" class="form-control" name ="user_id" value="{{$adminLogin->getID()}}" >
                            <div class="form-group col-md-6">
                                <label for="menu">Hình ảnh phòng trọ</label>
                                <input type="file" name="file[]" accept="image/*" multiple="multiple" class="form-control">
                            </div>
                            <div class="row mt-3">
                                @if ($images = Session::get('files'))
                                    @foreach($images as $value)
                                    <div class="col-md-2">
                                        <img src="{{ asset('images/'.$value) }}" width="100">
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                            </div>
                            <div class="form-group col-md-4">
                                <button class="btn btn-info" type="submit">Lưu lại</button>
                                <a class="btn btn-cancel" href="{{route('home')}}">Hủy bỏ</a>
                            </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>   
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });   
    </script>    
@endsection