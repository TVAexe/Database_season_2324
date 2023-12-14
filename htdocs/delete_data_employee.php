<?php
include('dbcon.php');

if (isset($_GET['employeeId'])) {
    $employeeId = $_GET['employeeId'];

    // Get the officeId of the employee
    $queryGetOfficeId = "SELECT `officeId` FROM `employee` WHERE `employeeId` = '$employeeId'";
    $resultGetOfficeId = mysqli_query($connection, $queryGetOfficeId);

    if (!$resultGetOfficeId) {
        die("Query Failed" . mysqli_error($connection));
    }

    $row = mysqli_fetch_assoc($resultGetOfficeId);
    $officeId = $row['officeId'];

    // Delete the employee from the employee table
    $queryDeleteEmployee = "DELETE FROM `employee` WHERE `employeeId` = '$employeeId'";
    $resultDeleteEmployee = mysqli_query($connection, $queryDeleteEmployee);

    if (!$resultDeleteEmployee) {
        die("Query Failed" . mysqli_error($connection));
    }

    // Decrease numberOfStaff in office table
    $updateOfficeQuery = "UPDATE `office` SET `numberOfStaff` = `numberOfStaff` - 1 WHERE `officeId` = '$officeId'";
    $resultUpdateOffice = mysqli_query($connection, $updateOfficeQuery);

    if (!$resultUpdateOffice) {
        die("Query Failed" . mysqli_error($connection));
    } else {
        header('location: index.php?delete_msg=You have deleted the record.');
    }
}
?>