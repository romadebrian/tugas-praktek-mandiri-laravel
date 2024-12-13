@extends('index')

@section('main')
    <div class="container">
        <div class="blog-post">
            <h2>{{ $data->judul }}</h2>
            <p>{{ $data->penulis }}</p>
            <p style="margin-top: -10px">{{ $data->created_at }}</p>

            <div class="" style="display: flex; justify-content: center">
                <img src="{{ asset('storage/' . $data->foto) }}" alt="{{ $data->image }}"
                    style="width: 300px; height: 200px; border-radius: 10px;">
            </div>

            {{-- {{ $data->content }} --}}
            @php
                echo $data->konten;
            @endphp

        </div><!-- /.blog-post -->

        <div style="margin-top: 5rem;"></div>
        <hr class="featurette-divider">
        <div class="row">

            @foreach ($dataProduk as $itemProduk)
                @php
                    $found = 'tidak ada';
                @endphp

                {{-- {{ $found }} --}}

                @foreach ($itemProduk->kategori as $itemKategori)
                    {{-- itemKategori {{ $itemKategori }} --}}
                    @foreach ($data->kategori as $kategoriPost)
                        {{-- kategoriPost {{ $kategoriPost }} --}}
                        @if ($kategoriPost === $itemKategori)
                            {{-- kategoriPost {{ $itemKategori }} = itemKategori {{ $itemKategori }} --}}
                            @if ($found === 'tidak ada')
                                @php
                                    $found = 'ada';
                                @endphp
                                {{-- {{ $kategoriPost }} --}}
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">
                                        <img class="card-img-top" src="{{ asset('storage/' . $itemProduk->foto) }}"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-text">This is a wider card with supporting text below as a
                                                natural
                                                lead-in to
                                                additional content. This content is a little bit longer.</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </div>
                                                <small class="text-muted">{{ $itemProduk->harga }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @endforeach
            @endforeach



        </div>
    </div>
@endsection
