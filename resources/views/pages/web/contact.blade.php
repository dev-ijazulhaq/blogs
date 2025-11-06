@extends('layouts.app')

@section('mainContent')

<!-- Hero Banner -->
<section class="hero-section" style="background: url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1500&q=80') center center/cover no-repeat;">
    <div class="container text-center hero-content text-white">
        <h1 class="fw-bold mb-3">Get in Touch</h1>
        <p class="lead">We’d love to hear from you. Let’s connect and build something amazing together!</p>
    </div>
</section>

<!-- Contact Info Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="p-4 border rounded-3 bg-white shadow-sm h-100">
                    <i class="bi bi-geo-alt fs-2 text-primary mb-3"></i>
                    <h6 class="fw-bold">Our Office</h6>
                    <p class="text-muted small mb-0">123 Innovation Street, Riyadh, Saudi Arabia</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-3 bg-white shadow-sm h-100">
                    <i class="bi bi-envelope fs-2 text-primary mb-3"></i>
                    <h6 class="fw-bold">Email Us</h6>
                    <p class="text-muted small mb-0">support@blogify.com</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-3 bg-white shadow-sm h-100">
                    <i class="bi bi-telephone fs-2 text-primary mb-3"></i>
                    <h6 class="fw-bold">Call Us</h6>
                    <p class="text-muted small mb-0">+966 55 123 4567</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <i class="bi bi-chat-dots-fill fs-2 text-primary mb-2"></i>
                            <h4 class="fw-bold">Send Us a Message</h4>
                            <p class="text-muted small mb-0">We’ll get back to you as soon as possible.</p>
                        </div>

                        <form action="#" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                                        <label for="name"><i class="bi bi-person me-2"></i>Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                                        <label for="email"><i class="bi bi-envelope me-2"></i>Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject" required>
                                        <label for="subject"><i class="bi bi-pencil me-2"></i>Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="message" placeholder="Your Message" style="height: 150px;" required></textarea>
                                        <label for="message"><i class="bi bi-chat-text me-2"></i>Your Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Send Message</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container-fluid px-0">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3625.185198258808!2d46.6752953747155!3d24.71355155354445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f0382b2a0a7a5%3A0x3e8ff2c4b874ef2b!2sRiyadh!5e0!3m2!1sen!2ssa!4v1689955502048!5m2!1sen!2ssa"
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>
@endSection