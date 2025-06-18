// resources/js/app.js (atau public/js/script.js jika Anda tidak menggunakan Vite)

document.addEventListener('DOMContentLoaded', function () {

    // =====================================
    // 1. Fungsionalitas Navbar Sembunyi/Tampil
    // =====================================
    let lastScrollTop = 0; // Menyimpan posisi scroll terakhir
    const navbar = document.querySelector('.navbar'); // Memilih elemen navbar

    // Menambahkan event listener untuk event 'scroll' pada jendela
    window.addEventListener('scroll', function () {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop; // Mendapatkan posisi scroll saat ini

        // Logika untuk menyembunyikan navbar saat scroll ke bawah dan menampilkannya saat scroll ke atas
        // Navbar disembunyikan hanya jika scroll ke bawah melewati tinggi navbar
        if (scrollTop > lastScrollTop && scrollTop > navbar.offsetHeight) {
            navbar.classList.add('navbar-hidden'); // Tambahkan kelas untuk menyembunyikan navbar
        } else {
            navbar.classList.remove('navbar-hidden'); // Hapus kelas untuk menampilkan navbar
        }
        lastScrollTop = scrollTop; // Perbarui posisi scroll terakhir
    });


    // =====================================
    // 2. Fungsionalitas Carousel (Slider Gambar)
    // =====================================
    const slides = document.querySelectorAll('.carousel-slide'); // Semua elemen slide
    const indicators = document.querySelectorAll('.indicator-item'); // Semua indikator (bar progress)
    const descriptions = document.querySelectorAll('.description-item'); // Semua deskripsi di bawah
    let currentSlide = 0; // Indeks slide yang sedang aktif
    let slideInterval; // Variabel untuk menyimpan interval otomatis
    const slideDuration = 5000; // Durasi setiap slide (5 detik)

    // Fungsi untuk menampilkan slide tertentu berdasarkan indeks
    function showSlide(index) {
        // Hapus kelas 'active' dari semua slide, indikator, dan deskripsi
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            indicators[i].classList.remove('active');
            descriptions[i].classList.remove('active');

            // Reset animasi progress bar untuk indikator yang tidak aktif
            const progressBar = indicators[i].querySelector('.static-progress-bar');
            if (progressBar) {
                progressBar.style.animation = 'none'; // Hentikan animasi
                progressBar.offsetHeight; // Memaksa reflow agar animasi di-reset
                progressBar.style.animation = null; // Izinkan animasi berjalan kembali jika aktif
            }
        });

        // Tambahkan kelas 'active' ke slide, indikator, dan deskripsi yang sesuai
        slides[index].classList.add('active');
        indicators[index].classList.add('active');
        descriptions[index].classList.add('active');
    }

    // Fungsi untuk menampilkan slide berikutnya
    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length; // Hitung indeks slide berikutnya (looping)
        showSlide(currentSlide); // Tampilkan slide berikutnya
        resetInterval(); // Reset interval agar durasi penuh untuk slide baru
    }

    // Fungsi untuk mereset (memulai ulang) interval otomatis
    function resetInterval() {
        clearInterval(slideInterval); // Hentikan interval yang sedang berjalan
        slideInterval = setInterval(nextSlide, slideDuration); // Mulai interval baru
    }

    // Menambahkan event listener untuk klik pada indikator
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            currentSlide = index; // Atur slide saat ini ke indeks yang diklik
            showSlide(currentSlide); // Tampilkan slide tersebut
            resetInterval(); // Reset interval
        });
    });

    // Menambahkan event listener untuk klik pada deskripsi
    descriptions.forEach((description, index) => {
        description.addEventListener('click', () => {
            currentSlide = index; // Atur slide saat ini ke indeks yang diklik
            showSlide(currentSlide); // Tampilkan slide tersebut
            resetInterval(); // Reset interval
        });
    });

    showSlide(currentSlide); // Tampilkan slide pertama saat halaman dimuat
    resetInterval(); // Mulai carousel otomatis


    // =====================================
    // 3. Fungsionalitas Modal (Login/Register)
    // =====================================
    const loginRegisterModal = document.getElementById('loginRegisterModal'); // Elemen modal utama
    const btnMasuk = document.querySelector('.btn-masuk'); // Tombol "Masuk" di navbar
    const btnDaftar = document.querySelector('.btn-daftar'); // Tombol "Daftar" di navbar
    const closeButton = document.querySelector('.close-button'); // Tombol close modal
    const loginForm = document.getElementById('loginForm'); // Container form login
    const registerForm = document.getElementById('registerForm'); // Container form register
    const showRegisterLink = document.getElementById('showRegister'); // Link "Daftar sekarang" di modal login
    const showLoginLink = document.getElementById('showLogin'); // Link "Masuk" di modal register

    // Fungsi untuk membuka modal dan menampilkan form yang spesifik
    function openModal(formToShow) {
        loginRegisterModal.classList.add('active'); // Tambahkan kelas 'active' untuk menampilkan modal (display: flex)
        if (formToShow === 'login') {
            loginForm.classList.add('active'); // Tampilkan form login
            registerForm.classList.remove('active'); // Sembunyikan form register
        } else if (formToShow === 'register') {
            registerForm.classList.add('active'); // Tampilkan form register
            loginForm.classList.remove('active'); // Sembunyikan form login
        }
    }

    // Fungsi untuk menutup modal
    function closeModal() {
        loginRegisterModal.classList.remove('active'); // Hapus kelas 'active' untuk menyembunyikan modal
        // Opsional: Hapus juga pesan error/sukses saat modal ditutup
        const allMessages = document.querySelectorAll('.form-message');
        allMessages.forEach(msg => msg.remove());
    }

    // Event listener untuk tombol "Masuk" di navbar
    btnMasuk.addEventListener('click', function (e) {
        e.preventDefault(); // Mencegah perilaku default link
        openModal('login'); // Buka modal dengan form login aktif
    });

    // Event listener untuk tombol "Daftar" di navbar
    btnDaftar.addEventListener('click', function (e) {
        e.preventDefault(); // Mencegah perilaku default link
        openModal('register'); // Buka modal dengan form register aktif
    });

    // Event listener untuk tombol close modal
    closeButton.addEventListener('click', closeModal);

    // Event listener untuk menutup modal saat mengklik di luar konten modal
    window.addEventListener('click', function (event) {
        if (event.target == loginRegisterModal) {
            closeModal();
        }
    });

    // Event listener untuk link "Daftar sekarang" di dalam modal login
    showRegisterLink.addEventListener('click', function (e) {
        e.preventDefault();
        loginForm.classList.remove('active'); // Sembunyikan form login
        registerForm.classList.add('active'); // Tampilkan form register
        // Opsional: Hapus pesan error/sukses saat beralih form
        const allMessages = document.querySelectorAll('.form-message');
        allMessages.forEach(msg => msg.remove());
    });

    // Event listener untuk link "Masuk" di dalam modal register
    showLoginLink.addEventListener('click', function (e) {
        e.preventDefault();
        registerForm.classList.remove('active'); // Sembunyikan form register
        loginForm.classList.add('active'); // Tampilkan form login
        // Opsional: Hapus pesan error/sukses saat beralih form
        const allMessages = document.querySelectorAll('.form-message');
        allMessages.forEach(msg => msg.remove());
    });

    // Fungsionalitas toggle visibility password
    document.querySelectorAll('.toggle-password').forEach(toggle => {
        toggle.addEventListener('click', function () {
            const targetId = this.dataset.target; // Ambil ID input dari data-target
            const passwordInput = document.getElementById(targetId); // Dapatkan elemen input
            const icon = this.querySelector('i'); // Dapatkan elemen ikon (mata)

            // Ganti tipe input dan ikon berdasarkan status saat ini
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });
    });


    // =====================================
    // 4. Integrasi Login dan Register dengan Backend Laravel (AJAX)
    // =====================================

    const loginFormElement = document.querySelector('#loginForm form'); // Form login sebenarnya
    const registerFormElement = document.querySelector('#registerForm form'); // Form register sebenarnya

    // Fungsi helper untuk menampilkan pesan (error/sukses) di atas form
    function displayMessage(form, message, type = 'error') {
        let messageDiv = form.querySelector('.form-message'); // Coba cari div pesan yang sudah ada
        if (!messageDiv) {
            // Jika belum ada, buat elemen div baru
            messageDiv = document.createElement('div');
            messageDiv.classList.add('form-message');
            form.prepend(messageDiv); // Masukkan di awal form
        }
        messageDiv.textContent = message; // Atur teks pesan
        messageDiv.style.color = (type === 'error') ? 'red' : 'green'; // Atur warna berdasarkan tipe pesan
        messageDiv.style.marginBottom = '15px'; // Tambahkan margin bawah
        messageDiv.style.textAlign = 'center'; // Pusatkan teks
    }

    // Fungsi helper untuk mendapatkan CSRF token dari meta tag
    function getCsrfToken() {
        // Pastikan Anda telah menambahkan <meta name="csrf-token" content="{{ csrf_token() }}"> di <head> HTML Anda
        const csrfMeta = document.querySelector('meta[name="csrf-token"]');
        return csrfMeta ? csrfMeta.getAttribute('content') : '';
    }

    // Event listener untuk pengiriman form Login
    loginFormElement.addEventListener('submit', async function (e) {
        e.preventDefault(); // Mencegah pengiriman form default browser

        // Hapus pesan sebelumnya jika ada
        const existingMessage = this.querySelector('.form-message');
        if (existingMessage) existingMessage.remove();

        // Ambil nilai input
        const email = document.getElementById('loginEmail').value;
        const password = document.getElementById('loginPassword').value;

        try {
            // Kirim permintaan POST ke endpoint '/login' Laravel
            const response = await fetch('/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json', // Beri tahu server bahwa body adalah JSON
                    'Accept': 'application/json', // Beri tahu server kita mengharapkan JSON sebagai respons
                    'X-CSRF-TOKEN': getCsrfToken() // Sertakan CSRF token untuk keamanan Laravel
                },
                body: JSON.stringify({ email, password }) // Ubah data menjadi string JSON
            });

            const data = await response.json(); // Parse respons JSON dari server

            if (response.ok) { // Jika respons HTTP status 2xx (sukses)
                displayMessage(loginFormElement, data.message, 'success'); // Tampilkan pesan sukses
                // Redirect user jika ada URL redirect dari backend
                if (data.redirect) {
                    window.location.href = data.redirect;
                }
                closeModal(); // Tutup modal setelah login berhasil (opsional, bisa diganti redirect)
            } else { // Jika respons HTTP status 4xx atau 5xx (error)
                if (response.status === 422 && data.errors) {
                    // Penanganan error validasi dari Laravel (status 422)
                    let errorMessage = '';
                    for (const key in data.errors) {
                        errorMessage += data.errors[key].join(', ') + '\n'; // Gabungkan semua pesan error validasi
                    }
                    displayMessage(loginFormElement, errorMessage);
                } else {
                    // Penanganan error lainnya (misal: otentikasi gagal, error server 500)
                    displayMessage(loginFormElement, data.message || 'Terjadi kesalahan saat login.');
                }
            }
        } catch (error) {
            console.error('Error saat login:', error);
            displayMessage(loginFormElement, 'Terjadi kesalahan jaringan atau server.');
        }
    });

    // Event listener untuk pengiriman form Register
    registerFormElement.addEventListener('submit', async function (e) {
        e.preventDefault(); // Mencegah pengiriman form default browser

        // Hapus pesan sebelumnya jika ada
        const existingMessage = this.querySelector('.form-message');
        if (existingMessage) existingMessage.remove();

        // Ambil nilai input
        const name = document.getElementById('registerName').value;
        const email = document.getElementById('registerEmail').value;
        const password = document.getElementById('registerPassword').value;
        const passwordConfirmation = document.getElementById('confirmPassword').value; // Input konfirmasi password

        try {
            // Kirim permintaan POST ke endpoint '/register' Laravel
            const response = await fetch('/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': getCsrfToken()
                },
                body: JSON.stringify({
                    name,
                    email,
                    password,
                    password_confirmation: passwordConfirmation // Sesuaikan dengan nama field di validasi Laravel
                })
            });

            const data = await response.json(); // Parse respons JSON dari server

            if (response.ok) { // Jika respons HTTP status 2xx (sukses)
                displayMessage(registerFormElement, data.message, 'success'); // Tampilkan pesan sukses
                // Redirect user jika ada URL redirect dari backend
                if (data.redirect) {
                    window.location.href = data.redirect;
                }
                closeModal(); // Tutup modal setelah register berhasil (opsional, bisa diganti redirect)
            } else { // Jika respons HTTP status 4xx atau 5xx (error)
                if (response.status === 422 && data.errors) {
                    // Penanganan error validasi dari Laravel (status 422)
                    let errorMessage = '';
                    for (const key in data.errors) {
                        errorMessage += data.errors[key].join(', ') + '\n';
                    }
                    displayMessage(registerFormElement, errorMessage);
                } else {
                    // Penanganan error lainnya
                    displayMessage(registerFormElement, data.message || 'Terjadi kesalahan saat pendaftaran.');
                }
            }
        } catch (error) {
            console.error('Error saat pendaftaran:', error);
            displayMessage(registerFormElement, 'Terjadi kesalahan jaringan atau server.');
        }
    });

    // =====================================
    // Opsional: Fungsionalitas Logout (jika diperlukan di frontend)
    // =====================================
    // Anda bisa menambahkan tombol logout di navbar atau di tempat lain.
    // Contoh penambahan event listener untuk tombol logout (asumsi ada elemen dengan ID 'logoutButton')
    // const logoutButton = document.getElementById('logoutButton');
    // if (logoutButton) {
    //     logoutButton.addEventListener('click', async function(e) {
    //         e.preventDefault();

    //         try {
    //             const response = await fetch('/logout', { // Sesuaikan dengan route name di web.php
    //                 method: 'POST',
    //                 headers: {
    //                     'Content-Type': 'application/json',
    //                     'Accept': 'application/json',
    //                     'X-CSRF-TOKEN': getCsrfToken()
    //                 },
    //             });

    //             const data = await response.json();

    //             if (response.ok) {
    //                 alert(data.message); // Atau tampilkan notifikasi yang lebih baik
    //                 window.location.href = '/'; // Redirect ke halaman utama setelah logout
    //             } else {
    //                 alert(data.message || 'Terjadi kesalahan saat logout.');
    //             }
    //         } catch (error) {
    //             console.error('Error logout:', error);
    //             alert('Terjadi kesalahan jaringan atau server saat logout.');
    //         }
    //     });
    // }

});