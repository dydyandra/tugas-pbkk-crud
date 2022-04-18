@extends('layouts.template')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card mt-2">
            <div class="card-body text-center top-icon">
                <h1 class="mt-3">Edit Review</h1>
                <br>
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif

                @if (Session::has('wrongUsername'))
                    <div class="alert alert-danger">{{ Session::get('wrongUsername') }}</div>
                @endif

                <form id="form-login" action="{{ route('review.update', $review->id) }}" method="post" enctype="multipart/form-data"  onsubmit="return confirm('Apakah Anda Yakin Edit Data ?');">
                    @csrf

                    <div>
                        <input class="mt-3 form-control form-control-lg @error('title') is-invalid @enderror" name="title" type="text"
                               placeholder="Title" value="{{ $review->book->title ? $review->book->title : 'Tidak Ada Judul' }}" autofocus required>
                    </div>

                    @error('title')
                    <div class="alert alert-danger">
                        Title salah
                    </div>
                    @enderror


                    <div>
                        <input class="mt-3 form-control form-control-lg  @error('author') is-invalid @enderror " name="author" type="text"
                               placeholder="Author" value="{{ $review->book->author ? $review->book->author : 'Tidak Ada Penulis' }}" autofocus required>
                    </div>

                    @error('author')
                    <div class="alert alert-danger">
                        Author Harus Dimasukkan
                    </div>
                    @enderror

                    <div class="mt-3">
                        {{-- <label for="photo">Gambar Buku</label> --}}
                        <input type="file" class="mt-3 form-control form-control-file  @error('photo') is-invalid @enderror" id="photo" name="photo">
                        <img src="{{ asset('storage/images/'. $review->book->photo) }}" alt="" style="height: 200px">
                    </div>

                    @error('photo')
                    <div class="alert alert-danger">
                        Tipe File Salah
                    </div>
                    @enderror

                    <div>
                        {{-- <label for="started">Tanggal Mulai</label> --}}
                        <input class="mt-3 form-control form-control-lg  @error('started') is-invalid @enderror" type="date" 
                        name="started" value="{{ $review->started }}" autofocus required>
                    </div>

                    @error('started')
                    <div class="alert alert-danger">
                        Tanggal Mulai Harus Dimasukkan
                    </div>
                    @enderror

                    <div>
                        <input class="mt-3 form-control form-control-lg  @error('read') is-invalid @enderror" type="date" 
                        name="read" value="{{ $review->read }}" autofocus>
                    </div>

                    @error('read')
                    <div class="alert alert-danger">
                        Tanggal Selesai Harus Dimasukkan
                    </div>
                    @enderror

                    <div>
                        <input class="mt-3 form-control form-control-lg  @error('rating') is-invalid @enderror" name="rating" type="text"
                               placeholder="Rating" value="{{ $review->rating ? $review->rating : 'Belum ada Rating' }} " autofocus>
                    </div>

                    @error('rating')
                    <div class="alert alert-danger">
                        Rating hanya bisa dari 1 hingga 5. 
                    </div>
                    @enderror
                </form>
                <br>
                <div class="mt-4 text-center submit-btn">
                    <a href="{{ route('review.list-review') }}" class="btn btn-secondary" onclick="return confirm('Apakah Anda Yakin Kembali ke Halaman Utama ?');">Kembali</a>
                    <button type="submit" class="btn btn-primary" form="form-login">Edit Data</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
