@extends('frontend.layout')

@section('content')
    <!-- Register/Login Area Start -->
    <div class="register-area ptb-100"
        style="background: url('{{ asset('themes/TumbasStore/assets/img/bg/bg4.svg') }}') no-repeat center center/cover;">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Keterangan / Informasi Kiri -->
                <div class="col-lg-6 col-md-12 text-white text-left px-5">
                    <h1 class="mb-3 font-weight-bold">Masuk ke Akun Anda</h1>
                    <p>Selamat datang kembali! Silakan masuk untuk melanjutkan belanja atau mengakses fitur akun Anda.</p>
                    <p><b>Belum punya akun?</b> Klik <a href="{{ route('register') }}" class="text-warning">Daftar</a> untuk membuat akun baru dan nikmati pengalaman belanja yang lebih mudah dan cepat.</p>
                    <p class="mb-5"><b>Kesulitan masuk?</b> Klik <a href="{{ route('password.request') }}" class="text-warning">Lupa Kata Sandi</a> untuk bantuan lebih lanjut..</p>
                    <a href="#" class="btn btn-warning btn-lg rounded-pill d-inline-flex align-items-center justify-content-center">Learn More</a>
                </div>
                <!-- Form Login Kanan -->
                <div class="col-lg-4 col-md-6 col-sm-8 mx-auto">
                    <div class="login-form-container p-4 bg-light">
                        <h3 class="text-center mb-4 font-weight-bold">Login</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required
                                    placeholder="Enter your email">
                            </div>
                            <div class="form-group position-relative">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Enter your password">
                                <i id="togglePassword" class="fa fa-eye position-absolute toggle-icon"></i>
                            </div>
                            <div class="form-group d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember">Remember Me</label>
                                </div>
                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                            <div class="button-container">
                                <div class="button-box">
                                    <button type="submit" class="default-btn">Masuk</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register/Login Area End -->
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const togglePassword = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("password");

        togglePassword.addEventListener("click", function() {
            // Ubah tipe input
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);

            // Ubah ikon
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    });
</script>
