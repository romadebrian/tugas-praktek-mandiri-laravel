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

        <div class="form-group">
            <label>Content</label>

            {{-- <input type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                value="{{ old('content') }}"> --}}

            {{-- @include('components/forms/tinymce-editor') --}}
            {{-- <x-forms.tinymce-editor /> --}}

            <textarea id="myeditorinstance" name="content">{{ old('content') }}</textarea>
        </div>

        {{-- <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="namecheckbox1" value="valcheckbox1">
            <label class="form-check-label" for="inlineCheckbox1">1</label>
        </div> --}}

        <div class="row" style="" id="kategori">
            @foreach ($data as $item)
                <div class="checkbox-wrapper-4">

                    <input class="inp-cbx" id="{{ $item->id }}" type="checkbox" name="category[]"
                        value="$item->namaKategori" />
                    <label class="cbx" for="{{ $item->id }}"><span>
                            <svg width="12px" height="10px">
                                <use xlink:href="#check-4"></use>
                            </svg></span><span>{{ $item->namaKategori }}</span></label>
                    <svg class="inline-svg">
                        <symbol id="check-4" viewbox="0 0 12 10">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </symbol>
                    </svg>
                </div>
            @endforeach

            <div class="btn btn-primary"
                style="width: 101px; height: 30px; font-size: 12px; font-weight: 400; padding: 6px 8px; margin-bottom: .5rem;"
                data-toggle="modal" data-target="#ModalKategori">
                Add
                Category</div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="ModalKategori" tabindex="-1" role="dialog" aria-labelledby="ModalKategoriLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalKategoriLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('namaKategori') is-invalid @enderror"
                            name="namaKategori" value="{{ old('namaKategori') }}" id="namaKategori">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control @error('descKategori') is-invalid @enderror"
                            name="descKategori" value="{{ old('descKategori') }}" id="descKategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="savechange">Save changes</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.getElementById("savechange").addEventListener("click", function(e) {
            e.preventDefault();

            //define variable
            let title = $('#namaKategori').val();
            let content = $('#descKategori').val();
            let token = '{{ csrf_token() }}';

            console.log(title, content, token);

            // ajax
            $.ajax({
                url: `/admin/kategori`,
                type: "POST",
                cache: false,
                data: {
                    "namaKategori": title,
                    "descKategori": content,
                    '_token': token
                },
                success: function(response) {
                    // alert("Kategori berhasil di tambah");
                    // //append to table
                    // $('#table-posts').prepend(post);

                    //show success message
                    // Swal.fire({
                    //     type: 'success',
                    //     icon: 'success',
                    //     title: `${response.message}`,
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // });

                    //clear form
                    $('#namaKategori').val('');
                    $('#descKategori').val('');

                    $('#kategori').load(document.URL + ' #kategori');

                    //close modal
                    $('#ModalKategori').modal('hide');


                },
                error: function(error) {}

            });
        });
    </script>

    @include('components/upload-button')
@endsection
