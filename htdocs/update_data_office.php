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
        <h1 id="main-title" class="text-center my-4">Update Office Information</h1>

        <?php
            if(isset($_GET['officeId'])) { 
                $officeId = $_GET['officeId'];

                $query = "SELECT * FROM `office` WHERE `officeId` = '$officeId'";
                $result = mysqli_query($connection, $query);

                if($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                } else {
                    die("Office not found");
                }
            } else {
                die("Office ID not provided");
            }
        ?>
        
        <?php
            if(isset($_POST['update_office'])) {
                $officeName = $_POST['officeName'];
                $officeAddress = $_POST['officeAddress'];
                $numberOfStaff = $_POST['numberOfStaff'];

                $updateQuery = "UPDATE `office` SET
                                `officeName` = '$officeName',
                                `officeAddress` = '$officeAddress',
                                `numberOfStaff` = '$numberOfStaff'
                                WHERE `officeId` = '$officeId'";

                $updateResult = mysqli_query($connection, $updateQuery);

                if($updateResult) {
                    header('location:index.php?update_msg=Office information updated successfully');
                } else {
                    die("Update failed" . mysqli_error($connection));
                }
            }
        ?>
        
        <div class="form-title">Office Information:</div>
        <form action="update_data_office.php?officeId=<?php echo $officeId; ?>" method="post">
            <div class="form-group">
                <label for="officeName">Office Name</label>
                <input type="text" name="officeName" class="form-control" value="<?php echo $row['officeName']; ?>">
            </div>
            <div class="form-group">
                <label for="officeAddress">Office Address</label>
                <input type="text" name="officeAddress" class="form-control" value="<?php echo $row['officeAddress']; ?>">
            </div>
            <div class="form-group">
                <label for="numberOfStaff">Number of Staff</label>
                <input type="text" name="numberOfStaff" class="form-control" value="<?php echo $row['numberOfStaff']; ?>">
            </div>
            <input type="submit" class="btn btn-success mt-3" name="update_office" value="UPDATE">
        </form>
    </div>
</body>
</html>