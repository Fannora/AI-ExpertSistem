<?= $this->extend('main_layout') ?>

<?= $this->section('main_content') ?>
<div class="content-body">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10 col-12">
            
            <div class="card m-0 box-shadow-2 border-top-cyan border-top-3" style="border-radius: 15px 15px 0 0;">
                <div class="card-header py-1 bg-white" style="border-radius: 15px 15px 0 0;">
                    <div class="media align-items-center">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <img src="<?= base_url('assets/images/bot.jpg') ?>" alt="Bot" class="rounded-circle box-shadow-1" style="border: 2px solid #00bcd4;">
                                <i></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h5 class="text-bold-600 mb-0 cyan">AI Expert Assistant</h5>
                            <p class="text-muted font-small-3 mb-0"><i class="la la-circle success font-small-2"></i> Sedang memindai spesifikasi smartphone...</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card box-shadow-2" style="height: 600px; overflow-y: auto; background: #f0f4f8; border-radius: 0 0 15px 15px;">
                <div class="card-body" id="chat-window">
                    <form id="ai-chat-form" action="<?= base_url('/recommend') ?>" method="post">
                        
                        <div id="step-1" class="animated fadeIn chat-step">
                            <div class="media mb-3">
                                <div class="media-left pr-1">
                                    <img src="<?= base_url('assets/images/bot.jpg') ?>" class="rounded-circle avatar avatar-sm box-shadow-1" alt="bot">
                                </div>
                                <div class="media-body">
                                    <div class="bg-white p-2 box-shadow-1 d-inline-block text-dark" style="max-width: 85%; border-radius: 0 15px 15px 15px;">
                                        <p class="mb-1">Halo! Saya siap mencocokkan kebutuhanmu dengan ribuan dataset *smartphone* kami.</p>
                                        <p class="mb-0 font-weight-bold">1. Berapa kisaran budget maksimal yang Anda siapkan?</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row justify-content-end mb-3">
                                <div class="col-11 text-right">
                                    <div class="d-flex flex-column align-items-end">
                                        <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q1', 'A', 'Di bawah Rp 3 Juta', 1, 2)">A. Di bawah Rp 3.000.000 (Entry Level)</button>
                                        <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q1', 'B', 'Rp 3 - 6 Juta', 1, 2)">B. Rp 3.000.000 - Rp 6.000.000 (Mid-Range)</button>
                                        <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q1', 'C', 'Rp 6 - 10 Juta', 1, 2)">C. Rp 6.000.000 - Rp 10.000.000 (Premium)</button>
                                        <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q1', 'D', 'Di atas Rp 10 Juta', 1, 2)">D. Di atas Rp 10.000.000 (Flagship)</button>
                                    </div>
                                    <input type="hidden" name="q1" id="q1">
                                </div>
                            </div>
                        </div>

                        <div id="step-2" style="display:none;" class="animated fadeIn chat-step">
                            <div class="media mb-3 flex-row-reverse">
                                <div class="media-body text-right pl-1"><div class="bg-cyan white p-2 box-shadow-1 d-inline-block" style="border-radius: 15px 0 15px 15px;"><p class="mb-0" id="display-q1"></p></div></div>
                            </div>

                            <div class="media mb-3">
                                <div class="media-left pr-1"><img src="<?= base_url('assets/images/bot.jpg') ?>" class="rounded-circle avatar avatar-sm box-shadow-1" alt="bot"></div>
                                <div class="media-body text-left">
                                    <div class="bg-white p-2 box-shadow-1 d-inline-block text-dark" style="max-width: 85%; border-radius: 0 15px 15px 15px;">
                                        <p class="mb-0 font-weight-bold">2. Bagaimana kebutuhan multitasking dan kapasitas penyimpanan Anda (RAM/ROM)?</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-end mb-3">
                                <div class="col-11 text-right d-flex flex-column align-items-end">
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q2', 'A', 'Standar (4GB-6GB)', 2, 3)">A. Standar (RAM 4GB - 6GB, Cukup untuk harian)</button>
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q2', 'B', 'Menengah (8GB)', 2, 3)">B. Menengah (RAM 8GB, Lancar banyak aplikasi)</button>
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q2', 'C', 'Besar (12GB+)', 2, 3)">C. Super Besar (RAM 12GB - 16GB, Performa Ekstrem)</button>
                                    <input type="hidden" name="q2" id="q2">
                                </div>
                            </div>
                        </div>

                        <div id="step-3" style="display:none;" class="animated fadeIn chat-step">
                            <div class="media mb-3 flex-row-reverse">
                                <div class="media-body text-right pl-1"><div class="bg-cyan white p-2 box-shadow-1 d-inline-block" style="border-radius: 15px 0 15px 15px;"><p class="mb-0" id="display-q2"></p></div></div>
                            </div>
                            
                            <div class="media mb-3">
                                <div class="media-left pr-1"><img src="<?= base_url('assets/images/bot.jpg') ?>" class="rounded-circle avatar avatar-sm box-shadow-1"></div>
                                <div class="media-body text-left">
                                    <div class="bg-white p-2 box-shadow-1 d-inline-block text-dark" style="max-width: 85%; border-radius: 0 15px 15px 15px;">
                                        <p class="mb-0 font-weight-bold">3. Seberapa berat Anda akan membebani *Chipset* / Prosesor HP ini?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end mb-3">
                                <div class="col-11 text-right d-flex flex-column align-items-end">
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q3', 'A', 'Hanya Sosmed/Chat', 3, 4)">A. Ringan (Browsing, TikTok, WhatsApp)</button>
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q3', 'B', 'Game Menengah', 3, 4)">B. Sedang (Bermain MLBB, Free Fire sesekali)</button>
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q3', 'C', 'Gamer Hardcore', 3, 4)">C. Berat (Genshin Impact, PUBG rata kanan, Editing)</button>
                                    <input type="hidden" name="q3" id="q3">
                                    
                                    <div class="mt-2 text-right">
                                        <button type="button" class="btn btn-success btn-glow round" onclick="earlySubmit()"><i class="la la-search"></i> Analisis Data Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="step-4" style="display:none;" class="animated fadeIn chat-step">
                            <div class="media mb-3 flex-row-reverse">
                                <div class="media-body text-right pl-1"><div class="bg-cyan white p-2 box-shadow-1 d-inline-block" style="border-radius: 15px 0 15px 15px;"><p class="mb-0" id="display-q3"></p></div></div>
                            </div>
                            
                            <div class="media mb-3">
                                <div class="media-left pr-1"><img src="<?= base_url('assets/images/bot.jpg') ?>" class="rounded-circle avatar avatar-sm box-shadow-1"></div>
                                <div class="media-body text-left">
                                    <div class="bg-white p-2 box-shadow-1 d-inline-block text-dark" style="max-width: 85%; border-radius: 0 15px 15px 15px;">
                                        <p class="mb-0 font-weight-bold">4. Mari bicara soal Kamera. Seberapa detail hasil foto yang Anda butuhkan?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end mb-3">
                                <div class="col-11 text-right d-flex flex-column align-items-end">
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q4', 'A', 'Kamera Biasa Saja', 4, 5)">A. Biasa saja, asal bisa scan dokumen & foto tugas.</button>
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q4', 'B', 'Bagus untuk Sosmed', 4, 5)">B. Bagus dan jernih untuk update Story IG/TikTok.</button>
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q4', 'C', 'Kamera Profesional', 4, 5)">C. Pro Camera (Zoom jauh, OIS stabil, foto malam jernih).</button>
                                    <input type="hidden" name="q4" id="q4">

                                    <div class="mt-2 text-right">
                                        <button type="button" class="btn btn-success btn-glow round" onclick="earlySubmit()"><i class="la la-search"></i> Analisis Data Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="step-5" style="display:none;" class="animated fadeIn chat-step">
                            <div class="media mb-3 flex-row-reverse">
                                <div class="media-body text-right pl-1"><div class="bg-cyan white p-2 box-shadow-1 d-inline-block" style="border-radius: 15px 0 15px 15px;"><p class="mb-0" id="display-q4"></p></div></div>
                            </div>
                            
                            <div class="media mb-3">
                                <div class="media-left pr-1"><img src="<?= base_url('assets/images/bot.jpg') ?>" class="rounded-circle avatar avatar-sm box-shadow-1"></div>
                                <div class="media-body text-left">
                                    <div class="bg-white p-2 box-shadow-1 d-inline-block text-dark" style="max-width: 85%; border-radius: 0 15px 15px 15px;">
                                        <p class="mb-0 font-weight-bold">5. Mengenai daya tahan. Anda tipe pengguna baterai yang seperti apa?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end mb-3">
                                <div class="col-11 text-right d-flex flex-column align-items-end">
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q5', 'A', 'Kapasitas Besar Cukup', 5, 6)">A. Awet seharian sudah cukup (Standard Charging).</button>
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q5', 'B', 'Butuh Fast Charging', 5, 6)">B. Butuh Fast Charging (33W - 67W).</button>
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitChoice('q5', 'C', 'Ultra Fast Charging', 5, 6)">C. Ultra Fast Charging (Di atas 67W, 0-100% sangat cepat).</button>
                                    <input type="hidden" name="q5" id="q5">

                                    <div class="mt-2 text-right">
                                        <button type="button" class="btn btn-success btn-glow round" onclick="earlySubmit()"><i class="la la-search"></i> Analisis Data Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="step-6" style="display:none;" class="animated fadeIn chat-step">
                            <div class="media mb-3 flex-row-reverse">
                                <div class="media-body text-right pl-1"><div class="bg-cyan white p-2 box-shadow-1 d-inline-block" style="border-radius: 15px 0 15px 15px;"><p class="mb-0" id="display-q5"></p></div></div>
                            </div>
                            
                            <div class="media mb-3">
                                <div class="media-left pr-1"><img src="<?= base_url('assets/images/bot.jpg') ?>" class="rounded-circle avatar avatar-sm box-shadow-1"></div>
                                <div class="media-body text-left">
                                    <div class="bg-white p-2 box-shadow-1 d-inline-block text-dark" id="bot-msg-6" style="max-width: 85%; border-radius: 0 15px 15px 15px;">
                                        <p class="mb-0 font-weight-bold">6. Pertanyaan Terakhir: Seberapa krusial fitur tambahan (5G, NFC, Anti Air IP68) bagi Anda?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end mb-3">
                                <div class="col-11 text-right d-flex flex-column align-items-end">
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitFinal('A')">A. Tidak butuh, yang penting spesifikasi dasar bagus.</button>
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitFinal('B')">B. Wajib ada NFC (untuk e-Toll) dan jaringan 5G.</button>
                                    <button type="button" class="btn btn-outline-cyan round mb-1 btn-min-width text-left" onclick="submitFinal('C')">C. Sangat butuh semuanya, termasuk Tahan Air (IP68) & Wireless Charging.</button>
                                    <input type="hidden" name="q6" id="q6">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="text-center mt-3">
                <p class="text-muted font-small-3"><i class="la la-info-circle"></i> Sistem akan mencocokkan pola jawabanmu dengan centroid pada Database K-Means.</p>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('custom_js') ?>
<script>
    var skipPremiumFeatures = false;

    function submitChoice(inputName, val, label, current, next) {
        document.getElementById(inputName).value = val;
        
        var displayId = 'display-' + inputName;
        if(document.getElementById(displayId)) {
            document.getElementById(displayId).innerText = label;
        }


        if(inputName === 'q1') {
            if(val === 'A') {
                skipPremiumFeatures = true;
            } else {
                skipPremiumFeatures = false;
            }
        }


        if(current === 5 && skipPremiumFeatures === true) {
            $('#step-' + current).hide();
            $('#chat-window').append('<div class="text-center my-3 text-muted"><i class="la la-spinner spinner font-large-1"></i><br>Melompati pertanyaan fitur Flagship... Menganalisis hasil...</div>');
            setTimeout(function() {
                document.getElementById('ai-chat-form').submit();
            }, 1000);
            return;
        }

        $('#step-' + current).hide();
        if(next !== 0) {
            $('#step-' + next).fadeIn(500);
            autoScroll();
        }
    }

    function earlySubmit() {

        $('#chat-window').append('<div class="text-center my-3 text-muted"><i class="la la-spinner spinner font-large-1"></i><br>Mengeksekusi Algoritma K-Means dari data yang ada...</div>');
        autoScroll();
        setTimeout(function() {
            document.getElementById('ai-chat-form').submit();
        }, 800);
    }

    function submitFinal(val) {
        document.getElementById('q6').value = val;
        $('#chat-window').append('<div class="text-center my-3 text-muted"><i class="la la-spinner spinner font-large-1"></i><br>Mengeksekusi Centroid Data...</div>');
        autoScroll();
        setTimeout(function() {
            document.getElementById('ai-chat-form').submit();
        }, 800);
    }

    function autoScroll() {
        var objDiv = document.getElementById("chat-window");
        objDiv.scrollTop = objDiv.scrollHeight;
    }
</script>
<?= $this->endSection() ?>