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
                        <a href="{{ route('admin.auctions.create') }}" class="btn btn-sm btn-facebook">Add</a>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <th>ID</th>
                          <th>Last Bid</th>
                          <th>Status</th>
                          <th class="text-right">Actions</th>
                        </thead>
                        <tbody>
                             @foreach ($auctions as $auction)
                            <tr>
                              <td>{{ $auction->id }}</td>
                              <td>{{ $auction->last_bid }}</td>
                              {{-- <td><a href="{{ route('admin.auctions.show', $auction->id) }}" class="btn btn-info"><i class="material-icons">person</i></a></td> --}}
                              <td><input type="checkbox" id="vehicle1" name="vehicle1" value="{{ $auction->status }}" checked></td>

                              <td class="td-actions text-right">
                                <a href="{{ route('admin.auctions.show', $auction->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                <a href="{{ route('admin.auctions.edit', $auction->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                <form action="{{ route('admin.auctions.destroy', $auction->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are You Sure?')">
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
