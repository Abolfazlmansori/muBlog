<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li data-toggle="tooltip" title="کاربران">
                <a href="#users" title=" کاربران">
                    <i class="icon ti-user"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="مقاله ها">
                <a href="#articles" title=" مقاله ها">
                    <i class="icon ti-book"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="دسته بندی ها">
                <a href="#categories" title=" دسته بندی ها">
                    <i class="icon ti-bookmark"></i>
                </a>
            </li>
        </ul>
        <ul>
            <li data-toggle="tooltip" title="ویرایش پروفایل">
                <a href="#" class="go-to-page">
                    <i class="icon ti-settings"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="خروج">
                <a href="{{ route('home') }}" class="go-to-page">
                    <i class="icon ti-power-off"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">
        <ul id="users">
            <li>
                <a href="#">کاربران</a>
                <ul>
                    <li><a href="{{route('users.create')}}">ایجاد کاربر</a></li>
                    <li><a href="{{route('users.index')}}">لیست کاربران</a></li>
                    <li><a href="{{route('users.trashed')}}">لیست کاربران حذف شده</a></li>

                </ul>
            </li>
            <li>
                <a href="#">نقش ها</a>
                <ul>
                    <li><a href="{{route('roles.create')}}">ایجاد نقش</a></li>
                    <li><a href="{{route('roles.index')}}">لیست نقش ها</a></li>
                    <li><a href="{{route('roles.trashed')}}">لیست نقش های حذف شده</a></li>
                </ul>
            </li>
        </ul>
        <ul id="articles">
            <li>
                <a href="#">مقالات</a>
                <ul>
                    <li><a href="{{route('articles.create')}}">ایجاد مقاله</a></li>
                    <li><a href="{{route('articles.index')}}">لیست مقالات</a></li>
                    <li><a href="{{route('articles.trashed')}}">لیست مقالات حذف شده</a></li>
                </ul>
            </li>
            <li>
                <a href="#">نظرات</a>
                <ul>
                    <li><a href="{{route('articles.create')}}">ایجاد نظر</a></li>
                    <li><a href="{{route('comments.index')}}">لیست نظرات</a></li>
                    <li><a href="{{route('articles.trashed')}}">لیست مقالات حذف شده</a></li>
                </ul>
            </li>
        </ul>
        <ul id="categories">
            <li>
                <a href="#">دسته بندی ها</a>
                <ul>
                    <li><a href="{{route('categories.create')}}">ایجاد دسته بندی</a></li>
                    <li><a href="{{route('categories.index')}}">لیست دسته بندی ها</a></li>
                    <li><a href="{{route('categories.trashed')}}">لیست دسته بندی های حذف شده</a></li>
                </ul>
            </li>
        </ul>

    </div>
</div>
