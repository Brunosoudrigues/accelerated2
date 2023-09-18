<?php

namespace Source\App\Api;

use Source\Models\Address;

class Addresses extends Api
{
    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
    }



    public function listByIdUser(array $data): void
{
    // Verifique se foi passado um ID de usuário válido
    if (!isset($data['user_id'])) {
        $this->back(['error' => 'Invalid user ID'], 400);
        return;
    }

    $userId = $data['user_id'];

    // Supondo que você tenha um método para buscar endereços por ID de usuário na classe Address
    $addresses = (new Address())->selectByIdUser($userId);

    if ($addresses === false) {
        $this->back(['error' => 'Unable to fetch addresses'], 500);
    } else {
        $this->back(['addresses' => $addresses], 200);
    }
}

    public function listAddresses(array $data): void
    {
        // Verifique se foi passado um ID de usuário para buscar endereços relacionados a esse usuário
        if (isset($data['user_id'])) {
            // Supondo que você tenha um método para buscar endereços por ID de usuário na classe Address
            $addresses = (new Address())->getAddressesByUserId($data['user_id']);
        } else {
            // Se não foi passado um ID de usuário, busque todos os endereços
            $addresses = (new Address())->getAllAddresses();
        }

        $this->back($addresses, 200);
    }
}
