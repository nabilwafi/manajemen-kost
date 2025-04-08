@extends('layouts.front.app')
@section('description')
Narali House, cari kos dan apartement makin mudah hanya di Narali House. aplikasi pencari kos di indonesia.
@endsection
@section('title')
Selamat Datang di Narali House
@endsection


@section('content')
@if ($promo->count() > 0)
@include('front.sliderCard')
@endif
<br><br><br>
@include('front.cardContent')

@endsection