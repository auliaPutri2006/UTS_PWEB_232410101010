<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        session(['username' => $request->username]);
        session(['password' => $request->password]);

        return redirect()->route('dashboard');
    }





    public function showDashboard(Request $request)
    {
        $username = $request->query('username');
        $password = session('password');


    $daftarProperti = [
        ['nama' => 'The Argopuro', 'harga' => 2000000000, 'lokasi' => 'Jember'],
        ['nama' => 'Center Of Point Indonesia', 'harga' => 7500000000, 'lokasi' => 'Makassar'],
        ['nama' => 'Citraland', 'harga' => 600000000, 'lokasi' => 'Surabaya'],
        ['nama' => 'Uluwatu Residence', 'harga' => 1200000000, 'lokasi' => 'Bali'],
    ];

    $jumlahProperti = count($daftarProperti);
    $totalHargaProperti = array_sum(array_column($daftarProperti, 'harga'));

    $labels = ['Januari', 'Februari', 'Maret','April'];
    $data = [500000000, 750000000, 600000000,1000000000];

    $lokasiCount = [];
    foreach ($daftarProperti as $properti) {
        $lokasiCount[$properti['lokasi']] = ($lokasiCount[$properti['lokasi']] ?? 0) + 1;
    }

    return view('dashboard', compact(
        'username',
        'jumlahProperti',
        'totalHargaProperti',
        'labels',
        'data',
        'daftarProperti',
        'lokasiCount'
    ));
    }
    public function showPengelolaan(Request $request)
    {
        $username = $request->query('username');
    $daftarProperti = [
        [
            'nama' => 'The Argopuro',
            'foto' => 'assets/the_argopuro.jpg',
            'tanggal_beli' => '2023-01-15',
            'harga' => 2000000000,
            'alamat' => 'Jl. Letjen Sutoyo No. 45, Jember',
            'luas_tanah' => '300 m²',
            'luas_bangunan' => '200 m²'
        ],
        [
            'nama' => 'Center Of Point Indonesia',
            'foto' => 'assets/cpi.jpg',
            'tanggal_beli' => '2022-11-10',
            'harga' => 7500000000,
            'alamat' => 'Jl. Penghibur, Makassar',
            'luas_tanah' => '500 m²',
            'luas_bangunan' => '400 m²'
        ],
        [
            'nama' => 'Citraland',
            'foto' => 'assets/citraland.jpg',
            'tanggal_beli' => '2021-06-20',
            'harga' => 600000000,
            'alamat' => 'Jl. Bukit Darmo Golf, Surabaya',
            'luas_tanah' => '250 m²',
            'luas_bangunan' => '150 m²'
        ],
        [
            'nama' => 'Uluwatu Residence',
            'foto' => 'assets/uluwatu.jpg',
            'tanggal_beli' => '2023-03-05',
            'harga' => 1200000000,
            'alamat' => 'Jl. Raya Uluwatu, Bali',
            'luas_tanah' => '350 m²',
            'luas_bangunan' => '280 m²'
        ]
    ];

    return view('pengelolaan', compact('daftarProperti', 'username'));
    }

    public function showProfile(Request $request)
    {
        $username = session('username');
        $password = session('password');

        return view('profile', compact('username', 'password'));
    }




}
