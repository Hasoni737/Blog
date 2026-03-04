@extends('layouts.app')

@section('title', 'About')

@section('body')
<section class="header-bg py-5 bg-light text-dark mb-5">
    <div class="container text-center py-5">
        <h1 class="display-4 fw-bold" style="color: white">Decoding the Future of Web</h1>
        <p class="lead mb-0" style="color: white">The story behind LaraPulse and our mission to empower developers.</p>
    </div>
</section>

<div class="container mb-5">
    <div class="row align-items-center mb-5">
        <div class="col-lg-6">
            <h2 class="fw-bold mb-4">Our Mission</h2>
            <p class="text-muted fs-5">
                LaraPulse was born out of a simple idea: <strong>"Code is poetry, but only when it's understood."</strong>
            </p>
            <p class="text-muted">
                Our mission is to bridge the gap between complex backend architectures and elegant user experiences. We specialize in Laravel development, PHP best practices, and the modern web ecosystem to help developers build scalable, high-performance applications.
            </p>
        </div>
        <div class="col-lg-6 py-3 text-center">
            <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow" alt="Coding Mission">
        </div>
    </div>

    <div class="row g-4 pb-5 py-3 text-center border-top">
        <div class="col-md-4">
            <div class="p-4 bg-light rounded-4 h-100 shadow-sm border-bottom border-dark border-4">
                <i class="bi bi-lightning-fill fs-1 text-primary mb-3"></i>
                <h4 class="fw-bold">Fast Learning</h4>
                <p class="small text-muted">Concise tutorials designed to get you up and running with Laravel in minutes, not hours.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-light rounded-4 h-100 shadow-sm border-bottom border-dark border-4">
                <i class="bi bi-shield-check fs-1 text-primary mb-3"></i>
                <h4 class="fw-bold">Clean Code</h4>
                <p class="small text-muted">We prioritize industry standards and design patterns to ensure your code is maintainable.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-light rounded-4 h-100 shadow-sm border-bottom border-dark border-4">
                <i class="bi bi-people-fill fs-1 text-primary mb-3"></i>
                <h4 class="fw-bold">Community</h4>
                <p class="small text-muted">A platform built by developers, for developers, fostering a culture of knowledge sharing.</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center py-5 border-top">
        <div class="col-lg-8 text-center">
            <h2 class="fw-bold mb-4">Who's Behind the Pulse?</h2>
            <p class="text-muted">
                I'm a passionate Full-Stack Developer specializing in the TALL stack (Tailwind, Alpine.js, Laravel, Livewire). LaraPulse is my way of giving back to the community that taught me everything.
            </p>
            <div class="mt-4">
                <a href="/contact" class="btn btn-dark px-4 py-2">Get in Touch</a>
                <a href="#posts" class="btn btn-outline-dark px-4 py-2 ms-2">View Portfolio</a>
            </div>
        </div>
    </div>
</div>
@endsection
