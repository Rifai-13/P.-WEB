fetch('http://localhost/Modul4/demo/Nike/backend/config/dbconfig.php')

    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        const product = document.getElementById('Product');
        product.innerHTML = '';

        data.forEach(productData => {
            const card = document.createElement('div');
            card.classList.add('card');
            card.innerHTML = `
                <img src="${productData.img_item}" alt="${productData.item_name}">
                <p>${productData.item_name}</p><br>
                <p id="jenis">${productData.deskripsi}</p><br>
                <p id="price">Rp${Number(productData.harga).toLocaleString('id-ID')}</p>
            `;
            product.appendChild(card);
        });
    })
    .catch(error => console.error('Error fetching data:', error));
