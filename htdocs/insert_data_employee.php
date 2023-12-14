<?php
include 'dbcon.php';

if (isset($_POST['add_employee'])) {
    $employeeId = $_POST['employeeId'];
    $fullName = $_POST['fullName'];
    $position = $_POST['position'];
    $hireDate = $_POST['hireDate'];
    $salary = $_POST['salary'];
    $age = $_POST['age'];
    $identificationNumber = $_POST['identificationNumber'];
    $officeId = $_POST['officeId'];

    if (empty($employeeId)) {
        header('location:index.php?message=You need to fill in the employeeId!');
    } else {
        $queryEmployee = "INSERT INTO `employee` (`employeeId`, `fullName`, `position`, `hireDate`, `salary`, `age`, `identificationNumber`, `officeId`) 
                           VALUES ('$employeeId', '$fullName', '$position', '$hireDate', '$salary', '$age', '$identificationNumber', '$officeId')";
        $resultEmployee = mysqli_query($connection, $queryEmployee);

        if (!$resultEmployee) {
            die("Query failed" . mysqli_error($connection));
        } else {
            $newEmployeeId = mysqli_insert_id($connection);

            $updateOfficeQuery = "UPDATE `office` SET `numberOfStaff` = `numberOfStaff` + 1 WHERE `officeId` = '$officeId'";
            $resultUpdateOffice = mysqli_query($connection, $updateOfficeQuery);

            if (!$resultUpdateOffice) {
                die("Query failed" . mysqli_error($connection));
            } else {
                header('location:index.php?insert_msg=Employee added successfully');
            }
        }
    }
}
?>