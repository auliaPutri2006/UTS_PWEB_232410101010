@extends('layouts.app')

@section('content')
<div class="container py-4">
    @include('components.greeting')

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card border-success">
                <div class="card-body">
                    <h6 class="text-success">Jumlah Properti</h6>
                    <h3 class="fw-bold">{{ $jumlahProperti }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-primary">
                <div class="card-body">
                    <h6 class="text-primary">Total Nilai Properti</h6>
                    <h3 class="fw-bold">Rp {{ number_format($totalHargaProperti, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
    </div>
    </div>


<div class="row g-3">

    <div class="col-lg-8">
      <div class="card shadow-sm border border-success rounded-3">
        <div class="card-body">
          <h6 class="mb-3">Harga Properti Bulanan</h6>
          <canvas id="propertyChart" style="height: 280px;"></canvas>
        </div>
      </div>
    </div>


    <div class="col-lg-4">
      <div class="card shadow-sm border border-success rounded-3">
        <div class="card-body">
          <h6 class="mb-3">Sebaran Lokasi</h6>
          <div style="height: 220px;">
            <canvas id="lokasiPieChart" style="max-height: 200px;"></canvas>
          </div>


          <div class="mt-3">
            <h6>Catatan</h6>
            <textarea class="form-control border border-success rounded-2 shadow-sm" rows="4" placeholder="Tulis catatan di sini..."></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const barCtx = document.getElementById('propertyChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: [
                @foreach($labels as $label)
                    "{{ $label }}",
                @endforeach
            ],
            datasets: [{
                label: 'Harga Properti (Rp)',
                data: [
                    @foreach($data as $value)
                        {{ $value }},
                    @endforeach
                ],
                backgroundColor: 'rgba(40, 167, 69, 0.6)',
                borderColor: 'rgba(40, 167, 69, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });

    const pieCtx = document.getElementById('lokasiPieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: [
                @foreach(array_keys($lokasiCount) as $lokasi)
                    "{{ $lokasi }}",
                @endforeach
            ],
            datasets: [{
                label: 'Jumlah Properti',
                data: [
                    @foreach($lokasiCount as $jumlah)
                        {{ $jumlah }},
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)'
                ],
                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection
