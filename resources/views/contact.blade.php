@extends('layouts.app')

@section('title', 'Contact')

@section('content')

    <x-page-header
        title="Contact Us"
        subtitle="Have a question? Send us a message and we'll get back to you."
        :crumbs="['Dashboard' => '/', 'Contact' => '']"
    />

    <div class="row g-3">
        <div class="col-lg-7">
            <div class="et-card">
                <div class="et-card-body">
                    <form>
                        <x-form-input name="name" label="Your Name" icon="bi-person-fill" placeholder="John Doe" required />
                        <x-form-input name="email" label="Email Address" type="email" icon="bi-envelope-fill" placeholder="john@example.com" required />

                        <div class="mb-3">
                            <label class="et-form-label">Message <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="5" placeholder="How can we help?" required></textarea>
                        </div>

                        <button class="btn btn-et-primary">
                            <i class="bi bi-send-fill me-1"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="et-card h-100">
                <div class="et-card-body">
                    <h5 class="mb-3">Get in Touch</h5>
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="et-stat-icon" style="background:#4f46e5;width:40px;height:40px;font-size:1rem;"><i class="bi bi-envelope-fill"></i></div>
                        <div>
                            <div class="fw-semibold">Email</div>
                            <div class="text-muted small">support@edutrack.test</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="et-stat-icon" style="background:#06b6d4;width:40px;height:40px;font-size:1rem;"><i class="bi bi-telephone-fill"></i></div>
                        <div>
                            <div class="fw-semibold">Phone</div>
                            <div class="text-muted small">+92 300 1234567</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <div class="et-stat-icon" style="background:#16a34a;width:40px;height:40px;font-size:1rem;"><i class="bi bi-geo-alt-fill"></i></div>
                        <div>
                            <div class="fw-semibold">Address</div>
                            <div class="text-muted small">Rawalpindi, Punjab, Pakistan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
