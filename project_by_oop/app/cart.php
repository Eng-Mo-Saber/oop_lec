<?php

namespace App;

use App\interface\cartInterface;


class cart implements cartInterface
{
    public function __construct()
    {
        if (!isset($_SESSION['cart'])) {
            
            $_SESSION['cart'] = [];
        }
    }
    public function addItem($id, $name, $price, $image)
    {

        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $id) {
                $item['qty']++;
                return;
            }
        }

        $_SESSION['cart'][] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'image' => $image,
            'qty' => 1
        ];

    }

    public function updateQty($id , $qty){
        if($qty < 1) return;
        
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $id) {
                $item['qty'] = $qty ;
                return;
            }
        }
    }
    public function removeItem($id){
        $_SESSION['cart'] = array_filter($_SESSION['cart'] , function($item) use($id){
            return $item['id'] != $id ;
        });
    }

    public function getItems(){
        return $_SESSION['cart'];
    }
    public function clearCart(){
        $_SESSION['cart'] = [];
    }

}
