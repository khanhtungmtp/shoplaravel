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
                            <li class="category3"><span>Liên hệ</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- contact-details start -->
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="contact-us-area">
                        <!-- google-map-area start -->
                        <div class="google-map-area">
                            <!--  Map Section -->
                            <div id="contacts" class="map-area">
                                <div id="map" class="map" data-lat="43.6532" data-lng="-79.3832"></div>
                            </div>

                        </div>
                        <!-- google-map-area end -->
                        <!-- contact us form start -->
                        <div class="contact-us-form">
                            <div class="sec-heading-area">
                                <h2>Liên hệ với chúng tôi</h2>
                            </div>
                            <div class="contact-form">
                                <span class="legend">Thông tin liên hệ</span>
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-top">
                                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>Họ tên <sup>*</sup></label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>Email <sup>*</sup></label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>Tiêu đề <sup>*</sup></label>
                                            <input type="text" name="title" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-10">
                                            <label>Nội dung <sup>*</sup></label>
                                            <textarea name="content" class="yourmessage" required></textarea>
                                        </div>
                                    </div>
                                    <div class="submit-form form-group col-sm-12 submit-review">
                                        <p><sup>*</sup> là những trường bắt buộc</p>
                                        <button type="submit" class="add-tag-btn">Gửi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- contact us form end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-details end -->
@endsection