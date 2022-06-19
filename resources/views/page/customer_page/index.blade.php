<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('../assets/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../assets/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../assets/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../assets/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../assets/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../assets/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../assets/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../assets/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('../assets/css/frontend/customer/me.css')}}" type="text/css">
    <style type="text/css">
        .red-heart {
            color: red;
        }
        .white-heart {
            color: white;
        }
        .btn-add-to-cart{
            background-color: #e7ab3d;
        }
        .btn-add-to-cart a{
            color: #ffffff;
        }
    </style>
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<!-- Header Section Begin -->
<br>
@include('layouts.header_sub')
<!-- Header End -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <nav class="nav-item">
        <div class="d-flex align-items-center">
            <div class="logo"> <a href="#" class="text-uppercase">Purchase</a> </div>
        </div>
    </nav>
    <header>
        <div class="d-flex justify-content-center align-items-center pb-3 purchase-list">
            <div class="px-sm-5 px-2 purchase-item" data-id="to-pay">
                <span class="active">To Pay</span>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="px-sm-5 px-2 purchase-item" data-id="to-ship">
                <span>To Ship</span>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="px-sm-5 px-2 purchase-item" data-id="to-receive">
                <span>To Receive</span>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="px-sm-5 px-2 purchase-item" data-id="completed">
                <span>Completed</span>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="px-sm-5 px-2 purchase-item" data-id="cancelled">
                <span>Cancelled</span>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

    </header>
    <div class="container">
        <div class="list-order">
            @foreach($orderToPay as $orders)
                <div class="wrap-order border border-secondary">
                    @foreach($orders as $item)
                        <div class="row" style="margin-top: 5px">
                            <div class="cart-pic first-row col-md-3 align-self-center">
                                <img src="../assets/img/product_list/{{ $getCategoryName[$item['category_id']] }}/{{ \App\Models\Product::getProductById($item['product_id'])['image'] }}" alt="" style="width: 130px">
                            </div>
                            <div class="cart-title first-row col-md-3 align-self-center">
                                <h5>{{ \App\Models\Product::getProductById($item['product_id'])['name'] }}</h5>
                            </div>
                            <div class="p-price first-row col-md-3 align-self-center">{{number_format(\App\Models\Product::getProductById($item['product_id'])['price'])}} đ</div>
                            <div class="qua-col first-row col-md-3 align-self-center">
                                <div class="quantity">
                                    <div class="btn btn-add-to-cart"><a onclick="addCart({{ $item['product_id'] }})" href="javascript:">Repurchase</a></div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

<!-- Partner Logo Section Begin -->
<div class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{ asset('../assets/img/logo-carousel/logo-1.png') }}" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{ asset('../assets/img/logo-carousel/logo-2.png') }}" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{ asset('../assets/img/logo-carousel/logo-3.png') }}" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{ asset('../assets/img/logo-carousel/logo-4.png') }}" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{ asset('../assets/img/logo-carousel/logo-5.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partner Logo Section End -->

<!-- Footer Section Begin -->
@include('layouts.footer')
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="https://unpkg.com/@popperjs/core@2"></script>

<script src="{{ asset('../assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('../assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('../assets/js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('../assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{ asset('../assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('../assets/js/jquery.zoom.min.js')}}"></script>
<script src="{{ asset('../assets/js/jquery.dd.min.js')}}"></script>
<script src="{{ asset('../assets/js/jquery.slicknav.js')}}"></script>
<script src="{{ asset('../assets/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('../assets/js/main.js')}}"></script>
<script src="{{ asset('../assets/js/notify.min.js')}}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>--}}
<script type="text/javascript">

    // add product to cart
    function addCart(id) {
        $.ajax({
            url: '/add-cart/' + id,
            type: 'GET'
        }).done(function (res) {
            renderCart(res);
            $.notify("Thêm thành công.", "success");
        })
    }

    // Remove item product in cart
    $('#change-item-cart').on('click', ".si-close i", function () {
        $.ajax({
            url: '/remove-item/' + $(this).data("id"),
            type: 'GET'
        }).done(function (res) {
            renderCart(res);
            $.notify("Đã xóa sản phẩm.", "success");
        })
    });

    // re-render cart
    function renderCart(res) {
        $('#change-item-cart').empty();
        $('#change-item-cart').html(res);
        $('#total-quantity-product').text($('#ip-total-quantity').val());
    }

    // Handle favorites product
    function changeFavoriteItem(id) {
        $.ajax({
            url: '/change-favorite-item/' + id,
            type: 'GET'
        }).done(function (res) {
            if(res.success === true){
                $.notify(res.message, "success");
                if(res.flag === 'like'){
                    $('#quantity-favorite').html(res.data);
                    $('.favorite-item-'+id).css("color", "red");
                }
                if(res.flag === 'dislike'){
                    $('#quantity-favorite').html(res.data);
                    $('.favorite-item-'+id).css("color", "white");
                }
            }
        })
    }

    // $('.dropdown-toggle').dropdown()
    $('.purchase-item').each(function () {
        var _this = $(this);
        _this.find('span').click(function () {
            $(this).addClass('active');
            _this.find('.progress-bar').addClass('bg-warning');
            _this.siblings(_this.find('span')).find('span').removeClass('active');
            _this.siblings(_this.find('span')).find('.progress-bar').removeClass('bg-warning');

            // get purchase
            var slug = _this.data('id');
            var url = "/ajax-get-purchase/"+slug;
            $.ajax({
                url: url,
                type: 'GET'
            }).done(function (res) {
                if(res.success === true){
                    $('.list-order').empty();
                    $('.list-order').html(res.data);
                }else{
                    console.log(res.message)
                }
            })
        });
    });


</script>
</body>

</html>