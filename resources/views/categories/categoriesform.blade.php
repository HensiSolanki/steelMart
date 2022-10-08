@extends('layouts.app')

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="card">
        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4 p-3">
          <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
            @if($addForm)
            <h4>Add New Category</h4>
            @else
            <h4>Update Category</h4>
            @endif
          </div>

          <div class="table-responsive">
            @if($addForm)
            <form method="post" action="/newcategories">
              @method('POST')
              @else <form method="post" action="/categories/{{$categories->id}}">
                @method('PATCH')
                @endif
                @csrf
                <div class="col-12">
                  <label for="title" class="form-label">Title</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" required @if($categories) value={{ __($categories->title)}} @endif>
                    <div class="invalid-feedback">
                      Title is required.
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <label for="description" class="form-label">Description <span class="text-muted">(Optional)</span></label>
                  <textarea class="form-control" id="description" name="description" placeholder="Description"> {{$categories?$categories->description:''}} </textarea>
                </div>
                <div class="col-12 ">
                  <label for="parentcategory" class="form-label">P~arent category</label>
                  <select class="form-select" id="parentcategory" name="parentcategory" required>
                    <option value="0">{{__('New Parent Categorie')}}</option>
                    @foreach($parentcategories as $category)
                    <option value={{$category->id}} @if(!$addForm && $categories->parentcategory ==$category->id) selected @endif >{{$category->title}}</option>
                    @endforeach

                  </select>
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <a href="/categories" class="btn btn-danger">Cancle</a>
                </div>

              </form>
          </div>
        </main>
      </div>
    </div>
  </div>
</div>
@endsection