<?php

include 'connect.php';

$id = 1;

$sql = "Select * from `tbl_user` where userID=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

/*TO FETCH THE DATA FROM DATABASE - */
$Name = $row['Name']; /*column name in the database */
$Username = $row['Username'];
$Profile_image = $row['Profile_image'];
?>

<!--FOR FETCHING DATA FROM DATABASE-->
<?php
include 'connect.php';

// Fetch and check the data from the database using a JOIN query
$sql = "SELECT
    paint.paint_color,
    supplier.supplier_name, supplier.newSupplier_name,
    customer.customer_name,entry.*
    FROM tbl_entry AS entry         /*target the table with foreign key*/
    LEFT JOIN tbl_paint AS paint ON entry.paintID = paint.paintID
    LEFT JOIN tbl_supplier AS supplier ON paint.supplierID = supplier.supplierID
    LEFT JOIN tbl_customer AS customer ON entry.customerID = customer.customerID";

$result = mysqli_query($con, $sql);

if (!$result) {
    die(mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>Paint-Acetate Yield Monitoring</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <!--FOR DATATABLES STYLING-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
     
    <style>
        * {

            list-style: none;
            text-decoration: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Noto+Serif+Makasar';
        }



        .wrapper .sidebar {
            background: rgb(5, 68, 104);
            position: fixed;
            top: 0;
            left: 0;
            width: 300px;
            height: 100%;
            padding: 20px 0;
            transition: all 0.5s ease;
        }

        .wrapper .sidebar .profile {
            margin-bottom: 30px;
            text-align: center;
        }

        .wrapper .sidebar .profile img {
            display: block;
            width: 110px;
            height: 110px;
            border-radius: 50%;
            margin: 0 auto;
        }

        .wrapper .sidebar .profile h3 {
            color: #ffffff;
            margin: 15px 0 5px;
        }

        .wrapper .sidebar .profile p {
            color: rgb(206, 240, 253);
            font-size: 14px;
        }

        .wrapper .sidebar ul li a {
            display: block;
            padding: 13px 30px;
            border-bottom: 1px solid #10558d;
            color: rgb(241, 237, 237);
            font-size: 16px;
            position: relative;
            margin-right: 33px;
            text-decoration: none;
        }

        .wrapper .sidebar ul li a .icon {
            color: #dee4ec;
            width: 30px;
            display: inline-block;
        }

        .wrapper .sidebar ul li a:hover,
        .wrapper .sidebar ul li a.active {
            color: #0c7db1;

            background: white;
            border-right: 2px solid rgb(5, 68, 104);

        }

        .wrapper .sidebar ul li a:hover .icon,
        .wrapper .sidebar ul li a.active .icon {
            color: #0c7db1;

        }

        .wrapper .sidebar ul li a:hover:before,
        .wrapper .sidebar ul li a.active:before {
            display: block;

        }

        .wrapper .section {
            width: calc(100% - 300px);
            margin-left: 300px;
            transition: all 0.5s ease;

        }

        .wrapper .section .top_navbar {
            background: white;
            height: 2px;
            display: flex;
            align-items: center;
            padding: 0 30px;
            margin-top: 20px;

        }

        .wrapper .section .top_navbar .hamburger a {
            font-size: 30px;
            color: black;
        }

        .wrapper .section .top_navbar .hamburger a:hover {
            color: rgb(7, 105, 185);
        }

        /* Set initial styles for the sidebar and section */
body .wrapper .sidebar {
    left: 0;
    transition: left 0.5s ease; /* Add a transition for smooth animation */
}

body .wrapper .section {
    margin-left: 300px;
    transition: margin-left 0.5s ease, width 0.5s ease; /* Add transitions for smooth animation */
    width: calc(100% - 300px);
}

/* Apply styles when body has the 'active' class */
body.active .wrapper .sidebar {
    left: -300px;
}

body.active .wrapper .section {
    margin-left: 0;
    width: 100%;
}

        /*USER PROFILE STYLES*/
        .admin_profile {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
            margin-right: 32px;

        }

        .img-admin {
            height: 55px;
            width: 55px;
            border-radius: 50%;
            border: 3px solid transparent;
            /* Set a default border style */
        }

        .img-admin:hover {
            border-color: blue;
            /* Change the border color to red on hover */

        }


        img {
            height: 50px;
            width: 50px;
            border-radius: 50%;

        }

        /*USER HOME PROFILE STYLES*/
        .Admin-Profile {
            display: flex;
            justify-content: start;
            margin-top: 20px;
            margin-left: 50px;

        }

        .Img-Admin {
            height: 200px;
            width: 200px;
            border-radius: 50%;
            border: 5px solid;
            /* Set a default border style */
            border-color: rgb(0, 255, 38);
        }

        /*FOR ADMIN PROFILE MODAL */
        .container {
            min-height: 50vh;
            background-color: var(--light-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container .profile {
            padding: 20px;
            box-shadow: var(--box-shadow);
            text-align: center;
            width: 400px;
            border-radius: 5px;

        }

        .container .profile img {
            height: 160px;
            width: 160px;
            border-radius: 50%;
            object-fit: cover;


        }

        /*FOR UPDATE MODAL */

        .container2 {
            min-height: 40vh;

        }

        .container2 .profile2 {
            box-shadow: var(--box-shadow);

            border-radius: 5px;
        }

        .container2 .profile2 .img2 {
            Display: absolute;
            height: 180px;
            width: 180px;
            margin-left: 140px;
            margin-top: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        /*FOR UPDATE PROFILE */
        .update-profile form .flex {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 15px;
        }

        .update-profile form .flex .inputBox {
            width: 50%;
            margin-top: 20px;
        }

        .update-profile form .flex .inputBox span {
            text-align: left;
            display: block;
            margin-top: 15px;
            font-size: 17px;
            color: var(--black);
        }

        .update-profile form .flex .inputBox .box {
            width: 100%;
            border-radius: 10px;
            padding: 12px 14px;
            font-size: 17px;
            color: var(--black);
            margin-top: 10px;
        }

        /*FOR VOLUME TABLE CONTENT */


        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;

            color: black;
        }

        .date-cell {
            white-space: nowrap;
        }

        .paint-color-cell {
            white-space: nowrap;
        }

        /*FOR TABLE CONTAINER */


        .container3,
        .container3-fluid,
        .container3-lg,
        .container3-md,
        .container3-sm,
        .container3-xl,
        .container3-xxl {
            --bs-gutter-x: 3.9rem;
            --bs-gutter-y: 0;
            width: 100%;
            padding-right: calc(var(--bs-gutter-x) * .5);
            padding-left: calc(var(--bs-gutter-x) * .5);
            margin-top: 15px;
            margin-right: auto;
            margin-left: auto;
            background-color: rgb(225, 225, 212);

        }

        /*FOR SEARCH BAR */
        .searchfield {
            width: 150px;
            height: 30px;
            margin-left: 5px;
            background-color: rgb(225, 225, 212);
            border-color: #86b7fe;
            border-radius: 5px;

        }

        /*FOR FILTER BAR */
        .filterfield {
            width: 150px;
            height: 30px;
            margin-left: 5px;
            background-color: rgb(225, 225, 212);
            border-color: #86b7fe;
            border-radius: 5px;
        }

        /*FOR SORT BAR */
        .sortfield {
            width: 150px;
            height: 30px;
            margin-left: 5px;
            background-color: rgb(225, 225, 212);
            border-color: #86b7fe;
            border-radius: 5px;
        }


        /*Operation Button */

        .btn_opt {
            display: flex;
            justify-content: flex-end;
            margin-top: 50px;
            margin-right: 32px;
        }

        .editProfile_container {
            background-color: #3498db;
            padding: 3em 0 3em 0;
            flex: 1 1 100px;
            margin-right: auto;
            text-align: center;

        }




        label {
            text-align: center;


        }

        input {
            width: 30%;
            height: 35px;
            margin-bottom: 20px;
            border-color: #86;
            border-radius: 5px;
        }

        .selector {
            width: 30%;
            height: 35px;
            margin-bottom: 20px;
            border-color: #86;
            border-radius: 5px;
        }

        .newpaint {
            text-align: left;
            margin-left: 45px;
        }

        .operational_btn {
            margin-right: 30px;
        }

        /*FOR PARALLELOGRAM IN ADMIN PROFILE */
        .parallelogram-button {
            display: inline-block;
            padding: 8px 40px;

            text-decoration: none;
            transition: background-color 0.3s;
        }

        .parallelogram-button1 {
            background-color: #3498db;
            transform: skew(20deg);
            transform-origin: bottom right;
        }

        .parallelogram-button2 {
            margin-left: 20px;
            background-color: #2ecc71;
            transform: skew(20deg);
            transform-origin: bottom right;
        }

        .parallelogram-button1:hover {
            background-color: #2980b9;
        }

        .parallelogram-button2:hover {
            background-color: #27ae60;
        }

        .profile-history-btn {
            margin-left: 300px;
        }

        /* Style for the select option in admin profile */
        .dropdown {
            border: none;
            font-size: 23px;
            width: 6%;
            text-align: center;

        }

        /* Style for the options within the dropdown */
        .dropdown option {
            padding: 10px;
            font-size: 20px;
            text-align: center;
        }


        /*MAIN CONTENT */

        div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }

        .main1 {
            background-color: rgb(225, 225, 212);
            padding: 2%;
            padding-bottom: 0px;
            flex: 1 1 150px;
            margin-top: 20px;
            margin-left: 30px;
        }

        .main2 {
            display: flex;
            flex: 1;
        }

        /* FOR SEARCH BAR */
        .dataTables_wrapper .dataTables_filter input {
    border: 1px solid #aaa;
    border-radius: 3px;
    padding: 5px;
    background-color: white;
    margin-left: 3px;
}
        /* FOR SHOW ENTRIES */
.dataTables_wrapper .dataTables_length select {
    border: 1px solid #aaa;
    border-radius: 3px;
    padding: 5px;
    background-color:white;
    padding: 8px;
}


        /*FOR SYSTEM RESPONSIVE */

    </style>
</head>
<body>
<div class="wrapper">
        <div class="section">
        <div class="admin_profile">
        <img src="uploaded_image/<?php echo $Profile_image; ?>" class="img-admin" id="image">

        <select class="dropdown" required onchange="handleDropdownChange(this)">
        <option><?php echo $Username; ?></option>
        <option value="edit_profile">&nbsp;Edit Profile&nbsp;</option>
        <option value="logout">Logout</option>
        </select>
        </div>
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i> 
                        
                    </a>
                    
                </div>
            </div>

            <!--MAIN CONTENT-->
    
            <div class="main1">
                <div class="main2">
                    <table id="datatables" class="display" style="width:100%;">
                        <thead>
                                    <tr>
                                        <th colspan="6" style="text-align:center; background-color:#007BFF;">Initial Inventory</th>
                                        <th colspan="5" style="text-align:center; background-color:#007BFF;">New Paint Mix</th>
                                        <th colspan="2" style="text-align:center; background-color:#FFC107;">Ending Inventory</th>
                                        <th colspan="2" style="text-align:center; background-color:#007BFF">Total Usage</th>
                                        <th colspan="2" style="text-align:center; background-color:#DC3545">Production Output</th>
                                        <th colspan="2" style="text-align:center; background-color:#007BFF">Yield</th>
                                        <th style="text-align:center; background-color:#FFC107">Equipment Parameter</th>
                                        <th colspan="7" style="text-align:center; background-color:#FFC107">Spray Time (s)</th>
                                        <th colspan="2" style="text-align:center;">Remarks & Operation</th>
                                        
                                    </tr>
                            
                                <tr>
  <th class="bg-primary" style="text-align:center;">Date</th> <!--This is a  header column for Initial Inventory of Paint Mix-->
  <th class="bg-primary" style="text-align:center;">Paint Color</th> <!--This is a  header column for Initial Inventory of Paint Mix-->
  <th class="bg-primary" style="text-align:center;">Supplier</th> <!--This is a  header column for Initial Inventory of Paint Mix-->
  <th class="bg-primary" style="text-align:center;">Batch Number</th> <!--This is a  header column for Initial Inventory of Paint Mix-->
  <th class="bg-primary" style="text-align:center;">Paint(L)</th> <!--This is a  header column for Initial Inventory of Paint Mix-->
  <th class="bg-primary" style="text-align:center;">Acetate(L)</th> <!--This is a  header column for Initial Inventory of Paint Mix-->
  
  <th class="bg-primary" style="text-align:center;">Supplier</th> <!--This is a  header column of New Paint Mix-->
  <th class="bg-primary" style="text-align:center;">Batch Number</th> <!--This is a  header column of New Paint Mix-->
  <th class="bg-primary" style="text-align:center;">Paint(L)</th> <!--This is a  header column of New Paint Mix-->
  <th class="bg-primary" style="text-align:center;">Acetate(L)</th> <!--This is a  header column of New Paint Mix-->
  <th class="bg-primary" style="text-align:center;">Spray Viscosity</th> <!--This is a  header column of Equipment parameter-->

  <th class="bg-warning" style="text-align:center;">Paint(L)</th> <!--This is a  header column of Ending Inventory-->
  <th class="bg-warning" style="text-align:center;">Acetate(L)</th> <!--This is a  header column of Ending Inventory-->
  
  <th class="bg-primary" style="text-align:center;">Paint(L)</th> <!--This is a  header column of Total usage-->
  <th class="bg-primary" style="text-align:center;">Acetate(L)</th> <!--This is a  header column of Total usage-->
  
  <th class="bg-danger" style="text-align:center;">Customer</th> <!--This is a  header column of Production output-->
  <th class="bg-danger" style="text-align:center;">Quantity(Du)</th> <!--This is a  header column of Production output-->
  
  <th class="bg-primary" style="text-align:center;">Paint (Du'L)</th> <!--This is a  header column of yield-->
  <th class="bg-primary" style="text-align:center;">Acetate (Du'L)</th> <!--This is a  header column of yield-->
  
  <th class="bg-warning" style="text-align:center;">Fluid pressure(psi)</th> <!--This is a  header column of Equipment parameter-->
  
  <th class="bg-warning" style="text-align:center;">Nozzle<br>1</th> <!--This is a  header column of Spray time(s)-->
  <th class="bg-warning" style="text-align:center;">Nozzle<br>2</th> <!--This is a  header column of Spray time(s)-->
  <th class="bg-warning" style="text-align:center;">Nozzle<br>3</th> <!--This is a  header column of Spray time(s)-->
  <th class="bg-warning" style="text-align:center;">Nozzle<br>4</th> <!--This is a  header column of Spray time(s)-->
  <th class="bg-warning" style="text-align:center;">Nozzle<br>6</th> <!--This is a  header column of Spray time(s)-->
  <th class="bg-warning" style="text-align:center;">Nozzle<br>9</th> <!--This is a  header column of Spray time(s)-->
  <th class="bg-warning" style="text-align:center;">Nozzle<br>10</th> <!--This is a  header column of Spray time(s)-->
  <th style="text-align:center;">Remarks</th> <!--This is a  header column of Spray time(s)-->
  <th style="text-align:center;">Operation</th> <!--This is a  header column of Spray time(s)-->
  </tr>
                                </thead>
                                <tbody>
                <?php
                // Loop through the results and display data in the table
                

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr class='edit-row' data-entry-id='{$row['EntryID']}' data-date='{$row['date']}' data-paint-color='{$row['paint_color']}' data-supplier-name='{$row['supplier_name']}' data-batch-number='{$row['batchNumber']}' data-new-supplier-name='{$row['newSupplier_name']}' data-new-paint-l='{$row['NewpaintL']}' data-new-acetate-l='{$row['NewacetateL']}' data-spray-viscosity='{$row['sprayViscosity']}' data-customer-name='{$row['customer_name']}' data-quantity='{$row['quantity']}' data-paint-yield='{$row['paintYield']}' data-acetate-yield='{$row['acetateYield']}' data-remarks='{$row['remarks']}'>";
                    echo "<td class='date-cell'>{$row['date']}</td>";
                    echo "<td>{$row['paint_color']}</td>";
                    echo "<td>{$row['supplier_name']}</td>";
                    echo "<td>{$row['batchNumber']}</td>";
                    echo "<td style='color:blue;'>25</td>";
                    echo "<td style='color:blue;'>25</td>";
                    echo "<td>{$row['newSupplier_name']}</td>";
                    echo "<td style='color:blue;'>202024234</td>";
                    echo "<td>{$row['NewpaintL']}</td>";
                    echo "<td>{$row['NewacetateL']}</td>";
                    echo "<td>{$row['sprayViscosity']}</td>";
                    echo "<td style='color:blue;'>23.2</td>";
                    echo "<td style='color:blue;'>32.3</td>";
                    echo "<td style='color:blue;'>34.4</td>";
                    echo "<td style='color:blue;'>45.5</td>";
                    echo "<td>{$row['customer_name']}</td>";
                    echo "<td>{$row['quantity']}</td>";
                    echo "<td>{$row['paintYield']}</td>";
                    echo "<td>{$row['acetateYield']}</td>";
                    echo "<td style='color:red;'>12.2</td>";
                    echo "<td style='color:red;'>1</td>";
                    echo "<td style='color:red;'>2</td>";
                    echo "<td style='color:red;'>3</td>";
                    echo "<td style='color:red;'>4</td>";
                    echo "<td style='color:red;'>6</td>";
                    echo "<td style='color:red;'>9</td>";
                    echo "<td style='color:red;'>10</td>";
                    echo "<td>{$row['remarks']}</td>";
                    echo "<td class='crud'><div style='display: flex; gap: 10px;'>
                <button class='btn btn-info text-light editbtn'>Update</button>
                <button class='btn btn-danger confirm_dltbtn' data-entry-id='{$row['EntryID']}'>Delete</button>
                </div></td>";
                    // Add more table data based on your columns
                    echo "</tr>";


                    //########################################################################################
                
                    // Save data from the current row for later use in the modal
                    $id = $row['EntryID'];
                    $date = $row['date'];
                    $paint_color = $row['paint_color'];
                    $supplier_name = $row['supplier_name'];
                    $batchNumber = $row['batchNumber'];
                    $newSupplier_name = $row['newSupplier_name'];
                    $NewpaintL = $row['NewpaintL'];
                    $NewacetateL = $row['NewacetateL'];
                    $sprayViscosity = $row['sprayViscosity'];
                    $customer_name = $row['customer_name'];
                    $quantity = $row['quantity'];
                    $paintYield = $row['paintYield'];
                    $acetateYield = $row['acetateYield'];
                    $remarks = $row['remarks'];



                }
                ?>   
            
            <!--Update data modal-->
           
           <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header" style="background-color: #337ab7; color: white;">
                    <h5 class="modal-title center-modal-title">UPDATE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
        <form method="post" action="monitoring-update.php" id="updateForm">
        <input type="hidden" name="userID" id="update_id">
        <fieldset>
         <label style="color:blue;font-weight:bold;">Date:</label>
         <input type="date" class="form-control" id="date" name="date"  autocomplete="off" required
         value="<?php echo $date; ?>">
        </fieldset>
        <br><br>
        <fieldset>
         <legend style="color:blue; font-weight:bold;">Initial Inventory of Paint Mix</legend><br><br>
         <label>Paint Color:</label>
         <select name="paint_color" id="paint_color"  required>
         <option value="">-- Select --</option>
    <option value="Royal Blue" <?php if ($paint_color == "Royal Blue")
        echo "selected"; ?>>Royal Blue</option>
    <option value="Deft Blue" <?php if ($paint_color == "Deft Blue")
        echo "selected"; ?>>Deft Blue</option>
    <option value="Buff" <?php if ($paint_color == "Buff")
        echo "selected"; ?>>Buff</option>
    <option value="Golden Brown" <?php if ($paint_color == "Golden Brown")
        echo "selected"; ?>>Golden Brown</option>
    <option value="Clear" <?php if ($paint_color == "Clear")
        echo "selected"; ?>>Clear</option>
    <option value="White" <?php if ($paint_color == "White")
        echo "selected"; ?>>White</option>
    <option value="Black" <?php if ($paint_color == "Black")
        echo "selected"; ?>>Black</option>
    <option value="Alpha Gray" <?php if ($paint_color == "Alpha Gray")
        echo "selected"; ?>>Alpha Gray</option>
    <option value="Nile Green" <?php if ($paint_color == "Nile Green")
        echo "selected"; ?>>Nile Green</option>
    <option value="Emirald Green" <?php if ($paint_color == "Emirald Green")
        echo "selected"; ?>>Emirald Green</option>
    <option value="Jade Green" <?php if ($paint_color == "Jade Green")
        echo "selected"; ?>>Jade Green</option>
         </select>
        
         <label>Supplier:</label>
         <select name="supplier_name" id="supplier_name"  required>
         <option value="">-- Select --</option>
         <option value="Nippon" <?php if ($supplier_name == "Nippon")
             echo "selected"; ?>>Nippon</option>
         <option value="Treasure Island" <?php if ($supplier_name == "Treasure Island")
             echo "selected"; ?>>Treasure Island</option>
         <option value="Inkote" <?php if ($supplier_name == "Inkote")
             echo "selected"; ?>>Inkote</option>
         <option value="Century" <?php if ($supplier_name == "Century")
             echo "selected"; ?>>Century</option>
         </select>
         <br><br>
         <label>Batch #:</label>
         <input type="text" class="form-control" name="batchNumber" id="batchNumber" autocomplete="off" required
         value="<?php echo $batchNumber; ?>">

         <br>
        </fieldset>
        <br><br>

        <fieldset>
        <legend style="color:blue;font-weight:bold;">New Paint Mix</legend><br><br>
        <label>Supplier:</label>
         <select name="newSupplier_name" id="newSupplier_name"  required>
         <option value="">-- Select --</option>
         <option value="Nippon" <?php if ($newSupplier_name == "Nippon")
             echo "selected"; ?>>Nippon</option>
         <option value="Treasure Island" <?php if ($newSupplier_name == "Treasure Island")
             echo "selected"; ?>>Treasure Island</option>
         <option value="Inkote" <?php if ($newSupplier_name == "Inkote")
             echo "selected"; ?>>Inkote</option>
         <option value="Century" <?php if ($newSupplier_name == "Century")
             echo "selected"; ?>>Century</option>
         </select>

        <br><br>

       <label>Paint Liter:</label>
       <input type="text" class="form-control" name="NewpaintL" id="NewpaintL" autocomplete="off" required
       value="<?php echo $NewpaintL; ?>">
       <br>
       <label>Acetate Liter:</label>
       <input type="text" class="form-control" name="NewacetateL" id="NewacetateL" autocomplete="off" required
       value="<?php echo $NewacetateL; ?>">
     </fieldset>
     <br>

    <fieldset>
     <label>Spray Viscosity:</label>
    <input type="text" class="form-control" name="sprayViscosity" id="sprayViscosity" autocomplete="off" required
    value="<?php echo $sprayViscosity; ?>">
    </fieldset>
    <br><br>

    <fieldset>
    <legend style="color:blue;font-weight:bold;">Production Output</legend><br><br>
    <label>Customer:</label>
    <input type="text" class="form-control" name="customer_name" id="customer_name" autocomplete="off" required
    value="<?php echo $customer_name; ?>">
    <br>
    <label>Quantity du:</label>
    <input type="text" class="form-control" name="quantity" id="quantity" autocomplete="off" required
    value="<?php echo $quantity; ?>">
    </fieldset>
    <br><br>

    <fieldset>
    <legend style="color:blue;font-weight:bold;">Yield</legend><br><br>
    <label>Paint Yield:</label>
    <input type="text" class="form-control" name="paintYield" id="paintYield" autocomplete="off" required
    value="<?php echo $paintYield; ?>">
    <br>
    <label>Acetate Yield:</label>
    <input type="text" class="form-control" name="acetateYield" id="acetateYield" autocomplete="off" required
    value="<?php echo $acetateYield; ?>">
    </fieldset>
    <br><br>
    
    <fieldset>
    <label style="color:red;font-weight:bold;">Abnormalities Encountered others Remarks: </label>
    <textarea class="remarks form-control" name="remarks" id="remarks" autocomplete="off" required><?php echo $remarks; ?></textarea>
</fieldset>
    <br>

    <div class="modal-footer">
                    
                    <button type="submit" name="updatedata" class="btn btn-info text-light" >Update</button>
                    <button class="btn btn-danger" class="btn-close" data-bs-dismiss="modal" style="color:white">Cancel</button>
                </div>
     </form>
                </div>
            </div>
        </div>
    </div>
    
          </tr>
        </tbody>
                            </table>
                </div> 
            </div>

     <!--Top menu -->
        <div class="sidebar">
           <!--profile image & text-->
           <div class="profile">
            <img src="IMAGES/logo.jpg" alt="profile_picture">
            <h3>Mindanao Container Corporation</h3>
            <!--<p>purok-8,Villanueva,Mis or.</p> -->
        </div>
            <!--menu item-->
            <ul>
            <li>
                <!-- Hidden hyperlink -->
                <a href="hidden_profile.php" style="display:none;">Hidden Link

                </a>
            </li>
            <li>
                    <a href="profile.php" style="display:none;">
                        <span class="icon"><i class="fa-solid fa-user"></i></span>
                        <span class="item">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="dataEntry.php">
                        <span class="icon"><i class="fa-regular fa-keyboard"></i></span>
                        <span class="item">Data Entry</span>
                    </a>
                </li>
                <li>
                    <a href="volume.php">
                        <span class="icon"><i class="fa-solid fa-chart-simple"></i></span>
                        <span class="item">Volume</span>
                    </a>
                </li>
                <li>
                    <a href="monitoring.php"  class="active">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">Monitoring</span>
                    </a>
                </li>
                <li>
                    <a href="report.php">
                        <span class="icon"><i class="fa-regular fa-folder"></i></span>
                        <span class="item">Reports</span>
                    </a>
                </li>
                
            </ul>
            
        </div>
        </div>

    </div>


    <!--###################################################################################################-->
     <!-- Delete Modal -->

<div class="modal" id="deletemodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: red; color: white;">
                <h5 class="modal-title center-modal-title">DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="monitoring-delete.php" method="post">
                
                <input type="hidden" name="userID" id="confirm_delete_id">

                <h4 style="text-align:center;">Are you sure you want to delete it?</h4>

            
                <div class="modal-footer">

                <button type="submit" name="deletedata" class="btn btn-primary" >Yes</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="color: white">No</button>
                </div>
            </form>
        </div>
    </div>
</div>


   <!-- Clickable image modal -->
   <div class="modal fade" id="clickable_image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">

                            <div class="profile">
                                <div class="admin_modal">
                                    <a href="#" id="image">
                                        <img src="uploaded_image/<?php echo $Profile_image; ?>">
                                    </a>
                                </div>

                                 <h1 style="margin-top:20px;">
                                 <?php echo $Name; ?>
                                </h1>

                                    <div id="update_profile">
                                    <a href="profile.php"><button class="btn btn-primary btn-lg" style="font-size:25px; margin-top:20px;">Update profile</button></a>
                                    </div>
                            </div>

                        </div>
                    </div>
                
                </div>
            </div>
        </div>

         <!--FOR DATA TABLES SCRIPT-->
         <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
     <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
     <script>
          $(document).ready(function(){
            new DataTable('#datatables', {
            scrollX: true,
            scrollY: true
            
        });
     });
     </script>

<!--For UPDATE modal-->
<!--Reminder: Javascript is so sensitive..kailangan na puro small letter
ang e-assign na attributes name sa js to populate the value of the attributes
in HTML. For example: (data-ending-paint-ratio) kailangan na small letter tanan.-->
        <script>
$(document).ready(function () {
    $('.edit-row .editbtn').on('click', function () {
        var row = $(this).closest('.edit-row');
        var userID = row.data('entry-id');
        var date = row.data('date');
        var paintColor = row.data('paint-color');
        var supplierName = row.data('supplier-name');
        var batchNumber = row.data('batch-number');
        var newSupplierName = row.data('new-supplier-name');
        var newPaintL = row.data('new-paint-l');
        var newAcetateL = row.data('new-acetate-l');
        var sprayViscosity = row.data('spray-viscosity');
        var customerName = row.data('customer-name');
        var quantity = row.data('quantity');
        var paintYield = row.data('paint-yield');
        var acetateYield = row.data('acetate-yield');
        var remarks = row.data('remarks');

        $('#editmodal #update_id').val(userID);
        $('#editmodal #date').val(date);
        $('#editmodal #paint_color').val(paintColor);
        $('#editmodal #supplier_name').val(supplierName);
        $('#editmodal #batchNumber').val(batchNumber);
        $('#editmodal #newSupplier_name').val(newSupplierName);
        $('#editmodal #NewpaintL').val(newPaintL);
        $('#editmodal #NewacetateL').val(newAcetateL);
        $('#editmodal #sprayViscosity').val(sprayViscosity);
        $('#editmodal #customer_name').val(customerName);
        $('#editmodal #quantity').val(quantity);
        $('#editmodal #paintYield').val(paintYield);
        $('#editmodal #acetateYield').val(acetateYield);
        $('#editmodal #remarks').val(remarks);

        $('#editmodal').modal('show');
    });
});
</script>


<!--For delete modal-->
<script>
$(document).ready(function () {
    $('.edit-row .confirm_dltbtn').on('click', function () {
        var userID = $(this).closest('.edit-row').data('entry-id');
        $('#deletemodal #confirm_delete_id').val(userID);
        $('#deletemodal').modal('show');
    });
});
</script>

<!-- FOR clickable image dropdown -->
<script>
    function handleDropdownChange(select) {
        var selectedValue = select.value;

        if (selectedValue === "edit_profile") {
            // Redirect to the edit profile page
            window.location.href = "profile.php"; // Change the URL accordingly
        } else if (selectedValue === "logout") {
            // Redirect to the logout page
            window.location.href = "login.php"; // Change the URL accordingly
        }
    }
</script>

    <!--FOR SIDEBAR-->
<script>
    var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function(){
        document.querySelector("body").classList.toggle("active");
    })
  </script>
    
</body>
</html>