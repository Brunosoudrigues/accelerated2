



<?php
$this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .text {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        .btn-insert {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .faq {
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
    <link id="theme-style" rel="stylesheet" href="
    <title>FAQs</title>
</head>
<body>
<div class="container">
    <h2>Olá, FAQs</h2>
    <div class="text">
        <label for="question">Pergunta:</label>
        <input type="text" id="question">
    </div>

    <button class="btn-insert">Inserir e mostrar</button>
    <div class="faq" id="divFaqs"></div>
</div>
<script type="module" async>
    import { request } from "<?php echo url("/assets/_shared/functions.js"); ?>";
    const url = "<?php echo url("/api/faqs"); ?>";
    const options = {
        method: "GET"
    };

    const getFaqs = async () => {
        const faqs = await request(url, options);
        //console.log(faqs);
    };

    getFaqs();

    const fetchButton = document.querySelector(".btn-insert");
    const divFaqs = document.getElementById("divFaqs");

    fetchButton.addEventListener("click", async () => {
        const faqs = await request(url, options);
        console.log(faqs);
        divFaqs.innerHTML = ""; // Limpar conteúdo anterior

        faqs.forEach((faq) => {
            const faqElement = document.createElement("div");
            faqElement.classList.add("faq");

            const questionElement = document.createElement("p");
            questionElement.textContent = `Pergunta: ${faq.question}`;

            const answerElement = document.createElement("p");
            answerElement.textContent = `Resposta: ${faq.answer}`;

            faqElement.appendChild(questionElement);
            faqElement.appendChild(answerElement);

            divFaqs.appendChild(faqElement);
        });
    });


</script>
</body>
</html>
