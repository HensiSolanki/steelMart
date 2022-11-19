@extends('admin.layouts.main', ['activePage' => 'posts', 'titlePage' => 'Detalles del post'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <!--Header-->
          <div class="card-header card-header-primary">
            <h4 class="card-title">Materials</h4>
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
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="#">
                          {{-- <img class="avatar" src="{{ asset('/img/default-avatar.png') }}" alt=""> --}}
                          <h5 class="title mt-3">{{ $materials->title }}</h5>
                        </a>
                        <p class="description">
                          {{ _('Description') }} <br>
                          {{ $materials->description }} <br>
                          {{ _('Height') }} <br>
                          {{ $materials->height }} <br>
                          {{ _('Width') }} <br>
                          {{ $materials->width }}
                        </p>
                      </div>
                    </p>
                    {{-- <div class="card-description">
                      {{ _('Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...') }}
                    </div> --}}
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                        <a href="{{ url('admin/materials/') }}"
                            class="btn btn-sm btn-primary">Back</a>
                        <a href="{{ url('admin/materials/' . $materials->id . '/edit') }}"
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
