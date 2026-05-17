<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Expert System - Smartphone Intelligence</title>
    <link rel="icon" type="image/jpeg" href="<?= base_url('assets/images/ai-smartphone-logo.jpg') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/vendors.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/app.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/core/menu/menu-types/vertical-compact-menu.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css/core/colors/palette-gradient.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>
<body class="vertical-layout vertical-compact-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">

    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark bg-gradient-directional-cyan navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header text-center">
                <a class="navbar-brand" href="<?= base_url('/') ?>" style="padding:4px 0; display:flex; align-items:center;">
                    <span style="display:inline-flex; align-items:center; background:#fff; border-radius:10px; padding:3px 8px; box-shadow:0 2px 8px rgba(0,0,0,.15);">
                        <img src="<?= base_url('assets/images/ai-smartphone-logo.jpg') ?>"
                             alt="Smartphone Intelligence Logo"
                             style="height:38px; width:auto; object-fit:contain; border-radius:6px; display:block;">
                    </span>
                </a>
            </div>
        </div>
    </nav>

    <div class="main-menu menu-dark menu-fixed menu-shadow">
        <div class="main-menu-content">
            <ul class="navigation navigation-main">
                <li class="nav-item"><a href="<?= base_url('/') ?>"><i class="la la-home"></i><span class="menu-title">Home</span></a></li>
                <li class="nav-item"><a href="<?= base_url('/consultation') ?>"><i class="la la-comments"></i><span class="menu-title">Konsultasi</span></a></li>
                <li class="nav-item"><a href="<?= base_url('/compare') ?>"><i class="la la-columns"></i><span class="menu-title">Compare</span></a></li>
                <li class="nav-item"><a href="<?= base_url('/dataset') ?>"><i class="la la-database"></i><span class="menu-title">Dataset HP</span></a></li>
            </ul>
        </div>
    </div>

    <div class="app-content content">
        <div class="content-wrapper">
            <?= $this->renderSection('main_content') ?>
        </div>
    </div>

    <footer class="footer footer-static footer-dark navbar-border navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 text-center">
            <span>Copyright &copy; 2026 <strong>Tugas Kelompok 7</strong>. All rights reserved.</span>
        </p>
    </footer>

    <script src="<?= base_url('app-assets/vendors/js/vendors.min.js') ?>"></script>
    <script src="<?= base_url('app-assets/js/core/app-menu.js') ?>"></script>
    <script src="<?= base_url('app-assets/js/core/app.js') ?>"></script>
    <?= $this->renderSection('custom_js') ?>
</body>
</html>