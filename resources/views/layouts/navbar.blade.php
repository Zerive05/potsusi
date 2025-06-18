<nav class="dashboard-navbar">
    <div class="navbar-brand">
        <a href="#" id="websiteLogo">Logo Web</a>
    </div>
    <div class="navbar-center-menu">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="">Pesan Kamar</a></li> {{-- Pastikan link ini sudah benar --}}
        </ul>
    </div>
    <div class="profile-dropdown">
        <i class="fas fa-user-circle profile-icon" id="profileIcon"></i>
        <div class="dropdown-menu">
            <span class="profile-name">{{ $user->name }}</span>
            <a href="#">Profil</a>
            <a href="#">Pengaturan</a>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="logout-button">Keluar</button>
            </form>
        </div>
    </div>
</nav>