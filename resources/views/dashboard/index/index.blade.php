@extends('dashboard.layout.main')

@section('container')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Container-->
  <div id="kt_content_container" class="container-xxl">
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
      Dashboard
      <!--begin::Description-->
      <!--end::Description-->
    </h1>
    <!-- begin::Row -->
    <div class="row gx-5 gx-xl-10 mb-xl-10">
      <!--begin::Col-->
      <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">
        <!--begin::Card widget 1-->
        <div
          class="card card-flush h-md-50 mb-5 mb-xl-10"
          style="background-color: #080655"
        >
          <!--begin::Header-->
          <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column">
              <!--begin::Info-->
              <div class="d-flex align-items-center">
                <!--begin::Amount-->
                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2"
                  >{{$totalRooms}}</span
                >
                <!--end::Amount-->
              </div>
              <!--end::Info-->
              <!--begin::Subtitle-->
              <span class="text-white opacity-50 pt-1 fw-semibold fs-6"
                >Total Ruangan</span
              >
              <!--end::Subtitle-->
            </div>
            <!--end::Title-->
          </div>
          <!--end::Header-->
        </div>
        <!--end::Card widget 1-->

        <!--begin::Card widget 2-->
        <div
          class="card card-flush h-md-50 mb-5 mb-xl-10"
          style="background-color: #080655"
        >
          <!--begin::Header-->
          <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column">
              <!--begin::Info-->
              <div class="d-flex align-items-center">
                <!--begin::Amount-->
                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2"
                  >{{$rentRooms}}</span
                >
                <!--end::Amount-->
              </div>
              <!--end::Info-->
              <!--begin::Subtitle-->
              <span class="text-white opacity-50 pt-1 fw-semibold fs-6"
                >Ruangan Dipinjam</span
              >
              <!--end::Subtitle-->
            </div>
            <!--end::Title-->
          </div>
          <!--end::Header-->
        </div>
        <!--end::Card widget 2-->
      </div>
      <!--end::Col-->

      <!--begin::Col-->
      <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">
        <!--begin::Card widget 3-->
        <div
          class="card card-flush h-md-50 mb-5 mb-xl-10"
          style="background-color: #080655"
        >
          <!--begin::Header-->
          <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column">
              <!--begin::Info-->
              <div class="d-flex align-items-center">
                <!--begin::Amount-->
                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2"
                  >{{$availableRooms}}</span
                >
                <!--end::Amount-->
              </div>
              <!--end::Info-->
              <!--begin::Subtitle-->
              <span class="text-white opacity-50 pt-1 fw-semibold fs-6"
                >Ruangan Tersedia</span
              >
              <!--end::Subtitle-->
            </div>
            <!--end::Title-->
          </div>
          <!--end::Header-->
        </div>
        <!--end::Card widget 3-->

        <!--begin::Card widget 4-->
        <div
          class="card card-flush h-md-50 mb-5 mb-xl-10"
          style="background-color: #080655"
        >
          <!--begin::Header-->
          <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column">
              <!--begin::Info-->
              <div class="d-flex align-items-center">
                <!--begin::Amount-->
                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2"
                  >{{$totalUsers}}</span
                >
                <!--end::Amount-->
              </div>
              <!--end::Info-->
              <!--begin::Subtitle-->
              <span class="text-white opacity-50 pt-1 fw-semibold fs-6"
                >Total Pengguna</span
              >
              <!--end::Subtitle-->
            </div>
            <!--end::Title-->
          </div>
          <!--end::Header-->
        </div>
        <!--end::Card widget 4-->
      </div>
      <!--end::Col-->
    </div>
    <!-- end::Row -->
  </div>
  <!--end::Container-->
</div>
<!--end::Content-->
@endsection
