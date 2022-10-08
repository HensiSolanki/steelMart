@extends('layouts.app')

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="card">
        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4 p-3">
          <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="h3 d-flex justify-content-between">{{ __('Lot Details') }}
              <a href="/lots/{{$lots->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
            </div>
          </div>

          <div class="">
            <div class="row">
              <div class="col-12">
                <label for="title" class="form-label">Title</label>
                <h5>{{$lots?$lots->title:''}}</h5>
              </div>
              <hr />
              <div class="col-12">
                <label for="description" class="form-label">Description </label>
                <h5>{{$lots?$lots->description:''}} </h5>
              </div>
              <hr />
              <div class="col-sm-12 col-md-6 col-lg-6 ">
                <label for="date" class="form-label">Date</label>
                <h5>{{$lots?$lots->date:''}} </h5>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-6 ">
                <label for="startAmount" class="form-label">Start Amount</label>
                <h5>{{$lots?$lots->startAmount:''}}</h5>
              </div>

              <hr />
              <h3>Materials</h3>
              <div class="col-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Category</th>
                      <th scope="col">Stock</th>
                      <th scope="col">Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lots->materials as $material)
                    <tr>
                      <th scope="row">{{ $material->id }}</th>
                      <td>{{ $material->title }}</td>
                      <td>@if($material->categories) {{$material->categories->title}} @else {{__('-')}} @endif </td>
                      <td>{{ $material->inStock }}</td>
                      <td>{{ $material->price }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</div>
@endsection