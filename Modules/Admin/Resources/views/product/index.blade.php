@extends('admin::layouts.master')
@section('title')
    Danh sách danh mục
@endsection
@section('style')
    <style>
        .active {
            color: #ff9727!important;
        }
    </style>
@endsection
@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sản phẩm</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Sản phẩm</li>
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
                        <a href="{{ route('admin.get.create.product') }}" class="btn btn-primary">Thêm mới</a>
                    </h3>

                    <div class="card-tools">
                        <form method="get">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <select name="cate" id="">
                                    <option value="">Danh mục</option>
                                    @if (isset($categories))
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ \Request::get('cate') == $cat->id ? "selected='selected'" : '' }}>{{ $cat->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <input type="text" name="name" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Tiêu đề seo</th>
                            <th>Loại sản phẩm</th>
                            <th>Trạng thái</th>
                            <th>Nổi bật</th>
                            <th>Chức năng</th>
                        </tr>
                        @if (isset($products))
                            @foreach ($products as $key => $product)
                                <?php
                                $avgStar = 0;
                                $total_rating        = $product->total_rating;
                                $total_number_rating = $product->total_number_rating;
                                if ($product->total_rating)
                                {
                                    $avgStar = round($total_number_rating / $total_rating, 2);
                                }
                                ?>
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <img src="{{ pare_url_file($product->image, 'products') }}"
                                                     class="img img-responsive" width="80" alt="{{ $product->name }}">
                                            </li>
                                            <li>Tên: {{ $product->name }}</li>
                                            <li>Giá: {{ $product->price }}</li>
                                            <li>Giá sale: {{ $product->price_sale }}</li>
                                            <li>
                                                Đánh giá:
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="fa fa-star {{ $i <= $avgStar ? 'active' : '' }}"></i>
                                                @endfor
                                                <span>{{ $avgStar }}</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>{{ $product->slug }}</td>
                                    <td>{{ isset($product->category->name) ? $product->category->name : '[N\A]' }}</td>
                                    <td><a href="{{ route('admin.post.action.product',['active',$product->id]) }}"
                                           class="{{ $product->getStatus($product->active)['class'] }}">{{ $product->getStatus($product->active)['name'] }}</a>
                                    </td>
                                    <td><a href="{{ route('admin.post.action.product',['hot',$product->id]) }}"
                                           class="{{ $product->getHot($product->hot)['class'] }}">{{ $product->getHot($product->hot)['name'] }}</a>
                                    </td>
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
