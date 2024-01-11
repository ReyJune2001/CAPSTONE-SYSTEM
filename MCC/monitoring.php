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
    width: calc(134% - 300px);
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

     


/* MOBILE, LAPTOP , PC RESPONSIVE */

@media only screen and (max-width: 1800px) {

.wrapper .section {
    width: 2000px;
    margin-left: 300px;

}

.container3 {
    padding-top:2px;
    padding-bottom:16px;
}
}

@media only screen and (max-width: 1800px) {
body.active .wrapper .section{
   
   width:2400px;
}
}


</style>
</head>
<body>
<div class="wrapper">
        <div class="section">
        <div class="admin_profile">
                  
                  <img src="IMAGES/sampleImage.jpg" class="img-admin" id="image">
                  
               <h4 style="margin-left:17px; font-size:22px; margin-top:13px; text-align:right;">Rey June</h4>
           
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
                <select name="Level" class="filterfield">
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
            <table style="width:100%;">
                
                  <tr>
                  <!--<th scope="col">#id</th>-->
    <th scope="col" rowspan="2" class="bg-primary"> Date </th>
    <th scope="col" colspan="5" class="bg-primary">Initial Inventory of Paint Mix</th>
    <th scope="col" colspan="4" class="bg-primary">New Paint Mix</th>
    <th scope="col" rowspan="2" class="bg-primary">Spray Viscocity</th>
    <th scope="col" colspan="2" class="bg-primary">Ending Inventory</th>
    <th scope="col" colspan="2" class="bg-primary">Total usage</th>
    <th scope="col" colspan="2" class="bg-danger">Production Output</th>
    <th scope="col" colspan="2" class="bg-success">Yield</th>
    <th scope="col" colspan="1" class="bg-warning">Equipment Parameter</th>
    <th scope="col" colspan="7" class="bg-warning">Spray Time (s)</th>
    <th scope="col" rowspan="2" class="bg-warning">Abnormalities Encountered others Remarks</th>
  </tr>

  <tr>
  <th class="bg-primary">Paint Color</th> <!--This is a  header column for Initial Inventory of Paint Mix-->
  <th class="bg-primary">Supplier</th> <!--This is a  header column for Initial Inventory of Paint Mix-->
  <th class="bg-primary">Batch Number</th> <!--This is a  header column for Initial Inventory of Paint Mix-->
  <th class="bg-primary">Paint(L)</th> <!--This is a  header column for Initial Inventory of Paint Mix-->
  <th class="bg-primary">Acetate(L)</th> <!--This is a  header column for Initial Inventory of Paint Mix-->
  
  <th class="bg-primary">Supplier</th> <!--This is a  header column of New Paint Mix-->
  <th class="bg-primary">Batch Number</th> <!--This is a  header column of New Paint Mix-->
  <th class="bg-primary">Paint(L)</th> <!--This is a  header column of New Paint Mix-->
  <th class="bg-primary">Acetate(L)</th> <!--This is a  header column of New Paint Mix-->
  
  <th class="bg-primary">Paint(L)</th> <!--This is a  header column of Ending Inventory-->
  <th class="bg-primary">Acetate(L)</th> <!--This is a  header column of Ending Inventory-->
  
  <th class="bg-primary">Paint(L)</th> <!--This is a  header column of Total usage-->
  <th class="bg-primary">Acetate(L)</th> <!--This is a  header column of Total usage-->
  
  <th class="bg-danger">Customer</th> <!--This is a  header column of Production output-->
  <th class="bg-danger">Quantity(Du)</th> <!--This is a  header column of Production output-->
  
  <th class="bg-success">Paint (Du'L)</th> <!--This is a  header column of yield-->
  <th class="bg-success">Acetate (Du'L)</th> <!--This is a  header column of yield-->
  
  <th class="bg-warning">Fluid pressure(psi)</th> <!--This is a  header column of Equipment parameter-->
  
  <th class="bg-warning">Nozzle<br>1</th> <!--This is a  header column of Spray time(s)-->
  <th class="bg-warning">Nozzle<br>2</th> <!--This is a  header column of Spray time(s)-->
  <th class="bg-warning">Nozzle<br>3</th> <!--This is a  header column of Spray time(s)-->
  <th class="bg-warning">Nozzle<br>4</th> <!--This is a  header column of Spray time(s)-->
  <th class="bg-warning">Nozzle<br>6</th> <!--This is a  header column of Spray time(s)-->
  <th class="bg-warning">Nozzle<br>9</th> <!--This is a  header column of Spray time(s)-->
  <th class="bg-warning">Nozzle<br>10</th> <!--This is a  header column of Spray time(s)-->
  </tr>
  
  <tr>
                <tbody>
                  <tr>
                    
                  <td class="paint-color-cell">01/08/24</td> 
                  <td>Clear</td> 
                  <td>Nippon</td> 
                  <td>010433</td> 
                  <td>12</td> 
                  <td>18</td>
                  <td>Treasure Island</td>
                  <td>010433</td>
                  <td>12</td> 
                  <td>18</td>
                  <td>1.38</td> 
                  <td>12</td>
                  <td>18</td> 
  
                  <td>34</td> 
                  <td>54</td> 
                  <td>pki</td> 
                  <td>24</td> 
                  <td>12</td> 
                  <td>18</td>
                  <td>12.2</td> 
                  <td>1</td> 
                  <td>2</td>

                  <td>3</td> 
                  <td>4</td> 
                  <td>6</td>
                  <td>9</td> 
                  <td>10</td> 
                  <td>Very Good</td>
                
                </tr>

                <tr>
                    
                  <td class="paint-color-cell">01/08/24</td> 
                  <td>Clear</td> 
                  <td>Nippon</td> 
                  <td>010433</td> 
                  <td>12</td> 
                  <td>18</td>
                  <td>Treasure Island</td>
                  <td>010433</td>
                  <td>12</td> 
                  <td>18</td>
                  <td>1.38</td> 
                  <td>12</td>
                  <td>18</td> 
  
                  <td>34</td> 
                  <td>54</td> 
                  <td>pki</td> 
                  <td>24</td> 
                  <td>12</td> 
                  <td>18</td>
                  <td>12.2</td> 
                  <td>1</td> 
                  <td>2</td>

                  <td>3</td> 
                  <td>4</td> 
                  <td>6</td>
                  <td>9</td> 
                  <td>10</td> 
                  <td>Very Good</td>
                
                </tr>

                <tr>
                    
                  <td class="paint-color-cell">01/08/24</td> 
                  <td>Clear</td> 
                  <td>Nippon</td> 
                  <td>010433</td> 
                  <td>12</td> 
                  <td>18</td>
                  <td>Treasure Island</td>
                  <td>010433</td>
                  <td>12</td> 
                  <td>18</td>
                  <td>1.38</td> 
                  <td>12</td>
                  <td>18</td> 
  
                  <td>34</td> 
                  <td>54</td> 
                  <td>pki</td> 
                  <td>24</td> 
                  <td>12</td> 
                  <td>18</td>
                  <td>12.2</td> 
                  <td>1</td> 
                  <td>2</td>

                  <td>3</td> 
                  <td>4</td> 
                  <td>6</td>
                  <td>9</td> 
                  <td>10</td> 
                  <td>Very Good</td>
                
                </tr>

                <tr>
                    
                  <td class="paint-color-cell">01/08/24</td> 
                  <td>Clear</td> 
                  <td>Nippon</td> 
                  <td>010433</td> 
                  <td>12</td> 
                  <td>18</td>
                  <td>Treasure Island</td>
                  <td>010433</td>
                  <td>12</td> 
                  <td>18</td>
                  <td>1.38</td> 
                  <td>12</td>
                  <td>18</td> 
  
                  <td>34</td> 
                  <td>54</td> 
                  <td>pki</td> 
                  <td>24</td> 
                  <td>12</td> 
                  <td>18</td>
                  <td>12.2</td> 
                  <td>1</td> 
                  <td>2</td>

                  <td>3</td> 
                  <td>4</td> 
                  <td>6</td>
                  <td>9</td> 
                  <td>10</td> 
                  <td>Very Good</td>
                
                </tr>

                <tr>
                    
                  <td class="paint-color-cell">01/08/24</td> 
                  <td>Clear</td> 
                  <td>Nippon</td> 
                  <td>010433</td> 
                  <td>12</td> 
                  <td>18</td>
                  <td>Treasure Island</td>
                  <td>010433</td>
                  <td>12</td> 
                  <td>18</td>
                  <td>1.38</td> 
                  <td>12</td>
                  <td>18</td> 
  
                  <td>34</td> 
                  <td>54</td> 
                  <td>pki</td> 
                  <td>24</td> 
                  <td>12</td> 
                  <td>18</td>
                  <td>12.2</td> 
                  <td>1</td> 
                  <td>2</td>

                  <td>3</td> 
                  <td>4</td> 
                  <td>6</td>
                  <td>9</td> 
                  <td>10</td> 
                  <td>Very Good</td>
                
                </tr>

                <tr>
                    
                  <td class="paint-color-cell">01/08/24</td> 
                  <td>Clear</td> 
                  <td>Nippon</td> 
                  <td>010433</td> 
                  <td>12</td> 
                  <td>18</td>
                  <td>Treasure Island</td>
                  <td>010433</td>
                  <td>12</td> 
                  <td>18</td>
                  <td>1.38</td> 
                  <td>12</td>
                  <td>18</td> 
  
                  <td>34</td> 
                  <td>54</td> 
                  <td>pki</td> 
                  <td>24</td> 
                  <td>12</td> 
                  <td>18</td>
                  <td>12.2</td> 
                  <td>1</td> 
                  <td>2</td>

                  <td>3</td> 
                  <td>4</td> 
                  <td>6</td>
                  <td>9</td> 
                  <td>10</td> 
                  <td>Very Good</td>
                
                </tr>

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
                                        <img src="IMAGES/sampleImage.jpg">
                                    </a>
                                </div>

                                 <h1 style="margin-top:20px;">Rey June</h1>

                                    <div id="update_profile">
                                    <a href="profile.php"><button class="btn btn-primary btn-lg" style="font-size:25px; margin-top:20px;">Update profile</button></a>
                                    </div>
                            </div>

                        </div>
                    </div>
                
                </div>
            </div>
        </div>


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
    var clickable_image = new bootstrap.Modal(document.getElementById('clickable_update'));
    clickable_image.show();
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
            var myModal = new bootstrap.Modal(document.getElementById('logoutModal'));
            myModal.show();
        });
    </script>
    
</body>
</html>