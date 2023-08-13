

<?php
echo $this->section("content");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>App</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  header {
    background-color: #007bff;
    color: #fff;
    padding:0.5px 0;
    text-align: center;
  }

  .logo {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    margin-left: 20px;
  }

  .logo img {
    width: 100px;
            height: 100px;
            margin-right: 10px;
  }

  .app-title {
    flex-grow: 1;
  }

  nav {
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    padding: 10px 0;
  }

  nav a {
    text-decoration: none;
    color: #333;
    padding: 1px 20px;
    margin: 0 10px;
    border-radius: 4px;
    transition: background-color 0.3s;
  }

  nav a:hover {
    background-color: #ddd;
  }
</style>
</head>
<body>
  <header>
    <div class="logo">
      <img src="<?= url("./assets/web/images/logoautopeças-removebg-preview.png")?>" alt="Logo da Empresa">
    </div>
    <h1 class="app-title">App</h1>
  </header>
  <nav>
    <a href="<?= url("/app/upload")?>">Upload de Fotos</a>
    <a href="<?= url("/app/alteracao")?>">Alteração de Foto</a>
    <a href="<?= url("/app/carrinho")?>">Carrinho de Compras</a>
  </nav>
 
</body>
</html>
