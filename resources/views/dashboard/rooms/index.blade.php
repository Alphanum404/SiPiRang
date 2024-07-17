@extends('dashboard.layout.main')

@section('container')
<!-- begin::Post -->
  <!--begin::Container-->
  <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div id="kt_content_container" class="container-xxl">
      <!--begin::Tables Widget 11-->
      @if(session()->has('roomSuccess'))
      <div class="col-md-16 mx-auto alert alert-success text-center alert-success alert-dismissible fade show" style="margin-top: 50px" role="alert">
        {{session('roomSuccess')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif @if(session()->has('deleteRoom'))
      <div class="col-md-16 mx-auto alert alert-success text-center alert-dismissible fade show" style="margin-top: 50px" role="alert">
        {{session('deleteRoom')}}
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
                <input type="text" id="myInput" class="form-control" style="width: 100px; height: 37px" placeholder="Search" onkeyup="filterTable()" />
              @if (auth()->user()->role_id <= 4) <button class="btn btn-sm btn-light-primary" type="button" data-bs-toggle="modal" data-bs-target="#pinjamRuangan">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
                    <path d="M12 3C4.5885 3 3 4.5885 3 12C3 19.4115 4.5885 21 12 21C19.4115 21 21 19.4115 21 12" stroke="#323232" stroke-width="2" stroke-linecap="round" />
                    <path d="M20.5 3.5L15 9" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M16 3H20.6717C20.853 3 21 3.14703 21 3.32837V8" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </span>
                <!--end::Svg Icon-->Pinjam
                </button>
                @endif @if (auth()->user()->role_id <= 2) <button class="btn btn-sm btn-light-success" data-bs-toggle="modal" data-bs-target="#addRoom">
                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                  <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="red"></rect>
                      <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="red"></rect>
                    </svg>
                  </span>
                  <!--end::Svg Icon-->Add Data
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
              <table class="table align-middle gs-0 gy-4" id="myTable">
                <!--begin::Table head-->
                <thead>
                  <tr class="fw-bolder text-muted bg-light">
                    <th scope="row" class="ps-4 min-w-25px rounded-start">
                      No
                    </th>
                    <th scope="row" class="min-w-125px">Nama Ruangan</th>
                    <th scope="row" class="min-w-125px">Kode Ruangan</th>
                    @if(auth()->user()->role_id <= 2) <th scope="row" class="min-w-100px text-end rounded-end">
                      </th>
                      @endif
                  </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                  @foreach($rooms as $room)
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
                      <a href="/dashboard/rooms/{{$room->code}}" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$room->name}}</a>
                    </td>
                    <td>
                      <a class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$room->code}}</a>
                    </td>
                    @if (auth()->user()->role_id <= 2) <td class="d-flex justify-content-end flex-shrink-0">
                      <a href="/dashboard/rooms/{{ $room->code }}/edit" class="editroom btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" id="editroom" name="editroom" data-id="{{ $room->id }}" data-code="{{ $room->code }}" data-bs-toggle="modal" data-bs-target="#editRoom">
                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                        <span class="svg-icon svg-icon-3">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                      </a>
                      <form action="/dashboard/rooms/{{ $room->code }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" onclick="return confirm('Delete room data?')">
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
                      @endif
                  </tr>
                  @endforeach
                </tbody>
                <!--end::Table body-->
              </table>
              <script>
                function filterTable() {
                  // Get input element
                  var input = document.getElementById("myInput");
                  // Get table element
                  var table = document.getElementById("myTable");
                  // Get table rows
                  var rows = table.querySelectorAll("tr#data");

                  // Loop through all table rows, and hide those who don't match the search query
                  for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];
                    var cells = row.getElementsByTagName("td");
                    var match = false;

                    // Loop through all table cells in current row
                    for (var j = 0; j < cells.length; j++) {
                      var cell = cells[j];
                      // Check if cell contains the search input value
                      if (
                        cell.innerHTML
                        .toLowerCase()
                        .indexOf(input.value.toLowerCase()) > -1
                      ) {
                        match = true;
                        break;
                      }
                    }

                    // Show or hide the row based on the match result
                    if (match) {
                      row.style.display = "";
                    } else {
                      row.style.display = "none";
                    }
                  }
                }
              </script>
              <!--end::Table-->
            </div>
            <!--begin::Pagination-->
            <div class="d-flex justify-content-end">{{ $rooms->links() }}</div>
            <!--end::Pagination-->
            <!--end::Table container-->
          </div>
          <!--begin::Body-->
        </div>
        <!--end::Tables Widget 11-->
      </div>
    </div>
    <!--end::Container-->
  </div>
<!-- end::Post -->
@extends('dashboard.partials.rentModal')
@extends('dashboard.partials.addRoomModal')
@extends('dashboard.partials.editRoomModal')
@endsection