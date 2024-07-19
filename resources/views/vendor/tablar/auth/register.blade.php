<div id="full-page-loader" class="full-page-loader">
    <!-- Puedes ajustar la clase según la implementación de spinners de Tabler.io -->
    <div class="spinner"></div>
</div>
<div id="content">
    @extends('tablar::auth.layout')
    @section('title', 'Register')
    @section('content')
        <div class="container container-tight py-4">
            <div class="text-center mb-1 mt-5">
                <a href="https://desarrollalab.com/" class="navbar-brand navbar-brand-autodark">
                    <img src="{{asset(config('tablar.auth_logo.img.path','assets/logo.svg'))}}" height="120"
                         alt=""></a>
            </div>
            <form class="card card-md" action="{{route('register')}}" method="post" autocomplete="off" novalidate>
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Create account</h2>
                    <div class="mb-3">
                        <label class="form-label">Your name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email address">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="password" id="passwordField" class="form-control @error('password') is-invalid @enderror" placeholder=""
                                   autocomplete="off">
                            <span class="input-group-text">
                      <a href="#" id="showPassword" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12"
                                                                                                                cy="12"
                                                                                                                r="2"/><path
                                d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/></svg>
                      </a>
                    </span>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Re-enter password</label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder=""
                                   autocomplete="off">
                            <span class="input-group-text">
                      <a href="#" id="showConfirmPassword" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12"
                                                                                                                cy="12"
                                                                                                                r="2"/><path
                                d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/></svg>
                      </a>
                    </span>
                            @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Create new account</button>
                    </div>
                </div>
            </form>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const passwordField = document.getElementById('passwordField');
                const showPassword = document.getElementById('showPassword');

                showPassword.addEventListener('click', function () {
                    if (passwordField.type === 'password') {
                        passwordField.type = 'text';
                    } else {
                        passwordField.type = 'password';
                    }
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const confirmField = document.querySelector('input[name="password_confirmation"]');
                const showConfirmPassword = document.getElementById('showConfirmPassword');

                showConfirmPassword.addEventListener('click', function () {
                    if (confirmField.type === 'password') {
                        confirmField.type = 'text';
                    } else {
                        confirmField.type = 'password';
                    }
                });
            });
        </script>
    @endsection
</div>
<style>
    #full-page-loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgb(255, 255, 255);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000; /* Asegura que esté por encima de otros elementos */
}

/* Estilos del Spinner */
.spinner {
    border: 4px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    border-top: 4px solid #244062; /* Puedes ajustar el color según el esquema de colores de tu aplicación */
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
}

/* Animación del Spinner */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
<script>
    // Ocultar el Spinner cuando la página se carga completamente
    window.addEventListener('load', function () {
        document.getElementById('full-page-loader').style.display = 'none';
    });
</script>
