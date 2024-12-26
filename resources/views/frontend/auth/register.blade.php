@extends('frontend.layout')

@section('content')
    <!-- Register Area Start -->
    <div class="register-area ptb-100"
        style="background: url('{{ asset('themes/TumbasStore/assets/img/bg/bg4.svg') }}') no-repeat center center/cover;">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Keterangan Kiri -->
                <div class="col-lg-6 col-md-12 text-white text-left px-5">
                    <h1 class="mb-3 font-weight-bold">Daftar Akun Baru</h1>
                    <p><b>Sudah punya akun?</b> Silakan <a href="{{ route('login') }}" class="text-warning">Masuk</a></p>
                    <p class="mb-5">Belum memiliki akun? Buat akun baru sekarang untuk menikmati pengalaman berbelanja yang lebih mudah, cepat, dan aman.</p>
                    <a href="#" class="btn btn-warning btn-lg rounded-pill d-inline-flex align-items-center justify-content-center">Learn More</a>
                </div>

                <!-- Form Register Kanan -->
                <div class="col-lg-4 col-md-6 col-sm-8 mx-auto">
                    <div class="login-form-container p-4 bg-light">
                        <h3 class="text-center mb-4 font-weight-bold">Register</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- First Name -->
                            <div class="form-group">
                                <label for="first_name">Nama Depan</label>
                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    value="{{ old('first_name') }}" required placeholder="First Name">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div class="form-group">
                                <label for="last_name">Nama Belakang</label>
                                <input id="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    value="{{ old('last_name') }}" required placeholder="Last Name">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group position-relative">
                                <label for="password">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <i id="togglePassword" class="fa fa-eye position-absolute toggle-icon"></i>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group position-relative">
                                <label for="password-confirm">Confirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required placeholder="Confirm Password">
                                <i id="toggleConfirmPassword" class="fa fa-eye position-absolute toggle-icon"></i>
                            </div>

                            <!-- Submit Button -->
                            <div class="button-container">
                                <div class="button-box">
                                    <button type="submit" class="default-btn">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Area End -->
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const togglePassword = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("password");

        togglePassword.addEventListener("click", function() {
            // Ubah tipe input password
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);

            // Ubah ikon
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });

        // Menambahkan toggle untuk konfirmasi password
        const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
        const confirmPasswordInput = document.getElementById("password-confirm");

        toggleConfirmPassword.addEventListener("click", function() {
            // Ubah tipe input konfirmasi password
            const type = confirmPasswordInput.getAttribute("type") === "password" ? "text" : "password";
            confirmPasswordInput.setAttribute("type", type);

            // Ubah ikon
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    });
</script>
