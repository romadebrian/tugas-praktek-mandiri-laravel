@extends('index')
@section('main')
    <form action="{{ route('kategori.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control @error('namaKategori') is-invalid @enderror" name="namaKategori"
                value="{{ $data->namaKategori }}">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control @error('descKategori') is-invalid @enderror" name="descKategori"
                value="{{ $data->descKategori }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
