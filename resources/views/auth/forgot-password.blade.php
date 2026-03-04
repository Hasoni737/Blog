{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.app')

@section('title', 'Home')

@section('body')
    <div class="mt-5 container d-flex align-items-center justify-content-center flex-grow-1 py-5">
        <div class="card shadow-lg w-100" style="max-width: 480px; border: none;">
            <div class="card-body p-4">
                <h2>Reset password is coming soon.</h2>
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-muted">Email Address</label>
                            <input type="email" name="email" class="form-control form-control-lg" id="email"
                                placeholder="name@example.com" required value="{{ old('email') }}" autofocus disabled>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-dark btn-lg" disabled>Email Password Reset Link</button>
                        </div>
                    </div>
                    <p class="text-center text-muted mt-4">Back To
                        <a href="{{ route('login') }}" class="text-decoration-none fw-bold text-dark">Sign in</a>.
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
