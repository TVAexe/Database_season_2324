<?php
include('dbcon.php');

if (isset($_GET['supplierId'])) {
    $supplierId = $_GET['supplierId'];

    $queryDeleteSupplier = "DELETE FROM supplier WHERE supplierId = '$supplierId'";
    $resultDeleteSupplier = mysqli_query($connection, $queryDeleteSupplier);

    if (!$resultDeleteSupplier) {
        die("Query Failed" . mysqli_error($connection));
    } else {
        header('location: index.php?delete_msg=You have deleted the record.');
    }
}
?>