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

<!--FOR FETCHING DATA FROM DATABASE-->
<?php
include 'connect.php';

// Fetch and check the data from the database using a JOIN query
$sql = "SELECT
    paint.paint_color,
    supplier.supplier_name,
    entry.*
    FROM tbl_entry AS entry
    LEFT JOIN tbl_paint AS paint ON entry.paintID = paint.paintID
    LEFT JOIN tbl_supplier AS supplier ON paint.supplierID = supplier.supplierID";

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
    <title>Paint-Acetate Volume</title>
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

.img-admin:hover {
    border-color: blue; /* Change the border color to red on hover */
    
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
        .crud{
          text-align: left;
          padding:5px;
        }

/*FOR TABLE CONTAINER */


.container3, .container3-fluid, .container3-lg, .container3-md, .container3-sm, .container3-xl, .container3-xxl {
    --bs-gutter-x: 3.9rem;
    --bs-gutter-y: 0;
    width: 100%;
    padding-right: calc(var(--bs-gutter-x) * .5);
    padding-left: calc(var(--bs-gutter-x) * .5);
    padding-bottom:15px;
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

      /*HEADER MODAL OF UPDATE */
    .center-modal-title {
        font-size:30px;
        margin-left:175px;
    }


/* MOBILE, LAPTOP , PC RESPONSIVE */

@media only screen and (max-width: 1525px) {

.wrapper .section {
    width: 1220px;
    margin-left: 300px;

}

.container3 {
    padding-top:2px;
    padding-bottom:16px;
}
}

@media only screen and (max-width: 1525px) {
body.active .wrapper .section{
   
   width:1220px;
}
}


</style>
</head>
<body>
<div class="wrapper">
        <div class="section">
        <div class="admin_profile">
                  
                   <img src="uploaded_image/<?php echo $Profile_image; ?>" class="img-admin" id="image">
                   
                <h4 style="margin-left:17px; font-size:22px; margin-top:13px; text-align:right;">
                <?php echo $Username; ?>
            </h4>
            
                </div>
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>       
                    </a>   
                </div>
                
                <!--Search bar-->
                <h4 style="font-size:25px; margin-top:5px; margin-left:20px;">Search</h4>
                <form method="post">
                
                <input type="text" name="search" class="searchfield">
                <button class="btn btn-primary btn-sm" name="submit">
                <i class="fas fa-search"></i>
            
               </button>
               </form>
                
                <!--Filter bar-->
                <h4 style="font-size:25px; margin-top:5px; margin-left:70px;">Filter</h4>
                <form action="#" method="post">
                <select name="" class="filterfield">
                   <option value="" disabled selected></option>
                   <option value="admin">Paint color</option>
                   <option value="user">Batch number</option>
                   <option value="admin">Pi</option>
                   <option value="user">Diameter</option>
                   <option value="admin">Height</option>
                   <option value="user">Conversion factor</option>
                   <option value="admin">Volume</option>
                   <option value="user">Paint ratio</option>
                   <option value="admin">Acetate ratio</option>
                   <option value="user">Paint Liter</option>
                   <option value="admin">Acetate Liter</option>
                   
                 </select>
                
                 <button class="btn btn-primary btn-sm"><i class="fa-solid fa-filter"></i></button>
                 
               </form>

               <!--Sort bar-->
               <h4 style="font-size:25px; margin-top:5px; margin-left:70px;">Sort</h4>
                <form action="#" method="post">
                <select name="Level" class="sortfield">
                   <option value="" disabled selected></option>
                   <option value="admin">Ascending</option>
                   <option value="user">Descending</option>
                   
                 </select>
                
                 <button class="btn btn-primary btn-sm"><i class="fa-solid fa-arrow-down-wide-short"></i></button>
               </form>
                    
               
            </div>
            

            <!-- Operation Button -->

            <div class="btn_opt">
                <button class="btn btn-primary">Save report <i class="fa-solid fa-bookmark"></i></button>
                <button class="btn btn-primary" style="margin-left:10px;">Data entry <i class="fa-solid fa-plus-minus"></i></button>
            
            </div>


            <!--MAIN CONTENT-->
    
            <div class="container3 target">
            <table class="table table-striped">
            <table style="width: calc(100%);">
                
                  <tr>
                  <th scope="col" rowspan="2" class="bg-primary"> Date </th>
                  <th scope="col" colspan="12" class="bg-primary" style="padding-top:20px; padding-bottom:20px; font-size:20px;">Initial Inventory of Paint Mix</th>
                  <th scope="col" colspan="9" class="bg-warning" style="font-size:20px;">Ending Inventory</th>
                  <th scope="col" rowspan="2">Operation</th>   
                  </tr>

                  <tr>
                  <th class="bg-primary">Paint Color</th> 
                  <th class="bg-primary">Supplier</th>
                  <th class="bg-primary">Batch Number</th> 
                  <th class="bg-primary">Pi</th> 
                  <th class="bg-primary">Diameter</th> 
                  <th class="bg-primary">Height</th> 
                  <th class="bg-primary">Conversion Factor</th> 
                  <th class="bg-primary">Volume</th>
                  <th class="bg-primary">Paint Ratio</th> 
                  <th class="bg-primary">Acetate Ratio</th> 
                  <th class="bg-primary">Paint (L)</th> 
                  <th class="bg-primary">Acetate (L)</th>
  
                  <th class="bg-warning">Pi</th> 
                  <th class="bg-warning">Diameter</th> 
                  <th class="bg-warning">Height</th> 
                  <th class="bg-warning">Conversion Factor</th> 
                  <th class="bg-warning">Volume</th> 
                  <th class="bg-warning">Paint Ratio</th> 
                  <th class="bg-warning">Acetate Ratio</th> 
                  <th class="bg-warning">Paint (L)</th> 
                  <th class="bg-warning">Acetate (L)</th>
                  </tr>
                </thead>
                <tbody>

                <?php
            // Loop through the results and display data in the table
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr class='edit-row' data-entry-id='{$row['EntryID']}' data-date='{$row['date']}' data-paint-color='{$row['paint_color']}'
                data-supplier-name='{$row['supplier_name']}' data-batch-number='{$row['batchNumber']}' data-diameter='{$row['diameter']}'
                data-height='{$row['height']}' data-paint-ratio='{$row['paintRatio']}' data-acetate-ratio='{$row['acetateRatio']}' 
                data-endingdiameter='{$row['Endingdiameter']}' data-endingheight='{$row['Endingheight']}' data-endingpaintratio='{$row['EndingpaintRatio']}'
                data-endingacetateratio='{$row['EndingacetateRatio']}'>";
                echo "<td class='date-cell'>{$row['date']}</td>";
                echo "<td>{$row['paint_color']}</td>";
                echo "<td>{$row['supplier_name']}</td>";
                echo "<td>{$row['batchNumber']}</td>";
                echo "<td style='color:blue;'>3.1416</td>";
                echo "<td>{$row['diameter']}</td>";
                echo "<td>{$row['height']}</td>";
                echo "<td style='color:blue;'>0.5263526</td>";
                echo "<td style='color:blue;'>104.3</td>";
                echo "<td>{$row['paintRatio']}</td>";
                echo "<td>{$row['acetateRatio']}</td>";
                echo "<td style='color:blue;'>22.2</td>";
                echo "<td style='color:blue;'>25.3</td>";
                echo "<td style='color:red;'>3.1416</td>";
                echo "<td>{$row['Endingdiameter']}</td>";
                echo "<td>{$row['Endingheight']}</td>";
                echo "<td style='color:red;'>0.0163871</td>";
                echo "<td style='color:red;'>50.0</td>";
                echo "<td>{$row['EndingpaintRatio']}</td>";
                echo "<td>{$row['EndingacetateRatio']}</td>";
                echo "<td style='color:red;'>25.5</td>";
                echo "<td style='color:red;'>25.5</td>";
                echo "<td class='crud'><div style='display: flex; gap: 10px;'>
                <button class='btn btn-info text-light editbtn'>Update</button>
                <button class='btn btn-danger confirm_dltbtn' data-entry-id='{$row['EntryID']}'>Delete</button>
                </div></td>";
                
                // Add more table data based on your columns
                echo "</tr>";

                // Save data from the current row for later use in the modal
         $id = $row['EntryID'];
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
         
            }
            ?>   
            
            <!--########################################################################################-->
           <!--Update data modal-->

     <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header" style="background-color: #337ab7; color: white;">
                    <h5 class="modal-title center-modal-title">UPDATE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
        <form method="post" action="volume-update.php" id="updateForm">
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
    <option value="Royal Blue" <?php if($paint_color == "Royal Blue") echo "selected"; ?>>Royal Blue</option>
    <option value="Deft Blue" <?php if($paint_color == "Deft Blue") echo "selected"; ?>>Deft Blue</option>
    <option value="Buff" <?php if($paint_color == "Buff") echo "selected"; ?>>Buff</option>
    <option value="Golden Brown" <?php if($paint_color == "Golden Brown") echo "selected"; ?>>Golden Brown</option>
    <option value="Clear" <?php if($paint_color == "Clear") echo "selected"; ?>>Clear</option>
    <option value="White" <?php if($paint_color == "White") echo "selected"; ?>>White</option>
    <option value="Black" <?php if($paint_color == "Black") echo "selected"; ?>>Black</option>
    <option value="Alpha Gray" <?php if($paint_color == "Alpha Gray") echo "selected"; ?>>Alpha Gray</option>
    <option value="Nile Green" <?php if($paint_color == "Nile Green") echo "selected"; ?>>Nile Green</option>
    <option value="Emirald Green" <?php if($paint_color == "Emirald Green") echo "selected"; ?>>Emirald Green</option>
    <option value="Jade Green" <?php if($paint_color == "Jade Green") echo "selected"; ?>>Jade Green</option>
         </select>
        
         <label>Supplier:</label>
         <select name="supplier_name" id="supplier_name"  required>
         <option value="">-- Select --</option>
         <option value="Nippon" <?php if($supplier_name == "Nippon") echo "selected"; ?>>Nippon</option>
         <option value="Treasure Island" <?php if($supplier_name == "Treasure Island") echo "selected"; ?>>Treasure Island</option>
         <option value="Inkote" <?php if($supplier_name == "Inkote") echo "selected"; ?>>Inkote</option>
         <option value="Century" <?php if($supplier_name == "Century") echo "selected"; ?>>Century</option>
         </select>
         <br><br>
         <label>Batch #:</label>
         <input type="text" class="form-control" name="batchNumber" id="batchNumber" autocomplete="off" required
         value="<?php echo $batchNumber; ?>">
        <br>
       
         <label>Diameter:</label>
         <input type="text" class="form-control" name="diameter" id="diameter" autocomplete="off" 
         value="<?php echo $diameter; ?>">
        <br>
         <label>Height:</label>
         <input type="text" class="form-control" name="height" id="height" autocomplete="off" 
         value="<?php echo $height; ?>">
        <br>
         <label>Paint ratio:</label>
         <input type="text" class="form-control" name="paintRatio" id="paintRatio" autocomplete="off" 
         value="<?php echo $paintRatio; ?>">
        <br>
         <label>Acetate ratio:</label>
         <input type="text" class="form-control" name="acetateRatio" id="acetateRatio" autocomplete="off" 
         value="<?php echo $acetateRatio; ?>">
  
        </fieldset>
        <br><br>

    <fieldset>
    <legend style="color:blue;font-weight:bold;">Ending Inventory:</legend><br><br>


    <label>Diameter:</label>
    <input type="text" class="form-control" name="Endingdiameter" id="Endingdiameter" autocomplete="off" 
    value="<?php echo $Endingdiameter; ?>">
   <br>
    <label>Height:</label>
    <input type="text" class="form-control" name="Endingheight" id="Endingheight" autocomplete="off" 
    value="<?php echo $Endingheight; ?>">
     <br>
    <label>Paint ratio:</label>
    <input type="text" class="form-control" name="EndingpaintRatio" id="EndingpaintRatio" autocomplete="off" 
    value="<?php echo $EndingpaintRatio; ?>">
    <br>
    <label>Acetate ratio:</label>
    <input type="text" class="form-control" name="EndingacetateRatio" id="EndingacetateRatio" autocomplete="off" 
    value="<?php echo $EndingacetateRatio; ?>">
   
    </fieldset>
    <br><br>

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
                    <a href="volume.php" class="active">
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


    <!--###################################################################################################-->
     <!-- Delete Modal -->

<div class="modal" id="deletemodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: red; color: white;">
                <h5 class="modal-title center-modal-title">DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="volume-delete.php" method="post">
                
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
        var paint_color = row.data('paint-color');
        var supplier_name = row.data('supplier-name');
        var batchNumber = row.data('batch-number');
        var diameter = row.data('diameter');
        var height = row.data('height');
        var paintRatio = row.data('paint-ratio');
        var acetateRatio = row.data('acetate-ratio');
        var Endingdiameter = row.data('endingdiameter');
        var Endingheight = row.data('endingheight');
        var EndingpaintRatio = row.data('endingpaintratio');
        var EndingacetateRatio = row.data('endingacetateratio');
       
        console.log(date);
        console.log(paint_color);
        console.log(supplier_name);
        console.log(batchNumber);
        console.log(diameter);
        console.log(height);
        console.log(paintRatio);
        console.log(acetateRatio);
        console.log('Endingdiameter:', Endingdiameter);
console.log('Endingheight:', Endingheight);
console.log('EndingpaintRatio:', EndingpaintRatio);
console.log('EndingacetateRatio:', EndingacetateRatio);


        $('#editmodal #update_id').val(userID);
        $('#editmodal #date').val(date);
        $('#editmodal #paint_color').val(paint_color);
        $('#editmodal #supplier_name').val(supplier_name);
        $('#editmodal #batchNumber').val(batchNumber);
        $('#editmodal #diameter').val(diameter);
        $('#editmodal #height').val(height);
        $('#editmodal #paintRatio').val(paintRatio);
        $('#editmodal #acetateRatio').val(acetateRatio);
        $('#editmodal #Endingdiameter').val(Endingdiameter);
        $('#editmodal #Endingheight').val(Endingheight);
        $('#editmodal #EndingpaintRatio').val(EndingpaintRatio);
        $('#editmodal #EndingacetateRatio').val(EndingacetateRatio);
       

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


<!--FOR clickable image modal-->
<script>
   document.getElementById('image').addEventListener('click', function(){
    var clickable_image = new bootstrap.Modal(document.getElementById('clickable_image'));
    clickable_image.show();
   })
  </script>

  <!--FOR clickable update_admin modal-->
<script>
   document.getElementById('update_profile').addEventListener('click', function(){
    var clickable_admin_modal = new bootstrap.Modal(document.getElementById('clickable_update'));
    clickable_admin_modal.show();
   })
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
            var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
            logoutModal.show();
        });
    </script>
    
</body>
</html>