@extends('admin::layouts.master')
@section('title')
    Danh sách danh mục
@endsection
@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Đơn hàng</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Đơn hàng</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('admin.content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr>
                            <th>STT</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ghi chú</th>
                            <th>Tổng giá</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                        @if (isset($transactions))
                            @foreach ($transactions as $key => $transaction)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        {{ $transaction->user->name }}
                                    </td>
                                    <td>{{ $transaction->phone }}</td>
                                    <td>{{ $transaction->address }}</td>
                                    <td>{{ $transaction->note }}</td>
                                    <td>{{ $transaction->total }}</td>
                                    <td>
                                        <a href="{{ route('admin.post.action.transaction',['status',$transaction->id]) }}"
                                           class="{{ $transaction->getStatus($transaction->status)['class'] }}">{{ $transaction->getStatus($transaction->status)['name'] }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.get.show.transaction', $transaction->id) }}"
                                           data-id="{{ $transaction->id }}" class="js_order_item" data-toggle="modal"
                                           data-target="#orderModal">
                                            <i class="fa fa-eye"> Xem</i>
                                        </a>
                                        <a href="{{ route('admin.post.action.transaction', ['delete', $transaction->id]) }}">
                                            <i class="fa fa-trash"> Xóa</i>
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

    <!-- Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng #<span id="transaction_id"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="content-order">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.js_order_item').click(function (event) {
                event.preventDefault();
                let url = $(this).attr('href');
                $('#transaction_id').text($(this).attr('data-id'));
                $.ajax({
                    url: url
                }).done(function (result) {
                    // console.log(result)
                    if (result) {
                        $('#content-order').html('').append(result);
                    }
                })
            })
        });
    </script>
@endsection
