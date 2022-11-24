@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4 p-3">
                        <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <div class="h3 d-flex justify-content-between">{{ __('Lot Details') }}
                                {{-- <a href="/liveAuction/{{$liveAuction->id}}/edit" class="btn btn-primary btn-sm">Edit</a> --}}
                            </div>
                        </div>

                        <div class="">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-12 ">
                                    <h3>Bids</h3>
                                    <div class="col-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Last Amount</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($lotbids as $bid)
                                                    <tr>
                                                        <th scope="row">{{ $bid->id }}</th>
                                                        <td>{{ $bid->customerName }}</td>
                                                        <td>{{ $bid->amount }}</td>
                                                        <td>{{ $bid->bidTime }}</td>
                                                        <td>
                                                            <a
                                                                href="/bid/{{ $bid->id }}"class="btn btn-primary btn-sm">
                                                                Bid Details
                                                            </a>
                                                            <a
                                                                href="/customer/{{ $bid->customerId }}"class="btn btn-primary btn-sm">
                                                                Customer Details
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 ">
                                    <div class="col-12">
                                        <label for="title" class="form-label">Title</label>
                                        <h5>{{ $lotbids ? $lotbids[0]->lotTitle : '' }}</h5>
                                    </div>
                                    <hr />
                                    <div class="col-12">
                                        <label for="description" class="form-label">Description </label>
                                        <h5>{{ $lotbids ? $lotbids[0]->lotdescription : '' }} </h5>
                                    </div>
                                    <hr />
                                    <div class="col-12  ">
                                        <label for="date" class="form-label">Date & Time</label>
                                        <h5>{{ $lotbids ? $lotbids[0]->lotStartDate : '' }} </h5>
                                    </div>
                                    <hr />
                                    <div class="col-12  ">
                                        <label for="startAmount" class="form-label">Start Amount</label>
                                        <h5>{{ $lotbids ? $lotbids[0]->lotstartAmount : '' }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection
