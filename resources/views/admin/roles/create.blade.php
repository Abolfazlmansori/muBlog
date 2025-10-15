@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h4 class="card-title">ایجاد نقش</h4>
                <form method="POST" action="{{ route('roles.store') }}" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نام نقش</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="name"
                                   value="{{old('name')}}">
                            @error('name')
                            <p class="text-red-600 ">{{ $message }}</p>
                            @enderror
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
