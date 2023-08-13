<?php

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de produtos </title>
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
            <label for="category_id">category_id</label>
            <input name="category_id" type="text">
        </div>
        <div>
            <label for="name">name</label>
            <input name="name" type="text">
        </div>
        <div>
            <label for="price">price</label>
            <input name="price" type="text">
        </div>
        <div>
            <label for="image">image</label>
            <input name="image" type="text">
    </div>
    <div>
            <label for="nameproducts">nameproducts</label>
            <input name="nameproducts" type="text">
        </div>
        <div>
            <button>Enviar</button>
        </div>
        <div class="response">
        <a href="<?= url("/")?>"> voltar</a></br>

        </div>
    </form>

    <script type="text/javascript">
        const form = document.getElementById("productForm");

        form.addEventListener("submit", async (event) => {
            event.preventDefault();

            const formData = new FormData(form);
            const url = "insert_product.php"; // Replace with your PHP endpoint to insert the product

            try {
                const response = await fetch(url, {
                    method: "POST",
                    body: formData,
                });

                if (response.ok) {
                    const responseData = await response.json();
                    if (responseData.success) {
                        // Product inserted successfully
                        showResponse("Produto cadastrado com sucesso!");
                        form.reset();
                    } else {
                        showResponse("Erro ao cadastrar o produto. Tente novamente mais tarde.");
                    }
                } else {
                    showResponse("Ocorreu um erro ao fazer a requisição. Tente novamente mais tarde.");
                }
            } catch (error) {
                showResponse("Ocorreu um erro na comunicação com o servidor. Tente novamente mais tarde.");
                console.error(error);
            }
        });

        function showResponse(message) {
            const responseDiv = document.querySelector(".response");
            responseDiv.textContent = message;
        }
    </script>   

        
</body>

</html>
