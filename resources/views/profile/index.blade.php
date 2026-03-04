@extends('layouts.app')

@section('title', 'Home')

@section('style')
    <style>
        .bg-secondary-soft {
            background-color: rgb(246, 246, 246) !important;
        }

        .rounded {
            border-radius: 5px !important;
        }

        .py-5 {
            padding-top: 3rem !important;
            padding-bottom: 3rem !important;
        }

        .px-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important;
        }

        .file-upload .square {
            height: 250px;
            width: 250px;
            margin: auto;
            vertical-align: middle;
            border: 1px solid #e5dfe4;
            background-color: #fff;
            border-radius: 5px;
        }

        .text-secondary {
            --bs-text-opacity: 1;
            color: rgba(208, 212, 217, 0.5) !important;
        }

        .btn-success-soft {
            color: #28a745;
            background-color: rgba(40, 167, 69, 0.1);
        }

        .btn-danger-soft {
            color: #dc3545;
            background-color: rgba(220, 53, 69, 0.1);
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.5rem 1rem;
            font-size: 0.9375rem;
            font-weight: 400;
            line-height: 1.6;
            color: #29292e;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #e5dfe4;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 5px;
            -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        }

        .profile_image {
            width: 250px;
            height: 250px;
            object-fit: cover;
            object-position: center;
        }

        .info-data-box {
            display: block;
            width: 100%;
            padding: 0.6rem 1rem;
            font-size: 0.9375rem;
            color: #29292e;
            background-color: #fff;
            border: 1px solid #e5dfe4;
            border-radius: 2px;
            min-height: 45px;
            display: flex;
            align-items: center;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.02);
        }

        .form-label {
            color: #333;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }
    </style>
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('success'))
                    <div class="mt-5 alert alert-success alert-dismissible text-bg-success border-0 fade show" role="alert">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                @if (session('error'))
                    <div class="mt-5 alert alert-danger alert-dismissible text-bg-danger border-0 fade show" role="alert">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif
                <!-- Page title -->
                <div class="my-5">
                    <h3>My Profile</h3>
                    <hr>
                </div>
                <!-- Form START -->
                <div class="file-upload">
                    <div class="row mb-5 gx-5">
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <!-- Contact detail -->
                            <div class="bg-secondary-soft px-5 py-5 rounded mb-5">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Contact detail</h4>
                                    <!-- First Name -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-dark">First Name :</label>
                                        <div class="info-data-box">
                                            {{ $user->first_name }}
                                        </div>
                                    </div>
                                    <!-- Last name -->
                                    <div class="col-md-6">
                                        <label class="form-label text-dark">Last Name :</label>
                                        <div class="info-data-box">
                                            {{ $user->last_name }}
                                        </div>
                                    </div>

                                    <!-- Phone number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Phone number</label>
                                        <div class="info-data-box">
                                            {{ $user->phone_number }}
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email *</label>
                                        <div class="info-data-box">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('profile.edit') }}" class="btn btn-secondary btn-block mt-4">Change Information</a>

                            </div>

                            <!-- change password -->
                            <div class="px-3 bg-secondary-soft rounded">
                                <div class="bg-secondary-soft px-4 py-5 rounded">
                                    <div class="row g-3">
                                        <h4 class="my-4">Password</h4>
                                    </div>
                                    <a href="{{ route('profile.edit.password') }}" class="btn btn-secondary btn-block mt-4">Change Password</a>
                                </div>
                            </div>
                        </div>
                        <!-- Upload profile -->
                        <div class="col-xxl-4">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="text-center mb-4 mt-0">Upload your profile photo</h4>
                                    <div class="text-center">
                                        <!-- Image upload -->
                                        <div class="square position-relative display-2 mb-3">
                                            <img id="profilePreview" class="profile_image"
                                                src="users/images/{{ $user->profile_image }}" alt="">
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('profile.image') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div>
                                            <!-- Button -->
                                            <div class="mb-1">
                                                <label for="formFile" class="form-label">Change your profile photo</label>
                                                <input name="profile_image" class="form-control p-1" type="file"
                                                    id="customFile">
                                            </div>
                                            @error('profile_image')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                            <!-- Content -->
                                            <p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum size
                                                100px
                                                x 100px</p>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-secondary"
                                            style="width: 100%">Update</button>
                                    </form>

                                    {{-- Delete Form --}}
                                    <form method="POST" action="{{ route('profile.delete.image') }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-secondary"
                                            onclick="return confirm('Are you sure you want to your profile photo?')"
                                            style="width: 100%">Remove</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Form END -->
            </div>
        </div>
    </div>
    <script>
        // الحصول على العناصر
        const fileInput = document.getElementById('customFile');
        const imagePreview = document.getElementById('profilePreview');

        // الاستماع لحدث تغيير الملف
        fileInput.onchange = function() {
            const file = fileInput.files[0]; // الحصول على الملف المرفوع

            if (file) {
                // إنشاء رابط مؤقت للملف وعرضه في الصورة
                imagePreview.src = URL.createObjectURL(file);
            }
        };
    </script>
@endsection
