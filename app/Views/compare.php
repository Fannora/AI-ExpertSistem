<?= $this->extend('main_layout') ?>

<?= $this->section('main_content') ?>
<div class="content-body bg-white pb-5">

    <div class="row pt-4 pb-3 bg-gradient-directional-cyan box-shadow-2 mb-4">
        <div class="col-xl-10 col-12 mx-auto text-center animated fadeInDown">
            <i class="la la-columns white font-large-4 mb-1"></i>
            <h1 class="display-4 white font-weight-bold mb-1">Perbandingan Smartphone</h1>
            <p class="lead white font-weight-300 mb-0">
                Cari dan bandingkan hingga <strong>3 smartphone</strong> dari database secara berdampingan.
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-11 col-12 mx-auto">

            <div class="card border-top-cyan border-top-3 box-shadow-2 mb-4 animated fadeInUp">
                <div class="card-header border-bottom bg-white">
                    <h4 class="card-title mb-0"><i class="la la-search cyan"></i> Cari Smartphone untuk Dibandingkan</h4>
                </div>
                <div class="card-body">
                    <div class="row align-items-start">

                        <!-- Slot 1 -->
                        <div class="col-md-4 mb-3">
                            <label class="text-bold-600 font-small-3">
                                <span class="badge badge-pill badge-cyan mr-1">1</span> Smartphone Pertama
                            </label>
                            <div class="search-slot" data-slot="1">
                                <div class="search-input-wrap">
                                    <i class="la la-search search-icon"></i>
                                    <input type="text" id="search-1" class="form-control search-box pl-3"
                                           placeholder="Ketik merek atau model..." autocomplete="off">
                                    <button class="clear-btn" id="clear-1" onclick="clearSlot(1)" style="display:none;" title="Hapus">
                                        <i class="la la-times"></i>
                                    </button>
                                </div>
                                <div class="search-dropdown" id="dropdown-1"></div>
                                <div class="selected-card" id="selected-1" style="display:none;"></div>
                            </div>
                        </div>

                        <!-- Slot 2 -->
                        <div class="col-md-4 mb-3">
                            <label class="text-bold-600 font-small-3">
                                <span class="badge badge-pill badge-cyan mr-1">2</span> Smartphone Kedua
                            </label>
                            <div class="search-slot" data-slot="2">
                                <div class="search-input-wrap">
                                    <i class="la la-search search-icon"></i>
                                    <input type="text" id="search-2" class="form-control search-box pl-3"
                                           placeholder="Ketik merek atau model..." autocomplete="off">
                                    <button class="clear-btn" id="clear-2" onclick="clearSlot(2)" style="display:none;" title="Hapus">
                                        <i class="la la-times"></i>
                                    </button>
                                </div>
                                <div class="search-dropdown" id="dropdown-2"></div>
                                <div class="selected-card" id="selected-2" style="display:none;"></div>
                            </div>
                        </div>

                        <!-- Slot 3 -->
                        <div class="col-md-4 mb-3">
                            <label class="text-bold-600 font-small-3">
                                <span class="badge badge-pill badge-secondary mr-1">3</span> Smartphone Ketiga
                                <span class="text-muted font-small-2">(Opsional)</span>
                            </label>
                            <div class="search-slot" data-slot="3">
                                <div class="search-input-wrap">
                                    <i class="la la-search search-icon"></i>
                                    <input type="text" id="search-3" class="form-control search-box pl-3"
                                           placeholder="Ketik merek atau model..." autocomplete="off">
                                    <button class="clear-btn" id="clear-3" onclick="clearSlot(3)" style="display:none;" title="Hapus">
                                        <i class="la la-times"></i>
                                    </button>
                                </div>
                                <div class="search-dropdown" id="dropdown-3"></div>
                                <div class="selected-card" id="selected-3" style="display:none;"></div>
                            </div>
                        </div>

                    </div>

                    <div class="row mt-2">
                        <div class="col-12 text-right">
                            <button class="btn btn-outline-secondary round mr-1" onclick="resetAll()">
                                <i class="la la-refresh"></i> Reset
                            </button>
                            <button class="btn btn-cyan btn-glow round" onclick="doCompare()">
                                <i class="la la-columns"></i> Bandingkan Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="compare-result" style="display:none;">
                <div class="card box-shadow-2 border-0">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="compare-table">
                                <thead class="bg-gradient-directional-cyan white">
                                    <tr>
                                        <th style="width:22%; min-width:160px;" class="align-middle py-2">
                                            <i class="la la-list"></i> Spesifikasi
                                        </th>
                                        <th class="text-center align-middle py-2" id="th-hp-1">HP 1</th>
                                        <th class="text-center align-middle py-2" id="th-hp-2">HP 2</th>
                                        <th class="text-center align-middle py-2" id="th-hp-3" style="display:none;">HP 3</th>
                                    </tr>
                                </thead>
                                <tbody id="compare-body"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4 mb-2">
                    <a href="<?= base_url('/consultation') ?>" class="btn btn-outline-cyan round px-4 box-shadow-1">
                        <i class="la la-comments"></i> Kembali ke Konsultasi
                    </a>
                </div>
            </div>

            <div id="compare-placeholder" class="text-center py-5">
                <i class="la la-columns cyan" style="font-size: 6rem; opacity: 0.2;"></i>
                <h4 class="text-muted mt-2">Cari dan pilih minimal 2 smartphone di atas untuk memulai perbandingan.</h4>
            </div>

        </div>
    </div>

</div>
<?= $this->endSection() ?>

<?= $this->section('custom_js') ?>
<script>

var allPhones = <?= json_encode(array_values($smartphones)) ?>;


var slots = { 1: null, 2: null, 3: null };


var specMap = [
    { key: 'price_idr',            label: 'Harga',                  format: 'price',   icon: 'la-money',         group: 'Umum' },
    { key: 'price_category',       label: 'Kategori Harga',         format: 'text',    icon: 'la-tag',           group: 'Umum' },
    { key: 'spec_score',           label: 'AI Spec Score',          format: 'score',   icon: 'la-star',          group: 'Umum' },
    { key: 'vfm_label',            label: 'Value For Money',        format: 'text',    icon: 'la-balance-scale', group: 'Umum' },
    { key: 'cluster',              label: 'Cluster K-Means',        format: 'cluster', icon: 'la-sitemap',       group: 'Umum' },
    { key: 'processor_brand',      label: 'Merek Prosesor',         format: 'text',    icon: 'la-microchip',     group: 'Prosesor' },
    { key: 'processor_name',       label: 'Model Prosesor',         format: 'text',    icon: 'la-microchip',     group: 'Prosesor' },
    { key: 'num_core',             label: 'Jumlah Core',            format: 'unit',    unit: 'Cores',            icon: 'la-microchip',    group: 'Prosesor' },
    { key: 'processor_speed',      label: 'Kecepatan Clock',        format: 'unit',    unit: 'GHz',              icon: 'la-dashboard',    group: 'Prosesor' },
    { key: 'ram',                  label: 'RAM',                    format: 'unit',    unit: 'GB',               icon: 'la-database',     group: 'Memori' },
    { key: 'memory',               label: 'Penyimpanan Internal',   format: 'memory',    unit: '',               icon: 'la-hdd-o',        group: 'Memori' },
    { key: 'battery_capacity_mah', label: 'Kapasitas Baterai',      format: 'unit',    unit: 'mAh',              icon: 'la-battery-full', group: 'Baterai' },
    { key: 'fast_charging_w',      label: 'Fast Charging',          format: 'unit',    unit: 'W',                icon: 'la-bolt',         group: 'Baterai' },
    { key: 'charging_speed_type',  label: 'Keterangan Charging',    format: 'text',    icon: 'la-bolt',          group: 'Baterai' },
    { key: 'rear_camera',          label: 'Kamera Utama',           format: 'unit',    unit: 'MP',               icon: 'la-camera',       group: 'Kamera' },
    { key: 'front_camera',         label: 'Kamera Depan (Selfie)',  format: 'unit',    unit: 'MP',               icon: 'la-camera',       group: 'Kamera' },
    { key: 'screen_size',          label: 'Ukuran Layar',           format: 'unit',    unit: 'Inci',             icon: 'la-desktop',      group: 'Layar' },
    { key: 'refresh_rate',         label: 'Refresh Rate',           format: 'unit',    unit: 'Hz',               icon: 'la-area-chart',   group: 'Layar' },
    { key: 'has_5G',               label: 'Jaringan 5G',            format: 'bool',    icon: 'la-signal',        group: 'Fitur' },
    { key: 'has_NFC',              label: 'NFC',                    format: 'bool',    icon: 'la-credit-card',   group: 'Fitur' },
    { key: 'has_IR',               label: 'IR Blaster (Remote TV)', format: 'bool',    icon: 'la-wifi',          group: 'Fitur' },
    { key: 'os',                   label: 'Sistem Operasi',         format: 'text',    icon: 'la-android',       group: 'Sistem' }
];

var clusterLabel = { '0':'Premium / High-End', '1':'Entry-Level / Budget', '2':'Flagship / Ultra Premium', '3':'Mid-Range / Value King' };
var clusterBadge = { '0':'badge-warning', '1':'badge-secondary', '2':'badge-danger', '3':'badge-info' };
var numericBest  = ['spec_score','ram','memory','battery_capacity_mah','fast_charging_w',
                    'rear_camera','front_camera','screen_size','refresh_rate',
                    'processor_speed','num_core'];


[1, 2, 3].forEach(function(n) {
    var inp = document.getElementById('search-' + n);
    var dd  = document.getElementById('dropdown-' + n);

    inp.addEventListener('input', function() {
        var q = this.value.trim().toLowerCase();
        if (q.length < 1) { dd.innerHTML = ''; dd.classList.remove('open'); return; }

        var matches = allPhones.filter(function(hp) {
            return (hp.brand_name + ' ' + hp.model).toLowerCase().indexOf(q) !== -1;
        }).slice(0, 8);

        if (matches.length === 0) {
            dd.innerHTML = '<div class="dd-empty"><i class="la la-search"></i> Tidak ditemukan hasil untuk "<strong>' + escHtml(q) + '</strong>"</div>';
            dd.classList.add('open');
            return;
        }

        dd.innerHTML = matches.map(function(hp) {
            var name  = hp.brand_name.toUpperCase() + ' ' + hp.model;
            var price = 'Rp ' + parseInt(hp.price_idr).toLocaleString('id-ID');
            var badge = getBadge(hp.cluster);
            var hl    = highlight(name, q);
            return '<div class="dd-item" onmousedown="selectPhone(' + n + ', ' + hp.id + ')">'
                 + '<div class="dd-name">' + hl + '</div>'
                 + '<div class="dd-meta">' + price + ' &nbsp;' + badge + '</div>'
                 + '</div>';
        }).join('');
        dd.classList.add('open');
    });

    inp.addEventListener('blur', function() {
        setTimeout(function() { dd.innerHTML = ''; dd.classList.remove('open'); }, 150);
    });

    inp.addEventListener('focus', function() {
        if (this.value.trim().length > 0) this.dispatchEvent(new Event('input'));
    });
});

function highlight(text, q) {
    var idx = text.toLowerCase().indexOf(q.toLowerCase());
    if (idx === -1) return escHtml(text);
    return escHtml(text.slice(0, idx))
         + '<mark>' + escHtml(text.slice(idx, idx + q.length)) + '</mark>'
         + escHtml(text.slice(idx + q.length));
}

function escHtml(s) {
    return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
}

function getBadge(cluster) {
    var cl = String(cluster);
    return '<span class="badge badge-pill ' + (clusterBadge[cl] || 'badge-secondary') + ' font-small-1">'
         + (clusterLabel[cl] || 'Cluster ' + cl) + '</span>';
}

function selectPhone(n, id) {
    var hp = allPhones.find(function(p) { return p.id == id; });
    if (!hp) return;
    slots[n] = hp;

    document.getElementById('search-' + n).value = '';
    document.getElementById('dropdown-' + n).innerHTML = '';
    document.getElementById('dropdown-' + n).classList.remove('open');

    var card = document.getElementById('selected-' + n);
    card.style.display = 'block';
    card.innerHTML = buildSelectedCard(hp, n);

    document.getElementById('clear-' + n).style.display = 'none';

    document.querySelector('#search-' + n).closest('.search-input-wrap').style.display = 'none';
}

function buildSelectedCard(hp, n) {
    var name  = hp.brand_name.toUpperCase() + ' ' + hp.model;
    var price = 'Rp ' + parseInt(hp.price_idr).toLocaleString('id-ID');
    return '<div class="selected-hp-card">'
         + '<div class="selected-hp-top">'
         + '<div>'
         + '<div class="selected-hp-name">' + escHtml(name) + '</div>'
         + '<div class="selected-hp-price">' + price + '</div>'
         + '</div>'
         + '<button class="btn btn-sm btn-outline-secondary round" onclick="clearSlot(' + n + ')" title="Ganti">'
         + '<i class="la la-exchange"></i> Ganti'
         + '</button>'
         + '</div>'
         + '<div class="selected-hp-specs">'
         + '<span><i class="la la-database"></i> ' + hp.ram + 'GB RAM</span>'
         + '<span><i class="la la-microchip"></i> ' + escHtml(hp.processor_brand) + '</span>'
         + '<span><i class="la la-camera"></i> ' + hp.rear_camera + 'MP</span>'
         + '<span><i class="la la-battery-full"></i> ' + hp.battery_capacity_mah + 'mAh</span>'
         + '</div>'
         + getBadge(hp.cluster)
         + '</div>';
}

function clearSlot(n) {
    slots[n] = null;
    document.getElementById('selected-' + n).style.display  = 'none';
    document.getElementById('selected-' + n).innerHTML      = '';
    document.getElementById('search-' + n).value            = '';
    document.getElementById('clear-' + n).style.display     = 'none';
    document.querySelector('#search-' + n).closest('.search-input-wrap').style.display = '';
    document.getElementById('search-' + n).focus();
}

function resetAll() {
    [1, 2, 3].forEach(function(i) { clearSlot(i); });
    document.getElementById('compare-result').style.display      = 'none';
    document.getElementById('compare-placeholder').style.display = 'block';
}


function doCompare() {
    var chosen = [slots[1], slots[2], slots[3]].filter(function(s){ return s !== null; });
    if (chosen.length < 2) { alert('Pilih minimal 2 smartphone untuk dibandingkan!'); return; }

    ['th-hp-1','th-hp-2','th-hp-3'].forEach(function(id, i) {
        var th = document.getElementById(id);
        if (i < chosen.length) {
            th.innerHTML     = '<span class="text-bold-700">' + chosen[i].brand_name.toUpperCase() + '</span><br><small>' + chosen[i].model + '</small>';
            th.style.display = '';
        } else {
            th.style.display = 'none';
        }
    });

    var colCount  = chosen.length;
    var html      = '';
    var lastGroup = '';

    specMap.forEach(function(spec) {
        if (spec.group !== lastGroup) {
            html += '<tr class="bg-gradient-directional-light"><td colspan="' + (colCount + 1) + '" class="py-1 px-3">'
                  + '<strong class="text-uppercase font-small-3 cyan" style="letter-spacing:1px;">'
                  + '<i class="la ' + spec.icon + '"></i> ' + spec.group + '</strong></td></tr>';
            lastGroup = spec.group;
        }

        var vals     = chosen.map(function(hp){ return hp[spec.key]; });
        var isNum    = numericBest.indexOf(spec.key) !== -1;
        var isPrice  = spec.key === 'price_idr';
        var bestNum  = isNum   ? Math.max.apply(null, vals.map(function(v){ return parseFloat(v)||0; })) : null;
        var minPrice = isPrice ? Math.min.apply(null, vals.map(function(v){ return parseFloat(v)||0; })) : null;

        html += '<tr>';
        html += '<td class="align-middle font-small-3 text-bold-600 bg-light py-2 px-3"><i class="la ' + spec.icon + ' text-muted"></i> ' + spec.label + '</td>';

        for (var i = 0; i < colCount; i++) {
            var raw      = chosen[i][spec.key];
            var cellCls  = 'text-center align-middle py-2 px-2';
            var rendered = renderValue(spec, raw);

            if (isNum && bestNum !== null && (parseFloat(raw)||0) === bestNum && bestNum > 0) {
                cellCls  += ' bg-light-cyan';
                rendered  = '<span class="text-bold-700 cyan">' + rendered + '</span> <i class="la la-arrow-up cyan font-small-2"></i>';
            }
            if (isPrice && minPrice !== null && (parseFloat(raw)||0) === minPrice && minPrice > 0) {
                cellCls  += ' bg-light-success';
                rendered  = '<span class="text-bold-700 success">' + rendered + '</span> <i class="la la-thumbs-up success font-small-2"></i>';
            }
            html += '<td class="' + cellCls + '">' + rendered + '</td>';
        }
        html += '</tr>';
    });

    document.getElementById('compare-body').innerHTML           = html;
    document.getElementById('compare-placeholder').style.display = 'none';
    document.getElementById('compare-result').style.display      = 'block';
    document.getElementById('compare-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function formatMemoryJS(val) {
    if (val === null || val === undefined || val === '') return 'N/A';
    var v = parseFloat(val);
    if (v <= 2) {
        
        var tb = (v === Math.floor(v)) ? Math.floor(v) : v;
        return '<strong>' + tb + '</strong> <small class="text-muted">TB</small>';
    }
    return '<strong>' + Math.floor(v) + '</strong> <small class="text-muted">GB</small>';
}

function renderValue(spec, raw) {
    if (raw === null || raw === undefined || raw === '') return '<span class="text-muted">N/A</span>';
    switch (spec.format) {
        case 'price':
            return 'Rp ' + parseInt(raw).toLocaleString('id-ID');
        case 'score':
            var sc = parseFloat(raw) || 0;
            return '<div style="min-width:90px;"><div class="progress progress-sm mb-1" style="height:8px;border-radius:8px;">'
                 + '<div class="progress-bar bg-gradient-directional-cyan" style="width:' + sc + '%"></div></div>'
                 + '<small>' + sc + '/100</small></div>';
        case 'bool':
            return raw == 1
                ? '<span class="badge badge-pill badge-success px-2"><i class="la la-check"></i> Ada</span>'
                : '<span class="badge badge-pill badge-light-secondary px-2"><i class="la la-times"></i> Tidak Ada</span>';
        case 'cluster':
            var cl = String(raw);
            return '<span class="badge badge-pill ' + (clusterBadge[cl] || 'badge-secondary') + ' px-2">' + (clusterLabel[cl] || 'Cluster ' + cl) + '</span>';
        case 'memory':
            return formatMemoryJS(raw);
        case 'unit':
            return '<strong>' + raw + '</strong> <small class="text-muted">' + (spec.unit || '') + '</small>';
        default:
            return raw;
    }
}
</script>
<style>

.search-input-wrap {
    position: relative;
}
.search-input-wrap .search-icon {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #aaa;
    font-size: 1.1rem;
    pointer-events: none;
    z-index: 2;
}
.search-box {
    padding-left: 32px !important;
    border-radius: 8px !important;
    border: 1.5px solid #e0e0e0;
    transition: border-color .2s, box-shadow .2s;
}
.search-box:focus {
    border-color: #00BCD4 !important;
    box-shadow: 0 0 0 3px rgba(0,188,212,.12) !important;
    outline: none;
}
.clear-btn {
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #aaa;
    cursor: pointer;
    padding: 2px 5px;
    border-radius: 50%;
    transition: color .2s;
}
.clear-btn:hover { color: #e53935; }


.search-dropdown {
    display: none;
    position: absolute;
    width: 100%;
    background: #fff;
    border: 1.5px solid #e0e0e0;
    border-top: none;
    border-radius: 0 0 10px 10px;
    box-shadow: 0 8px 24px rgba(0,0,0,.10);
    z-index: 999;
    max-height: 280px;
    overflow-y: auto;
}
.search-dropdown.open { display: block; }
.dd-item {
    padding: 10px 14px;
    cursor: pointer;
    border-bottom: 1px solid #f5f5f5;
    transition: background .15s;
}
.dd-item:last-child { border-bottom: none; }
.dd-item:hover { background: rgba(0,188,212,.07); }
.dd-name {
    font-weight: 600;
    font-size: .85rem;
    color: #333;
}
.dd-name mark {
    background: rgba(0,188,212,.25);
    color: #00838f;
    border-radius: 3px;
    padding: 0 2px;
}
.dd-meta {
    font-size: .78rem;
    color: #888;
    margin-top: 2px;
}
.dd-empty {
    padding: 14px;
    color: #aaa;
    font-size: .85rem;
    text-align: center;
}

.selected-hp-card {
    border: 1.5px solid #00BCD4;
    border-radius: 10px;
    padding: 12px 14px;
    background: linear-gradient(135deg, rgba(0,188,212,.05), #fff);
    margin-top: 6px;
    animation: fadeInCard .25s ease;
}
@keyframes fadeInCard {
    from { opacity: 0; transform: translateY(-6px); }
    to   { opacity: 1; transform: translateY(0); }
}
.selected-hp-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 8px;
}
.selected-hp-name {
    font-weight: 700;
    font-size: .88rem;
    color: #333;
    line-height: 1.3;
}
.selected-hp-price {
    color: #00838f;
    font-weight: 600;
    font-size: .82rem;
    margin-top: 2px;
}
.selected-hp-specs {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 8px;
}
.selected-hp-specs span {
    background: #f0f0f0;
    border-radius: 20px;
    padding: 2px 9px;
    font-size: .75rem;
    color: #555;
}
.selected-hp-specs span i {
    color: #00BCD4;
}


.bg-light-cyan    { background-color: rgba(0,188,212,0.08) !important; }
.bg-light-success { background-color: rgba(40,167,69,0.08) !important; }
#compare-table th { font-size: 0.85rem; }
#compare-table td { font-size: 0.82rem; vertical-align: middle; }
#compare-table tr:hover td { background-color: rgba(0,0,0,0.02); }


.search-slot { position: relative; }
</style>
<?= $this->endSection() ?>