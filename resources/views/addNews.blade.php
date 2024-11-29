@extends('index')
@section('main')
    <form action="{{ route('news.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                value="{{ old('judul') }}">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                value="{{ old('deskripsi') }}">
        </div>

        {{-- <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                value="{{ old('image') }}">
        </div> --}}

        <div class="form-group">
            <label>Foto</label>
            <div class="file-upload">
                <div class="file-select">
                    <div class="file-select-button" id="fileName">Choose File</div>
                    <div class="file-select-name" id="noFile">No file chosen... (Max 2MB)</div>
                    <input type="file" name="foto" id="foto">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Konten</label>

            {{-- <input type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                value="{{ old('content') }}"> --}}

            {{-- @include('components/forms/tinymce-editor') --}}
            {{-- <x-forms.tinymce-editor /> --}}

            <textarea id="myeditorinstance" name="konten" class="">{{ old('konten') }}</textarea>
        </div>

        {{-- <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="namecheckbox1" value="valcheckbox1">
            <label class="form-check-label" for="inlineCheckbox1">1</label>
        </div> --}}

        <div class="row" style="" id="kategori">
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

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @include('components/upload-button')
    @include('kategori/add')
@endsection
