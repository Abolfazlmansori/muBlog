@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table overflow-auto" tabindex="8">
                    @include('admin.layouts.partials.message')
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
                        <th class="text-center align-middle text-primary">نام نقش</th>
                        <th class="text-center align-middle text-primary">بازنشانی</th>
                        <th class="text-center align-middle text-primary">حذف کامل</th>
                        <th class="text-center align-middle text-primary">تاریخ حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trashedRoles as $index => $role)
                    <tr>
                        <td class="text-center align-middle">{{$trashedRoles->firstItem() + $index}}</td>
                        <td class="text-center align-middle">{{ $role->name }}</td>
                        <td class="text-center align-middle">
                            <form action="{{ route('roles.restore',$role->id) }}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-outline-info" value="بازنشانی"/>
                            </form>
                        </td>
                        <td class="text-center align-middle">
                            <form action="{{ route('roles.force.delete',$role->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-outline-info" value="حذف"/>
                            </form>

                        </td>

                        <td class="text-center align-middle">{{ \Hekmatinasser\Verta\Facades\Verta::instance($role->deleted_at)->format("%B %d %y") }}</td>
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
