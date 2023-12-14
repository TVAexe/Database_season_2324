<?php
    include('dbcon.php');

    if (isset($_GET['customerId'])) {
        $customerId = $_GET['customerId'];

        $queryDisableForeignKeyChecks = "SET FOREIGN_KEY_CHECKS=0;";
        $resultDisableForeignKeyChecks = mysqli_query($connection, $queryDisableForeignKeyChecks);

        if (!$resultDisableForeignKeyChecks) {
            die("Query Failed" . mysqli_error($connection));
        }

        $queryDeleteDetail = "DELETE FROM customerdetail WHERE customerId = '$customerId'";
        $resultDeleteDetail = mysqli_query($connection, $queryDeleteDetail);

        if (!$resultDeleteDetail) {
            $queryEnableForeignKeyChecks = "SET FOREIGN_KEY_CHECKS=1;";
            mysqli_query($connection, $queryEnableForeignKeyChecks);
            die("Query Failed" . mysqli_error($connection));
        }

    
        $queryDeleteCustomer = "DELETE FROM customer WHERE customerId = '$customerId'";
        $resultDeleteCustomer = mysqli_query($connection, $queryDeleteCustomer);

        $queryEnableForeignKeyChecks = "SET FOREIGN_KEY_CHECKS=1;";
        mysqli_query($connection, $queryEnableForeignKeyChecks);

        if (!$resultDeleteCustomer) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            header('location: index.php?delete_msg=You have deleted the record.');
        }
    }
?>