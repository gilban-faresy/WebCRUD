@extends('templates.app')

@section('content-dinamis')
    <div class="container mt-5">
        <div class="d-flex justify-content-end">
            <form class="d-flex me-3" action="{{ route('kelola_akun.data') }}" method="GET">
                {{-- 1. tag form harus ada action sama method
                    2. value method GET/POST
                        - GET : form yg fungsinya untuk mencari
                        - POST : form yg fungsinya untuk menambah/menghapus/mengubah
                    3. input harus ada attr name, name => mengambil data dr isian input agar bisa di proses di controller
                    4. ada button/input yg type="submit"
                    5. action
                        - form untuk mencari : action ambil route yg menampilkan halaman blade ini (return view blade ini)
                        - form bukan mencari : action terpisah dengan route return view bladenya
                 --}}
                {{-- @if (Request::get('sort_stock') == 'stock')
                    <input type="hidden" name="sort_stock" value="stock">
                @endif --}}
                <input type="text" name="cari" placeholder="Cari Nama Akun..." class="form-control me-2">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            {{-- <form action="{{ route('kelola_akun.data') }}" method="GET" class="me-2">
                <input type="hidden" name="sort_stock" value="stock">
                <button type="submit" class="btn btn-primary">Urutkan Akun</button>
            </form> --}}
            {{-- <button class="btn btn-success">+ Tambah</button> --}}

            <a href="{{ route('kelola_akun.tambah') }}" class="btn btn-success">+ Tambah</a>
        </div>
        <br>
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-stripped table-bordered mt-3 text-center">
            <thead>
                <th>No</th>
                <th>Nama Akun</th>
                <th>Email</th>
                <th>No.handphone</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                {{-- jika data obat kosong --}}
                @if (count($users) < 0)
                    <tr>
                        <td colspan="6">Data Akun Kosong</td>
                    </tr>
                @else
                    {{-- $medicines : dari compact controller nya, diakses dengan loop karna data $medicines banyak (array) --}}
                    @foreach ($users as $index => $item)
                        <tr>
                            <td>{{ ($users->currentPage() - 1) * $users->perpage() + ($index + 1) }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['wa'] }}</td>
                            {{-- <td>Rp. {{ number_format($item['price'], 0, ',', '.') }}</td> --}}
                            {{-- $item['column_di_migration'] --}}
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('kelola_akun.ubah', $item['id']) }}" class="btn btn-primary me-2">Edit</a>
                                {{-- showModalDelete mengirimkan data id untuk spesifik data yg dihapus, name untuk nama obat didalam modal --}}
                                <button class="btn btn-danger"
                                    onclick="showModalDelete('{{ $item->id }}', '{{ $item->name }}')">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        {{-- memanggil pagination --}}
        <div class="d-flex justify-content-end my-3">
            {{ $users->links() }}
        </div>

        <!-- Modal Hapus-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="">
                    {{-- action kosong, diisi melalui  js karna id dikirim  ke js nya --}}
                    @csrf
                    {{-- menimpa method="POST" jadi DELETE sesuai web.php http-method --}}
                    @method('DELETE')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- konten dinamis pada teks ini bagian nama obat, sehingga nama obatnya disediakan tempat penyimpanan {tag b} --}}
                        apakah anda yakin ingin menghapus akun tersebut? <b id="nama_obat"></b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>

    @endsection

    @push('script')

        <script>
            function showModalDelete(id, name) {
                // memasukan teks dari parameter ke html bagian id="nama_obat"
                $("#nama_obat").text(name);
                // memanggil route hapus
                let url = "{{ route('kelola_akun.hapus', ':id') }}";
                // isi path dinamis :id dari data parameter id
                url = url.replace(':id', id);
                // action="" di form diisi dengan url diatas
                $("form").attr("action", url);
                // memunculkan modal dengan id="exampleModal"
                $("#exampleModal").modal('show');
            }


        </script>
    @endpush
