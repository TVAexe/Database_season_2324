<?php
include 'dbcon.php';

if (isset($_POST['add_orderdetail'])) {
    $orderId = $_POST['orderId'];
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    $requiredDate = $_POST['requiredDate'];
    $status = isset($_POST['status']) ? $_POST['status'] : 'prepared';
    $shippedDate = $_POST['shippedDate'];
    $paymentMethod = $_POST['paymentMethod'];
    $totalPrice = $_POST['totalPrice'];
    $officeId = $_POST['officeId'];
    $employeeId = $_POST['employeeId'];

    if (empty($orderId) || empty($productId) || empty($quantity) || empty($requiredDate) || empty($status) 
        || empty($shippedDate) || empty($paymentMethod) || empty($totalPrice) || empty($officeId) || empty($employeeId)) {
        header('location:index.php?message=Please fill in all required fields!');
    } else {
        $queryOrderDetail = "INSERT INTO `orderdetail` (`orderId`, `productId`, `quantity`, `requiredDate`, `status`, `shippedDate`, `paymentMethod`, `totalPrice`, `officeId`, `employeeId`)
                            VALUES ('$orderId', '$productId', '$quantity', '$requiredDate', '$status', '$shippedDate', '$paymentMethod', '$totalPrice', '$officeId', '$employeeId')";
        $resultOrderDetail = mysqli_query($connection, $queryOrderDetail);

        if (!$resultOrderDetail) {
            die("Query failed" . mysqli_error($connection));
        } else {
            header('location:index.php?insert_msg=Your data has been added successfully');
        }
    }
}
?>