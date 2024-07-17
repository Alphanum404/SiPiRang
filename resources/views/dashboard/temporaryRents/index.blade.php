@extends('dashboard.layouts.main')

@section('container')
<!-- begin::Post -->
<div class="post d-flex flex-column-fluid" id="kt_post">
  <!--begin::Container-->
  <div id="kt_content_container" class="container-xxl">
    <!--begin::Tables Widget 11-->
    <div class="card mb-5 mb-xl-8">
      <div class="card card-xl-stretch mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
          <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Permintaan {{$title}}</span>
          </h3>
          <div class="column card-toolbar">
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
                  <th scope="row" class="ps-4 min-w-25px rounded-start">
                    No
                  </th>
                  <th scope="row" class="min-w-50px">Nama Ruangan</th>
                  <th scope="row" class="min-w-50px">Nama Peminjam</th>
                  <th scope="row" class="min-w-50px">Mulai Pinjam</th>
                  <th scope="row" class="min-w-50px">Selesai Pinjam</th>
                  <th scope="row" class="min-w-50px">Tujuan</th>
                  <th scope="row" class="min-w-50px">Mulai Transaksi</th>
                  <th scope="row" class="min-w-50px">Status</th>
                  <th scope="row" class="min-w-50px rounded-end">Action</th>
                </tr>
              </thead>
              <!--end::Table head-->
              <!--begin::Table body-->
              <tbody>
                @foreach($rents as $rent) <tr id="data" class="table-row-smaller">
            <td>
            <div class="d-flex align-items-center">
              <div class="symbol symbol-50px me-5"></div>
              <div class="d-flex justify-content-start flex-column">
              <a class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$loop->iteration}}</a>
              </div>
            </div>
            </td>
            <td>
            <a href="/dashboard/rooms/{{ $rent->room->code }}"
              class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->room->code }}</a>
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
            <a
              class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->transaction_start }}</a>
            </td>
            <td>
            <a class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->status }}</a>
            </td>
            <td>
            <a href="/dashboard/temporaryRents/{{ $rent->id }}/acceptRents" class="btn btn-success mb-2"
              style="padding: 2px 10px">✓</a>
            <a href="/dashboard/temporaryRents/{{ $rent->id }}/declineRents" class="btn btn-danger mb-2"
              style="padding: 2px 10px">✕</a>
            </td>
          </tr>
        @endforeach
              </tbody>
              <!--end::Table body-->
            </table>
            <!--end::Table-->
          </div>
          <!--end::Table container-->
        </div>
      </div>
      <!--begin::Body-->
    </div>
    <!--end::Tables Widget 11-->
  </div>
</div>
<!--end::Container-->
<!-- end::Post -->
@endsection