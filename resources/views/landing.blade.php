@extends('main')
@section('title', "Diagnosa Virus Parechovirus")
@section('main_section')
    {{-- Navbar dan header --}}
    
    
        <!-- Nav and Logo
     ================================================== -->
        <!-- MENU
        ================================================== -->
        <nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-dark" aria-label="Main navigation">
            <div class="container">
                {{-- <img src="/assets/images/logo-light.png"> --}}
                <a href="/">
                    <div class="logo"></div>
                </a>
                <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault" >
                    <ul class="navbar-nav ms-auto navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">Kenali</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#bahaya">Bahaya</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#FAQ">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Hubungi</a>
                        </li>
                        @guest()
                        <li class="nav-item" style="margin-left: 20px;">
                            <a class="nav-link btn-landing" href="/login">Login</a>
                        </li>
                        @endguest
                        
                    </ul>
                </div>
            </div>
        </nav>
    
        <!-- Primary Page Layout
     ================================================== -->
        <!-- Halaman Utama -->
        <section class="home py-5 d-flex align-items-center" id="header">
            <div class="container text-light py-5"  data-aos="fade-right"> 
                <h1 class="headline">Diagnosa<br>
                    <span class="home_text">Virus </span>Parechovirus</h1>
                <p class="para para-light py-3">Virus Parechovirus adalah kelompok virus yang termasuk dalam famili Picornaviridae. Virus ini dapat menyebabkan infeksi pada manusia, terutama pada bayi dan anak-anak kecil.<br><br>
                    Bangun kesadaran dan bekerja sama untuk melindungi diri dan orang-orang terdekat kita dari virus parechovirus</p>
                
                <div class="my-3">
                    <a class="btn-landing" href="/register">Cek Sekarang !</a>
                </div>
            </div>
        </section>

        <section class="information">
            <div class="container-fluid">  
                <div class="row text-light">
                    <div class="col-lg-4 text-center p-5" data-aos="zoom-in">
                        <i class="fa-solid fa-baby"></i>
                        <h4 class="py-3">Gejala pada Bayi</h4>
                        <p class="para-light">Pada bayi, gejala yang umum meliputi demam, ruam kulit, muntah, diare, dan kelemahan. Beberapa bayi juga dapat mengalami iritabilitas, menolak makan, dan kesulitan bernapas.</p>
                    </div>
                    <div class="col-lg-4 text-center p-5"  data-aos="zoom-in">
                        <i class="fa-solid fa-child"></i>
                        <h4 class="py-3">Gejala pada Anak - Anak</h4>
                        <p class="para-light">Pada anak-anak yang lebih besar dan orang dewasa, infeksi parechovirus biasanya tidak menimbulkan gejala atau hanya menyebabkan gejala ringan seperti pilek atau sakit tenggorokan.</p>
                    </div>
                    <div class="col-lg-4 text-center p-5 text-dark"  data-aos="zoom-in"> 
                        <i class="fa-solid fa-notes-medical"></i>
                        <h4 class="py-3">Pencegahan</h4>
                        <p class="para-light">Mencuci tangan dengan baik, menghindari kontak dengan orang yang sakit, dan menjaga kebersihan makanan dan minuman.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About -->
        <section class="about d-flex align-items-center text-light py-5" id="about">
            <div class="container" >
                <div class="row d-flex align-items-center">
                    <div class="col-lg-7" data-aos="fade-right">
                        <p> KENALI LEBIH DALAM </p>
                        <h1>VIRUS<br> PARECHOVIRUS</h1>
                        <p class="py-2 para-light">Parechovirus biasanya menginfeksi bayi dan anak-anak kecil, meskipun orang dewasa juga dapat terinfeksi. Mereka dapat menyebabkan berbagai gejala, mulai dari infeksi pernapasan ringan hingga infeksi yang lebih serius, seperti penyakit gastrointestinal, infeksi sistem saraf pusat, dan peradangan jantung.</p>
                        <p class="py-2 para-light">Beberapa jenis parechovirus manusia yang umum termasuk Human parechovirus (HPeV) tipe 1 hingga 19. HPeV-1 dan HPeV-2 adalah penyebab umum infeksi pada bayi dan anak-anak kecil. Mereka dapat menyebabkan demam, ruam, diare, muntah, dan infeksi pernapasan ringan.</p>

                        <div class="my-3">
                            <a class="btn-landing" href="#your-link">Lanjut membaca...</a>
                        </div>
                    </div>
                    <div class="col-lg-5 text-center py-4 py-sm-0" data-aos="fade-down"> 
                        <img class="img-fluid" src="{{ asset('assets/images/DrawKit Vector Illustration Mental Health & Psychology (1).png') }}" alt="about" >
                    </div>
                </div>
            </div>
        </section>

        <!-- Bahaya -->
        <section class="services d-flex align-items-center py-5" id="bahaya">
            <div class="container text-light">
                <div class="text-center pb-4"><br>
                    <p>VIRUS PARECHOVIRUS</p> 
                    <h2 class="py-2">BAHAYA YANG PERLU ANDA KENALI</h2>
                    <p class="para-light">Meskipun infeksi oleh parechovirus pada manusia umumnya ringan, terutama pada anak-anak, ada beberapa bahaya yang terkait dengan infeksi parechovirus :</p>
                </div>
                <div class="row gy-4 py-2" data-aos="zoom-in">
                    <div class="col-lg-4">
                        <div class="card bg-transparent">
                            <h4 class="py-2">Infeksi Saluran Pernapasan</h4>
                            <p class="para-light">Parechovirus dapat menyebabkan infeksi saluran pernapasan yang mirip dengan pilek atau flu pada anak-anak dan orang dewasa. Gejalanya meliputi demam, pilek, batuk, dan sakit tenggorokan. Namun, infeksi saluran pernapasan biasanya ringan dan jarang menyebabkan komplikasi serius.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-transparent">
                            <h4 class="py-2">Infeksi Saluran Pencernaan</h4>
                            <p class="para-light">Parechovirus juga dapat menyebabkan infeksi saluran pencernaan, terutama pada bayi dan anak-anak. Gejala yang umum meliputi diare, muntah, dan sakit perut. Pada beberapa kasus, infeksi saluran pencernaan dapat menyebabkan dehidrasi yang memerlukan perawatan medis.</p>
                        </div>                    
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-transparent">
                            <h4 class="py-2">Meningitis dan Ensefalitis</h4>
                            <p class="para-light">Salah satu bahaya yang lebih serius terkait dengan parechovirus adalah kemampuannya untuk menyebabkan meningitis (peradangan selaput di sekitar otak dan sumsum tulang belakang) atau ensefalitis (peradangan otak itu sendiri). Infeksi ini biasanya terjadi pada bayi.</p>
                        </div>                    
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-transparent">
                            <h4 class="py-2">Infeksi pada Bayi Baru Lahir</h4>
                            <p class="para-light">Parechovirus dapat menyebabkan infeksi pada bayi baru lahir yang dapat sangat berbahaya. Bayi yang terinfeksi parechovirus dapat mengalami gejala seperti demam, muntah, ruam kulit, masalah pernapasan, kejang, dan kelemahan otot.</p>
                        </div>                    
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-transparent">
                            <h4 class="py-2">Infeksi Jantung</h4>
                            <p class="para-light">Beberapa kasus infeksi parechovirus telah dikaitkan dengan miokarditis, yaitu peradangan pada otot jantung. Miokarditis dapat menyebabkan gejala seperti nyeri dada, sesak napas, kelelahan, dan detak jantung yang tidak teratur.</p>
                        </div>                    
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-transparent">
                            <h4 class="py-2">Penularan pada Bayi yang Belum Lahir</h4>
                            <p class="para-light">Parechovirus dapat ditularkan dari ibu ke janin melalui plasenta selama kehamilan. Infeksi parechovirus pada janin dapat menyebabkan komplikasi serius, termasuk kelainan perkembangan.</p>
                        </div>                    
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <div class="slider-1 testimonial text-light d-flex align-items-center" id="FAQ">
            <div class="container">
                <div class="row">
                    <div class="text-center w-lg-75 m-auto pb-4">
                        <p>FAQ</p>
                        <h2 class="py-2">PERTANYAAN YANG SERING DIAJUKAN</h2>
                    </div>
                </div>
                <div class="row p-2" data-aos="zoom-in">
                    <div class="col-lg-12">

                        
                        <div class="slider-container">
                            <div class="swiper-container card-slider">
                                <div class="swiper-wrapper">
                                    
                                    <!-- 1 -->
                                    <div class="swiper-slide">
                                        <div class="testimonial-card p-4">
                                            <div class="d-flex pb-4">
                                                <div class="ms-3 pt-2">
                                                    <h6>Apa itu VIRUS PARECHOVIRUS?</h6>
                                                </div>
                                            </div>
                                            <p>Virus Parechovirus adalah kelompok virus yang termasuk dalam famili Picornaviridae. Virus ini dapat menyebabkan infeksi pada manusia, terutama pada bayi dan anak-anak kecil.</p>
                                        </div>
                                    </div>

                                    <!-- 2 -->
                                    <div class="swiper-slide">
                                        <div class="testimonial-card p-4">
                                            <div class="d-flex pb-4">
                                                <div class="ms-3 pt-2">
                                                    <h6>Siapa yang bisa mengakses aplikasi ini?</h6>
                                                </div>
                                            </div>
                                            <p>Hanya pengguna yang memiliki otorisasi dan izin akses yang tepat yang dapat mengakses aplikasi ini.</p>
                                        </div>
                                    </div>
                                    
            
                                    <!-- 3 -->
                                    <div class="swiper-slide">
                                        <div class="testimonial-card p-4">
                                            <div class="d-flex pb-4">
                                                <div class="ms-3 pt-2">
                                                    <h6>Apakah hasil dari Sistem Pakar ini benar?</h6>
                                                </div>
                                            </div>
                                            <p>Kami menghasilkan jawaban berdasarkan data dan informasi yang telah dipelajari dan telah melewati riset sehingga dapat dipastikan kebenarannya.   
                                            </p>
                                        </div>      
                                    </div>
                                    
            
                                    <!-- 4 -->
                                    <div class="swiper-slide">
                                        <div class="testimonial-card p-4">
                                            <div class="d-flex pb-4">
                                                <div class="ms-3 pt-2">
                                                    <h6>Bagaimana cara melihat hasil diagnosa?</h6>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam commodi officia laborum qui iste quidem!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hubungi -->
        <section class="contact d-flex align-items-center py-5" id="contact">
            <div class="container-fluid text-light">
                <div class="row">
                    <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end align-items-center px-lg-5" data-aos="fade-right">
                        <div style="width:90%">
                            <div class="text-center text-lg-start py-4 pt-lg-0">
                                <p>Diagnosa Virus Parechovirus</p>
                                <h2 class="py-2">HUBUNGI KAMI</h2>
                                <p class="para-light">Kami akan senang mendengar apapun dari Anda dan siap membantu dengan pertanyaan atau permintaan apapun yang Anda miliki.</p>
                            </div>
                            <div>
                                <div class="row" >
                                    <div class="col-lg-6">
                                        <div class="form-group py-2">
                                            <input type="text" class="form-control form-control-input" id="exampleFormControlInput1" placeholder="Masukkan Nama">
                                        </div>                                
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group py-2">
                                            <input type="email" class="form-control form-control-input" id="exampleFormControlInput2" placeholder="Nomor Telepon">
                                        </div>                                 
                                    </div>
                                </div>
                                <div class="form-group py-1">
                                    <input type="email" class="form-control form-control-input" id="exampleFormControlInput3" placeholder="Email">
                                </div>  
                                <div class="form-group py-2">
                                    <textarea class="form-control form-control-input" id="exampleFormControlTextarea1" rows="6" placeholder="Pesan"></textarea>
                                </div>                            
                            </div>
                            <div class="my-3">
                                <a class="btn-landing form-control-submit-button" href="#">Kirim</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center" data-aos="fade-down">
                        <img class="img-fluid d-none d-lg-block" src="./assets/images/DrawKit Vector Illustration Mental Health & Psychology (8).png" alt="contact">        
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <section class="footer text-light">
            <div class="container">
                <div class="row" data-aos="fade-right">
                    <div class="col-lg-3 py-4 py-md-5">
                        <div class="d-flex align-items-center">
                            <h4 class="">Sistem Pakar</h4>
                        </div>
                        <p class="py-3 para-light"></p>
                        <div class="d-flex">
                            <div class="me-3">
                                <a href="#">
                                    <i class="fab fa-facebook-f fa-2x py-2"></i>
                                </a>
                            </div>
                            <div class="me-3">
                                <a href="#">
                                    <i class="fab fa-twitter fa-2x py-2"></i>
                                </a>
                            </div>
                            <div class="me-3">
                                <a href="#">
                                    <i class="fab fa-instagram fa-2x py-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 py-4 py-md-5">
                        <div>
                            <h4 class="py-2">Sosial Media</h4>
                            <div class="d-flex align-items-center py-2">
                                <i class="fas fa-caret-right"></i>
                                <a href="#"><p class="ms-3">Instagram</p></a>
                            </div>
                            <div class="d-flex align-items-center py-2">
                                <i class="fas fa-caret-right"></i>
                                <a href="#"><p class="ms-3">Facebook</p></a>
                            </div>
                            <div class="d-flex align-items-center py-2">
                                <i class="fas fa-caret-right"></i>
                                <a href="#"><p class="ms-3">Twitter</p></a>
                            </div>
                            <div class="d-flex align-items-center py-2">
                                <i class="fas fa-caret-right"></i>
                                <a href="#"><p class="ms-3">WhatsApp</p></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 py-4 py-md-5">
                        <div>
                            <h4 class="py-2">Pintasan</h4>
                            <div class="d-flex align-items-center py-2">
                                <i class="fas fa-caret-right"></i>
                                <a href="#header"><p class="ms-3">Beranda</p></a>
                        
                            </div>
                            <div class="d-flex align-items-center py-2">
                                <i class="fas fa-caret-right"></i>
                                <a href="#about"><p class="ms-3">Kenali</p></a>
                            </div>
                            <div class="d-flex align-items-center py-2">
                                <i class="fas fa-caret-right"></i>
                                <a href="#bahaya"><p class="ms-3">Bahaya</p></a>
                            </div>
                            <div class="d-flex align-items-center py-2">
                                <i class="fas fa-caret-right"></i>
                                <a href="#FAQ"><p class="ms-3">FAQ</p></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 py-4 py-md-5">
                        <div class="d-flex align-items-center">
                            <h4>Email</h4>
                        </div>
                        <br>
                        <div class="d-flex align-items-center">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control p-2" placeholder="Enter Email" aria-label="Recipient's email">
                                <button class="btn-secondary text-light"><i class="fas fa-envelope fa-lg"></i></button>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <button onclick="topFunction()" id="myBtn">
            <img src="{{ asset('assets/images/up-arrow.png') }}" alt="alternative">
        </button>    
        <!-- End Document
    ================================================== -->

@endsection
