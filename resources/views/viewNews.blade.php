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
                                <div class="col-md-4" style="cursor: pointer;"
                                    onclick="location.href='{{ URL::to('produk', $itemProduk->id) }}';">
                                    <div class="card mb-4 box-shadow">
                                        <img class="card-img-top" src="{{ asset('storage/' . $itemProduk->foto) }}"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <a href="http://" class="customlinkhover">
                                                <p class="card-text card-tanggal ">
                                                    {{ $itemProduk->created_at }}</p>
                                                <p class="card-text" style="font-weight: bold">{{ $itemProduk->namaProduk }}
                                                </p>
                                            </a>
                                            </br>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <div class="row">
                                                        @foreach ($itemProduk->kategori as $badgeKategori)
                                                            <div class="btn btn-sm btn-outline-secondary">
                                                                {{ $badgeKategori }}
                                                            </div>
                                                        @endforeach
                                                        {{-- <span class="badge badge-primary p-1"> --}}
                                                        {{-- @dd($category) --}}
                                                        {{-- {{ $kategoriPost }} --}}
                                                        {{-- </span> --}}
                                                    </div>
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
