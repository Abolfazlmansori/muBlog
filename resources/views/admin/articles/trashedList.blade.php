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
                        <th class="text-center align-middle text-primary">عکس</th>
                        <th class="text-center align-middle text-primary">عنوان مقاله</th>
                        <th class="text-center align-middle text-primary">نویسنده</th>
                        <th class="text-center align-middle text-primary">دسته بندی</th>
                        <th class="text-center align-middle text-primary">بازنشانی</th>
                        <th class="text-center align-middle text-primary">حذف کامل</th>
                        <th class="text-center align-middle text-primary">تاریخ حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $index => $article)
                        <tr>
                            <td class="text-center align-middle">{{$articles->firstItem() + $index}}</td>
                            <td class="text-center align-middle">
                                <figure class="avatar avatar">
                                    <img src="{{ asset('images/articles/'.$article->image) }}" class="rounded-circle" alt="image">
                                </figure>
                            </td>
                            <td class="text-center align-middle">{{ $article->title }}</td>
                            <td class="text-center align-middle">{{ $article->user->name }}</td>
                            <td class="text-center align-middle">{{ $article->category->name }}</td>
                            <td class="text-center align-middle">
                                <form action="{{ route('articles.restore',$article->id) }}" method="post">
                                    @csrf
                                    <input type="submit" class="btn btn-outline-info" value="بازنشانی"/>
                                </form>
                            </td>
                            <td class="text-center align-middle">
                                <form action="{{ route('articles.force.delete',$article->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-outline-info" value="حذف"/>
                                </form>
                            </td>
                            <td class="text-center align-middle">{{ \Hekmatinasser\Verta\Facades\Verta::instance($article->created_at)->format("%B %d %y") }}</td>
                        </tr>
                    @endforeach
                </table>
                <div style="margin: 40px !important;"
                     class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                </div>
            </div>
        </div>
    </div>
@endsection
