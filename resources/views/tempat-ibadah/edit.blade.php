@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Tempat Ibadah</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tempat-ibadah.update', $tempatIbadah->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_tempat" class="form-label">Nama Tempat Ibadah</label>
            <input type="text" name="nama_tempat" id="nama_tempat" class="form-control" value="{{ $tempatIbadah->nama_tempat }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $tempatIbadah->alamat }}" required>
        </div>
        <div class="mb-3">
            <label for="jenis_ibadah" class="form-label">Jenis Ibadah</label>
            <select name="jenis_ibadah" id="jenis_ibadah" class="form-select" required>
                <option value="Masjid" {{ $tempatIbadah->jenis_ibadah == 'Masjid' ? 'selected' : '' }}>Masjid</option>
                <option value="Gereja" {{ $tempatIbadah->jenis_ibadah == 'Gereja' ? 'selected' : '' }}>Gereja</option>
                <option value="Pura" {{ $tempatIbadah->jenis_ibadah == 'Pura' ? 'selected' : '' }}>Pura</option>
                <option value="Vihara" {{ $tempatIbadah->jenis_ibadah == 'Vihara' ? 'selected' : '' }}>Vihara</option>
                <option value="Klenteng" {{ $tempatIbadah->jenis_ibadah == 'Klenteng' ? 'selected' : '' }}>Klenteng</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
