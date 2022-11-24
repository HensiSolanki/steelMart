@extends('admin.layouts.main', ['activePage' => 'lots', 'titlePage' => 'New Lots'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ url('admin/newlots') }}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Lots</h4>
                                <p class="card-category">Create Lots</p>
                            </div>
                            <!--End header-->
                            <!--Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" id="description" name="description" placeholder="Description"> {{ $lots ? $lots->description : '' }} </textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="seller" class="col-sm-2 col-form-label">Seller</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="seller" name="seller"
                                            placeholder="Seller" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="plant" class="col-sm-2 col-form-label">Plant</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="plant" name="plant"
                                            placeholder="plant" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="materialLocation" class="col-sm-2 col-form-label">Material Location</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="materialLocation" name="materialLocation"
                                            placeholder="materialLocation" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="quantity" name="quantity"
                                            placeholder="Quantity" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="startDate" class="col-sm-2 col-form-label">Start Date</label>
                                    <div class="col-sm-7">
                                        <input type="datetime-local" class="form-control" id="startDate" name="startDate"
                                            placeholder="Start Date" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="endDate" class="col-sm-2 col-form-label">End Date</label>
                                    <div class="col-sm-7">
                                        <input type="datetime-local" class="form-control" id="endDate" name="endDate"
                                            placeholder="End Date" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="material" class="col-sm-2 col-form-label">Materials</label>
                                    <div class="col-sm-7">
                                        <select class="form-select form-control" multiple data-live-search="true"
                                            name="material[]">
                                            @foreach ($materials as $matr)
                                                <option value="{{ $matr->id }}"
                                                    @if ($lots && $lots->material->contains($mtr->id)) selected @endif>{{ $matr->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="startPrice" class="col-sm-2 col-form-label">Start Price</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="startPrice" name="startPrice"
                                            placeholder="Start Price" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" id="date" name="date"
                                            placeholder="Ingrese el post title" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="Auction" class="col-sm-2 col-form-label">Auction</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="Auction" name="Auction"
                                            placeholder="Auction" autocomplete="off" autofocus>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
