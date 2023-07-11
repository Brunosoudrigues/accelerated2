<!DOCTYPE html> 
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Menu de login</title>

    <link rel="stylesheet" href="<?=("./assets/web/css/stylelore.css")?>">
   <!-- <script type="text/javascript" src="assets/login.js" async></script> -->
</head>

<body>

<main id ="main">
    <?php
echo $this -> section("login");
    ?>
</main>

    <form id="loginUsers" >
    <div class="main-login">
        <div class="left-login">
            <h1>Faça o seu Login</h1>
            <img src="assets/web/images/logoautopeças-removebg-preview.png" class="left-img" alt="logo" />
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>LOGIN</h1>
                <div class="textfield">
                    <label for="email">Usuário</label>
                    <input name="email" type="text" id="email" placeholder="Seu email como usuário">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input name="password" type="password" id="senha" placeholder="Senha">
                </div>
                <button class="btn-login">login</button>
                <h4><a class="alteracao" href="<?= url("/alteracao")?>">deseja alterar seus dados? clique aqui!</a></h4>
                <br>
            <h4><a class="alteracao" href="<?= url("/cadastro")?>">Cadastre-se</a></h4>
                <div id="message">

                </div>
            
            </div>
        </div>
    </div>
</form>
</body>

 </html>
<script async>
                    // const form = document.querySelector("#loginUsers");
                    // const message = document.querySelector("#message");
                    // form.addEventListener("submit", async (e) => {
                    //     e.preventDefault();
                    //     const dataUser = new FormData(form);
                    //     const data = await fetch("http://localhost/loja/api/user-login.php",{
                    //         method: "POST",
                    //         body: dataUser,
                    //     });
                    //     const user = await data.json();
                    //     console.log(user);
                    //     message.textContent = user.message;
                       
                    //     message.setAttribute("style","display")
                    //     if(user.type === "error"){
                    //         // trocar o status da message
                    //         message.textContent = user.message;
                    //     } else {
                    //         // trocar o status da message
                    //         message.textContent = `Olá, ${user.name}!`;
                    //     }
                    //     setTimeout(() => {
                    //         message.setAttribute("style","display: none")
                    //     }, 3000);
        
                    // });


</script>