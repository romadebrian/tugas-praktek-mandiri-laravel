@extends('index')
@section('main')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h6 class="h4 m-0 font-weight-bold text-primary col">Produk</h6>
                <span>
                    <a href="{{ route('produk.create') }}" class="btn btn-primary col">Tambah Barang</a>
                </span>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $item->namaProduk }}</td>
                                <td><img src="{{ asset('storage/' . $item->foto) }}" alt="Event Image"
                                        style="width: 100px; height: 50px; border-radius: 10px;">
                                </td>
                                <td>{{ $item->harga }}</td>
                                <td width="300">
                                    @for ($i = 0; $i < 100; $i++)
                                        <span class="badge badge-primary p-1">
                                            Kategori 1
                                        </span>
                                    @endfor
                                </td>
                                {{-- <td>{{ $item->kategori }}</td> --}}
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
            </div>
        </div>
    </div>
@endsection



{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
