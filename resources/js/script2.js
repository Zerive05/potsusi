document.addEventListener('DOMContentLoaded', function () {
    // Fungsionalitas Dropdown Profil
    const profileDropdown = document.querySelector('.profile-dropdown');
    const profileIcon = document.querySelector('.profileicon');

    profileDropdown.addEventListener('click', function (event) {
        // Hentikan propagasi event agar tidak langsung ditangkap oleh window click
        event.stopPropagation();
        profileDropdown.classList.toggle('active');
        profileIcon.classList.toggle('active');
    });

    window.addEventListener('click', function (e) {
        if (!profileDropdown.contains(e.target)) {
            profileDropdown.classList.remove('active');
            profileIcon.classList.remove('active');
        }
    });

    // Fungsionalitas Scroll ke Atas untuk Logo Website
    const websiteLogo = document.getElementById('websiteLogo'); // Ambil elemen logo

    if (websiteLogo) { // Pastikan elemen ditemukan
        websiteLogo.addEventListener('click', function (e) {
            e.preventDefault(); // Mencegah perilaku default link (tidak me-refresh halaman)

            // Scroll ke bagian atas halaman dengan perilaku smooth
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }



    //show.blade.php

    // // Atur tanggal minimal untuk check-in menjadi hari ini
    // const today = new Date();
    // let month = today.getMonth() + 1;
    // let day = today.getDate();
    // const year = today.getFullYear();

    // if (month < 10) month = '0' + month;
    // if (day < 10) day = '0' + day;

    // const minDate = year + '-' + month + '-' + day;
    // document.getElementById('check_in_date').setAttribute('min', minDate);
    // document.getElementById('check_out_date').setAttribute('min', minDate); // Juga atur min untuk checkout

    // // Pastikan check-out tidak kurang dari check-in
    // document.getElementById('check_in_date').addEventListener('change', function () {
    //     document.getElementById('check_out_date').setAttribute('min', this.value);
    //     if (this.value > document.getElementById('check_out_date').value) {
    //         document.getElementById('check_out_date').value = this.value;
    //     }
    // });
});