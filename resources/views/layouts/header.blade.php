<header class="short-stor">
    <div class="container-fluid">
        <div class="row">
            <!-- logo start -->
            <div class="col-md-3 col-sm-12 text-center nopadding-right">
                <div class="top-logo">
                    <a href="index.html"><img src="assets/client/img/logo.gif" alt="" /></a>
                </div>
            </div>
            <!-- logo end -->
            <!-- mainmenu area start -->
            <div class="col-md-6 text-center">
                <div class="mainmenu">
                    <nav>
                        <ul>
                            <li class="expand"><a href="/">Home</a>
                            </li>
                            <li class="expand"><a href="">Danh muc</a>
                                <ul class="restrain sub-menu">
                                    @if (isset($categories))
                                        @foreach ($categories as $cate)
                                            <li><a href="{{ route('category.index',[$cate->slug, $cate->id]) }}">{{ $cate->name }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="expand"><a href="shop-list.html">Women</a>
                                <div class="restrain mega-menu megamenu2">
											<span>
												<a class="mega-menu-title" href="shop-grid.html">Rings</a>
												<a href="shop-grid.html">Coats & Jackets</a>
												<a href="shop-grid.html">Blazers</a>
												<a href="shop-grid.html">Jackets</a>
												<a href="shop-grid.html">Rincoats</a>
											</span>
                                    <span>
												<a class="mega-menu-title" href="shop-grid.html">Dresses</a>
												<a href="shop-grid.html">Ankle Boots</a>
												<a href="shop-grid.html">Footwear</a>
												<a href="shop-grid.html">Clog Sandals</a>
												<a href="shop-grid.html">Combat Boots</a>
											</span>
                                    <span>
												<a class="mega-menu-title" href="shop-grid.html">Accessories</a>
												<a href="shop-grid.html">Bootees bags</a>
												<a href="shop-grid.html">Blazers</a>
												<a href="shop-grid.html">Jackets</a>
												<a href="shop-grid.html">Shoes</a>
											</span>
                                    <span class="block-last">
												<a class="mega-menu-title" href="shop-grid.html">Top</a>
												<a href="shop-grid.html">Briefs</a>
												<a href="shop-grid.html">Camis</a>
												<a href="shop-grid.html">Nigntwears</a>
												<a href="shop-grid.html">Shapewears</a>
											</span>
                                </div>
                            </li>
                            <li class="expand"><a href="shop-grid.html">Shop</a>
                                <div class="restrain mega-menu megamenu4">
											<span>
												<a class="mega-menu-title" href="shop-list.html">Shop Pages</a>
												<a href="shop-list.html">List View </a>
											</span>
                                    <span class="block-last">
												<a class="mega-menu-title" href="product-details.html">Product Types</a>
												<a href="product-details.html">Simple Product</a>
											</span>
                                </div>
                            </li>
                            <li class="expand"><a href="#">Pages</a>
                                <ul class="restrain sub-menu">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                </ul>
                            </li>
                            <li class="expand"><a href="about-us.html">About</a></li>
                            <li class="expand"><a href="{{ route('contact') }}">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- mainmenu area end -->
            <!-- top details area start -->
            <div class="col-md-3 col-sm-12 nopadding-left">
                <div class="top-detail">
                    <!-- language division start -->
                    <div class="disflow">
                        <div class="expand lang-all disflow">
                            <a href="#"><img src="assets/client/img/country/en.gif" alt="">English</a>
                            <ul class="restrain language">
                                <li><a href="#"><img src="assets/client/img/country/it.gif" alt="">italiano</a></li>
                                <li><a href="#"><img src="assets/client/img/country/nl_nl.gif" alt="">Nederlands</a></li>
                                <li><a href="#"><img src="assets/client/img/country/de_de.gif" alt="">Deutsch</a></li>
                                <li><a href="#"><img src="assets/client/img/country/en.gif" alt="">English</a></li>
                            </ul>
                        </div>
                        <div class="expand lang-all disflow">
                            <a href="#">$ USD</a>
                            <ul class="restrain language">
                                <li><a href="#">€ Eur</a></li>
                                <li><a href="#">$ USD</a></li>
                                <li><a href="#">£ GBP</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- language division end -->
                    <!-- addcart top start -->
                    <div class="disflow">
                        <div class="circle-shopping expand">
                            <div class="shopping-carts text-right">
                                <div class="cart-toggler">
                                    <a href="#"><i class="icon-bag"></i></a>
                                    <a href="#"><span class="cart-quantity">{{ Cart::count() }}</span></a>
                                </div>
                                <div class="restrain small-cart-content">
                                    <ul class="cart-list">
                                        <li>
                                            <a class="sm-cart-product" href="product-details.html">
                                                <img src="assets/client/img/products/sm-products/cart1.jpg" alt="">
                                            </a>
                                            <div class="small-cart-detail">
                                                <a class="remove" href="#"><i class="fa fa-times-circle"></i></a>
                                                <a href="#" class="edit-btn"><img src="assets/client/img/btn_edit.gif" alt="Edit Button" /></a>
                                                <a class="small-cart-name" href="product-details.html">Voluptas nulla</a>
                                                <span class="quantitys"><strong>1</strong>x<span>$75.00</span></span>
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="total">Subtotal: <span class="amount">$155.00</span></p>
                                    <p class="buttons">
                                        <a href="{{ route('cart.index') }}" class="button">Thanh toán</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- addcart top start -->
                    <!-- search divition start -->
                    <div class="disflow">
                        <div class="header-search expand">
                            <div class="search-icon fa fa-search"></div>
                            <div class="product-search restrain">
                                <div class="container nopadding-right">
                                    <form action="index.html" id="searchform" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" maxlength="128" placeholder="Search product...">
                                            <span class="input-group-btn">
														<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
													</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- search divition end -->
                    <div class="disflow">
                        <div class="expand dropps-menu">
                            <a href="#"><i class="fa fa-align-right"></i></a>
                            <ul class="restrain language">
                                @if (Auth::check())
                                    <li><a href="wishlist.html">My Wishlist</a></li>
                                    <li><a href="cart.html">My Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                @else
                                    <li><a href="{{ route('get.register') }}">Đăng ký</a></li>
                                    <li><a href="{{ route('get.login') }}">Đăng nhập</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- top details area end -->
        </div>
    </div>
</header>