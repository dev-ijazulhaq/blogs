@extends('layouts.app')

@section('mainContent')
<!-- Hero Banner -->
<section class="hero-section" style="background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1500&q=80') center center/cover no-repeat;">
    <div class="container text-center hero-content text-white">
        <h1 class="fw-bold mb-3">About Blogify</h1>
        <p class="lead">Your trusted source for tech insights, design inspiration, and development trends.</p>
    </div>
</section>

<!-- About Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-6"><img src="https://images.unsplash.com/photo-1598257006626-48b0c252070d?auto=format&fit=crop&w=800&q=80"
                    alt="About Blogify"
                    class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold mb-3">Our Mission</h2>
                <p class="text-muted">At Blogify, our mission is to empower developers, designers, and creators by delivering insightful, up-to-date, and actionable content that inspires growth and innovation. We believe knowledge should be accessible, engaging, and relevant to your daily journey in tech and creativity.</p>
                <p class="text-muted">Whether you’re learning to code, exploring UI/UX, or diving into emerging technologies like AI and blockchain — Blogify is here to guide you every step of the way.</p>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Our Core Values</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 border rounded-3 bg-white shadow-sm h-100">
                    <i class="bi bi-lightbulb fs-1 text-primary mb-3"></i>
                    <h5 class="fw-semibold">Innovation</h5>
                    <p class="text-muted small">We stay ahead of the curve by exploring emerging trends and technologies to keep you informed and inspired.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-3 bg-white shadow-sm h-100">
                    <i class="bi bi-people fs-1 text-primary mb-3"></i>
                    <h5 class="fw-semibold">Community</h5>
                    <p class="text-muted small">Our platform thrives on collaboration — we value the exchange of ideas that drives growth and connection.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-3 bg-white shadow-sm h-100">
                    <i class="bi bi-graph-up-arrow fs-1 text-primary mb-3"></i>
                    <h5 class="fw-semibold">Growth</h5>
                    <p class="text-muted small">We’re dedicated to helping individuals and teams expand their knowledge and reach their full potential.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Team -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Meet Our Team</h2>
        <div class="row g-4">
            @php
            $team = [
            ['name' => 'Sarah Johnson', 'role' => 'Editor-in-Chief', 'image' => 'https://randomuser.me/api/portraits/women/44.jpg'],
            ['name' => 'David Lee', 'role' => 'Tech Writer', 'image' => 'https://randomuser.me/api/portraits/men/47.jpg'],
            ['name' => 'Maria Gomez', 'role' => 'UI/UX Designer', 'image' => 'https://randomuser.me/api/portraits/women/48.jpg'],
            ['name' => 'James Brown', 'role' => 'Full Stack Developer', 'image' => 'https://randomuser.me/api/portraits/men/49.jpg'],
            ];
            @endphp

            @foreach($team as $member)
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100 team-card">
                    <img src="{{ $member['image'] }}" class="card-img-top rounded-top" alt="{{ $member['name'] }}">
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">{{ $member['name'] }}</h6>
                        <p class="text-muted small mb-0">{{ $member['role'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endSection