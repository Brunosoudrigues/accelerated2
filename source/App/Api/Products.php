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
    public function getProduct(array $data): void
    {
        $product = (new Product())->selectById($data["product_id"]);
        $this->back($product,200);
    }
    public function updateProduct(array $data): void
{
    // int $id = null, string $name = null, int $categoryId = null, float $price = null, string $abstract = null
    $product = (new Product(
        $data["id"],
        $data["name"],
        $data["category_id"],
        (float) $data["price"],
        NULL
    ))->update();

    $response = [
        "type" => "success",
        "message" => "Produto atualizado com sucesso!"
    ];

    $this->back($response, 200);
}

    
}
