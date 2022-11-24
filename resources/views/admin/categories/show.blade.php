@extends('admin.layouts.main', ['activePage' => 'posts', 'titlePage' => 'Detalles del post'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!--Header-->
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Categorie Details</h4>
                        </div>
                        <!--End header-->
                        <!--Body-->
                        <div class="card-body">
                            <div class="row">
                                <!-- first -->
                                <div class="col-md-6">
                                    <div class="card card-user">
                                        <div class="card-body">
                                            <p class="card-text">
                                            <div class="author">
                                                <div class="block block-one">
                                                    <header class="h4">Titel :
                                                        <span class="h5"> {{ $categories->title }}</span>
                                                    </header>
                                                </div>
                                                <div class="block block-two">
                                                    <header class="h4">Description :
                                                        <span class="h5"> {{ $categories->description }}</span>
                                                    </header>
                                                </div>
                                                {{-- <div class="block block-three">
                                                    <header class="h4">Parent Category :
                                                        <span class="h5"> {{ $categories->parentcategory }}</span>
                                                    </header>
                                                </div>
                                                <div class="block block-four">
                                                    <header class="h4">Status :
                                                        <span class="h5"> Active</span>
                                                    </header>
                                                </div> --}}
                                                {{-- <a href="#">
                          <img class="avatar" src="{{ asset('/img/default-avatar.png') }}" alt="">
                          <h5 class="title mt-3">{{ $auction->starting_price }}</h5>
                        </a>
                        <p class="description">
                          {{ _('Description') }} <br>
                          {{ $auction->starting_price }} <br>
                          {{ $auction->last_bid }}
                        </p> --}}
                                            </div>
                                            </p>
                                            {{-- <div class="card-description">
                      {{ _('Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...') }}
                    </div> --}}
                                        </div>
                                        <div class="card-footer">
                                            <div class="button-container">
                                                <a href="{{ url('admin/categories/') }}"
                                                    class="btn btn-sm btn-primary">Back</a>
                                                <a href="{{ url('admin/categories/' . $categories->id . '/edit') }}"
                                                    class="btn btn-sm btn-primary">Update</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end first-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--End card body-->
                    </div>
                    <!--End card-->
                </div>
            </div>
        </div>
    </div>
@endsection
