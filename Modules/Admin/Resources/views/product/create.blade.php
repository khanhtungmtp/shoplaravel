@extends('admin::layouts.master')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Thêm mới sản phẩm</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.get.list.product') }}">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Thêm mới</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('admin.content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm mới sản phẩm</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" >
                    @csrf
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{ old('name') }}" placeholder="Ví dụ : Samsung galaxy s10">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả ngắn</label>
                                    <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">
                                            {{ $errors->first('description') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="content">Nội dung sản phẩm</label>
                                    <textarea name="content" id="input_content" class="form-control">{{ old('content') }}</textarea>
                                    @if ($errors->has('content'))
                                        <span class="text-danger">
                                            {{ $errors->first('content') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="title_seo">Tiêu đề seo</label>
                                    <input type="text" class="form-control" name="title_seo" id="title_seo"
                                           value="{{ old('title_seo') }}" placeholder="Ví dụ : may-tinh">
                                </div>
                                <div class="form-group">
                                    <label for="keyword_seo">Mô tả seo</label>
                                    <input type="text" class="form-control" name="keyword_seo"
                                           value="{{ old('keyword_seo') }}" id="keyword_seo"
                                           placeholder="Mô tả">
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="col-sm-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="quantity">Số lượng</label>
                                    <input type="text" class="form-control" name="quantity">
                                    @if ($errors->has('quantity'))
                                        <span class="text-danger">
                                            {{ $errors->first('quantity') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Loại sản phẩm</label>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="">--Chọn loại sản phẩm--</option>
                                        @if (isset($categories))
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="text-danger">
                                            {{ $errors->first('category_id') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="price">Giá sản phẩm</label>
                                    <input type="number" name="price" placeholder="Giá sản phẩm" class="form-control" value="{{ old('price') }}">
                                    @if ($errors->has('price'))
                                        <span class="text-danger">
                                            {{ $errors->first('price') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="price_sale">% khuyến mãi</label>
                                    <input type="number" name="price_sale" placeholder="% giảm giá" class="form-control" value="{{ old('price_sale') }}">
                                </div>

                                <div class="form-group">
                                    <img src="{{ asset('img/no-image.jpg') }}" id="out_img" alt="" width="80">
                                </div>

                                <div class="form-group">
                                    <label for="image">Hình sản phẩm</label>
                                    <input type="file" name="image" id="input_img" placeholder="Hình sản phẩm" class="form-control">
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="active" id="activeCat"
                                           checked>
                                    <label class="form-check-label" for="activeCat">Hiển thị</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
        <!--/.col (left) -->
    </div>
@endsection

@section('script')
    <script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('input_content');
    </script>
@endsection