@extends('templates.app')

@section('content-dinamis')
<div class="home-container">
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-overlay">
            <div class="hero-text">
                <h1>Jual dan Beli Akun Mobile Legends dengan Aman</h1>
                <p>Cari akun Mobile Legends impian Anda atau jual akun Anda dengan cepat dan aman melalui platform kami.</p>
                <a href="#tentang-kami" class="btn-cta">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </div>
</div>


        <!-- Tentang Kami Section -->
        <section id="tentang-kami" class="about-us">
            <h2>Tentang Layanan Kami</h2>
            <p>
                Kami menyediakan platform terpercaya bagi para pemain Mobile Legends yang ingin menjual atau membeli akun game mereka. Dengan sistem yang aman dan proses transaksi yang cepat, Anda dapat dengan mudah menemukan akun yang sesuai dengan keinginan atau menjual akun Anda dengan harga terbaik.
            </p>
            <div class="community-image">
                <img src="{{ asset('image/MB logo.png') }}" alt="Tentang Kami" />
            </div>
        </section>

        <!-- Keuntungan Jual Beli Akun Section -->
        <section class="benefits">
            <h2>Keuntungan Menggunakan Layanan Kami</h2>
            <div class="benefit-grid">
                <div class="benefit-card">
                    <img src="{{ asset('image/diamond.jpeg') }}" alt="Transaksi Aman" class="benefit-img"  />
                    <div class="benefit-info">
                        <h3>Transaksi Aman</h3>
                        <p>Kami menjamin keamanan transaksi dengan sistem perlindungan yang terpercaya sehingga pembeli dan penjual dapat bertransaksi dengan tenang.</p>
                    </div>
                </div>
                <div class="benefit-card">
                    <img src="{{ asset('image/diamond.jpeg') }}" alt="Pengiriman Instan" class="benefit-img" />
                    <div class="benefit-info">
                        <h3>Pengiriman Instan</h3>
                        <p>Setelah transaksi selesai, akun akan dikirim secara instan kepada pembeli tanpa perlu menunggu lama.</p>
                    </div>
                </div>
                <div class="benefit-card">
                    <img src="{{ asset('image/diamond.jpeg') }}" alt="Harga Terbaik" class="benefit-img" />
                    <div class="benefit-info">
                        <h3>Harga Terbaik</h3>
                        <p>Penjual dapat menetapkan harga yang kompetitif, sementara pembeli bisa mendapatkan akun dengan harga yang bersaing.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cara Kerja Section -->
        <section class="how-it-works">
            <h2>Cara Kerja</h2>
            <div class="steps-grid">
                <div class="step-card">
                    <h3>1. Buat Akun</h3>
                    <p>Daftar di platform kami dan mulai menjual atau membeli akun Mobile Legends dengan mudah.</p>
                </div>
                <div class="step-card">
                    <h3>2. Pilih Akun</h3>
                    <p>Telusuri berbagai pilihan akun Mobile Legends dengan berbagai tier, skin, dan hero yang tersedia.</p>
                </div>
                <div class="step-card">
                    <h3>3. Selesaikan Transaksi</h3>
                    <p>Gunakan metode pembayaran yang aman dan kami akan memastikan transaksi berjalan lancar.</p>
                </div>
                <div class="step-card">
                    <h3>4. Nikmati Akun Anda</h3>
                    <p>Setelah pembayaran selesai, akun Anda akan segera dikirimkan. Anda dapat langsung bermain dengan akun baru Anda.</p>
                </div>
            </div>
        </section>

        <!-- Bergabung dengan Kami Section -->
        <section class="join-us">
            <h2>Bergabunglah dengan Kami</h2>
            <p>
                Siap menjual akun Anda atau membeli akun Mobile Legends? Daftar sekarang dan mulailah menikmati kemudahan serta keamanan bertransaksi di platform kami.
            </p>
            <a href="#hubungi-kami" class="btn-join">Daftar Sekarang</a>
        </section>

        <!-- Hubungi Kami Section -->
        <section id="hubungi-kami" class="contact-us">
            <h2>Hubungi Kami</h2>
            <p>Jika Anda memiliki pertanyaan tentang cara jual beli akun atau membutuhkan bantuan, jangan ragu untuk menghubungi kami melalui email atau media sosial kami.</p>
            <ul class="contact-info">
                <li>Email: support@jualakunml.com</li>
                <li>Instagram: @jualakunmlbb</li>
                <li>Facebook: Jual Beli Akun MLBB</li>
            </ul>
        </section>
    </div>
@endsection

@push('style')
    <style>
        /* Home Page Styling */
       /* Container yang membatasi lebar hero section */
.home-container {
    max-width: 1200px; /* Ukuran maksimal yang diinginkan untuk container */
    margin: 0 auto; /* Agar center di tengah */
    padding: 0 20px; /* Menambahkan padding kiri dan kanan */
}

/* Hero Section */
.hero {
    position: relative;
    width: 100%;
    height: 82vh; /* Tinggi sesuai keinginan */
    background: url('{{ asset('image/download.jpeg') }}') no-repeat center center/cover; /* Gambar menjadi full cover */
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px; /* Tambahkan border-radius jika diperlukan */
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6); /* Memberikan efek overlay gelap pada gambar */
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: inherit; /* Mengikuti bentuk border-radius dari hero */
}

.hero-text {
    color: white;
    text-align: center;
    z-index: 1; /* Agar teks berada di depan overlay */
}

.hero-text h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

.hero-text p {
    font-size: 20px;
    margin-bottom: 20px;
}

.btn-cta {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 18px;
    transition: background-color 0.3s;
}

.btn-cta:hover {
    background-color: #0056b3;
}


        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        /* Tentang Kami Section */
        .about-us {
            padding: 40px 0;
            text-align: center;
        }

        .about-us h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .about-us p {
            font-size: 18px;
            margin-bottom: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .community-image img {
            width: 50%;
            height: auto;
            border-radius: 10px;
        }

        /* Keuntungan Section */
        .benefits {
            padding: 40px 0;
            background-color: #f8f9fa;
        }

        .benefits h2 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 40px;
        }

        .benefit-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .benefit-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .benefit-card:hover {
            transform: translateY(-10px);
        }

        .benefit-img {
            width: 100%;
            height: 170px;
            /* object-fit: cover; */
            border-radius: 5px;
            margin-bottom: 15px;
        }

        /* Cara Kerja Section */
        .how-it-works {
            padding: 40px 0;
            background-color: #f8f9fa;
        }

        .how-it-works h2 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 40px;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .step-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .step-card h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .step-card p {
            font-size: 16px;
            color: #555;
        }

        /* Bergabung dengan Kami Section */
        .join-us {
            padding: 60px 0;
            text-align: center;
        }

        .join-us h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .join-us p {
            font-size: 18px;
            max-width: 800px;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        .btn-join {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .btn-join:hover {
            background-color: #218838;
        }

        /* Hubungi Kami Section */
        .contact-us {
            padding: 40px 0;
            text-align: center;
        }

        .contact-us h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .contact-info {
            list-style-type: none;
            padding: 0;
            font-size: 18px;
        }

        .contact-info li {
            margin-bottom: 10px;
        }
    </style>
@endpush
