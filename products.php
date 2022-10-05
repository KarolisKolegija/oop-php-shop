<?php

require_once('./classes/Product.php');

$products = Product::getProducts('./data/products.json');
?>

<html>

<head>
  <title>
    Products list
  </title>
</head>

<body>

  <div>
    <?php foreach ($products as $product) : ?>
      <span>
        <div>
          <a href="<?php echo "./product.php?id=" . $product->id ?>"><img src="<?php echo $product->images[0] ?>" width="400" height="400"></a>
        </div>
        <div>
          <b><?php echo $product->title; ?></b>
        </div>
        <div>
          <?php echo $product->price; ?> Eur
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
      </span>
    <?php endforeach; ?>
  </div>

</body>

</html>