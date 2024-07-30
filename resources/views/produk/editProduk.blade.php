@extends('index')
@section('main')
    <form action="{{ route('produk.update', $data->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control @error('namaProduk') is-invalid @enderror" name="namaProduk"
                value="{{ $data->namaProduk }}">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga"
                value="{{ $data->harga }}">
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                value="{{ $data->foto }}">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea id="myeditorinstance" name="descProduk">{{ $data->descProduk }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
