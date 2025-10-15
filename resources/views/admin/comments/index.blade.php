@php use App\Enums\CommendStatus; @endphp
@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table overflow-auto" tabindex="8">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
                    </div>
                </div>
                @include('admin.layouts.partials.message')
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center align-middle text-primary">ردیف</th>
                        <th class="text-center align-middle text-primary">متن کامنت</th>
                        <th class="text-center align-middle text-primary">عنوان مقاله</th>
                        <th class="text-center align-middle text-primary">نام کاربر</th>
                        <th class="text-center align-middle text-primary">وضعیت</th>
                        <th class="text-center align-middle text-primary">تایید</th>
                        <th class="text-center align-middle text-primary">رد</th>
                        <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $index => $comment)
                        <tr>
                            <td class="text-center align-middle">{{$comments->firstItem() + $index}}</td>
                            <td class="text-center align-middle">{{$comment->body}}</td>
                            <td class="text-center align-middle">{{$comment->article->title}}</td>
                            <td class="text-center align-middle">{{$comment->user->name}}</td>
                            <td class="text-center align-middle">
                                @if($comment->status === CommendStatus::Draft-> value)
                                    <span class="badge bg-warning">{{$comment->status}}</span>
                                @elseif($comment->status === CommendStatus::Approved-> value)
                                    <span class="badge bg-success">{{$comment->status}}</span>
                                @elseif($comment->status === CommendStatus::Rejected-> value)
                                    <span class="badge bg-danger">{{$comment->status}}</span>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                @if($comment->status === CommendStatus::Draft->value)
                                    <a class="btn btn-outline-info" href="{{route('approved.comments',$comment->id)}}">
                                        تایید
                                    </a>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                @if($comment->status === CommendStatus::Draft->value)
                                    <a class="btn btn-outline-info" href="{{route('rejected.comments',$comment->id)}}">
                                        رد
                                    </a>
                                @endif
                            </td>
                            <td class="text-center align-middle">{{\Hekmatinasser\Verta\Facades\Verta::instance($comment->created_at)->format('%B %d، %Y')}}</td>
                        </tr>
                    @endforeach

                </table>
                <div style="margin: 40px !important;"
                     class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                    {{$comments->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function deleteArticle($id) {
            Swal.fire({
                title: "آیا از حذف مطمئن هستید",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "بله",
                cancelButtonText: "خیر",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/admin/articles/' + $id,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function (data) {
                            Swal.fire({
                                title: " مقاله با موفقیت حذف شد!",
                                text: data.success,
                                icon: "success"
                            });
                            location.reload();
                        }
                    })

                }
            });
        }
    </script>
@endpush
