<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Yayasan Peduli Kasih KNDJH Membantu Bersama Meraih Berkah">
  <meta name="keywords" content="KNDJH,Yayasan Peduli Kasih KNDJH, Kita Bisa, Bantuan Anak Yatim">
  <meta name="author" content="PIXINVENT">
  <title>@yield('title')</title>
  <link rel="apple-touch-icon" href="assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('logo/kndjh-logo.ico')}}">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

  {{-- CSS --}}
  @include('layouts.backend.css')
  {{-- END CSS --}}

</head>
<!-- END: Head-->


<!-- BEGIN: Body-->

<body class="{{auth::user()->role == 'Pencari' ? 'horizontal' : 'vertical'}}-layout {{auth::user()->role == 'Pencari' ? 'horizontal' : 'vertical'}}-menu-modern 2-columns  navbar-sticky footer-static " data-open="hover" data-menu="{{auth::user()->role == 'Pencari' ? 'horizontal' : 'vertical'}}-menu{{auth::user()->role == 'Pemilik' ? '-modern' : ''}}" data-col="2-columns">

  <!-- BEGIN: Header-->
  @include('layouts.backend.header')
  <!-- END: Header-->


  <!-- BEGIN: Sidebar Menu-->
  @include('layouts.backend.sidebar')
  <!-- END: Sidebar Menu-->

  <!-- BEGIN: Content-->
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
      <div class="content-body">
        @if (cekPromo()) {{-- Cek promo jika sudah ada yg berakhir --}}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <div class="alert-body">
            Ada Promo yang sudah berakhir, <a href=" {{route('kamar.promo')}} ">cek disini</a>
          </div>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if(cekPemesanan()) {{-- cek pemesanan jika belum terbayar --}}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <div class="alert-body">
            Segera selesaikan pembayaran kamar kamu yuk, <a href=" {{url('user/tagihan')}} ">lihat disini</a>
          </div>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if(getNotifikasiEndSewa())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <div class="alert-body">
            Ada kamar yang sudah habis sewa, <a href=" {{url('pemilik/booking-list')}} ">lihat disini</a>
          </div>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @yield('content')
      </div>
    </div>
  </div>
  <!-- END: Content-->

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>


  {{-- Javascript --}}
  @include('layouts.backend.scripts')
  @yield('scripts')
  {{-- END Javascript --}}

</body>
<!-- END: Body-->

</html>