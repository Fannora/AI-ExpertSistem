import pandas as pd
from sklearn.cluster import KMeans
from sklearn.metrics import silhouette_score
# Tambahan library untuk mengatasi warning jika ada
import warnings
warnings.filterwarnings('ignore')

print("Membaca data yang sudah dinormalisasi...")
df = pd.read_csv('smartphones_ml_ready.csv')

kolom_fitur = [
    'price_idr', 'spec_score', 'vfm_score', 'num_core', 'processor_speed', 
    'ram', 'memory', 'battery_capacity_mah', 'fast_charging_w', 
    'charging_ratio', 'screen_size', 'refresh_rate', 'rear_camera', 
    'front_camera', 'rear_camera_count'
]

print("Mulai mencari nilai K yang paling optimal...\n")
print("--------------------------------------------------")
print("Nilai K | Silhouette Score")
print("--------------------------------------------------")

best_k = 2
best_score = -1

# Kita uji nilai K mulai dari membagi 2 kelompok sampai 8 kelompok
for k in range(2, 9):
    # random_state=42 agar hasilnya konsisten
    kmeans = KMeans(n_clusters=k, random_state=42)
    cluster_labels = kmeans.fit_predict(df[kolom_fitur])
    
    # Menghitung skor
    score = silhouette_score(df[kolom_fitur], cluster_labels)
    print(f"  K = {k} | {score:.4f}")
    
    # Menyimpan nilai K dengan skor tertinggi
    if score > best_score:
        best_score = score
        best_k = k

print("--------------------------------------------------")
print(f"\nKESIMPULAN MESIN:")
print(f"Secara matematis, dataset ini paling bagus dibagi menjadi K = {best_k} kelompok.")
print(f"Karena K={best_k} menghasilkan skor tertinggi ({best_score:.4f}), yang berarti batas antar kelompoknya paling jelas dan minim tumpang tindih.")