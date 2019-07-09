<table class="table table-hover">
    <tr>
        <th>Mã đơn hàng</th>
        <th>Tên sản phẩm</th>
        <th>Hình sản phẩm</th>
        <th>Giá</th>
        <th>Giá sale</th>
        <th>Số lượng</th>
    </tr>
    @if (isset($orders))
        <?php $i = 1; ?>
        @foreach ($orders as $order)
            <tr>
                <td>#{{ $i }}</td>
                <td>{{ $order->product->name }}</td>
                <td><img src="{{ pare_url_file($order->product->image, 'products') }}" width="80" alt="{{ $order->product->name }}"></td>
                <td>{{ number_format($order->price, 0, ',', '.') }} VND</td>
                <td>{{ $order->price_sale ? $order->price_sale : 0 }}</td>
                <td>{{ $order->quantity }}</td>
            </tr>
                <?php $i++; ?>
        @endforeach
    @endif
</table>
