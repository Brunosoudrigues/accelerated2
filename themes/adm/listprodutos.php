
<?php
$this->layout("_theme");
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .product-list {
    list-style: none;
    padding: 0;
  }

  .product-item {
    padding: 10px;
    border-bottom: 1px solid #ccc;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .product-details {
    display: flex;
    flex-direction: column;
  }

  .product-name {
    font-weight: bold;
  }

  .product-price {
    color: #007bff;
  }

  .product-category {
    color: #777;
  }

  .edit-button,
  .delete-button {
    background-color: #dc3545;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
    font-size: 12px;
  }

  .edit-button {
    background-color: #007bff;
    margin-right: 5px;
  }
</style>
<title>Lista de Produtos</title>
</head>
<body>
  <div class="container">
    <h2>Lista de Produtos</h2>
    <ul class="product-list">
      <li class="product-item">
        <div class="product-details">
          <span class="product-name">Pneu</span>
          <span class="product-price">R$ 250,00</span>
          <span class="product-category">Automotivo</span>
        </div>
        <button class="edit-button" onclick="editProduct(this)">Editar</button>
        <button class="delete-button" onclick="deleteProduct(this)">Remover</button>
      </li>
      <li class="product-item">
        <div class="product-details">
          <span class="product-name">Volante</span>
          <span class="product-price">R$ 150,00</span>
          <span class="product-category">Automotivo</span>
        </div>
        <button class="edit-button" onclick="editProduct(this)">Editar</button>
        <button class="delete-button" onclick="deleteProduct(this)">Remover</button>
      </li>
      <li class="product-item">
        <div class="product-details">
          <span class="product-name">Cheirinho de Carro</span>
          <span class="product-price">R$ 5,00</span>
          <span class="product-category">Acessórios</span>
        </div>
        <button class="edit-button" onclick="editProduct(this)">Editar</button>
        <button class="delete-button" onclick="deleteProduct(this)">Remover</button>
      </li>
      <!-- Adicione mais produtos aqui -->
    </ul>
  </div>
  <script>
    function editProduct(button) {
      const listItem = button.parentNode;
      const productDetails = listItem.querySelector('.product-details');
      const name = productDetails.querySelector('.product-name').textContent;
      const price = productDetails.querySelector('.product-price').textContent;
      const category = productDetails.querySelector('.product-category').textContent;

      const newName = prompt('Editar nome:', name);
      const newPrice = prompt('Editar preço:', price);
      const newCategory = prompt('Editar categoria:', category);

      if (newName && newPrice && newCategory) {
        productDetails.querySelector('.product-name').textContent = newName;
        productDetails.querySelector('.product-price').textContent = newPrice;
        productDetails.querySelector('.product-category').textContent = newCategory;
      }
    }

    function deleteProduct(button) {
      const listItem = button.parentNode;
      listItem.parentNode.removeChild(listItem);
    }
  </script>
</body>
</html>
