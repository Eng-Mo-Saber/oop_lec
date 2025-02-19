<?php

class Product
{
    public string $name;
    public int $price;
    public string $brand;
    public string $image;
    public string $description;
    public float $tax = 0.1;

    function __construct($name , $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

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

class Book extends Product{
    private array $publisher =[];
    public string $writer;
    public string $color;
    public string $supplier;
    function choose_publisher($index){
        return $this->publisher[$index] ;
    }
    function set_publisher($publisher =[]){
        $this->publisher[] = $publisher ;
    }
    function show_all_publisher(){
        foreach ($this->publisher as $key) {
            return $key;
        }
    }
}

class BabyCar extends Product{
    public int $age ;
    public int $weight ;
    private array $materials =[];
    private float $special_tax = 0.15;

    function set_materials($materials =[]){
        $this->materials[] = $materials ;
    }
    function display_materials(){
        foreach ($this->materials as $key) {
            return $key;
        }
    }
    function get_finale_price(){
        $res = $this->get_final_price() * $this->special_tax;
        return $this->get_final_price() - $res ;
    }


}
//set data book 1:
$book1 = new Book("Rich Dad Poor Dad" , 200);
$book1->writer = "Robert Kiyosaki";
$book1->set_publisher("جرير كوساكي");
$book1->color = "black and yellow" ;

// print data book 1:

echo "Book 1 <br> ----- <br>".
"Book name : ". $book1->name . ". <br> ". 
"price book : " . $book1->get_final_price() . ". <br>".
"publisher Book : " . $book1->show_all_publisher(). ". <br> ". 
"color Book : " .  $book1->color . ". <br> ----------------------<br>";

//set data book 2:
$book2 = new Book("The 7 Habits of Highly Effective People" , 250);
$book2->writer = "Stephen Covey";
$book2->set_publisher("Free Press");
$book2->color = "Red and white" ;

// print data book 2:

echo "Book 2 <br> ----- <br>".
"Book name : ". $book2->name . ". <br> ". 
"price book : " . $book2->get_final_price() . " <br>".
"publisher Book : " . $book2->show_all_publisher(). ". <br> ". 
"color Book : " .  $book2->color . ". <br> ----------------------<br>";


//-----------------------------------------------------------------

// set data baby car 1:

$car1 = new BabyCar("Silver Cross Balmoral" , 1500);
$car1->weight = 50 ;
$car1->age = 10 ;
$car1->set_materials("iron") ;

// print data baby car 1:

echo "BabyCar 1  <br> ----- <br>".
"car name : ". $car1->name . ". <br> ".
"car price : " . $car1->get_finale_price() .". <br> ".
"car weight : " . $car1->weight . ". <br> ".
"car materials : " . $car1->display_materials(). ". <br> ----------------------<br>";


// set data baby car 1:

$car2 = new BabyCar("Babyzen Yoyo" , 1000);
$car2->weight = 30 ;
$car2->age = 7 ;
$car2->set_materials("Aluminum") ;

// print data baby car 1:

echo "BabyCar 2 <br> ----- <br>".
"car name : ". $car2->name . ". <br> ".
"car price : " . $car2->get_finale_price() .". <br> ".
"car weight : " . $car2->weight . ". <br> ".
"car materials : " . $car2->display_materials(). ". <br> ----------------------<br>";



