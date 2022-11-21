@extends('admin.layouts.main', ['activePage' => 'lots', 'titlePage' => 'Lots'])
@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Lots</h4>
                    <p class="card-category">Add Lots</p>
                  </div>
                  <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="success">
                      {{ session('success') }}
                    </div>
                    @endif
                    <div class="row">
                      <div class="col-12 text-right">
                        <a href="{{ url('admin/lots/create') }}" class="btn btn-sm btn-facebook">Add</a>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table data-table">
                        <thead class="text-primary text-center">
                          <th>ID</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </thead>
                        <tbody class="text-center">

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer mr-auto">
                    {{-- {{ $lots->links() }} --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{!! route('admin.lots') !!}",

            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'lot_status',
                    name:'lot_status'
                },
                {
                data: null,
                render: function(data, type, row) {
                    return(`<div><a href="{{ url('admin/lots/${data.id}') }}"class="btn btn-info"><i class="material-icons">person</i></a>
                    <a href="{{ url('admin/lots/edit/${data.id}') }}"class="btn btn-success"><i class="material-icons">edit</i></a>
                    <a href="{{ url('admin/lots/${data.id}') }}"class="btn btn-danger"><i class="material-icons">close</i></a></div>
                    `);
                },
            }
            ]
        });
    });
</script>
