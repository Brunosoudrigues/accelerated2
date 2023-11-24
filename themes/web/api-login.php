    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login com API</title>
        <style>
            /* Estilo para o corpo da página */
            body {
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }

            /* Estilo para o formulário de login */
            #formLogin {
                max-width: 500px;
                background-color: #fff;
                padding: 30px;
                border-radius: 15px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
                width: 100%;
                box-sizing: border-box;
            }

            #formLogin div {
                margin-bottom: 20px;
            }

            #formLogin input[type="text"] {
                width: calc(100% - 20px);
                padding: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }

            #formLogin button {
                width: calc(100% - 20px);
                padding: 15px;
                background-color: #ff8c00;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                box-sizing: border-box;
            }

            #formLogin button:hover {
                background-color: #e07b00;
            }

            /* Estilo para o botão "Lista de Endereços" */
            #listAddress {
                display: block;
                width: 250px;
                margin: 30px auto;
                padding: 15px;
                background-color: #ff8c00;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                box-sizing: border-box;
            }

            #listAddress:hover {
                background-color: #e07b00;
            }

            /* Estilo para a lista de endereços */
            #address {
                max-width: 500px;
                margin: 0 auto;
                background-color: #fff;
                padding: 30px;
                border-radius: 15px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
                width: 100%;
                box-sizing: border-box;
            }

            /* Estilo para erros ou mensagens de debug */
            #errorMessage {
                color: red;
                margin-top: 10px;
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
        <!-- Div to display messages -->
        <div id="address">
            Lista
        </div>
        <script type="module" async>
        // Função para exibir mensagens na página
        function printMessage(message) {
            const outputDiv = document.querySelector("#address");
            const messageDiv = document.createElement("div");
            messageDiv.textContent = message;
            outputDiv.appendChild(messageDiv);
        }

        // Função para redirecionar para a página de perfil
        function redirectToProfilePage(userData) {
            if (userData && userData.name && userData.email) {
                const urlDestino = `http://www.localhost/accelerated/app/perfil?name=${userData.name}&email=${userData.email}`;
                window.location.href = urlDestino;
            } else {
                console.error("Dados de usuário inválidos:", userData);
                printMessage("Erro ao obter informações do usuário para redirecionamento.");
            }
        }

        // Função para lidar com o envio do formulário de login
        function handleLoginFormSubmit(event) {
            event.preventDefault();

            const email = document.querySelector("#email").value;
            const password = document.querySelector("#password").value;

            // Verificar se o email ou senha estão vazios
            if (!email || !password) {
                printMessage("Por favor, insira todos os dados.");
                return;
            }

            const urlLogin = "<?= url("api/user/login"); ?>";
            const options = {
                method: "get",
                headers: {
                    email,
                    password
                }
            };

            fetch(urlLogin, options)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Usuário não cadastrado!");
                    }
                    return response.json();
                })
                .then(user => {
                    // Armazenar os dados do usuário no localStorage
                    localStorage.setItem("userLogin", JSON.stringify({ user }));
                    printMessage("Login bem-sucedido. Você será redirecionado em 5 segundos!");
                    setTimeout(() => {
                        redirectToProfilePage(user.user);  // Redireciona após 5 segundos
                    }, 5000);
                })
                .catch(error => {
                    console.error("Erro no login:", error);
                    printMessage("Erro no login: " + error.message);
                });
        }

        // Adicionar um ouvinte de eventos ao formulário de login
        const formLogin = document.querySelector("#formLogin");
        formLogin.addEventListener("submit", handleLoginFormSubmit);
    </script>
     
    </body>
    </html>
