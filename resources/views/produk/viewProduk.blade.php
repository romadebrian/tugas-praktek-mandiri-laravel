@extends('index')

@section('main')
    <div class="container bg-white rounded box-shadow" style="">
        <div class="flex-row p-2" style="">
            <div class="row justify-content-center mb-5" style="">
                <div class="col-lg-5 d-flex justify-content-center" style="cursor: pointer; ">
                    <div class="" style="" data-toggle="modal" data-target="#modalImageProduk">
                        <img src="{{ asset('storage/' . $data->foto) }}" alt="{{ $data->image }}"
                            style="height: 350px; width: 350px; border-radius: 10px;">
                    </div>
                    <div class="modal fade" id="modalImageProduk" tabindex="-1" role="dialog"
                        aria-labelledby="modalImageProduk" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <img src="{{ asset('storage/' . $data->foto) }}" alt="{{ $data->image }}"
                                    style="height: 500px; width: 700px; border-radius: 10px;">
                            </div>
                        </div>
                    </div>
                </div><!-- /.blog-post -->
                <div class="col-lg-7 pt-2" style="">
                    <p class="mt-5"
                        style="font-size: 24px; color: black;  font-weight: bold; line-height: 24px; overflow-wrap: break-word">
                        {{ $data->namaProduk }}</p>
                    <div class="mt-5">
                        <p style="background-color: #fafafa; font-size: 30px; font-weight: bold; color: #d0011b">
                            Rp{{ number_format($data->harga) }}</p>
                    </div>
                    <div class="btn btn-success">CheckOut</div>
                    <hr class="featurette-divider">
                    <div>
                        Kategori : @foreach ($data->kategori as $badgeKategori)
                            {{ $badgeKategori }},
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- {{ $data->content }} --}}
                @php
                    echo $data->descProduk;
                @endphp</div>
        </div>
    @endsection
