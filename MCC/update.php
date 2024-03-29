<?php
// Include the session check at the beginning of restricted pages
session_start();

// Check if the user is not logged in or is not an admin or operator
if (!isset($_SESSION['Username']) || ($_SESSION['Level'] != 'Admin' && $_SESSION['Level'] != 'Operator')) {
    header('Location: login.php'); // Redirect to the login page if not authenticated
    exit();
}

include 'connect.php';

$userid = 1;

$sql = "Select * from `tbl_user` where userID=$userid";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

/*TO FETCH THE DATA FROM DATABASE - */
$Name = $row['Name']; /*column name in the database */
$Username = $row['Username'];
$Profile_image = $row['Profile_image'];
?>


<?php
include 'connect.php';

if (isset($_GET['data-entry-id'])) {
    $id = $_GET['data-entry-id'];
    // Fetch the data corresponding to the entry ID

    $sql = "SELECT
                paint.paint_color,
                supplier.supplier_name, supplier.newSupplier_name,
                customer.customer_name,
                entry.*
            FROM tbl_entry AS entry
            LEFT JOIN tbl_paint AS paint ON entry.paintID = paint.paintID
            LEFT JOIN tbl_supplier AS supplier ON paint.supplierID = supplier.supplierID
            LEFT JOIN tbl_customer AS customer ON entry.customerID = customer.customerID
            WHERE entry.EntryID = $id";

    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Populate variables with fetched data
        $date = $row['date'];
        $paint_color = $row['paint_color'];
        $supplier_name = $row['supplier_name'];
        $batchNumber = $row['batchNumber'];
        $diameter = $row['diameter'];
        $height = $row['height'];
        $paintRatio = $row['paintRatio'];
        $acetateRatio = $row['acetateRatio'];
        $Endingdiameter = $row['Endingdiameter'];
        $Endingheight = $row['Endingheight'];
        $EndingpaintRatio = $row['EndingpaintRatio'];
        $EndingacetateRatio = $row['EndingacetateRatio'];
        $newSupplier_name = $row['newSupplier_name'];
        $NewpaintL = $row['NewpaintL'];
        $NewacetateL = $row['NewacetateL'];
        $sprayViscosity = $row['sprayViscosity'];
        $customer_name = $row['customer_name'];
        $quantity = $row['quantity'];
        $paintYield = $row['paintYield'];
        $acetateYield = $row['acetateYield'];
        $remarks = $row['remarks'];
    } else {
        // Handle error if query fails
        echo "Error fetching data: " . mysqli_error($con);
    }
}

// Insert data into the entry table
if (isset($_POST['add'])) {
    $date = $_POST['date'];
    $paint_color = $_POST['paint_color'];
    $supplier_name = $_POST['supplier_name'];
    $batchNumber = $_POST['batchNumber'];
    $diameter = $_POST['diameter'];
    $height = $_POST['height'];
    $paintRatio = $_POST['paintRatio'];
    $acetateRatio = $_POST['acetateRatio'];
    $newSupplier_name = $_POST['newSupplier_name'];
    $NewacetateL = isset($_POST['NewacetateL']) ? $_POST['NewacetateL'] : '';
    $NewpaintL = isset($_POST['NewpaintL']) ? $_POST['NewpaintL'] : '';
    $sprayViscosity = $_POST['sprayViscosity'];
    $customer_name = isset($_POST['customer_name']) ? $_POST['customer_name'] : '';
    $quantity = $_POST['quantity'];
    $Endingdiameter = $_POST['Endingdiameter'];
    $Endingheight = $_POST['Endingheight'];
    $EndingpaintRatio = $_POST['EndingpaintRatio'];
    $EndingacetateRatio = $_POST['EndingacetateRatio'];
    $paintYield = $_POST['paintYield'];
    $acetateYield = $_POST['acetateYield'];
    $remarks = $_POST['remarks'];


    /*Para nga ma-insert ang mga data sa mga tables, kinahanglan
    na mag insert ka nga magkasunod-sunod og foreign key, dependi kong unsay
    una nga table with foreign key */



    // Insert into tbl_supplier
    $sql = "INSERT INTO `tbl_supplier` (supplier_name, newSupplier_name) VALUES ('$supplier_name', '$newSupplier_name')";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    // Get the supplierID of the newly inserted supplier
    $supplierID = mysqli_insert_id($con);

    // Insert into tbl_customer
    $sql = "INSERT INTO `tbl_customer` (customer_name, userID) VALUES ('$customer_name', '$userid')";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    // Get the customerID of the newly inserted customer
    $customerID = mysqli_insert_id($con);

    // Insert into tbl_paint
    $sql = "INSERT INTO `tbl_paint` (paint_color, supplierID) VALUES ('$paint_color', '$supplierID')";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    // Get the paintID of the newly inserted paint
    $paintID = mysqli_insert_id($con);



    // Insert into tbl_entry
    $sql = "INSERT INTO `tbl_entry` (userID, customerID, paintID, date, batchNumber, diameter, height, paintRatio, acetateRatio, NewacetateL, NewpaintL, sprayViscosity, quantity, Endingdiameter, Endingheight, EndingpaintRatio, EndingacetateRatio, paintYield, acetateYield, remarks)
    VALUES ('$userid', '$customerID', '$paintID', '$date', '$batchNumber', '$diameter', '$height', '$paintRatio', '$acetateRatio', '$NewacetateL', '$NewpaintL', '$sprayViscosity', '$quantity', '$Endingdiameter', '$Endingheight', '$EndingpaintRatio', '$EndingacetateRatio', '$paintYield', '$acetateYield', '$remarks')";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    // Get the EntryID of the newly inserted Entry
    $EntryID = mysqli_insert_id($con);


    if ($result) {
        $updateSuccess = true;
    } else {
        die(mysqli_error($con));
    }
}


// UPDATE DATA
if (isset($_POST['update'])) {
    $id = $_POST['userID'];
    $date = $_POST['date'];
    $paint_color = $_POST['paint_color'];
    $supplier_name = $_POST['supplier_name'];
    $batchNumber = $_POST['batchNumber'];
    $diameter = $_POST['diameter'];
    $height = $_POST['height'];
    $paintRatio = $_POST['paintRatio'];
    $acetateRatio = $_POST['acetateRatio'];
    $Endingdiameter = $_POST['Endingdiameter'];
    $Endingheight = $_POST['Endingheight'];
    $EndingpaintRatio = $_POST['EndingpaintRatio'];
    $EndingacetateRatio = $_POST['EndingacetateRatio'];
    $newSupplier_name = $_POST['newSupplier_name'];
    $NewpaintL = $_POST['NewpaintL'];
    $NewacetateL = $_POST['NewacetateL'];
    $sprayViscosity = $_POST['sprayViscosity'];
    $customer_name = $_POST['customer_name'];
    $quantity = $_POST['quantity'];
    $paintYield = $_POST['paintYield'];
    $acetateYield = $_POST['acetateYield'];
    $remarks = $_POST['remarks'];


    // Update supplier table
    $sql = "UPDATE `tbl_supplier` SET supplier_name='$supplier_name', newSupplier_name='$newSupplier_name' WHERE supplierID=$id";
    $result = mysqli_query($con, $sql);


    if ($result) {
        // Update paint table
        $sql = "UPDATE `tbl_paint` SET paint_color='$paint_color' WHERE paintID=$id";
        $result = mysqli_query($con, $sql);
    }

    if ($result) {
        // Update entry table
        $sql = "UPDATE `tbl_entry` SET date='$date', batchNumber='$batchNumber', diameter='$diameter', 
        height='$height', paintRatio='$paintRatio', acetateRatio='$acetateRatio', 
        Endingdiameter='$Endingdiameter', Endingheight='$Endingheight', EndingpaintRatio='$EndingpaintRatio',
         EndingacetateRatio='$EndingacetateRatio', NewacetateL='$NewacetateL', 
            NewpaintL='$NewpaintL', sprayViscosity='$sprayViscosity', quantity='$quantity', 
            paintYield='$paintYield', acetateYield='$acetateYield', remarks='$remarks' 
            WHERE EntryID=$id";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Update customer table
            $sql = "UPDATE `tbl_customer` SET customer_name='$customer_name' WHERE customerID=$id";
            $result = mysqli_query($con, $sql);

            if ($result) {
                // Redirect to monitoring.php after successful update
                header('location: monitoring.php');
            } else {
                die(mysqli_error($con));
            }
        } else {
            die(mysqli_error($con));
        }
    } else {
        die(mysqli_error($con));
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>Paint-Acetate Data Entry</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

    <style>
        * {

            list-style: none;
            text-decoration: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Noto+Serif+Makasar';
        }

        body {
            background: white;
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
            margin-top: 0px;

        }

        .wrapper .section .top_navbar .hamburger a {
            font-size: 30px;
            color: black;
        }

        .wrapper .section .top_navbar .hamburger a:hover {
            color: rgb(7, 105, 185);
        }

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


        img {
            height: 50px;
            width: 50px;
            border-radius: 50%;

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

        /*MAIN CONTENT */

        .main1 {
            background-color: rgb(225, 225, 212);
            padding: 2%;
            padding-bottom: 0px;
            flex: 1 1 150px;
            margin-top: 20px;
            margin-left: 30px;
            height: 100%;


        }

        .left {

            background-color: rgb(31, 102, 234);
            padding: 3em 0 3em 0;
            flex: 1 1 100px;
            margin-left: auto;
            text-align: center;
            padding-left: 8%;




        }


        .main2 {
            display: flex;
            flex: 1;
            padding-top: 2%;
            padding-left: 2%;
            padding-right: 2%;
            height: 100%;

        }

        .right {
            background-color: rgb(31, 102, 234);
            padding: 3em 0 3em 0;
            flex: 1 1 100px;
            margin-right: auto;
            text-align: center;

        }

        footer {
            background-color: rgb(225, 225, 212);
            color: white;
            padding: 2em 0 2em 0;
            text-align: center;
            height: 100%;

        }



        label {
            color: white;
            text-align: center;


        }

        .input1 {
            width: 25%;
            height: 35px;
            margin-bottom: 20px;
            border-color: #86;
            border-radius: 5px;
        }

        .input2 {
            width: 27%;
            height: 35px;
            margin-bottom: 20px;
            border-color: #86;
            border-radius: 5px;
        }


        .selector1 {
            width: 25%;
            height: 35px;
            margin-bottom: 20px;
            border-color: #86;
            border-radius: 5px;
        }

        .selector2 {
            width: 27%;
            height: 35px;
            margin-bottom: 20px;
            border-color: #86;
            border-radius: 5px;
        }

        .newpaint {
            text-align: left;
            margin-left: 45px;
        }


        /*FOR UPDATE SUCCESSFUL */
        /* Customize modal styles */
        .custom-modal .modal-content {
            background-color: green;
            /* Background color */
            color: #fff;
            /* Text  color */
        }

        .custom-modal .modal-header {
            border-bottom: 1px solid #2c3e50;
            /* Border color for the header */
        }

        /*HEADER MODAL OF UPDATE */
        .center-modal-title {
            font-size: 30px;
            margin-left: 175px;
        }

        .custom-modal .modal-footer {
            border-top: 1px solid #2c3e50;
            /* Border color for the footer */
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

        /* FOR CLOCK */

        .clockcontainer {
            width: 295px;
            height: 180px;
            position: absolute;
            top: 95%;


        }

        .clock {

            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .clock span {
            font-size: 20px;
            width: 30px;
            display: inline-block;
            text-align: center;
            position: relative;
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
                    <option value="admin">
                        <?php echo $Username; ?>
                    </option>
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
            <form method="post">
                <input type="hidden" name="userID" value="<?php echo $id; ?>">
                <fieldset>
                    <div class="main1">
                        <div class="main2">

                            <aside class="left">
                                <legend style=" color:white; font-weight:bold; margin-left:48px;">Initial Inventory
                                </legend>
                                <br><br>

                                <div class="form-column">
                                    <label style="font-weight:bold; margin-left:48px;">Date:</label>
                                    <input type="date" style="text-align: center;" class="input1" name="date"
                                        autocomplete="off" value="<?php echo $date; ?>" required>
                                    <label style="margin-left:75px;">Diameter:</label>
                                    <input type="number" style="text-align: center;" class="input1" id="diameter" name="diameter"
                                        autocomplete="off" value="<?php echo $diameter; ?>" required>
                                </div>

                                <div class="form-column">
                                    <label style="margin-left:10px;">Paint Color:</label>
                                    <select name="paint_color" style="text-align: center;" class="selector1" required>
                                        <option value="">------ Select ------</option>
                                        <option value="Royal Blue" <?php if ($paint_color == 'Royal Blue')
                                            echo 'selected'; ?>>Royal Blue</option>
                                        <option value="Deft Blue" <?php if ($paint_color == 'Deft Blue')
                                            echo 'selected'; ?>>Deft Blue</option>
                                        <option value="Buff" <?php if ($paint_color == 'Buff')
                                            echo 'selected'; ?>>Buff
                                        </option>
                                        <option value="Golden Brown" <?php if ($paint_color == 'Golden Brown')
                                            echo 'selected'; ?>>Golden Brown</option>
                                        <option value="Clear" <?php if ($paint_color == 'Clear')
                                            echo 'selected'; ?>>Clear
                                        </option>
                                        <option value="White" <?php if ($paint_color == 'White')
                                            echo 'selected'; ?>>White
                                        </option>
                                        <option value="Black" <?php if ($paint_color == 'Black')
                                            echo 'selected'; ?>>Black
                                        </option>
                                        <option value="Alpha Gray" <?php if ($paint_color == 'Alpha Gray')
                                            echo 'selected'; ?>>Alpha Gray</option>
                                        <option value="Nile Green" <?php if ($paint_color == 'Nile Green')
                                            echo 'selected'; ?>>Nile Green</option>
                                        <option value="Emirald Green" <?php if ($paint_color == 'Emirald Green')
                                            echo 'selected'; ?>>Emirald Green</option>
                                        <option value="Jade Green" <?php if ($paint_color == 'Jade Green')
                                            echo 'selected'; ?>>Jade Green</option>
                                    </select>
                                    <label style="margin-left:90px;">Height:</label>
                                    <input type="number" style="text-align: center;" class="input1" id="height" name="height"
                                        autocomplete="off" value="<?php echo $height; ?>" required>
                                </div>

                                <div class="form-column">
                                    <label style="margin-left:26px;">Supplier:</label>
                                    <select name="supplier_name" style="text-align: center;" class="selector1" required>
                                        <option value="">------ Select ------</option>
                                        <option value="Nippon" <?php if ($supplier_name == 'Nippon')
                                            echo 'selected'; ?>>
                                            Nippon</option>
                                        <option value="Treasure Island" <?php if ($supplier_name == 'Treasure Island')
                                            echo 'selected'; ?>>Treasure Island</option>
                                        <option value="Inkote" <?php if ($supplier_name == 'Inkote')
                                            echo 'selected'; ?>>
                                            Inkote</option>
                                        <option value="Century" <?php if ($supplier_name == 'Century')
                                            echo 'selected'; ?>>
                                            Century</option>
                                    </select>
                                    <label style="margin-left:67px;">Paint ratio:</label>
                                    <input type="number" style="text-align: center;" class="input1" id="paintRatio" name="paintRatio"
                                        autocomplete="off" value="<?php echo $paintRatio; ?>" required>

                                </div>

                                <div class="form-column">
                                    <label style="margin-left:20px;">Batch No:</label>
                                    <input type="number" style="text-align: center;" class="input1" name="batchNumber"
                                        autocomplete="off" value="<?php echo $batchNumber; ?>" required>

                                    <label style="margin-left:50px;">Acetate ratio:</label>
                                    <input type="number" style="text-align: center;" class="input1" id="acetateRatio" name="acetateRatio"
                                        autocomplete="off" value="<?php echo $acetateRatio; ?>" required>
                                </div>
                                <br>
                                <div class="newpaint">
                                    <legend style=" color:white; font-weight:bold;margin-left:110px;">New Paint
                                        Mix&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Production
                                        Output</legend>


                                    <br><br>

                                    <label style="margin-left:40px;">Supplier:</label>
                                    <select name="newSupplier_name" style="text-align: center;" class="selector2"
                                        required>
                                        <option value="">------ Select ------</option>
                                        <option value="Nippon" <?php if ($newSupplier_name == 'Nippon')
                                            echo 'selected'; ?>>Nippon</option>
                                        <option value="Treasure Island" <?php if ($newSupplier_name == 'Treasure Island')
                                            echo 'selected'; ?>>Treasure Island</option>
                                        <option value="Inkote" <?php if ($newSupplier_name == 'Inkote')
                                            echo 'selected'; ?>>Inkote</option>
                                        <option value="Century" <?php if ($newSupplier_name == 'Century')
                                            echo 'selected'; ?>>Century</option>
                                    </select>
                                    <label style="margin-left:65px;">Customer:</label>
                                    <input type="text" style="text-align: center;" class="input2" name="customer_name"
                                        autocomplete="off" value="<?php echo $customer_name; ?>" required>
                                    <br>
                                    <label style="margin-left:38px;">Paint (L):</label>
                                    <input type="number" style="text-align: center;" class="input2" id="NewpaintL" name="NewpaintL"
                                        autocomplete="off" value="<?php echo $NewpaintL; ?>" required>
                                    <label style="margin-left:71px;">Quantity:</label>
                                    <input type="number" style="text-align: center;" class="input2" id="quantity" name="quantity"
                                        autocomplete="off" value="<?php echo $quantity; ?>" required>
                                    <br>
                                    <label style="margin-left:22px;">Acetate (L):</label>
                                    <input type="number" style="text-align: center;" class="input2" id="NewacetateL" name="NewacetateL"
                                        autocomplete="off" value="<?php echo $NewacetateL; ?>" required>
                                    <br>

                                    <label>Spay Viscosity:</label>
                                    <input type="number" style="text-align: center;" class="input2" id=""
                                        name="sprayViscosity" autocomplete="off" value="<?php echo $sprayViscosity; ?>"
                                        required>
                                    <br>
                                </div>
                            </aside>


                            <aside class="right">
                                <legend style=" color:white; font-weight:bold; margin-left:40px;">Ending Inventory
                                </legend>
                                <br><br>

                                <label style="margin-left:25px;">Diameter:</label>
                                <input type="number" style="text-align: center;" class="input1" id="Endingdiameter" name="Endingdiameter"
                                    autocomplete="off" value="<?php echo $Endingdiameter; ?>" required>
                                <br>

                                <label style="margin-left:39px;">Height:</label>
                                <input type="number" style="text-align: center;" class="input1" id="Endingheight" name="Endingheight"
                                    autocomplete="off" value="<?php echo $Endingheight; ?>" required>
                                <br>

                                <label style="margin-left:18px;">Paint ratio:</label>
                                <input type="number" style="text-align: center;" class="input1" id="EndingpaintRatio" name="EndingpaintRatio"
                                    autocomplete="off" value="<?php echo $EndingpaintRatio; ?>" required>
                                <br>
                                <label>Acetate ratio:</label>
                                <input type="number" style="text-align: center;" class="input1" id="EndingacetateRatio"
                                    name="EndingacetateRatio" autocomplete="off"
                                    value="<?php echo $EndingacetateRatio; ?>" required>
                                <br><br>


                                <div class="yield">
                                    <legend style=" color:white; font-weight:bold; margin-left:30px;">Yield</legend>


                                    <br><br>
                                    <label style="margin-left:50px;">Paint:</label>
                                    <input type="number" style="text-align: center;" class="input1" id="paintYield" name="paintYield"
                                        autocomplete="off" value="<?php echo $paintYield; ?>" required>
                                    <br>
                                    <label style="margin-left:35px;">Acetate:</label>
                                    <input type="number" style="text-align: center;" class="input1" id="acetateYield" name="acetateYield"
                                        autocomplete="off" value="<?php echo $acetateYield; ?>" required>
                                    <br>
                                </div>
                                <br><br>
                                <div class="remarks">
                                    <label style="margin-left:28px;">Remarks:</label>
                                    <input type="text" style="height:60px; text-align: center;" class="input1"
                                        name="remarks" autocomplete="off" value="<?php echo $remarks; ?>" required>

                                </div>
                            </aside>

                        </div>
                        <footer>
                            <button type="submit" id="update" class="btn btn-primary btn-lg" name="update"
                                style="font-size:20px; border-color:white; width:10%; padding-top:1%;padding-bottom:1%;">Update</button>
                            <button type="submit" id="add" class="btn btn-success btn-lg" name="add"
                                style="font-size:20px; border-color:white; width:10%; padding-top:1%;padding-bottom:1%;">Add</button>

                        </footer>

                    </div>
                </fieldset>
            </form>


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
                        <a href="monitoring.php">
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

                    <li>
                        <a href="update.php" style="display:none;">
                            <span class="icon"><i class="fa-regular fa-folder"></i></span>
                            <span class="item">Volume Update</span>
                        </a>
                    </li>

                </ul>

                <!--FOR CLOCK-->
                <div class="clockcontainer">
                    <div class="clock">
                        <span id="hrs"></span>
                        <span>:</span>
                        <span id="min"></span>
                        <span>:</span>
                        <span id="sec"></span>
                        <span id="ampm"></span>

                    </div>
                </div>

            </div>


        </div>


    </div>

    <!-- INSERT SUCCESS Modal -->
    <div class="modal fade custom-modal" id="updateSuccessModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title center-modal-title" id="exampleModalLabel">Congrats!!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 style="text-align:center;">Your Entry data has been added successfully!</h5>
                </div>
                <div class="modal-footer">
                    <a href="volume.php" class="btn btn-primary">OK</a>
                </div>
            </div>
        </div>
    </div>

    <!--FOR REAL-TIME DATA OF YIELD-->
    <script>
    // Add event listener to input fields for acetate yield
    document.querySelectorAll('input[name="NewacetateL"], input[name="quantity"]').forEach(function(input) {
        input.addEventListener('input', function() {
            updateYield();
        });
    });

    // Add event listener to input fields for paint yield
    document.querySelectorAll('input[name="NewpaintL"], input[name="quantity"]').forEach(function(input) {
        input.addEventListener('input', function() {
            updateYield();
        });
    });

    // Add event listener to input fields for acetate and paint yield when diameter, height, ratios change
    document.querySelectorAll('input[name="diameter"], input[name="height"], input[name="paintRatio"], input[name="acetateRatio"], input[name="Endingdiameter"], input[name="Endingheight"], input[name="EndingpaintRatio"], input[name="EndingacetateRatio"]').forEach(function(input) {
        input.addEventListener('input', function() {
            updateYield();
        });
    });

    function updateYield() {
        var formData = new FormData(document.querySelector('form'));
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "calculate_yield.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                document.querySelector('input[name="paintYield"]').value = response.paintYield;
                document.querySelector('input[name="acetateYield"]').value = response.acetateYield;
            }
        };
        xhr.send(formData);
    }
</script>


    <!-- FOR clickable image dropdown SCRIPT-->
    <script>
        function handleDropdownChange(select) {
            var selectedValue = select.value;

            if (selectedValue === "edit_profile") {
                // Redirect to the edit profile page
                window.location.href = "profile.php"; // Change the URL accordingly
            } else if (selectedValue === "logout") {
                // Redirect to the logout page
                window.location.href = "logout.php"; // Change the URL accordingly
            }
        }
    </script>


    <!--FOR CLOCK SCRIPT-->
    <script>
        let hrs = document.getElementById("hrs");
        let min = document.getElementById("min");
        let sec = document.getElementById("sec");
        let ampm = document.getElementById("ampm");

        setInterval(() => {
            let currentTime = new Date();
            let hours = currentTime.getHours();
            let period = "AM";

            if (hours >= 12) {
                period = "PM";
                if (hours > 12) {
                    hours -= 12;
                }
            }

            hrs.innerHTML = (hours < 10 ? "0" : '') + hours;
            min.innerHTML = (currentTime.getMinutes() < 10 ? "0" : '') + currentTime.getMinutes();
            sec.innerHTML = (currentTime.getSeconds() < 10 ? "0" : '') + currentTime.getSeconds();
            ampm.innerHTML = period;
        }, 1000)
    </script>


    <!--FOR SIDEBAR SCRIPT-->
    <script>
        var hamburger = document.querySelector(".hamburger");
        hamburger.addEventListener("click", function () {
            document.querySelector("body").classList.toggle("active");
        })
    </script>

    <!--FOR LOGOUT SCRIPT-->
    <script>
        // Show the logout modal when the logout button is clicked
        document.getElementById('logoutButton').addEventListener('click', function () {
            var myModal = new bootstrap.Modal(document.getElementById('logoutModal'));

            // Save the current selected value before showing the modal
            var select = document.querySelector('.dropdown');
            var currentSelectedValue = select.value;

            // Show the modal
            myModal.show();

            // Attach an event listener to handle modal dismissal
            myModal._element.addEventListener('hidden.bs.modal', function () {
                // Check if the user clicked "No" or closed the modal
                var selectedOption = document.querySelector('.dropdown option[value="admin"]');
                if (selectedOption) {
                    // Set the select option back to the default (admin)
                    selectedOption.selected = false;
                }
            });
        });
    </script>

    <!-- Check if the update was successful and trigger the modal -->
    <?php if (isset($updateSuccess) && $updateSuccess): ?>
        <script>
            $(document).ready(function () {
                $('#updateSuccessModal').modal('show');
            });
        </script>
    <?php endif; ?>

</body>

</html>