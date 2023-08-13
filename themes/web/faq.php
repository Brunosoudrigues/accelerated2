<?php

require_once 'Connect.php';

class Faq
{
    // ... restante do código igual ao exemplo anterior ...

    public function insert()
    {
        $connection = Connect::getInstance();

        $query = "INSERT INTO faqs (question, answer) VALUES (:question, :answer)";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':question', $this->question);
        $stmt->bindValue(':answer', $this->answer);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Restante do código igual ao exemplo anterior ...

    public function redirectToIndex()
    {
        echo '<script>window.location.href = "index.php";</script>';
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["question"])) {
        $question = $_POST["question"];

        // Criação de uma instância da classe Faq
        $faq = new Faq($question);

        // Chamada do método insert da classe Faq para inserir a pergunta no banco de dados
        $faq->insert();

        // Redirecionar para evitar o reenvio do formulário ao atualizar a página
        $faq->redirectToIndex();
        exit;
    }
}
