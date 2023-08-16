<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  
  $userExists = verificarUsuarioNoBanco($email, $password);

  if ($userExists) {
    echo json_encode(["success" => true]);
  } else {
    echo json_encode(["success" => false]);
  }
}

function verificarUsuarioNoBanco($email, $password) {
  

  if ($email === $storedEmail && $password === $storedPassword) {
    return true;
  } else {
    return false;
  }
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Formulário de Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f7f7f7;
        }

        form div {
            margin-bottom: 10px;
        }

        form label {
            display: inline-block;
            width: 100px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="password"] {
            width: 200px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .response {
            margin-top: 10px;
            font-weight: bold;
        }

    </style>
</head>

<body>
    <form>
        <div>
            <label for="email">E-mail:</label>
            <input name="email" type="text">
        </div>
        <div>
            <label for="password">Senha:</label>
            <input name="password" type="password">
        </div>
        <div>
            <button>Fazer login</button>
        </div>
        <div class="response">
        <a href="<?= url("/")?>"> voltar</a></br>
        <a href="<?= url("/cadastro")?>"> Cadastre-se</a></br>
        <a href="<?= url("/alteracao")?>"> deseja alterar seus dados? clique aqui!</a>
        </div>
    </form>

    <script type="text/javascript" async>
        const url = `<?= url("api/user/login"); ?>`;

        async function request(url, options) {
            try {
                const response = await fetch(url, options);
                const data = await response.json();
                return data;
            } catch (err) {
                console.error(err);
                return {
                    type: "error",
                    message: err.message
                };
            }
        }

        document.querySelector("form").addEventListener("submit", async (e) => {
            e.preventDefault();
            const formData = new FormData(document.querySelector("form"));
            const options = {
                method: 'POST',
                body: formData
            };
            const resp = await request(url, options);
            console.log(resp);
            const responseElement = document.querySelector(".response");
            if (resp.type === "error") {
                responseElement.style.color = "red";
            } else {
                responseElement.style.color = "green";
            }
            responseElement.textContent = resp.message;
        });
    </script>
</body>

</html>
