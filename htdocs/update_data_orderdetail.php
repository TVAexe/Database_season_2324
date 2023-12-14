<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Office Information</title>
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
    <h1 id="main-title" class="text-center my-4">Update Order Detail</h1>
        <?php
        $orderId = 4;   
        $productId = 1;
        
        $query = "SELECT * FROM `orderdetail` WHERE `orderId` = '$orderId' AND `productId` = '$productId'";
        $result = mysqli_query($connection, $query);
        if(!$result) {
            die("Query Failed" . mysqli_error());
        } else {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);     
            } else {
                echo "No record found.";
                exit; 
            }
        }
        ?>
    
        <?php
        if(isset($_POST['update_orderdetail'])) {
            $quantity = $_POST['quantity'];
            $requiredDate = $_POST['requiredDate'];
            $status = $_POST['status'];
            $shippedDate = $_POST['shippedDate'];
            $paymentMethod = $_POST['paymentMethod'];
            $totalPrice = $_POST['totalPrice'];
            $officeId = $_POST['officeId'];
            $employeeId = $_POST['employeeId'];

            if(isset($_GET['orderId_new'])) {
                $orderIdNew = $_GET['orderId_new'];
            }
            if(isset($_GET['productId_new'])) {
                $productIdNew = $_GET['productId_new'];
            }

            $query = "UPDATE `orderdetail` 
                      SET `quantity` = '$quantity', 
                      `requiredDate` = '$requiredDate', 
                      `status` = '$status', 
                      `shippedDate` = '$shippedDate', 
                      `paymentMethod` = '$paymentMethod', 
                      `totalPrice` = '$totalPrice', 
                      `officeId` = '$officeId', 
                      `employeeId` = '$employeeId' 
                      WHERE `orderId` = '$orderIdNew' AND `productId` = '$productIdNew'";

            $updateResult = mysqli_query($connection, $query);
            
            if($updateResult) {
                header('location:index.php?update_msg=Order detail information updated successfully');
            } else {
                die("Update failed" . mysqli_error($connection));
            }
        }
        ?>
        
        <div class="form-title">Order Detail Information:</div>
        <form action="update_data_orderdetail.php?orderId_new=<?php echo $orderId; ?>&productId_new=<?php echo $productId; ?>" method="post" autocorrect="off" autocapitalize="none" style="text-transform:none">
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="quantity" class="form-control" value="<?php echo $row['quantity']; ?>">
            </div>
            <div class="form-group">
                <label for="requiredDate">Required Date</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="requiredDate" class="form-control" value="<?php echo $row['requiredDate']; ?>">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="status" class="form-control" value="<?php echo $row['status']; ?>">
            </div>
            <div class="form-group">
                <label for="shippedDate">Shipped Date</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="shippedDate" class="form-control" value="<?php echo $row['shippedDate']; ?>">
            </div>
            <div class="form-group">
                <label for="paymentMethod">Payment Method</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="paymentMethod" class="form-control" value="<?php echo $row['paymentMethod']; ?>">
            </div>
            <div class="form-group">
                <label for="totalPrice">Total Price</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="totalPrice" class="form-control" value="<?php echo $row['totalPrice']; ?>">
            </div>
            <div class="form-group">
                <label for="officeId">Office ID</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="officeId" class="form-control" value="<?php echo $row['officeId']; ?>">
            </div>
            <div class="form-group">
                <label for="employmentId">Employee ID</label>
                <input autocorrect="off" autocapitalize="none" style="text-transform:none" type="text" name="employeeId" class="form-control" value="<?php echo $row['employeeId']; ?>">
            </div>
            <input type="submit" class="btn btn-success mt-3" name="update_orderdetail" value="UPDATE">
        </form>
    </div>
</body>
</html>