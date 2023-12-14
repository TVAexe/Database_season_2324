<?php
include 'dbcon.php';

if (isset($_POST['add_customer'])) {
    $customerId = $_POST['customerId'];
    $phoneNumber = $_POST['phoneNumber'];
    $emailAddress = $_POST['emailAddress'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userName = $_POST['userName'];

    if (empty($customerId)) {
        header('location:index.php?message=You need to fill in the customerId!');
    } else {
        $queryCustomer = "INSERT INTO `customer` (`customerId`, `phoneNumber`, `emailAddress`, `firstName`, `lastName`, `userName`) 
                          VALUES ('$customerId', '$phoneNumber', '$emailAddress', '$firstName', '$lastName', '$userName')";
        $resultCustomer = mysqli_query($connection, $queryCustomer);

        if (!$resultCustomer) {
            die("Query failed" . mysqli_error($connection));
        } else {
            $newCustomerId = mysqli_insert_id($connection);
            $queryCustomerDetail = "INSERT INTO `customerdetail` (`customerId`)
                                    VALUES ('$customerId')";
            $resultCustomerDetail = mysqli_query($connection, $queryCustomerDetail);
            if (!$resultCustomerDetail) {
                die("Query failed" . mysqli_error($connection));
            } else {
                header('location:index.php?insert_msg=Your data has been added successfully');
            }
        }
    }
}
?>
