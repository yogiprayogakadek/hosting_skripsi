@extends('frontend.templates.master')

@push('css')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush

@section('content')

<!-- Hero Section-->
<section class="hero bg-top py-5" id="hero"
    style="background: url(https://d19m59y37dris4.cloudfront.net/app/2-0/img/banner-4.86a86274.png) no-repeat; background-size: 100% 80%">
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-5 py-5">
                <h1>Tempat Kesehatan Terdekat dari Pura Goa Giri Putri</h1>
                <p class="my-4 text-muted">
                    Fasilitas kesehatan yang terdekat yang tersedia pada Pura Goa Giri Putri.
                </p>
                <ul class="list-inline mb-0">
                    {{-- <li class="list-inline-item mb-2 mb-lg-0"><a class="btn btn-primary btn-lg px-4" href="#!"> <i
                                class="fa fa-map me-3"></i>Maps</a></li> --}}
                    {{-- <li class="list-inline-item"><a class="btn btn-primary btn-lg px-4" href="#!"> <i
                                class="fab fa-app-store me-3"></i>App Store</a></li> --}}
                </ul>
            </div>
            <div class="col-lg-6 ml-auto">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($lokasi as $index =>  $value)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$index}}" class="{{$index == 0 ? 'active' : ''}}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($lokasi as $key => $item)
                        <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                            <img class="img-fluid" src="{{asset($item->foto)}}">
                            {{-- <img class="d-block w-100" src="{{asset($item->foto)}}"> --}}
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{$item->nama}}</h5>
                                <p>{{$item->alamat}}</p>
                            </div>
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

            </div>
        </div>
    </div>
</section>
<section class="bg-center py-0" id="about"
    style="background: url(https://d19m59y37dris4.cloudfront.net/app/2-0/img/service-bg.d0e67e81.svg) no-repeat; background-size: cover">
    <section class="about py-0">
        <div class="container">
            <p class="h6 text-uppercase text-primary">Fasilitas Kesehatan</p>
            {{-- <h2 class="mb-5">Tentang Pura Goa Giri Putri</h2> --}}
            <div class="row pb-5 gy-4">
                @foreach ($lokasi as $kesehatan)
                <div class="col-lg-4 col-md-6 link" style="cursor: pointer" data-source="{{route('frontend.kesehatan.show', str_replace(' ', '-', $kesehatan->nama))}}">
                    <!-- Services Item-->
                    <div class="card border-0 shadow rounded-lg py-4 text-start">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <img class="img-fluid" src="{{asset($kesehatan->foto)}}" alt="">
                            </div>
                            <h3 class="h4 my-4">{{$kesehatan->nama}}</h3>
                            <p class="text-sm text-muted mb-0">{{$kesehatan->alamat}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- for detail --}}
    {{-- for detail --}}
    @if (count($ulasan) > 0)
    <section class="p-0" id="testimonials"
    style="background: url(https://d19m59y37dris4.cloudfront.net/app/2-0/img/testimonials-bg.cc4a8da7.png) no-repeat; background-size: 40% 100%; background-position: left center">
        {{-- testimonial --}}
        <div class="container text-center">
            <p class="h6 text-uppercase text-primary">Testimonials</p>
            {{-- <h2 class="mb-5">What Our Users Says?</h2> --}}
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    @foreach ($ulasan as $ulasan)
                    <div class="swiper testimonials-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide h-auto">
                                <div class="mx-3 mx-lg-5 my-5 pt-3">
                                    <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                                        <div class="card-body index-forward pt-5 rounded-lg">
                                            <div class="testimonial-img"><img class="rounded-circle"
                                                    src="{{asset($ulasan->user->foto)}}" alt="" width="100" />
                                                </div>
                                            <p class="lead text-muted mb-5">{{$ulasan->ulasan}}</p>
                                            <h5 class="mb-0">{{$ulasan->lokasi->nama}}</h5>
                                            <p class="text-primary mb-0 text-sm">{{$ulasan->user->nama}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

</section>
@endsection

@section('footer')
<footer class="with-pattern-1 position-relative pt-5">
    <div class="container py-5">
        <div class="row gy-4">
    <div class="col-lg-12">
        <h3 class="text-center">Peta Persebaran Lokasi Kesehatan</h3>
        <div id="map" style="height: 500px"></div>
    </div>
    </div>
</div>
</footer>
@endsection

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi4v5LQyLVl2YUfm3Xn3Kb746RO3L8BjA&callback=initMap&libraries=&v=weekly" async></script>
<script>
    var lat = [];
    var long = [];
    var nama = [];
    var id_lokasi = [];

    function pushData() {
        @foreach ($lokasi as $item)
            lat.push({{ $item->latitude }});
            long.push({{ $item->longitude }});
            nama.push('{{ $item->nama }}');
            id_lokasi.push({{ $item->id_lokasi }});
        @endforeach
    }
    pushData();

    function initMap() {
        const myLatLng = { lat: -8.708787114114974, lng: 115.58610396836214 };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 10,
            center: myLatLng,
        });
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        for (i = 0; i < long.length; i++) {  
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat[i], long[i]),
                map: map
            });
            
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent('<a href="{{url('/kesehatan/')}}/'+nama[i]+'">'+nama[i]+'</a>');
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
    window.initMap = initMap;
        $(document).ready(function () {
            $('.link').click(function(){
                var link = $(this).data('source');
                window.location.href = link;
            });
        });
    </script>
@endpush