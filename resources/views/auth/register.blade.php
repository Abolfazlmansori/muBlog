<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ثبت نام</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{asset("panel/assets/media/image/favicon.png")}}">

	<!-- Theme Color -->
	<meta name="theme-color" content="#5867dd">

	<!-- Plugin styles -->
	<link rel="stylesheet" href="{{asset("panel/vendors/bundle.css")}}" type="text/css">

	<!-- App styles -->
	<link rel="stylesheet" href="{{asset("panel/assets/css/app.css")}}" type="text/css">
    @vite(['resources/css/app.css','resources/js/app.js'])
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
{{--        @include('admin.layouts.partials.errors')--}}
		<h5>ایجاد حساب</h5>

		<!-- form -->
		<form method="POST" action="{{route('register.store')}}">
            @method('POST')
            @csrf
			<div class="form-group">
				<input   type="text" name="name" class="form-control m-0" placeholder=" نام و نام خانوادگی " value="{{old('name')}}" >
                @error('name')
                <p class="text-red-600 flex justify-start">{{ $message }}</p>
                @enderror
            </div>
			<div class="form-group">
				<input type="email" name="email" class="form-control text-left  m-0" placeholder="ایمیل" dir="ltr" value="{{old('email')}}">
                @error('email')
                <p class="text-red-600 flex justify-start">{{ $message }}</p>
                @enderror
            </div>
			<div class="form-group">
				<input type="password" name="password" class="form-control text-left m-0" placeholder="رمز عبور" dir="ltr" value="{{old('password')}}">
                @error('password')
                <p class="text-red-600 flex justify-start">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" class="form-control text-left m-0" placeholder=" تایید رمزعبور" dir="ltr" value="{{old('password_confirmation')}}">
                @error('password_confirmation')
                <p class="text-red-600 flex justify-start">{{ $message }}</p>
                @enderror
            </div>
			<button type="submit" class="btn btn-primary btn-block">ثبت نام</button>
			<hr>
			<p class="text-muted">حساب کاربری دارید؟</p>
			<a href="{{route('login')}}" class="btn btn-outline-light btn-sm">وارد شوید!</a>
		</form>
		<!-- ./ form -->

	</div>

	<!-- Plugin scripts -->
	<script src="{{asset("panel/vendors/bundle.js")}}"></script>

	<!-- App scripts -->
	<script src="{{asset("panel/assets/js/app.js")}}"></script>
</body>

</html>
