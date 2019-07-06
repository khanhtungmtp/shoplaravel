@extends('admin::layouts.master')
@section('title')
    Danh sách tài khoản
@endsection
@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tài khoản</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Tài khoản</li>
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
                       Danh sách tài khoản
                    </h3>

                    <div class="card-tools">
                        <form method="get">
                            <div class="input-group input-group-sm" style="width: 250px;">
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
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
{{--                            <th>Loại tài khoản</th>--}}
                            <th>Hình đại diện</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                        @if (isset($users))
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <img src="{{ pare_url_file($user->avatar, 'users') }}" class="img img-responsive" width="80" alt="{{ $user->name }}">
                                    </td>
                                    <td><a href="{{ route('admin.post.action.user',['active',$user->id]) }}" class="{{ $user->getStatus($user->active)['class'] }}">{{ $user->getStatus($user->active)['name'] }}</a></td>
                                    <td>
                                        <a href="{{ route('admin.post.action.user', ['delete', $user->id]) }}">
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
