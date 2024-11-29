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
    </div>
@endsection
