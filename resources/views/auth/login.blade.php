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
                            <li class="category3"><span>Đăng nhập</span></li>
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
                <div class="col-md-6 col-xs-12">
                    <div class="customer-login my-account">
                        <form method="post" class="login">
                            @csrf
                            <div class="form-fields">
                                <h2>Đăng nhập</h2>
                                @if (Session::has('flash_message_error'))
                                    <span class="text-danger">{!! session('flash_message_error') !!}</span>
                                @endif
                                <p class="form-row form-row-wide">
                                    <label for="username">Email <span class="required">*</span></label>
                                    <input type="text" class="input-text" name="email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="password">Mật khẩu <span class="required">*</span></label>
                                    <input class="input-text" type="password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </p>
                            </div>
                            <div class="form-action">
{{--                                <p class="lost_password"> <a href="#">Bạn quên mật khẩu?</a></p>--}}
                                <div class="actions-log">
                                    <input type="submit" class="button" value="Đăng nhập">
                                </div>
{{--                                <label for="rememberme" class="inline">--}}
{{--                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Nhớ mật khẩu </label>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- account-details Area end -->
@endsection