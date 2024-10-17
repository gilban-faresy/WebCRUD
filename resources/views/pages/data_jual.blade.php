@extends('templates.app')

@section('content-dinamis')
    <div class="container mt-5">
        <div class="d-flex justify-content-end mb-3">
            <!-- Form Search -->
            <form class="d-flex me-3" action="{{ route('data_jual.data') }}" method="GET">
                <input type="text" name="cari" placeholder="Cari Nama Akun..." class="form-control me-2" value="{{ Request::get('cari') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            <a href="{{ route('data_jual.tambah') }}" class="btn btn-success">+ Tambah</a>
        </div>

        <!-- Alert jika ada pesan sukses -->
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <!-- Grid Akun yang Dijual -->
        <div class="row">
            @if ($diamonds->isEmpty())
                <div class="col-12">
                    <div class="alert alert-warning text-center">Tidak Ada Data Akun Yang Dijual</div>
                </div>
            @else
                @foreach ($diamonds as $item)
                    <div class="col-md-3 mb-4"> <!-- Setiap kolom 3, 4 kolom dalam satu baris -->
                        <div class="card shadow-sm h-100" style="max-width: 250px;"> <!-- Ukuran maksimal diperpendek -->
                            <img src="{{ asset('storage/photo-akun/'.$item->image) }}" alt="{{ $item->name }}" class="card-img-top" style="height: 120px; object-fit: cover;"> <!-- Ukuran gambar diperkecil -->
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                {{-- <p class="text-muted mb-1">Bid terakhir:</p> --}}
                                <h6 class="text-danger mb-2">Rp. {{ number_format($item->price, 0, ',', '.') }}</h6>
                                <p class="text-success">Pengiriman Instan</p>
                                <span class="badge bg-info text-dark">Anti Hackback</span>
                                <p class="mt-3">{{ $item->description }}</p>
                                {{-- <p class="text-muted">{{ $item->bids_count }} bid - {{ $item->time_left }} jam</p> --}}
                                <!-- Tombol Edit dan Hapus -->
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('data_jual.ubah', $item->id) }}" class="btn btn-primary me-2">Edit</a>
                                    <button class="btn btn-danger" onclick="showModalDelete('{{ $item->id }}', '{{ $item->name }}')">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (($loop->index + 1) % 4 == 0) <!-- Setelah setiap 4 kartu, tambahkan div baru untuk baris baru -->
                        </div><div class="row">
                    @endif
                @endforeach
            @endif
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $diamonds->links() }}
        </div>
    </div>

    <!-- Modal Hapus-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data akun <b id="nama_akun"></b>?
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
            // memasukkan teks dari parameter ke html bagian id="nama_akun"
            $("#nama_akun").text(name);
            // memanggil route hapus
            let url = "{{ route('data_jual.hapus', ':id') }}";
            // isi path dinamis :id dari data parameter id
            url = url.replace(':id', id);
            // action="" di form diisi dengan url diatas
            $("form").attr("action", url);
            // memunculkan modal dengan id="exampleModal"
            $("#exampleModal").modal('show');
        }
    </script>
@endpush
