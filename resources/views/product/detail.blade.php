@extends('layouts.app')
@section('content')
    <style>
        .product-tab-content{
            overflow: hidden;
        }
        .product-tab-content h2{
            font-size: 24px!important;
        }
        .product-tab-content h3{
            font-size: 20px!important;
        }
        .product-tab-content h4{
            font-size: 18px!important;
        }
        .product-tab-content img{
            margin: 0 auto;
            text-align: center;
            max-width: 100%;
            display: block;
        }
        .list-start i:hover{
            cursor: pointer;
        }
        .list-start .rating-active{
            color: #ff9705;
        }
        .list-text{
            display: inline-block;
            margin-left: 10px;
            position: relative;
            background: #52b858;
            color: #fff;
            padding: 2px 8px;
            box-sizing: border-box;
            font-size: 12px;
            border-radius: 2px;
            display: none;
        }
        .list-text:after{
            right: 100%;
            top: 50%;
            border:solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgba(82,184,88,0);
            border-right-color: #52b858;
            border-width: 6px;
            margin-top: -6px;
        }
        .active {
            color: #ff9727!important;
        }
    </style>
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
                            <li class="category3"><span>{{ $product->name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- product-details Area Start -->
    <div class="product-details-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="zoomWrapper">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{ pare_url_file($product->image, 'products') }}" data-zoom-image="{{ pare_url_file($product->image, 'products') }}" alt="big-1">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="bxslider" id="gallery_01">
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/client/img/product-details/big-1-1.jpg" data-zoom-image="assets/client/img/product-details/ex-big-1-1.jpg"><img src="assets/client/img/product-details/th-1-1.jpg" alt="zo-th-1" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="assets/client/img/product-details/big-1-2.jpg" data-zoom-image="assets/client/img/product-details/ex-big-1-2.jpg"><img src="assets/client/img/product-details/th-1-2.jpg" alt="zo-th-2"></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="assets/client/img/product-details/big-1-3.jpg" data-zoom-image="assets/client/img/product-details/ex-big-1-3.jpg"><img src="assets/client/img/product-details/th-1-3.jpg" alt="ex-big-3" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="assets/client/img/product-details/big-4.jpg" data-zoom-image="assets/client/img/product-details/ex-big-4.jpg"><img src="assets/client/img/product-details/th-4.jpg" alt="zo-th-4"></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="assets/client/img/product-details/big-5.jpg" data-zoom-image="assets/client/img/product-details/ex-big-5.jpg"><img src="assets/client/img/product-details/th-5.jpg" alt="zo-th-5" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="assets/client/img/product-details/big-6.jpg" data-zoom-image="assets/client/img/product-details/ex-big-6.jpg"><img src="assets/client/img/product-details/th-6.jpg" alt="ex-big-3" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="assets/client/img/product-details/big-7.jpg" data-zoom-image="assets/client/img/product-details/ex-big-7.jpg"><img src="assets/client/img/product-details/th-7.jpg" alt="ex-big-3" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="assets/client/img/product-details/big-8.jpg" data-zoom-image="assets/client/img/product-details/ex-big-8.jpg"><img src="assets/client/img/product-details/th-8.jpg" alt="ex-big-3" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-list-wrapper">
                        <div class="single-product">
                            <div class="product-content">
                                <h2 class="product-name"><a href="#">{{ $product->name }}</a></h2>
                                <div class="rating-price">
                                    <?php
                                    $avgStar = 0;
                                    $total_rating        = $product->total_rating;
                                    $total_number_rating = $product->total_number_rating;
                                    if ($product->total_rating)
                                    {
                                        $avgStar = round($total_number_rating / $total_rating, 2);
                                    }
                                    ?>
                                    <div class="pro-rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star {{ $i <= $avgStar ? 'active' : '' }}"></i>
                                        @endfor
                                        <span>{{ $avgStar }} đánh giá </span>
                                    </div>
                                    <div class="price-boxes">
                                        <span class="new-price">{{ number_format($product->price) }} VND</span>
                                    </div>
                                </div>
                                <div class="product-desc">
                                    <p>{{ $product->description }}</p>
                                </div>
                                <p class="availability in-stock">Availability: <span>Còn hàng</span></p>
                                <div class="actions-e">
                                    <div class="action-buttons-single">
                                        <div class="inputx-content">
                                            <label for="qty">Quantity:</label>
                                            <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="#">Add to cart</a>
                                        </div>
                                        <div class="add-to-links">
                                            <div class="add-to-wishlist">
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            </div>
                                            <div class="compare-button">
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="singl-share">
                                    <a href="#"><img src="assets/client/img/single-share.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single-product-tab">
                    <!-- Nav tabs -->
                    <ul class="details-tab">
                        <li class="active"><a href="#home" data-toggle="tab">Description</a></li>
                        <li class=""><a href="#messages" data-toggle="tab"> Review (1)</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content">
                                <p>{!! $product->content !!}</p>
                            </div>
                        </div>
                        <div class="components_rating" style="margin-bottom: 20px">
                            <h3>Đánh giá sản phẩm</h3>
                            <div class="components_rating_content" style="display: flex;align-items: center;border-radius: 5px;border: 1px solid #dedede">
                                <div class="rating_item" style="width: 20%">
                                    <div><span class="fa fa-star" style="font-size: 100px;display: block;color: #ff9705;margin: 0 auto;text-align: center"><b>2.5</b></span></div>
                                </div>
                                <div class="list_rating" style="width: 60%;padding: 20px">
                                    @for($i = 1; $i <= 5; $i++)
                                        <div class="item-rating" style="display: flex;align-items: center">
                                                <div style="width: 10%;font-size: 14px">
                                                    {{ $i }}<span class="fa fa star"></span>
                                                </div>
                                            <div style="width: 70%;margin: 0 20px">
                                                <span style="width: 100%;height: 8px;display: block;border: 1px solid #dedede;border-radius: 5px;background-color: #dedede"><b style="width: 30%;background-color: #f25800;display: block;height: 100%;border-radius: 5px"></b></span>
                                            </div>
                                            <div style="width: 20%"><a href="">290 đánh giá</a></div>
                                        </div>
                                    @endfor
                                </div>
                                <div style="width: 20%;">
                                    <a href="" class="js_rating_action" style="width: 20%;background: #288ad6;padding: 10px;color: white;border-radius: 5px">Gửi đánh giá của bạn</a>
                                </div>
                            </div>
                            <?php
                            $listRatingText = [
                                1 => 'Không thích',
                                2 => 'Tạm được',
                                3 => 'Bình thường',
                                4 => 'Rất tốt',
                                5 => 'Rất tuyệt vời'
                            ];
                            ?>
                            <div class="form-rating hide">
                                <div style="display: flex;margin-top: 15px;font-size: 15px">
                                    <p style="margin-bottom: 0px">Chọn đánh giá của bạn</p>
                                    <span style="margin: 0 15px" class="list-start">
                                    @for($i =1; $i <= 5; $i++)
                                            <i class="fa fa-star" data-key="{{ $i }}"></i>
                                        @endfor
                                    </span>
                                    <span class="list-text"></span>
                                    <input type="hidden" class="number-rating">
                                </div>
                                <div style="margin-top: 15px">
                                    <textarea id="content-rating" class="form-control" id="" cols="30" rows="3"></textarea>
                                </div>
                                <div style="margin-top: 15px">
                                    <a href="{{ route('store.rating.product', $product->id) }}" class="js-rating-product" style="width: 200px;background: #288ad6;padding: 5px 10px;color: white;border-radius: 5px">Gửi đánh giá</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details Area end -->
    <!-- product section start -->
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Sản phẩm liên quan</h2>
            </div>
            <!-- our-product area start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="features-curosel">
                            <!-- single-product start -->
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        <a href="#">
                                            <img class="primary-image" src="assets/client/img/products/product-1.jpg" alt="" />
                                            <img class="secondary-image" src="assets/client/img/products/product-2.jpg" alt="" />
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                                <div class="quickviewbtn">
                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">$200.00</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="#">Donec ac tempus</a></h2>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- our-product area end -->
        </div>
    </div>
    <!-- product section end -->
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            let listRatingText = {
                1 : 'Không thích',
                2 : 'Tạm được',
                3 : 'Bình thường',
                4 : 'Rất tốt',
                5 : 'Rất tuyệt vời'
            };
            let listStart = $(".list-start .fa");
            listStart.mouseover(function (e) {
               e.preventDefault();
                let numberStart = $(this).attr('data-key');
                listStart.removeClass('rating-active');
                $('.number-rating').val(numberStart);
                $.each(listStart, function (key, value) {
                    if (key + 1 <= numberStart){
                        $(this).addClass('rating-active')
                    }
                });
               $('.list-text').text('').text(listRatingText[numberStart]).show();
                // console.log($(this).attr('data-key'))
            });
            
            $('.js_rating_action').click(function (e) {
                e.preventDefault();
                let formRating = $(".form-rating");
                if (formRating.hasClass('hide')){
                    formRating.addClass('active').removeClass('hide')
                }else {
                    formRating.addClass('hide').removeClass('active')
                }
            });

            $('.js-rating-product').click(function (e) {
                e.preventDefault();
                let contentRating = $('#content-rating').val();
                let numberRating = $('.number-rating').val();
                let url = $(this).attr('href');
                if (contentRating && numberRating){
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {
                            numberRating: numberRating,
                            contentRating: contentRating
                        }
                    }).done(function (result) {
                        if (result.code == 1)
                        {
                            alert('Cám ơn bạn đã đánh giá sản phẩm');
                            location.reload();
                        }
                    })
                }
            })
        });
    </script>
@endsection