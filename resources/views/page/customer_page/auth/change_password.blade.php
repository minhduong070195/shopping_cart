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
    <link rel="stylesheet" href="{{asset('../assets/css/frontend/customer/me.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('../assets/css/frontend/customer/profile.css')}}" type="text/css">
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
            <h3 class="text-center mb-5">Change Password</h3>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formChangePassword"></span>

                    <!-- form card change password -->
                    <div class="card card-outline-secondary">
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputPasswordOld">Current Password</label>
                                    <input type="password" class="form-control" id="inputPasswordOld" required="">
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNew">New Password</label>
                                    <input type="password" class="form-control" id="inputPasswordNew" required="">
                                    <span class="form-text small text-muted">
                                            The password must be 8-20 characters, and must <em>not</em> contain spaces.
                                        </span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNewVerify">Verify</label>
                                    <input type="password" class="form-control" id="inputPasswordNewVerify" required="">
                                    <span class="form-text small text-muted">
                                            To confirm, type the new password again.
                                        </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
                                </div>
                            </form>
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
    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.profile-pic').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        };

        $(".file-upload").on('change', function(){
            readURL(this);
        });

        $(".upload-button").on('click', function() {
            $(".file-upload").click();
        });
    });

</script>
</body>

</html>