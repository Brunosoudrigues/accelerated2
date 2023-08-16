<?php
$this->layout("_theme");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }
        
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        
        .product {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
            width: 80%;
        }
        
        .product img {
            max-width: 100px;
            margin-right: 10px;
        }
        
        .product-details {
            flex-grow: 1;
        }
        
        .product-title {
            font-weight: bold;
        }
        
        .product-price {
            color: #666;
        }

        .cart {
            display: flex;
            flex-direction: column;
            width: 80%;
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 20px;
        }
        
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }
        
        .cart-item img {
            max-width: 50px;
            margin-right: 10px;
        }
        
        .cart-item-details {
            flex-grow: 1;
        }
        
        .cart-item-title {
            font-weight: bold;
        }
        
        .cart-item-quantity {
            color: #666;
        }
        
        .subtotal {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <header>
        <h1>Carrinho de Compras</h1>
    </header>
    
    <div class="container">
        <div class="product">
            <img src="product1.jpg" alt="Product 1">
            <div class="product-details">
                <div class="product-title">Produto 1</div>
                <div class="product-price">$20.00</div>
                <button class="add-to-cart">Adicionar ao Carrinho</button>
            </div>
        </div>
        
        <div class="product">
            <img src="product2.jpg" alt="Product 2">
            <div class="product-details">
                <div class="product-title">Produto 2</div>
                <div class="product-price">$15.00</div>
                <button class="add-to-cart">Adicionar ao Carrinho</button>
            </div>
        </div>
        
        <div class="product">
            <img src="product3.jpg" alt="Product 3">
            <div class="product-details">
                <div class="product-title">Produto 3</div>
                <div class="product-price">$25.00</div>
                <button class="add-to-cart">Adicionar ao Carrinho</button>
            </div>
        </div>

        <div class="cart">
            <h2>Seu Carrinho</h2>
            <div class="cart-item">
                <img src="product1.jpg" alt="Product 1">
                <div class="cart-item-details">
                    <div class="cart-item-title">Produto 1</div>
                    <div class="cart-item-quantity">Quantidade: 1</div>
                </div>
                <div class="cart-item-subtotal">$20.00</div>
                <button class="remove-from-cart">Remover</button>
            </div>
            <div class="cart-item">
                <img src="product2.jpg" alt="Product 2">
                <div class="cart-item-details">
                    <div class="cart-item-title">Produto 2</div>
                    <div class="cart-item-quantity">Quantidade: 1</div>
                </div>
                <div class="cart-item-subtotal">$15.00</div>
                <button class="remove-from-cart">Remover</button>
            </div>
            <div class="cart-item">
                <img src="product3.jpg" alt="Product 3">
                <div class="cart-item-details">
                    <div class="cart-item-title">Produto 3</div>
                    <div class="cart-item-quantity">Quantidade: 1</div>
                </div>
                <div class="cart-item-subtotal">$25.00</div>
                <button class="remove-from-cart">Remover</button>


            </div>

            <div class="cart-buttons">
                <button class="remove-all-from-cart">Limpar Carrinho</button>
                <button class="checkout-button">Finalizar Compra</button>
            </div>
            <div class="subtotal">
                <strong>Total: $60.00</strong>
            </div>
             <div class="cart-buttons">
                <button class="remove-all-from-cart">Limpar Carrinho</button>
                <button class="checkout-button">Finalizar Compra</button>
            </div>
        </div>
    </div>

    <script>
  const addToCartButtons = document.querySelectorAll(".add-to-cart");
        const removeFromCartButtons = document.querySelectorAll(".remove-from-cart");
        const removeAllFromCartButton = document.querySelector(".remove-all-from-cart");
        const checkoutButton = document.querySelector(".checkout-button");
        
        
        addToCartButtons.forEach(button => {
            button.addEventListener("click", () => {
                const product = button.closest(".product");
                const productName = product.querySelector(".product-title").textContent;
                const productPrice = parseFloat(product.querySelector(".product-price").textContent.slice(1));
                addToCart(productName, productPrice);
            });
        });
        
        removeFromCartButtons.forEach(button => {
            button.addEventListener("click", () => {
                const cartItem = button.closest(".cart-item");
                const productName = cartItem.querySelector(".cart-item-title").textContent;
                removeFromCart(productName);
            });
        });
        
        const cartItems = [];
        
        function addToCart(name, price) {
            const existingItem = cartItems.find(item => item.name === name);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cartItems.push({ name, price, quantity: 1 });
            }
            updateCart();
        }
        
        function removeFromCart(name) {
            const index = cartItems.findIndex(item => item.name === name);
            if (index !== -1) {
                cartItems.splice(index, 1);
                updateCart();
            }
        }
        
        function updateCart() {
            const cartElement = document.querySelector(".cart");
            cartElement.innerHTML = `
                <h2>Seu Carrinho</h2>
                ${cartItems.map(item => `
                    <div class="cart-item">
                        <div class="cart-item-details">
                            <div class="cart-item-title">${item.name}</div>
                            <div class="cart-item-quantity">Quantidade: ${item.quantity}</div>
                        </div>
                        <div class="cart-item-subtotal">$${(item.price * item.quantity).toFixed(2)}</div>
                        <button class="remove-from-cart">Remover</button>
                    </div>
                `).join("")}
                <div class="subtotal">
                    <strong>Total: $${calculateTotal().toFixed(2)}</strong>
                </div>
            `;

            const newRemoveButtons = document.querySelectorAll(".remove-from-cart");
            newRemoveButtons.forEach(button => {
                button.addEventListener("click", () => {
                    const cartItem = button.closest(".cart-item");
                    const productName = cartItem.querySelector(".cart-item-title").textContent;
                    removeFromCart(productName);
                });
            });
        }
         removeAllFromCartButton.addEventListener("click", () => {
            cartItems.length = 0; // Limpar o carrinho
            updateCart();
        });

        checkoutButton.addEventListener("click", () => {
            alert("Compra finalizada! Obrigado por sua compra!");
            cartItems.length = 0; // Limpar o carrinho após finalizar a compra
            updateCart();
        });
        
        function calculateTotal() {
            return cartItems.reduce((total, item) => total + (item.price * item.quantity), 0);
        }
    </script>
</body>
</html>
