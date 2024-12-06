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
            <div class="file-upload">
                <div class="file-select">
                    <div class="file-select-button" id="fileName">Choose File</div>
                    <div class="file-select-name" id="noFile">No file chosen... (Max 2MB)</div>
                    <input type="file" name="foto" id="image">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea id="myeditorinstance" name="descProduk">{{ old('descProduk') }}</textarea>
        </div>

        <div id="kategori">
            <div class="row">
                @foreach ($data as $item)
                    <div class="checkbox-wrapper-4">

                        <input class="inp-cbx" id="{{ $item->id }}" type="checkbox" name="kategori[]"
                            value="{{ $item->namaKategori }}" />
                        <label class="cbx" for="{{ $item->id }}"><span>
                                <svg width="12px" height="10px">
                                    <use xlink:href="#check-4"></use>
                                </svg></span><span>{{ $item->namaKategori }}</span></label>
                        <svg class="inline-svg">
                            <symbol id="check-4" viewbox="0 0 12 10">
                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                            </symbol>
                        </svg>
                    </div>
                @endforeach

                <div class="btn btn-primary"
                    style="width: 101px; height: 30px; font-size: 10px; font-weight: bold; padding: 6px 8px; margin-bottom: .5rem;"
                    data-toggle="modal" data-target="#ModalKategori">
                    Tambah Kategori</div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @include('components/upload-button')
    @include('kategori/add')
@endsection
