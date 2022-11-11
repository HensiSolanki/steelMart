@extends('admin.layouts.main', ['activePage' => 'lots', 'titlePage' => 'Edit Lot'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ url('admin/lots', $lots->id) }}" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Edit Lot</h4>
                                <p class="card-category">Edit Your Lot</p>
                            </div>
                            <!--End header-->
                            <!--Body-->

                            <div class="card-body">
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title" required value={{ $lots ? $lots->title : '' }}>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" id="description" name="description" placeholder="Description"> {{ $lots ? $lots->description : '' }} </textarea>
                                    </div>
                                </div>
                             {{-- <div class="row">
                                    <label for="materials" class="col-sm-2 col-form-label">Materials</label>
                                    <select class="selectpicker form-control " multiple data-live-search="true" name="materials[]">
                                      @foreach($materials as $matr)
                                      <option value="{{$matr->id}}" @if($lots && $lots->material->contains($mtr->id)) selected @endif>{{$matr->title}}</option>
                                      @endforeach
                                    </select>
                                  </div> --}}

                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" id="date" name="date"
                                            placeholder="Ingrese el post title" autocomplete="off" value={{ $lots ? $lots->date : '' }} autofocus >
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Start Amount</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="startAmount" name="startAmount"
                                            placeholder="Enter Amount" autocomplete="off" autofocus value={{ $lots ? $lots->startAmount : '' }}>
                                    </div>
                                </div>
                            </div>

                            <!--End body-->

                            <!--Footer-->
                            <div class="card-footer ml-auto mr-auto">
                                <a href="{{ url('admin/lots') }}" class="btn btn-primary">Back</a>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                            <!--End footer-->
                        </div>
                            {{-- <div class="card-body">
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Starting Price</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="starting_price"
                                            placeholder="Ingrese el title" value="{{ old('starting_price', $lots->starting_price) }}"
                                            autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Last Bid</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="last_bid"
                                            placeholder="Ingrese el title" value="{{ old('last_bid', $lots->last_bid) }}"
                                            autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Auction Date</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="auction_date"
                                            placeholder="Ingrese el title" value="{{ old('auction_date', $lots->auction_date) }}"
                                            autocomplete="off" autofocus>
                                    </div>
                                </div>
                            </div>
                            <!--End body-->
                            <!--Footer-->
                            <div class="card-footer ml-auto mr-auto">
                                <a href="{{ route('admin.auctions.index') }}" class="btn btn-primary">Back</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div> --}}

                        </div>
                        <!--End footer-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
