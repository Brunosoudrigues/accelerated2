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
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f4f4f4;
  }

  .upload-container {
    text-align: center;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .upload-input {
    display: none;
  }

  .upload-label,
  .submit-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .submit-button {
    background-color: #28a745;
    margin-top: 10px;
  }

  .image-preview {
    margin-top: 20px;
  }

  .image-preview img {
    max-width: 200px;
    max-height: 200px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
</style>
<title>Upload de Foto</title>
</head>
<body>
  <div class="upload-container">
    <h2>Upload de Foto</h2>
    <label for="file" class="upload-label">Escolher Foto</label>
    <input type="file" id="file" class="upload-input">
    <p id="filename">Nenhum arquivo selecionado</p>
    <div class="image-preview" id="imagePreview">
      <img src="" alt="Pré-visualização da Imagem" id="previewImage">
    </div>
    <button class="submit-button" id="submitButton">Enviar</button>
  </div>
  <script>
    const fileInput = document.getElementById('file');
    const filenameDisplay = document.getElementById('filename');
    const imagePreview = document.getElementById('imagePreview');
    const previewImage = document.getElementById('previewImage');
    const submitButton = document.getElementById('submitButton');

    fileInput.addEventListener('change', (event) => {
      const file = event.target.files[0];
      if (file) {
        filenameDisplay.textContent = file.name;
        const reader = new FileReader();
        reader.onload = function() {
          previewImage.src = reader.result;
        };
        reader.readAsDataURL(file);
        imagePreview.style.display = 'block';
      } else {
        filenameDisplay.textContent = 'Nenhum arquivo selecionado';
        previewImage.src = '';
        imagePreview.style.display = 'none';
      }
    });

    submitButton.addEventListener('click', () => {
      // Aqui você pode adicionar a lógica para enviar o arquivo para o servidor
      alert('Arquivo enviado com sucesso!');
    });
  </script>
</body>
</html>
