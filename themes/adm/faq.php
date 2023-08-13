





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FAQ - Perguntas Frequentes</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }

  .faq-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 40px;
  }

  .question {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .answer {
    font-size: 16px;
    margin-bottom: 20px;
  }

  .response {
    border: 1px solid #ddd;
    padding: 10px;
    width: 100%;
    margin-top: 10px;
  }

  .submit-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
  }

  .back-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
  }
</style>
</head>
<body>
  <div class="faq-container">
    <button class="back-button" onclick="history.go(-1)">Voltar</button>
    <div class="faq-item">
      <div class="question">Como faço para criar uma conta?</div>
    
      <div class="response">
        <textarea placeholder="Responda aqui..."></textarea>
        <button class="submit-button">Enviar Resposta</button>
      </div>
    </div>
    <div class="faq-item">
      <div class="question">Quais são os métodos de pagamento aceitos?</div>
   
      <div class="response">
        <textarea placeholder="Responda aqui..."></textarea>
        <button class="submit-button">Enviar Resposta</button>
      </div>
    </div>
    <!-- Adicione mais perguntas e respostas conforme necessário -->
  </div>
</body>
</html>
