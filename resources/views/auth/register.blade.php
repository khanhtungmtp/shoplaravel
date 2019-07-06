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
                                <a href="{{ route('home') }}">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Đăng ký</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- account-details Area Start -->
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-xs-12 align-items-center">
                    <div class="customer-register my-account">
                        <form method="post" class="register" action="">
                            @csrf
                            <div class="form-fields">
                                <h2>Đăng ký</h2>
                                <p class="form-row form-row-wide">
                                    <label for="reg_email">Họ tên<span class="required">*</span></label>
                                    <input type="text" class="input-text" name="name" id="reg_name" value="">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_email">Email<span class="required">*</span></label>
                                    <input type="email" class="input-text" name="email" id="reg_email" value="">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_email">Số điện thoại<span class="required">*</span></label>
                                    <input type="tel" class="input-text" name="phone" id="reg_phone" value="">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">
                                            {{ $errors->first('phone') }}
                                        </span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_password">Mật khẩu <span class="required">*</span></label>
                                    <input type="password" class="input-text" name="password" id="reg_password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </p>
                            </div>
                            <div class="form-action">
                                <div class="actions-log">
                                    <input type="submit" class="button" name="register" value="Đăng ký">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- account-details Area end -->
@endsection