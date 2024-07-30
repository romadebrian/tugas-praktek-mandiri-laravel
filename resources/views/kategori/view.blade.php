@extends('index')
@section('main')
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
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
