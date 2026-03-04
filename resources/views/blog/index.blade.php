@extends('layouts.app')

@section('title', 'Blog')

@section('style')
    <style>
        .image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            object-position: center;
        }

        .card-text {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 3em;
        }

        .limit-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .limit-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .profile_image {
            width: 35px;
            height: 35px;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
            border: 3px solid white
                /*#0d6efd*/
            ;
            box-shadow: 0 0px 4px rgba(0, 0, 0, 0.2);
            display: inline-block;
        }
        .blog-grid {
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
            border: 1px solid #eee;
            border-radius: 0.25rem;
            background: #fff;
        }

        .blog-grid:hover {
            transform: translateY(-5px);
        }
    </style>
@endsection

@section('body')
    <!-- Page header with logo and tagline-->
    <header class="header-bg bg-light border-bottom mb-4 py-1">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Posts</h1>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-9">
                <!-- Featured blog post-->
                {{-- <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg"
                            alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">January 1, 2023</div>
                        <h2 class="card-title">Featured Post Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid
                            atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero
                            voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a class="btn btn-primary" href="#!">Read more →</a>
                    </div>
                </div> --}}
                <!-- Nested row for non-featured blog posts-->

                {{--  Aler Of Post deleted --}}
                @if (session('deleted'))
                    <div class="alert alert-success alert-dismissible text-bg-success border-0 fade show" role="alert">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        <strong>{{ session('deleted') }}</strong>
                    </div>
                @endif
                {{-- Posts --}}
                <div class="row g-4">
                    @foreach ($allPosts as $post)
                        {{-- التعديل هنا: col-lg-6 تجعلها عمودين في الشاشات الكبيرة --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-grid h-100 d-flex flex-column shadow-sm border rounded bg-white">

                                {{-- قسم الصورة --}}
                                <div class="blog-grid-img">
                                    <img src="{{ asset('images/' . $post->image_path) }}" class="img-fluid w-100 image"
                                        {{-- زدنا الارتفاع قليلاً لأن العمود أصبح أعرض --}} alt="{{ $post->title }}"
                                        onerror="this.src='https://dummyimage.com/700x350/dee2e6/6c757d.jpg&text=No+Image'">
                                </div>

                                <div class="blog-grid-text p-4 d-flex flex-column flex-grow-1">

                                    {{-- 1. العنوان: تحديد ارتفاع ثابت لضمان عدم تأثر السطور --}}
                                    <h3 class="h5">
                                        <a href="{{ route('posts.single.post', $post->slug) }}"
                                            class="limit-1 text-dark text-decoration-none fw-bold link-primary">
                                            {{ $post->title }}
                                        </a>
                                    </h3>

                                    {{-- 2. الوصف: تحديد ارتفاع ثابت وقص النص الزائد --}}
                                    <p class="limit-2 text-muted small flex-grow-1"
                                        style="max-height: 40px; overflow: hidden;">
                                        {{ $post->description }}
                                    </p>

                                    {{-- User And Category --}}
                                    <div class="meta-style2 mt-auto pt-1 border-top border-dashed">
                                        <ul class="list-unstyled d-flex justify-content-between align-items-center mb-0">
                                            <li class="d-flex justify-content-between align-items-center">
                                                <div class="pe-2">
                                                    <img src="{{ asset('users/images/' . $post->user->profile_image) }}"
                                                        alt="" class="profile_image rounded-circle img-fluid">
                                                </div>
                                                <div class=" text-muted small">{{ $post->user->first_name ?? 'User' }}</div>
                                            </li>
                                            <li class="small text-muted">
                                                <i class="bi bi-chat"></i>
                                                {{ $post->comment->count() }}
                                            </li>
                                            <li>
                                                <span class="badge bg-secondary py-1 px-2" style="font-size: 10px;">
                                                    {{ $post->category->name }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>

                                    {{-- Button Read More --}}
                                    <div class="mt-3">
                                        <a class="btn btn-primary btn-sm w-100"
                                            href="{{ route('posts.single.post', $post->slug) }}">
                                            Read more →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- Posts --}}

                {{-- <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"
                                aria-disabled="true">Newer</a></li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <li class="page-item"><a class="page-link" href="#!">15</a></li>
                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                    </ul>
                </nav> --}}
            </div>
            <!-- SideBar-->
            <x-sidebar></x-sidebar>
        </div>
    </div>
@endsection
