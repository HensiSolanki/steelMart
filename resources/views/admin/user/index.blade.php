@extends('admin.layouts.main', ['activePage' => 'users', 'titlePage' => 'User'])
@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">User</h4>
                    <p class="card-category">Add User</p>
                  </div>
                  <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="success">
                      {{ session('success') }}
                    </div>
                    @endif
                    <div class="row">
                      <div class="col-12 text-right">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-facebook">Add</a>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th class="text-right">User</th>
                        </thead>
                        <tbody>
                             @foreach ($users as $user)
                            <tr>
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td class="td-actions text-right">
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are You Sure?')">
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-danger" type="submit" rel="tooltip">
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
