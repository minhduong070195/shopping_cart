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

<!-- Product Shop Section Begin -->
    <div class="container">
        <section style="background-color: #eee;">
            <div class="container py-5">
                <form action="{{ route('customer.updateProfile', ['id' => \Illuminate\Support\Facades\Auth::guard('customer')->id()]) }}" method="POST" id="form-customer-info" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <div class="d-block wrap-profile-avatar">
                                        <div class="circle">
                                            <img class="profile-pic" src="{{ empty($profile->image) ? 'https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg' : asset('public/images/customer/'.$profile->image) }}">
                                        </div>
                                        <div class="p-image">
                                            {{--<form action="" method="POST" id="form-avatar" enctype="multipart/form-data">--}}
                                                {{--@csrf--}}
                                                <input type="button" class="btn btn-light upload-button" value="Upload Avatar">
                                                <input class="file-upload" name="uploadImage" type="file" accept="image/*"/>
                                            {{--</form>--}}
                                        </div>
                                    </div>
                                    <div class="d-block wrap-profile-info">
                                        <p class="text-muted mb-1">File size: maximum 1 MB</p>
                                        <p class="text-muted mb-4">File extension: .jpg, .jpeg, .png</p>
                                        <a href="{{ route('customer.showForm') }}">Change Password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    {{--<form action="" method="POST" id="form-customer-info" enctype="multipart/form-data">--}}
                                        {{--@csrf--}}
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">User Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input class="mb-0" name="username" value="{{ !empty(ucfirst($profile->username)) ? ucfirst($profile->username) : '' }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input class="mb-0" name="email" value="{{ !empty($profile->email) ? $profile->email : '' }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Phone</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input class="mb-0" name="phone" value="{{ !empty($profile->phone) ? $profile->phone : '' }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Gender</p>
                                            </div>
                                            <div class="col-sm-9">
                                                @foreach($genderList as $name => $key)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" {{ ($profile->gender == $key) ? 'checked' : '' }} value="{{ $name }}">
                                                    <label class="form-check-label" for="inlineRadio1">{{ ucfirst($name) }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Birthday</p>
                                            </div>
                                            <div class="col-sm-9">
                                                @php
                                                    $birthday = $profile->birthday;
                                                    $day = substr($birthday, 0, 2);
                                                    $month = substr($birthday, 3, 2);
                                                    $year = substr($birthday, 6, 4);
                                                @endphp
                                                <select name="birthday-day" id="" class="col-sm-2">
                                                    @for($i = 1; $i <=31; $i++)
                                                        @php
                                                            $i = strlen($i) == 1 ? '0'.$i : $i;
                                                        @endphp
                                                        <option value="{{ $i }}" {{ ($day == $i) ? 'selected' : '' }}>{{ ($day == $i) ? $day : $i }}</option>
                                                    @endfor
                                                </select>
                                                <span> - </span>
                                                <select name="birthday-month" id="" class="col-sm-2">
                                                    @for($i = 1; $i <=12; $i++)
                                                        @php
                                                            $i = strlen($i) == 1 ? '0'.$i : $i;
                                                        @endphp
                                                        <option value="{{ $i }}" {{ ($month == $i) ? 'selected' : '' }}>{{ ($month == $i) ? $month : $i }}</option>
                                                    @endfor
                                                </select>
                                                <span> - </span>
                                                <select name="birthday-year" id="" class="col-sm-3">
                                                    @for($i = 1900; $i <= date('Y'); $i++)
                                                        <option value="{{ $i }}" {{ ($year == $i) ? 'selected' : '' }}>{{ ($year == $i) ? $year : $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Address</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input class="mb-0" name="address" value="{{ !empty($profile->address) ? $profile->address : '' }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col text-center">
                                                <button class="btn btn-primary" id="update-profile">Update Profile</button>
                                            </div>
                                        </div>
                                    {{--</form>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
<!-- Product Shop Section End -->

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

{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>--}}
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

    // Update profile
    {{--$('#form-customer-info').on('submit', function (e) {--}}
        {{--e.preventDefault();--}}
        {{--//get customer info form--}}
        {{--var customerInfo = $('#form-customer-info').serializeArray();--}}
        {{--var cusId = "<?php echo \Illuminate\Support\Facades\Auth::guard('customer')->id(); ?>";--}}

        {{--console.log($('#form-customer-info')[0]);--}}
        {{--var form = new FormData($('#form-customer-info')[0]);--}}
        {{--console.log(form);--}}

        {{--$.ajax({--}}
            {{--url: '/me/update-profile/'+cusId,--}}
            {{--type: 'POST',--}}
            {{--data: customerInfo,--}}
            {{--// processData: false,--}}
            {{--// contentType: false,--}}
            {{--headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},--}}
        {{--}).done(function (res) {--}}
            {{--console.log(res);--}}
        {{--});--}}
    {{--});--}}


</script>
</body>

</html>