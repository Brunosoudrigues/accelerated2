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

  .client-list {
    list-style: none;
    padding: 0;
  }

  .client-item {
    padding: 10px;
    border-bottom: 1px solid #ccc;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .client-details {
    display: flex;
    flex-direction: column;
  }

  .client-name {
    font-weight: bold;
  }

  .client-email {
    color: #777;
  }

  .edit-button,
  .delete-button {
    background-color: #dc3545;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .edit-button {
    background-color: #007bff;
    margin-right: 10px;
  }
</style>
<title>Lista de Clientes</title>
</head>
<body>
  <div class="container">
    <h2>Lista de Clientes</h2>
    <ul class="client-list">
      <li class="client-item">
        <div class="client-details">
          <span class="client-name">João Silva</span>
          <span class="client-email">joao@example.com</span>
        </div>
        <button class="edit-button" onclick="editClient(this)">Editar</button>
        <button class="delete-button" onclick="deleteClient(this)">Apagar</button>
      </li>
      <li class="client-item">
        <div class="client-details">
          <span class="client-name">Maria Santos</span>
          <span class="client-email">maria@example.com</span>
        </div>
        <button class="edit-button" onclick="editClient(this)">Editar</button>
        <button class="delete-button" onclick="deleteClient(this)">Apagar</button>
      </li>
      <li class="client-item">
        <div class="client-details">
          <span class="client-name">Carlos Oliveira</span>
          <span class="client-email">carlos@example.com</span>
        </div>
        <button class="edit-button" onclick="editClient(this)">Editar</button>
        <button class="delete-button" onclick="deleteClient(this)">Apagar</button>
      </li>
      <li class="client-item">
        <div class="client-details">
          <span class="client-name">Laura Leal</span>
          <span class="client-email">lauravargas@gmail.com</span>
        </div>
        <button class="edit-button" onclick="editClient(this)">Editar</button>
        <button class="delete-button" onclick="deleteClient(this)">Apagar</button>
      </li>
      <!-- Adicione mais itens de cliente aqui -->
    </ul>
  </div>
  <script>
    function editClient(button) {
      const listItem = button.parentNode;
      const clientDetails = listItem.querySelector('.client-details');
      const name = clientDetails.querySelector('.client-name').textContent;
      const email = clientDetails.querySelector('.client-email').textContent;

      const newName = prompt('Editar nome:', name);
      const newEmail = prompt('Editar email:', email);

      if (newName && newEmail) {
        clientDetails.querySelector('.client-name').textContent = newName;
        clientDetails.querySelector('.client-email').textContent = newEmail;
      }
    }

    function deleteClient(button) {
      const listItem = button.parentNode;
      listItem.parentNode.removeChild(listItem);
    }
  </script>
</body>
</html>
