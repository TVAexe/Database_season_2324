<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        #main-title {
            text-align: center;
            background-color: #333;
            padding: 20px;
            font-weight: 500;
            letter-spacing: 2px;
            color: #fff;
        }

        .box1 h2 {
            float: left;
        }

        .box1 button {
            float: right;
        }

        .container {
            margin-top: 50px;
        }

        h6 {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include 'dbcon.php'; ?>
    <div class="container">
        <div class="box1">
            <h2>ALL SUPPLIES</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD SUPPLY</button>
        </div>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Supply ID</th>
                    <th>Supplier ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Supply Date</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `supply`";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    die("Query Failed" . mysqli_error());
                } else {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['supplyId'] . "</td>";
                        echo "<td>" . $row['supplierId'] . "</td>";
                        echo "<td>" . $row['productId'] . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        echo "<td>" . $row['supplyDate'] . "</td>";
                        echo "<td>" . $row['totalCost'] . "</td>";
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
        <form action="insert_data_supply.php" method="post">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add new supply</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="insert_data_supply.php" method="post">
                                <div class="form-group">
                                    <label for="supplyId">Supply ID</label>
                                    <input type="text" name="supplyId" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="supplierId">Supplier ID</label>
                                    <input type="text" name="supplierId" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="productId">Product ID</label>
                                    <input type="text" name="productId" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" name="quantity" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="supplyDate">Supply Date</label>
                                    <input type="text" name="supplyDate" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="totalCost">Total Cost</label>
                                    <input type="text" name="totalCost" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="add_supply" value="Add">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
