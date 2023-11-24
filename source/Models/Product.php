<?php


namespace Source\Models;

use Source\Core\Connect;

class Product
{
    private $id;
    private $name;
    private $category_id;
    private $price;
    private $abstract;
    private $image;

    public function __construct(int $id = null, string $name = null, int $categoryId = null, float $price = null, string $abstract = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->category_id = $categoryId;
        $this->price = $price;
        $this->abstract = $abstract;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    public function setCategoryId(?int $category_id): void
    {
        $this->category_id = $category_id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    public function getAbstract(): ?string
    {
        return $this->abstract;
    }

    public function setAbstract(?string $abstract): void
    {
        $this->abstract = $abstract;
    }

    public function selectAll()
    {
        $stm = Connect::getInstance()->query("SELECT * FROM products");
        return $stm->fetchAll();
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
    public function selectById (int $id)
    {
        $query = "SELECT * FROM products WHERE id = {$id}";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }
    
    public function update(): void
    {
        $query = "UPDATE products 
                   SET name = '{$this->name}',  category_id = {$this->category_id}, price = {$this->price} 
                  WHERE id = {$this->id}";
                  echo $query;
        $stmt = Connect::getInstance()->query($query);
       // $stmt->execute();
    }



}