<head>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        /* CSS for active item */
        .active {
            background-color: #ff6347; /* Example color for active state */
            color: white;
        }
        .active a {
            color: white !important; /* Ensures link text is also white */
        }
    </style>
</head>

<div id="sidebar"  >
    <ul id="try">
        <li class="try active">
            <a href="dashboard.php"><i class="fa fa-house"></i><span>Dashboard</span></a>
        </li>
        <li class="try">
            <a href="add-user.php"><i class="fa fa-user"></i><span>Add User</span></a>
        </li>
        <li class="try">
            <a href="add-unit.php"><i class="fa fa-cubes"></i><span>Add Unit</span></a>
        </li>
        <li class="try">
            <a href="add-party.php"><i class="fa fa-plus"></i><span>Add Party</span></a>
        </li>
        <li class="try">
            <a href="add-company.php"><i class="fa fa-building"></i><span>Add Company</span></a>
        </li>
        <li class="try">
            <a href="add-product.php"><i class="fa fa-cart-plus"></i><span>Add Product</span></a>
        </li>
        <li class="try">
            <a href="purches-master.php"><i class="fa-solid fa-money-check-dollar"></i><span>Purches Master</span></a>
        </li>
        <li class="try">
            <a href="copy-product.php"><i class="fa-solid fa-money-check-dollar"></i><span>Add Own Price</span></a>
        </li>
        <li class="try">
            <a href="sales-master.php"><i class="fa-solid fa-money-check-dollar"></i><span>Sales Master</span></a>
        </li>
        <!-- <li class="try">
            <a href="stock-master.php"><i class="fa-solid fa-chart-column"></i><span>Stock Master</span></a>
        </li> -->
        <!-- <li class="try">
            <a href="view-bills.php"><i class="fa-solid fa-eye"></i><span>View Bills</span><span class="label label-important">New</span></a>
        </li> -->
        <!-- <li class="try">
            <a href="return-products.php"><i class="fa-solid fa-right-left"></i><span>Return Products</span><span class="label label-important">New</span></a>
        </li> -->
        <li class="submenu">
            <a href="#"><i class="fa fa-list"></i> <span>Reports</span> <span class="label label-important">+</span></a>
            <ul>
                <li><a href="purches-report.php">Purches Report</a></li>
                <li><a href="view-bills.php">Sales Report</a></li>
                <li><a href="stock-master.php">Stock Report</a></li>
                <li><a href="return-products.php">Return Products Report</a></li>
                <li><a href="party-report.php">Party Report</a></li>
                <li><a href="expiary-report.php">Expiary Report</a></li>
            </ul>
        </li>
    </ul>
</div>

<!-- LogOut link -->
<div id="search">
    <a href="logout.php" style="color:white"><i class="fa fa-sign-out-alt"></i><span>LogOut</span></a>
</div>

<!-- JavaScript to set active class on click -->
 <script>
   
 </script>
