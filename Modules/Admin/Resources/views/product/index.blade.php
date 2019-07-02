@extends('admin::layouts.master')
@section('title')
    Danh sách danh mục
@endsection
@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh mục</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Danh mục</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('admin.content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{ route('admin.get.create.category') }}" class="btn btn-primary">Thêm mới</a>
                    </h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Tiêu đề seo</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                        @if (isset($products))
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->slug }}</td>
                                    <td><span class="tag tag-success">{{ $product->getStatus($product->active)['name'] }}</span></td>
                                    <td>
                                        <a href="{{ route('admin.get.edit.product', $product->id) }}">
                                            <i class="fa fa-edit">Sửa</i>
                                        </a>
                                        <a href="{{ route('admin.post.action.product', ['delete', $product->id]) }}">
                                            <i class="fa fa-trash">Xóa</i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div><!-- /.row -->
@endsection