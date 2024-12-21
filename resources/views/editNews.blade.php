@extends('index')
@section('main')
    <form action="{{ route('news.update', $data->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                value="{{ $data->judul }}">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                value="{{ $data->deskripsi }}">
        </div>

        {{-- <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"
                value="{{ $data->image }}">
        </div> --}}

        <div class="form-group">
            <label>Foto</label>
            <div class="file-upload">
                <div class="file-select">
                    <div class="file-select-button" id="fileName">Choose New File</div>
                    <div class="file-select-name" id="noFile">{{ $data->foto }}</div>
                    <input type="file" name="foto" id="foto" value="{{ $data->foto }}"
                        accept="image/jpg, image/png, image/jpeg">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Content</label>

            {{-- <input type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                value="{{ old('content') }}"> --}}

            {{-- @include('components/forms/tinymce-editor') --}}
            {{-- <x-forms.tinymce-editor /> --}}

            <textarea id="myeditorinstance" name="konten">{{ $data->konten }}</textarea>

            <div id="kategori">
                <div class="row">
                    @php
                        $lengthData = 0;
                        if ($data->kategori !== null) {
                            $lengthData = count($data->kategori);
                        }
                    @endphp

                    @foreach ($dataKategori as $item)
                        @php
                            $isActive = false;
                        @endphp

                        {{-- lentgh data = {{ $lengthData }} --}}
                        {{-- data = {{ $data->kategori }} --}}
                        {{-- @dd($data->kategori) --}}
                        @for ($i = 0; $i <= $lengthData; $i++)
                            {{-- cek jika kategori cuma 1 --}}
                            @if (isset($data->kategori[$i]))
                                @if ($data->kategori[$i] === $item->namaKategori)
                                    @php
                                        $isActive = true;
                                    @endphp
                                @endif
                            @else
                            @endif
                        @endfor

                        {{-- {{ isset($array['key']) ? $array['key'] : 'Default' }} --}}


                        <div class="checkbox-wrapper-4">
                            <input class="inp-cbx" id="{{ $item->id }}" type="checkbox" name="kategori[]"
                                value="{{ $item->namaKategori }}" @checked(old('active', $isActive)) />
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

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @include('components/upload-button')
    @include('kategori/add')
@endsection
