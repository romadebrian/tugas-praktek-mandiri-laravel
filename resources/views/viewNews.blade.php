@extends('index')

@section('main')
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $data->title }}</h2>
        <p class="blog-post-meta">{{ $data->created_at }}</p>

        {{-- {{ $data->content }} --}}
        @php
            echo $data->content;
        @endphp

    </div><!-- /.blog-post -->
@endsection
