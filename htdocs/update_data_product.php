<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <style>
            .form-group {
                margin-bottom: 20px;
            }
            .form-group label {
                font-weight: bold;
                font-size: 1.2em;
            }
            .form-title {
                font-size: 1.5em;
                font-weight: bold;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
    <?php include 'dbcon.php'; ?>
    <div class="container">
        <h1 id="main-title" class="text-center my-4">Update Product</h1>

        <?php
            if(isset($_GET['productId'])) { 
                $productId = $_GET['productId'];
            }
        
            $query = "SELECT * FROM `product` WHERE `productId` = '$productId'";
            $result = mysqli_query($connection, $query);

            if(!$result) {
                die("Query Failed".mysqli_error());
            } else {
                $row = mysqli_fetch_assoc($result);
            }
        ?>

        <?php
            if(isset($_POST['update_product'])) {
                
                $productType = $_POST['productType'];
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $quantityInStock = $_POST['quantityInStock'];

                if(isset($_GET['productId_new'])) {
                    $productIdNew = $_GET['productId_new'];
                }
                
                $query = "UPDATE `product` SET `productType` = '$productType', `name` = '$name', `description` = '$description', `price` = '$price', `quantityInStock` = '$quantityInStock' WHERE `productId` = '$productIdNew'";
                $result = mysqli_query($connection, $query);
                if(!$result) {
                    die("Query failed".mysqli_error($connection));
                } else {
                    header('location:index.php?update_msg=Your data has been updated successfully');
                }
            }
        ?>
        
        <div class="form-title">Product Information:</div>
        <form action="update_data_product.php?productId_new=<?php echo $productId; ?>" method="post">
            <div class="form-group">
                <label for="productType">Product Type</label>
                <input type="text" name="productType" class="form-control" value="<?php echo $row['productType']; ?>" autocapitalize="off">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" autocapitalize="off">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"><?php echo $row['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>">
            </div>
            <div class="form-group">
                <label for="quantityInStock">Quantity in Stock</label>
                <input type="text" name="quantityInStock" class="form-control" value="<?php echo $row['quantityInStock']; ?>">
            </div>
            <input type="submit" class="btn btn-success mt-3" name="update_product" value="UPDATE">
        </form>
    </div>
</body>
</html>