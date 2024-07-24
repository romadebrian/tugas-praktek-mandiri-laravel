@extends('index')
@section('main')
    <form action="{{ route('news.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ $data->title }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                value="{{ $data->description }}">
        </div>
        <div class="form-group">
            <label>Content</label>
            <input type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                value="{{ $data->content }}">
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" name="image"
                value="{{ $data->image }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
