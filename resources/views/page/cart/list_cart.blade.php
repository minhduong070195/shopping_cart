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
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/frontend/cart/list_cart.css" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
@include('layouts.header')
<!-- Header End -->

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="/cart"><i class="fa fa-home"></i> Home</a>
                    <a href="/card/list">Shop</a>
                    <span>Shopping Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <header>
        <div class="d-flex justify-content-center align-items-center pb-3">
            <div class="px-sm-5 px-2 active">SHOPPING CART <span class="fas fa-check"></span> </div>
            <div class="px-sm-5 px-2">CHECKOUT</div>
            <div class="px-sm-5 px-2">FINISH</div>
        </div>
        <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12" id="list-cart">
                <div class="cart-table">
                    <table>
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th class="p-name">Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(\Illuminate\Support\Facades\Session::has('cart') != null)
                            @foreach(Illuminate\Support\Facades\Session::get('cart')->products as $item)
                                <tr class="wrap-list-product">
                                    <td class="cart-pic first-row"><img src="../assets/img/product_list/{{ $getCategoryName[$item['productInfo']->category_id] }}/{{ $item['productInfo']->image }}" alt="" style="width: 170px"></td>
                                    <td class="cart-title first-row">
                                        <p class="product_id" hidden data-value="{{$item['productInfo']->id}}"></p>
                                        <h5>{{ $item['productInfo']->name }}</h5>
                                    </td>
                                    <td class="p-price first-row">{{number_format($item['productInfo']->price)}} đ</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{ $item['quantity'] }}" id="quantity-item-{{$item['productInfo']->id}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{ number_format($item['productInfo']->price * $item['quantity']) }} đ</td>
                                    <td class="close-td first-row">
                                        <i class="ti-save" onclick="updateItemCart({{$item['productInfo']->id}})"></i>
                                    </td>
                                    <td class="close-td first-row">
                                        <i class="ti-close" onclick="removeItem({{ $item['productInfo']->id }})"></i>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 offset-lg-8">
                        @php
                            $totalQuantity = 0;
                            $totalPrice = 0;
                            if(\Illuminate\Support\Facades\Session::has('cart') != null){
                                $totalQuantity = Illuminate\Support\Facades\Session::get('cart')->totalQuantity;
                                $totalPrice = Illuminate\Support\Facades\Session::get('cart')->totalPrice;
                            }
                        @endphp
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Total Quantity <span>{{ $totalQuantity }} </span></li>
                                <li class="cart-total">Total Price <span>{{ number_format($totalPrice) }} vnd</span></li>
                            </ul>
                            <a href="{{ route('order.confirm') }}" class=" btn text-white ml-auto proceed-btn">CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--spinner--}}
    <div id="loader" class="lds-dual-ring hidden overlay"></div>
    {{--spinner--}}
</section>
<!-- Shopping Cart Section End -->

<!-- Footer Section Begin -->
@include('layouts.footer')
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="../assets/js/jquery-3.3.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery-ui.min.js"></script>
<script src="../assets/js/jquery.countdown.min.js"></script>
<script src="../assets/js/jquery.nice-select.min.js"></script>
<script src="../assets/js/jquery.zoom.min.js"></script>
<script src="../assets/js/jquery.dd.min.js"></script>
<script src="../assets/js/jquery.slicknav.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/notify.min.js"></script>
{{--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}

<script type="text/javascript">
    // Remove item product in list cart
    function removeItem(id) {
        $.ajax({
            url: '/remove-item-list-cart/' + id,
            type: 'GET'
        }).done(function (res) {
            renderListCart(res);
            $('#total-quantity-product').text($('#ip-total-quantity').val());
            $.notify("Xóa sản phẩm thành công.", "success");
        })
    }

    // Update item in list cart
    function updateItemCart(id) {
        var quantityPro = $('#quantity-item-'+id).val();
        $.ajax({
            url: '/update-item-list-cart/' + id + '/' + quantityPro,
            type: 'GET',
            beforeSend: function( xhr ) {
                // $('#loader').removeClass('hidden')
            }
        }).done(function (res) {
            renderListCart(res);
            if($('#ip-total-quantity').val() < 1){
                console.log(id);
                // removeItem(id);
            }
            $('#total-quantity-product').text($('#ip-total-quantity').val());
            $.notify("Cập nhật giỏ hàng thành công.", "success");
            // $('#loader').addClass('hidden')
        });
    }

    // re-render cart
    function renderListCart(res) {
        // render in icon cart
        $('#change-item-cart').empty();
        $('#change-item-cart').html(res.view_cart);

        // render list cart
        $('#list-cart').empty();
        $('#list-cart').html(res.view_list);
        $('#list-cart').load(window.location.href + " #list-cart" );
        showPlusAndMinus();
        // reload DOM
        location.reload();
    }

    // Hiển thị " + " và " - " trong ô cập nhật số lượng sản phẩm
    function showPlusAndMinus() {
        var proQty = $('.pro-qty');
        proQty.prepend('<span class="dec qtybtn">-</span>');
        proQty.append('<span class="inc qtybtn">+</span>');
        proQty.on('click', '.qtybtn', function () {
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent().find('input').val(newVal);
        });
    }

</script>
</body>

</html>