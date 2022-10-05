<?php

require_once('./classes/Product.php');

// How to load data
//Product::getProducts('./data/products.json');
$product = Product::find($_GET['id']);
?>


<html>

<head>
    <title>
        <?php echo $product->title ?>
    </title>
</head>

<body>
    <div>
        <?php foreach ($product->images as $image) : ?>
            <img src="<?php echo $image ?>" width="400" height="400">
        <?php endforeach; ?>
    </div>
    <div>
        <?php echo "Id: " . $product->id; ?>
    </div>
    <div>
        <?php echo "Maker: " . $product->maker; ?>
    </div>
    <div>
        <?php echo "Url: " . $product->url; ?>
    </div>
    <div>
        <?php echo "Title: " . $product->title; ?>
    </div>
    <div>
        <?php echo "Description: " . $product->description; ?>
    </div>
    <div>
        <?php echo "Price: " . $product->price; ?> Eur
    </div>
    <div>
        Rating:
        <?php
        if ($product->avg_rating) {
            echo $product->avg_rating;
        } else {
            echo "no data";
        }
        ?>
    </div><br>

</body>

</html>