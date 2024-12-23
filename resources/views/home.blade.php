@extends('index')

@section('main')
    @foreach ($data as $item)
        <div class="container mt-5" style="cursor: pointer;" onclick="location.href='{{ URL::to('post', $item->id) }}';">
            <div class="row">
                <div>
                    <div class="d-flex flex-row">
                        <div class="p-2">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Event Image"
                                style="width: 300px; height: 200px; border-radius: 10px;">

                        </div>
                        <div class="p-2">
                            <h3 class="" style="font-weight: bold; margin-top: 10px;">
                                <a href="{{ URL::to('post', $item->id) }}">{{ $item->judul }}</a>
                            </h3>
                            <div class="" style="margin-top: 0px;">
                                <p>{{ $item->deskripsi }}</p>
                                <p style="margin-top: -10px"> {{ $item->created_at }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
