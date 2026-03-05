<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar HTML</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
</head>

<body>
    <!-- navbar -->
    <nav>
        <div class="nav-kiri">
            <ul class="img-p">
                <img class="img-nav" src="asset/logo-metamorjiwa.png" width="50px" height="50px" alt="logo dari metamorjiwa">
                <p class="p-nav">Metamorjiwa</p>
            </ul>

            <ul id="ul-nav">
                <li class="li-nav">
                    <a class="a-nav" href="#tentang">Tentang</a>
                </li>
                <li class="li-nav">
                    <a class="a-nav" href="#preview">Preview</a>
                </li>
                <li class="li-nav">
                    <a class="a-nav" href="#testimoni">Testimoni</a>
                </li>
            </ul>
        </div>

        <button class="but-nav"> DAPATKAN</button>
    </nav>
    <!-- navbar END -->

    <!-- hero section -->
    <a href="" class="whasap" target="_blank">
        <img src="asset/whatsapp_icon.png" width="50" height="50" alt="icon whatsapp">
    </a>
    <section>
        <div id="hero">
            <svg class="sparkle sparkle-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z" fill="#ffffff" opacity="0.9"/></svg>
            <svg class="sparkle sparkle-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z" fill="#ffffff" opacity="0.6"/></svg>
            <svg class="sparkle sparkle-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z" fill="#ffffff" opacity="0.8"/></svg>
            <ul class="hero-kiri" data-aos="fade-up">
                <li>
                    <h1 class="hand-font">{{ $hero->heading ?? 'Temukan Diri Lewat Kata' }}</h1>
                </li>
                <li class="p-hero">
                    <p>{{ $hero->deskripsi ?? '' }}</p>
                </li>
                <li>
                    <button class="but-hero">{{ $hero->button_text ?? 'Download Template' }}</button>
                </li>
            </ul>
            <ul class="hero-kanan" data-aos="fade-left" data-aos-delay="300">
                <li>
                    @if($hero->image && Storage::disk('public')->exists($hero->image))
                        <img class="floating-book" src="{{ asset('storage/' . $hero->image) }}" width="300" height="300" alt="hero image">
                    @else
                        <img class="floating-book" src="asset/mockup-bukudantablet.png" width="300" height="300" alt="mockup dari tablet dan buku">
                    @endif
                </li>
            </ul>
        </div>
    </section>
    <!-- hero section END -->

    <div class="background-second">

        <!-- tentang -->
        <section>
            <div id="tentang">
                <ul class="img-tentang" data-aos="zoom-in">
                    <li>
                        <img src="asset/butterfly.png" width="250" height="250">
                    </li>
                </ul>
                <ul class="text-tentang" data-aos="fade-up" data-aos-delay="200">>
                    <li>
                        <h1>Ruang Aman Untuk Menulis</h1>
                    </li>
                    <li>
                        <h3>Tempat untuk berhenti sejenak dan menulis dengan jujur, tanpa penilaian.</h3>
                    </li>
                    <li>
                        <p>Setiap halaman hadir bukan untuk mengarahkan, tapi menemani. Kamu bebas menulis dengan caramu
                            sendiri.
                            <br>Rapi atau berantakan, penuh atau kosong. Karena proses mengenal diri tidak selalu jelas,
                            dan itu tidak apa-apa.
                        </p>
                    </li>
                </ul>
            </div>
        </section>
        <!-- tentang END -->

        <!-- PREVIEW -->

        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ( $preview as $preview )
                <div class="swiper-slide" >
                    <div class="preview-item2">
                        
                    <img  src="{{ asset('storage/'.$preview->image) }}">
                    <p class="hand-font">{{ $preview->tagline}}</p>
                </div>
            </div>
            @endforeach
               
                
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev preview"></div>
            <div class="swiper-button-next preview"></div>

            <!-- If we need scrollbar -->
            <!-- <div class="swiper-scrollbar"></div> -->
        </div>

<!-- PREVIEW END -->


<!-- TESTIMONI -->       

    <section id="testimoni">
        <h2 class="hand-font">Ulasan Dari Pelanggan</h2>

        <div class="testi-swiper">
            <div class="swiper-wrapper testimoni">

            <div class="swiper-slide testi-card">
                <img src="asset/bintang5.png" width="100">
                <h3>Direkomendasikan</h3>
                <p>Menulis jurnal membantuku memahami perasaan yang tadinya sulit dijelaskan.</p>
                <p class="nama">Robert Dalves</p>
            </div>

            <div class="swiper-slide testi-card">
                <img src="asset/bintang5.png" width="100">
                <h3>Direkomendasikan</h3>
                <p>Setelah menulis, pikiranku terasa lebih ringan dan lebih jujur pada diri sendiri.</p>
                <p class="nama">Robert Dalves</p>
            </div>

            <div class="swiper-slide testi-card">
                <img src="asset/bintang5.png" width="100">
                <h3>Direkomendasikan</h3>
                <p>Halaman ini jadi tempat aman untuk menumpahkan isi kepala tanpa takut dihakimi.</p>
                <p class="nama">Robert Dalves</p>
            </div>

            <div class="swiper-slide testi-card">
                <img src="asset/bintang5.png" width="100">
                <h3>Direkomendasikan</h3>
                <p>Aku tidak menemukan jawaban, tapi aku merasa lebih tenang.</p>
                <p class="nama">Robert Dalves</p>
            </div>

            <div class="swiper-slide testi-card">
                <img src="asset/bintang5.png" width="100">
                <h3>Direkomendasikan</h3>
                <p>Menulis hari ini membuatku sadar bahwa perasaanku valid.</p>
                <p class="nama">Robert Dalves</p>
            </div>
            
            </div>

            <!-- <panah  -->
            <div class=" swiper-button-prev testi"></div>
            <div class=" swiper-button-next testi"></div>

             <!-- indikator  -->
            <div class=" swiper-pagination"></div>
        </div>
    </section>

<!-- TESTIMONI END -->


<!-- sampel -->
        <section id="sampel">
            <div class="sampel-container">
                <div class="sampel-kiri">
                    <h3>Tulis Setiap Lembaran Hidup Anda</h3>
                    <img src="asset/book hover.png" width="300" height="400">
                </div>
                <div class="sampel-card">
                    <div>
                        <img class="butterfly" src="asset/1butterfly.png" width="100" height="100">
                    </div>
                    <div class="sampel-h2-p">
                        <h2>Sampel</h2>
                        <p>Isi Kolom Dibawah Untuk Mendapat Preview Gratis</p>
                    </div>
                    <div class="sampel-isi">
                        <label for="name">Nama:</label><br>
                        <input type="text" placeholder="Your Name">
                        <label for="email">Email:</label><br>
                        <input type="text" placeholder="@gmail.com">
                    </div>
                    <div class="but-sampel">
                        <button class="but-sampel">Dapatkan Sampel Gratis Sekarang</button>
                    </div>
                </div>

            </div>
        </section>
        <!-- sampel END -->
        <!-- cta -->
        <section>
            <div id="hubungi">
                <h2>Tulis Jurnal Anda</h2>
                <p>Jangan ragu untuk berdiskusi. Klik tombol di bawah untuk memulai
                    <br>percakapan dengan tim kami melalui WhatsApp.
                </p>
                <button class="but-hubungi"><img src="asset/whatsapp_icon.png" width="20" height="20"> Hubungi Kami </button>
            </div>
        </section>

        <!-- cta END -->
        <!-- footer -->
        <section id="foot">
            <hr>
            <div>
                <ul class="footer">
                    <li class="li-foot">
                        <h3>Metamorjiwa</h3>
                        <p>Menerbitkan Karya, Menginspirasi Dunia.</p>
                    </li>
                    <li class="li-foot">
                        <h3>Tautan Cepat</h3>
                        <p>Tentang Kami</p>
                        <p>Keunggulan</p>
                        <p>Layanan</p>
                        <p>Portofolio</p>
                    </li>
                    <li class="li-foot">
                        <h3>Ikuti Kami</h3>
                        <img src="asset/instagram.png" width="30" height="30">
                        <img src="asset/facebook.png" width="30" height="30">
                        <img src="asset/twitter.png" width="30" height="30">
                    </li>
                </ul>
            </div>
        </section>

    </div>

    <p class="akhir">© 2025 Penerbit Metamorjiwa. Didesain dengan ❤️ di Indonesia. Web Developed by Techade.id</p>
    <!-- footer END -->
    <!-- bawah -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script src="script.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 1000, /* Durasi animasi 1 detik biar smooth */
        once: true,     /* Animasi hanya jalan 1x saat pertama kali di-scroll */
        offset: 100     /* Jarak elemen dari bawah layar sebelum animasi mulai */
      });
    </script>
</body>

</html>