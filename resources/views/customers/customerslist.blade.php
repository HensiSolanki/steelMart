@extends('layouts.app')

@section('content')
    <script src="https://cdn.socket.io/4.5.0/socket.io.min.js"
        integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous">
        < script src = "https://cdn.socket.io/4.5.0/socket.io.min.js" >
    </script>

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
                        <div class="h3 d-flex justify-content-between">{{ __('Material List') }}
                            <a href="/customers/create" class="btn btn-primary btn-sm">Add Customer</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Contact No</th>
                                    <th scope="col">Compny Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <th scope="row">{{ $customer->id }}</th>
                                        <td>{{ $customer->name }}</td>
                                        <td> {{ $customer->contactNo }}</td>
                                        <td>{{ $customer->compnyName }}</td>
                                        <td>{{ $customer->status ? 'Active' : 'Inactive' }}</td>
                                        </td>
                                        <td class="d-flex">
                                            <a href="/customers/{{ $customer->id }}"
                                                class="btn btn-primary btn-sm">Details</a>
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
    <?php $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === 0 ? 'https://' : 'http://'; ?>
    <script type="application/javascript">       

     const socket = io('http://localhost:3030?user_id=1');
    socket.on("connect", () => {
        console.log(socket.id);
    });
</script>
@endsection
