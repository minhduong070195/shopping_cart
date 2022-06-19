<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/frontend/cart/cart_confirm.css" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
@include('layouts.header_sub')
<!-- Header End -->



<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <nav class="bg-white">
        <div class="d-flex align-items-center">
            <div class="logo"> <a href="#" class="text-uppercase">Cart Confirm</a> </div>
        </div>
    </nav>
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
    <div class="wrapper">
        <div class="h5 large">Billing Address</div>
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1">
                <div class="mobile h5">Billing Address</div>
                <div id="details" class="bg-white rounded pb-5">
                    <form id="customer-info">
                        <div class="form-group"> <label>Name <span class="require">*</span></label>
                            <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
                        </div>
                        <div class="form-group"> <label>Email <span class="require">*</span></label>
                            <div class="d-flex jusify-content-start align-items-center rounded p-2">
                                <input type="email" name="email" placeholder="Your email" required>
                            </div>
                        </div>
                        <div class="form-group"> <label>Phone Number <span class="require">*</span></label>
                            <div class="d-flex jusify-content-start align-items-center rounded p-2">
                                <input type="text" name="phone_number" placeholder="Phone number" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group"> <label>Address <span class="require">*</span></label>
                                    <div class="d-flex jusify-content-start align-items-center rounded p-2">
                                        <input type="text" placeholder="Address" name="address" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group"> <label>City</label>
                                    <div class="d-flex jusify-content-start align-items-center rounded p-2">
                                        <input type="text" name="city" id="city" disabled='disabled'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group"> <label>Zip code</label>
                                    <div class="d-flex jusify-content-start align-items-center rounded p-2" id="box_zip_code">
                                        <input type="text" name="zipcode" placeholder="zip code" id="zip_code">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <input type="checkbox" checked> <label>Shipping address is same as billing</label>
                <div id="address" class="bg-light rounded mt-3">
                    <div class="h5 font-weight-bold text-primary"> Shopping Address </div>
                    <div class="d-md-flex justify-content-md-start align-items-md-center pt-3">
                        <div class="mr-auto"> <b>Home Address</b>
                            <p class="text-justify text-muted">542 W.14th Street</p>
                            <p class="text-uppercase text-muted">NY</p>
                        </div>
                        <div class="rounded py-2 px-3" id="register"> <a href="#"> <b>Register Now</b> </a>
                            <p class="text-muted">Create account to have multiple address saved</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1 pt-lg-0 pt-3">
                <div id="cart" class="bg-white rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="h6">Cart Summary</div>
                        <div class="h6"> <a href="{{ route('listCart') }}">Edit</a> </div>
                    </div>
                    @foreach(Illuminate\Support\Facades\Session::get('cart')->products as $item)
                        <div class="d-flex jusitfy-content-between align-items-center pt-3 pb-2 border-bottom wrap-list-product">
                            <div class="item pr-2"> <img src="../assets/img/product_list/{{ $getCategoryName[$item['productInfo']->category_id] }}/{{ $item['productInfo']->image }}" alt="" style="width: 80px">
                                <p id="quantity-item-{{$item['productInfo']->id}}" data-value="{{$item['quantity']}}" class="number">{{$item['quantity']}}</p>
                            </div>
                            <div class="product_id" hidden data-value="{{$item['productInfo']->id}}"></div>
                            <div class="d-flex flex-column px-3"> <b class="h5">{{ $item['productInfo']->name }}</b></div>
                            <div class="ml-auto"> <b class="h5">{{number_format($item['productInfo']->price)}} vnd</b> </div>
                        </div>
                    @endforeach
                    @php
                        $totalQuantity = 0;
                        $totalPrice = 0;
                        if(\Illuminate\Support\Facades\Session::has('cart') != null){
                            $totalQuantity = Illuminate\Support\Facades\Session::get('cart')->totalQuantity;
                            $totalPrice = Illuminate\Support\Facades\Session::get('cart')->totalPrice;
                            $shipping = Illuminate\Support\Facades\Session::get('cart')->totalPrice * 0.02;
                            $total = $totalPrice + $shipping;
                        }
                    @endphp
                    <div class="my-3"> <input type="text" class="w-100 form-control text-center" placeholder="Gift Card or Promo Card"> </div>
                    <div class="d-flex align-items-center">
                        <div class="display-5">Total Quantity</div>
                        <div class="ml-auto font-weight-bold">{{ number_format($totalQuantity) }}</div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="display-5">Subtotal</div>
                        <div class="ml-auto font-weight-bold">{{ number_format($totalPrice) }} vnd</div>
                    </div>
                    <div class="d-flex align-items-center py-2 border-bottom">
                        <div class="display-5">Shipping</div>
                        <div class="ml-auto font-weight-bold">{{ number_format($shipping) }} vnd</div>
                    </div>
                    <div class="d-flex align-items-center py-2">
                        <div class="display-5">Total</div>
                        <div class="ml-auto d-flex">
                            <div class="text-uppercase px-3"></div>
                            <div class="font-weight-bold">{{ $total }} vnd</div>
                        </div>
                    </div>
                </div>
                <p class="text-muted">Need help with an order?</p>
                <p class="text-muted"><a href="#" class="text-danger">Hotline:</a>+314440160 (International)</p>
                <div class="row pt-lg-3 pt-2 buttons mb-sm-0 mb-2">
                    <div class="col-md-6">
                        <a href="{{ route('listCart') }}" class="btn text-uppercase">back to shopping</a>
                    </div>
                    <div class="col-md-6 pt-md-0 pt-3">
                        <div class="btn text-white ml-auto proceed-btn"> CHECKOUT </div>
                    </div>
                </div>
                <div class="text-muted pt-3" id="mobile"> Your information is save </div>
            </div>
        </div>
        <div class="text-muted"> Your information is save </div>
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

<script type="text/javascript">
    // Begin Process Buy
    $('.proceed-btn').on('click', function () {
        let products = [];
        let customerInfo = {};

        // get cart info
        $('.wrap-list-product').each(function (index) {
            if($(this).length > 0){
                let item = {};
                let _el = $(this);
                let productId = _el.find('.product_id').data('value');
                let quantity = _el.find('#quantity-item-'+productId).data('value');
                item.product_id = productId;
                item.quantity = quantity;
                products.push(item);
            }
        });

        //get customer info
        var form = $('#customer-info');
        var fullName = form.find($('input[name="full_name"]')).val();
        var email = form.find($('input[name="email"]')).val();
        var phoneNumber = form.find($('input[name="phone_number"]')).val();
        var address = form.find($('input[name="address"]')).val();

        customerInfo.name = fullName;
        customerInfo.email = email;
        customerInfo.phone_number = phoneNumber;
        customerInfo.address = address;
        customerInfo.city = form.find($('input[name="city"]')).val();
        customerInfo.zipcode = form.find($('input[name="zipcode"]')).val();

        if(products.length < 1 || fullName === '' || email === '' || phoneNumber === '' || address === ''){
            return false;
        }

        $.ajax({
            url: '/process',
            data: {
                products: products,
                customerInfo: customerInfo
            },
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        }).done(function (res) {
            if(res.success === true){
                $.notify("Order successfully.", "success");
                window.location.href = res.redirect;
            }
        });
    });
    // End Process Buy

    //Get zipcode
    $("#box_zip_code").focusout(function(){
        var zipcode = $('#zip_code').val();
        if(zipcode === ''){
            return false;
        }
        $.ajax({
            url: '/get-zip-code',
            data: { zipcode: zipcode },
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        }).done(function (res) {
            console.log(res);
            if(res.success === true){
                $('#city').empty();
                $('#city').val(res.data.refecture_name);
            }
        });

    });

</script>
</body>

</html>