
<?php
   $this->layout("_theme");
?>







<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>faq</title>
    <link rel="stylesheet" href="./assets/web/css/stylelore.css">
    <script type="text/javascript" src="assets/cadastro.js" async></script>
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
</head>

<body>
    <div class="container">
        <div class="text">
            <label for="question">Fale a sua dúvida</label>
            <input name="password" type="text" id="question" placeholder="Escreva aqui">
        </div>
        <button class="btn-insert">Enviar</button>

        <?php
        if (!empty($faqs)) {
            foreach ($faqs as $faq) {
                echo "<div class=\"faq\">{$faq->question} - {$faq->answer}</div>";
            }
        }
        ?>
    </div>
</body>

</html>
