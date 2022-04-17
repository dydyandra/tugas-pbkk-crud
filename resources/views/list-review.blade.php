@extends('layouts.template')

@section('container')
<div>
    <h2 class="mt-2">Data review</h2>

    <div class="row">
        <div class="col-6">
            <a href="{{ route('review.create') }}" class="btn btn-purple"><i class="fa fa-plus"></i> Tambah review Baru</a>
        </div>
        <div class="col-6">
            <div class="card shadow">
                <div class="card-body">
                    <h6>Total Read: {{ $showRead }} | Total in Progress: {{ $showProgress }}</h6>
                </div>
            </div>
        </div>
    </div>

    {{-- <a href="{{ route('review.create') }}" class="btn btn-purple"><i class="fa fa-plus"></i> Tambah review Baru</a> --}}

    <br/>
    <br/>
    @if (Session::has('tambah_review'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
            <br>
                Penambahan review Berhasil
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> --}}
            </button>
        </div>
    @endif

    @if (Session::has('edit_review'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
            <br>
                Pengeditan review Berhasil
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

    @if (Session::has('hapus_review'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
            <br>
                Penghapusan review Berhasil
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
    {{-- <h5>Total Read: {{ $showRead }} | Total in Progress: {{ $showProgress }}</h5> --}}
    <table class="table">
        <thead bordered style="background-color: rgb(150, 113, 184)" class="thead">
            <tr>
                <th>ID</th>
                <th>Gambar Buku</th>
                <th>Judul</th>
                <th>Author</th>
                <th>Started</th>
                <th>Read</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @php
            $it = 1;
        @endphp
        @foreach($review as $d)
        <tr>
            <td>{{ $it }}</td>
            <td>
                <img src="{{ asset('storage/images/'. $d->photo) }}" alt="" style="height: 100px">
                {{-- {{ $d->photo }} --}}
            </td>
            <td>{{ $d->title }}</td>
            <td>{{ $d->author }}</td>
            <td>{{ $d->started }}</td>
            <td>{{ $d->read }}</td>
            <td>{{ $d->rating }}</td>
            <td>
                <form onsubmit="return confirm('Apakah Anda Yakin Menghapus Data ini ?');" action="{{ route('review.destroy', $d->id) }}" method="POST">
                    <a href="{{ Route('review.edit', $d->id) }}" class="btn btn-purple shadow"><i class="fa fa-edit"></i> Edit</a>
                    |
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger shadow"><i class="fa fa-trash"></i> Delete</button>
                    |
                    <a href="{{ route('review.show' , $d->id) }}" class="btn btn-secondary shadow"><i class="fa fa-info-circle"></i> Detail</a>
                </form>
            </td>
        </tr>
        @php
            $it+=1;
        @endphp
        @endforeach
    </table>
</div>
@endsection

