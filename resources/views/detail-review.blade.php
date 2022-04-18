@extends('layouts.template')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card mt-2">
                <div class="card-body text-center top-icon">
                    <h1 class="mt-3">Detail Review</h1>
                    <br>
                    @csrf
                    <div class="mt-3">
                        {{-- <label for="photo">Gambar Buku</label> --}}
                        {{-- <input type="file" class="mt-3 form-control form-control-file" id="photo" name="photo"> --}}
                        <img src="{{ asset('storage/images/' . $review->book->photo) }}" alt="" style="height: 200px">
                    </div>

                    @error('photo')
                        <div class="alert alert-danger">
                            Tipe File Salah
                        </div>
                    @enderror

                    <div>
                        <input class="mt-3 form-control form-control-lg" name="title" type="text" placeholder="Title"
                            value="{{ $review->book->title ? $review->book->title : 'Tidak Ada Judul' }}" readonly>
                    </div>

                    @error('title')
                        <div class="alert alert-danger">
                            Title salah
                        </div>
                    @enderror


                    <div>
                        <input class="mt-3 form-control form-control-lg" name="author" type="text" placeholder="Author"
                            value="{{ $review->book->author ? $review->book->author : 'Tidak Ada Penulis' }}" readonly>
                    </div>

                    @error('author')
                        <div class="alert alert-danger">
                            Author Harus Dimasukkan
                        </div>
                    @enderror

                    <div>
                        {{-- <label for="started">Tanggal Mulai</label> --}}
                        <input class="mt-3 form-control form-control-lg" type="date" name="started"
                            value="{{ $review->started }}" readonly>
                    </div>

                    @error('started')
                        <div class="alert alert-danger">
                            Tanggal Mulai Harus Dimasukkan
                        </div>
                    @enderror

                    <div>
                        <input class="mt-3 form-control form-control-lg" type="date" name="read"
                            value="{{ $review->read }}" readonly>
                    </div>

                    @error('read')
                        <div class="alert alert-danger">
                            Tanggal Selesai Harus Dimasukkan
                        </div>
                    @enderror

                    <div>
                        <input class="mt-3 form-control form-control-lg" name="rating" type="text" placeholder="Rating"
                            value="{{ $review->rating ? $review->rating : 'Belum ada Rating' }} " readonly>
                    </div>

                    @error('rating')
                        <div class="alert alert-danger">
                            Rating hanya bisa dari 1 hingga 5.
                        </div>
                    @enderror

                    {{-- </form> --}}
                    <br>
                    <div class="mt-4 text-center submit-btn">
                        <a href="{{ route('review.list-review') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
