<?php


namespace Source\Models;

use Source\Core\Connect;

class Product
{

    public function selectAll ()
    {
        $query = "SELECT * FROM products";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

    public function selectByCategory(string $nameCategory){
        $query = "SELECT products.* FROM products  join categories ON products.id = products.category_id where products.name LIKE '{$nameCategory}'";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();

    }
}