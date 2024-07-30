@extends('index')
@section('main')
    <form action="{{ route('produk.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control @error('namaProduk') is-invalid @enderror" name="namaProduk"
                value="{{ old('namaProduk') }}">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga"
                value="{{ old('harga') }}">
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                value="{{ old('foto') }}">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea id="myeditorinstance" name="descProduk">{{ old('descProduk') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
