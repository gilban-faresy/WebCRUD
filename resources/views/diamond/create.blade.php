{{--  berfungsi untuk menunjukkan bahwa view ini menggunakan layout --}}
@extends('templates.app')

{{-- berfungsi untuk mendefinisikan bagian konten yang dapat diisi secara dinamis dalam sebuah layout di Laravel Blade --}}
@section('content-dinamis')
{{-- <div class="container">
    <h1>Create</h1>
</div> --}}

<form action="{{ route('data_jual.tambah.proses')}}" class="card p-5" method="POST" enctype="multipart/form-data">
    {{-- untuk ngepastikan bahwa permintaan tersebut dibuat oleh pengguna yg sah/formulir yg valid --}}
    @csrf

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- Session::get('success') digunakan untuk mendapatkan data sesi yang disimpan di server. --}}

    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>

    @endif
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">harga : </label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="stock" class="col-sm-2 col-form-label">Deskripsi akun : </label>
        <div class="col-sm-10">
            <textarea type="text" class="form-control" id="description" name="description" value="{{ old('description') }}"></textarea>
            <small>masukan no wa yang aktif untuk kebutuhan komunikasi</small>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="stock" class="col-sm-2 col-form-label">Foto profil akun : </label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="image" name="image" >
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
</form>
@endsection
