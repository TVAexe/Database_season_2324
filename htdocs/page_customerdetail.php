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
            td {
                text-transform:none;
            }
        </style>
    </head>
    <body>
    <?php include 'dbcon.php'; ?>
    
    <div class="container">
        <div class="box1">
            <h2>ALL CUSTOMER DETAILS</h2>
        </div>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Address</th>
                    <th>Zip Code</th>
                    <th>Birthday</th>
                    <th>Gender</th>
                    <th>How Did You Hear</th>
                    <th>Age</th>
                    <th>Identification Number</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `customerdetail`";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    die("Query Failed" . mysqli_error());
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['customerId'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['zipCode'] . "</td>";
                        echo "<td>" . $row['birthday'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['howDidYouHear'] . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['identificationNumber'] . "</td>";
                        echo "<td><a href='update_data_customerdetail.php?customerId=" . $row['customerId'] . "' class='btn btn-success'>Update</a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
        if (isset($_GET['message'])) {
            echo ("<h6>" . $_GET['message'] . "</h6>");
        }
        ?>
        <?php
        if (isset($_GET['update_msg'])) {
            echo "<h6>" . $_GET['update_msg'] . "</h6>";
        }
        ?>
    </body>
</html>