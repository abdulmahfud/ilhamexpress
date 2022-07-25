<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    <title>CV.RUFAH ABADI BAROKAH</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets-frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
 
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets-frontend/assets/css/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets-frontend/assets/css/templatemo-onix-digital.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets-frontend/assets/css/animated.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets-frontend/assets/css/owl.css')}}" />
      </head>

  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header
      class="header-area header-sticky wow slideInDown"
      data-wow-duration="0.75s"
      data-wow-delay="0s"
    >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="main-nav">
              <!-- ***** Logo Start ***** -->
              <a href="{{url('')}}" class="logo">
                <img src="{{ asset('assets-frontend/assets/images/logo.png')}}" />
              </a>
              <!-- ***** Logo End ***** -->
              <!-- ***** Menu Start ***** -->
              <ul class="nav">
                <li class="scroll-to-section">
                  <a href="#top" class="active">Home</a>
                </li>
                <li class="scroll-to-section">
                  <a href="#services">Services</a>
                </li>
                <li class="scroll-to-section"><a href="#about">About</a></li>
                <li class="scroll-to-section">
                  <a href="#portfolio">Portfolio</a>
                </li>
                <li class="scroll-to-section">
                  <a href="#contact">Contact Us</a>
                </li>
                <li class="scroll-to-section">
                  <div class="main-red-button-hover">
                    <a href="https://wa.me/6285331214015">Chat No</a>
                  </div>
                </li>
              </ul>
              <a class="menu-trigger">
                <span>Menu</span>
              </a>
              <!-- ***** Menu End ***** -->
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner" id="top">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6 align-self-center">
                <div class="owl-carousel owl-banner">
                  <div class="item header-text">
                    <h6>CV.RUFAH ABADI BAROKAH</h6>
                    <h2>
                      Kepuasan <em>kostemer</em> menjadi pondasi <span>utama</span>?
                    </h2>
                    <p>
                      Kami selalu berusaha memberikan terbaik kepada setiap pelanggan kami pada setiap layanan yang kami berikan.
                    </p>
                    <div class="down-buttons">
                      <div class="main-blue-button-hover">
                        <a href="https://wa.me/6285331214015">Chat Whatsapp</a>
                      </div>
                      <div class="call-button">
                        <a href="tel:03132229114"><i class="fa fa-phone"></i> 087882834113</a>
                      </div>
                    </div>
                  </div>
                  <div class="item header-text">
                    <h6>CV.RUFAH ABADI BAROKAH</h6>
                    <h2>
                      Pengiriman <em>tepat</em> waktu <span>dan terpantau</span>
                    </h2>
                    <p>
                      Dukungan pengiriman via kapal roro dan kapal pelni agar selalu menjadi yang terdepan.
                    </p>
                    <div class="down-buttons">
                        <div class="main-blue-button-hover">
                            <a href="https://wa.me/6285331214015">Chat Whatsapp</a>
                        </div>
                        <div class="call-button">
                            <a href="tel:03132229114"><i class="fa fa-phone"></i> 087882834113</a>
                        </div>
                    </div>
                  </div>
                  <div class="item header-text">
                    <h6>CV.RUFAH ABADI BAROKAH</h6>
                    <h2>
                      Harga <em>pengiriman</em> kompetitif
                    </h2>
                    <p>
                      Anda bisa mendapatkan harga pengiriman yang relatif murah dengan berbagai macam point plus pada kami.
                    </p>
                    <div class="down-buttons">
                        <div class="main-blue-button-hover">
                            <a href="https://wa.me/6285331214015">Chat Whatsapp</a>
                        </div>
                        <div class="call-button">
                            <a href="tel:03132229114"><i class="fa fa-phone"></i> 087882834113</a>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="tracking" class="tracking">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <h3>Tracking Kiriman Anda!</h3>
                  <form  action="{{ route('tracking')}}" method="POST">
                    @csrf
                    <input
                      type="text"
                      name="koderesi"
                      id="koderesi"
                      disabled
                      placeholder="RESI"
                    />
                    
                    <input
                      type="text"
                      name="no_resi"
                      id="numberresi"
                      placeholder="NUMBER RESI"
                      required=""
                    />
                    <button type="submit" id="form-submit" class="main-button">
                      <i class="fa fa-search" aria-hidden="true"></i> Cari
                    </button>
                  </form>
                  <br />
                  <h3>Cek Ongkir</h3>
                  <form class="form-control btncariongkir" method="POST" action="{{ route('cekongkir')}}" >
                    @csrf
                    <input
                    type="text"
                    name="kotaasal"
                    placeholder="KOTA ASAL"
                  />
                    <input
                      type="text"
                      name="kotatujuan"
                      id="kotatujuan"
                      placeholder="KOTA TUJUAN"
                      required=""
                    />
                    <button type="submit" class="main-button">
                      <i class="fa fa-search" aria-hidden="true"></i> Cek
                    </button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   

    <div id="services" class="our-services section">
      <div class="services-right-dec">
        <img src="{{ asset('assets-frontend/assets/images/services-right-dec.png')}}" alt="" />
      </div>
      <div class="container">
        <div class="services-left-dec">
          <img src="{{ asset('assets-frontend/assets/images/services-left-dec.png')}}" alt="" />
        </div>
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <div class="section-heading">
              <h2>
                Menjadi <em>Pilihan</em> Terbaik Pada <span>Setiap Layanan</span>
              </h2>
              <span>Our Services</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="owl-carousel owl-services">
              <div class="item">
                <h4>Pengiriman Tepat Waktu</h4>
                <div class="icon">
                  <img src="{{ asset('assets-frontend/assets/images/service-icon-01.png')}}" alt="" />
                </div>
                <p>Tanpa takut kawatir untuk setiap pengiriman penting anda</p>
              </div>
              <div class="item">
                <h4>Harga Kompetitif</h4>
                <div class="icon">
                  <img src="{{ asset('assets-frontend/assets/images/service-icon-02.png')}}" alt="" />
                </div>
                <p>Anda bisa menghubungi CS kami untuk kebutuhan pengiriman dalam skla besar</p>
              </div>
              <div class="item">
                <h4>Support 24jam</h4>
                <div class="icon">
                  <img src="{{ asset('assets-frontend/assets/images/service-icon-03.png')}}" alt="" />
                </div>
                <p>Hubungi CS kami untuk setiap kebutuhan bantuan yang anda butuhkan</p>
              </div>
              <div class="item">
                <h4>Pengecekan Resi</h4>
                <div class="icon">
                  <img src="{{ asset('assets-frontend/assets/images/service-icon-04.png')}}" alt="" />
                </div>
                <p>Pastinya cukup mudah untuk mengetahui posisi pengiriman anda hanya dengan RESI</p>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="about" class="about-us section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="left-image">
              <img
                src="{{ asset('assets-frontend/assets/images/about-left-image.png')}}"
                alt="Two Girls working together"
              />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="section-heading">
              <h2>
                CV.RUFAH ABADI BAROKAH <em>AKAN SELALU MEMBANTU PENGIRIMAN ANDA</em>
              </h2>
              <p>
                CV.RUFAH ABADI BAROKAH adalah perusahaan jasa expedisi pengiriman darat dan kargo laut dengan skala yang besar dan
                sudah beroperasi hampir 17th dan akan selalu melakukan inovasi terbaru untuk memudahkan pelanggan kami.
                <br/>
                CV.RUFAH ABADI BAROKAH berpusat di Surabaya, kami mempunyai armada yang selalu siap untuk setiap pengiriman barang
                anda baik skala kecil atau besar.
                <br/>
                Untuk memberikan pelayanan terbaik, kami memiliki sumber daya manusia yang terlatih dan profesional. Dengan konsep
                Sistem Logistik terintegrasi, kami memberikan pelayanan kepada Anda secara tuntas dan profesional.
              </p>
              <div class="row">
                {{-- <div class="col-lg-4">
                  <div class="fact-item">
                    <div class="count-area-content">
                      <div class="icon">
                        <img src="{{ asset('assets-frontend/assets/images/service-icon-01.png')}}" alt="" />
                      </div>
                      <div class="count-digit">9.938</div>
                      <div class="count-title">PENGIRIMAN DARAT</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="fact-item">
                    <div class="count-area-content">
                      <div class="icon">
                        <img src="{{ asset('assets-frontend/assets/images/service-icon-02.png')}}" alt="" />
                      </div>
                      <div class="count-digit">26.092</div>
                      <div class="count-title">PENGIRIMAN LAUT</div>
                    </div>
                  </div>
                </div> --}}
                <div class="col-lg-4">
                  <div class="fact-item">
                    <div class="count-area-content">
                      <div class="icon">
                        <img src="{{ asset('assets-frontend/assets/images/service-icon-03.png')}}" alt="" />
                      </div>
                      <div class="count-digit">{{ $user}}</div>
                      <div class="count-title">CLIENT</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="portfolio" class="our-portfolio section">
      <div class="portfolio-left-dec">
        <img src="{{ asset('assets-frontend/assets/images/portfolio-left-dec.png')}}" alt="" />
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <div class="section-heading">
              <h2>
                Gallery <em>Pengiriman</em> CV.RUFAH ABADI BAROKAH
                
              </h2>
              <span>Our Gallery</span>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="owl-carousel owl-portfolio">
              @foreach ($galery as $item)
              <div class="item">
                <div class="thumb">
                  <img src="{{ asset('')}}{{ $item->image}}" alt="" />
                  <div class="hover-effect">
                    <div class="inner-content">
                      <a
                        rel="sponsored"
                      >
                        <h4>{{ $item->judul}}</h4>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div id="pricing" class="pricing-tables">
      <div class="tables-left-dec"></div>
      <div class="tables-right-dec">
        <img src="assets/images/tables-right-dec.png" alt="" />
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <div class="section-heading">
              <h2>
                Select a suitable <em>plan</em> for your next
                <span>projects</span>
              </h2>
              <span>Our Plans</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="item first-item">
              <h4>Starter Plan</h4>
              <em>$160/mo</em>
              <span>$140</span>
              <ul>
                <li>10 Projects</li>
                <li>100 GB space</li>
                <li>20 SEO checkups</li>
                <li>Basic Support</li>
              </ul>
              <div class="main-blue-button-hover">
                <a href="#">Get Started</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="item second-item">
              <h4>Standard Plan</h4>
              <em>$240/mo</em>
              <span>$200</span>
              <ul>
                <li>20 Projects</li>
                <li>200 GB space</li>
                <li>50 SEO checkups</li>
                <li>Pro Support</li>
              </ul>
              <div class="main-blue-button-hover">
                <a href="#">Get it Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="item third-item">
              <h4>Advanced Plan</h4>
              <em>$360/mo</em>
              <span>$280</span>
              <ul>
                <li>30 Projects</li>
                <li>300 GB space</li>
                <li>100 SEO checkups</li>
                <li>Best Support</li>
              </ul>
              <div class="main-blue-button-hover">
                <a href="#">Buy Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    {{-- <div id="subscribe" class="subscribe">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <h2>Dapatkan Informasi Terbaru Tentang Kami</h2>
                  <form id="subscribe" action="" method="get">
                    <input
                      type="text"
                      name="website"
                      id="website"
                      placeholder="Your Website URL"
                      required=""
                    />
                    <input
                      type="text"
                      name="email"
                      id="email"
                      pattern="[^ @]*@[^ @]*"
                      placeholder="Your Email"
                      required=""
                    />
                    <button type="submit" id="form-submit" class="main-button">
                      Subscribe
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <!-- <div id="video" class="our-videos section">
      <div class="videos-left-dec">
        <img src="assets/images/videos-left-dec.png" alt="" />
      </div>
      <div class="videos-right-dec">
        <img src="assets/images/videos-right-dec.png" alt="" />
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="naccs">
              <div class="grid">
                <div class="row">
                  <div class="col-lg-8">
                    <ul class="nacc">
                      <li class="active">
                        <div>
                          <div class="thumb">
                            <iframe
                              width="100%"
                              height="auto"
                              src="https://www.youtube.com/embed/JynGuQx4a1Y"
                              title="YouTube video player"
                              frameborder="0"
                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                              allowfullscreen
                            ></iframe>
                            <div class="overlay-effect">
                              <a href="#">
                                <h4>Project One</h4>
                              </a>
                              <span>SEO &amp; Marketing</span>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div>
                          <div class="thumb">
                            <iframe
                              width="100%"
                              height="auto"
                              src="https://www.youtube.com/embed/RdJBSFpcO4M"
                              title="YouTube video player"
                              frameborder="0"
                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                              allowfullscreen
                            ></iframe>
                            <div class="overlay-effect">
                              <a href="#">
                                <h4>Second Project</h4>
                              </a>
                              <span>Advertising &amp; Marketing</span>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div>
                          <div class="thumb">
                            <iframe
                              width="100%"
                              height="auto"
                              src="https://www.youtube.com/embed/ZlfAjbQiL78"
                              title="YouTube video player"
                              frameborder="0"
                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                              allowfullscreen
                            ></iframe>
                            <div class="overlay-effect">
                              <a href="#">
                                <h4>Project Three</h4>
                              </a>
                              <span>Digital &amp; Marketing</span>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div>
                          <div class="thumb">
                            <iframe
                              width="100%"
                              height="auto"
                              src="https://www.youtube.com/embed/mx1WseE7-0Y"
                              title="YouTube video player"
                              frameborder="0"
                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                              allowfullscreen
                            ></iframe>
                            <div class="overlay-effect">
                              <a href="#">
                                <h4>Fourth Project</h4>
                              </a>
                              <span>SEO &amp; Advertising</span>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="col-lg-4">
                    <div class="menu">
                      <div class="active">
                        <div class="thumb">
                          <img src="assets/images/video-thumb-01.png" alt="" />
                          <div class="inner-content">
                            <h4>Project One</h4>
                            <span>SEO &amp; Marketing</span>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div class="thumb">
                          <img src="assets/images/video-thumb-02.png" alt="" />
                          <div class="inner-content">
                            <h4>Second Project</h4>
                            <span>Advertising &amp; Marketing</span>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div class="thumb">
                          <img
                            src="assets/images/video-thumb-03.png"
                            alt="Marketing"
                          />
                          <div class="inner-content">
                            <h4>Project Three</h4>
                            <span>Digital &amp; Marketing</span>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div class="thumb">
                          <img
                            src="assets/images/video-thumb-04.png"
                            alt="SEO Work"
                          />
                          <div class="inner-content">
                            <h4>Fourth Project</h4>
                            <span>SEO &amp; Advertising</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <div id="contact" class="contact-us section">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="section-heading">
              <h2>
                Hubungi <em>Kami</em>
              </h2>
              <div id="map">
                <div style="width: 100%"><iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=360&amp;hl=en&amp;q=Jl.%20Simorejo%20Tim.%20III%20No.46,%20Simomulyo,%20Kec.%20Sukomanunggal,%20Kota%20SBY,%20Jawa%20Timur%2060281+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="360" frameborder="0"><a href="https://www.gps.ie/marine-gps/">shipping gps</a></iframe></div>
              </div>
              {{-- <div class="info">
                <span
                  ><i class="fa fa-phone"></i>
                  <a href="#">087882834113</a></span
                >
                <span
                  ><i class="fa fa-envelope"></i>
                  <a href="#">expressilham@gmail.com</a></span
                >
              </div> --}}
            </div>
          </div>
          <div class="col-lg-5 align-self-center">
            <div class="info">
              <span
                ><i class="fa fa-phone"></i>
                <a href="#">087882834113</a></span
              >
              <span
                ><i class="fa fa-envelope"></i>
                <a href="#">expressilham@gmail.com</a></span
              >
            </div>
            {{-- <form id="contact" action="" method="get">
              <div class="row">
                <div class="col-lg-12">
                  <fieldset>
                    <input
                      type="name"
                      name="name"
                      id="name"
                      placeholder="Name"
                      autocomplete="on"
                      required
                    />
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <input
                      type="surname"
                      name="surname"
                      id="surname"
                      placeholder="Surname"
                      autocomplete="on"
                      required
                    />
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <input
                      type="text"
                      name="email"
                      id="email"
                      pattern="[^ @]*@[^ @]*"
                      placeholder="Your Email"
                      required=""
                    />
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <input
                      type="text"
                      name="website"
                      id="website"
                      placeholder="Your Website URL"
                      required=""
                    />
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="main-button">
                      Submit Request
                    </button>
                  </fieldset>
                </div>
              </div>
            </form> --}}
          </div>
        </div>
      </div>
      <div class="contact-dec"></div>
      <div class="contact-left-dec">
        <img src="{{ asset('assets-frontend/assets/images/contact-left-dec.png')}}" alt="" />
      </div>
    </div>

    <div class="footer-dec">
      <img src="{{ asset('assets-frontend/assets/images/footer-dec.png')}}" alt="" />
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="about footer-item">
              <div class="logo">
                <a href="#"
                  ><img width="75%"
                    src="{{ asset('assets-frontend/assets/images/logo.png')}}"
                    alt="Onix Digital TemplateMo"
                /></a>
              </div>
              <p>
                CV.RUFAH ABADI BAROKAH,Ilham Express merupakan sebuah Jasa yang bergerak di bidang  pengiriman Export, Import maupun Domestik yang terpercaya dan yang terbaik di INDONESIA. Pekerja yang profesional dan berpengalaman Dalam Bidangnya.
                </p>
              <ul>
                <li>
                  <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-behance"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="services footer-item">
              <h4>Layanan</h4>
              <ul>
                <li><a href="#">Pengiriman Via Darat</a></li>
                <li><a href="#">Pengiriman Via Laut</a></li>
                <li><a href="#">Pengiriman Domestik</a></li>
                <li><a href="#">JASA TITIP ( JASTIP ) </a></li>
                <li><a href="#">Pengiriman Export dan Import</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="community footer-item">
              <h4>Alamat</h4>
              <ul>
                <li><a href=""><i class="fa fa-map-marker">Lokasi. Jalan Rawa Badak Barat No.18 RT.006/05 Kelurahan Rawa Badak Utara Kecamatan Koja Jakarta Utara 14230</i></a>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="subscribe-newsletters footer-item">
              <h4>Kontak</h4>
              <ul>
                <li><a href="tel:03132229114"><i class="fa fa-phone-square">Tlp. 087882834113</i></a>
                <li><a href="https://wa.me/6285331214015"><i class="fa fa-whatsapp">Whatsapp. 087882834113</i></a>
              </ul>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="copyright">
              <p>
                Copyright © 2021 M-Onetech.com. All Rights Reserved.
                <br />
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('assets-frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets-frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets-frontend/assets/js/owl-carousel.js')}}"></script>
    <script src="{{ asset('assets-frontend/assets/js/animation.js')}}"></script>
    <script src="{{ asset('assets-frontend/assets/js/imagesloaded.js')}}"></script>
    <script src="{{ asset('assets-frontend/assets/js/custom.js')}}"></script>

    <script>
      // Acc
      $(document).on('click', '.naccs .menu div', function () {
        var numberIndex = $(this).index();

        if (!$(this).is('active')) {
          $('.naccs .menu div').removeClass('active');
          $('.naccs ul li').removeClass('active');

          $(this).addClass('active');
          $('.naccs ul')
            .find('li:eq(' + numberIndex + ')')
            .addClass('active');

          var listItemHeight = $('.naccs ul')
            .find('li:eq(' + numberIndex + ')')
            .innerHeight();
          $('.naccs ul').height(listItemHeight + 'px');
        }
      });
    </script>
 
  

  
  </body>
</html>
