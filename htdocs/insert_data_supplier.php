<?php
include 'dbcon.php';

if (isset($_POST['add_supplier'])) {
    $supplierId = $_POST['supplierId'];
    $contactName = $_POST['contactName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $supplierName = $_POST['supplierName'];

    if (empty($supplierId)) {
        header('location:index.php?message=You need to fill in the Supplier ID!');
    } else {
        $querySupplier = "INSERT INTO `supplier` (`supplierId`, `contactName`, `email`, `phone`, `supplierName`) 
                          VALUES ('$supplierId', '$contactName', '$email', '$phone', '$supplierName')";
        $resultSupplier = mysqli_query($connection, $querySupplier);

        if (!$resultSupplier) {
            die("Query failed" . mysqli_error($connection));
        } else {
            header('location:index.php?insert_msg=Your data has been added successfully');
        }
    }
}
?>