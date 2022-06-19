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

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('../assets/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('../assets/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('../assets/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('../assets/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('../assets/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('../assets/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('../assets/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('../assets/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('../assets/css/style.css')}}" type="text/css">
{{--    <link rel="stylesheet" href="{{asset('../assets/css/frontend/customer/me.css')}}" type="text/css">--}}
    <link rel="stylesheet" href="{{asset('../assets/css/frontend/customer/verify_otp.css')}}" type="text/css">
    <style type="text/css">

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

<!--container-->
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center mb-5">Verification</h3>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formChangePassword"></span>

                    <!-- form card change password -->
                    <div class="card card-outline-secondary">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center container">
                                <div class="card py-5 px-3">
                                    {{--<h5 class="m-0">Mobile phone verification</h5>--}}
                                    {{--<span class="mobile-text">Enter the code we just send on your mobile phone--}}
                                        {{--<b class="text-warning">{{ $phone }}</b>--}}
                                        {{--<a href="">change</a>--}}
                                    {{--</span>--}}
                                    <div class="error-verification-failed mb-4 text-center text-danger"></div>
                                    <div class="d-flex flex-row">
                                        <form action="" method="POST" id="frm-mobile-verification" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-sm-12">
                                                <lable>Enter Phone Number</lable>
                                            </div>
                                            <div class="mt-2 wrap-input-otp flex-row">
                                                <div class="col-sm-10">
                                                    <input type="number" name="phone" id="phone" class="form-control" value="{{ !empty($phone) ? $phone : '' }}">
                                                </div>
                                                <div class="col-sm-5 btn-send">
                                                    <input type="button" class="btn btn-primary btnSubmit" value="Get OTP" onclick="sendOTP()">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="text-center mt-2">
                                        <span class="d-block mobile-text">Don't receive the code?
                                            <span class="font-weight-bold text-danger cursor resend-link" onclick="sendOTP()">Resend</span>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-row mt-5">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="wrap-input-otp">
                                                <div class="col-sm-2">
                                                    <input type="text" name="one-num" maxlength="1" class="form-control input-number" autofocus="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" name="two-num" maxlength="1" class="form-control input-number">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" name="three-num" maxlength="1" class="form-control input-number">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" name="four-num" maxlength="1" class="form-control input-number">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" name="five-num" maxlength="1" class="form-control input-number">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" name="six-num" maxlength="1" class="form-control input-number">
                                                </div>
                                            </div>
                                            <div class="error mt-2 text-center text-danger"></div>
                                            <div class="mt-4 btn-send">
                                                <input type="button" class="btn btn-primary btnVerify" value="Verify" onClick="verifyOTP();">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /form card change password -->
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->

<!-- Partner Logo Section Begin -->
<div class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{asset('../assets/img/logo-carousel/logo-1.png')}}" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{asset('../assets/img/logo-carousel/logo-2.png')}}" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{asset('../assets/img/logo-carousel/logo-3.png')}}" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{asset('../assets/img/logo-carousel/logo-4.png')}}" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="{{asset('../assets/img/logo-carousel/logo-5.png')}}" alt="">
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

<script src="{{asset('../assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('../assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('../assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('../assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('../assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('../assets/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('../assets/js/jquery.dd.min.js')}}"></script>
<script src="{{asset('../assets/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('../assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('../assets/js/main.js')}}"></script>
<script src="{{asset('../assets/js/notify.min.js')}}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script type="text/javascript">
    function sendOTP() {
        $(".error").html("").hide();
        var number = $("#phone").val();
        if (number.length == 10 && number != null) {
            var input = {
                "phone_number" : number,
            };
            $.ajax({
                url : '/me/send-otp',
                type : 'POST',
                data : input,
                headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                success : function(response) {
                    console.log(response)
                }
            });
        } else {
            $(".error").html('Please enter a valid number!')
            $(".error").show();
        }
    }

    function verifyOTP() {
        $(".error").html("").hide();
        $(".error-verification-failed").html("").hide();
        $(".success").html("").hide();

        var one = $('input[name="one-num"]').val();
        var two = $('input[name="two-num"]').val();
        var three = $('input[name="three-num"]').val();
        var four = $('input[name="four-num"]').val();
        var five = $('input[name="five-num"]').val();
        var six = $('input[name="six-num"]').val();
        var otp = one + two + three + four + five + six;

        var input = {
            "otp" : otp,
        };
        if (otp.length == 6 && otp != null) {
            $.ajax({
                url : '/me/verify-otp',
                type : 'POST',
                data : input,
                headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                success : function(response) {
                    if(response.success === true){
                        location.href = "change-password";
                    }else{
                        $(".error-verification-failed").html(response.message);
                        $(".error-verification-failed").show();
                    }
                },
                error : function() {
                    alert("Error system, try again");
                }
            });
        } else {
            $(".error").html('You have entered wrong OTP.');
            $(".error").show();
        }
    }

    // console.log($('.div-number .input-number'));
    $('.input-number').keyup(function () {
        if (this.value.length == this.maxLength) {
            $(this).closest('div').next().find('.input-number').focus();
        }
    });

</script>
</body>

</html>