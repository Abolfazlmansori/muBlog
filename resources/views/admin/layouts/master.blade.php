<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> قالب مدیریتی </title>
    <link rel="shortcut icon" href="{{asset('panel/')}}assets/media/image/favicon.png">
    <meta name="theme-color" content="#5867dd">
    <link rel="stylesheet" href="{{asset('panel/vendors/bundle.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('panel/vendors/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('panel/vendors/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('panel/vendors/vmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/vendors/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/css/app.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('panel/plugins/ckeditor/contents.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('panel/plugins/ckeditor/contents.css')}}">
    <link rel="stylesheet" href="{{asset('panel/plugins/sweet_alert/sweetalert2.min.css')}}" type="text/css">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="small-navigation">
@include('admin.layouts.partials.navigation')
@include('admin.layouts.partials.header')
<main class="main-content">
    @yield('content')
</main>
<script src="{{asset('panel/vendors/bundle.js')}}"></script>
<script src="{{asset('panel/vendors/slick/slick.min.js')}}"></script>
<script src="{{asset('panel/vendors/vmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('panel/assets/js/app.js')}}"></script>
ِ
<script src="{{asset('panel/plugins/sweet_alert/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('panel/vendors/slick/slick.min.js')}}"></script>
<script src="{{asset('panel/plugins/ckeditor/ckeditor.js')}}"></script>
@stack('scripts')
</body>
</html>
