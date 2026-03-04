@extends('layouts.app')

@section('title', 'Post')

@section('style')
    <style>
        .image {
            max-width: 100%;
            max-height: 400px;
            object-fit: cover;
            object-position: center;
        }

        .profile_image {
            width: 35px;
            height: 35px;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
            border: 3px solid white;
            display: inline-block;
        }

        .profile_image_comment {
            width: 50px;
            height: 50px;
        }
    </style>
@endsection

@section('body')
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row d-flex justify-content-between">
            <div class="col-lg-7">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4 ">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                        <!-- Post meta content-->
                        <div class="meta-style2 mt-auto py-2 border-top border-dashed">
                            <ul class="list-unstyled d-flex gap-3 mb-0">
                                <li class="d-flex justify-content-between align-items-center">
                                    <div class="pe-2">
                                        <img src="{{ asset('users/images/' . $post->user->profile_image) }}" alt=""
                                            class="profile_image rounded-circle img-fluid">
                                    </div>
                                    <div class=" text-muted small">
                                        {{ $post->user->first_name . ' ' . $post->user->last_name ?? 'User' }}</div>
                                </li>
                                <li class="text-muted small d-flex justify-content-between align-items-center">
                                    <i class="bi bi-calendar-week-fill me-1 pe-1"></i>
                                    @if ($post->created_at->gt(now()->subYear()))
                                        {{ $post->created_at->diffForHumans() }}
                                    @else
                                        {{ $post->created_at->format('d M, Y | h:m A') }}
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <!-- Post categories-->
                            <div>
                                <a class="badge bg-secondary text-decoration-none link-light"
                                    href="">{{ $post->category->name }}</a>
                            </div>
                            {{-- Edit And Delete Buttons --}}
                            @auth
                                @if (auth()->user()->id === $post->user_id)
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('posts.edit', $post->slug) }}" method="POST">
                                            @csrf
                                            <a href="{{ route('posts.edit', $post->slug) }}"
                                                class="btn btn-outline-primary btn-sm px-3">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                        </form>

                                        <form action="{{ route('posts.destroy', $post->slug) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this post?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm px-3">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                        {{-- Alert Of Creating Post --}}
                        @if (session('created'))
                            <div class="alert alert-success alert-dismissible text-bg-success border-0 fade show"
                                role="alert">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>{{ session('created') }}</strong>
                            </div>
                        @endif
                        {{-- Alert Of Updating Post --}}
                        @if (session('updated'))
                            <div class="alert alert-success alert-dismissible text-bg-success border-0 fade show"
                                role="alert">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>{{ session('updated') }}</strong>
                            </div>
                        @endif
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4">
                        <img class="img-fluid rounded image" src="{{ asset('images/' . $post->image_path) }}"
                            alt="..."
                            onerror="this.onerror=null; this.src='https://dummyimage.com/900x400/ced4da/6c757d.jpg'" />
                    </figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{{ $post->description }}</p>
                    </section>
                </article>
                <!-- Comments section-->
                <section class="mb-5" id="comments-section">
                    <div class="card bg-light">
                        <div class="card-body pb-0">
                            <!-- Comment form-->
                            @if (auth()->check())
                                <form method="POST" action="{{ route('comments.store', $post->id) }}" class="mb-4">
                                    @csrf
                                    <div class="d-flex gap-3">
                                        <div>
                                            <img class="profile_image profile_image_comment rounded-circle"
                                                src="{{ asset('users/images/' . auth()->user()->profile_image) }}"
                                                alt="..." />
                                        </div>
                                        <div style="width: 100%">
                                            <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="3"
                                                placeholder="Join the discussion and leave a comment!" style="width: 100%"></textarea>
                                            @error('content')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="float-end mt-2 pt-1">
                                        <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                                    </div>
                                </form>
                            @else
                                You Must Log In To Post Comments.
                            @endif
                        </div>
                        <div class="px-3 py-1">{{ $comments->count() }} Comments</div>
                        <!-- Single comment-->
                        @foreach ($comments as $comment)
                            <div class="d-flex my-3 px-3 d-flex justify-content-between">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img
                                            class="profile_image profile_image_comment rounded-circle"
                                            src="{{ asset('users/images/' . $comment->user->profile_image) }}"
                                            alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="">
                                            <span class="fw-bold">
                                                {{ $comment->user->first_name . ' ' . $comment->user->last_name }}
                                            </span>-
                                            <span class="small">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        {{ $comment->content }}
                                    </div>
                                </div>
                                @if ($comment->user == auth()->user())
                                    <div class="d-flex justify-content-center">
                                        {{-- <form method="GET" action="{{ route('comments.edit', $comment->id) }}"
                                            class="d-flex justify-content-center">
                                            <button class="btn">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                        </form> --}}
                                        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}"
                                            class="d-flex justify-content-center">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn" onclick=" alert('Are You Sure? ')">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
            <!-- SideBar-->
            <x-sidebar></x-sidebar>

        </div>
    </div>
@endsection
