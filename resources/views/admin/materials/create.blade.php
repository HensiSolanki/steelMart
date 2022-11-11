@extends('admin.layouts.main', ['activePage' => 'materials', 'titlePage' => 'New Material'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ url('admin.auctions.store') }}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <!--Header-->
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Materials</h4>
                                <p class="card-category">Create Materials</p>
                            </div>
                            <!--End header-->
                            <!--Body-->
                            <div class="card-body">


                                <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-7">
                                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" autofocus></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="categoryId" class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-7">
                                        <select class="form-select" id="categoryId" name="categoryId">
                                            @foreach ($categorys as $category)
                                                <option value={{ $category->id }}
                                                    @if (!$addForm && $materials->categoryId == $category->id) selected @endif>{{ $category->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="height" class="col-sm-2 col-form-label">Height</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="height" name="height"
                                            placeholder="Height" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="width" class="col-sm-2 col-form-label">Width</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="width" name="width"
                                            placeholder="Width" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="length" class="col-sm-2 col-form-label">Length</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="length" name="length"
                                            placeholder="Length" autocomplete="off" autofocus>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="weight" class="col-sm-2 col-form-label">Weight</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="weight" name="weight"
                                            placeholder="Weight" autocomplete="off" autofocus>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="inStock" class="col-sm-2 col-form-label">Stock</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="inStock" name="inStock"
                                            placeholder="Stock" autocomplete="off" autofocus>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="price" name="price"
                                            placeholder="Price" autocomplete="off" autofocus>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <label for="title" class="col-sm-2 col-form-label">Auction Date</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="auction_date"
                                            placeholder="Ingrese el post title" autocomplete="off" autofocus>
                                    </div>
                                </div> --}}
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
