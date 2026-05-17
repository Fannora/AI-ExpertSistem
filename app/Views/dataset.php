<?= $this->extend('main_layout') ?>

<?= $this->section('main_content') ?>
<div class="content-body">
    <div class="card border-top-cyan border-top-3">
        <div class="card-header border-bottom">
            <h4 class="card-title">Database Dataset Smartphone (K-Means Normalized)</h4>
        </div>
        <div class="card-body mt-2">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr class="bg-light text-center">
                            <th>Brand</th><th>Model</th><th>Harga</th><th>Cluster</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($smartphones as $hp): ?>
                        <tr>
                            <td><?= $hp['brand_name'] ?></td>
                            <td><?= $hp['model'] ?></td>
                            <td class="text-right">Rp <?= number_format($hp['price_idr'], 0, ',', '.') ?></td>
                            <td class="text-center"><span class="badge badge-info px-2"><?= $hp['cluster'] ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>