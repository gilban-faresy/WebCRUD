@extends('templates.app')


@section('content-dinamis')
{{-- <div class="container">
    <h1>Create</h1>
</div> --}}

<form action="{{ route('data_jual.ubah.proses', $diamond['id'])}}" method="POST" class="card p-5" enctype="multipart/form-data">
    {{-- @csrf adalah sebuah token --}}
    @csrf
    @method('PATCH')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama Akun </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $diamond['name'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Harga: </label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="price" name="price" value="{{ $diamond['price'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="stock" class="col-sm-2 col-form-label">Deskripsi akun : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="description" name="description" value="{{ $diamond['description'] }}">
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
