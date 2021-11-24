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
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" aria-describedby="emailHelp" value="{{ Auth::user()->name }}" required>
                                    @if ($errors->has('name'))
                                    <p class="text-danger">
                                      {{ $errors->first('name')}}
                                    </p>
                                @endif
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" aria-describedby="emailHelp" value="{{ Auth::user()->email }}" required>
                                    @if ($errors->has('email'))
                                    <p class="text-danger">
                                      {{ $errors->first('email')}}
                                    </p>
                                @endif
                                </div>
                                <div class="mb-4">
                                    <label for="occupation" class="form-label">Occupation</label>
                                    <input type="text" name="occupation" class="form-control {{ $errors->has('occupation') ? 'is-invalid' : ''}}" id="occupation" aria-describedby="emailHelp" value="{{old('occupation') ? : Auth::user()->occupation }}" required>
                                    @if ($errors->has('occupation'))
                                    <p class="text-danger">
                                      {{ $errors->first('occupation')}}
                                    </p>
                                @endif
                                </div>
                                <div class="mb-4">
                                    <label for="card_number" class="form-label">Card Number</label>
                                    <input type="number" name="card_number" class="form-control {{ $errors->has('card_number') ? 'is-invalid' : ''}}" id="card_number" aria-describedby="emailHelp" value="{{old('card_number') ? : '' }}" required>
                                    @if ($errors->has('card_number'))
                                    <p class="text-danger">
                                      {{ $errors->first('card_number')}}
                                    </p>
                                @endif
                                </div>
                                <div class="mb-5">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <label for="expaired" class="form-label">Expired</label>
                                            <input type="date" name="expaired" class="form-control {{ $errors->has('expaired') ? 'is-invalid' : ''}}" id="expired" aria-describedby="emailHelp" value="{{old('expaired') ? : '' }}" required>
                                            @if ($errors->has('expaired'))
                                            <p class="text-danger">
                                              {{ $errors->first('expaired')}}
                                            </p>
                                        @endif
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <label for="cvc" class="form-label">CVC</label>
                                            <input type="number" name="cvc" class="form-control {{ $errors->has('cvc') ? 'is-invalid' : ''}}" id="cvc" aria-describedby="emailHelp" value="{{old('cvc') ? : '' }}" required>
                                            @if ($errors->has('cvc'))
                                            <p class="text-danger">
                                              {{ $errors->first('cvc')}}
                                            </p>
                                        @endif
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