@extends('admin.layouts.main', ['activePage' => 'materials', 'titlePage' => 'Materials'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Materials</h4>
                                    <p class="card-category">Add Materials</p>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ url('admin/materials/create') }}"
                                                class="btn btn-sm btn-facebook">Add</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th class="text-right">Material</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($materials as $material)
                                                    <tr>
                                                        <td>{{ $material->id }}</td>
                                                        <td>{{ $material->title }}</td>
                                                        <td>{{ $material->description }}</td>
                                                        <td>{{ $material->price }}</td>
                                                        <td class="td-actions text-right">
                                                            <a href="{{ url('admin/materials/' . $material->id . '/show') }}"
                                                                class="btn btn-info"><i
                                                                    class="material-icons">person</i></a>
                                                            <a href="{{ url('admin/materials/' . $material->id . '/edit') }}"
                                                                class="btn btn-warning"><i
                                                                    class="material-icons">edit</i></a>
                                                            <form
                                                                action="{{ url('admin/materials/' . $material->id . '/destroy') }}"
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
                                    {{-- {{ $materialss->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
