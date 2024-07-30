@extends('index')

@section('main')
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $data->title }}</h2>
        <p class="blog-post-meta">{{ $data->created_at }}</p>

        {{ $data->content }}

    </div><!-- /.blog-post -->
@endsection
