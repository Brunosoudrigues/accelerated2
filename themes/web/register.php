<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Verifica se todos os campos foram preenchidos
  if (empty($name) || empty($email) || empty($password)) {
    echo "Por favor, preencha todos os campos.";
  } else {
    // Processa o cadastro
    // ...

    // Exibe mensagem de sucesso
    echo "Cadastro realizado com sucesso!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <style>
    /* Estilos gerais */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }
    
    /* Estilos específicos para o formulário de login */
    form {
      background-color: #f7f7f7;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .form-group {
      margin-bottom: 15px;
    }
    
    .form-control {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    
    .text-center {
      text-align: center;
    }
    
    button[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
    }
    
    button[type="submit"]:hover {
      background-color: #45a049;
    }
    
    /* Estilos para mensagens */
    .loading,
    .error-message,
    .sent-message {
      margin-top: 10px;
      display: none;
      text-align: center;
    }
    
    .loading {
      color: #4CAF50;
    }
    
    .error-message {
      color: #d9534f;
    }
    
    .sent-message {
      color: #4CAF50;
    }
  </style>
</head>
<body>
  <section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-6">
          <form role="form" class="php-email-form">
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="name" id="subject" placeholder="Seu nome" value="">
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="email" id="subject" placeholder="Seu email" value="">
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="password" id="subject" placeholder="Sua senha" value="">
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message"></div>
            </div>
            <div class="text-center">
              <button type="submit">Enviar</button>
              <button type="submit">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


<script type="text/javascript" async>
    const form = document.querySelector(".php-email-form");
    const sentMessageDiv = document.querySelector(".sent-message");
    const errorMessageDiv = document.querySelector(".error-message");

    const headers = {
        email: "",
        password: ""
    };

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        //console.log(new FormData(form));
        const data = await fetch(`<?= url("api/user"); ?>`, {
            method: "POST",
            body: new FormData(form),
            headers: headers
        });
        const user = await data.json();
        console.log(user);

        if (user.success) {
            sentMessageDiv.textContent = "Cadastro realizado com sucesso!";
            sentMessageDiv.style.display = "block";
            form.reset();
        } else if(email == "" || name == "" || password == "") {
            errorMessageDiv.textContent = "Ocorreu um erro ao cadastrar o usuário.";
            errorMessageDiv.style.display = "block";
        }
    });
</script>
