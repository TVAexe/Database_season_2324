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
        <h1 id="main-title" class="text-center my-4">Update Employee</h1>

        <?php
        if(isset($_GET['employeeId'])) { 
            $employeeId = $_GET['employeeId'];
        }

        $query = "SELECT * FROM `employee` WHERE `employeeId` = '$employeeId'";
        $result = mysqli_query($connection, $query);

        if(!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);
        }

        if(isset($_POST['update_employee'])) {
            $fullName = $_POST['fullName'];
            $position = $_POST['position'];
            $hireDate = $_POST['hireDate'];
            $salary = $_POST['salary'];
            $age = $_POST['age'];
            $identificationNumber = $_POST['identificationNumber'];
            $officeIdNew = $_POST['officeId'];  

            if(isset($_GET['employeeId_new'])) {
                $employeeIdNew = $_GET['employeeId_new'];
            }

            $queryOldOfficeId = "SELECT `officeId` FROM `employee` WHERE `employeeId` = '$employeeIdNew'";
            $resultOldOfficeId = mysqli_query($connection, $queryOldOfficeId);
            $rowOldOfficeId = mysqli_fetch_assoc($resultOldOfficeId);
            $oldOfficeId = $rowOldOfficeId['officeId'];

            $queryUpdateEmployee = "UPDATE `employee` SET 
                `fullName` = '$fullName',
                `position` = '$position',
                `hireDate` = '$hireDate',
                `salary` = '$salary',
                `age` = '$age',
                `identificationNumber` = '$identificationNumber',
                `officeId` = '$officeIdNew'
                WHERE `employeeId` = '$employeeIdNew'";
            $resultUpdateEmployee = mysqli_query($connection, $queryUpdateEmployee);

            if(!$resultUpdateEmployee) {
                die("Query failed" . mysqli_error($connection));
            }

            if ($officeIdNew != $oldOfficeId) {
                $queryDecreaseOldOffice = "UPDATE `office` SET `numberOfStaff` = `numberOfStaff` - 1 WHERE `officeId` = '$oldOfficeId'";
                $resultDecreaseOldOffice = mysqli_query($connection, $queryDecreaseOldOffice);

                $queryIncreaseNewOffice = "UPDATE `office` SET `numberOfStaff` = `numberOfStaff` + 1 WHERE `officeId` = '$officeIdNew'";
                $resultIncreaseNewOffice = mysqli_query($connection, $queryIncreaseNewOffice);

                if (!$resultDecreaseOldOffice || !$resultIncreaseNewOffice) {
                    die("Query failed" . mysqli_error($connection));
                }
            }

            header('location: index.php?update_msg=Your data has been updated successfully');
        }
        ?>

        <div class="form-title">Employee Information:</div>
        <form action="update_data_employee.php?employeeId_new=<?php echo $employeeId; ?>" method="post">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" name="fullName" class="form-control" value="<?php echo $row['fullName']; ?>" autocapitalize="off">
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" name="position" class="form-control" value="<?php echo $row['position']; ?>" autocapitalize="off" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="hireDate">Hire Date</label>
                <input type="date" name="hireDate" class="form-control" value="<?php echo $row['hireDate']; ?>" autocapitalize="off">
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" name="salary" class="form-control" value="<?php echo $row['salary']; ?>" autocapitalize="off">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" name="age" class="form-control" value="<?php echo $row['age']; ?>" autocapitalize="off">
            </div>
            <div class="form-group">
                <label for="identificationNumber">Identification Number</label>
                <input type="text" name="identificationNumber" class="form-control" value="<?php echo $row['identificationNumber']; ?>" autocapitalize="off">
            </div>
            <div class="form-group">
                <label for="officeId">Office ID</label>
                <input type="text" name="officeId" class="form-control" value="<?php echo $row['officeId']; ?>" autocapitalize="off">
            </div>
            <input type="submit" class="btn btn-success mt-3" name="update_employee" value="UPDATE">
        </form>
    </div>
</body>
</html>
