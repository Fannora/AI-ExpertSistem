import pandas as pd
from sklearn.cluster import KMeans

print("Membaca data...")
df_asli = pd.read_csv('smartphones_tahap_normalisasi.csv')
df_ml = pd.read_csv('smartphones_ml_ready.csv')

kolom_fitur = [
    'price_idr', 'spec_score', 'vfm_score', 'num_core', 'processor_speed', 
    'ram', 'memory', 'battery_capacity_mah', 'fast_charging_w', 
    'charging_ratio', 'screen_size', 'refresh_rate', 'rear_camera', 
    'front_camera', 'rear_camera_count'
]

print("Menjalankan K-Means dengan K=4...")
kmeans = KMeans(n_clusters=4, random_state=42)
df_asli['Cluster_4'] = kmeans.fit_predict(df_ml[kolom_fitur])

kolom_penting = ['price_idr', 'ram', 'memory', 'battery_capacity_mah', 'rear_camera', 'fast_charging_w']
profil_cluster = df_asli.groupby('Cluster_4')[kolom_penting].mean().round(0)

print("\n=======================================================")
print("  PROFIL RATA-RATA DENGAN 4 KELOMPOK (K=4)")
print("=======================================================")

for cluster_id in profil_cluster.index:
    harga = profil_cluster.loc[cluster_id, 'price_idr']
    ram = profil_cluster.loc[cluster_id, 'ram']
    memori = profil_cluster.loc[cluster_id, 'memory']
    baterai = profil_cluster.loc[cluster_id, 'battery_capacity_mah']
    kamera = profil_cluster.loc[cluster_id, 'rear_camera']
    cas = profil_cluster.loc[cluster_id, 'fast_charging_w']
    
    print(f"\n[ CLUSTER {cluster_id} ]")
    print(f"- Harga Rata-rata : Rp {harga:,.0f}".replace(',', '.'))
    print(f"- Rata-rata Spek  : RAM {ram}GB | Memori {memori}GB | Cas {cas}W | Kamera {kamera}MP")