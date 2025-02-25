<?php


class Products
{
    public string $name;
    public int $price;
    public string $brand;
    public string $image;
    public string $description;
    public float $tax = 0.1;

    function get_name()
    {
        return $this->name;
    }
    function price_after_tax() 
    {
        $dis = $this->price * $this->tax;
        $res = $this->price - $dis ;
        return $res ;
    }
    function get_final_price(){
        $res = $this->price_after_tax() * 0.1;
        return $this->price_after_tax() - $res ;
    }

}
// product 1 :
$product1 = new Products();
$product1->name = "لاب توب سامسونج جلاكسي بوك lon" ;
$product1->price = 20000 ;
$product1->brand = "سامسونج" ;
$product1->description = "" ;
echo "Name product  => " . $product1->get_name() . "<br> price after tax => ". 
$product1->price_after_tax() . "<br> final price =>" . 
$product1->get_final_price() . "<br>---------------------------------<br>";
//---------------------
// product 2 :

$product2 = new Products();
$product2->name = "لاب توب توشيبا c50-H" ;
$product2->price = 15000 ;
$product2->brand = "توشيبا" ;
$product2->description = "" ;
echo "Name product  => " . $product2->get_name() . "<br> price after tax => ". 
$product2->price_after_tax() . "<br> final price =>" . 
$product2->get_final_price() . "<br>---------------------------------<br>";
//---------------------
// product 3 :

$product3 = new Products();
$product3->name = "لاب توب HP ZBook" ;
$product3->price = 10000 ;
$product3->brand = "HP" ;
$product3->description = "" ;
echo "Name product  => " . $product3->get_name() . "<br> price after tax => ". 
$product3->price_after_tax() . "<br> final price =>" . 
$product3->get_final_price() . "<br>---------------------------------<br>";