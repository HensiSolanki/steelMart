@extends('layouts.app')

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="card">
        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4 p-3">
          <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
            @if($addForm)
            <h4>Add New Lot</h4>
            @else
            <h4>Update lots</h4>
            @endif
          </div>

          <div class="">
            @if($addForm)
            <form method="post" action="/newlots">
              @method('POST')
              @else <form method="post" action="/lots/{{$lots->id}}">
                @method('PATCH')
                @endif
                @csrf
                <div class="row">
                  <div class="col-12">
                    <label for="title" class="form-label">Title</label>
                    <div class="input-group has-validation">
                      <input type="text" class="form-control" id="title" name="title" placeholder="Title" required value={{$lots?$lots->title:''}}>
                      <div class="invalid-feedback">
                        Title is required.
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="description" class="form-label">Description <span class="text-muted">(Optional)</span></label>
                    <textarea class="form-control" id="description" name="description" placeholder="Description"> {{$lots?$lots->description:''}} </textarea>
                  </div>
                  <div class="col-12 ">
                    <label for="materials" class="form-label">Materials</label>
                    <select class="selectpicker form-control " multiple data-live-search="true" name="materials[]">
                      @if(!$addForm)
                      @foreach($materials as $matr)
                      <option value="{{$matr->id}}" @if( $lot_materials && $lot_materials->contains($matr->id)) selected @endif >{{$matr->title}}</option>
                      @endforeach
                      @else

                      @foreach($materials as $matr)
                      <option value="{{$matr->id}}" @if($lots && $lots->material->contains($mtr->id)) selected @endif>{{$matr->title}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  
                  <div class="col-sm-12 col-md-6 col-lg-6 ">
                    <label for="date" class="form-label">Date</label>
                    <input type="datetime-local" class="form-control" id="date" name="date" placeholder="Date" value="{{$lots?$lots->date:''}}">
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-6 ">
                    <label for="startAmount" class="form-label">Start Amount</label>
                    <input type="number" class="form-control" id="startAmount" name="startAmount" placeholder="startAmount" value={{$lots?$lots->startAmount:''}}>
                  </div>
                  <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/lots" class="btn btn-danger">Cancle</a>
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