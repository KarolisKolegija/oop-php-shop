<?php

require_once('./classes/Product.php');

// How to load data
//Product::getProducts('./data/products.json');
$product = null;
if (isset($_GET['id'])) {
    $product = Product::find($_GET['id']);
}
?>


<html>

<head>
    <title>
        <?php if ($product != null) {
            echo $product->title;
        } else {
            echo "Product not found.";
        } ?>
    </title>
</head>


<body>
    <?php if ($product != null) : ?>
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
    <?php else : echo "Product not found."; ?>
    <?php endif; ?>
</body>

</html>