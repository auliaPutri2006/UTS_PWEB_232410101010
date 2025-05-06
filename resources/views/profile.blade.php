
@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h2 class="mb-4 text-center">Data Profil</h2>

    <div class="card shadow-lg p-4 bg-light rounded">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center mb-4">
                    <img src="assets/profil.svg" alt="Profile Picture" class="rounded-circle img-fluid" style="max-width: 150px;">
                    <h5 class="mt-2 text-success">🏡 Selamat Datang, {{ $username }} 🏡</h5>
                </div>
            </div>
            <div class="col-md-8">
                <h5 class="card-title text-success">Data Pengguna</h5>
                <form>
                    <div class="mb-3">
                        <label for="username" class="form-label"><strong>Username:</strong></label>
                        <input type="text" class="form-control" id="username" value="{{ $username }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"><strong>Password:</strong></label>
                        <input type="text" class="form-control" id="password" value="{{ $password }}" disabled>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
