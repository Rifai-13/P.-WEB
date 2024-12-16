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