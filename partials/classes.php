<?php

class Product {
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

    public function getProps() {
        return get_object_vars($this);
    }
}


class Book extends Product {
    protected $title;
    protected $genre;
    protected $author;

    public function __construct($id, $category, $normalPrice, $location, $weight, $review, $quantity, $title, $genre, $author) {
        parent::__construct($id, $category, $normalPrice, $location, $weight, $review, $quantity);
        $this->title = $title;
        $this->genre = $genre;
        $this->author = $author; 
    }
}


class Table extends Product {
    protected $name;
    protected $material;

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
                $this->inventory[] = new Table($key, ...$item);
            } elseif ($item[0] === 'book') {
                $this->inventory[] = new Book($key, ...$item);
            }
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getInventory($category=NULL) {
        return $this->inventory;
    }

    public function getInventoryFilter($category) {
        return array_filter($this->getInventory(),
                            function ($item) use ($category) {
                                return $item->getProps()['category'] === $category;
                            });
    }
}