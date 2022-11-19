@extends('admin.layouts.main', ['activePage' => 'users', 'titlePage' => 'New User'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('admin.users.store') }}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">User</h4>
                                <p class="card-category">Create User</p>
                            </div>
                            <!--End header-->
                            <!--Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="User's Name" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="User's Email" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="User's Password" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Contact No</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="contactNo"
                                            placeholder="Enter Number" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Adhar No.</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="adharNo"
                                            placeholder="Enter Adhar Card Number" autocomplete="off" autofocus>
                                    </div>
                                </div>  <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">GST No.</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="GSTNo"
                                            placeholder="Enter GST No" autocomplete="off" autofocus>
                                    </div>
                                </div>  <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">PAN No.</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="PanNo"
                                            placeholder="Enter Pan No" autocomplete="off" autofocus>
                                    </div>
                                </div>  <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="address"
                                            placeholder="Enter Address" autocomplete="off" autofocus>
                                    </div>
                                </div>  <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="city"
                                            placeholder="Enter City" autocomplete="off" autofocus>
                                    </div>
                                </div>  <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">State</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="state"
                                            placeholder="Enter State" autocomplete="off" autofocus>
                                    </div>
                                </div><div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Pincode</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="pincode"
                                            placeholder="Enter Pincode" autocomplete="off" autofocus>
                                    </div>
                                </div><div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Compny Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="compnyName"
                                            placeholder="Enter Compny Name" autocomplete="off" autofocus>
                                    </div>
                                </div>
                            </div>

                            <!--End body-->

                            <!--Footer-->
                            <div class="card-footer ml-auto mr-auto">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Back</a>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                            <!--End footer-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
