<?php

namespace App\interface; 

interface cartInterface
{
    public function addItem($id ,$name , $price ,$image);
    public function updateQty($id , $qty);
    public function removeItem($id);
    public function clearCart();
    public function getItems();
}