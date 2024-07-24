@extends('index')
@section('main')
    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                value="{{ old('description') }}">
        </div>
        <div class="form-group">
            <label>Content</label>
            <input type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                value="{{ old('content') }}">
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" name="image"
                value="{{ old('image') }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
