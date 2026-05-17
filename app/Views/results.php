<?= $this->extend('main_layout') ?>
<?php

function formatStorage($ram, $memory) {
    $r = (float) $ram;
    $m = (float) $memory;
    $ramStr = ($r == (int)$r) ? (int)$r : $r;
    if ($m <= 2) {
        $tbStr = ($m == (int)$m) ? (int)$m : $m;
        return $ramStr . '/' . $tbStr . ' TB';
    }
    return $ramStr . '/' . (int)$m . ' GB';
}
?>

<?= $this->section('main_content') ?>
<div class="content-body bg-white pb-5"> 

    <div class="row pt-4 pb-3 bg-gradient-directional-teal box-shadow-2">
        <div class="col-xl-10 col-12 mx-auto text-center animated fadeInDown">
            <i class="la la-check-circle white font-large-5 mb-1"></i>
            <h1 class="display-4 white font-weight-bold mb-1 text-uppercase" style="letter-spacing: 1px;">Analisis AI Selesai</h1>
            <p class="lead white font-weight-300">
                Berdasarkan kalkulasi K-Means, preferensi Anda paling cocok dengan:
            </p>
            
            <div class="badge bg-white teal badge-pill px-3 py-1 font-medium-3 text-bold-700 box-shadow-2 mt-1">
                <i class="la la-bullseye"></i> <?= isset($cluster_info['label']) ? $cluster_info['label'] : 'Cluster Smartphone' ?>
            </div>
            <p class="white mt-2 mb-0" style="opacity: 0.9;"><?= isset($cluster_info['desc']) ? $cluster_info['desc'] : 'Kami telah menemukan perangkat terbaik untuk Anda.' ?></p>
        </div>
    </div>

    <?php if(isset($recommendations) && !empty($recommendations)): ?>
    <div class="row mt-5">
        <div class="col-xl-11 col-12 mx-auto">
            
            <h4 class="text-uppercase text-bold-700 cyan mb-2 animated fadeInLeft"><i class="la la-trophy"></i> Rekomendasi Utama (Best Match)</h4>
            
            <?php $top = $recommendations[0]; ?>
            <div class="card box-shadow-3 border-top-cyan border-top-4 mb-5 animated fadeInUp pull-up" style="border-radius: 15px;">
                <div class="card-body p-md-4 bg-white">
                    <div class="row align-items-center">
                        
                        <div class="col-md-5 border-right-blue-grey border-right-lighten-4 pr-md-4">
                            <span class="badge badge-success badge-pill text-uppercase text-bold-600 mb-1 box-shadow-1">#1 K-Means Match</span>
                            
                            <h2 class="display-5 font-weight-bold cyan mb-0 text-truncate">
                                <?= strtoupper($top['brand_name'] ?? 'SMARTPHONE') ?> <?= $top['model'] ?? '' ?>
                            </h2>
                            <h3 class="success text-bold-700 mt-1 mb-2">Rp <?= number_format($top['price_idr'] ?? 0, 0, ',', '.') ?></h3>
                            
                            <div class="mb-3">
                                <?php if(isset($top['has_5G']) && $top['has_5G'] == 1): ?>
                                    <span class="badge badge-info round mr-1 mb-1"><i class="la la-signal"></i> 5G Ready</span>
                                <?php endif; ?>
                                <?php if(isset($top['has_NFC']) && $top['has_NFC'] == 1): ?>
                                    <span class="badge badge-teal round mr-1 mb-1"><i class="la la-credit-card"></i> NFC</span>
                                <?php endif; ?>
                                <span class="badge badge-secondary round mb-1"><?= $top['price_category'] ?? 'Standard' ?></span>
                            </div>

                            <?php $score = $top['spec_score'] ?? 0; ?>
                            <p class="mb-1 text-bold-600">AI Spec Score: <span class="cyan"><?= $score ?>/100</span></p>
                            <div class="progress progress-sm mb-2 box-shadow-1" style="height: 10px; border-radius: 10px;">
                                <div class="progress-bar bg-gradient-directional-cyan" role="progressbar" style="width: <?= $score ?>%" aria-valuenow="<?= $score ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="col-md-7 pl-md-4 mt-3 mt-md-0">
                            <h5 class="text-bold-600 mb-2 border-bottom pb-1"><i class="la la-server"></i> Spesifikasi Teknis Lengkap</h5>
                            <div class="row font-small-3">
                                <div class="col-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="la la-microchip cyan font-medium-2"></i> <strong>Prosesor:</strong><br>
                                            <?= $top['processor_name'] ?? 'Prosesor Handal' ?> <br>
                                            <span class="text-muted">(<?= $top['num_core'] ?? '8' ?> Cores @ <?= $top['processor_speed'] ?? '2.0' ?> GHz)</span>
                                        </li>
                                        <li class="mb-2"><i class="la la-database cyan font-medium-2"></i> <strong>Penyimpanan:</strong><br>
                                            <span class="font-weight-bold"><?= formatStorage($top['ram'] ?? 0, $top['memory'] ?? 0) ?></span>
                                        </li>
                                        <li class="mb-1"><i class="la la-battery-full cyan font-medium-2"></i> <strong>Daya & Baterai:</strong><br>
                                            <?= $top['battery_capacity_mah'] ?? '0' ?> mAh <br>
                                            <span class="text-muted">Fast Charging <?= $top['fast_charging_w'] ?? '0' ?>W</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="la la-camera cyan font-medium-2"></i> <strong>Kamera:</strong><br>
                                            Utama: <?= $top['rear_camera'] ?? '0' ?> MP <br>
                                            Depan: <?= $top['front_camera'] ?? '0' ?> MP
                                        </li>
                                        <li class="mb-2"><i class="la la-desktop cyan font-medium-2"></i> <strong>Layar Utama:</strong><br>
                                            <?= $top['screen_size'] ?? '0' ?> Inci <br>
                                            <span class="text-muted">Refresh Rate <?= $top['refresh_rate'] ?? '60' ?> Hz</span>
                                        </li>
                                        <li class="mb-1"><i class="la la-android cyan font-medium-2"></i> <strong>Sistem Operasi:</strong><br>
                                            <?= $top['os'] ?? 'Android OS' ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php if(count($recommendations) > 1): ?>
            <h4 class="text-uppercase text-bold-700 cyan mb-3 mt-5 animated fadeInLeft"><i class="la la-list"></i> Rekomendasi Lainnya</h4>
            
            <div class="row match-height">
                <?php for($i = 1; $i < count($recommendations); $i++): $hp = $recommendations[$i]; ?>
                <div class="col-md-4 col-sm-6 mb-4 animated fadeInUp" style="animation-delay: <?= 0.1 * $i ?>s;">
                    <div class="card box-shadow-2 pull-up border-top-info border-top-3 h-100" style="border-radius: 10px;">
                        <div class="card-body">
                            <h5 class="font-weight-bold cyan mb-0 text-truncate">
                                <?= strtoupper($hp['brand_name'] ?? '') ?> <?= $hp['model'] ?? 'Smartphone' ?>
                            </h5>
                            <h4 class="success text-bold-600 mt-1">Rp <?= number_format($hp['price_idr'] ?? 0, 0, ',', '.') ?></h4>
                            
                            <hr class="border-light mt-2 mb-2">
                            
                            <div class="row text-center font-small-3 text-muted mb-2">
                                <div class="col-6 border-right">
                                    <i class="la la-database d-block font-medium-3 cyan mb-1"></i>
                                    <strong><?= formatStorage($hp['ram'] ?? 0, $hp['memory'] ?? 0) ?></strong>
                                </div>
                                <div class="col-6">
                                    <i class="la la-battery-full d-block font-medium-3 cyan mb-1"></i>
                                    <strong><?= $hp['battery_capacity_mah'] ?? '0' ?> mAh</strong>
                                </div>
                            </div>
                            
                            <ul class="list-unstyled font-small-3 text-muted mt-2">
                                <li class="mb-1 text-truncate" title="<?= $hp['processor_name'] ?? 'Prosesor' ?>">
                                    <i class="la la-microchip info"></i> CPU: <?= $hp['processor_name'] ?? 'Prosesor Default' ?>
                                </li>
                                <li class="mb-1">
                                    <i class="la la-camera info"></i> Kamera: <?= $hp['rear_camera'] ?? '0' ?> MP (Utama) / <?= $hp['front_camera'] ?? '0' ?> MP (Selfie)
                                </li>
                                <li class="mb-1">
                                    <i class="la la-desktop info"></i> Layar: <?= $hp['screen_size'] ?? '0' ?> Inci (<?= $hp['refresh_rate'] ?? '60' ?> Hz)
                                </li>
                                <li class="mb-1">
                                    <i class="la la-android info"></i> OS: <?= $hp['os'] ?? 'Android' ?>
                                </li>
                            </ul>
                            
                            <div class="text-center mt-2 pt-2 border-top border-light">
                                <span class="badge badge-pill badge-light-info block">AI Spec Score: <?= $hp['spec_score'] ?? '0' ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            <?php endif; ?>

        </div>
    </div>

    <?php else: ?>
    <div class="row mt-5">
        <div class="col-xl-8 col-12 mx-auto text-center animated fadeInUp">
            <div class="card box-shadow-2 border-top-warning border-top-3">
                <div class="card-body py-5">
                    <i class="la la-exclamation-triangle warning font-large-5 mb-2"></i>
                    <h3 class="text-bold-700">Tidak Ditemukan Kecocokan</h3>
                    <p class="text-muted">Maaf, kami tidak menemukan <i>smartphone</i> dalam database K-Means kami yang sesuai dengan parameter dan budget Anda di cluster ini.</p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row mt-4 mb-5">
        <div class="col-12 text-center">
            <a href="<?= base_url('/consultation') ?>" class="btn btn-outline-cyan btn-lg round px-4 box-shadow-1">
                <i class="la la-refresh"></i> Mulai Konsultasi Ulang
            </a>
        </div>
    </div>

</div>
<?= $this->endSection() ?>