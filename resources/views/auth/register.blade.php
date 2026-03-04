{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layouts.app')

@section('title', 'Home')

@section('body')
    <div class="pt-4 container d-flex align-items-center justify-content-center flex-grow-1 pt-2">
        <div class="card shadow-lg w-100" style="max-width: 480px; border: none;">
            <div class="card-body ">
                <div class="text-center ">
                    <h1 class="h3 fw-bold"> Sign up</h1>
                    <p class="text-muted"> Sign up in below to create an account</p>
                </div>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="first_name" class="form-label text-muted">First Name *</label>
                            <input type="text" name="first_name" class="@error('first_name') is-invalid @enderror form-control form-control-lg" id="email"
                                placeholder="hassan" autofocus value="{{ old('first_name') }}">
                            @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="last_name" class="form-label text-muted">Last Name *</label>
                            <input type="text" name="last_name" class="@error('last_name') is-invalid @enderror form-control form-control-lg" id="email"
                                placeholder="ait lahcen" autofocus value="{{ old('last_name') }}">
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-muted">Email Address *</label>
                        <input type="email" name="email" class="@error('email') is-invalid @enderror form-control form-control-lg" id="email"
                            placeholder="name@example.com" autofocus value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label text-muted">Phone Number</label>
                        <input type="number" name="phone_number" class="@error('phone_number') is-invalid @enderror form-control form-control-lg" id="email"
                            placeholder="+91 9852 8855 252" autofocus value="{{ old('phone_number') }}">
                        @error('phone_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-muted">Password *</label>
                        <input type="password" name="password" class="@error('password') is-invalid @enderror form-control form-control-lg" id="password"
                            placeholder="Password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label text-muted">Confirm Password *</label>
                        <input type="password" name="password_confirmation" class="form-control form-control-lg"
                            id="password" placeholder="Confirm Password">
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-dark btn-lg">Sign in</button>
                    </div>

                    <p class="text-center text-muted mt-4">You Already Account?
                        <a href="{{ route('login') }}" class="text-decoration-none fw-bold text-dark">Sign in</a>.
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
