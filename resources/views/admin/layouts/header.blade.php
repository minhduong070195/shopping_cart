<style type="text/css">
    .heart-icon {
        list-style-type: none;
        font-size: 30px;
        color: red;
    }
    .dropdown-menu{
        padding: 0;
    }
</style>
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    minhduong@gmail.com
                </div>
                <div class="phone-service">
                    <i class="fa fa-phone"></i>
                    039 847 1928
                </div>
            </div>
            @php
            @endphp
            <div class="ht-right">
                @if(Auth::guard('customer')->user())
                <div class="nav-item-account btn-account">
                    <div class="container">
                        <div class="nav-depart">
                            <div class="depart-btn">
                                <span>{{ Auth::guard('customer')->user()->username }}</span>
                                <ul class="depart-hover">
                                    <a class="dropdown-item" href="{{ route('customer.my-page') }}">My Page</a>
                                    <a class="dropdown-item" href="{{ route('customer.profile') }}">Profile</a>
                                    <a class="dropdown-item" href="{{ route('customer.logout') }}">Logout</a>
                                </ul>
                            </div>
                        </div>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                </div>
                @else
                    <a href="{{ route('customer.getSignIn') }}" class="login-panel"><i class="fa fa-user"></i>Login</a>
                @endif
                <div class="top-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                    <a href="#"><i class="ti-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="/fashi">
                            <img src="../assets/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        {{--<button type="button" class="category-btn">All Categories</button>--}}
                        <form action="{{ route('searchProduct') }}" method="POST" enctype="multipart/form-data" class="input-group">
                            @csrf
                            <input type="text" name="product_name" value="{{ isset($input['product_name']) ? $input['product_name'] : '' }}" placeholder="What do you need ?">
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="heart-icon"><a href="{{ route('listFavoriteProduct') }}">
                                <i class="icon_heart_alt" id="favorites-list"></i>
                                <span id="quantity-favorite">{{ $countFavorite }}</span>
                            </a>
                        </li>
                        <li class="cart-icon"><a href="{{ route('listCart') }}">
                                <i class="icon_bag_alt"></i>
                                @if(\Illuminate\Support\Facades\Session::has('cart') != null)
                                    <span id="total-quantity-product">{{ Illuminate\Support\Facades\Session::get('cart')->totalQuantity }}</span>
                                @else
                                    <span id="total-quantity-product">0</span>
                                @endif
                            </a>
                            <div class="cart-hover">
                                <div id="change-item-cart">
                                    @if(\Illuminate\Support\Facades\Session::has('cart') != null)
                                        <div class="select-items">
                                            <table>
                                                <tbody>
                                                @foreach(Illuminate\Support\Facades\Session::get('cart')->products as $item)
                                                    @php
                                                        $getCategoryName = Illuminate\Support\Facades\Session::get('cart')->listCategoryName;
                                                    @endphp
                                                    <tr>
                                                        <td class="si-pic"><img src="../assets/img/product_list/{{ $getCategoryName[$item['productInfo']->category_id] }}/{{ $item['productInfo']->image }}" alt="" style="width: 70px"></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>₫{{ number_format($item['productInfo']->price) }} x {{ $item['quantity'] }}</p>
                                                                <h6>{{ $item['productInfo']->name }}</h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <i class="ti-close" data-id="{{ $item['productInfo']->id }}"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="select-total">
                                            <span>total:</span>
                                            <h5>₫{{ number_format(Illuminate\Support\Facades\Session::get('cart')->totalPrice) }}</h5>
                                        </div>
                                    @endif
                                </div>
                                <div class="select-button">
                                    <a href="{{ route('listCart') }}" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All Categories</span>
                    <ul class="depart-hover">
                        @foreach($categories as $category)
                        <li @if ($loop->first) class="active" @endif><a href="{{ route('category.slug', $category->name) }}">{{ ucwords($category->name) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Collection</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
