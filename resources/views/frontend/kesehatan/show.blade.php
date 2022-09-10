@extends('frontend.templates.master')

@push('css')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

<!-- Hero Section-->
<section class="hero bg-top py-5" id="hero"
    style="background: url(https://d19m59y37dris4.cloudfront.net/app/2-0/img/banner-4.86a86274.png) no-repeat; background-size: 100% 80%">
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-5 py-5">
                <h1>Kesehatan {{$lokasi->nama}}</h1>
                <p class="my-4 text-muted">
                    {{$lokasi->alamat}}
                </p>
                <ul class="list-inline mb-0">
                    {{-- <li class="list-inline-item mb-2 mb-lg-0"><a class="btn btn-primary btn-lg px-4" href="#!"> <i
                                class="fa fa-map me-3"></i>Maps</a></li> --}}
                    {{-- <li class="list-inline-item"><a class="btn btn-primary btn-lg px-4" href="#!"> <i
                                class="fab fa-app-store me-3"></i>App Store</a></li> --}}
                </ul>
            </div>
            <div class="col-lg-6 ml-auto">
                <img class="d-block w-100" src="{{asset($lokasi->foto)}}">
            </div>
        </div>
    </div>
</section>

<section class="p-0" id="testimonials"
    style="background: url(https://d19m59y37dris4.cloudfront.net/app/2-0/img/testimonials-bg.cc4a8da7.png) no-repeat; background-size: 40% 100%; background-position: left center">
    <div class="container text-center">
        <p class="h6 text-uppercase text-primary text-center">Tentang {{$lokasi->nama}}</p>
        {{-- <h2 class="mb-5">What Our Users Says?</h2> --}}
        <div class="row">
            <div class="col-lg-8 mx-auto" style="text-align: justify">
                <p>{!! $lokasi->deskripsi !!}</p>
            </div>
        </div>
    </div>

    {{-- gall --}}
    <div class="container text-center py-5">
        <p class="h6 text-uppercase text-primary">Galeri {{$lokasi->nama}}</p>
        {{-- <h2 class="mb-5">What Our Users Says?</h2> --}}
        <div class="row">
            {{-- Gall --}}
            <div class="col-lg-6 mx-auto">
                @if ($lokasi->galeri_foto != null)
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach (json_decode($lokasi->galeri_foto, true) as $index =>  $value)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$index}}" class="{{$index == 0 ? 'active' : ''}}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach (json_decode($lokasi->galeri_foto, true) as $key => $item)
                            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                <img class="d-block w-100" src="{{asset($item['foto'])}}">
                                {{-- <div class="carousel-caption d-none d-md-block">
                                    <h5>{{$item->nama}}</h5>
                                    <p>{{$item->alamat}}</p>
                                </div> --}}
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                @else
                    <div class="alert alert-warning">
                        <p>Tidak ada foto</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- testimonial --}}
    <div class="container text-center">
        <p class="h6 text-uppercase text-primary">Testimonials</p>
        {{-- <h2 class="mb-5">What Our Users Says?</h2> --}}
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="swiper testimonials-slider">
                    <div class="swiper-wrapper">
                        @forelse ($ulasan as $ulasan)
                        <div class="swiper-slide h-auto">
                            <div class="mx-3 mx-lg-5 my-5 pt-3">
                                <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                                    <div class="card-body index-forward pt-5 rounded-lg">
                                        <div class="testimonial-img"><img class="rounded-circle"
                                                src="{{asset($ulasan->user->foto)}}" alt="" width="100" />
                                            </div>
                                        <p class="lead text-muted mb-5">{{$ulasan->ulasan}}</p>
                                        <h5 class="mb-0">{{$ulasan->user->nama}}</h5>
                                        <p class="text-primary mb-0 text-sm">Pengunjung</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-warning">
                            <p>Tidak ada testimonial</p>
                        </div>
                        @endforelse
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- maps --}}
    <div class="container text-center py-5">
        <p class="h6 text-uppercase text-primary">Maps {{$lokasi->nama}}</p>
        {{-- <h2 class="mb-5">What Our Users Says?</h2> --}}
        <div class="row">
            {{-- Gall --}}
            <div class="col-lg-6 mx-auto">
                <div class="map-inner">
                    <div id="map-canvas" style="height: 400px; width: 100%;"></div>
                    <div class="getDirection"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- ulasan kamu --}}
    @can('guest')
    @if ($userHasFeedback == 0)
    <div class="container text-center py-5">
        <p class="h6 text-uppercase text-primary">Ulasan {{$lokasi->nama}}</p>
        {{-- <h2 class="mb-5">What Our Users Says?</h2> --}}
        <div class="row">
            {{-- Gall --}}
            <div class="col-lg-6 mx-auto">
                <form id="formFeedback">
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="feedback" name="feedback" placeholder="Masukkan ulasan menarik anda disini..."></textarea>
                        <div class="invalid-feedback error-feedback"></div>
                    </div>
                    <div class="form-group mt-2">

                        <a href="javascript:void(0)"
                                    class="btn btn-primary btn-round btn-wd float-right btn-feedback">Kirim
                                    Ulasan</a>
                    </div>
                    {{-- <div class="form-group">
                        @for ($i = 1; $i < 6; $i++)
                            <i class="fa fa-star fa-rating fa-2x" style="color: wheat;" id="rating-{{$i}}" data-rating="{{$i}}"></i>
                        @endfor
                        <input type="hidden" name="rating" id="rating" value="0">
                        <div class="invalid-feedback error-rating"></div>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
    @endif
    @endcan
</section>

@endsection

@push('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi4v5LQyLVl2YUfm3Xn3Kb746RO3L8BjA&callback=initMap&libraries=&v=weekly"
 async></script>
    <script>
        $(document).ready(function () {
            $('.link').click(function(){
                var link = $(this).data('source');
                window.location.href = link;
            });

            // maps
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(initMap);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }

            function initMap(position) {
                let desLat = {{$lokasi->latitude}};
                let desLong = {{$lokasi->longitude}};
                let button = '<a href="https://www.google.com/maps/dir/?api=1&origin=-8.708787114114974,115.58610396836214&destination='+desLat+','+desLong+'" target="_blank"><button type=button class="mt-3 btn btn-primary">Lihat Dari Google Maps</button></a>';
                // let button = '<a href="https://www.google.com/maps/dir/?api=1&origin='+position.coords.latitude+','+position.coords.longitude+'&destination='+desLat+','+desLong+'" target="_blank"><button type=button class="mt-3 btn btn-primary">Lihat Dari Google Maps</button></a>';
                $('.getDirection').html(button)

                var pointA = new google.maps.LatLng(-8.708787114114974, 115.58610396836214),
                // var pointA = new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
                // pointB = new google.maps.LatLng(-8.42027127774227, 115.35910193862952),
                pointB = new google.maps.LatLng(desLat, desLong),
                myOptions = {
                    zoom: 7,
                    center: pointA
                },
                map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),
                // Instantiate a directions service.
                directionsService = new google.maps.DirectionsService,
                directionsDisplay = new google.maps.DirectionsRenderer({
                    map: map
                }),
                markerA = new google.maps.Marker({
                    position: pointA,
                    title: "Asal",
                    label: "A",
                    map: map
                }),
                markerB = new google.maps.Marker({
                    position: pointB,
                    title: "Tujuan",
                    label: "B",
                    map: map
                });

                // get route from A to B
                calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);
            }

            function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
                directionsService.route({
                    origin: pointA,
                    destination: pointB,
                    // travelMode: google.maps.TravelMode.DRIVING
                    travelMode: google.maps.TravelMode.WALKING
                }, function(response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        directionsDisplay.setDirections(response);
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
            }

            let url = window.location.href.split('kebudayaan/');
            $('body').on('click', '.btn-feedback', function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let form = $('#formFeedback')[0]
                let data = new FormData(form)
                data.append('nama', url[1])
                $.ajax({
                    type: "POST",
                    url: "/ulasan",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function () {
                        $('.btn-feedback').attr('disable', 'disabled')
                        $('.btn-feedback').html('<i class="fa fa-spin fa-spinner"></i>')
                    },
                    complete: function () {
                        $('.btn-feedback').removeAttr('disable')
                        $('.btn-feedback').html('Kirim Ulasan')
                    },
                    success: function (response) {
                        // alert('sukses')
                        toastr[response.status](response.message, response.title);
                        // console.log(response.message)
                        setTimeout(function(){
                            location.reload();
                        }, 1500);
                    },
                    error: function (error) {
                        if (error.status == 422) {
                            if (error.responseJSON.errors) {
                                if (error.responseJSON.errors.feedback) {
                                    $('#feedback').addClass('is-invalid')
                                    $('#feedback').trigger('focus')
                                    $('.error-feedback').html(error.responseJSON.errors.feedback)
                                } else {
                                    $('#feedback').removeClass('is-invalid')
                                    $('.error-feedback').html('')
                                }
                            }
                        }
                    }
                });
            });
        });
    </script>
@endpush