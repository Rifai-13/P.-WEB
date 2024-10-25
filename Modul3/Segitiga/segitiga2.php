<?php
function segitigaTerbalik($tinggi) {
    for ($i = $tinggi; $i >= 1; $i--) {
        // Mencetak spasi (gunakan &nbsp; untuk spasi dalam HTML)
        for ($j = $tinggi; $j > $i; $j--) {
            echo " ";
        }
        // Mencetak bintang
        for ($k = 1; $k <= (2 * $i - 1); $k++) {
            echo "*";
        }
        // Pindah ke baris berikutnya dengan <br>
        echo "\n";
    }
}

// Panggil fungsi dengan tinggi segitiga 5
segitigaTerbalik(5);

