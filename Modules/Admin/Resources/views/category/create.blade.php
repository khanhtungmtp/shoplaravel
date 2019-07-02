@extends('admin::layouts.master')
@section('title')
    Thêm mới danh mục
@endsection
@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Thêm mới danh mục</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.get.list.category') }}">Danh mục</a></li>
                <li class="breadcrumb-item active">Thêm mới danh mục</li>
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
                    <h3 class="card-title">Thêm mới danh mục</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Ví dụ : Samsung">
                            @if ($errors->has('name'))
                                <span class="text-danger">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" name="icon" id="icon" value="{{ old('icon') }}" placeholder="Ví dụ : fa-fa-user">
                            @if ($errors->has('icon'))
                                <span class="text-danger">
                                    {{ $errors->first('icon') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="title_seo">Tiêu đề seo</label>
                            <input type="text" class="form-control" name="title_seo" id="title_seo" value="{{ old('title_seo') }}" placeholder="Ví dụ : may-tinh">
                        </div>
                        <div class="form-group">
                            <label for="description_seo">Mô tả seo</label>
                            <input type="text" class="form-control" name="description_seo" value="{{ old('description_seo') }}" id="description_seo" placeholder="Mô tả">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="active" id="activeCat" checked>
                            <label class="form-check-label" for="activeCat">Hiển thị</label>
                        </div>
                    </div>
                    <!-- /.card-body -->

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