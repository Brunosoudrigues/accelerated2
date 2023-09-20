<?php

namespace Source\App\Api;

use Source\Models\Product;

class Products extends Api
{
    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
    }

    public function listByCategory(array $data): void
    {
        if (!isset($data['category_id'])) {
            echo json_encode(["message" => "ID da categoria não fornecido."]);
            return;
        }

        $categoryId = (int) $data['category_id'];
        $productModel = new Product();
        $products = $productModel->selectByCategoryId($categoryId);

        if (empty($products)) {
            echo json_encode(["message" => "Nenhum produto encontrado para a categoria com ID {$categoryId}."]);
            return;
        }

        $this->back($products, 200);
    }

    public function listProducts(array $data): void
    {
        $productModel = new Product();
        $products = $productModel->selectAll();

        if (empty($products)) {
            echo json_encode(["message" => "Nenhum produto encontrado."]);
            return;
        }

        $this->back($products, 200);
    }
}
