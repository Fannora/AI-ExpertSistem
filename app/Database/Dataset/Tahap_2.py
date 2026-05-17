import pandas as pd
from sklearn.preprocessing import MinMaxScaler

print("Membaca file smartphones_tahap_normalisasi.csv...")
df = pd.read_csv('smartphones_tahap_normalisasi.csv')

# 1. TENTUKAN KOLOM YANG AKAN DIPERAS (NORMALISASI)
# Kita hanya memilih spesifikasi yang berupa angka kontinu.
# Fitur seperti has_5G, has_NFC, has_IR diabaikan karena nilainya sudah 1 dan 0.
kolom_numerik = [
    'price_idr', 'spec_score', 'vfm_score', 'num_core', 'processor_speed', 
    'ram', 'memory', 'battery_capacity_mah', 'fast_charging_w', 
    'charging_ratio', 'screen_size', 'refresh_rate', 'rear_camera', 
    'front_camera', 'rear_camera_count'
]

print("Memulai proses normalisasi (Min-Max Scaling)...")
# 2. PROSES NORMALISASI
# Memanggil alat perubah skala (mengubah semua angka menjadi desimal 0.0 hingga 1.0)
print("Membersihkan teks nyasar di kolom angka...")
for col in kolom_numerik:
    # Paksa ubah semua isi kolom menjadi angka. Jika ada teks (seperti 'qualcomm'), ubah jadi NaN (kosong)
    df[col] = pd.to_numeric(df[col], errors='coerce')

# Isi bagian yang kosong (NaN) akibat teks nyasar tadi dengan nilai tengah (median) kolom tersebut
df[kolom_numerik] = df[kolom_numerik].fillna(df[kolom_numerik].median())
scaler = MinMaxScaler()

# Menerapkan alat tersebut ke kolom-kolom yang sudah kita pilih
df[kolom_numerik] = scaler.fit_transform(df[kolom_numerik])

# 3. SIMPAN HASIL AKHIR
nama_file_final = 'smartphones_ml_ready.csv'
df.to_csv(nama_file_final, index=False)

print(f"\nSelesai! Semua angka telah berhasil diratakan ke skala 0-1.")
print(f"File final yang siap dimasukkan ke algoritma AI/Machine Learning tersimpan sebagai: {nama_file_final}")