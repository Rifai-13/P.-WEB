fetch("http://localhost/Modul4/demo/Nike/backend/config/dbconfig.php")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return response.json();
    })
    .then((data) => {
        const product = document.getElementById("Product");
        product.innerHTML = "";

        data.forEach((productData) => {
            const card = document.createElement("div");
            card.classList.add("card");
            card.innerHTML = `
                <img src="${productData.img_item}" alt="${
                productData.item_name
            }">
                <p>${productData.item_name}</p><br>
                <p id="jenis">${productData.deskripsi}</p><br>
                <p id="price">Rp${Number(productData.harga).toLocaleString(
                    "id-ID"
                )}</p>
            `;
            product.appendChild(card);
        });
    })
    .catch((error) => console.error("Error fetching data:", error));


const carousel = document.querySelector(".carousel");

// Fungsi untuk scroll ke kiri
function scrollLeft() {
    carousel.scrollBy({
        left: -200, // Sesuaikan nilai scroll
        behavior: "smooth",
    });
}

// Fungsi untuk scroll ke kanan
function scrollRight() {
    carousel.scrollBy({
        left: 200, // Sesuaikan nilai scroll
        behavior: "smooth",
    });
}


// Periksa apakah elemen terlihat di viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return rect.top <= window.innerHeight && rect.bottom >= 0;
}

// Tambahkan animasi
function animateCards() {
    const cards = document.querySelectorAll('.card');
    cards.forEach((card) => {
        if (isInViewport(card)) {
            card.classList.add('visible'); // Tambahkan kelas jika terlihat
        }
    });
}

// Atur animasi bergantian
document.querySelectorAll('.card').forEach((card, index) => {
    if (index % 2 === 0) {
        card.classList.add('from-left');
    }
});


// Event scroll
window.addEventListener('scroll', animateCards);

// Panggil animasi saat halaman dimuat
animateCards();
