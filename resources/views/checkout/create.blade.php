@extends('layouts.master')

@section('title')
Laracamp - Checkout
@endsection

@section ('content')
    <section class="checkout">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        YOUR FUTURE CAREER
                    </p>
                    <h2 class="primary-header">
                        Start Invest Today
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <div class="item-bootcamp">
                                <img src="{{ asset('frontend/assets/images/item_bootcamp.png') }}" alt="" class="cover">
                                <h1 class="package text-uppercase">
                                   {{ $camps->title}}
                                </h1>
                                <p class="description">
                                    Bootcamp ini akan mengajak Anda untuk belajar penuh mulai dari pengenalan dasar sampai membangun sebuah projek asli
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-12"></div>
                        <div class="col-lg-6 col-12">
                            <form action="{{ route('checkout.store', $camps->id) }}" method="POST" class="basic-form">
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="mb-4">
                                    <label for="occupation" class="form-label">Occupation</label>
                                    <input type="text" name="occupation" class="form-control" id="occupation" aria-describedby="emailHelp" value="{{ Auth::user()->occupation }}">
                                </div>
                                <div class="mb-4">
                                    <label for="card_number" class="form-label">Card Number</label>
                                    <input type="number" name="card_number" class="form-control" id="card_number" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-5">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <label for="expaired" class="form-label">Expired</label>
                                            <input type="date" name="expaired" class="form-control" id="expired" aria-describedby="emailHelp">
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <label for="cvc" class="form-label">CVC</label>
                                            <input type="number" name="cvc" class="form-control" id="cvc" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="w-100 btn btn-primary">Pay Now</button>
                                <p class="text-center subheader mt-4">
                                    <img src="{{ asset('frontend/assets/images/ic_secure.svg') }}" alt=""> Your payment is secure and encrypted.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection