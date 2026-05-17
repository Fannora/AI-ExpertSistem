import pandas as pd
import numpy as np

print("Membaca file sumber yang masih utuh...")
df = pd.read_csv('smartprix_smartphones.csv')

# 1. MENGUBAH NAMA KOLOM
# Menghilangkan tanda kurung agar aman jika nanti dimasukkan ke database/MySQL
df.rename(columns={
    'battery_capacity(mAh)': 'battery_capacity_mah',
    'fast_charging(W)': 'fast_charging_w'
}, inplace=True)

# 2. KONVERSI HARGA KE RUPIAH
print("Mengubah mata uang menjadi Rupiah...")
# Data Smartprix berasal dari India, jadi harganya adalah Rupee (INR).
# Asumsi kurs saat ini: 1 Rupee (INR) = Rp 192
kurs_inr_ke_idr = 192 
df['price'] = df['price'] * kurs_inr_ke_idr

# Kita ubah juga nama kolomnya agar jelas bahwa ini sudah Rupiah
df.rename(columns={'price': 'price_idr'}, inplace=True)

# 3. MEMPERBAIKI DATA "GAIB" (NILAI 0)
print("Memperbaiki spesifikasi gaib (nilai 0)...")
kolom_gaib = ['processor_speed', 'rear_camera', 'front_camera']

for col in kolom_gaib:
    # Ubah angka 0 menjadi kosong (NaN) terlebih dahulu agar tidak merusak perhitungan
    df[col] = df[col].replace(0, np.nan) 
    
    # Cari nilai tengah (median) dari HP lain yang spesifikasinya normal
    nilai_median = df[col].median() 
    
    # Isi kembali bagian yang tadi dikosongkan dengan nilai tengah tersebut
    df[col] = df[col].fillna(nilai_median)

# 4. KONVERSI TRUE/FALSE KE 1/0 SECARA AMAN
print("Mengamankan data fitur (1/0)...")
kolom_boolean = ['has_5G', 'has_NFC', 'has_IR']
for col in kolom_boolean:
    # Menggunakan metode map agar komputer tidak salah membaca teks True/False
    df[col] = df[col].map({True: 1, False: 0, 'True': 1, 'False': 0})
    # Isi sisa jika ada yang kosong dengan 0
    df[col] = df[col].fillna(0).astype(int)

# 5. SIMPAN KE FILE BARU
nama_file_baru = 'smartphones_tahap_normalisasi.csv'
df.to_csv(nama_file_baru, index=False)

print(f"\nSelesai! File yang sudah bersih dan harganya jadi Rupiah tersimpan sebagai: {nama_file_baru}")