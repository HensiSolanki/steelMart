@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <div class="btn-group w-100" role="group" aria-label="First group">
                        <a href="/lots" type="button" class="btn btn-primary">Lots</a>
                        <a href="/materials" type="button" class="btn btn-primary">Materials</a>
                        <a href="/categories" type="button" class="btn btn-primary">Categories</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="h3 d-flex justify-content-between">{{ __('Categorys List') }}
                        <a href="/categories/create" class="btn btn-primary btn-sm">Add Categorie</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Parent Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->title }}</td>
                                <td>@if($category->Parentcategory)
                                    {{$category->Parentcategory->title }}
                                    @else
                                    {{__('-')}}
                                    @endif
                                </td>
                                </td>
                                <td class="d-flex">
                                    <form method="post" action="/categories/{{ $category->id }}">
                                        @method('DELETE')
                                        <div class="btn-group w-100" role="group" aria-label="First group">
                                            <a href="/categories/{{ $category->id }}/edit" class="btn btn-primary btn-sm">Update</a>
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection