@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $tempatIbadah->nama_tempat }}</h2>
    <p><strong>Alamat:</strong> {{ $tempatIbadah->alamat }}</p>
    <p><strong>Jenis Ibadah:</strong> {{ $tempatIbadah->jenis_ibadah }}</p>
    <p><strong>Latitude:</strong> {{ $tempatIbadah->latitude }}</p>
    <p><strong>Longitude:</strong> {{ $tempatIbadah->longitude }}</p>

    @if($tempatIbadah->image)
        <img src="{{ asset('storage/' . $tempatIbadah->image) }}" class="img-fluid" alt="{{ $tempatIbadah->nama_tempat }}">
    @endif

    <div id="map" style="height: 400px;"></div>

    <script>
        var map = L.map('map').setView([{{ $tempatIbadah->latitude }}, {{ $tempatIbadah->longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([{{ $tempatIbadah->latitude }}, {{ $tempatIbadah->longitude }}]).addTo(map);
    </script>
</div>
@endsection
