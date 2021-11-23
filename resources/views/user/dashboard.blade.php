@extends('layouts.master')

@section('title')
Laracamp - My Dashboard
@endsection

@section ('content')
    <section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        My Bootcamps
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                <table class="table">
                    <tbody>
                        @forelse ($checkouts as $item)
                        <tr class="align-middle">
                            <td width="18%">
                                <img src="{{ asset('frontend/assets/images/item_bootcamp.png') }}" height="120" alt="">
                            </td>
                            <td>
                                <p class="mb-2">
                                    <strong>{{ $item->Camps->title}}</strong>
                                </p>
                                <p>
                                    {{ $item->created_at->format('M d, Y')}}
                                </p>
                            </td>
                            <td>
                                <strong>${{ $item->Camps->price}}k</strong>
                            </td>
                            <td>
                             @if ($item->is_paid)
                                 <strong class="text-success">Payment Success</strong>
                             @else
                             <strong>Waiting for Payment</strong>
                             @endif
                            </td>
                            <td>
                                <a href="https://wa.me/082372429227?text=Hi, Saya ingin bertanya tentang kelas {{ $item->Camps->title }}" target="_blank" class="btn btn-primary">
                                    Contact Support
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">
                               <h3>No Data Record</h3> 
                            </td>
                        </tr>
                        @endforelse
                
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection