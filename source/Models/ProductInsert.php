<?php

// Replace with your database credentials
$host = "your_host";
$dbname = "your_database_name";
$username = "your_username";
$password = "your_password";

try {
    // Connect to the database
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve form data
    $category_id = $_POST["category_id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $image = $_POST["image"];
    $nameproducts = $_POST["nameproducts"];

    // Validate the data (you can add more validation as needed)
    if (empty($category_id) || empty($name) || empty($price) || empty($image) || empty($nameproducts)) {
        $response = ["success" => false];
    } else {
        // Prepare the SQL statement
        $query = "INSERT INTO products (NULL, category_id, name, price, image, nameproducts) VALUES (:category_id, :name, :price, :image, :nameproducts)";
        $stmt = $db->prepare($query);

        // Bind parameters
        $stmt->bindParam(":category_id", $category_id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":nameproducts", $nameproducts);

        // Execute the statement
        $result = $stmt->execute();

        // Check if the insertion was successful
        if ($result) {
            $response = ["success" => true];
        } else {
            $response = ["success" => false];
        }
    }
} catch (PDOException $e) {
    $response = ["success" => false];
}

// Send JSON response back to the JavaScript code
header("Content-Type: application/json");
echo json_encode($response);
