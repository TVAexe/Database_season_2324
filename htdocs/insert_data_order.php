<?php
include 'dbcon.php';

if (isset($_POST['add_order'])) {
    $orderId = $_POST['orderId'];
    $orderDate = $_POST['orderDate'];
    $customerId = $_POST['customerId'];
    $productId = $_POST['productId']; // Thêm dòng này để lấy giá trị của productId

    // Thêm dữ liệu vào bảng `orders`
    $queryOrder = "INSERT INTO `orders` (`orderId`, `orderDate`, `customerId`, `productId`)
                   VALUES ('$orderId', '$orderDate', '$customerId', '$productId')";
    $resultOrder = mysqli_query($connection, $queryOrder);

    if (!$resultOrder) {
        die("Query failed" . mysqli_error($connection));
    } else {
        // Thêm dữ liệu vào bảng `orderdetail` với `productId`
        $queryOrderDetail = "INSERT INTO `orderdetail` (`orderId`, `productId`)
                             VALUES ('$orderId', '$productId')";
        $resultOrderDetail = mysqli_query($connection, $queryOrderDetail);

        if (!$resultOrderDetail) {
            die("Query failed" . mysqli_error($connection));
        } else {
            header('location:index.php?insert_msg=Your order has been added successfully');
        }
    }
}
?>