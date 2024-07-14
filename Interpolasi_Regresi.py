import streamlit as st
import pandas as pd
import numpy as np
from scipy.interpolate import interp1d
from sklearn.linear_model import LinearRegression
import matplotlib.pyplot as plt

# Data Mahasiswa
data = {
    'Nama': ['Sandi Alfiansyah', 'Aldi', 'Toni Saputra', 'Khairunnisa Munawwarah', 'Faujiah Decika', 'pangestu', 'Muhammad hafizam', 'Novriyanti Rahmadani', 'Muhammad Rai', 'jafar', 'stefanni', 'NandaUchiha', 'Shliqhul', 'Mabell', 'Rido', 'Hamzy', 'Hansen', 'Yuda Sahputra'],
    'Rata-rata Belajar per Hari (Jam)': [1, 2, 3, 3, 5, 5, 3, 4, 7, 2, 2, 4, 6, 1, 3, 7, 6, 6],
    'IPK': [3.65, 3.75, 3.42, 3.45, 3.40, 3.77, 3.60, 3.36, 3.50, 3.77, 3.67, 3.97, 3.50, 3.70, 3.51, 3.65, 4.00, 3.45]
}

df = pd.DataFrame(data)

# Layout
st.markdown('<h1 style="font-size:30px; text-align:center;">Analisis Hubungan Antara Jumlah Jam Belajar Dan Prestasi Akademik Mahasiswa</h1>', unsafe_allow_html=True)

# Tabs
tabs = st.tabs(["Data", "Hasil Perhitungan", "Grafik Metode", "Prediksi IPK"])

# Data Tab
with tabs[0]:
    st.header('Data Mahasiswa')
    st.dataframe(df)

# Hasil Perhitungan Tab
with tabs[1]:
    st.header('Hasil Perhitungan')

    # Interpolasi
    st.subheader('Interpolasi')
    x_interpolasi = np.arange(len(df))
    y_interpolasi = np.array(df['IPK'])
    f_interpolasi = interp1d(x_interpolasi, y_interpolasi, kind='linear', fill_value="extrapolate")

    x_new = np.linspace(0, len(df)-1, 100)
    y_new = f_interpolasi(x_new)

    st.write("Fungsi Interpolasi (linear):")
    st.latex(r'f(x) = \frac{x - x_i}{x_{i+1} - x_i} \cdot y_{i+1} + \frac{x_{i+1} - x}{x_{i+1} - x_i} \cdot y_i')

    # Menampilkan kesimpulan hasil interpolasi
    midpoint_index = int(len(df) / 2)
    midpoint_ipk = f_interpolasi(midpoint_index)

    st.write(f'Hasil Interpolasi pada setengah panjang data (midpoint): {midpoint_ipk:.2f}')

    # Regresi
    st.subheader('Regresi')
    x_regresi = np.array(df['Rata-rata Belajar per Hari (Jam)']).reshape(-1, 1)
    y_regresi = np.array(df['IPK']).reshape(-1, 1)
    model = LinearRegression().fit(x_regresi, y_regresi)

    st.write('Koefisien Regresi:', model.coef_[0][0])
    st.write('Intercept Regresi:', model.intercept_[0])

# Grafik Tab
with tabs[2]:
    st.header('Grafik Metode')

    # Grafik Interpolasi
    st.subheader('Grafik Interpolasi')
    fig_interpolasi, ax_interpolasi = plt.subplots()
    ax_interpolasi.plot(x_new, f_interpolasi(x_new), '-', label='Interpolasi')
    ax_interpolasi.plot(df['Rata-rata Belajar per Hari (Jam)'], y_interpolasi, 'o', label='Data Asli')
    ax_interpolasi.set_xlabel('Rata-rata Belajar per Hari (Jam)')
    ax_interpolasi.set_ylabel('IPK')
    ax_interpolasi.legend()
    st.pyplot(fig_interpolasi)

    # Grafik Regresi
    st.subheader('Grafik Regresi')
    fig_regresi, ax_regresi = plt.subplots()
    ax_regresi.scatter(x_regresi, y_regresi, color='blue')
    ax_regresi.plot(x_regresi, model.predict(x_regresi), color='red')
    ax_regresi.set_xlabel('Rata-rata Belajar per Hari (Jam)')
    ax_regresi.set_ylabel('IPK')
    st.pyplot(fig_regresi)

# Prediksi IPK Tab
with tabs[3]:
    st.header('Prediksi IPK')

    # Input untuk prediksi
    jam_belajar = st.slider('Rata-rata Belajar per Hari (Jam)', min_value=1, max_value=10, value=5)
    prediksi_ipk = model.predict([[jam_belajar]])

    st.write(f'Prediksi IPK untuk Rata-rata Belajar {jam_belajar} jam/hari adalah: {prediksi_ipk[0][0]:.2f}')
