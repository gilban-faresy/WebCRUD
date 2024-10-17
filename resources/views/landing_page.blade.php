@extends('templates.app')

@section('content-dinamis')
    <div class="container mt-5">
        <div class="d-flex justify-content-end mb-3">
            <!-- Form Search -->
            <form class="d-flex me-3" action="{{ route('landing_page') }}" method="GET">
                <input type="text" name="cari" placeholder="Cari Nama Akun..." class="form-control me-2" value="{{ Request::get('cari') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            {{-- <a href="{{ route('data_jual.tambah') }}" class="btn btn-success">+ Tambah</a> --}}
        </div>

        <!-- Alert jika ada pesan sukses -->
        {{-- @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif --}}

        <!-- Grid Akun yang Dijual -->
        <div class="row">
            @if ($diamonds->isEmpty())
                <div class="col-12">
                    <div class="alert alert-warning text-center">Tidak Ada Akun Yang Dijual</div>
                </div>
            @else
                @foreach ($diamonds as $item)
                    <div class="col-md-3 mb-4"> <!-- Setiap kolom 3, 4 kolom dalam satu baris -->
                        <div class="card shadow-sm h-100" style="max-width: 250px; position: relative;"> <!-- Ukuran maksimal diperpendek -->
                            <img src="{{ asset('storage/photo-akun/'.$item->image) }}" alt="{{ $item->name }}" class="card-img-top" style="height: 120px; object-fit: cover;"> <!-- Ukuran gambar diperkecil -->
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <h6 class="text-danger mb-2">Rp. {{ number_format($item->price, 0, ',', '.') }}</h6>
                                <p class="text-success">Pengiriman Instan</p>
                                <span class="badge bg-info text-dark">Anti Hackback</span>
                            </div>

                            <!-- Deskripsi yang muncul saat hover -->
                            <div class="card-description">
                                <p>{{ $item->description }}</p>
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

<!-- Bagian CSS dan Script tambahan -->
@push('style')

    <style>
        .card {
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);

        }

        /* Deskripsi yang muncul ketika hover */
        .card-description {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 14px;
        }

        /* Menampilkan deskripsi saat hover */
        .card:hover .card-description {
            opacity: 4;
            border-radius: 5px;
        }
    </style>
    @endpush

@push('script')
    <script>

    </script>
@endpush
