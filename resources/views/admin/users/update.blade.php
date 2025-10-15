@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h4 class="card-title">ویرایش کاربر</h4>
                <form method="POST" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نام و نام خانوادگی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="name"
                                   value="{{ $user->name }}">
                            @error('name')
                            <p class="text-red-600 ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ایمیل</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="email"
                                   value="{{ $user->email }}">
                            @error('email')
                            <p class="text-red-600 flex justify-start">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">پسورد</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="password">
                            @error('password')
                            <p class="text-red-600 ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
                        <div class="col-sm-10">
                            <input name="image" type="file" class="form-control-file" id="file">
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-success btn-uppercase">
                            <i class="ti-check-box m-r-5"></i> ذخیره
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
