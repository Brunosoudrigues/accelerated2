

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>App</title>
<style>
  /* Global Styles */
  body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
  }

  /* Header Styles */
  header {
    background-color: #007bff;
    color: #fff;
    padding: 20px 0;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
  }

  .logo {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
  }

  .logo img {
    width: 100px;
    height: auto;
    border-radius: 50%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .app-title {
    font-size: 36px;
    font-weight: bold;
    letter-spacing: 2px;
  }

  /* Navigation Styles */
  nav {
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    padding: 15px 0;
    border-bottom: 1px solid #ddd;
  }

  nav a {
    text-decoration: none;
    color: #555;
    padding: 10px 20px;
    margin: 0 15px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
  }

  nav a:hover {
    background-color: #007bff;
    color: #fff;
  }

  /* Main Content Styles */
  .content-container {
    max-width: 1200px;
    margin: 30px auto;
    padding: 30px;
    background-color: #fff;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    line-height: 1.6;
    font-size: 18px;
  }

  .content-container h2 {
    font-size: 32px;
    margin-bottom: 20px;
  }

  .content-container p {
    margin-bottom: 15px;
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
  <a href="<?= url("/app/perfil")?>">Perfil do cliente</a>
    <a href="<?= url("/app/carrinho")?>">Carrinho de Compras</a>

  </nav>
  <div class="content-container">
    <?php echo $this->section("content"); ?>

  </div>
</body>
</html>
