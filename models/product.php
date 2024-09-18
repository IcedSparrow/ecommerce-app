<?php
class Product {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllProducts() {
        $query = 'SELECT * FROM products';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id) {
        $query = 'SELECT * FROM products WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
