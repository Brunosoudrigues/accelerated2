<?php
$this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com API</title>
    <style>
        /* Estilo para o cabeçalho (h1) */
        h1 {
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        /* Estilo para o formulário */
        #formLogin {
            margin: 0 auto;
            width: 300px;
            text-align: center;
        }

        /* Estilo para as divs dentro do formulário */
        div {
            margin-bottom: 10px;
        }

        /* Estilo para os inputs de texto */
        input[type="text"] {
            width: 100%;
            padding: 5px;
        }

        /* Estilo para o botão de login */
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        /* Estilo para o script */
        script {
            display: none; /* Escondendo o script na renderização da página */
        }
    </style>
</head>
<body>
    <h1>Login com API</h1>
    <div>
        <form id="formLogin">
            <div>E-mail: <input type="text" id="email" name="email" value="fabiosantos@ifsul.edu.br"></div>
            <div>Password: <input type="text" id="password" name="password" value="12345678"></div>
            <button type="submit">Login</button>
        </form>
    </div>

    <script type="module" async>
        import { request, requestDebugError } from "<?php echo url("/assets/_shared/functions.js"); ?>";
        const formLogin = document.querySelector("#formLogin");
        formLogin.addEventListener("submit", (event) => {
            event.preventDefault();
            const urlLogin = "<?= url("api/user/login"); ?>";
            const options = {
                method : "get",
                headers : {
                    email : document.querySelector("#email").value,
                    password : document.querySelector("#password").value
                }
            };
            fetch(urlLogin,options).then(response => {
                response.json().then(user => {
                    console.log(user);
                    localStorage.setItem("userLogin",JSON.stringify(user));
                });
            });
        });
    </script>


</body>
</html>
