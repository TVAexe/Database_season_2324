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
        <h1 id="main-title" class="text-center my-4">Update Supplier</h1>

        <?php
            if(isset($_GET['supplierId'])) { 
                $supplierId = $_GET['supplierId'];
            }
        
            $query = "SELECT * FROM `supplier` WHERE `supplierId` = '$supplierId'";

            $result = mysqli_query($connection, $query);

            if(!$result) {
                die("Query Failed" . mysqli_error());
            } else {
                $row = mysqli_fetch_assoc($result);
            }
        ?>
        
        <?php
            if(isset($_POST['update_supplier'])) {
                
                $contactName = $_POST['contactName'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $supplierName = $_POST['supplierName'];

                if(isset($_GET['supplierId_new'])) {
                    $supplierIdNew = $_GET['supplierId_new'];
                }
                
                $query = "UPDATE `supplier` SET `contactName` = '$contactName', `email` = '$email', `phone` = '$phone', `supplierName` = '$supplierName' WHERE `supplierId` = '$supplierIdNew'";
                $result = mysqli_query($connection, $query);
                if(!$result) {
                    die("Query failed" . mysqli_error($connection));
                } else {
                    header('location:index.php?update_msg=Your data has been updated successfully');
                }
            }
        ?>
        
        <div class="form-title">Supplier Information:</div>
        <form action="update_data_supplier.php?supplierId_new=<?php echo $supplierId; ?>" method="post">
            <div class="form-group">
                <label for="contactName">Contact Name</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="contactName" class="form-control" value="<?php echo $row['contactName']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>">
            </div>
            <div class="form-group">
                <label for="supplierName">Supplier Name</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="supplierName" class="form-control" value="<?php echo $row['supplierName']; ?>">
            </div>
            <input type="submit" class="btn btn-success mt-3" name="update_supplier" value="UPDATE">
        </form>
    </div>
</body>
</html>
