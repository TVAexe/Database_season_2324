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
        </style>
    </head>
    <body>
        <?php include 'dbcon.php'; ?>
        <div class="container">
            <div class="box1">
                <h2>ALL PRODUCTS</h2>
            </div>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Type</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity In Stock</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `product`";
                    $result = mysqli_query($connection, $query);
                    if (!$result) {
                        die("Query Failed" . mysqli_error());
                    } else {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['productId'] . "</td>";
                            echo "<td>" . $row['productType'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['quantityInStock'] . "</td>";
                            echo "<td><a href='update_data_product.php?productId=".$row['productId']."' class='btn btn-success'>Update</a></td>";
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
    </div>
</body>
</html>
