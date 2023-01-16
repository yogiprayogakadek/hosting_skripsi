@extends('frontend.templates.master')

@section('content')
@if ($lokasi != null)
<section class="hero bg-top py-5" id="hero"
  style="background: url(https://d19m59y37dris4.cloudfront.net/app/2-0/img/banner-4.86a86274.png) no-repeat; background-size: 100% 80%">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-lg-5 py-5">
        <h1>Pura Goa Giri Putri </h1>
        <p class="my-4 text-muted">Desa Suana, Kecamatan Nusa Penida, Kabupaten Klungkung, Bali.</p>
        <ul class="list-inline mb-0">
          <li class="list-inline-item mb-2 mb-lg-0"><a class="btn btn-primary btn-lg px-4"
              href="https://www.google.com/maps?q=pura+goa+giri+putri&um=1&ie=UTF-8&sa=X&ved=2ahUKEwiwgv-A9cr5AhVXE7cAHaPPBeoQ_AUoAnoECAIQBA">
              <i class="fa fa-map me-3"></i>Maps</a></li>
          <li class="list-inline-item"><a class="btn btn-primary btn-lg px-4" href="{{json_decode($lokasi->deskripsi, true)['link_referensi']}}"> <i
                class="fab fa-app-store me-3"></i>Referensi</a></li>
        </ul>
      </div>
      <div class="col-lg-6 ml-auto">
        <div class="screen"><img class="img-thumbnail rounded"
            src="https://www.thenusapenida.com/wp-content/uploads/2017/06/Pura-Goa-Giri-Putri@thenusapenida.com1_-1024x684.jpg"
            alt=""></div>
        {{-- <div class="device-wrapper mx-auto"> --}}
          {{-- <div class="device shadow" data-device="iPhoneX" data-orientation="portrait" data-color="black">
            <div class="screen"><img class="img-fluid"
                src="https://www.thenusapenida.com/wp-content/uploads/2017/06/Pura-Goa-Giri-Putri@thenusapenida.com1_-1024x684.jpg"
                alt=""></div>
          </div> --}}
          {{-- </div> --}}
      </div>
    </div>
  </div>
</section>
<section class="bg-center py-0" id="about"
  style="background: url(https://d19m59y37dris4.cloudfront.net/app/2-0/img/service-bg.d0e67e81.svg) no-repeat; background-size: cover">
  <section class="about py-0">
    <div class="container">
      <p class="h6 text-uppercase text-primary">Tentang Pura Goa Giri Putri</p>
      {{-- <h2 class="mb-5">Tentang Pura Goa Giri Putri</h2> --}}
      <div class="row pb-5 gy-4">

        <div class="col-lg-12 col-md-6">
          <!-- Services Item-->
          <div class="card border-0 shadow rounded-lg py-2 text-start">
            <div class="card-body p-5">
              @foreach (json_decode($lokasi->deskripsi, true)['tentang'] as $key => $tentang)
                <h3 class="h4 my-4">{{$tentang['tentang']}}</h3>
                <p class="text-sm text-muted mb-0" style="text-align: justify">{{$tentang['deskripsi']}}</p>
              @endforeach
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  
  <section class="about py-0">
    <div class="container">
      <div class="row pb-5 gy-4">
        <div class="col-3"></div>
        <div class="col-6">
          <iframe width="100%" height="314" src="{{json_decode($lokasi->deskripsi, true)['video_profil']}}"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen></iframe>
        </div>
        <div class="col-3"></div>
      </div>
    </div>
  </section>

  <section class="with-pattern-1 py-5" id="services">
    <div class="container py-5">
      <div class="row align-items-center mb-5 gy-5">
        <div class="col-lg-8">
          {{-- <img class="img-fluid w-100 px-lg-5"
            src="https://d19m59y37dris4.cloudfront.net/app/2-0/img/objects.e4497cfa.svg" alt=""> --}}

          <section class="p-0" id="testimonials"
            style="background: url(https://d19m59y37dris4.cloudfront.net/app/2-0/img/testimonials-bg.cc4a8da7.png) no-repeat; background-size: 40% 100%; background-position: left center">
            <div class="container">
              {{-- <p class="h6 text-uppercase text-primary">Tata Cara Persembahyangan</p> --}}
              <h2 class="mb-5">Tata Cara Persembahyangan</h2>
              <div class="swiper testimonials-slider">
                <div class="swiper-wrapper">
                  @foreach (json_decode($lokasi->deskripsi, true)['tahapan'] as $key => $tahapan)
                  <div class="swiper-slide h-auto">
                    <div class="mx-3 mx-lg-5 my-5 pt-3">
                      <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                        <div class="card-body index-forward pt-5 rounded-lg">
                          <img src="{{$tahapan['foto']}}" class="img-fluid text-center">
                          <p class="lead text-muted mb-5 mt-2" style="text-align: justify">{{$tahapan['tahapan']}}</p>
                          <h5 class="mb-0 text-center">{{$tahapan['bagian']}}</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
                {{-- <div class="swiper-pagination"></div> --}}
                 <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>
            </div>
          </section>
        </div>

        <div class="col-lg-4">
          {{-- <h2>Tata Cara Persembahyangan</h2> --}}
          <p class="text-muted">Tata cara dalam melakukan persembahyangan pada pura goa giri putri dapat dilihat pada
            video berikut</p>
          <button class="btn btn-primary js-modal-btn"
            data-video-id="{{json_decode($lokasi->deskripsi, true)['link_video']}}"><i
              class="fas fa-play-circle me-2"></i>Play video</button>
        </div>
      </div>
      <div class="row align-items-center gy-5 py-5">
        <div class="col-lg-6">
          <h2>Galeri Foto Pura Goa Giri Putri</h2>
          <p class="text-muted">
            Jalan menuju goa giri putri dapat ditempuh dari kota Nusa Penida.
          </p>
          <ul class="list-check">
            <li class="text-muted mb-2">
              Sekitar 30 menit berkendara dari Nusa Penida. Ke arah utara menuju Jl. Buyuk Limo - belok kanan ke Jl.
              Nusa Indah - Jl. Ped-Buyuk - Jl. Raya Batumulapan sekitar 4,1 km, Pura Goa Giri Putri berada di kanan
              jalan.
            </li>
            <li class="text-muted mb-2">
              Jika pengunjung berangkat dari Bandar Udara Ngurah Rai maka harus menuju ke dermaga dan menyeberang ke
              Nusa Penida.
            </li>
            {{-- <li class="text-muted mb-2">Waterfall, Video and Report History</li> --}}
          </ul>
          {{-- <button class="btn btn-primary js-modal-btn" data-video-id="aBgnu4ChFzg"><i
              class="fas fa-play-circle me-2"></i>Play video</button> --}}
        </div>
        <div class="col-lg-6">
          <div class="row gy-4">

            <div class="swiper testimonials-slider">
              <div class="swiper-wrapper">
                @if ($lokasi->galeri_foto != null)
                @foreach (json_decode($lokasi->galeri_foto, true) as $item)
                <div class="swiper-slide h-auto">
                  <div class="mx-3 mx-lg-5 my-5 pt-3">
                    <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                      <div class="card-body index-forward pt-5 rounded-lg">
                        <img class="img-fluid" src="{{asset($item['foto'])}}" alt="">
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                @else
                <div class="alert">
                  <strong>Tidak ada foto</strong></h2>
                </div>
                @endif

              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

</section>

@else
<section class="hero bg-top py-5" id="hero"
  style="background: url(https://d19m59y37dris4.cloudfront.net/app/2-0/img/banner-4.86a86274.png) no-repeat; background-size: 100% 80%">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-lg-12 py-5 mx-auto text-center">
        <h1>Tidak ada data</h1>
      </div>
    </div>
  </div>
</section>
@endif
@endsection

@push('scripts')
    <script>
      const swiper = new Swiper('.swiper', {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        autoplay: {
          delay: 2000,
        },
      });
    </script>
@endpush