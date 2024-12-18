<?php

namespace App\Http\Controllers;

use App\Models\TempatIbadah;
use Illuminate\Http\Request;

class TempatIbadahController extends Controller
{
    /**
     * Menampilkan daftar tempat ibadah.
     */
    public function index()
    {
        $tempatIbadahs = TempatIbadah::all(); // Mengambil semua data dari model TempatIbadah
        return view('tempat-ibadah.index', compact('tempatIbadahs'));
    }

    /**
     * Menampilkan halaman untuk menambahkan tempat ibadah.
     */
    public function create()
    {
        return view('tempat-ibadah.create');
    }

    /**
     * Menyimpan tempat ibadah baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_ibadah' => 'required|string|max:255',
            'latitude' => 'required|numeric', // Menggunakan validasi numerik
            'longitude' => 'required|numeric', // Menggunakan validasi numerik
            'gambar' => 'nullable|image|max:1024', // Validasi file gambar dengan maksimal ukuran 1 MB
        ]);

        // Simpan ke database
        TempatIbadah::create([
            'nama_tempat' => $validatedData['nama_tempat'],
            'alamat' => $validatedData['alamat'],
            'jenis_ibadah' => $validatedData['jenis_ibadah'],
            'latitude' => $validatedData['latitude'],
            'longitude' => $validatedData['longitude'],
            'gambar' => $request->file('gambar') ? $request->file('gambar')->store('images/tempat-ibadah') : null,
        ]);

        return redirect()->route('tempat-ibadah.index')->with('success', 'Tempat ibadah berhasil ditambahkan.');
    }
}
