<?php

namespace App\Controllers;
use App\Models\SmartphoneModel;

class HomeController extends BaseController {
    protected $hpModel;

    public function __construct() {
        $this->hpModel = new SmartphoneModel();
    }

    public function index() {
        return view('home');
    }

    public function consultation() {
        return view('consultation');
    }

    public function dataset() {
        $data['smartphones'] = $this->hpModel->findAll();
        return view('dataset', $data);
    }

    // FUNGSI BARU: Halaman Compare / Perbandingan Smartphone
    public function compare() {
        $data['smartphones'] = $this->hpModel->orderBy('brand_name', 'ASC')
                                             ->orderBy('model', 'ASC')
                                             ->findAll();
        return view('compare', $data);
    }

    // FUNGSI KRUSIAL: Menangkap hasil Chat Bot
    public function recommend() {
    $q1 = $this->request->getPost('q1');
    
    // Penentuan Cluster berdasarkan input user
    $target_cluster = 1; 
    $max_price = 3000000;
    if ($q1 == 'D') { $target_cluster = 2; $max_price = 100000000; }
    elseif ($q1 == 'C') { $target_cluster = 0; $max_price = 10000000; }
    elseif ($q1 == 'B') { $target_cluster = 3; $max_price = 6000000; }

    $info = [
        '1' => ['label' => 'Entry-Level / Budget', 'desc' => 'Pilihan cerdas untuk efisiensi budget dengan performa harian yang stabil.'],
        '3' => ['label' => 'Mid-Range / Value King', 'desc' => 'Keseimbangan terbaik antara spesifikasi tinggi dan harga yang kompetitif.'],
        '0' => ['label' => 'Premium / High-End', 'desc' => 'Pengalaman flagship dengan keunggulan di sisi kamera, layar, dan build quality.'],
        '2' => ['label' => 'Flagship / Ultra Premium', 'desc' => 'Teknologi smartphone tercanggih di dunia tanpa kompromi performa.'],
    ];

    // Ambil data HP dari Model
    $data = [
        'recommendations' => $this->hpModel->getRecommendation($target_cluster, $max_price),
        'cluster_info'    => $info[$target_cluster],
    ];

    return view('results', $data); 
    } 
}