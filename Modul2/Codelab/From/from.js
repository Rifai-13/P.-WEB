document.querySelector('.daftar').addEventListener('click', function() {
    event.preventDefault();

    const nama = document.getElementById('nama').value.trim();
    const email = document.getElementById('email').value.trim();
    const alamat = document.getElementById('alamat').value.trim();

    if (nama == '' || email == '' || alamat == '') {
        alert('Data tidak boleh ada yang kosong');
        return;
    }

    if (!email.endsWith('@gmail.com')) {
        alert('Email harus berakhiran dengan @gmail.com');
        return;
    }

    if (nama == ' ' || email == ' ') {
        alert('Data tidak boleh ada yang kosong');
        return;
    }

    alert('Pendaftaran Berhasil! \nNama: ' + nama + '\nEmail: ' + email + '\nAlamat: ' + alamat);

});