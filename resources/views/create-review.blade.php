@extends('layouts.template')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card mt-2">
                <div class="card-body text-left top-icon">
                    <h1 class="mt-3">Create Review</h1>
                    <br>
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif

                    {{-- @if (Session::has('wrongUsername'))
                    <div class="alert alert-danger">{{ Session::get('wrongUsername') }}</div>
                @endif --}}

                    <form id="form-login" action="{{ route('review.buat-review') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input class="mt-3 form-control form-control-lg" id="title" name="title" type="text"
                                value="{{ old('title') }}" placeholder="Title" list="title-list" autofocus required>
                            <datalist id="title-list">
                                @foreach ($title as $t)
                                    <option data-value="{{ $t->id }}">{{ $t->title }}</option>
                                @endforeach
                            </datalist>
                        </div>

                        @error('title')
                            <div class="alert alert-danger">
                                Title salah
                            </div>
                        @enderror

                        <div>
                            <input class="mt-3 form-control form-control-lg" id="author" name="author" type="text"
                                placeholder="Author" value="{{ old('author') }}" autofocus required>
                        </div>

                        @error('author')
                            <div class="alert alert-danger">
                                Author Harus Dimasukkan
                            </div>
                        @enderror

                        <div>
                            {{-- <label for="photo">Gambar Buku</label> --}}
                            <input type="file" class="mt-3 form-control form-control-file" id="photo" name="photo">
                        </div>

                        @error('photo')
                            <div class="alert alert-danger">
                                Tipe File Salah
                            </div>
                        @enderror

                        <div>
                            {{-- <label for="started">Tanggal Mulai</label> --}}
                            <input class="mt-3 form-control form-control-lg" type="date" name="started"
                                value="<?php echo date('Y-m-d'); ?>" autofocus required>
                        </div>

                        @error('started')
                            <div class="alert alert-danger">
                                Tanggal Mulai Harus Dimasukkan
                            </div>
                        @enderror

                        <div>
                            <input class="mt-3 form-control form-control-lg" type="date" name="read" autofocus>
                        </div>

                        @error('read')
                            <div class="alert alert-danger">
                                Tanggal Selesai Harus Dimasukkan
                            </div>
                        @enderror

                        <div>
                            <input class="mt-3 form-control form-control-lg" name="rating" type="text" placeholder="Rating"
                                autofocus>
                        </div>

                        @error('rating')
                            <div class="alert alert-danger">
                                Rating hanya bisa dari 1 hingga 5.
                            </div>
                        @enderror


                    </form>
                    <br>
                    <div class="mt-4 text-center submit-btn">
                        <button type="submit" class="btn btn-primary" form="form-login">Tambah Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script>
        var title = {!! json_encode($title->toArray()) !!};
        var myElement = document.getElementById("author");
        $('#title').change(function() {
                var id = $(this).val();
                var item2 = title.filter(item => item.title === id)
                console.log(item2[0].author)

                myElement.value = item2[0].author;

            });


    </script>
@endsection
