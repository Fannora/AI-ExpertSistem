<?php

namespace App\Models;
use CodeIgniter\Model;

class SmartphoneModel extends Model {
    protected $table      = 'data_hp';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'brand_name', 'model', 'price_category', 'price_idr', 'spec_score',
        'vfm_score', 'vfm_label', 'has_5G', 'has_NFC', 'has_IR',
        'processor_brand', 'processor_name', 'num_core', 'processor_speed',
        'ram', 'memory', 'battery_capacity_mah', 'fast_charging_w',
        'charging_ratio', 'charging_speed_type', 'screen_size', 'refresh_rate',
        'rear_camera', 'front_camera', 'rear_camera_count', 'os', 'cluster'
    ];

    public function getRecommendation($cluster, $price_limit) {
        return $this->where('cluster', $cluster)
                    ->where('price_idr <=', $price_limit)
                    ->orderBy('spec_score', 'DESC')
                    ->limit(10)
                    ->findAll();
    }
}