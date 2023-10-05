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
            max-width: 500px; /* Made it a bit wider */
            background-color: #fff;
            padding: 30px; /* Made padding a bit larger */
            border-radius: 15px; /* Adjusted border-radius */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            box-sizing: border-box;
        }

        #formLogin div {
            margin-bottom: 20px; /* Increased margin */
        }

        #formLogin input[type="text"] {
            width: calc(100% - 20px);
            padding: 15px; /* Made padding a bit larger */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        #formLogin button {
            width: calc(100% - 20px);
            padding: 15px; /* Made padding a bit larger */
            background-color: #ff8c00; /* Changed to orange */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-sizing: border-box;
        }

        #formLogin button:hover {
            background-color: #e07b00; /* Darker orange on hover */
        }

        /* Estilo para o botão "Lista de Endereços" */
        #listAddress {
            display: block;
            width: 250px; /* Made it a bit wider */
            margin: 30px auto; /* Increased margin */
            padding: 15px; /* Made padding a bit larger */
            background-color: #ff8c00; /* Changed to orange */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-sizing: border-box;
        }

        #listAddress:hover {
            background-color: #e07b00; /* Darker orange on hover */
        }

        /* Estilo para a lista de endereços */
        #address {
            max-width: 500px; /* Made it a bit wider */
            margin: 0 auto;
            background-color: #fff;
            padding: 30px; /* Made padding a bit larger */
            border-radius: 15px; /* Adjusted border-radius */
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
    <div>
        <button id="listAddress">Lista De Endereços</button>
    </div>
    <!-- Div to display messages -->
    <div id="address">
        Lista
    </div>
    <script type="module" async>

function redirectToAddressesPage() {
    const urlDestino = "http://www.localhost/accelerated/app/perfil";  // Substitua "URL_DESTINO" pela URL de destino
    window.location.href = urlDestino;
}
        function printMessage(message) {
            const outputDiv = document.querySelector("#address");
            const messageDiv = document.createElement("div");
            messageDiv.textContent = message;
            outputDiv.appendChild(messageDiv);
        }

        const formLogin = document.querySelector("#formLogin");
        formLogin.addEventListener("submit", (event) => {
    event.preventDefault();
    const email = document.querySelector("#email").value;
    const password = document.querySelector("#password").value;

    // Check if email or password is empty
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
            localStorage.setItem("userLogin", JSON.stringify(user));
            printMessage("Login bem-sucedido.Você será redirecionado em 5 segundos!");
            setTimeout(() => {
                redirectToAddressesPage();  // Redireciona após 5 segundos
            }, 10000);
        })
        .catch(error => {
            printMessage("Erro no login: " + error.message);
        });});           // Evento de clique no botão "Lista de Endereços"
    document.querySelector("#listAddress").addEventListener("click", () => {
        const userLogin = JSON.parse(localStorage.getItem("userLogin"));
        if (!userLogin || !userLogin.user || !userLogin.user.token) {
            printMessage();
            return;
        }
        console.log(`Token do usuário: ${userLogin.user.token}`);
        const optionsAddress = {
            method: "get",
            headers: {
                token: userLogin.user.token
            }
        };
        const urlAddress = "<?= url("api/user/adresses"); ?>";
        fetch(urlAddress, optionsAddress).then(response => {
            response.json().then(addresses => {
                const addressList = document.querySelector("#address"); // Define addressList here

                // Limpa o conteúdo anterior, se houver
                addressList.innerHTML = "";

                // Itera sobre os endereços e cria elementos para exibi-los
                addresses.forEach(address => {
                    const addressElement = document.createElement("div");
                    addressElement.textContent = `Rua: ${address.street}, Número: ${address.number}, Complemento:${address.complement}`;
                    addressList.appendChild(addressElement);
                });
            }).catch(error => {
                printMessage("Erro ao obter endereços: " + error.message);
            });
        }).catch(error => {
            printMessage("Erro na requisição de endereços: " + error.message);
        });
    });
    document.querySelector("#listAddress").addEventListener("click", () => {
            const userLogin = JSON.parse(localStorage.getItem("userLogin"));
            if (!userLogin || !userLogin.user || !userLogin.user.token) {
                printMessage("Token de usuário não encontrado.");
                return;
            }
            const addressList = document.querySelector("#address");
            addressList.innerHTML = ""; // Limpa o conteúdo anterior
            localStorage.removeItem("userLogin"); // Remove o usuário do localStorage
            loadAddresses(userLogin.user.token);
        });
    
    </script>
</body>
</html>
