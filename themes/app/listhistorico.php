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
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }

  .container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  ul {
    list-style: none;
    padding: 0;
  }

  li {
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .item-details {
    flex: 1;
  }

  .item-name {
    font-weight: bold;
  }

  .item-price {
    font-weight: bold;
    color: #007bff;
  }
</style>
<title>Lista de Compras - Produtos Automotivos</title>
</head>
<body>
  <div class="container">
    <h1>Lista de Compras - Produtos Automotivos</h1>
    <ul>
      <li>
        <div class="item-details">
          <span class="item-name">Óleo de Motor</span>
          <span class="item-date">Data: 2023-08-20</span>
        </div>
        <span class="item-price">$25.00</span>
      </li>
      <li>
        <div class="item-details">
          <span class="item-name">Filtro de Ar</span>
          <span class="item-date">Data: 2023-08-22</span>
        </div>
        <span class="item-price">$15.50</span>
      </li>
      <li>
        <div class="item-details">
          <span class="item-name">Limpador de Para-brisa</span>
          <span class="item-date">Data: 2023-08-25</span>
        </div>
        <span class="item-price">$8.75</span>
      </li>
      <!-- Adicione mais itens fictícios aqui -->
    </ul>
  </div>
</body>
</html>
