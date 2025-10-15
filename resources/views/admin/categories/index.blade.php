@extends('admin.layouts.master')
@section('content')
    <div class="card">
        @include('admin.layouts.partials.message')
        <div class="card-body">
            <div class="table overflow-auto" tabindex="8">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center align-middle text-primary">ردیف</th>
                        <th class="text-center align-middle text-primary">نام دسته بندی</th>
                        <th class="text-center align-middle text-primary">دسته بندی پدر</th>
                        <th class="text-center align-middle text-primary">ویرایش</th>
                        <th class="text-center align-middle text-primary">حذف</th>
                        <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $index => $category)
                    <tr>
                        <td class="text-center align-middle">{{$categories->firstItem() + $index}}</td>
                        <td class="text-center align-middle">{{ $category->name }}</td>
                        <td class="text-center align-middle">{{ $category->ParentCategory->name }}</td>
                        <td class="text-center align-middle">
                            <a class="btn btn-outline-info" href="{{ route('categories.edit',$category->id) }}">
                                ویرایش
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <form action="{{ route('categories.destroy',$category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-outline-info" value="حذف"/>
                            </form>
                        </td>
                        <td class="text-center align-middle">{{ \Hekmatinasser\Verta\Facades\Verta::instance($category->created_at)->format("%B %d %y") }}</td>
                    </tr>
                    @endforeach
                </table>
                <div style="margin: 40px !important;"
                     class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
