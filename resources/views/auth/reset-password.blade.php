<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        تغیر رمز عبور</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset("panel/assets/media/image/favicon.png")}}">

    <!-- Theme Color -->
    <meta name="theme-color" content="#5867dd">

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{asset("panel/vendors/bundle.css")}}" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset("panel/assets/css/app.css")}}" type="text/css">
</head>

<body class="form-membership">

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
</div>
<!-- end::page loader -->

<div class="form-wrapper">

    <!-- logo -->
    <div class="logo">
        <img src="{{asset("panel/assets/media/image/logo-sm.png")}}" alt="image">
    </div>
    <!-- ./ logo -->
    @include('admin.layouts.partials.errors')
    <h5>تغیر رمز عبور</h5>

    <!-- form -->
    <form method="POST" action="{{route('password.update')}}">
        @csrf
        <div class="form-group">
            <input type="hidden" name="token" value="{{$request->token}}"  >
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control text-left" placeholder="ایمیل" dir="ltr" value="{{$request->email}}">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control text-left" placeholder="رمز عبور" dir="ltr" >
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control text-left" placeholder=" تایید رمزعبور" dir="ltr" >
        </div>
        <button type="submit" class="btn btn-primary btn-block">تغیر</button>
        <hr>
    </form>
    <!-- ./ form -->

</div>

<!-- Plugin scripts -->
<script src="{{asset("panel/vendors/bundle.js")}}"></script>

<!-- App scripts -->
<script src="{{asset("panel/assets/js/app.js")}}"></script>
</body>

</html>
