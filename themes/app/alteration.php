<?php
$this->layout("_theme");

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Alteração de Foto</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f4f4f4;
  }

  .profile-container {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .profile-image {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 20px;
  }

  input[type="file"] {
    display: none;
  }

  .upload-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
  }
</style>
</head>
<body>
  <div class="profile-container">
    <h2>Alteração de Foto de Perfil</h2>
    <img class="profile-image" src="default-profile-image.jpg" alt="Foto de Perfil">
    <label for="profile-photo" class="upload-button">Selecionar Foto</label>
    <input type="file" id="profile-photo" name="profile-photo" accept="image/*">
  </div>
</body>
</html>
