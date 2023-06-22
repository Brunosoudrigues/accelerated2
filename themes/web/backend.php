<?php
// Conexão com o banco de dados
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bd_accelerated';

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conn->connect_error);
}

// Verifica se a pergunta foi enviada
if (isset($_POST['question'])) {
    $question = $_POST['question'];

    // Prepara e executa a consulta SQL para inserir a pergunta no banco de dados
    $stmt = $conn->prepare('INSERT INTO faqs (question) VALUES (?');
    $stmt->bind_param('s', $question);
    if ($stmt->execute()) {
        echo 'Pergunta inserida com sucesso no banco de dados!';
    } else {
        echo 'Erro ao inserir pergunta no banco de dados: ' . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
