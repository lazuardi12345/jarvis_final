<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="/assets/css/main/app.css">
    <link rel="stylesheet" href="/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src="/assets/images/logo/logo.svg" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Sign Up</h1>
            <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

            <form action="{{ route('register-proses') }}" method="POST" >
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" name="name" class="form-control form-control-xl" placeholder="Username" value="{{ old('name')}}">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                @error('name')
                <small>{{ $message }}</small>
            @enderror
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" name="email" class="form-control form-control-xl" placeholder="Email" value="{{ old('email')}}">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                @error('email')
                <small>{{ $message }}</small>
            @enderror
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                @error('password')
                <small>{{ $message }}</small>
            @enderror
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Already have an account? <a href="{{ route('login')}}" class="font-bold">Log
                        in</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('success'))
    <script>
        Swal.fire('{{ $message }}')
    </script>
    @endif

    @if ($message = Session::get('failed'))
    <script>
        Swal.fire('{{ $message }}')
    </script>
    @endif
</body>

</html>
