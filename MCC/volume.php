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
    height: 50px;
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
h2{
    margin-left: 500px;
    color:black;
    border: 1px solid black;
    background: rgb(179, 209, 234);
    padding: 10px; 
    margin-top:0px;
    
}
/*MAIN CONTAIN STYLES*/
        .main{
            display: flex;
            flex: 1;
            margin-top:14px;
        }
        main{
            background-color: rgb(25, 142, 214);
            padding: 23em 0 22em 0;
            
            flex: 1 1 150px;

        }

/*USER PROFILE STYLES*/
.admin_profile{
    margin-left:86%;
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

        .tbl-container{
                     max-width: 500px;
                     max-height: 500px;
                     
        }
        .tbl-fixed{
                    overflow-x: scroll;
                    overflow-y: scroll;
                    height: fit-content;
                    max-height: 50vh;
                    margin-top: 40px;
        }
        
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
</style>
</head>
<body>
<div class="wrapper">
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>       
                    </a>
                    
                </div>
                <div class="admin_profile">
                <a href="#" id="image">
                <img src="IMAGES/sampleImage.jpg">
                
                </a>
                </div>

                <div><h4 style="margin-left:17px; font-size:22px; margin-bottom:2px;">Rey June</h4></div>
            </div>

            <!--MAIN CONTENT-->
    
            <div class="container tbl-container">
        <div class="row tbl-fixed">
            <table>
                <thead style="background: aqua;">
                  <tr>
                  <th scope="col" rowspan="2" class="bg-primary"> Date </th>
                  <th scope="col" colspan="12" class="bg-primary">Initial Inventory of Paint Mix</th>
                  <th scope="col" colspan="9" class="bg-warning">Ending Inventory</th>
                       
                  </tr>

                  <tr>
                  <th class="bg-primary">Paint<br>Color</th> 
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
                  <tr>
                    
                  <td class="paint-color-cell"><input type="text"></td> 
  <td><input type="text"></td> 
  <td><input type="text"></td> 
  <td><input type="text"></td> 
  <td><input type="text"></td> 
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td> 
  <td><input type="text"></td>
  <td><input type="text"></td> 
  <td><input type="text"></td>
  <td><input type="text"></td> 
  
  <td><input type="text"></td> 
  <td><input type="text"></td> 
  <td><input type="text"></td> 
  <td><input type="text"></td> 
  <td><input type="text"></td> 
  <td><input type="text"></td>
  <td><input type="text"></td> 
  <td><input type="text"></td> 
  <td><input type="text"></td>
  

  
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
                                        <button class="btn btn-primary btn-lg" style="font-size:25px; margin-top:20px;">Update profile</button>
                                    </div>
                            </div>

                        </div>
                    </div>
                
                </div>
            </div>
        </div>



        <!-- Clickable update_admin modal -->
        <div class="modal fade" id="clickable_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container2">

                            <div class="profile2">
                                <div class="admin_modal">
                                    <a href="#" id="image">
                                        <img src="IMAGES/sampleImage.jpg" class="img2">
                                    </a>
                                </div>



                                <div class="update-profile">
                                <form action="" method="post" enctype="multipart/form-data">
                                <div class="flex">
                                <div class="inputBox">
                                   <span></span>
                                   <input type="text" name="update_name" placeholder="Name" class="box">
                                   <span></span>
                                   <input type="email" name="update_email" placeholder="Email" class="box">
                                   <span></span>
                                   <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                                </div>
                                <div class="inputBox">
                                   <span></span>
                                   <input type="text" name="update_number" placeholder="Contact no." class="box">
                                   <input type="hidden" name="old_pass">
                                   <span></span>
                                   <input type="password" name="update_pass" placeholder="Old password" class="box">
                                   <span></span>
                                   <input type="password" name="new_pass" placeholder="New password" class="box">
                                   </div>
                             </div>
                             
                             <div class="modal-footer">
                             <button type="submit" class="btn btn-primary">Update</button>
                             <a href="volume.php" class="btn btn-danger">Back</a>
                            </div>
                            </form>

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