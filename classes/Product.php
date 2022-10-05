<?php

require_once dirname(__FILE__) . '/../support/FileReader.php';

class Product
{
    // TODO: add missing parameters

    public $title;

    public function __construct($title)
    {
        // TODO: finish __construct() method
        $this->title = $title;
    }

    public static function find($id)
    {
        // How to load data:
        // $content = Product::getProducts('./data/products.json');

        // TODO: check if given product exists, if exists return as object else return false
    }

    public static function getProducts($path)
    {
        $content = FileReader::readJsonFile($path, true);

        $products = [];

        if (!$content) {
            return $products;
        }

        foreach ($content as $product) {
            $products[] = new static($product['title']);
        }

        return $products;
    }
}
