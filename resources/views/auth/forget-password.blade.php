<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>فراموشی رمزعبور</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{asset("panel/assets/media/image/favicon.png")}}">

	<!-- Theme Color -->
	<meta name="theme-color" content="#5867dd">

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

		<h5>بازنشانی رمز عبور</h5>

		<!-- form -->
		<form method="post" action="{{route('password.email')}}">
            @csrf
			<div class="form-group">
				<input name="email" type="text" class="form-control text-left" placeholder="نام کاربری یا ایمیل" dir="ltr" required autofocus>
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
			<button type="submit" class="btn btn-primary btn-block">ثبت</button>
			<hr>
			<p class="text-muted">یک عمل دیگر انجام دهید.</p>
			<a href="{{route('register')}}" class="btn btn-sm btn-outline-light mr-1 my-1">هم اکنون ثبت نام کنید!</a>
			یا
			<a href="{{route('login')}}" class="btn btn-sm btn-outline-light ml-1 my-1">وارد شوید!</a>
		</form>
		<!-- ./ form -->

	</div>

	<!-- Plugin scripts -->
	<script src="{{asset("panel/vendors/bundle.js")}}"></script>

	<!-- App scripts -->
	<script src="{{asset("panel/assets/js/app.js")}}"></script>
</body>

</html>
