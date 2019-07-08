@extends('layouts.app')
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Giỏ hàng</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- Shopping Table Container -->
    <div class="cart-area-start">
        <div class="container">
            <!-- Shopping Cart Table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="cart-table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($carts))
                                <?php $i=1; ?>
                                @foreach ($carts as $key => $cart)
                                    <tr>
                                        <td>#{{ $i }}</td>
                                        <td>
                                            <h6>{{ $cart->name }}</h6>
                                        </td>
                                        <td>
                                            <a href="#"><img src="{{ asset(pare_url_file($cart->options->image, 'products')) }}" class="img-responsive" alt=""/></a>
                                        </td>
                                        <td>
                                            <div class="cart-price">{{ number_format($cart->price, 0, ',', '.') }} VND</div>
                                        </td>
                                        <td>
                                            <form>
                                                <input type="text" placeholder="1" name="quantity" value="{{ $cart->qty }}">
                                            </form>
                                        </td>

                                        <td>
                                            <a href="{{ route('cart.index') }}"><i class="fa fa-edit">&nbsp Sửa</i> </a>&nbsp
                                            <a href="{{ route('cart.delete', $key) }}"><i class="fa fa-times">&nbsp Xóa</i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            @endif
                            <tr>
                                <td class="actions-crt" colspan="7">
                                    <div class="">
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="cbtn" href="#">Tiếp tục mua sắm</a></div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-center"><a class="cbtn" href="#">Cập nhập giỏ hàng</a></div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="cbtn" href="#">Xóa toàn bộ giỏ hàng</a></div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Shopping Cart Table -->
            <!-- Shopping Coupon -->
            <div class="row">
                <div class="col-md-12 vendee-clue">
                    <!-- Shopping Estimate -->
                    <div class="shipping coupon">
                        <h5>Estimate Shipping and Tax</h5>
                        <p>Enter your destination to get a shipping estimate.</p>
                        <form>
                            <div class="shippingTitle"><p><span>*</span>Country</p></div>
                            <div class="selectOption">
                                <div class="selectParent">
                                    <select>
                                        <option value="">Please Select</option>
                                        <option value="1">Country 1</option>
                                        <option value="2">Country 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="shippingTitle"><p>State/Province</p></div>
                            <div class="selectOption">
                                <div class="selectParent">
                                    <select>
                                        <option value="">Please Select</option>
                                        <option value="1">Region 1</option>
                                        <option value="2">Region 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="shippingTitle"><p>Zip/Postal Code</p></div>
                            <div class="selectOption">
                                <input type="text">
                            </div>
                            <button type="submit">Get Quotes</button>
                        </form>
                    </div>
                    <!-- Shopping Estimate -->
                    <!-- Shopping Code -->
                    <div class="shipping coupon hidden-sm">
                        <div class=""><h5>Discount Codes</h5></div>
                        <p>Enter your coupon code if you have one.</p>
                        <form>
                            <input type="text" class="coupon-input">
                            <button class="pull-left" type="submit">APPLY COUPON</button>
                        </form>
                    </div>
                    <!-- Shopping Code -->
                    <!-- Shopping Totals -->
                    <div class="shipping coupon cart-totals">
                        <ul>
                            <li class="cartSubT">Subtotal:    <span>$50.00</span></li>
                            <li class="cartSubT">Tổng giá:    <span>{{ Cart::subtotal() }}</span></li>
                        </ul>
                        <a class="proceedbtn" href="{{ route('get.pay.cart') }}">Thanh toán</a>
                    </div>
                    <!-- Shopping Totals -->
                </div>
            </div>
            <!-- Shopping Coupon -->
        </div>
    </div>
    <!-- Shopping Table Container -->
@endsection