import pandas as pd
from sklearn.cluster import KMeans
import warnings
warnings.filterwarnings('ignore')

print("1. Membaca Data Asli dan Data Machine Learning...")
# Baca data asli (Untuk ditampilkan ke manusia/website)
df_asli = pd.read_csv('smartphones_tahap_normalisasi.csv')

# Baca data ML (Angka desimal untuk diproses mesin)
df_ml = pd.read_csv('smartphones_ml_ready.csv')

# Pastikan urutannya tidak bergeser
if len(df_asli) == len(df_ml):
    print("Urutan data aman, lanjut ke AI...")
    
    kolom_fitur = [
        'price_idr', 'spec_score', 'vfm_score', 'num_core', 'processor_speed', 
        'ram', 'memory', 'battery_capacity_mah', 'fast_charging_w', 
        'charging_ratio', 'screen_size', 'refresh_rate', 'rear_camera', 
        'front_camera', 'rear_camera_count'
    ]

    print("2. Menjalankan Ulang K-Means (K=4)...")
    kmeans = KMeans(n_clusters=4, random_state=42)
    # Mesin memprediksi dari df_ml, tapi labelnya LANGSUNG ditempel ke df_asli
    df_asli['cluster'] = kmeans.fit_predict(df_ml[kolom_fitur])

    print("3. Menyimpan File Final Anti-Nyasar...")
    nama_file_final = 'data_hp_database.csv'
    df_asli.to_csv(nama_file_final, index=False)
    
    print(f"SELESAI! Silakan HAPUS tabel lama di phpMyAdmin, lalu IMPORT file '{nama_file_final}'.")
else:
    print("GAGAL: Jumlah baris data berbeda, periksa kembali file asalnya!")