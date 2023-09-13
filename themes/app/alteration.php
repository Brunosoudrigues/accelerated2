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
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    button {
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
    }
  </style>
<title>Alterar Dados</title>
</head>
<body>
  <div class="container">
    <h2>Alterar Dados</h2>
    <form>
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" id="name" name="name" placeholder="Seu nome completo">
      </div>
      <div class="form-group">
        <label for="address">Endereço</label>
        <input type="text" id="address" name="address" placeholder="Seu endereço">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="seuemail@example.com">
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" placeholder="Sua senha">
      </div>
      <button type="submit">Salvar Alterações</button>
    </form>
  </div>
</body>
</html>
