
<?php

require_once dirname(__FILE__) . '/../support/FileReader.php';

class Product
{
    public $id;

    public $maker;

    public $images;

    public $url;

    public $title;

    public $description;

    public $price;

    public $ratings;

    public $avg_rating = null;

    public function __construct($id, $maker, $images, $url, $title, $description, $price, $ratings)
    {
        $this->id = $id;
        $this->maker = $maker;
        $this->images = $images;
        $this->url = $url;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->ratings = $ratings;
    }

    public static function find($id): Product|bool
    {
        // How to load data:
        $products = Product::getProducts('./data/products.json');

        $return = false;
        // TODO: check if given product exists, if exists return as object else return false
        foreach ($products as $product) {
            if ($id == $product->id) {
                $return = $product;
            }
        }
        return $return;
    }

    public static function getProducts($path): array
    {
        $content = FileReader::readJsonFile($path, true);

        $products = [];

        if (!$content) {
            return $products;
        }

        foreach ($content as $product) {
            $new = new static($product['id'], $product['maker'], $product['images'], $product['url'], $product['title'], $product['description'], $product['price'], $product['ratings']);

            if ($new->ratings) {
                $rating_count = 0;
                $rating_sum = 0;
                foreach ($new->ratings as $rating) {
                    $rating_count++;
                    $rating_sum += $rating;
                }
                if ($rating_count > 0) {
                    $new->avg_rating = $rating_sum / $rating_count;
                }
            }

            $products[] = $new;
        }


        return $products;
    }
}
