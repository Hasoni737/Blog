@extends('layouts.app')

@section('title', 'Contact')

@section('body')
    <!-- Page header with logo and tagline-->
    <header class=" header-bg py-1 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Contact Me</h1>
            </div>
        </div>
    </header>
    <x-contact></x-contact>
@endsection
