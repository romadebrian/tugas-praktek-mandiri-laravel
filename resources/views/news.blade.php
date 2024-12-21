@extends('index')
@section('main')
    <a href="{{ route('news.create') }}" class="btn btn-primary">Tambah Berita</a>

    @foreach ($data as $item)
        <div class="container mt-5">
            <div class="row">
                <div class="">
                    <div class="d-flex flex-row">
                        <div class="p-2">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Event Image"
                                style="width: 300px; height: 200px; border-radius: 10px;">
                        </div>
                        <div class="p-2">
                            <h3 class="" style="font-weight: bold; margin-top: 10px;">
                                {{ $item->judul }}
                            </h3>
                            <div class="" style="margin-top: 0px;">
                                <p>{{ $item->deskripsi }}</p>
                                <p style="margin-top: -10px"> {{ $item->created_at }} </p>
                            </div>

                            <div class="row">
                                <a href="{{ route('news.edit', $item->id) }}" class="btn btn-success"
                                    style="margin-top: 10px;">Edit</a>
                                <form action="{{ route('news.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        style="margin-top: 10px; margin-left: 10px">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection



{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
