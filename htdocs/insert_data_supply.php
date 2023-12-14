<?php
include 'dbcon.php';

if (isset($_POST['add_supply'])) {
    $supplyId = $_POST['supplyId'];
    $supplierId = $_POST['supplierId'];
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    $supplyDate = $_POST['supplyDate'];
    $totalCost = $_POST['totalCost'];

    // Check if supplierId exists in the supplier table
    $queryCheckSupplier = "SELECT * FROM `supplier` WHERE `supplierId` = '$supplierId'";
    $resultCheckSupplier = mysqli_query($connection, $queryCheckSupplier);

    if (!$resultCheckSupplier || mysqli_num_rows($resultCheckSupplier) == 0) {
        // SupplierId does not exist in the supplier table
        header('location:index.php?message=Invalid supplierId!');
        exit();
    }

    // Check if productId exists in the product table
    $queryCheckProduct = "SELECT * FROM `product` WHERE `productId` = '$productId'";
    $resultCheckProduct = mysqli_query($connection, $queryCheckProduct);

    if (!$resultCheckProduct || mysqli_num_rows($resultCheckProduct) == 0) {
        // ProductId does not exist in the product table
        // Insert a new record into the product table
        $queryInsertProduct = "INSERT INTO `product` (`productId`, `quantityInStock`) VALUES ('$productId', 0)";
        $resultInsertProduct = mysqli_query($connection, $queryInsertProduct);

        if (!$resultInsertProduct) {
            die("Query to insert into product failed" . mysqli_error($connection));
        }

        // Insert a new record into the productdetail table with productId
        $queryInsertProductDetail = "INSERT INTO `productdetails` (`productId`) VALUES ('$productId')";
        $resultInsertProductDetail = mysqli_query($connection, $queryInsertProductDetail);

        if (!$resultInsertProductDetail) {
            die("Query to insert into productdetail failed" . mysqli_error($connection));
        }
    }

    // Update quantityInStock in the product table
    $queryUpdateQuantity = "UPDATE `product` SET `quantityInStock` = `quantityInStock` + '$quantity' WHERE `productId` = '$productId'";
    $resultUpdateQuantity = mysqli_query($connection, $queryUpdateQuantity);

    if (!$resultUpdateQuantity) {
        die("Query to update quantityInStock failed" . mysqli_error($connection));
    }

    // Insert data into the supply table
    $queryInsertSupply = "INSERT INTO `supply` (`supplyId`, `supplierId`, `productId`, `quantity`, `supplyDate`, `totalCost`) 
                          VALUES ('$supplyId', '$supplierId', '$productId', '$quantity', '$supplyDate', '$totalCost')";
    $resultInsertSupply = mysqli_query($connection, $queryInsertSupply);

    if (!$resultInsertSupply) {
        die("Query to insert into supply failed" . mysqli_error($connection));
    } else {
        header('location:index.php?insert_msg=Your data has been added successfully');
    }
}
?>