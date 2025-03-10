<?php
namespace App ;

use App\fileManagerTrait;
use App\interface\productInterface;
use Database\DatabaseManger;
use PDO;

class product implements productInterface
{
    use fileManagerTrait ;
    public $db ;
    public function __construct()
    {
        $this->db = DatabaseManger::getConnection();
    }
    public function addProduct($name, $price, $image)
    {
        $imagePath = $this->uploadFile($image);
        $q = "INSERT INTO products(name , price , image) VALUES (:name , :price , :image)";
        $sql = $this->db->prepare($q);
        $sql->execute([
            'name' => $name,
            'price' => $price,
            'image' => $imagePath
        ]);
    }
    
    public function getAllProduct()
    {
        $q = "SELECT * FROM products";
        return $this->db->query($q)->fetchAll(PDO::FETCH_ASSOC);
    }

}