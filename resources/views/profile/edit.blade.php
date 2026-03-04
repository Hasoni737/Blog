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
    <div class="container h-100 d-flex justify-content-center align-items-center col-xxl-8 mb-5 mb-xxl-0">
        <!-- Contact detail -->
        <div class="bg-secondary-soft px-5 py-5 rounded mb-5">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <h4 class="mb-4 mt-0">Contact detail</h4>
                    <!-- First Name -->
                    <div class="col-md-6">
                        <label class="form-label">First Name *</label>
                        <input name="first_name" class="@error('first_name') is-invalid @enderror form-control" type="text" placeholder="" aria-label="First name"
                            value="{{ old('first_name', $user->first_name) }}">
                        @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Last name -->
                    <div class="col-md-6">
                        <label class="form-label">Last Name *</label>
                        <input name="last_name" class="@error('last_name') is-invalid @enderror form-control" type="text" placeholder="" aria-label="Last name"
                            value="{{ old('last_name', $user->last_name) }}">
                        @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Phone number -->
                    <div class="col-md-6">
                        <label class="form-label">Phone number</label>
                        <input name="phone_number" class="@error('phone_number') is-invalid @enderror form-control" type="number" placeholder=""
                            aria-label="Phone number" value="{{ old('phone_number', $user->phone_number) }}">
                        @error('phone_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Email -->
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email *</label>
                        <input name="email" class="@error('email') is-invalid @enderror form-control" type="email" id="inputEmail4"
                            value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary btn-block mt-4">Update</button>
            </form>
        </div>
    </div>
@endsection
