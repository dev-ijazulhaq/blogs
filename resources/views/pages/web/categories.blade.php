@extends('layouts.app')

@section('mainContent')

<!-- Hero Section -->
<section class="hero-section" style="background: url('https://images.unsplash.com/photo-1556761175-4b46a572b786?auto=format&fit=crop&w=1500&q=80') center center/cover no-repeat;">
    <div class="container text-center hero-content text-white">
        <h1 class="fw-bold mb-3">Explore Our Categories</h1>
        <p class="lead">Discover topics you love — from web development to design, AI, and more.</p>
    </div>
</section>

<!-- Categories Grid -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @php
            $categories = [
            ['name' => 'Web Development', 'image' => 'https://picsum.photos/500/300?random=11'],
            ['name' => 'Design', 'image' => 'https://picsum.photos/500/300?random=12'],
            ['name' => 'Mobile Apps', 'image' => 'https://picsum.photos/500/300?random=13'],
            ['name' => 'AI & Machine Learning', 'image' => 'https://picsum.photos/500/300?random=14'],
            ['name' => 'Cybersecurity', 'image' => 'https://picsum.photos/500/300?random=15'],
            ['name' => 'Cloud Computing', 'image' => 'https://picsum.photos/500/300?random=16'],
            ['name' => 'Data Science', 'image' => 'https://picsum.photos/500/300?random=17'],
            ['name' => 'Tech News', 'image' => 'https://picsum.photos/500/300?random=18'],
            ];
            @endphp

            @foreach($categories as $category)
            <div class="col-md-3">
                <div class="card category-card border-0 shadow-sm h-100">
                    <div class="position-relative">
                        <img src="{{ $category['image'] }}" class="card-img-top rounded-top" alt="{{ $category['name'] }}">
                        <div class="category-overlay d-flex align-items-center justify-content-center">
                            <h5 class="text-white fw-bold">{{ $category['name'] }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endSection