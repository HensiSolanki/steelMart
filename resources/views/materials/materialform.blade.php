@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4 p-3">
                        <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
                            @if ($addForm)
                                <h4>Add New Material</h4>
                            @else
                                <h4>Update Material </h4>
                            @endif
                        </div>

                        @if ($addForm)
                            <form method="post" class="" action="/newmaterials" enctype="multipart/form-data">
                                @method('POST')
                            @else
                                <form method="post" action="/materials/{{ $materials->id }}" enctype="multipart/form-data">
                                    @method('PATCH')
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="title" class="form-label">Title</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Title" required value={{ $materials ? $materials->title : '' }}>
                                    <div class="invalid-feedback">
                                        Title is required.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label">Description <span
                                        class="text-muted">(Optional)</span></label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description">{{ $materials ? $materials->description : '' }} </textarea>
                            </div>

                            <div class="col-12 ">
                                <label for="categoryId" class="form-label">category</label>
                                <select class="form-select" id="categoryId" name="categoryId">
                                    @foreach ($categorys as $category)
                                        <option value={{ $category->id }} @if (!$addForm && $category->categoryId == $category->id) selected @endif>
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 ">
                                <label for="height" class="form-label">Height</label>
                                <input type="number" class="form-control" id="height" name="height"
                                    placeholder="height" value={{ $materials ? $materials->height : '' }}>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 ">
                                <label for="width" class="form-label">Width</label>
                                <input type="number" class="form-control" id="width" name="width" placeholder="width"
                                    value={{ $materials ? $materials->width : '' }}>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 ">
                                <label for="length" class="form-label">Length</label>
                                <input type="number" class="form-control" id="length" name="length"
                                    placeholder="length" value={{ $materials ? $materials->length : '' }}>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 ">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="number" class="form-control" id="weight" name="weight"
                                    placeholder="weight" value={{ $materials ? $materials->weight : '' }}>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 ">
                                <label for="inStock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="inStock" name="inStock"
                                    placeholder="inStock" value={{ $materials ? $materials->inStock : '' }}>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 ">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="price"
                                    value={{ $materials ? $materials->price : '' }}>
                            </div>
                            <div class="col-12 ">
                                <label for="price" class="form-label">Images</label>
                                <input id="image" type="file"
                                    class="form-control @error('image') is-invalid @enderror" name="image[]"
                                    autocomplete="image" multiple>
                            </div>
                            <div class="col-12">
                                {{-- @if ($materials->images)
                                    @foreach ($materials->images as $image)
                                        <img src="{{ asset('assets/images/' . $image->path) }}" width="200">
                                    @endforeach
                                @endif --}}
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="/materials" class="btn btn-danger">Cancle</a>
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
