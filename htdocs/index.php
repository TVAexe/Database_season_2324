<!DOCTYPE html>
<head>
    <title>Grocery Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header class="header" style="height: 60px;">
        <a href="#" class="logo">
            <img src="logo.png" alt="Logo">
        </a>
        <nav class="navbar" style="margin-left: auto;">
            <a href="#customer" class="load-customer"><i class="fa fa-users"></i> Customer</a>
            <a href="#customerdetail" class="load-customerdetail"><i class="fa fa-address-card"></i> Customer Detail</a>
            <a href="#product" class="load-product"><i class="fa fa-product-hunt"></i> Product</a>
            <a href="#productdetail" class="load-productdetail"><i class="fa fa-info-circle"></i> Product Detail</a>
            <a href="#order" class="load-order"><i class="fa fa-shopping-cart"></i> Order</a>
            <a href="#orderdetail" class="load-orderdetail"><i class="fa fa-list-ul"></i> Order Detail</a>
            <a href="#employee" class="load-employee"><i class="fa fa-user-circle"></i> Employee</a>
            <a href="#office" class="load-office"><i class="fa fa-building"></i> Office</a>
            <a href="#supplier" class="load-supplier"><i class="fa fa-truck"></i> Supplier</a>
            <a href="#supply" class="load-supply"><i class="fa fa-archive"></i> Supply</a>
        </nav>
    </header>
    <div id="content" style="padding:100px">
        <script>
        $(document).ready(function() {
            $('.load-customer').click(function(e) {
                e.preventDefault();
                $('#content').load("page_customer.php", function() {
                    history.pushState(null, null, "page_customer.php");
                });
            });
        });
        $(document).ready(function() {
            $('.load-customerdetail').click(function(e) {
                e.preventDefault();
                $('#content').load("page_customerdetail.php", function() {
                    history.pushState(null, null, "page_customerdetail.php");
                });
            });
        });
        $(document).ready(function() {
            $('.load-product').click(function(e) {
                e.preventDefault();
                $('#content').load("page_product.php", function() {
                    history.pushState(null, null, "page_product.php");
                });
            });
        });
        $(document).ready(function() {
            $('.load-productdetail').click(function(e) {
                e.preventDefault();
                $('#content').load("page_productdetail.php", function() {
                    history.pushState(null, null, "page_productdetail.php");
                });
            });
        });
        $(document).ready(function() {
            $('.load-office').click(function(e) {
                e.preventDefault();
                $('#content').load("page_office.php", function() {
                    history.pushState(null, null, "page_office.php");
                });
            });
        });
        $(document).ready(function() {
            $('.load-employee').click(function(e) {
                e.preventDefault();
                $('#content').load("page_employee.php", function() {
                    history.pushState(null, null, "page_employee.php");
                });
            });
        });
        $(document).ready(function() {
            $('.load-supplier').click(function(e) {
                e.preventDefault();
                $('#content').load("page_supplier.php", function() {
                    history.pushState(null, null, "page_supplier.php");
                });
            });
        });
        $(document).ready(function() {
            $('.load-supply').click(function(e) {
                e.preventDefault();
                $('#content').load("page_supply.php", function() {
                    history.pushState(null, null, "page_supply.php");
                });
            });
        });
        $(document).ready(function() {
            $('.load-order').click(function(e) {
                e.preventDefault();
                $('#content').load("page_order.php", function() {
                    history.pushState(null, null, "page_order.php");
                });
            });
        });
        $(document).ready(function() {
            $('.load-orderdetail').click(function(e) {
                e.preventDefault();
                $('#content').load("page_orderdetail.php", function() {
                    history.pushState(null, null, "page_orderdetail.php");
                });
            });
        });
        </script>
    </div>
</body>
</html>