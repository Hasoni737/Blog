@extends('layouts.app')

@section('title', 'Edit Post')

@section('style')
    <style>
        .border-dashed {
            border-style: dashed !important;
            border-color: #dee2e6 !important;
        }

        .form-control,
        .form-select {
            padding: 0.75rem;
            border-color: #dee2e6;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: none;
        }
    </style>
@endsection

@section('body')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg w-100 p-4">
                    <h2 class="fw-bold mb-1">Edit Post Form</h2>
                    <p class="text-muted mb-4">Please fill out the form below To edit your post.</p>

                    <form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="first_name" class="form-label fw-bold">Post Title</label>
                            <input type="text" name="title" id="first_name"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="Enter Your Post Title" value="{{ old('title', $post->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Post Description</label>
                            <textarea name="description" id="description" rows="4" placeholder="Enter Your Description"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description', $post->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label fw-bold">Category</label>
                            <select name="category" id="category" class="form-select"
                                value="{{ old('category', $post->category->id) }}">
                                @foreach ($categories as $category)
                                    <option value={{ $category->id }}
                                        {{ old('category', $post->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold mb-0">Upload Image For The Post</label>
                            <p class="small text-muted mb-2">Upload a new image if you want to change the current one</p>

                            @if ($post->image_path)
                                <div class="mb-3">
                                    <p class="small fw-bold">Current Image:</p>
                                    <img src="{{ asset('images/' . $post->image_path) }}" class="img-thumbnail"
                                        style="height: 150px; width: auto;" alt="Current Image">
                                </div>
                            @endif

                            <div class="upload-area border border-2 border-dashed rounded-3 p-5 text-center bg-light">
                                <input type="file" name="image_path" id="image_path" class="d-none">
                                <label for="image_path" style="cursor: pointer;" id="upload-label">
                                    <div id="file-info">
                                        <span class="text-primary fw-bold">Change file</span>
                                        <span class="text-muted">or drop here</span>
                                    </div>
                                    <div id="file-name" class="mt-2 fw-bold text-success" style="display: none;"></div>
                                </label>
                            </div>

                            @error('image_path')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" name="check" required>
                            <label class="form-check-label" for="terms" >I agree to the terms and conditions.</label>
                        </div> --}}

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5 py-2 fw-bold w-100 w-md-auto">
                                Submit Order
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('image_path').addEventListener('change', function(e) {
            let fileName = e.target.files[0].name; // الحصول على اسم الملف
            let fileNameDisplay = document.getElementById('file-name');
            let fileInfoDisplay = document.getElementById('file-info');

            if (fileName) {
                fileInfoDisplay.style.display = 'none'; // إخفاء نص "Choose file"
                fileNameDisplay.innerText = "Selected: " + fileName; // وضع اسم الملف
                fileNameDisplay.style.display = 'block'; // إظهار الاسم
            }
        });
    </script>
@endsection
