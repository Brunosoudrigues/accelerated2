<?php

namespace Source\Models;

use Source\Core\Connect;
use PDO;
use PDOException;
class Faq
{
    private $id;
    private $question;
    private $answer;

    public function __construct($question = null, $answer = null)
    {
        $this->question = $question;
        $this->answer = $answer;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($question)
    {
        $this->question = $question;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    public function insert(): bool
    {
        $query = "INSERT INTO faqs (id, question, answer) VALUES (NULL, :question, :answer)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":question", $this->question);
        $stmt->bindValue(":answer", "Aguardando resposta");
        try {
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectAll()
    {
        $query = "SELECT * FROM faqs";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Faq::class);
    }
}
