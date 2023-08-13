<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload de Foto de Perfil</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }

  .profile-upload {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .upload-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type="file"] {
    display: none;
  }

  label {
    cursor: pointer;
  }
</style>
</head>
<body>
  <div class="profile-upload">
    <h2>Upload de Foto de Perfil</h2>
    <form action="#" method="post" enctype="multipart/form-data">
      <label for="profile-photo">
        <img src="default-profile-image.jpg" alt="Foto de Perfil">
        <p>Selecione uma imagem</p>
      </label>
      <input type="file" id="profile-photo" name="profile-photo" accept="image/*">
      <button class="upload-button" type="submit">Enviar</button>
    </form>
  </div>
</body>
</html>
