<?php
class product{
    private $conn;
    public $id;
    public $name;
    public $price;
    public $description;
    public $image;
    public $category;
    public $brand;
    public $pre_discount;
    public $discount_percent;
    public $color;

    public function __construct($db){
        $this->conn = $db;
    }

    //read data
    public function read(){
        $query = "SELECT * FROM product ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //show data
    public function show(){
        $query = "SELECT * FROM product where id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row["NAME"];
        $this->price = $row["PRICE"];
        $this->description = $row["DESCRIPTION"];
        $this->image = $row["IMAGE"];
        $this->category = $row["CATEGORY"];
        $this->brand = $row["BRAND"];
        $this->pre_discount = $row["PRE_DISCOUNT"];
        $this->discount_percent = $row["DISCOUNT_PERCENT"];
        $this->color = $row["COLOR"]; 
    }

    //create data
    

}