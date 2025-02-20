<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100" style="background-color: lightblue;">
    
    <div class="text-center">
        <h1 class="mb-4">Welcome to your dashboard</h1>
        
        <div class="d-flex justify-content-center gap-4 mt-3">

        <a href="{{ route('users.index') }}" class="btn btn-primary me-3px-4 py-2">User Management</a>



        <!-- Logout Form -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf  <!-- CSRF token for security -->
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>
</body>
</html>
