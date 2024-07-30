@extends('index')
@section('main')
    <form action="{{ route('user.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ $data->name }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ $data->email }}">
        </div>
        <div class="form-group">
            <label>Role</label>
            <select class="custom-select" name="role">
                <option value="{{ $data->role }}" selected>{{ $data->role }}</option>
                <option value="admin">admin</option>
                <option value="editor">editor</option>
                <option value="user">user</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
