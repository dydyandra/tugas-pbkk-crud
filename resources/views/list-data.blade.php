@extends('layouts.template')

@section('container')
<div>
    <center><h3>Data artikel</h3></center>

    <a href="{{ route('artikel.tambah-data') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah artikel Baru</a>

    <br/>
    <br/>
    @if (Session::has('tambah_data'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
            <br>
                Penambahan artikel Berhasil
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> --}}
            </button>
        </div>
    @endif

    @if (Session::has('edit_data'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
            <br>
                Pengeditan artikel Berhasil
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

    @if (Session::has('hapus_data'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
            <br>
                Penghapusan artikel Berhasil
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @php
            $it = 1;
        @endphp
        @foreach($data as $d)
        <tr>
            <td>{{ $it }}</td>
            <td>{{ $d->title }}</td>
            <td>{{ $d->isi }}</td>
            <td>
                <form onsubmit="return confirm('Apakah Anda Yakin Menghapus Data ini ?');" action="{{ route('artikel.destroy', $d->id) }}" method="POST">
                    <a href="{{ Route('artikel.edit', $d->id) }}" class="btn btn-sm btn-primary shadow"><i class="fa fa-edit"></i> Edit</a>
                    |
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger shadow"><i class="fa fa-trash"></i> Delete</button>
                    |
                    <a href="{{ route('artikel.show' , $d->id) }}" class="btn btn-sm btn-secondary shadow"><i class="fa fa-info-circle"></i> Detail</a>
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
