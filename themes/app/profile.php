
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
      background-color: #f5f5f5;
    }

    .profile {
      max-width: 800px;
      margin: 20px auto;
      background-color: #fff;
      border: 1px solid #ddd;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      display: flex;
      overflow: hidden;
    }

    .left-section {
      flex: 1;
      background-color: #3498db; /* Azul */
      color: white;
      padding: 40px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .profile-photo {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      margin-bottom: 20px;
      background-image: url('https://via.placeholder.com/150');
      background-size: cover;
      border: 3px solid #2980b9; /* Azul mais claro */
    }

    .name {
      font-size: 1.8em;
      margin-bottom: 10px;
    }

    .edit-profile-button {
      background-color: #2980b9; /* Azul mais claro */
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .edit-profile-button:hover {
      background-color: #3498db; /* Azul */
    }

    .right-section {
      flex: 2;
      padding: 40px;
      border-left: 1px solid #ddd;
    }

    h2 {
      color: #3498db; /* Azul */
      font-size: 1.6em;
      margin-bottom: 20px;
    }

    .info {
      margin-bottom: 30px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 10px;
    }

    p {
      margin: 5px 0;
      color: #555; /* Cinza para informações */
    }

    .actions {
      display: flex;
      align-items: center;
      margin-top: 20px;
    }

    .action-button {
      background-color: #3498db; /* Azul */
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
      margin-right: 15px;
    }

    .action-button:hover {
      background-color: #2980b9; /* Azul mais claro */
    }
  </style>
</head>
<body>
  <div class="profile">
    <div class="left-section">
      <div class="profile-photo"></div>
      <div class="name">Nome do Cliente</div>
      <button class="action-button">
      <a href="<?= url("/app/alteracaoperfil")?>">Link para Upload</a></br>
      </button>
    </div>
    <div class="right-section">
      <h2>Informações do Perfil</h2>
      <div class="info">
        <label>E-mail:</label>
        <p>exemplo@email.com</p>
      </div>
      <div class="info">
        <label>Telefone:</label>
        <p>(XX) XXXX-XXXX</p>
      </div>
      <div class="info">
        <label>Endereço:</label>
        <p>Rua Nome da Rua, Número</p>
      </div>
      <div class="actions">

        <button class="action-button">Alterar Dados Pessoais</button>

        <div>
        <div>
      <button class="action-button">
      <a href="<?= url("/app/upload")?>">Link para Upload</a></br>
      </button>
</div>

      </div>
    </div>
  </div>
</body>
</html>
