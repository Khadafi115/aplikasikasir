let productList = [];
let totalPrice = 0;

document.getElementById('productForm').addEventListener('submit', function (e) {
    e.preventDefault();
    
    const name = document.getElementById('productName').value;
    const price = parseFloat(document.getElementById('productPrice').value);
    const quantity = parseInt(document.getElementById('productQuantity').value);

    // Tambah produk ke dalam daftar
    productList.push({ name, price, quantity });
    updateTotalPrice();
    document.getElementById('productForm').reset();
    renderTable();
});

function renderTable() {
    const tableBody = document.getElementById('productList');
    tableBody.innerHTML = '';

    productList.forEach((product, index) => {
        const totalProductPrice = product.price * product.quantity;
        const row = `
            <tr>
                <td>${index + 1}</td>
                <td>${product.name}</td>
                <td>Rp ${product.price}</td>
                <td>${product.quantity}</td>
                <td>Rp ${totalProductPrice}</td>
                <td>
                    <button class="action-btn delete-btn" onclick="deleteProduct(${index})">Hapus</button>
                </td>
            </tr>
        `;
        tableBody.innerHTML += row;
    });
}

function updateTotalPrice() {
    totalPrice = productList.reduce((total, product) => total + product.price * product.quantity, 0);
    document.getElementById('totalPrice').innerText = totalPrice;
}

function deleteProduct(index) {
    productList.splice(index, 1);
    updateTotalPrice();
    renderTable();
}

document.getElementById('clearAll').addEventListener('click', function() {
    productList = [];
    updateTotalPrice();
    renderTable();
});
