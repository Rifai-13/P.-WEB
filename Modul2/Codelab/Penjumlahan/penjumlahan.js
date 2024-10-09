document.getElementById('hitung').addEventListener('click', function() {
    // Ambil nilai dari input bilangan pertama dan bilangan kedua
    const bil1 = parseFloat(document.getElementById('bil1').value);
    const bil2 = parseFloat(document.getElementById('bil2').value);

    // Lakukan penjumlahan
    const hasil = bil1 + bil2;

    // Tampilkan hasil di elemen <h3> dengan class 'result'
    document.querySelector('.result').textContent = 'Hasil: ' + hasil;
});

// Tambahkan fungsi reset untuk menghapus input dan hasil
document.getElementById('reset').addEventListener('click', function() {
    document.getElementById('bil1').value = '';
    document.getElementById('bil2').value = '';
    document.querySelector('.result').textContent = 'Hasil:';
});
