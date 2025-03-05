<?php


class CreateProductsTable
{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            image text,
            price DECIMAL(10,2) NOT NULL
        )";

        $conn->exec($sql);
    }
}

