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
    <div class="container">
        <div class="row">
            <div class="col-lg-12" id="list-cart">
                <div class="cart-table">
                    <div id="change-list-favorite-product">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listFavorite as $item)
                                    <tr>
                                        <td class="cart-pic first-row"><img src="../assets/img/product_list/{{ $item->category->name }}/{{ $item->image }}" alt="" style="width: 170px"></td>
                                        <td class="cart-title first-row">
                                            <h5>{{ $item->name }}</h5>
                                        </td>
                                        <td class="p-price first-row">{{number_format($item->price)}} đ</td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <li class="btn btn-add-to-cart"><a onclick="addCart({{$item->id}})" href="javascript:">Add Cart</a></li>
                                            </div>
                                        </td>
                                        <td class="close-td first-row">
                                            <li class="heart-icon">
                                                <i class="fas fa-heart" id="favorites-product-{{$item->id}}" onclick="removeFavoriteItem({{ $item->id }})"></i>
                                            </li>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>


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

    // re-render cart
    function renderCart(res) {
        $('#change-item-cart').empty();
        $('#change-item-cart').html(res);
        $('#total-quantity-product').text($('#ip-total-quantity').val());
    }

    // Remove item product in list cart
    function removeFavoriteItem(id) {
        $.ajax({
            url: '/remove-favorite-item/' + id,
            type: 'GET'
        }).done(function (res) {
            renderListFavorite(res.view_render);
            $('#quantity-favorite').html(res.quantity_favorite);
            $.notify("Đã xóa sản phẩm khỏi danh sách yêu thích.", "success");
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
            // if (xhr.status == 401) { => đúng hơn điều kiện check bên dưới mà chưa tìm ra cách
            // if (textStatus === 'error') {
            //     window.location.href = '/sign-in';
            // }
        })
    }

    // re-render cart
    function renderListFavorite(view) {
        $('#change-list-favorite-product').empty();
        $('#change-list-favorite-product').html(view);
    }
</script>
</body>

</html>