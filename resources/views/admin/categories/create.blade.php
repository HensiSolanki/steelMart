@extends('admin.layouts.main', ['activePage' => 'posts', 'titlePage' => 'New Category'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('admin.auctions.store') }}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Auction</h4>
                                <p class="card-category">Create Auction</p>
                            </div>
                            <!--End header-->
                            <!--Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Starting Price</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="starting_price"
                                            placeholder="Auction Price" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Last Bid</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="last_bid"
                                            placeholder="Last Bid" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Auction Date</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="auction_date"
                                            placeholder="Ingrese el post title" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Auction</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Ingrese el post title" autocomplete="off" autofocus>
                                    </div>
                                </div> --}}
                            </div>

                            <!--End body-->

                            <!--Footer-->
                            <div class="card-footer ml-auto mr-auto">
                                <a href="{{ route('admin.auctions.index') }}" class="btn btn-primary">Back</a>
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
