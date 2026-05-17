<?= $this->extend('main_layout') ?>

<?= $this->section('main_content') ?>
<div class="content-body bg-white">

    <section id="hero-area" class="pt-5 pb-4">
        <div class="col-xl-11 col-12 mx-auto">
            <div class="row align-items-center">

                <div class="col-md-7 text-left order-2 order-md-1 animated fadeInLeft">
                    <span class="mb-2 d-inline-block font-small-3 text-bold-600" style="background:rgba(0,188,212,.1); color:#00838f; border:1px solid rgba(0,188,212,.3); border-radius:20px; padding:5px 14px;">
                        <i class="la la-graduation-cap" style="color:#00bcd4;"></i>&nbsp; Tugas Akhir Kelompok 7 — Polmed
                    </span>

                    <h1 class="font-weight-bold mb-2" style="font-size: 2.6rem; line-height: 1.2; color: #1e2129;">
                        Bingung Pilih <span class="cyan">Smartphone</span>?<br>Kami Bantu Carikan.
                    </h1>

                    <p class="text-muted mt-3 mb-4" style="font-size: 1.05rem; max-width: 88%; line-height: 1.7;">
                        Jawab beberapa pertanyaan singkat tentang kebutuhan dan budgetmu, lalu biarkan sistem kami yang berbasis
                        <strong>K-Means Clustering</strong> mencarikan pilihan terbaik dari ratusan data smartphone.
                    </p>

                    <div class="mt-3">
                        <a href="<?= base_url('/consultation') ?>" class="btn btn-cyan btn-glow btn-lg round px-3 mr-1 mb-2">
                            <i class="la la-comments-o"></i> Mulai Konsultasi
                        </a>
                        <a href="<?= base_url('/compare') ?>" class="btn btn-outline-cyan btn-lg round px-2 mb-2">
                            <i class="la la-columns"></i> Bandingkan HP
                        </a>
                    </div>

                    <p class="text-muted font-small-3 mt-3">
                        <i class="la la-database cyan"></i> Dataset berisi ratusan smartphone dari berbagai merek &amp; segmen harga.
                    </p>
                </div>

                <div class="col-md-5 text-center order-1 order-md-2 mb-4 mb-md-0 animated fadeInRight">
                    <div class="hero-img-wrap">
                        <div class="hero-bg-circle"></div>
                        <img src="<?= base_url('assets/images/figur.jpg') ?>"
                             alt="Ilustrasi Smartphone Expert System"
                             class="hero-img img-fluid">
                        <div class="hero-badge hero-badge-top">
                            <i class="la la-star cyan"></i> Spec Score AI
                        </div>
                        <div class="hero-badge hero-badge-bottom">
                            <i class="la la-sitemap cyan"></i> K-Means Clustering
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    
    <section class="row pt-5 pb-5 bg-gradient-directional-light border-top border-bottom" style="border-color:#eee!important;">
        <div class="col-xl-10 col-12 mx-auto">

            <div class="text-center mb-5 animated fadeInUp">
                <h6 class="cyan text-bold-600 text-uppercase" style="letter-spacing:3px; font-size:.75rem;">Apa yang Bisa Kamu Lakukan</h6>
                <h2 class="font-weight-bold" style="color:#1e2129; font-size:1.9rem;">Tiga Fitur Utama</h2>
            </div>

            <div class="row match-height">

                
                <div class="col-md-4 mb-4 animated fadeInUp" style="animation-delay:.1s;">
                    <div class="card box-shadow-2 pull-up border-top-cyan border-top-3 h-100">
                        <div class="card-body text-center py-4">
                            <div class="mb-3">
                                <div class="icon-box icon-box-cyan">
                                    <i class="la la-comments"></i>
                                </div>
                            </div>
                            <h4 class="text-bold-700 mb-1">Konsultasi AI</h4>
                            <p class="text-muted font-small-3 mb-3">
                                Jawab 5 pertanyaan singkat soal budget, kebutuhan, dan selera — sistem langsung merekomendasikan HP yang pas.
                            </p>
                            <a href="<?= base_url('/consultation') ?>" class="btn btn-cyan round btn-sm px-3">
                                Mulai Sekarang <i class="la la-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

               
                <div class="col-md-4 mb-4 animated fadeInUp" style="animation-delay:.25s;">
                    <div class="card box-shadow-2 pull-up border-top-info border-top-3 h-100">
                        <div class="card-body text-center py-4">
                            <div class="mb-3">
                                <div class="icon-box icon-box-info">
                                    <i class="la la-columns"></i>
                                </div>
                            </div>
                            <h4 class="text-bold-700 mb-1">Bandingkan HP</h4>
                            <p class="text-muted font-small-3 mb-3">
                                Pilih 2–3 smartphone dan lihat perbandingan spesifikasi lengkapnya secara berdampingan — dari prosesor hingga kamera.
                            </p>
                            <a href="<?= base_url('/compare') ?>" class="btn btn-info round btn-sm px-3">
                                Coba Compare <i class="la la-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            
                <div class="col-md-4 mb-4 animated fadeInUp" style="animation-delay:.4s;">
                    <div class="card box-shadow-2 pull-up border-top-teal border-top-3 h-100">
                        <div class="card-body text-center py-4">
                            <div class="mb-3">
                                <div class="icon-box icon-box-teal">
                                    <i class="la la-database"></i>
                                </div>
                            </div>
                            <h4 class="text-bold-700 mb-1">Eksplorasi Dataset</h4>
                            <p class="text-muted font-small-3 mb-3">
                                Lihat seluruh data smartphone yang ada di database, lengkap dengan spec score, cluster, dan harga terkini.
                            </p>
                            <a href="<?= base_url('/dataset') ?>" class="btn btn-teal round btn-sm px-3">
                                Lihat Dataset <i class="la la-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="row pt-5 pb-5">
        <div class="col-xl-10 col-12 mx-auto">
            <div class="text-center mb-5 animated fadeInUp">
                <h6 class="cyan text-bold-600 text-uppercase" style="letter-spacing:3px; font-size:.75rem;">Prosesnya Simpel</h6>
                <h2 class="font-weight-bold" style="color:#1e2129; font-size:1.9rem;">Cara Kerjanya</h2>
            </div>

            <div class="row text-center">
                <div class="col-md-3 mb-4 animated fadeInUp" style="animation-delay:.1s;">
                    <div class="mb-3">
                        <span class="badge badge-pill bg-gradient-directional-cyan white px-3 py-2 font-medium-3 box-shadow-1">1</span>
                    </div>
                    <h5 class="text-bold-700">Jawab Pertanyaan</h5>
                    <p class="text-muted font-small-3">Budget, kebutuhan harian, dan fitur yang kamu prioritaskan.</p>
                </div>
                <div class="col-md-3 mb-4 animated fadeInUp" style="animation-delay:.2s;">
                    <div class="mb-3">
                        <span class="badge badge-pill bg-gradient-directional-cyan white px-3 py-2 font-medium-3 box-shadow-1">2</span>
                    </div>
                    <h5 class="text-bold-700">Sistem Analisis</h5>
                    <p class="text-muted font-small-3">K-Means mengelompokkan data dan mencari cluster yang paling cocok denganmu.</p>
                </div>
                <div class="col-md-3 mb-4 animated fadeInUp" style="animation-delay:.3s;">
                    <div class="mb-3">
                        <span class="badge badge-pill bg-gradient-directional-cyan white px-3 py-2 font-medium-3 box-shadow-1">3</span>
                    </div>
                    <h5 class="text-bold-700">Dapat Rekomendasi</h5>
                    <p class="text-muted font-small-3">Muncul daftar HP terbaik berdasarkan spec score tertinggi di cluster kamu.</p>
                </div>
                <div class="col-md-3 mb-4 animated fadeInUp" style="animation-delay:.4s;">
                    <div class="mb-3">
                        <span class="badge badge-pill bg-gradient-directional-cyan white px-3 py-2 font-medium-3 box-shadow-1">4</span>
                    </div>
                    <h5 class="text-bold-700">Bandingkan &amp; Pilih</h5>
                    <p class="text-muted font-small-3">Gunakan fitur Compare untuk memastikan pilihan terbaikmu sebelum beli.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="row pt-5 pb-5 bg-gradient-directional-light border-top" style="border-color:#eee!important;">
        <div class="col-xl-10 col-12 mx-auto">

            <div class="text-center mb-5 animated fadeInUp">
                <h6 class="cyan text-bold-600 text-uppercase" style="letter-spacing:3px; font-size:.75rem;">Di Balik Layar</h6>
                <h2 class="font-weight-bold" style="color:#1e2129; font-size:1.9rem;">Tim Pengembang</h2>
                <p class="text-muted">TRPL — Politeknik Negeri Medan, Tugas Akhir Semester 4</p>
            </div>

            <div class="row match-height text-center justify-content-center">

                <div class="col-md-4 col-sm-6 mb-4 animated fadeInUp" style="animation-delay:.15s;">
                    <div class="card box-shadow-2 pull-up border-top-info border-top-3">
                        <div class="card-body py-4">
                            <img src="<?= base_url('assets/images/joxtian.jpeg') ?>" alt="Joxtian"
                                 class="img-fluid rounded-circle box-shadow-1 mb-3"
                                 style="width:100px; height:100px; object-fit:cover; border:3px solid #17a2b8;">
                            <h5 class="text-bold-700 mb-0">Joxtian M. Tua Sirait</h5>
                            <p class="text-muted font-small-3 mt-1 mb-0">Anggota Kelompok 7</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4 animated fadeInUp" style="animation-delay:.3s;">
                    <div class="card box-shadow-2 pull-up border-top-teal border-top-3">
                        <div class="card-body py-4">
                            <img src="<?= base_url('assets/images/brian.jpeg') ?>" alt="Brian"
                                 class="img-fluid rounded-circle box-shadow-1 mb-3"
                                 style="width:100px; height:100px; object-fit:cover; border:3px solid #20c997;">
                            <h5 class="text-bold-700 mb-0">Brian Decon Silaban</h5>
                            <p class="text-muted font-small-3 mt-1 mb-0">Anggota Kelompok 7</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4 animated fadeInUp" style="animation-delay:.45s;">
                    <div class="card box-shadow-2 pull-up border-top-cyan border-top-3">
                        <div class="card-body py-4">
                            <img src="<?= base_url('assets/images/leo.jpeg') ?>" alt="Leo"
                                 class="img-fluid rounded-circle box-shadow-1 mb-3"
                                 style="width:100px; height:100px; object-fit:cover; border:3px solid #00bcd4;">
                            <h5 class="text-bold-700 mb-0">Leo Perangin-angin</h5>
                            <p class="text-muted font-small-3 mt-1 mb-0">Anggota Kelompok 7</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

   
    <section class="row py-5">
        <div class="col-xl-8 col-lg-10 col-12 mx-auto text-center animated fadeInUp">
            <h2 class="font-weight-bold mb-2" style="color:#1e2129;">Siap nemuin HP yang pas?</h2>
            <p class="text-muted mb-4">Mulai konsultasi sekarang, gratis dan tanpa perlu daftar.</p>
            <a href="<?= base_url('/consultation') ?>" class="btn btn-cyan btn-glow btn-lg round px-4 box-shadow-2 mr-2">
                <i class="la la-comments-o"></i> Konsultasi Sekarang
            </a>
            <a href="<?= base_url('/compare') ?>" class="btn btn-outline-cyan btn-lg round px-3">
                <i class="la la-columns"></i> Compare HP
            </a>
        </div>
    </section>

</div>

<style>

.icon-box {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 68px;
    height: 68px;
    border-radius: 16px;
    font-size: 2rem;
    margin: 0 auto;
}
.icon-box-cyan { background: rgba(0,188,212,.12); color: #00bcd4; }
.icon-box-info  { background: rgba(23,162,184,.12); color: #17a2b8; }
.icon-box-teal  { background: rgba(32,201,151,.12); color: #20c997; }
.icon-box i { line-height: 1; }


.hero-img-wrap {
    position: relative;
    display: inline-block;
    width: 100%;
    max-width: 480px;
}

.hero-bg-circle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80%;
    height: 80%;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(0,188,212,.08) 0%, rgba(0,188,212,.03) 60%, transparent 100%);
    z-index: 0;
    animation: pulse-glow 4s ease-in-out infinite;
}
@keyframes pulse-glow {
    0%, 100% { transform: translate(-50%, -50%) scale(1);   opacity: .8; }
    50%       { transform: translate(-50%, -50%) scale(1.08); opacity: 1; }
}
.hero-img {
    position: relative;
    z-index: 1;
    
    animation: float-img 5s ease-in-out infinite;
    max-width: 100%;
}
@keyframes float-img {
    0%, 100% { transform: translateY(0); }
    50%       { transform: translateY(-12px); }
}
.hero-badge {
    position: absolute;
    z-index: 2;
    background: #fff;
    border: 1.5px solid rgba(0,188,212,.35);
    border-radius: 20px;
    padding: 6px 14px;
    font-size: .8rem;
    font-weight: 700;
    color: #333;
    box-shadow: 0 4px 16px rgba(0,188,212,.15);
    white-space: nowrap;
}
.hero-badge-top    {
    top: 18%;
    right: 0%;
    animation: float-badge 3.5s ease-in-out infinite;
}
.hero-badge-bottom {
    bottom: 18%;
    left: 0%;
    animation: float-badge 3.5s ease-in-out 1.5s infinite;
}
@keyframes float-badge {
    0%, 100% { transform: translateY(0); }
    50%       { transform: translateY(-7px); }
}
</style>
<?= $this->endSection() ?>