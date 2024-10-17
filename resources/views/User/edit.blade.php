@extends('templates.app')


@section('content-dinamis')
{{-- <div class="container">
    <h1>Create</h1>
</div> --}}

<form action="{{ route('kelola_akun.ubah.proses', $user['id'])}}" method="POST" class="card p-5">
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
        <label for="name" class="col-sm-2 col-form-label">Nama Obat: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Email : </label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label"> Ubah Password : </label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label"> Ubah Nomor telphone </label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="wa" name="wa" value="{{ $user['wa'] }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
</form>
@endsection
