@extends('dashboard.layout.main')

@section('container')
<!-- begin::Post -->
<div class="post d-flex flex-column-fluid" id="kt_post">
  <!--begin::Container-->
      <!--begin::Tables Widget 11-->
      @if(session()->has('rentSuccess'))
      <div class="col-md-16 mx-auto alert alert-success text-center alert-success alert-dismissible fade show" style="margin-top: 50px" role="alert">
        {{session('rentSuccess')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      @if(session()->has('rentError'))
      <div class="col-md-16 mx-auto alert alert-warning text-center alert-dismissible fade show" style="margin-top: 50px" role="alert">
        {{session('rentError')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      @if(session()->has('deleteRent'))
      <div class="col-md-16 mx-auto alert alert-success text-center alert-success alert-dismissible fade show" style="margin-top: 50px" role="alert">
        {{session('deleteRent')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <div class="card mb-5 mb-xl-8">
        <div class="card card-xl-stretch mb-xl-8">
          <!--begin::Header-->
          <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
              <span class="card-label fw-bolder fs-3 mb-1">List {{$title}}</span>
            </h3>
            <div class="column card-toolbar">
              @if (auth()->user()->role_id <= 4) <button class="btn btn-sm btn-light-primary" type="button" data-bs-toggle="modal" data-bs-target="#pinjamRuangan">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <svg fill="#000000" height="17px" width="17px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                  <g>
                    <g>
                      <path d="M463.315,48.684c-64.91-64.912-170.529-64.912-235.439,0c-42.666,42.666-58.166,104.143-43.068,160.789L4.878,389.403
      c-3.122,3.122-4.877,7.356-4.877,11.771v94.177c0,9.194,7.454,16.648,16.648,16.648h94.177c4.415,0,8.649-1.755,11.771-4.877
      l23.544-23.544c3.122-3.122,4.876-7.356,4.876-11.771v-30.44h30.44c4.415,0,8.649-1.754,11.771-4.876l23.545-23.545
      c3.122-3.122,4.876-7.356,4.876-11.771v-30.44h30.44c4.415,0,8.649-1.755,11.771-4.877l38.664-38.664
      c56.652,15.1,118.123-0.403,160.789-43.068C528.227,219.216,528.227,113.597,463.315,48.684z M439.774,260.581
      c-35.956,35.956-88.336,48.228-136.702,32.026c-5.988-2.007-12.595-0.452-17.06,4.013l-40.816,40.816h-40.192
      c-9.194,0-16.648,7.454-16.648,16.648v40.192l-13.793,13.793h-40.192c-9.194,0-16.648,7.454-16.648,16.648v40.192l-13.791,13.793
      H33.298V408.07l182.081-182.081c4.465-4.465,6.02-11.072,4.014-17.06c-16.201-48.366-3.929-100.746,32.026-136.702
      c51.93-51.928,136.424-51.929,188.355,0C491.702,124.157,491.702,208.653,439.774,260.581z"></path>
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M416.229,95.773c-25.965-25.966-68.213-25.966-94.177,0c-25.965,25.965-25.965,68.211,0,94.177
      c25.964,25.965,68.211,25.966,94.177,0C442.194,163.986,442.194,121.739,416.229,95.773z M392.685,166.405
      c-12.982,12.981-34.106,12.981-47.089,0c-12.982-12.982-12.982-34.106,0-47.089c12.982-12.981,34.106-12.982,47.089,0
      C405.667,132.299,405.667,153.423,392.685,166.405z"></path>
                    </g>
                  </g>
                </svg>
                <!--end::Svg Icon-->Pinjam
                </button>
                @endif
            </div>
          </div>
          <!--end::Header-->
          <!--begin::Body-->
          <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
              <!--begin::Table-->
              <table class="table align-middle gs-0 gy-4" id="datatable">
                <!--begin::Table head-->
                <thead>
                  <tr class="fw-bolder text-muted bg-light">
                    <th scope="row" class="ps-4 min-w-10px rounded-start">
                      No
                    </th>
                    <th scope="row" class="min-w-50px">Kode Ruangan</th>
                    @if(auth()->user()->role_id <= 2) <th scope="row" class="min-w-50px">Nama Peminjam</th>
                      @endif
                      <th scope="row" class="min-w-50px">Mulai Pinjam</th>
                      <th scope="row" class="min-w-50px">Selesai Pinjam</th>
                      <th scope="row" class="min-w-50px">Tujuan</th>
                      <th scope="row" class="min-w-50px">Waktu Transaksi</th>
                      <th scope="row" class="min-w-50px">Dikembalikan</th>
                      <th scope="row" class="min-w-50px">Status</th>
                      @if (auth()->user()->role_id <= 2) <th scope="row" class="min-w-50px">Action</th>
                        @endif
                  </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                  @if (auth()->user()->role_id <= 2) @foreach($adminRents as $rent) <tr id="data" class="table-row-smaller">
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="symbol symbol-50px me-5"></div>
                        <div class="d-flex justify-content-start flex-column">
                          <a class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$loop->iteration}}</a>
                        </div>
                      </div>
                    </td>
                    <td>
                      <a href="/dashboard/rooms/{{ $rent->room->code }}" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->room->code }}</a>
                    </td>
                    <td>
                      <a class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->user->name }}</a>
                    </td>
                    <td>
                      <a class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->time_start_use }}</a>
                    </td>
                    <td>
                      <a class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->time_end_use }}</a>
                    </td>
                    <td>
                      <a class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->purpose }}</a>
                    </td>
                    <td>
                      <a class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->transaction_start }}</a>
                    </td>
                    @if ($rent->status == "dipinjam")
                    <td><a href="/dashboard/rents/{{ $rent->id }}/endTransaction" class="btn btn-success" type="submit" style="padding: 2px 10px">✔</a></td>
                    @else
                    @if(!is_null($rent->transaction_end))
                    <td>
                      <a class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->transaction_end }}</a>
                    </td>
                    @else
                    <td>
                      <a class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">-</a>
                    </td>
                    @endif
                    @endif
                    <td>
                      <a class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->status }}</a>
                    </td>
                    <td>
                      <form action="/dashboard/rents/{{ $rent->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" onclick="return confirm('Delete rent data?')">
                          <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                          <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                              <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                              <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                            </svg>
                          </span>
                          <!--end::Svg Icon-->
                        </button>
                      </form>
                    </td>
                    </tr>
                    @endforeach
                    @else
                    @foreach($userRents as $rent)
                    <tr class="fw-bolder text-muted bg-light">
                      <th scope="row" class="ps-4 min-w-25px rounded-start">
                        No
                      </th>
                      <td>
                        <a href="/dashboard/rooms/{{ $rent->room->code }}" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->room->code }}</a>
                      </td>
                      @if (auth()->user()->role_id <= 2) <td class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->user->name }}</td>
                        @endif
                        <td class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->time_start_use }}</td>
                        <td class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->time_end_use }}</td>
                        <td class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->purpose }}</td>
                        <td class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->transaction_start }}</td>
                        @if ($rent->status == "dipinjam")
                        <td class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6"><a href="/dashboard/rents/{{ $rent->id }}/endTransaction" class="btn btn-success" type="submit" style="padding: 2px 10px">✔</a></td>
                        @else
                        @if(!is_null($rent->transaction_end))
                        <td class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->transaction_end }}</td>
                        @else
                        <td class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">-</td>
                        @endif
                        @endif
                        <td class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->status }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                <!--end::Table body-->
              </table>
              <!--end::Table-->
            </div>
            <!--end::Table container-->
          </div>
          <!--begin::Body-->
        </div>
        <!--end::Tables Widget 11-->
      </div>
    </div>
    <!--end::Container-->
<!-- end::Post -->
@extends('dashboard.partials.rentModal')
@endsection