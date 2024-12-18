@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h2>Daftar Tempat Ibadah</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Tempat Ibadah</th>
                <th>Alamat</th>
                <th>Jenis Ibadah</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tempatIbadahs as $tempatIbadah)
                <tr>
                    <td>{{ $tempatIbadah->nama_tempat }}</td>
                    <td>{{ $tempatIbadah->alamat }}</td>
                    <td>{{ $tempatIbadah->jenis_ibadah }}</td>
                    <td>{{ $tempatIbadah->latitude }}</td>
                    <td>{{ $tempatIbadah->longitude }}</td>
                    <td>
                        @if ($tempatIbadah->gambar)
                            <img src="{{ asset('storage/' . $tempatIbadah->gambar) }}" alt="{{ $tempatIbadah->nama_tempat }}" width="100">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
