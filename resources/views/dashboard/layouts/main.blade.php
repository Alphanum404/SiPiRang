<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
  <base href="../" />
  <title>SiPiRang App | {{$title}} </title>
  <meta name="description"
    content="Aplikasi SiPiRang (Sistem Informasi Peminjaman Ruangan) adalah sebuah sistem berbasis web yang dirancang untuk memudahkan proses peminjaman ruangan di sebuah institusi pendidikan. Aplikasi ini dibangun menggunakan framework Laravel, yang terkenal dengan arsitektur MVC (Model-View-Controller)." />
  <meta name="keywords"
    content="SiPiRang, Github" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta charset="utf-8" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="article" />
  <meta property="og:title"
    content="SiPiRang App | {{$title}}" />
  <link rel="shortcut icon" href="/img/logo.png" />
  <!--begin::Fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
  <!--end::Fonts-->
  <!--begin::Page Vendor Stylesheets(used by this page)-->
  <link href="metro/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
  <!--end::Page Vendor Stylesheets-->
  <!--begin::Global Stylesheets Bundle(used by all pages)-->
  <link href="metro/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href="metro/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
  <!--end::Global Stylesheets Bundle-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed">
  <!--begin::Main-->
  <!--begin::Root-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
      <!--begin::Aside-->
      @include('dashboard.partials.sidebar')
      <!--end::Aside-->
      <!--begin::Wrapper-->
      <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <!--begin::Header-->
        @include('dashboard.partials.navbar')
        <!--end::Header-->
        <!--begin::Content-->
        @yield('container')
        <!--end::Content-->
        <!--begin::Footer-->
        @include('dashboard.partials.footer')
        <!--end::Footer-->
      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Page-->
  </div>
  <!--end::Root-->
  <!--end::Drawers-->
  <!--begin::Scrolltop-->
  <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
        <path
          d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
          fill="black" />
      </svg>
    </span>
    <!--end::Svg Icon-->
  </div>
  <!--end::Scrolltop-->
  <!--end::Main-->
  <script>
    var hostUrl = "metro/assets/";
  </script>
  <!--begin::Javascript-->
  <!--begin::Global Javascript Bundle(used by all pages)-->
  <script src="metro/assets/plugins/global/plugins.bundle.js"></script>
  <script src="metro/assets/js/scripts.bundle.js"></script>
  <!--end::Global Javascript Bundle-->
  <!--begin::Page Vendors Javascript(used by this page)-->
  <script src="metro/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
  <!--end::Page Vendors Javascript-->
  <!--begin::Page Custom Javascript(used by this page)-->
  <script src="metro/assets/js/custom/widgets.js"></script>
  <script src="metro/assets/js/custom/apps/chat/chat.js"></script>
  <script src="metro/assets/js/custom/modals/create-app.js"></script>
  <script src="metro/assets/js/custom/modals/upgrade-plan.js"></script>
  <!--end::Page Custom Javascript-->
  <!--end::Javascript-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="/js/index.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $('#datatable').DataTable({
      columnDefs: [
        {
          targets: '_all',
          className: 'dt-head-center'
        }
      ]
    });
    $('#datatable_length').css('text-align', 'left');
    $('#datatable_info').css('text-align', 'left');
  </script>
  {{-- Room Edit Modal --}}
  <script src="/js/editroom.js"></script>
  <script src="/js/edituser.js"></script>
  <script src="/js/editadmin.js"></script>
</body>
<!--end::Body-->

</html>