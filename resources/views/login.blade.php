<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            width: 400px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            background: white;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .register-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="card">
        <h3 class="text-center mb-4">Login</h3>

        @if(session('success'))
            <script>
                Swal.fire({
                    title: "Success!",
                    text: "{{ session('success') }}",
                    icon: "success"
                });
            </script>
        @endif

        @if(session('error'))
            <script>
                Swal.fire({
                    title: "Error!",
                    text: "{{ session('error') }}",
                    icon: "error"
                });
            </script>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <!-- Email Input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                       placeholder="Enter your email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
             <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
          @error('password')
                <span class="text-danger">{{ $message }}</span>
          @enderror
            </div>


            <!-- Login Button -->
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <!-- Register Link -->
        <a href="{{ route('register') }}" class="register-link">Don't have an account? Register</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
