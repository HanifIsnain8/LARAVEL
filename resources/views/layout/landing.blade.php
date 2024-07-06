
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MagangPlus</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">MagangPlus</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#services">Fitur</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <img src="assets/img/hero-bg-abstract.jpg" alt="" data-aos="fade-in" class="">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-out">
          <div class="col-xl-10 col-lg-9 text-center">
            <h1>Sistem Pendukung Keputusan Penerimaan Mahasiswa Magang</h1>
            <p>Menggunakan Metode  Technique for Order Preference by Similarity to Ideal 
                Solution (TOPSIS) </p>
          </div>
        </div>
        <div class="text-center" data-aos="zoom-out" data-aos-delay="100">
          <a href="{{ route('login') }}" class="btn-get-started">Mulai</a>
        </div>
      </div>

    </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Tentang</h2>
          <p>MagangPlus adalah platform yang dirancang khusus untuk mempermudah proses <br>penerimaan mahasiswa magang di berbagai perusahaan dan organisasi.</p>
        </div><!-- End Section Title -->
    
        <div class="container">
        
          <div class="row gy-4">
        
            <div class="col-lg-12 content" data-aos="fade-up" data-aos-delay="100">
              <p>
                MagangPlus merupakan solusi untuk perusahaan dan organisasi dalam menyederhanakan dan mengoptimalkan proses seleksi mahasiswa magang. Dengan fitur-fitur yang komprehensif, platform ini mempermudah manajemen data, penilaian, dan evaluasi kandidat magang.
              </p>
              <ul>
                <li><i class="bi bi-check2-circle"></i> <span>Mengelola data mahasiswa yang mendaftar untuk magang.</span></li>
                <li><i class="bi bi-check2-circle"></i> <span>Menetapkan dan mengelola kriteria seleksi serta bobotnya.</span></li>
                <li><i class="bi bi-check2-circle"></i> <span>Melakukan penilaian dan evaluasi berdasarkan kriteria yang ditetapkan.</span></li>
              </ul>
            </div>
        
          </div>
      
        </div>
  
  </section>
  




    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Fitur</h2>
        <p>Fitur unggulan yang kami tawarkan untuk memudahkan proses penerimaan magang Anda</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item item-cyan position-relative">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class="bi bi-activity"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Data Alternatif</h3>
              </a>
              <p>memungkinkan pengguna untuk mengelola data mahasiswa yang mendaftar untuk magang. Pengguna dapat menambahkan, mengedit, dan menghapus data alternatif, serta melihat informasi detail mengenai setiap mahasiswa.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item item-orange position-relative">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                </svg>
                <i class="bi bi-broadcast"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Data Kiteria</h3>
              </a>
              <p>menyediakan pengelolaan kriteria yang digunakan dalam proses seleksi magang. Pengguna dapat menetapkan kriteria seleksi, seperti kemampuan teknis, pengalaman kerja, dan soft skills, serta memberikan bobot pada setiap kriteria</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item item-teal position-relative">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                </svg>
                <i class="bi bi-easel"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Subs Kriteria</h3>
              </a>
              <p>memungkinkan pengguna untuk menentukan sub-kriteria dari setiap kriteria utama. </p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-red position-relative">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
                </svg>
                <i class="bi bi-bounding-box-circles"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Penilaian dan Evaluasi</h3>
              </a>
              <p>memungkinkan pengguna untuk melakukan penilaian dan evaluasi terhadap mahasiswa berdasarkan kriteria dan sub-kriteria yang telah ditetapkan. Penilaian ini akan menghasilkan skor yang dapat digunakan untuk menentukan peringkat dan keputusan akhir</p>
              <a href="service-details.html" class="stretched-link"></a>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Services Section -->



    <!-- Faq Section -->
    <section id="faq" class="faq section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Frequently Asked Questions</h2>
          <p>Pertanyaan yang sering diajukan mengenai platform MagangPlus</p>
        </div><!-- End Section Title -->
      
        <div class="container">
      
          <div class="row justify-content-center">
      
            <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
      
              <div class="faq-container">
      
                <div class="faq-item faq-active">
                  <h3>Apa itu MagangPlus?</h3>
                  <div class="faq-content">
                    <p>MagangPlus adalah platform yang dirancang untuk membantu perusahaan dan organisasi dalam mengelola proses penerimaan mahasiswa magang. Platform ini menyediakan fitur-fitur seperti manajemen data mahasiswa, kriteria seleksi, penilaian, dan evaluasi.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
      
                <div class="faq-item">
                  <h3>Bagaimana cara kerja MagangPlus?</h3>
                  <div class="faq-content">
                    <p>MagangPlus memungkinkan pengguna untuk menambahkan data mahasiswa yang mendaftar magang, menetapkan kriteria seleksi, dan melakukan penilaian berdasarkan kriteria tersebut. Hasil penilaian ini digunakan untuk menentukan peringkat dan keputusan akhir penerimaan mahasiswa magang.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
      
                <div class="faq-item">
                  <h3>Siapa yang dapat menggunakan MagangPlus?</h3>
                  <div class="faq-content">
                    <p>MagangPlus dapat digunakan oleh berbagai perusahaan dan organisasi yang menerima mahasiswa magang. Platform ini dirancang untuk memudahkan proses seleksi dan manajemen penerimaan mahasiswa magang.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
      
                <div class="faq-item">
                  <h3>Apa saja fitur unggulan MagangPlus?</h3>
                  <div class="faq-content">
                    <p>Fitur-fitur unggulan MagangPlus meliputi pengelolaan data mahasiswa, penetapan dan pengelolaan kriteria seleksi, penilaian dan evaluasi berdasarkan kriteria yang ditetapkan, serta menghasilkan laporan penilaian yang dapat digunakan untuk membuat keputusan akhir penerimaan magang.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
      
              </div>
      
            </div><!-- End Faq Column-->
      
          </div>
      
        </div>
      
      </section>
      

  </main>

  <footer id="footer" class="footer light-background">

    {{-- <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">OnePage</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>A108 Adam Street</p>
          <p>New York, NY 535022</p>
          <p>United States</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>
        </div>

      </div>
    </div> --}}

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">OnePage</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>