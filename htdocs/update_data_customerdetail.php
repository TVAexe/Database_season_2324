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
        <h1 id="main-title" class="text-center my-4">UPDATE CUSTOMERDETAIL DATA</h1>

        <?php
            if(isset($_GET['customerId'])) { 
                $customerId = $_GET['customerId'];
            }
        
            $query = "SELECT * FROM `customerdetail` WHERE `customerId` = '$customerId'";

            $result = mysqli_query($connection, $query);

            if(!$result) {
                die("Query Failed" . mysqli_error());
            } else {
                $row = mysqli_fetch_assoc($result);
            }
        ?>
        
        <?php
            if(isset($_POST['update_customerdetail'])) {
                
                $address = $_POST['address'];
                $zipCode = $_POST['zipCode'];
                $birthday = $_POST['birthday'];
                $gender = $_POST['gender'];
                $howDidYouHear = $_POST['howDidYouHear'];
                $age = $_POST['age'];
                $identificationNumber = $_POST['identificationNumber'];

                if(isset($_GET['customerId_new'])) {
                    $customerIdNew = $_GET['customerId_new'];
                }
                
                $query = "UPDATE `customerdetail` SET `address` = '$address', `zipCode` = '$zipCode', `birthday` = '$birthday', `gender` = '$gender', `howDidYouHear` = '$howDidYouHear', `age` = '$age', `identificationNumber` = '$identificationNumber' 
                         WHERE `customerId` = '$customerIdNew'";
                $result = mysqli_query($connection, $query);
                if(!$result) {
                    die("Query failed" . mysqli_error($connection));
                } else {
                    header('location:index.php?update_msg=Your data has been updated successfully');
                }
            }
        ?>
        
        <div class="form-title">Customer Detail Information:</div>
        <form action="update_data_customerdetail.php?customerId_new=<?php echo $customerId; ?>" method="post">
            <div class="form-group">
                <label for="address">Address</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>">
            </div>
            <div class="form-group">
                <label for="zipCode">Zip Code</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="zipCode" class="form-control" value="<?php echo $row['zipCode']; ?>">
            </div>
            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="birthday" class="form-control" value="<?php echo $row['birthday']; ?>">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="gender" class="form-control" value="<?php echo $row['gender']; ?>">
            </div>
            <div class="form-group">
                <label for="howDidYouHear">How Did You Hear</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="howDidYouHear" class="form-control" value="<?php echo $row['howDidYouHear']; ?>">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="age" class="form-control" value="<?php echo $row['age']; ?>">
            </div>
            <div class="form-group">
                <label for="identificationNumber">Identification Number</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="identificationNumber" class="form-control" value="<?php echo $row['identificationNumber']; ?>">
            </div>
            <input type="submit" class="btn btn-success mt-3" name="update_customerdetail" value="UPDATE">
        </form>
    </div>
</body>
</html>
