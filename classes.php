<?php

class product {
    protected $id;
    protected $category;
    protected $normalPrice;
    protected $location;
    protected $weight;
    protected $review;
    protected $quantity;

    protected  function __construct($id, $category, $normalPrice, $location, $weight, $review, $quantity) {
        $this->id = $id;
        $this->category = $category;
        $this->normalPrice = $normalPrice;
        $this->location = $location;
        $this->weight = $weight;
        $this->review = $review;
        $this->quantity = $quantity;
    }
}


class Book extends Product {
    private $title;
    private $genre;
    private $author;

    public function __construct($id, $category, $normalPrice, $location, $weight, $review, $quantity, $title, $genre, $author) {
        parent::__construct($id, $category, $normalPrice, $location, $weight, $review, $quantity);
        $this->title = $title;
        $this->genre = $genre;
        $this->author = $author; 
    }
}


class Table extends Product {
    private $name;
    private $material;

    public function __construct($id, $category, $normalPrice, $location, $weight, $review, $quantity, $name, $material) {
        parent::__construct($id, $category, $normalPrice, $location, $weight, $review, $quantity);
        $this->name = $name;
        $this->material = $material;
    }
}

class Warehouse {
    private $id;
    private $address;
    private $inventory = [];

    public  function __construct($id, $address, $products) {
        $this->id = $id;
        $this->address = $address;
        foreach($products as $key => $item) {
            if ($item[0] === 'table') {
                $inventory[] = new Table($key, ...$item);
            }
        }
    }

    public function getId() {
        return $this->id;
    }
}