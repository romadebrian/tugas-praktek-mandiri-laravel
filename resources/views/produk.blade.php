@extends('index')
@section('main')
    <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Barang</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nama</th>
                <th scope="col">Foto</th>
                <th scope="col">Harga</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->namaProduk }}</td>
                    <td><img src="{{ asset('storage/' . $item->foto) }}" alt="Event Image"
                            style="width: 100px; height: 50px; border-radius: 10px;">
                    </td>
                    <td>{{ $item->harga }}</td>
                    <td>{{ $item->descProduk }}</td>
                    <td class="d-flex">
                        <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning"
                            style="margin-right: 5px">Edit</a>
                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST">
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



{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
