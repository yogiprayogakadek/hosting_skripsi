@extends('frontend.templates.master')

@section('content')
    <!-- Hero Section-->
<section class="hero bg-top py-5" id="hero" style="background: url(https://d19m59y37dris4.cloudfront.net/app/2-0/img/banner-4.86a86274.png) no-repeat; background-size: 100% 80%">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-lg-5 py-5">
        <h1>Pura Goa Giri Putri </h1>
        <p class="my-4 text-muted">Desa Suana, Kecamatan Nusa Penida, Kabupaten Klungkung, Bali.</p>
        <ul class="list-inline mb-0">
          <li class="list-inline-item mb-2 mb-lg-0"><a class="btn btn-primary btn-lg px-4" href="#!"> <i class="fa fa-map me-3"></i>Maps</a></li>
          {{-- <li class="list-inline-item"><a class="btn btn-primary btn-lg px-4" href="#!"> <i class="fab fa-app-store me-3"></i>App Store</a></li> --}}
        </ul>
      </div>
      <div class="col-lg-6 ml-auto">
        <div class="screen"><img class="img-thumbnail rounded" src="https://www.thenusapenida.com/wp-content/uploads/2017/06/Pura-Goa-Giri-Putri@thenusapenida.com1_-1024x684.jpg" alt=""></div>
        {{-- <div class="device-wrapper mx-auto"> --}}
          {{-- <div class="device shadow" data-device="iPhoneX" data-orientation="portrait" data-color="black">
            <div class="screen"><img class="img-fluid" src="https://www.thenusapenida.com/wp-content/uploads/2017/06/Pura-Goa-Giri-Putri@thenusapenida.com1_-1024x684.jpg" alt=""></div>
          </div> --}}
        {{-- </div> --}}
      </div>
    </div>
  </div>
</section>
<section class="bg-center py-0" id="about" style="background: url(https://d19m59y37dris4.cloudfront.net/app/2-0/img/service-bg.d0e67e81.svg) no-repeat; background-size: cover">
  <section class="about py-0">
    <div class="container">
      <p class="h6 text-uppercase text-primary">Tentang Pura Goa Giri Putri</p>
      {{-- <h2 class="mb-5">Tentang Pura Goa Giri Putri</h2> --}}
      <div class="row pb-5 gy-4">
        <div class="col-lg-4 col-md-6">
          <!-- Services Item-->
          <div class="card border-0 shadow rounded-lg py-4 text-start">
            <div class="card-body p-5">
              <svg class="svg-icon svg-icon-light" style="width:60px;height:60px;color:#ff904e">
                <use xlink:href="#document-saved-1"> </use>
              </svg>
              <h3 class="h4 my-4">Online Marketing</h3>
              <p class="text-sm text-muted mb-0">
                Goa Giri Putri merupakan salah satu lokasi wisata religi Nusa Penida yang banyak diminati pengunjung. 
                Goa Giri Putri ini merupakan salah satu goa terbesar di Nusa Penida yang di dalamnya tersembunyi sebuah pura suci. 
                Lokasinya berada pada ketinggian 150 meter di atas permukaan laut dan panjang sekitar 310 meter.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <!-- Services Item-->
          <div class="card border-0 shadow rounded-lg py-4 text-start">
            <div class="card-body p-5">
              <svg class="svg-icon svg-icon-light" style="width:60px;height:60px;color:#39f8d2">
                <use xlink:href="#map-marker-1"> </use>
              </svg>
              <h3 class="h4 my-4">Track your move </h3>
              <p class="text-sm text-muted mb-0">
                Pura Goa Giri Putri berasal dari kata “giri” yang berarti bukit atau gunung serta kata “putri” yang berarti wanita. 
                Dalam ajaran agama Hindu, putri adalah simbolis dari kekuatan dewa. Goa suci ini merupakan tempat pemujaan Dewa Siwa berupa perwujudan dewi yang bersifat merawat, 
                melindungi serta mencintai manusia sehingga nama Giri Putri disematkan untuk nama goa.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <!-- Services Item-->
          <div class="card border-0 shadow rounded-lg py-4 text-start">
            <div class="card-body p-5">
              <svg class="svg-icon svg-icon-light" style="width:60px;height:60px;color:#8190ff">
                <use xlink:href="#arrow-target-1"> </use>
              </svg>
              <h3 class="h4 my-4">Market analysis</h3>
              <p class="text-sm text-muted mb-0">
                Hal unik yang dapat anda jumpai di Goa Giri Putri Temple yaitu akses masuknya yang tidak mudah. 
                Pengunjung harus mendaki sekitar 110 anak tangga menuju ke mulut goa. Saat sudah sampai di mulut goa, 
                pengunjung juga ditantang untuk berjuang masuk ke dalam goa karena mulut goa hanya memiliki lebar sekitar 80 
                sentimeter dan berlekuk - lekuk. 
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="with-pattern-1 py-5" id="services">
    <div class="container py-5">
      <div class="row align-items-center mb-5 gy-5">
        <div class="col-lg-8">
          {{-- <img class="img-fluid w-100 px-lg-5" src="https://d19m59y37dris4.cloudfront.net/app/2-0/img/objects.e4497cfa.svg" alt=""> --}}

          <section class="p-0" id="testimonials" style="background: url(https://d19m59y37dris4.cloudfront.net/app/2-0/img/testimonials-bg.cc4a8da7.png) no-repeat; background-size: 40% 100%; background-position: left center">
            <div class="container text-center">
              {{-- <p class="h6 text-uppercase text-primary">Tata Cara Persembahyangan</p> --}}
              <h2 class="mb-5">Tata Cara Persembahyangan</h2>
              <div class="swiper testimonials-slider">
                <div class="swiper-wrapper">
                  <div class="swiper-slide h-auto">
                    <div class="mx-3 mx-lg-5 my-5 pt-3">
                      <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                        <div class="card-body index-forward pt-5 rounded-lg">
                          {{-- <div class="testimonial-img"><img class="rounded-circle" src="https://d19m59y37dris4.cloudfront.net/app/2-0/img/avatar-1.a288a8c1.jpg" alt="" width="100"/></div> --}}
                          <p class="lead text-muted mb-5">
                            Tahapan persembahyangan di Goa Giri Putri dimulai dengan menaiki puluhan anak tangga 
                            menuju tempat persembahyangan pertama yakni Pelinggih Ida Hyang Tri Purusa Lan Ganapati, 
                            yang merupakan akses satu-satunya untuk memasuki Goa Giri Putri.
                          </p>
                          <h5 class="mb-0">Tahapan Pertama</h5>
                          {{-- <p class="text-primary mb-0 text-sm">Tech Developer</p> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide h-auto">
                    <div class="mx-3 mx-lg-5 my-5 pt-3">
                      <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                        <div class="card-body index-forward pt-5 rounded-lg">
                          {{-- <div class="testimonial-img"><img class="rounded-circle" src="https://d19m59y37dris4.cloudfront.net/app/2-0/img/avatar-2.0af75238.png" alt="" width="100"/></div> --}}
                          <p class="lead text-muted mb-5">Persembahyangan kedua dilaksanakan untuk menghaturkan sembah bhakti di Pelinggih Ida Hyang Wisnu dan Wasuki, serta terdapat pula lingga yoni yang melambangkan stana Dewa Siwa yang letaknya tidak jauh dari pelinggih utama.
                            </p>
                          <h5 class="mb-0">Tahapan Kedua</h5>
                          {{-- <p class="text-primary mb-0 text-sm">Tech Developer</p> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide h-auto">
                    <div class="mx-3 mx-lg-5 my-5 pt-3">
                      <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                        <div class="card-body index-forward pt-5 rounded-lg">
                          {{-- <div class="testimonial-img"><img class="rounded-circle" src="https://d19m59y37dris4.cloudfront.net/app/2-0/img/avatar-1.a288a8c1.jpg" alt="" width="100"/></div> --}}
                          <p class="lead text-muted mb-5">Setelah itu dilanjutkan melakukan prosesi ketiga, keempat, dan kelima yang letaknya tidak jauh dari tempat persembahyangan kedua.
                            </p>
                          <h5 class="mb-0">Tahapan Ketiga</h5>
                          {{-- <p class="text-primary mb-0 text-sm">Tech Developer</p> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide h-auto">
                    <div class="mx-3 mx-lg-5 my-5 pt-3">
                      <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                        <div class="card-body index-forward pt-5 rounded-lg">
                          {{-- <div class="testimonial-img"><img class="rounded-circle" src="https://d19m59y37dris4.cloudfront.net/app/2-0/img/avatar-2.0af75238.png" alt="" width="100"/></div> --}}
                          <p class="lead text-muted mb-5">
                            Ketiga tempat tersebut merupakan Linggih Ida Hyang Dewi Gangga (tempat melukat), Ida Hyang Giri Pati, dan Ida Hyang Giri Putri. Pemedek diharuskan untuk melakukan penglukatan terlebih dahulu sebelum melakukan persembahyangan. Penglukatan tersebut dimaksudkan untuk memohon kepada Dewi Gangga agar secara lahir batin terlepas dari hal-hal negatif.
                          </p>
                          {{-- <h5 class="mb-0">Frank Smith</h5>
                          <p class="text-primary mb-0 text-sm">Tech Developer</p> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>
          </section>
        </div>


        <div class="col-lg-4">
          {{-- <h2>Tata Cara Persembahyangan</h2> --}}
          <p class="text-muted">Tata cara dalam melakukan persembahyangan pada pura goa giri putri dapat dilihat pada video berikut</p>
          <button class="btn btn-primary js-modal-btn" data-video-id="B6uuIHpFkuo"><i class="fas fa-play-circle me-2"></i>Play video</button>
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
              Sekitar 30 menit berkendara dari Nusa Penida. Ke arah utara menuju Jl. Buyuk Limo - belok kanan ke Jl. Nusa Indah - Jl. Ped-Buyuk - Jl. Raya Batumulapan sekitar 4,1 km, Pura Goa Giri Putri berada di kanan jalan.
            </li>
            <li class="text-muted mb-2">
              Jika pengunjung berangkat dari Bandar Udara Ngurah Rai maka harus menuju ke dermaga dan menyeberang ke Nusa Penida.
            </li>
            {{-- <li class="text-muted mb-2">Waterfall, Video and Report History</li> --}}
          </ul>
          <button class="btn btn-primary js-modal-btn" data-video-id="B6uuIHpFkuo"><i class="fas fa-play-circle me-2"></i>Play video</button>
        </div>
        <div class="col-lg-6">
          <div class="row gy-4">
            <div class="col-lg-6 col-sm-6">
              <!-- Services Item-->
              <div class="card border-0 shadow rounded-lg text-start px-2">
                <div class="card-body">
                  {{-- <svg class="svg-icon" style="width:40px;height:40px;color:#ff904e">
                    <use xlink:href="#document-saved-1"> </use>
                  </svg> --}}
                  <h3 class="h5 my-3">Online Marketing</h3>
                  <p class="text-sm mb-0 text-muted">
                    <img class="img-fluid" src="https://www.befreetour.com/laravel-filemanager/photos/Artikel%20Review/Bali/Goa%20Giri%20Putri/Pengunjung_tak_hanya_berwisata_tetapi_juga_datang_untuk_bersembahyang_-_Photo_by__orianna_bali_tours.jpg" alt="">
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <!-- Services Item-->
              <div class="card border-0 shadow rounded-lg text-start px-2">
                <div class="card-body">
                  {{-- <svg class="svg-icon" style="width:40px;height:40px;color:#39f8d2">
                    <use xlink:href="#map-marker-1"> </use>
                  </svg> --}}
                  <h3 class="h5 my-3">Track your move </h3>
                  <p class="text-sm mb-0 text-muted">
                    <img class="img-fluid" src="https://www.befreetour.com/laravel-filemanager/photos/Artikel%20Review/Bali/Goa%20Giri%20Putri/Kursi_-_kursi_panjang_dari_batu_yang_digunakan_untuk_persembahyangan_-_Photo_by__seviavera.jpg" alt="">
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <!-- Services Item-->
              <div class="card border-0 shadow rounded-lg text-start px-2">
                <div class="card-body">
                  {{-- <svg class="svg-icon" style="width:40px;height:40px;color:#8190ff">
                    <use xlink:href="#arrow-target-1"> </use>
                  </svg> --}}
                  <h3 class="h5 my-3">Market analysis</h3>
                  <p class="text-sm mb-0 text-muted">
                    <img class="img-fluid" src="https://www.befreetour.com/laravel-filemanager/photos/Artikel%20Review/Bali/Goa%20Giri%20Putri/Kursi_-_kursi_panjang_dari_batu_yang_digunakan_untuk_persembahyangan_-_Photo_by__seviavera.jpg" alt="">
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <!-- Services Item-->
              <div class="card border-0 shadow rounded-lg text-start px-2">
                <div class="card-body">
                  {{-- <svg class="svg-icon" style="width:40px;height:40px;color:#ff634b">
                    <use xlink:href="#sorting-1"> </use>
                  </svg> --}}
                  <h3 class="h5 my-3">Full Settings</h3>
                  <p class="text-sm mb-0 text-muted">
                    <img class="img-fluid" src="https://www.befreetour.com/laravel-filemanager/photos/Artikel%20Review/Bali/Goa%20Giri%20Putri/Kursi_-_kursi_panjang_dari_batu_yang_digunakan_untuk_persembahyangan_-_Photo_by__seviavera.jpg" alt="">
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>


{{-- <section class="p-0" id="testimonials" style="background: url(https://d19m59y37dris4.cloudfront.net/app/2-0/img/testimonials-bg.cc4a8da7.png) no-repeat; background-size: 40% 100%; background-position: left center">
  <div class="container text-center">
    <p class="h6 text-uppercase text-primary">Testimonials</p>
    <h2 class="mb-5">What Our Users Says?</h2>
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="swiper testimonials-slider">
          <div class="swiper-wrapper">
            <div class="swiper-slide h-auto">
              <div class="mx-3 mx-lg-5 my-5 pt-3">
                <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                  <div class="card-body index-forward pt-5 rounded-lg">
                    <div class="testimonial-img"><img class="rounded-circle" src="https://d19m59y37dris4.cloudfront.net/app/2-0/img/avatar-1.a288a8c1.jpg" alt="" width="100"/></div>
                    <p class="lead text-muted mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    <h5 class="mb-0">Sarah Hudson</h5>
                    <p class="text-primary mb-0 text-sm">Tech Developer</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide h-auto">
              <div class="mx-3 mx-lg-5 my-5 pt-3">
                <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                  <div class="card-body index-forward pt-5 rounded-lg">
                    <div class="testimonial-img"><img class="rounded-circle" src="https://d19m59y37dris4.cloudfront.net/app/2-0/img/avatar-2.0af75238.png" alt="" width="100"/></div>
                    <p class="lead text-muted mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    <h5 class="mb-0">Frank Smith</h5>
                    <p class="text-primary mb-0 text-sm">Tech Developer</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide h-auto">
              <div class="mx-3 mx-lg-5 my-5 pt-3">
                <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                  <div class="card-body index-forward pt-5 rounded-lg">
                    <div class="testimonial-img"><img class="rounded-circle" src="https://d19m59y37dris4.cloudfront.net/app/2-0/img/avatar-1.a288a8c1.jpg" alt="" width="100"/></div>
                    <p class="lead text-muted mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    <h5 class="mb-0">Sarah Hudson</h5>
                    <p class="text-primary mb-0 text-sm">Tech Developer</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide h-auto">
              <div class="mx-3 mx-lg-5 my-5 pt-3">
                <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                  <div class="card-body index-forward pt-5 rounded-lg">
                    <div class="testimonial-img"><img class="rounded-circle" src="https://d19m59y37dris4.cloudfront.net/app/2-0/img/avatar-2.0af75238.png" alt="" width="100"/></div>
                    <p class="lead text-muted mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    <h5 class="mb-0">Frank Smith</h5>
                    <p class="text-primary mb-0 text-sm">Tech Developer</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</section> --}}
@endsection