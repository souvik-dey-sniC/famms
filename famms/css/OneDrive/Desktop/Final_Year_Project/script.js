document.addEventListener("DOMContentLoaded", function () {
    const productsContainer = document.getElementById("products-container");

    // Sample product data
    const products = [
        {
            id: 1,
            name: "Product 1",
            price: 19.99,
            image: "product1.jpg",
        },
        {
            id: 2,
            name: "Product 2",
            price: 29.99,
            image: "product2.jpg",
        },
        // Add more products as needed
    ];

    // Display products
    products.forEach(product => {
        const productElement = document.createElement("div");
        productElement.classList.add("product");

        productElement.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <h3>${product.name}</h3>
            <p>$${product.price.toFixed(2)}</p>
            <button onclick="addToCart(${product.id})">Add to Cart</button>
        `;

        productsContainer.appendChild(productElement);
    });
});

function addToCart(productId) {
    // Implement your add to cart logic here
    alert(`Product ${productId} added to cart`);
}
