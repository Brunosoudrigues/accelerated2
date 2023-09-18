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

    public function selectByCategory(string $categoryName){
        $query = "SELECT products.* 
        FROM products  
        join categories ON products.category_id = categories.id 
        where categories.name LIKE '{$categoryName}'";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();

    }

    public function selectByCategoryId(int $categoryId)
    {
        $query = "SELECT products.* 
                  FROM products 
                  JOIN categories ON categories.id = products.category_id 
                  WHERE products.category_id = {$categoryId}";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }
   
    


}