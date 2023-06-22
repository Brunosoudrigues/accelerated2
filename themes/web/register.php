<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Menu de Cadastro</title>

    <link rel="stylesheet" href="<?=("./assets/web/css/stylelore.css")?>">
    <!-- <script type="text/javascript" src="assets/cadastro.js" async></script> -->
</head>

<body>


<main id ="main">
    <?php
echo $this -> section("register");
    ?>
</main>

    <form id="formUsers">
        <div class="main-login">
            <div class="left-login">
                <h1>Faça o seu cadastro
                </h1>
                <img src="assets/web/images/logoautopeças-removebg-preview.png" class="left-img" alt="logo" />
            </div>
            <div class="right-login">
                <div class="card-login">
                    <h1>Cadastre-se</h1>
                    <div class="textfield">
                        <label for="nome"> Nome Completo</label>
                        <input name="name" type="text" id="nome" placeholder="digite seu nome completo...">
                    </div>
                    <div class="textfield">
                        <label for="email">E-mail</label>
                        <input name="email" type="text" id="email" placeholder="digite seu e-mail...">
                    </div>
                    <div class="textfield">
                        <label for="endereco">Endereço</label>
                        <input name ="address" type="text" id="endereco" placeholder="digite seu endereço...">
                    </div>
        
                    <div class="textfield">
                        <label for="senha">Sua senha</label>
                        <input name ="password" type="password" id="senha" placeholder="crie uma senha...">
                         <div id="senhaFraca"></div>
                    </div>
                    <button class="btn-login">Cadastro</button>
                    <div id="message">

                      
                    </div>
                      <a class="back" href="<?= url("/")?>">Voltar</a>
                </div>
            </div>
        </div>

    </form>
</body>
</html>

<!-- <script async>
    const form = document.querySelector("#formUsers");
    form.addEventListener("submit", async (e) =>{
        e.preventDefault();
        const dataUser = new FormData(form);
        const data = await fetch("http://localhost/loja/api/user-insert.php",{
            method: "POST",
            body:dataUser,
        });
        const user = await data.json();
        console.log(user);
        document.querySelector("#message").setAttribute("style","display");
                        if(user.type === "success"){
                            message.textContent = `Olá, ${user.name}!`;
                        } else {
                            message.textContent = user.message;
                        }
                        setTimeout(() => {
                            message.setAttribute("style","display: none");
                        },3000);
    });


</script> -->