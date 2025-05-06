<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .blur-background { backdrop-filter: blur(10px);-webkit-backdrop-filter: blur(10px);}
    </style>
</head>
<body class="bg-success d-flex align-items-center justify-content-center vh-100">

    <div class="card shadow-lg border-0 rounded-4 p-4 bg-white bg-opacity-75 blur-background" style="max-width: 420px; width: 100%;">
        <div class="card-body">
            <h4 class="text-center mb-4 text-success fw-bold">🏡 Silakan Login Kawan! 🏡</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Masuk</button>
            </form>
        </div>
    </div>

</body>
</html>
