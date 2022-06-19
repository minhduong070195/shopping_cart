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
            <div class="row">
                <div class="col-md-4 ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        minhduong@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone"></i>
                        039 847 1928
                    </div>
                </div>
                <div class="col-md-4 ht-mid">
                    <div class="logo">
                        <a href="/fashi">
                            <img src="{{asset('../assets/img/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-4 ht-right">
                    @if(Auth::guard('customer')->user())
                        <div class="nav-item-account btn-account">
                            <div class="container">
                                <div class="nav-depart">
                                    <div class="depart-btn">
                                        <span>{{ Auth::guard('customer')->user()->username }}</span>
                                        <ul class="depart-hover">
                                            <a class="dropdown-item" href="{{ route('customer.my-page') }}">My Page</a>
                                            <a class="dropdown-item" href="{{ route('customer.profile', ['id' => \Auth::guard('customer')->user()->id]) }}">Profile</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
