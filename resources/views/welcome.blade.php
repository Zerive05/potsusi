<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite('resources/css/style.css')
    <title>Nama Website Anda - Pemesanan Hotel Terbaik</title>
</head>

<body>

    <nav class="navbar">
        <div class="navbar-brand">
            <a href="#">Logo Web</a>
        </div>
        <div class="navbar-center-menu">
            <ul>
                <li><a href="#about-us">Tentang Kami</a></li>
                <li><a href="#features-section">Fitur Kami</a></li>
                <li><a href="#featured-hotels-section">Hotel Pilihan</a></li>
                <li><a href="#team-section">Tim Kami</a></li>
            </ul>
        </div>
        <div class="navbar-links">
            <a href="#" class="btn-masuk">Masuk</a>
            <a href="#" class="btn-daftar">Daftar</a>
        </div>
    </nav>

    <section class="carousel-container">
        <div class="carousel-slides">
            <div class="carousel-slide active">
                <div class="slide-overlay"></div>
                <div class="slide-main-content">
                    <div class="slide-text-section">
                        <p class="slide-category-full">ARTIFICIAL INTELLIGENCE</p>
                        <h2 class="slide-title-full">Temukan pengalaman menginap mewah dengan fasilitas lengkap dan
                            teknologi AI terkini. Nikmati kenyamanan superior, layanan personal, dan fitur cerdas untuk
                            liburan yang tak terlupakan.</h2>
                        <p class="slide-description-full">Kami menawarkan berbagai pilihan kamar dan suite yang didesain
                            modern, dilengkapi dengan asisten AI, pencahayaan otomatis, dan kontrol suhu adaptif. Setiap
                            detail dirancang untuk memenuhi kebutuhan Anda, dari kolam renang infinity hingga restoran
                            bintang Michelin.</p>
                        <a href="#" class="btn-primary-slide">Pelajari Lebih Lanjut</a>
                    </div>
                    <div class="slide-image-section">
                        <img src="images/hotel1.jpeg" alt="Hotel Mewah">
                    </div>
                </div>
            </div>

            <div class="carousel-slide">
                <div class="slide-overlay"></div>

                <div class="slide-main-content">
                    <div class="slide-text-section">
                        <p class="slide-category-full">HOTEL KELUARGA</p>
                        <h2 class="slide-title-full">Liburan keluarga impian dengan pilihan hotel ramah anak di berbagai
                            destinasi.</h2>
                        <p class="slide-description-full">Nikmati fasilitas lengkap seperti water park, kids club, dan
                            program aktivitas seru untuk semua usia. Kami memastikan setiap anggota keluarga mendapatkan
                            pengalaman liburan yang menyenangkan dan aman.</p>
                        <a href="#" class="btn-primary-slide">Lihat Penawaran</a>
                    </div>
                    <div class="slide-image-section">
                        <img src="images/hotel2.jpeg" alt="Hotel Keluarga">
                    </div>
                </div>
            </div>

            <div class="carousel-slide">
                <div class="slide-overlay"></div>

                <div class="slide-main-content">
                    <div class="slide-text-section">
                        <p class="slide-category-full">AKOMODASI BISNIS</p>
                        <h2 class="slide-title-full">Akomodasi nyaman dan strategis untuk perjalanan bisnis Anda,
                            dilengkapi fasilitas modern.</h2>
                        <p class="slide-description-full">Temukan ruang rapat profesional, koneksi internet berkecepatan
                            tinggi, dan akses mudah ke pusat kota. Kami mendukung produktivitas Anda dengan lingkungan
                            yang kondusif dan layanan efisien.</p>
                        <a href="#" class="btn-primary-slide">Pesan Sekarang</a>
                    </div>
                    <div class="slide-image-section">
                        <img src="images/hotel3.jpeg" alt="Hotel Bisnis">
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-indicators-and-descriptions">
            <div class="indicator-row">
                <div class="indicator-item active" data-slide="0">
                    <div class="static-progress-bar"></div>
                </div>
                <div class="indicator-item" data-slide="1">
                    <div class="static-progress-bar"></div>
                </div>
                <div class="indicator-item" data-slide="2">
                    <div class="static-progress-bar"></div>
                </div>
            </div>
            <div class="descriptions-row">
                <div class="description-item active" data-slide="0">
                    <p class="slide-category">ARTIFICIAL INTELLIGENCE</p>
                    <p class="slide-title">Temukan pengalaman menginap mewah dengan fasilitas lengkap.</p>
                </div>
                <div class="description-item" data-slide="1">
                    <p class="slide-category">HOTEL KELUARGA</p>
                    <p class="slide-title">Liburan keluarga impian dengan pilihan hotel ramah anak.</p>
                </div>
                <div class="description-item" data-slide="2">
                    <p class="slide-category">AKOMODASI BISNIS</p>
                    <p class="slide-title">Akomodasi nyaman untuk perjalanan bisnis Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="parallax-content-wrapper">
        <section class="short-description" id="about-us">
            <div class="short-description-image">
                <img src="images/orang pesen hotel.png" alt="Seseorang memesan hotel">
            </div>
            <div class="short-description-content">
                <h2>Pesan Hotel Impian Anda dengan Mudah!</h2>
                <p>Website kami hadir untuk membantu Anda menemukan dan memesan akomodasi terbaik dari ribuan pilihan
                    hotel
                    di
                    seluruh dunia. Dapatkan pengalaman menginap tak terlupakan dengan harga terbaik, penawaran
                    eksklusif,
                    dan
                    proses pemesanan yang cepat dan aman.</p>
            </div>
        </section>

        <section class="features" id="features-section">
            <h2>Mengapa Memilih Kami?</h2>
            <div class="feature-grid">
                <div class="feature-item">
                    <div class="feature-icon">✨</div>
                    <h3>Pilihan Hotel Beragam</h3>
                    <p>Jelajahi ribuan hotel, mulai dari penginapan bintang lima hingga hostel nyaman, sesuai dengan
                        kebutuhan dan anggaran Anda.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">💰</div>
                    <h3>Harga Terbaik & Promo Menarik</h3>
                    <p>Dapatkan penawaran eksklusif dan diskon spesial untuk setiap pemesanan. Bandingkan harga dengan
                        mudah
                        untuk menemukan deal terbaik.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🔒</div>
                    <h3>Proses Pemesanan Mudah & Aman</h3>
                    <p>Pesan hotel hanya dengan beberapa klik. Sistem pembayaran kami terintegrasi dan aman, memberikan
                        ketenangan pikiran.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">⭐</div>
                    <h3>Ulasan Jujur & Terpercaya</h3>
                    <p>Baca ulasan dari tamu sebelumnya untuk membantu Anda membuat keputusan yang tepat.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">📞</div>
                    <h3>Dukungan Pelanggan 24/7</h3>
                    <p>Tim dukungan kami siap membantu Anda kapan saja, memastikan pengalaman pemesanan yang lancar.</p>
                </div>
            </div>
        </section>

        <section class="featured-hotels" id="featured-hotels-section">
            <h2>Contoh Hotel Pilihan</h2>
            <div class="hotel-grid">
                <div class="hotel-card">
                    <img src="images/Hotel Indah Jaya.png" alt="Hotel Indah Jaya">
                    <h3>Hotel Indah Jaya</h3>
                    <p>Jakarta, Indonesia</p>
                    <span>Mulai dari Rp 500.000/malam</span>
                    <a href="#" class="btn-lihat-detail">Lihat Detail</a>
                </div>
                <div class="hotel-card">
                    <img src="images/Resort Damai Sentosa.png" alt="Resort Damai Sentosa">
                    <h3>Resort Damai Sentosa</h3>
                    <p>Bali, Indonesia</p>
                    <span>Mulai dari Rp 1.200.000/malam</span>
                    <a href="#" class="btn-lihat-detail">Lihat Detail</a>
                </div>
                <div class="hotel-card">
                    <img src="images/Grand City Hotel.png" alt="Grand City Hotel">
                    <h3>Grand City Hotel</h3>
                    <p>Surabaya, Indonesia</p>
                    <span>Mulai dari Rp 750.000/malam</span>
                    <a href="#" class="btn-lihat-detail">Lihat Detail</a>
                </div>
            </div>
        </section>

        <section class="team" id="team-section">
            <h2>Tim Pengembang Kami</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="images/bagus.JPG" alt="Nama Developer 1">
                    <h3>[Nama Developer 1]</h3>
                    <p>Peran: Lead Developer</p>
                </div>
                <div class="team-member">
                    <img src="images/ariza.JPG" alt="Nama Developer 2">
                    <h3>[Nama Developer 2]</h3>
                    <p>Peran: UI/UX Designer</p>
                </div>
                <div class="team-member">
                    <img src="images/yusro.jpg" alt="Nama Developer 3">
                    <h3>[Nama Developer 3]</h3>
                    <p>Peran: Backend Engineer</p>
                </div>
            </div>
        </section>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section company-info">
                <h4>Company Information</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Company Overview</a></li>
                    <li><a href="#">Investors</a></li>
                    <li><a href="#">Venture Capital (NVentures)</a></li>
                    <li><a href="#">NVIDIA Foundation</a></li>
                    <li><a href="#">Research</a></li>
                    <li><a href="#">Corporate Sustainability</a></li>
                    <li><a href="#">Technologies</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>
            <div class="footer-section news-events">
                <h4>News and Events</h4>
                <ul>
                    <li><a href="#">Newsroom</a></li>
                    <li><a href="#">Company Blog</a></li>
                    <li><a href="#">Technical Blog</a></li>
                    <li><a href="#">Webinars</a></li>
                    <li><a href="#">Stay Informed</a></li>
                    <li><a href="#">Events Calendar</a></li>
                    <li><a href="#">GTC AI Conference</a></li>
                    <li><a href="#">NVIDIA On-Demand</a></li>
                </ul>
            </div>
            <div class="footer-section popular-links">
                <h4>Popular Links</h4>
                <ul>
                    <li><a href="#">Developers</a></li>
                    <li><a href="#">Partners</a></li>
                    <li><a href="#">Executive Insights</a></li>
                    <li><a href="#">Startups and VCs</a></li>
                    <li><a href="#">NVIDIA Connect for ISVs</a></li>
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">Technical Training</a></li>
                    <li><a href="#">Training for IT Professionals</a></li>
                    <li><a href="#">Professional Services for Data Science</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-cta-social">
            <div class="newsletter-signup">
                <div class="icon-email">✉️</div> <span>Sign Up for Nama Website Anda News</span>
                <input type="email" placeholder="Enter your email" class="newsletter-input">
                <button class="newsletter-btn">Subscribe</button>
            </div>
            <div class="social-media">
                <span>Follow Nama Website Anda</span>
                <div class="social-icons">
                    <a href="#" class="social-icon">F</a> <a href="#" class="social-icon">L</a> <a href="#"
                        class="social-icon">I</a> <a href="#" class="social-icon">X</a> <a href="#"
                        class="social-icon">Y</a>
                </div>
            </div>
        </div>

        <div class="footer-copyright-links">
            <div class="footer-logo">Logo Web</div>
            <div class="legal-links">
                <a href="#">Privacy Policy</a> |
                <a href="#">Manage My Privacy</a> |
                <a href="#">Do Not Sell or Share My Data</a> |
                <a href="#">Terms of Service</a> |
                <a href="#">Accessibility</a> |
                <a href="#">Corporate Policies</a> |
                <a href="#">Product Security</a> |
                <a href="#">Contact</a>
            </div>
            <p>&copy; 2025 Nama Website Anda Corporation. All Rights Reserved.</p>
        </div>
    </footer>

    <div class="modal" id="loginRegisterModal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <div class="modal-body">
                <div class="form-container active" id="loginForm">
                    <h2>Masuk</h2>
                    <form method="POST" action="{{ route('login.post') }}">
                        <div class="form-group">
                            <label for="loginEmail">Email</label>
                            <input type="email" id="loginEmail" name="email" placeholder="Masukkan email Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Kata Sandi</label>
                            <div class="password-input-wrapper">
                                <input type="password" id="loginPassword" name="password" placeholder="Masukkan kata sandi Anda"
                                    required>
                                <span class="toggle-password" data-target="loginPassword">
                                    <i class="fas fa-eye-slash"></i> </span>
                            </div>
                        </div>
                        <button type="submit" class="btn-primary">Masuk</button>
                    </form>
                    <p>Belum punya akun? <a href="#" id="showRegister">Daftar di sini</a></p>
                </div>

                <div class="form-container" id="registerForm">
                    <h2>Daftar</h2>
                    <form method="POST" action="{{ route('register.post') }}">
                        <div class="form-group">
                            <label for="registerName">Nama Lengkap</label>
                            <input type="text" id="registerName" name="name" placeholder="Masukkan nama lengkap Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="registerEmail">Email</label>
                            <input type="email" id="registerEmail" name="email" placeholder="Masukkan email Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="registerPassword">Kata Sandi</label>
                            <div class="password-input-wrapper">
                                <input type="password" id="registerPassword" name="password" placeholder="Buat kata sandi baru"
                                    required>
                                <span class="toggle-password" data-target="registerPassword">
                                    <i class="fas fa-eye-slash"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Konfirmasi Kata Sandi</label>
                            <div class="password-input-wrapper">
                                <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Konfirmasi kata sandi"
                                    required>
                                <span class="toggle-password" data-target="confirmPassword">
                                    <i class="fas fa-eye-slash"></i>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn-primary">Daftar</button>
                    </form>
                    <p>Sudah punya akun? <a href="#" id="showLogin">Masuk di sini</a></p>
                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/script.js')
</body>

</html>