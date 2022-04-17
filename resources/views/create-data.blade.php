@extends('layouts.template')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card mt-4">
            <div class="card-body text-center top-icon">
                <h1 class="mt-3">Tutorial</h1>
                <br>
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif

                @if (Session::has('wrongUsername'))
                    <div class="alert alert-danger">{{ Session::get('wrongUsername') }}</div>
                @endif

                <form id="form-login" action="{{ route('artikel.buat-data') }}" method="post">
                    @csrf
                    <div>
                        <input class="mt-3 form-control form-control-lg" name="title" type="text"
                               placeholder="Title" autofocus required>
                    </div>

                    @error('title')
                    <div class="alert alert-danger">
                        Title salah
                    </div>
                    @enderror

                    <div>
                        <input class="mt-3 form-control form-control-lg" name="isi" type="text"
                               placeholder="Isi" autofocus required>
                    </div>

                    @error('isi')
                    <div class="alert alert-danger">
                        Password Salah
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
{{-- <div class="container position-center">
    <div class="row page-bg">
        <div class="p-4 col-md-12">
            <div class="text-center top-icon">
                <h1 class="mt-3">Tutorial</h1>
                <br>
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif

                @if (Session::has('wrongUsername'))
                    <div class="alert alert-danger">{{ Session::get('wrongUsername') }}</div>
                @endif

                <form id="form-login" action="{{ route('artikel.buat-data') }}" method="post">
                    @csrf
                    <div>
                        <input class="mt-3 form-control form-control-lg" name="title" type="text"
                               placeholder="Title" autofocus required>
                    </div>

                    @error('title')
                    <div class="alert alert-danger">
                        Title salah
                    </div>
                    @enderror

                    <div>
                        <input class="mt-3 form-control form-control-lg" name="isi" type="text"
                               placeholder="Isi" autofocus required>
                    </div>

                    @error('isi')
                    <div class="alert alert-danger">
                        Password Salah
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
</div> --}}
@endsection
{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create Data</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>
<center>
    <div class="container-fluid">
        <div class="container position-center">
            <div class="row page-bg">
                <div class="p-4 col-md-12">
                    <div class="text-center top-icon">
                        <h1 class="mt-3">Tutorial</h1>
                        <br>
                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        @if (Session::has('wrongUsername'))
                            <div class="alert alert-danger">{{ Session::get('wrongUsername') }}</div>
                        @endif

                        <form id="form-login" action="{{ route('artikel.buat-data') }}" method="post">
                            @csrf
                            <div>
                                <input class="mt-3 form-control form-control-lg" name="title" type="text"
                                       placeholder="Title" autofocus required>
                            </div>

                            @error('title')
                            <div class="alert alert-danger">
                                Title salah
                            </div>
                            @enderror

                            <div>
                                <input class="mt-3 form-control form-control-lg" name="isi" type="text"
                                       placeholder="Isi" autofocus required>
                            </div>

                            @error('isi')
                            <div class="alert alert-danger">
                                Password Salah
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
    </div>
</center>
</body>
</html> --}}
