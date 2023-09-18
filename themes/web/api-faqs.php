<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perguntas Frequentes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8; /* Fundo cinza claro */
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .text {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #e74c3c; /* Vermelho */
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            width: calc(100% - 22px);
        }

        .btn-insert {
            background-color: #e74c3c; /* Vermelho */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-insert:hover {
            background-color: #c0392b; /* Vermelho mais escuro ao passar o mouse */
        }

        .faq {
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            margin-top: 10px;
            font-size: 14px;
            color: #e74c3c; /* Vermelho */
        }
    </style>
</head>
<body>


    <button class="btn-insert">Inserir FAQ & exibir duvidas!</button>

    <div class="faq">
        <h2>Perguntas Frequentes</h2>
        <div id="divFaqs"></div>
    </div>
</div>

<script type="module" async>
    import {request, requestDebugError} from "<?php echo url("/assets/_shared/functions.js"); ?>";

    const url = "<?php echo url("/api/faqs"); ?>";
    const options = { method: "GET" };

    const getFaqs = async () => {
        const faqs = await request(url, options);
        //console.log(faqs);
    };

    getFaqs();

    const button = document.querySelector(".btn-insert");
    button.addEventListener("click", async () => {
        const faqs = await request(url, options);
        console.log(faqs);
        const divFaqs = document.querySelector("#divFaqs");
        divFaqs.innerHTML = ''; // Limpa o conteúdo existente
        faqs.forEach((faq) => {
            console.log(faq);
            const faqElement = document.createElement('p');
            faqElement.textContent = `${faq.question} ${faq.answer}`;
            divFaqs.appendChild(faqElement);
        });
    });
</script>

</body>
</html>
