@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4 p-3">
                        <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
                            @if ($addForm)
                                <h4>Add New Lot</h4>
                            @else
                                <h4>Update lots</h4>
                            @endif
                        </div>

                        <div class="">
                            @if ($addForm)
                                <form method="post" action="/newAuction">
                                    @method('POST')
                                @else
                                    <form method="post" action="/auctions/{{ $auction->id }}">
                                        @method('PATCH')
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label for="title" class="form-label">Title</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title" required value={{ $auction ? $auction->title : '' }}>
                                        <div class="invalid-feedback">
                                            Title is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label">Description <span
                                            class="text-muted">(Optional)</span></label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Description"> {{ $auction ? $auction->description : '' }} </textarea>
                                </div>
                                <div class="col-12 ">
                                    <label for="lots" class="form-label">Lots</label>
                                    <select class="selectpicker form-control " multiple data-live-search="true"
                                        name="lots[]">
                                        @foreach ($lots as $lot)
                                            <option value="{{ $lot->id }}">{{ $lot->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 ">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="datetime-local" class="form-control" id="date" name="date"
                                        placeholder="Date" value={{ $auction ? $auction->date : '' }}>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 ">
                                    <label for="startAmount" class="form-label">Start Amount</label>
                                    <input type="number" class="form-control" id="startAmount" name="startAmount"
                                        placeholder="startAmount" value={{ $auction ? $auction->startAmount : '' }}>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="/auctions" class="btn btn-danger">Cancle</a>
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
