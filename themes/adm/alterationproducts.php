<?php
$this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
<!-- Omissão do restante do código HTML -->
</head>
<body>
    <title>
    </title>
<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <h2>Alteração manual produtos</h2>
            <div class="col-lg-6">
                <form role="form" class="php-email-form" method="POST">
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="name" id="subject" placeholder="nome produto" value="">
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" id="email" class="form-control" name="email" id="subject" placeholder="preco" value="">
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" type="password" name="password" id="subject" placeholder="categoria" value="" >
                
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message"></div>
                        <div id="message">
                    </div>
                    <div class="text-center">
                        <button type="submit">Enviar</button>

                    </div>
                    <div class="response">
        <a href="<?= url("/admin")?>"> voltar</a></br>

                </form>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" async>
   
   const form = document.querySelector(".php-email-form");
const email = document.querySelector("#email");
const headers = {
  email: "fabiosantos@ifsul.edu.br",
  password: "12345678"
};

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  const nameInput = document.querySelector('input[name="name"]');
  const emailInput = document.querySelector('input[name="email"]');
  const passwordInput = document.querySelector('input[name="password"]');

  const name = nameInput.value;
  const email = emailInput.value;
  const password = passwordInput.value;

  // Verifica se o email já foi preenchido anteriormente
  if (email === headers.email) {
    document.querySelector("#message").innerHTML = "Email já cadastrado!";
    return;
  }

  // Verifica se todos os campos estão preenchidos
  if (name === "" || email === "" || password === "") {
    const errorMessageDiv = document.querySelector(".sent-message");
    errorMessageDiv.textContent = "Por favor, preencha todos os campos.";
    errorMessageDiv.style.display = "block";
    return;
  }

  const data = await fetch(`<?= url("api/user");?>`, {
    method: "POST",
    body: new FormData(form),
    headers: headers
  });
  const user = await data.json();
  console.log(user);

  if (user.success) {
    const sentMessageDiv = document.querySelector(".sent-message");
    sentMessageDiv.textContent = "Usuário cadastrado com sucesso!";
    sentMessageDiv.style.display = "block";
    form.reset();
  } else {
    const errorMessageDiv = document.querySelector(".sent-message");
    errorMessageDiv.textContent = "Ocorreu um erro ao cadastrar o usuário.";
    errorMessageDiv.style.display = "block";
  }
});

</script>
</body>
</html>
