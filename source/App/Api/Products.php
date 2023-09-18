<?php

namespace Source\App\Api;

use Source\Models\Product; // Certifique-se de importar a classe Product, se necessário

class Products extends Api
{
    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
    }


    public function listByCategory (array $data) : void
    {
        $products = (new Product())->selectByCategoryId($data["category_id"]);
        $this->back($products,200);
    }
 

    public function listProducts(array $data): void
    {
        $products = (new Product())->selectAll();
        $this->back($products, 200);
    }

    public function selectAll()
    {
        // Substitua 'Product' pelo nome da sua classe de produtos, se for diferente
        $products = (new Product())->selectAll(); 
        $this->back($products, 200);
    }
}
