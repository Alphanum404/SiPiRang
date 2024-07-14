@extends('dashboard.layout.second')

@section('container')
<!-- begin::Post -->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Tables Widget 11-->
            <div class="card mb-5 mb-xl-8">
                <div class="card card-xl-stretch mb-xl-8">
                    <div class="card-header border-1 pt-3">

                        <!-- begin:img -->
                        <div class='img-container'>
                            <img class='explore-item__thumbnail rounded' src='{{ asset('storage/' . str_replace('public/', '', $room->img)) }}' alt='{{ $room->name . '.jpg' }}' tabindex='0' style="width: 18rem;" />
                        </div>
                        <!-- end:img -->
                        <!-- begin::details -->
                        <ul class='detail-explore__info'>
                            <table class="table table-borderless table-sm" >
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <td>: {{$room->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Kode Ruangan</th>
                                        <td>: {{$room->code}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Gedung</th>
                                        <td>: {{$room->building->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Lantai</th>
                                        <td>: {{$room->floor}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Kapasitas</th>
                                        <td>: {{$room->capacity}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Tipe Ruangan</th>
                                        <td>: {{$room->type}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Deskripsi</th>
                                        <td style="word-wrap: break-word; max-width: 550px;">: {{$room->description}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </ul>
                        <!-- end::details -->
                    </div>

                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Peminjaman {{$room->name}}</span>
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
			c51.93-51.928,136.424-51.929,188.355,0C491.702,124.157,491.702,208.653,439.774,260.581z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M416.229,95.773c-25.965-25.966-68.213-25.966-94.177,0c-25.965,25.965-25.965,68.211,0,94.177
			c25.964,25.965,68.211,25.966,94.177,0C442.194,163.986,442.194,121.739,416.229,95.773z M392.685,166.405
			c-12.982,12.981-34.106,12.981-47.089,0c-12.982-12.982-12.982-34.106,0-47.089c12.982-12.981,34.106-12.982,47.089,0
			C405.667,132.299,405.667,153.423,392.685,166.405z" />
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
                                        <th scope="row" class="ps-4 min-w-25px rounded-start">
                                            No
                                        </th>
                                        <th scope="row" class="min-w-125px">Nama Peminjam</th>
                                        <th scope="row" class="min-w-125px">Mulai Pinjam</th>
                                        <th scope="row" class="min-w-125px">Selesai Pinjam</th>
                                        <th scope="row" class="min-w-125px">Tujuan</th>
                                        <th scope="row" class="min-w-125px">Waktu Transaksi</th>
                                        <th scope="row" class="min-w-125px">Status Pinjam</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach($rents as $rent)
                                    <tr id="data">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50px me-5"></div>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$loop->iteration}}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$rent->user->name}}</a>
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
                                        <td>
                                            <a class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $rent->status }}</a>
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
                    <!--begin::Body-->
                </div>
                <!--end::Tables Widget 11-->
            </div>
        </div>
        <!--end::Container-->
    </div>
</div>
<!-- end::Post -->
@extends('dashboard.partials.rentModal')
@endsection