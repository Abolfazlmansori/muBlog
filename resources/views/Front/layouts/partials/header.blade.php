<header>
    <div class="index-top position-relative w-100 bg-white">
        <div class="main-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-3">
                        <img src="{{ asset('front/img/logo.png') }}" alt="" height="30px"
                             style="object-fit: contain;margin-top:18px;filter: grayscale(1);">
                    </div>
                    <div class="col-md-7 col-5 pt-2">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse"
                                 id="navbarSupportedContent">
                                <ul class="navbar-nav mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">خانه</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">مقالات</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" tabindex="-1"
                                           aria-disabled="true">تماس با ما</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" tabindex="-1"
                                           aria-disabled="true">درباره</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                            @foreach($mainCategory as $category)
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        {{$category->name}}
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        @foreach($category->childCategory as $child)
                                                            <li><a class="dropdown-item"
                                                                   href="{{route('frontend.articles',$child->slug)}}">{{$child->name}}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                    </li>
                                </ul>


                            </div>

                        </nav>
                    </div>
                    <div class="col-md-3 col-4 text-start">
                        <div class="top-account">
                            @guest
                                <a href="{{route('login')}}" class="text-dark"><i class="bi bi-person"> ورود </i></a>
                            @endguest
                                @auth
                                    <a href="{{route('panel')}}" class="text-dark"><i class="bi bi-person-square"> پنل
                                            کاربر</i></a>
                                @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
