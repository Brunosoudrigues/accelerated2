<?php


namespace Source\Models;

use Source\Core\Connect;

class Address
{
    private $street;
    private $number;
    private $complement;

    public function __construct($street = null, $number = null, $complement = null)
    {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setStreet($street): void
    {
        $this->street = $street;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number): void
    {
        $this->number = $number;
    }

    public function getComplement()
    {
        return $this->complement;
    }

    public function setComplement($complement): void
    {
        $this->complement = $complement;
    }

    public function selectByIdUser(int $userId)
    {
        $sql = "SELECT addresses.*, users.name as user_name 
                FROM addresses 
                JOIN users ON addresses.user_id = users.id 
                WHERE addresses.user_id = :user_id";

        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindParam(":user_id", $userId, \PDO::PARAM_INT);

        try {
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            return false; // Retornar falso em caso de erro
        }
    }

    public function getAllAddresses()
    {
        // Implemente a lógica para buscar todos os endereços
        // Supondo que você está usando algum banco de dados e quer fazer uma consulta SQL
        // A lógica abaixo é apenas um exemplo e pode variar dependendo do seu banco de dados

        $query = "SELECT * FROM addresses";
        $stmt = Connect::getInstance()->query($query);

        return $stmt->fetchAll();
    }
}
