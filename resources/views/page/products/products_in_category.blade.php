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

    <style type="text/css">
        .red-heart {
            color: red;
        }
        .white-heart {
            color: white;
        }
    </style>
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
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-1 order-lg-2">
                <div class="product-list">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-3 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="../assets/img/product_list/{{$product->category->name}}/{{ $product->image }}" alt="">
                                        <div class="sale pp-sale">Sale</div>
                                        @php
                                            $redHeart = 'white-heart';
                                            if($product->favorites == 1){
                                                $redHeart = 'red-heart';
                                            }
                                        @endphp
                                        <div class="icon">
                                            <i class="fas fa-heart favorite-item-{{$product->id}} {{ $redHeart }}" onclick="changeFavoriteItem({{$product->id}})" ></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="{{ '/cart' }}"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a onclick="addCart({{$product->id}})" href="javascript:">+ Add Cart</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">Towel</div>
                                        <a href="#">
                                            <h5>{{ $product->name }}</h5>
                                        </a>
                                        <small class="product-price">
                                            {{ number_format($product->price) }} đ
                                        </small>
                                        <div class="product-price-reduce">
                                            {{ number_format($product->price) }} đ
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
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
                    <img src="../assets/img/logo-carousel/logo-1.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="../assets/img/logo-carousel/logo-2.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="../assets/img/logo-carousel/logo-3.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="../assets/img/logo-carousel/logo-4.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="../assets/img/logo-carousel/logo-5.png" alt="">
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
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script type="text/javascript">

    // add product to cart
    // function addCart(id) {
    //     $.ajax({
    //         url: '/add-cart/' + id,
    //         type: 'GET'
    //     }).done(function (res) {
    //         renderCart(res);
    //         $.notify("Thêm thành công.", "success");
    //     })
    // }
    //
    // // Remove item product in cart
    // $('#change-item-cart').on('click', ".si-close i", function () {
    //     $.ajax({
    //         url: '/remove-item/' + $(this).data("id"),
    //         type: 'GET'
    //     }).done(function (res) {
    //         renderCart(res);
    //         $.notify("Đã xóa sản phẩm.", "success");
    //     })
    // });
    //
    // // re-render cart
    // function renderCart(res) {
    //     $('#change-item-cart').empty();
    //     $('#change-item-cart').html(res);
    //     $('#total-quantity-product').text($('#ip-total-quantity').val());
    // }
    //
    // // Handle favorites product
    // function changeFavoriteItem(id) {
    //     console.log(111);
    //     $.ajax({
    //         url: '/change-favorite-item/' + id,
    //         type: 'GET'
    //     }).done(function (res) {
    //         if(res.success === true){
    //             $.notify(res.message, "success");
    //             if(res.flag === 'like'){
    //                 $('#quantity-favorite').html(res.data);
    //                 $('.favorite-item-'+id).css("color", "red");
    //             }
    //             if(res.flag === 'dislike'){
    //                 $('#quantity-favorite').html(res.data);
    //                 $('.favorite-item-'+id).css("color", "white");
    //             }
    //         }
    //     })
    // }

</script>
</body>

</html>