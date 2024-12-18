@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Tempat Ibadah</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tempat-ibadah.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_tempat" class="form-label">Nama Tempat Ibadah</label>
            <input type="text" name="nama_tempat" id="nama_tempat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jenis_ibadah" class="form-label">Jenis Ibadah</label>
            <select name="jenis_ibadah" id="jenis_ibadah" class="form-select" required>
                <option value="">Pilih Jenis Ibadah</option>
                <option value="Masjid">Masjid</option>
                <option value="Gereja">Gereja</option>
                <option value="Pura">Pura</option>
                <option value="Vihara">Vihara</option>
                <option value="Klenteng">Klenteng</option>
            </select>
        </div>

        <!-- Input Latitude dan Longitude -->
        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" name="latitude" id="latitude" class="form-control" readonly required>
        </div>
        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" name="longitude" id="longitude" class="form-control" readonly required>
        </div>

        <!-- Peta Leaflet -->
        <div id="map" style="height: 400px;"></div>

        <!-- Unggah Gambar -->
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    // Inisialisasi peta
    var map = L.map('map').setView([-7.9467, 112.6125], 13); // Default ke wilayah Anda

    // Tambahkan layer tile ke peta
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Inisialisasi marker
    var marker = L.marker([-6.6502, 110.7896]).addTo(map);

    // -6.650200611896085, 110.78966302586203

    // Update latitude dan longitude pada klik peta
    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        marker.setLatLng(e.latlng);
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    });
</script>

@endsection
