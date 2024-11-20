@extends('index')
@section('main')
    <form action="{{ route('news.store') }}" enctype="multipart/form-data" method="POST">
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

        {{-- <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                value="{{ old('image') }}">
        </div> --}}

        <div class="form-group">
            <label>Image</label>
            <div class="file-upload">
                <div class="file-select">
                    <div class="file-select-button" id="fileName">Choose File</div>
                    <div class="file-select-name" id="noFile">No file chosen...</div>
                    <input type="file" name="image" id="image">
                </div>
            </div>
        </div>

        {{-- <div class="input-group">
            <div class="custom-file" style="flex-direction: column-reverse;">
                <label class="custom-file-label" for="InputFile">Pilh Gambar</label>
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image"
                    value="Pilh Gambar" id="InputFile">
            </div>
        </div> --}}



        <div class="form-group">
            <label>Content</label>

            {{-- <input type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                value="{{ old('content') }}"> --}}

            {{-- @include('components/forms/tinymce-editor') --}}
            {{-- <x-forms.tinymce-editor /> --}}

            <textarea id="myeditorinstance" name="content">{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @include('components/upload-button')
@endsection
