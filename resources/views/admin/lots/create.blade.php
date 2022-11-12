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
                                            placeholder="Title" required value={{ $lots ? $lots->title : '' }}>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" id="description" name="description" placeholder="Description"> {{ $lots ? $lots->description : '' }} </textarea>
                                    </div>
                                </div>
                             <div class="row">
                                    <label for="materials" class="col-sm-2 col-form-label">Materials</label>
                                    <div class="col-sm-7">
                                    <select  class="form-select form-control" multiple data-live-search="true" name="materials[]">
                                      @foreach($materials as $matr)
                                      <option value="{{$matr->id}}" @if($lots && $lots->material->contains($mtr->id)) selected @endif>{{$matr->title}}</option>
                                      @endforeach
                                    </select>
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
                                    <label for="title" class="col-sm-2 col-form-label">Start Amount</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="startAmount" name="startAmount"
                                            placeholder="Ingrese el post title" autocomplete="off" autofocus>
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
