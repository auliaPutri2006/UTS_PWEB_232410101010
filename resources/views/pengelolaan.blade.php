@extends('layouts.app')

@section('content')
<div class="container py-4">
    @include('components.greeting', ['username' => $username])
    <div class="row g-4" id="property-list">
        @foreach ($daftarProperti as $index => $properti)
        <div class="col-md-6 col-lg-4 property-card" data-index="{{ $index }}">
            <div class="card bg-success-subtle border-success shadow-sm h-100 position-relative">
                <input type="checkbox" class="form-check-input position-absolute top-0 end-0 m-2 delete-checkbox d-none" style="transform: scale(1.3); z-index: 10;">

                <img src="{{ asset($properti['foto']) }}" class="card-img-top rounded-top" alt="{{ $properti['nama'] }}" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-success fw-bold">{{ $properti['nama'] }}</h5>

                    <p class="card-text text-dark mb-2">
                        <i class="bi bi-geo-alt-fill me-1"></i>
                        <strong>Alamat:</strong> {{ $properti['alamat'] }}
                    </p>

                    <p class="card-text mb-2">
                        <i class="bi bi-cash-stack me-1"></i>
                        <strong>Harga:</strong>
                        <span class="badge bg-white text-success">
                            Rp {{ number_format($properti['harga'], 0, ',', '.') }}
                        </span>
                    </p>

                    <p class="card-text mb-2">
                        <i class="bi bi-calendar-event me-1"></i>
                        <strong>Tanggal Beli:</strong>
                        {{ \Carbon\Carbon::parse($properti['tanggal_beli'])->format('d M Y') }}
                    </p>

                    <p class="card-text mb-2">
                        <i class="bi bi-bounding-box me-1"></i>
                        <strong>Luas Tanah:</strong> {{ $properti['luas_tanah'] }}
                    </p>

                    <p class="card-text mb-3">
                        <i class="bi bi-house-door me-1"></i>
                        <strong>Luas Bangunan:</strong> {{ $properti['luas_bangunan'] }}
                    </p>

                    <div class="mt-auto">
                        <button class="btn btn-success w-100" disabled>
                            <i class="bi bi-file-earmark-text me-1"></i>
                            Lihat Detail Dokumen
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-end gap-2 mt-4">
        <button class="btn btn-outline-success">
            <i class="bi bi-plus-circle me-1"></i> Tambah Properti
        </button>
        <button class="btn btn-danger" id="delete-selected">
            <i class="bi bi-trash me-1"></i> Hapus Properti
        </button>
    </div>
</div>


<script>
    let deleteMode = false;

    document.getElementById('delete-selected').addEventListener('click', function () {
        const checkboxes = document.querySelectorAll('.delete-checkbox');

        if (!deleteMode) {

            checkboxes.forEach(cb => cb.classList.remove('d-none'));
            this.classList.remove('btn-danger');
            this.classList.add('btn-warning');
            this.innerHTML = '<i class="bi bi-check-circle me-1"></i> Konfirmasi Hapus';
            deleteMode = true;
        } else {
            const selected = Array.from(checkboxes).filter(cb => cb.checked);
            if (selected.length === 0) {
                alert('Pilih properti yang ingin dihapus terlebih dahulu.');
                return;
            }

            const confirmed = confirm('Apakah Anda yakin ingin menghapus properti yang dipilih?');
            if (confirmed) {
                selected.forEach(cb => cb.closest('.property-card').remove());
            }

            checkboxes.forEach(cb => {
                cb.checked = false;
                cb.classList.add('d-none');
            });
            this.classList.remove('btn-warning');
            this.classList.add('btn-danger');
            this.innerHTML = '<i class="bi bi-trash me-1"></i> Hapus Properti';
            deleteMode = false;
        }
    });
</script>
@endsection
