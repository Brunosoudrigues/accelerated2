<?php
   
?>


<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Alteração de Dados</title>
    <link rel="stylesheet" href="<?=("./assets/web/css/stylelore.css")?>">
    <script type="text/javascript" src="assets/cadastro.js" async></script>

</head>

<div class="text">
                    <label for="question">Fale a sua duvida</label>
                    <input name="password" type="text" id="question" placeholder="escreva aqui">
                </div>
                <button class="btn-insert">Enviar</button>
<?php
   if(!empty($faqs)){
       //var_dump($faqs);
       foreach ($faqs as $faq){
           //var_dump($faq);
           echo "<div>{$faq->question} - {$faq->answer}</div>";
       }
   }
?>
</html>