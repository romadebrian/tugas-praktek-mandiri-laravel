@extends('index')
@section('main')
    @include('kategori/add')
    <div class="btn btn-primary" data-toggle="modal" data-target="#ModalKategori">Tambah Kategori</div>

    <table class="table" id="kategori">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->namaKategori }}</td>
                    <td>{{ $item->descKategori }}</td>
                    <td class="d-flex">
                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning"
                            style="margin-right: 5px">Edit</a>
                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
