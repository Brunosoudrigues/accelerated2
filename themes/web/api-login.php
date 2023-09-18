<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Fundo cinza claro */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #3498db; /* Azul */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            color: white;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: white;
        }

        input[type="text"], input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button[type="submit"] {
            width: calc(100% - 22px);
            padding: 15px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #2574a9;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login com API</h1>

        <form id="formLogin">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" placeholder="Digite seu e-mail">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Digite sua senha">
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
    <script type="module" async>
    import {request, requestDebugError} from "<?php echo url("/assets/_shared/functions.js"); ?>";
    const formLogin = document.querySelector("#formLogin");
    formLogin.addEventListener("submit", (event) => {
        event.preventDefault();
        console.log("oi");
        const urlLogin = "<?= url("api/user/login"); ?>";
        console.log(urlLogin);
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
                //console.log(JSON.stringify(user));
                localStorage.setItem("userLogin",JSON.stringify(user));
            });
        });
    });
</script>
</body>
</html>
