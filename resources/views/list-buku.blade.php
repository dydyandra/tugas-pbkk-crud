@extends('layouts.template')

@section('container')
<div>
    <h2 class="mt-2">Data Buku</h2>

    <div class="row my-2">
        <div class="col-2">
            <div class="card shadow">
                <div class="card-body">
                    <h6 class="card-text">Total Buku: {{ $count }} </h6>
                </div>
            </div>
        </div>
    </div>

    <table class="table">
        <thead bordered style="background-color: rgb(150, 113, 184)" class="thead">
            <tr>
                <th>ID</th>
                <th>Gambar Buku</th>
                <th>Judul</th>
                <th>Author</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @php
            $it = 1;
        @endphp
        @foreach($book as $d)
        <tr>
            <td>{{ $it }}</td>
            <td>
                <img src="{{ asset('storage/images/'. $d->photo) }}" alt="" style="height: 100px">
                {{-- {{ $d->photo }} --}}
            </td>
            <td>{{ $d->title }}</td>
            <td>{{ $d->author }}</td>
            <td>
                <a href="{{ route('book.show' , $d->id) }}" class="btn btn-secondary shadow"><i class="fa fa-info-circle"></i> Detail</a>
            </td>
        </tr>
        @php
            $it+=1;
        @endphp
        @endforeach
    </table>
</div>
@endsection

