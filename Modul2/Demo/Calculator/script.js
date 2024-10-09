const input = document.getElementById('input');
const buttons = document.querySelectorAll('.button');

let string = "";
const arr = Array.from(buttons);

arr.forEach(button => {
    button.addEventListener('click', (e) => {
        const buttonText = e.target.innerHTML;

        if (buttonText === '=') {
            try {
                // Evaluasi ekspresi matematika dengan mengganti simbol untuk operasi yang sesuai
                let expression = string
                    .replace(/÷/g, '/')  // Ganti simbol ÷ dengan /
                    .replace(/x/g, '*')  // Ganti simbol x dengan *
                    .replace(/\^/g, '**'); // Ganti simbol ^ dengan **

                // Evaluasi ekspresi yang sudah dimodifikasi
                // Langsung saja menggunakan eval di sini, karena kita sudah memastikan operatornya benar
                const result = eval(expression); // Hasil evaluasi

                // Tampilkan hasil dengan 2 angka di belakang koma
                if (result !== undefined && typeof result === 'number') {
                    input.value = result.toFixed(2);
                } else {
                    input.value = "Error"; // Jika hasil tidak valid, tampilkan "Error"
                }
                string = ""; // Reset ekspresi setelah evaluasi
            } catch {
                input.value = "Error"; // Jika terjadi error, tampilkan "Error"
                string = ""; // Reset ekspresi setelah error
            }
        } 
        else if (buttonText === 'AC') {
            string = ""; // Reset ekspresi
            input.value = string;
        } 
        else if (buttonText === 'DEL') {
            string = string.substring(0,string.length -1); // Hapus karakter terakhir
            input.value = string;
            
        }
        else {
            string += buttonText; // Tambahkan angka atau simbol lainnya ke string
            input.value = string;
        }
    });
});
