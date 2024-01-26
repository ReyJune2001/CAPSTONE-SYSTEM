<!--FOR ADMIN PROFILE-->
<?php

 include 'connect.php';

 $id = 1;

 $sql="Select * from `tbl_user` where userID=$id";
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($result);

 /*TO FETCH THE DATA FROM DATABASE - */
 $Name=$row['Name']; /*column name in the database */
$Username=$row['Username'];
$Profile_image = $row['Profile_image'];
?>

<?php
   include 'connect.php';

// Fetch and check the data from the database using a JOIN query
/*
$sql = "SELECT
    paint.paint_color,
    supplier.supplier_name, supplier.newSupplier_name,
    customer.customer_name,entry.*
    FROM tbl_entry AS entry         /*target the table with foreign key*/
   /* LEFT JOIN tbl_paint AS paint ON entry.paintID = paint.paintID
    LEFT JOIN tbl_supplier AS supplier ON paint.supplierID = supplier.supplierID
    LEFT JOIN tbl_customer AS customer ON entry.customerID = customer.customerID";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

/* TO FETCH AND UPDATE THE DATA FROM DATABASE - */
/*$date = $row['date']; /*VARIABLE is equal to column name in the database
$paint_color = $row['paint_color'];
$supplier_name = $row['supplier_name'];
$batchNumber = $row['batchNumber'];
$diameter = $row['diameter'];
$height = $row['height'];
$paintRatio = $row['paintRatio'];
$acetateRatio = $row['acetateRatio'];
$newSupplier_name = $row['newSupplier_name'];
$NewacetateL = $row['NewacetateL'];
$NewpaintL = $row['NewpaintL'];
$sprayViscosity = $row['sprayViscosity'];
$customer_name = $row['customer_name'];
$quantity = $row['quantity'];
$Endingdiameter = $row['Endingdiameter'];
$Endingheight = $row['Endingheight'];
$EndingpaintRatio = $row['EndingpaintRatio'];
$EndingacetateRatio = $row['EndingacetateRatio'];
$paintYield = $row['paintYield'];
$acetateYield = $row['acetateYield'];
$remarks = $row['remarks'];
*/

//FOR INSERT DATA INTO DATABSE

$date = $paint_color = $supplier_name = $batchNumber = $diameter = $height = $paintRatio = $acetateRatio = $newSupplier_name =
$NewacetateL = $NewpaintL = $sprayViscosity = $customer_name = $quantity = $Endingdiameter = $Endingheight =
$EndingpaintRatio = $EndingacetateRatio = $paintYield = $acetateYield = $remarks = $DetailsID = $supplierID = $receiveID = $details = $receiver_name = '';

if (isset($_POST['submit'])) {
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

    // Insert into tbl_customer
    $sql = "INSERT INTO `tbl_customer` (customer_name, userID) VALUES ('$customer_name', '$id')";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    // Get the customerID of the newly inserted customer
    $customerID = mysqli_insert_id($con);

    // Insert into tbl_supplier
    $sql = "INSERT INTO `tbl_supplier` (supplier_name, newSupplier_name) VALUES ('$supplier_name', '$newSupplier_name')";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    // Get the supplierID of the newly inserted supplier
    $supplierID = mysqli_insert_id($con);

    // Insert into tbl_received
    $sql = "INSERT INTO `tbl_received` (userID, receiver_name) VALUES ('$id','$receiver_name')";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    // Get the receiveID of the newly inserted receive
    $receiveID = mysqli_insert_id($con);

    // Insert into tbl_receivedetails
    $sql = "INSERT INTO `tbl_receivedetails` (receiveID, details) VALUES ('$receiveID', '$details' )";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    // Get the DetailsID of the newly inserted Details
    $DetailsID = mysqli_insert_id($con);

    // Insert into tbl_paint
    $sql = "INSERT INTO `tbl_paint` (paint_color, supplierID, DetailsID) VALUES ('$paint_color', '$supplierID', '$DetailsID' )";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    // Get the paintID of the newly inserted paint
    $paintID = mysqli_insert_id($con);

    // Insert into tbl_entry
    $sql = "INSERT INTO `tbl_entry` (userID, customerID, paintID, date, batchNumber, diameter, height, paintRatio, acetateRatio, NewacetateL, NewpaintL, sprayViscosity, quantity, Endingdiameter, Endingheight, EndingpaintRatio, EndingacetateRatio, paintYield, acetateYield, remarks)
    VALUES ('$id', '$customerID', '$paintID', '$date', '$batchNumber', '$diameter', '$height', '$paintRatio', '$acetateRatio', '$NewacetateL', '$NewpaintL', '$sprayViscosity', '$quantity', '$Endingdiameter', '$Endingheight', '$EndingpaintRatio', '$EndingacetateRatio', '$paintYield', '$acetateYield', '$remarks')";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    // Get the EntryID of the newly inserted Entry
    $EntryID = mysqli_insert_id($con);
    
    /*
    $sql = "UPDATE `tbl_customer` SET customer_name='$customer_name' WHERE customerID=$customerID";

    $result = mysqli_query($con, $sql);
    if (!$result) {
        die(mysqli_error($con));
    }

    $sql = "UPDATE `tbl_supplier` SET supplier_name='$supplier_name',newSupplier_name='$newSupplier_name',  WHERE supplierID=$supplierID";

    $result = mysqli_query($con, $sql);
    if (!$result) {
        die(mysqli_error($con));
    }

    $sql = "UPDATE `tbl_paint` SET paint_color='$paint_color' WHERE paintID=$paintID";

    $result = mysqli_query($con, $sql);
    if (!$result) {
        die(mysqli_error($con));
    }

    $sql = "UPDATE `tbl_entry` SET date='$date',batchNumber='$batchNumber',diameter='$diameter',
    height='$height',paintRatio='$paintRatio',acetateRatio='$acetateRatio',
    NewacetateL='$NewacetateL',NewpaintL='$NewpaintL',sprayViscosity='$sprayViscosity',
    quantity='$quantity',Endingdiameter='$Endingdiameter',Endingheight='$Endingheight',
    EndingpaintRatio='$EndingpaintRatio',EndingacetateRatio='$EndingacetateRatio',paintYield='$paintYield',
    acetateYield='$acetateYield',remarks='$remarks' WHERE customerID=$customerID";

    $result = mysqli_query($con, $sql);
    if ($result) {
        $updateSuccess = true;
    } else {
        die(mysqli_error($con));
    } */
    if ($result) {
        $updateSuccess = true;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>Paint-Acetate Data Entry</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <style>
*{
    
    list-style: none;
    text-decoration: none;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Noto+Serif+Makasar';
}

body{
    background: white;
}

.wrapper .sidebar{
    background: rgb(5, 68, 104);
    position: fixed;
    top: 0;
    left: 0;
    width: 300px;
    height: 100%;
    padding: 20px 0;
    transition: all 0.5s ease;
}

.wrapper .sidebar .profile{
    margin-bottom: 30px;
    text-align: center;
}

.wrapper .sidebar .profile img{
    display: block;
    width: 110px;
    height: 110px;
    border-radius: 50%;
    margin: 0 auto;
}

.wrapper .sidebar .profile h3{
    color: #ffffff;
    margin: 15px 0 5px;
}

.wrapper .sidebar .profile p{
    color: rgb(206, 240, 253);
    font-size: 14px;
}

.wrapper .sidebar ul li a{
    display: block;
    padding: 13px 30px;
    border-bottom: 1px solid #10558d;
    color: rgb(241, 237, 237);
    font-size: 16px;
    position: relative;
    margin-right: 33px;
    text-decoration: none;
}

.wrapper .sidebar ul li a .icon{
    color: #dee4ec;
    width: 30px;
    display: inline-block;
}
.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
    color: #0c7db1;

    background:white;
    border-right: 2px solid rgb(5, 68, 104);
    
}

.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
    color: #0c7db1;
    
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
    display: block;
    
}

.wrapper .section{
    width: calc(100% - 300px);
    margin-left: 300px;
    transition: all 0.5s ease;
   
}

.wrapper .section .top_navbar{
    background: white;
    height: 2px;
    display: flex;
    align-items: center;
    padding: 0 30px;
    margin-top:20px;

}

.wrapper .section .top_navbar .hamburger a{
    font-size: 30px;
    color: black;
}

.wrapper .section .top_navbar .hamburger a:hover{
    color: rgb(7, 105, 185);
}
body.active .wrapper .sidebar{
    left: -300px;
}

body.active .wrapper .section{
    margin-left: 0;
    width: 100%;
}

/*USER PROFILE STYLES*/
.admin_profile{
    display:flex;
    justify-content:flex-end;
    margin-top:20px;
    margin-right:32px;
    
}

.img-admin {
    height: 55px;
    width: 55px;
    border-radius: 50%;
    border: 3px solid transparent; /* Set a default border style */
}
     

img{
    height: 50px;
    width: 50px;
    border-radius: 50%; 
    
}

  
  /*FOR ADMIN PROFILE MODAL */
.container{
   min-height: 50vh;
   background-color: var(--light-bg);
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
}

.container .profile{
   padding:20px;
   box-shadow: var(--box-shadow);
   text-align: center;
   width: 400px;
   border-radius: 5px;
   
}

.container .profile img{
   height: 160px;
   width: 160px;
   border-radius: 50%;
   object-fit: cover;
  
   
}

/*FOR UPDATE MODAL */

.container2{
   min-height: 40vh;
   
}

.container2 .profile2{
   box-shadow: var(--box-shadow);
   
   border-radius: 5px;
}

.container2 .profile2 .img2{
   Display: absolute;
   height: 180px;
   width: 180px;
   margin-left: 140px;
   margin-top:50px;
   border-radius: 50%;
   object-fit: cover;  
}

/*FOR UPDATE PROFILE */
.update-profile form .flex{
   display: flex;
   justify-content: space-between;
   margin-bottom: 20px;
   gap:15px;
}

.update-profile form .flex .inputBox{
   width: 50%;
   margin-top: 20px;
}

.update-profile form .flex .inputBox span{
   text-align: left;
   display: block;
   margin-top: 15px;
   font-size: 17px;
   color:var(--black);
}

.update-profile form .flex .inputBox .box{
   width: 100%;
   border-radius: 10px;
   padding:12px 14px;
   font-size: 17px;
   color:var(--black);
   margin-top: 10px;
}

/*FOR VOLUME TABLE CONTENT */

        
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
          text-align: center;
          
          color: black;
        }
        .date-cell {
        white-space: nowrap;
        }
        .paint-color-cell{
            white-space: nowrap;
        }

/*FOR TABLE CONTAINER */


    .container3, .container3-fluid, .container3-lg, .container3-md, .container3-sm, .container3-xl, .container3-xxl {
    --bs-gutter-x: 3.9rem;
    --bs-gutter-y: 0;
    width: 100%;
    padding-right: calc(var(--bs-gutter-x) * .5);
    padding-left: calc(var(--bs-gutter-x) * .5);
    margin-top:15px;
    margin-right: auto;
    margin-left: auto;
    background-color:rgb(225, 225, 212);
    
}

/*FOR SEARCH BAR */
.searchfield{
        width: 150px; 
        height:30px;
        margin-left:5px;
        background-color:rgb(225, 225, 212);
        border-color:#86b7fe;
        border-radius:5px;
        
        }

        /*FOR FILTER BAR */
        .filterfield{
        width: 150px; 
        height:30px;
        margin-left:5px;
        background-color:rgb(225, 225, 212);
        border-color:#86b7fe;
        border-radius:5px;
        }
        
        /*FOR SORT BAR */
        .sortfield{
        width: 150px; 
        height:30px;
        margin-left:5px;
        background-color:rgb(225, 225, 212);
        border-color:#86b7fe;
        border-radius:5px;
        }

  
        /*Operation Button */

        .btn_opt {
      display: flex;
      justify-content: flex-end;
      margin-top:50px;
      margin-right:32px;
    }

    /*MAIN CONTENT */

.main1{
            background-color: rgb(225, 225, 212);
            padding:5%;
            flex: 1 1 150px;
            margin-top:20px;
            margin-left:30px;
            height:50%;
            
    }

        .left{
           
            background-color:  rgb(31, 102, 234);
            padding: 3em 0 3em 0;
            flex: 1 1 100px;
            margin-left: auto;
            text-align:center;
            
 
        }
        .main2{
            display: flex;
            flex: 1;
            
            
        }

        .right{
            background-color:  rgb(31, 102, 234);
            padding: 3em 0 3em 0;
            flex: 1 1 100px;
            margin-right: auto;
            text-align:center;

        }
        footer{
            background-color:  rgb(31, 102, 234);
            color:white;
            padding: 2em 0 2em 0;
            text-align:right;
        }


        
        label{
            color:white;
            text-align:center;
           

        }

        input{
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

        .newpaint{
            text-align:left;
            margin-left:45px;
        }

        .operational_btn{
            margin-right:42%;
            padding-left:80px;
            padding-right:80px;
            padding-top:15px;
            padding-bottom:15px;
            font-size:50px;
        }


        /*FOR UPDATE SUCCESSFUL */
 /* Customize modal styles */
 .custom-modal .modal-content {
    background-color: green; /* Background color */
    color: #fff; /* Text  color */
  }

  .custom-modal .modal-header {
    border-bottom: 1px solid #2c3e50; /* Border color for the header */
  }

                /*HEADER MODAL OF UPDATE */
                .center-modal-title {
        font-size:30px;
        margin-left:175px;
    }

  .custom-modal .modal-footer {
    border-top: 1px solid #2c3e50; /* Border color for the footer */
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
    padding:10px;
    font-size: 20px;
    text-align: center;
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
        <option>&nbsp;Edit Profile&nbsp;</option>
        <option>Logout</option>
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
            <fieldset>
            <div class="main1">
            <div class="main2">
            
            <aside class="left">
            <legend style=" color:white; font-weight:bold;">Initial Inventory</legend>
            <br><br>
            
            <div class="form-column">
            <label style="font-weight:bold; margin-left:40px;">Date:</label>
            <input type="date" class="" name="date" autocomplete="off" value="<?php echo $date; ?>" required>
            <label style="margin-left:50px;">Diameter:</label>
         <input type="text" class="" name="diameter" autocomplete="off" value="<?php echo $diameter; ?>" required>
           </div>

           <div class="form-column">
            <label>Paint Color:</label>
         <select name="paint_color" class="selector" required>
         <option value="">-- Select --</option>
    <option value="Royal Blue" <?php if($paint_color == 'Royal Blue') echo 'selected'; ?>>Royal Blue</option>
    <option value="Deft Blue" <?php if($paint_color == 'Deft Blue') echo 'selected'; ?>>Deft Blue</option>
    <option value="Buff" <?php if($paint_color == 'Buff') echo 'selected'; ?>>Buff</option>
    <option value="Golden Brown" <?php if($paint_color == 'Golden Brown') echo 'selected'; ?>>Golden Brown</option>
    <option value="Clear" <?php if($paint_color == 'Clear') echo 'selected'; ?>>Clear</option>
    <option value="White" <?php if($paint_color == 'White') echo 'selected'; ?>>White</option>
    <option value="Black" <?php if($paint_color == 'Black') echo 'selected'; ?>>Black</option>
    <option value="Alpha Gray" <?php if($paint_color == 'Alpha Gray') echo 'selected'; ?>>Alpha Gray</option>
    <option value="Nile Green" <?php if($paint_color == 'Nile Green') echo 'selected'; ?>>Nile Green</option>
    <option value="Emirald Green" <?php if($paint_color == 'Emirald Green') echo 'selected'; ?>>Emirald Green</option>
    <option value="Jade Green" <?php if($paint_color == 'Jade Green') echo 'selected'; ?>>Jade Green</option>
         </select>
         <label style="margin-left:65px;">Height:</label>
         <input type="text" class="" name="height" autocomplete="off" value="<?php echo $height; ?>" required>
         </div>
        
         <div class="form-column">
         <label style="margin-left:15px;">Supplier:</label>
         <select name="supplier_name" class="selector" required>
         <option value="">-- Select --</option>
         <option value="Nippon" <?php if($supplier_name == 'Nippon') echo 'selected'; ?>>Nippon</option>
         <option value="Treasure Island" <?php if($supplier_name == 'Treasure Island') echo 'selected'; ?>>Treasure Island</option>
         <option value="Inkote" <?php if($supplier_name == 'Inkote') echo 'selected'; ?>>Inkote</option>
         <option value="Century" <?php if($supplier_name == 'Century') echo 'selected'; ?>>Century</option>
         </select>
         <label style="margin-left:32px; margin-right:12px;">Paint ratio:</label>
         <input type="text" class="" name="paintRatio" autocomplete="off" value="<?php echo $paintRatio; ?>" required>
         
         </div>

         <div class="form-column">
         <label style="margin-left:7px;">Batch No:</label>
         <input type="text" class="" name="batchNumber" autocomplete="off" value="<?php echo $batchNumber; ?>" required>
        
         <label style="margin-left:18px; margin-right:10px;">Acetate ratio:</label>
         <input type="text" class="" name="acetateRatio" autocomplete="off" value="<?php echo $acetateRatio; ?>" required>
        </div>
         <br>
         <div class="newpaint">
         <legend style=" color:white; font-weight:bold;margin-left:140px;">New Paint Mix&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Production Output</legend>
            
        
            <br><br>

            <label style="margin-left:40px;">Supplier:</label>
         <select name="newSupplier_name" class="selector" required>
         <option value="">-- Select --</option>
         <option value="Nippon" <?php if($newSupplier_name == 'Nippon') echo 'selected'; ?>>Nippon</option>
         <option value="Treasure Island" <?php if($newSupplier_name == 'Treasure Island') echo 'selected'; ?>>Treasure Island</option>
         <option value="Inkote" <?php if($newSupplier_name == 'Inkote') echo 'selected'; ?>>Inkote</option>
         <option value="Century" <?php if($newSupplier_name == 'Century') echo 'selected'; ?>>Century</option>
         </select>
         <label style="margin-left:65px;">Customer:</label>
         <input type="text" class="" name="customer_name" autocomplete="off" value="<?php echo $customer_name; ?>" required>
        <br>
         <label style="margin-left:38px;">Paint (L):</label>
         <input type="text" class="" name="NewpaintL" autocomplete="off" value="<?php echo $NewpaintL; ?>" required>
         <label style="margin-left:71px;">Quantity:</label>
         <input type="text" class="" name="quantity" autocomplete="off" value="<?php echo $quantity; ?>" required>
        <br>
         <label style="margin-left:23px;">Acetate (L):</label>
         <input type="text" class="" name="NewacetateL" autocomplete="off" value="<?php echo $NewacetateL; ?>" required>
         <br>

         <label>Spay Viscosity:</label>
         <input type="text" class="" name="sprayViscosity" autocomplete="off" value="<?php echo $sprayViscosity; ?>"required>
         <br>
    </div>
            </aside>
      
            
       <aside class="right">
       <legend style=" color:white; font-weight:bold; margin-left:30px;">Ending Inventory</legend>
            <br><br>

            <label style="margin-left:25px;">Diameter:</label>
         <input type="text" class="" name="Endingdiameter" autocomplete="off" value="<?php echo $Endingdiameter; ?>"required>
         <br>

         <label style="margin-left:39px;">Height:</label>
         <input type="text" class="" name="Endingheight" autocomplete="off" value="<?php echo $Endingheight; ?>"required>
         <br>
            
         <label style="margin-left:18px;">Paint ratio:</label>
         <input type="text" class="" name="EndingpaintRatio" autocomplete="off" value="<?php echo $EndingpaintRatio; ?>"required>
         <br>
         <label>Acetate ratio:</label>
         <input type="text" class="" name="EndingacetateRatio" autocomplete="off" value="<?php echo $EndingacetateRatio; ?>"required>
         <br><br>

         <div class="yield">
         <legend style=" color:white; font-weight:bold; margin-left:30px;">Yield</legend>
            
        
            <br><br>
         <label style="margin-left:50px;">Paint:</label>
         <input type="text" class="" name="paintYield" autocomplete="off" value="<?php echo $paintYield; ?>" required>
         <br>
         <label style="margin-left:35px;">Acetate:</label>
         <input type="text" class="" name="acetateYield" autocomplete="off" value="<?php echo $acetateYield; ?>" required>
         <br>
         </div>
         <br><br>
         <div class="remarks">
         <label style="margin-left:28px;">Remarks:</label>
         <input type="text" style="height:60px;" class="" name="remarks" autocomplete="off" value="<?php echo $remarks; ?>" required>
         
         </div>
       </aside>
       
    </div>
    <footer>
        <button type="submit" id="update" class="btn btn-success btn-lg operational_btn" name="submit" style="font-size:20px; border-color:white;">Add</button>
                               
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
                    <a href="dataEntry.php" class="active">
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
                    <a href="#" id="logoutButton">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="item">Logout</span>
                    </a>
                </li>
            </ul>
            
        </div>
        </div>

    </div>

        <!-- INSERT SUCCESS Modal -->
        <div class="modal fade custom-modal" id="updateSuccessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a href="dataEntry.php" class="btn btn-primary">OK</a>
                </div>
            </div>
        </div>
    </div>


     <!-- Logout Modal -->
     <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="login.php" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

<!-- FOR clickable image dropdown -->
<script>
    function handleDropdownChange(selectElement) {
        var selectedValue = selectElement.value;

        // Redirect based on the selected option
        switch (selectedValue) {
            case "edit_profile":
                // Replace 'edit_profile_url' with the actual URL for editing the profile
                window.location.href = 'profile.php';
                break;
            case "logout":
                // Replace 'logout_url' with the actual URL for logging out
                window.location.href = 'login.php';
                break;
            default:
                // Handle the default case or do nothing
                break;
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

    <!--FOR LOGOUT MODAL-->
    <script>
    // Show the logout modal when the logout button is clicked
        document.getElementById('logoutButton').addEventListener('click', function() {
            var myModal = new bootstrap.Modal(document.getElementById('logoutModal'));
            myModal.show();
        });
    </script>

    <!-- Check if the update was successful and trigger the modal -->
    <?php if (isset($updateSuccess) && $updateSuccess) : ?>
        <script>
            $(document).ready(function () {
                $('#updateSuccessModal').modal('show');
            });
        </script>
    <?php endif; ?>
    
</body>
</html>