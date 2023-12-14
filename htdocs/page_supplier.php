<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Supplier Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        #main-title {
            text-align: center;
            background-color: #333;
            padding: 20px;
            font-weight: 500;
            letter-spacing: 2px;
            color: #fff
        }

        .box1 h2 {
            float:left;
        }

        .box1 button {
            float:right;
        }

        .container {
            margin-top: 50px;
        }

        h6 {
            text-align: center
        }
        td {
            text-transform:none;
        }
    </style>
</head>
<body>
    <?php include 'dbcon.php'; ?>
    <div class="container">
        <div class="box1">
            <h2>ALL SUPPLIERS</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD SUPPLIER</button>
        </div>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Supplier ID</th>
                    <th>Contact Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Supplier Name</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `supplier`";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    die("Query Failed" . mysqli_error());
                } else {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['supplierId'] . "</td>";
                        echo "<td>" . $row['contactName'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['supplierName'] . "</td>";
                        echo "<td><a href='update_data_supplier.php?supplierId=".$row['supplierId']."' class='btn btn-success'>Update</a></td>";
                        echo "<td><a href='delete_data_supplier.php?supplierId=".$row['supplierId']."' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }                        
                }
                ?>
            </tbody>
        </table>
        <?php 
            if(isset($_GET['message'])) {
                echo ("<h6>".$_GET['message']."</h6>");
            }
        ?>
        <?php
            if(isset($_GET['insert_msg'])) {
                echo ("<h6>".$_GET['insert_msg']."</h6>");
            }
        ?>
        <?php
            if(isset($_GET['delete_msg'])) { 
                echo "<h6>".$_GET['delete_msg']."</h6>";
            }
        ?>
        <?php
            if(isset($_GET['update_msg'])) { 
                echo "<h6>".$_GET['update_msg']."</h6>";
            }
        ?>

        <form action="insert_data_supplier.php" method="post">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add new supplier</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="insert_data_supplier.php" method="post">
                                <div class="form-group">
                                    <label for="supplierId">Supplier ID</label>
                                    <input type="text" name="supplierId" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="contactName">Contact Name</label>
                                    <input type="text" name="contactName" class="form-control" autocorrect="off" autocapitalize="none" style="text-transform:none">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" autocorrect="off" autocapitalize="none" style="text-transform:none">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" autocorrect="off" autocapitalize="none" style="text-transform:none">
                                </div>
                                <div class="form-group">
                                    <label for="supplierName">Supplier Name</label>
                                    <input type="text" name="supplierName" class="form-control" autocorrect="off" autocapitalize="none" style="text-transform:none">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="add_supplier" value="Add">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>