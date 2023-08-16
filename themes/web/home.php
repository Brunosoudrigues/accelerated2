<?php
$this->layout("_theme");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #fff8dc; /* Tons de amarelo */
    }

    header {
      background-color: #f39c12; /* Amarelo mais escuro */
      color: white;
      padding: 10px;
      text-align: center;
    }

    .content {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #f39c12; /* Amarelo mais escuro */
      font-size: 1.8em;
      margin-bottom: 15px;
    }

    h2 {
      color: #f39c12; /* Amarelo mais escuro */
      font-size: 1.5em;
      margin-top: 20px;
    }

    p {
      color: #333; /* Cor de texto padrão */
      line-height: 1.6;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

  <div class="content">
    <section>
      <h2>Dados de Fundação</h2>
      <p>Nossa loja de carros foi fundada em 2005 com o objetivo de oferecer aos nossos clientes as melhores opções de peças e um atendimento excepcional.</p>
    </section>
    <section>
      <h2>Sobre Nós</h2>
      <p>Somos apaixonados por carros e estamos comprometidos em proporcionar uma experiência única de compra para cada cliente que entra na nossa loja. Nossa equipe é composta por profissionais altamente qualificados e prontos para ajudar você a encontrar o carro dos seus sonhos.</p>
    </section>
    <section>
      <h2>Nossos Valores</h2>
      <p>Nosso compromisso é com a transparência, honestidade e qualidade. Valorizamos a confiança que nossos clientes depositam em nós e trabalhamos incansavelmente para superar suas expectativas.</p>
    </section>
  </div>
</body>
</html>
