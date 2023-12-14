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
            <h1 id="main-title" class="text-center my-4">UPDATE CUSTOMER DATA</h1>

            <?php
                if(isset($_GET['customerId'])) { 
                    $customerId = $_GET['customerId'];
                }
            
                $query = "select * from `customer` where `customerId` = '$customerId'";

                $result = mysqli_query($connection, $query);

                if(!$result) {
                    die("query Failed".mysqli_error());
                } else {
                    $row = mysqli_fetch_assoc($result);
                }
            ?>
            
            <?php
                if(isset($_POST['update_customer'])) {
                    $phoneNumber = $_POST['phoneNumber'];
                    $emailAddress = $_POST['emailAddress'];
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $userName = $_POST['userName'];

                    if(isset($_GET['customerId_new'])) {
                        $customerIdNew = $_GET['customerId_new'];
                    }
                    $query = "UPDATE `customer` SET `phoneNumber` = '$phoneNumber', `emailAddress` = '$emailAddress', `firstName` = '$firstName', `lastName` = '$lastName', `userName` = '$userName' WHERE `customerId` = '$customerIdNew'";
                    $result = mysqli_query($connection, $query);
                    if(!$result) {
                        die("Query failed".mysqli_error($connection));
                    } else {
                        header('location:index.php?update_msg=Your data has been updated successfully');
                    }
                }
                
            ?>
            
            <div class="form-title">Customer Information:</div>
            <form action="update_data_customer.php?customerId_new=<?php echo $customerId; ?>" method="post" autocorrect="off" autocapitalize="none" style="text-transform:none">
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="phoneNumber" class="form-control" value="<?php echo $row['phoneNumber']; ?>" autocapitalize="off">
                </div>
                <div class="form-group">
                    <label for="emailAddress">Email Address</label>
                    <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="emailAddress" class="form-control" value="<?php echo htmlspecialchars($row['emailAddress']); ?>" autocapitalize="off" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="firstName" class="form-control" value="<?php echo $row['firstName']; ?>" autocapitalize="off">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="lastName" class="form-control" value="<?php echo $row['lastName']; ?>" autocapitalize="off">
                </div>
                <div class="form-group">
                    <label for="userName">User Name</label>
                    <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="userName" class="form-control" value="<?php echo $row['userName']; ?>" autocapitalize="off">
                </div>
                <input type="submit" class="btn btn-success mt-3" name="update_customer" value="UPDATE">
            </form>
        </div>
    </body>
</html>
