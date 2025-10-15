@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                @include('admin.layouts.partials.errors')
                <h4 class="card-title">ایجاد مقاله</h4>
                <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عنوان</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="title"
                                   value="{{old('title')}}">
                            @error('title')
                            <p class="text-red-600 ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">متن مقاله</label>
                        <div class="col-sm-10">
                            <textarea name="body" id="editor" class="form-control" cols="30" rows="10"></textarea>
                            @error('body')
                            <p class="text-red-600 flex justify-start">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">دسته بندی</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category_id" id="">
                                <option value="{{null}}">انتخاب کنید</option>
                                @foreach($categories as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="text-red-600 ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عکس مقاله</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control text-left" dir="rtl" name="image">
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
@push('scripts')
    <script>
        $(document).ready(function () {
            class MyUploadAdapter {
                constructor(loader) {
                    this.loader = loader;
                    this.url = '{{ route('ckeditor.upload') }}';
                }
                upload() {
                    return this.loader.file.then(
                        (file) =>
                            new Promise((resolve, reject) => {
                                this._initRequest();
                                this._initListeners(resolve, reject, file);
                                this._sendRequest(file);
                            })
                    );
                }
                abort() {
                    if (this.xhr) {
                        this.xhr.abort();
                    }
                }
                _initRequest() {
                    const xhr = (this.xhr = new XMLHttpRequest());
                    xhr.open("POST", this.url, true);
                    xhr.setRequestHeader("x-csrf-token", "{{ csrf_token() }}");
                    xhr.responseType = "json";
                }
                _initListeners(resolve, reject, file) {
                    const xhr = this.xhr;
                    const loader = this.loader;
                    const genericErrorText = `Couldn't upload file: ${file.name}.`;
                    xhr.addEventListener("error", () => reject(genericErrorText));
                    xhr.addEventListener("abort", () => reject());
                    xhr.addEventListener("load", () => {
                        const response = xhr.response;
                        if (!response || response.error) {
                            return reject(response && response.error ? response.error.message : genericErrorText);
                        }
                        resolve({
                            default: response.url,
                        });
                    });
                    if (xhr.upload) {
                        xhr.upload.addEventListener("progress", (evt) => {
                            if (evt.lengthComputable) {
                                loader.uploadTotal = evt.total;
                                loader.uploaded = evt.loaded;
                            }
                        });
                    }
                }
                _sendRequest(file) {
                    const data = new FormData();
                    data.append("upload", file);
                    this.xhr.send(data);
                }
            }
            function SimpleUploadAdapterPlugin(editor) {
                editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
                    return new MyUploadAdapter(loader);
                };
            }
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    extraPlugins: [SimpleUploadAdapterPlugin],
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            '|',
                            'fontSize',
                            'fontColor',
                            '|',
                            'imageUpload',
                            'blockQuote',
                            'insertTable',
                            'undo',
                            'redo',
                            'codeBlock'
                        ]
                    },
                    language: {
                        ui: 'fa',
                        content: 'fa'
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells'
                        ]
                    },
                })
                .then(editor => {
                    console.log('Editor was initialized', editor);
                })
                .catch(error => {
                    console.error(error.stack);
                });

        });
    </script>
@endpush

