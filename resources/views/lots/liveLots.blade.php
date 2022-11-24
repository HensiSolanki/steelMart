@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group w-100" role="group" aria-label="First group">
                            <a href="/livelots" type="button" class="btn btn-primary">Live Lots</a>
                            <a href="/lots" type="button" class="btn btn-primary">Lots</a>
                            <a href="/materials" type="button" class="btn btn-primary">Materials</a>
                            <a href="/categories" type="button" class="btn btn-primary">Categories</a>
                            <a href="/customers" type="button" class="btn btn-primary">Customers</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="h3 d-flex justify-content-between">{{ __('Live Lots') }}

                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Start Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($liveLots as $lot)
                                    <tr>
                                        <th scope="row">{{ $lot->id }}</th>
                                        <td>{{ $lot->title }}</td>
                                        <td>{{ $lot->date }}</td>
                                        <td>{{ $lot->startAmount }}</td>
                                        <td>{{ $lot->status }}</td>
                                        <td><a class="btn btn-primary btn-sm" href="/lotbids/{{ $lot->id }}">
                                                Details</a></td>
                                    </tr>
                                    {{-- <td class="d-flex">
                                            <form method="post" action="/lots/{{ $lot->id }}">
                                                @method('DELETE')
                                                <div class="btn-group w-100" role="group" aria-label="First group">
                                                    <a href="/lots/{{ $lot->id }}"
                                                        class="btn btn-primary btn-sm">details</a>
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                </div>
                                            </form>
                                        </td> --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
