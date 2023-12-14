<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Detail Update</title>
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
        <h1 id="main-title" class="text-center my-4">Product Detail Update</h1>

        <?php
            if(isset($_GET['productId'])) { 
                $productId = $_GET['productId'];
            }
        
            $query = "SELECT * FROM `productdetails` WHERE `productId` = '$productId'";

            $result = mysqli_query($connection, $query);

            if(!$result) {
                die("Query Failed" . mysqli_error());
            } else {
                $row = mysqli_fetch_assoc($result);
            }
        ?>
        
        <?php
            if(isset($_POST['update_productdetail'])) {
                
                $produceDate = $_POST['produceDate'];
                $expiryDate = $_POST['expiryDate'];
                $qualitySold = $_POST['qualitySold'];

                if(isset($_GET['productId_new'])) {
                    $productIdNew = $_GET['productId_new'];
                }
                
                $query = "UPDATE `productdetails` SET `produceDate` = '$produceDate', `expiryDate` = '$expiryDate', `qualitySold` = '$qualitySold' WHERE `productId` = '$productIdNew'";
                $result = mysqli_query($connection, $query);
                if(!$result) {
                    die("Query failed" . mysqli_error($connection));
                } else {
                    header('location:index.php?update_msg=Your data has been updated successfully');
                }
            }
        ?>
        
        <div class="form-title">Product Detail Information:</div>
        <form action="update_data_productdetail.php?productId_new=<?php echo $productId; ?>" method="post">
            <div class="form-group">
                <label for="produceDate">Product Date</label>
                <input type="text" name="produceDate" class="form-control" value="<?php echo $row['produceDate']; ?>">
            </div>
            <div class="form-group">
                <label for="expiryDate">Expiry Date</label>
                <input type="text" name="expiryDate" class="form-control" value="<?php echo $row['expiryDate']; ?>">
            </div>
            <div class="form-group">
                <label for="qualitySold">Quality Sold</label>
                <input type="text" name="qualitySold" class="form-control" value="<?php echo $row['qualitySold']; ?>">
            </div>
            <input type="submit" class="btn btn-success mt-3" name="update_productdetail" value="UPDATE">
        </form>
    </div>
</body>
</html>
