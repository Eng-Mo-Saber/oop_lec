<?php

use App\product;


$productObject = new product;


if ($_SERVER['REQUEST_METHOD'] == "POST"  ) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];

    if (isset($name) && isset($price) && isset($image)) {
        $productObject->addProduct($name,  $price, $image);
        header("location: index.php?page=home");
        exit;
    }
}


$products = $productObject->getAllProduct();





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add New Product</h1>
        <form action="index.php?page=home" method="POST" enctype="multipart/form-data" class="mb-5">
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" step="0.01" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
        <h1 class="text-center mb-4">Available Products</h1>
        <div class="row">
            <?php foreach ($products as $product):  ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img height="280" src="<?= $product['image'] ?>" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $product['name'] ?></h5>
                            <p class="card-text"><?= $product['price'] ?></p>
                            <form action="index.php?page=cart&action=add" method="POST">
                                <input type="hidden" name="id" value="<?= $product['id'] ?>" />
                                <input type="hidden" name="name" value="<?= $product['name'] ?>" />
                                <input type="hidden" name="price" value="<?= $product['price'] ?>" />
                                <input type="hidden" name="image" value="<?= $product['image'] ?>" />
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>