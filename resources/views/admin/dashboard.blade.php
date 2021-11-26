@extends('layouts.master')

@section('title')
Laracamp - Admin Dashboard
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card m-4">
                    <div class="card-header">
                       Admin
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <table class="table caption-top">
                            <caption>Checkout Data</caption>
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Camp</th>
                                <th scope="col">Price</th>
                                <th scope="col">Register Data</th>
                                <th scope="col">Paid Status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                             @php $no = 1; @endphp
                             @forelse ($checkouts as $item)
                                 <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item ->User->name}}</td>
                                    <td>{{$item ->Camps->title}}</td>
                                    <td>{{$item ->Camps->price}}</td>
                                    <td>{{$item ->created_at->format('M d y')}}</td>
                                    <td>
                                        @if ($item->is_paid)
                                           <span class="badge  bg-success">Paid</span>
                                        @else
                                            <span class="badge  bg-warning">Unpaid</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!$item->is_paid)
                                        <form action="{{ route('admin.checkout.update', $item->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-primary btn-sm">Set to Paid</button>
                                        </form>
                                        @endif
                                    </td>
                                 </tr>
                             @empty
                             <tr>
                                <td colspan="6" class="text-center">
                                    No Data Record
                                </td>
                            </tr>
                             @endforelse
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection