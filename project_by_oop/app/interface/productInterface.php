<?php

namespace App\interface; 

interface productInterface
{
    public function addProduct($name , $price ,$image);
    public function getAllProduct();
}