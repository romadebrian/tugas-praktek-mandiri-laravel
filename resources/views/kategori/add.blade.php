@extends('index')
@section('main')
    <form action="{{ route('kategori.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control @error('namaKategori') is-invalid @enderror" name="namaKategori"
                value="{{ old('namaKategori') }}">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control @error('descKategori') is-invalid @enderror" name="descKategori"
                value="{{ old('descKategori') }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
