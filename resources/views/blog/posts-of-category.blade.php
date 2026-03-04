@extends('layouts.app')

@section('title', 'Create Post')

@section('style')
    <style>
        /* توحيد حجم الصور (700x350) والحفاظ على تناسقها */
        .image {
            width: 100%;
            height: 220px;
            /* يمكنك رفعها لـ 350px حسب الرغبة */
            object-fit: cover;
            /* أهم خاصية لقص الصورة بذكاء لتناسب الإطار */
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
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

        .meta-style2 {
            border-top: 1px dashed #cee1f8;
            padding-top: 15px;
        }

        .meta-style2 ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 15px;
            font-size: 0.85rem;
        }

        .meta-style2 a {
            color: #6c757d;
            text-decoration: none;
        }

        .profile_image {
            width: 35px;
            height: 35px;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0px 4px rgba(0, 0, 0, 0.2);
            display: inline-block;
        }
    </style>
@endsection
@section('body')
    <header class="header-bg bg-light border-bottom mb-5 py-5">
        <div class="container text-center">
            <h1 class="fw-bolder">{{ $category }} Category</h1>
        </div>
    </header>

    <div class="container">
        <div class="row g-4 mb-5">
            @foreach ($posts as $post)
                <div class="col-md-6 col-lg-3">
                    <div class="blog-grid h-100 d-flex flex-column shadow-sm border rounded bg-white">

                        {{-- Image --}}
                        <div class="blog-grid-img">
                            <img src="{{ asset('images/' . $post->image_path) }}" class="img-fluid w-100 image"
                                {{-- زدنا الارتفاع قليلاً لأن العمود أصبح أعرض --}} alt="{{ $post->title }}"
                                onerror="this.src='https://dummyimage.com/700x350/dee2e6/6c757d.jpg&text=No+Image'">
                        </div>

                        <div class="blog-grid-text p-3 d-flex flex-column flex-grow-1">

                            {{-- Title --}}
                            <h3 class="h5">
                                <a href="{{ route('posts.single.post', $post->slug) }}"
                                    class="text-dark text-decoration-none fw-bold link-primary">
                                    {{ Str::limit($post->title, 50) }}
                                </a>
                            </h3>

                            {{-- Description --}}
                            <p class="text-muted small flex-grow-1" style="max-height: 40px; overflow: hidden;">
                                {{ Str::limit($post->description, 100) }}
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

                            {{-- Button read More --}}
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
    </div>
@endsection
