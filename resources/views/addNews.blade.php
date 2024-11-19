@extends('index')
@section('main')
    <style>
        .file-upload {
            display: block;
            text-align: center;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 12px;
        }

        .file-upload .file-select {
            display: block;
            border: 2px solid #dce4ec;
            color: #34495e;
            cursor: pointer;
            height: 40px;
            line-height: 40px;
            text-align: left;
            background: #FFFFFF;
            overflow: hidden;
            position: relative;
        }

        .file-upload .file-select .file-select-button {
            background: #dce4ec;
            padding: 0 10px;
            display: inline-block;
            height: 40px;
            line-height: 40px;
        }

        .file-upload .file-select .file-select-name {
            line-height: 40px;
            display: inline-block;
            padding: 0 10px;
        }

        .file-upload .file-select:hover {
            border-color: #34495e;
            transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
        }

        .file-upload .file-select:hover .file-select-button {
            background: #34495e;
            color: #FFFFFF;
            transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
        }

        .file-upload.active .file-select {
            border-color: #3fa46a;
            transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
        }

        .file-upload.active .file-select .file-select-button {
            background: #3fa46a;
            color: #FFFFFF;
            transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
        }

        .file-upload .file-select input[type=file] {
            z-index: 100;
            cursor: pointer;
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .file-upload .file-select.file-select-disabled {
            opacity: 0.65;
        }

        .file-upload .file-select.file-select-disabled:hover {
            cursor: default;
            display: block;
            border: 2px solid #dce4ec;
            color: #34495e;
            cursor: pointer;
            height: 40px;
            line-height: 40px;
            margin-top: 5px;
            text-align: left;
            background: #FFFFFF;
            overflow: hidden;
            position: relative;
        }

        .file-upload .file-select.file-select-disabled:hover .file-select-button {
            background: #dce4ec;
            color: #666666;
            padding: 0 10px;
            display: inline-block;
            height: 40px;
            line-height: 40px;
        }

        .file-upload .file-select.file-select-disabled:hover .file-select-name {
            line-height: 40px;
            display: inline-block;
            padding: 0 10px;
        }
    </style>
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

    <script src="https://cdn.jsdelivr.net/npm/jquery-1.10.2@1.10.2/jquery-1.10.2.min.js"></script>
    <script>
        $('#image').bind('change', function() {
            var filename = $("#image").val();
            if (/^\s*$/.test(filename)) {
                $(".file-upload").removeClass('active');
                $("#noFile").text("No file chosen...");
            } else {
                $(".file-upload").addClass('active');
                $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
            }
        });
    </script>
@endsection
