@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4 p-3">
                        <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h4>User Details </h4>
                        </div>

                        @if ($addForm)
                            <form method="post" class="" action="/newcustomers" enctype="multipart/form-data">
                                @method('POST')
                            @else
                                <form method="post" action="/customers/{{ $customers->id }}" enctype="multipart/form-data">
                                    @method('PATCH')
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="form-label">Name</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="name" required value={{ $customers ? $customers->name : '' }}>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="compnyName" class="form-label">Compny Name</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="compnyName" name="compnyName"
                                        placeholder="Compny Name" required
                                        value={{ $customers ? $customers->compnyName : '' }}>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <label for="email" class="form-label">Email </label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    required value={{ $customers ? $customers->email : '' }}>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <label for="contactNo" class="form-label">Contact No</label>
                                <input type="number" class="form-control" id="contactNo" name="contactNo"
                                    placeholder="Contact No" value="{{ $customers ? $customers->contactNo : '' }}">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 ">
                                <label for="adharNo" class="form-label">Adhar No</label>
                                <input type="number" class="form-control" id="adharNo" name="adharNo"
                                    placeholder="Adhar No" value={{ $customers ? $customers->adharNo : '' }}>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 ">
                                <label for="GSTNo" class="form-label">GST No</label>
                                <input type="number" class="form-control" id="GSTNo" name="GSTNo"
                                    placeholder="GST No" value={{ $customers ? $customers->GSTNo : '' }}>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 ">
                                <label for="PanNo" class="form-label">Pan No</label>
                                <input type="number" class="form-control" id="PanNo" name="PanNo"
                                    placeholder="Pan No" value={{ $customers ? $customers->PanNo : '' }}>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" placeholder="Address"> {{ $customers ? $customers->address : '' }} </textarea>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-4 ">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City"
                                    value={{ $customers ? $customers->city : '' }}>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 ">
                                <label for="state" class="form-label">State</label>
                                <input type="number" class="form-control" id="state" name="state" placeholder="State"
                                    value={{ $customers ? $customers->state : '' }}>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 ">
                                <label for="pincode" class="form-label">Pin Code</label>
                                <input type="number" class="form-control" id="pincode" name="pincode"
                                    placeholder="Pin Code" value={{ $customers ? $customers->pincode : '' }}>
                            </div>
                            <div class="col-12">
                                {{-- @if ($materials->images)
                                    @foreach ($materials->images as $image)
                                        <img src="{{ asset('assets/images/' . $image->path) }}" width="200">
                                    @endforeach
                                @endif --}}
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary" disabled>Save</button>
                                <a href="/customers" class="btn btn-danger" disabled>Cancle</a>
                            </div>
                        </div>
                        </form>
                </div>
                </main>
            </div>
        </div>
    </div>
    </div>
@endsection
