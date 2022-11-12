@extends('admin.layouts.main', ['activePage' => 'auctions', 'titlePage' => 'Auctions'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Auctions</h4>
                                    <p class="card-category">Add Auctions</p>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ url('admin/categories/create') }}"
                                                class="btn btn-sm btn-facebook">Add</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Parent Category</th>
                                                <th>Status</th>
                                                <th class="text-right">Actions</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $categorie)
                                                    <tr>
                                                        <th>{{ $categorie->id }}</th>
                                                        <td>{{ $categorie->title }}</td>
                                                        <td>{{ $categorie->parentcategory }}</td>
                                                        <td>{{ $categorie->status }}</td>
                                                        <td class="td-actions text-right">
                                                            <a href="{{ url('admin/categories/show', $categorie->id) }}"
                                                                class="btn btn-info"><i
                                                                    class="material-icons">person</i></a>
                                                            <a href="{{ url('admin/categories', $categorie->id . '/edit') }}"
                                                                class="btn btn-warning"><i
                                                                    class="material-icons">edit</i></a>
                                                            <form
                                                                action="{{ url('admin/categories/destroy', $categorie->id) }}"
                                                                method="POST" style="display: inline-block;"
                                                                onsubmit="return confirm('Are You Sure?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger" type="submit"
                                                                    rel="tooltip">
                                                                    <i class="material-icons">close</i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer mr-auto">
                                    {{-- {{ $auctions->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
