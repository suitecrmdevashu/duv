@extends('frontend.layout.master', ['page_title' => 'Contact Us'])
@push('styles')
<style>
    .contact-section {
        background: #f8f9fa;
        padding: 80px 0 60px;
    }

    .contact-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px;
        margin-top: 20px;
    }

    .contact-title {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
    }

    .contact-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: #3498db;
    }

    .contact-card {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        margin-bottom: 30px;
        height: 100%;
        border: none;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    }

    .contact-card.location {
        background: #e74c3c;
    }

    .contact-card.hours {
        background: #3498db;
    }

    .contact-card.contact {
        background: #f39c12;
    }

    .contact-card .card-body {
        padding: 30px;
        color: white;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .contact-card .card-title {
        font-weight: 600;
        margin-bottom: 20px;
        text-align: center;
        font-size: 1.25rem;
    }

    .contact-card .card-subtitle {
        font-weight: 500;
        margin-bottom: 15px;
        text-align: center;
        white-space: nowrap;
    }

    .contact-card .card-text {
        text-align: center;
        margin-bottom: 0;
        word-break: break-all;
    }

    .contact-form {
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        margin-top: 30px;
    }

    .form-control {
        border-radius: 4px;
        padding: 12px 15px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
    }

    .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }

    textarea.form-control {
        min-height: 120px;
    }

    .submit-btn {
        background: #3498db;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 4px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .submit-btn:hover {
        background: #2980b9;
        transform: translateY(-2px);
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border-radius: 4px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .text-danger {
        color: #e74c3c;
        font-size: 0.9rem;
        margin-top: -15px;
        margin-bottom: 15px;
        display: block;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .contact-card .card-body {
            padding: 20px;
        }

        .contact-card .card-subtitle {
            white-space: normal;
        }
    }

    @media (max-width: 768px) {
        .contact-section {
            padding: 60px 0 40px;
        }

        .contact-container, .contact-form {
            padding: 30px;
        }

        .contact-card {
            margin-top: 20px;
        }
    }

    @media (max-width: 576px) {
        .contact-title {
            font-size: 1.8rem;
        }

        .contact-container, .contact-form {
            padding: 20px;
        }

        .contact-card .card-body {
            padding: 15px;
        }

        .contact-card .card-subtitle,
        .contact-card .card-text {
            font-size: 0.9rem;
        }
    }
</style>
@endpush

@section('content')
<div class="contact-section">
    <div class="container">
        <div class="contact-container">
            <h2 class="contact-title">Contact Us</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @foreach ($SocialContacts as $SocialInfor)
            @endforeach

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card location">
                        <div class="card-body">
                            <h5 class="card-title">LOCATION</h5>
                            <h4 class="card-subtitle">DUV International School</h4>
                            <p class="card-text">Parthala Khanjarpur, Sector 123, Noida, Uttar Pradesh 201307</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="contact-card hours">
                        <div class="card-body">
                            <h5 class="card-title">SCHOOL HOURS</h5>
                            <h4 class="card-subtitle">8 AM to 3 PM</h4>
                            <p class="card-text">Weekends: Closed</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="contact-card contact">
                        <div class="card-body">
                            <h5 class="card-title">PHONE & EMAIL</h5>
                            <h6 class="card-subtitle">
                                <i class="fa fa-phone mr-2" aria-hidden="true"></i> {{$SocialInfor->phone}}
                            </h6>
                            <!-- Large devices: icon above email -->
                            <p class="card-text d-none d-lg-block">
                                <i class="fa fa-envelope d-block mb-1" aria-hidden="true"></i>
                                <span style="word-break: break-word;">{{$SocialInfor->email}}</span>
                            </p>
                            <!-- Small devices: icon inline -->
                            <p class="card-text d-lg-none">
                                <i class="fa fa-envelope mr-2" aria-hidden="true"></i>
                                <span style="word-break: break-word;">{{$SocialInfor->email}}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-form bg-white">
            <form action="{{ route('contactusemail') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" class="form-control" name="first" placeholder="First name" required>
                        <span class="text-danger">{{ $errors->first('first') }}</span>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" class="form-control" name="last" placeholder="Last name" required>
                        <span class="text-danger">{{ $errors->first('last') }}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="email" class="form-control" name="emailto" placeholder="Email" required>
                        <span class="text-danger">{{ $errors->first('emailto') }}</span>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="number" class="form-control" name="phone" placeholder="Phone" required>
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <textarea name="message" class="form-control" id="message" placeholder="Message" rows="5" required></textarea>
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                </div>

                <div class="text-center">
                    <button type="submit" class="submit-btn">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
