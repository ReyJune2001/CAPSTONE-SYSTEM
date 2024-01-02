<!--LOGIN PAGE (2)-->
<?php
$login_admin=0;
$login_user=0;
$invalid=0;

if ($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $Name = $_POST['Name'];
  $Password = $_POST['Password'];
  
 // Check if the login credentials match an admin account
 $admin_sql = "SELECT * FROM `user_admin_account` WHERE Name = '$Name' AND password = '$Password' AND Level = 'admin'";
 $admin_result = mysqli_query($con, $admin_sql);

 // Check if the login credentials match a user account
 $user_sql = "SELECT * FROM `user_admin_account` WHERE Name = '$Name' AND password = '$Password' AND Level = 'user'";
 $user_result = mysqli_query($con, $user_sql);


 if ($admin_result && mysqli_num_rows($admin_result) > 0) {
        // Admin login successful
        session_start();
        $_SESSION['Name'] = $Name;
        $login_admin = 1;
        header('location:dataEntry.php');
    } elseif ($user_result && mysqli_num_rows($user_result) > 0) {
        // User login successful
        session_start();
        $_SESSION['Name'] = $Name;
        $login_user = 1;
        header('location:mobile_dataEntry.php');
    } else {
        // Invalid credentials
        $invalid = 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    
    <!-- Bootstrap JavaScript link (popper.js is required) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-LFMJ0oUpaM3ZgZtnlqqA3F7l3Bo0IVwjt/4iz9o3fmmI9AXkFtfIIQcuxp1xZOz0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
 
    <title>Login page...</title>
    <style>
      *{
        font-family: 'Noto+Serif+Makasar';
      }


/*background image*/ 
.gradient-custom-3 {
  background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(IMAGES/background2.jpg);
  background-size: cover;
  
}

/*logo*/

.logo{
    position: absolute;
            top: 20px; /* Adjust the top position as needed */
            left: 20px; /* Adjust the left position as needed */
        
}
footer {
    
    color: black;
    padding-top:9px;
   
    text-align: center;
    
}

.card-body {
    background-color: rgba(255, 255, 255, 0.5); /* Adjust the alpha value for transparency */
    border-radius: 50px;
    
  }
  /*to change the color of my <p>*/
  .text-center.text-muted.mt-2 {
    color: white !important; /* Set the desired text color */
  }

  .text-body {
        color: white !important; /* Set the desired text color */
      }

  h1 {
        color:skyblue !important; /* Set the desired text color */
        margin-top:70px;
      }
  
  h2 {
        color:white !important; /* Set the desired text color */
       
  }

/*Input fields*/
.form-outline{
    margin-bottom:40px;
    margin-left:160px;
    padding-right:160px;
    

}
.input-group .input-group-text {
    border-radius: 50px; /* Apply border-radius to the span element containing the icon */
}
.input-group input.form-control {
    border-radius: 50px;
}

/*Login button*/
.btn{
    width: 300px;
    height: 45px; 
    font-size: 19px;
    border-radius:50px;
}

 /* Customize modal styles */
 .custom-modal .modal-content {
    background-color: red; /* Background color */
    color: #fff; /* Text color */
  }

  .custom-modal .modal-header {
    border-bottom: 1px solid #2c3e50; /* Border color for the header */
  }

  .custom-modal .modal-footer {
    border-top: 1px solid #2c3e50; /* Border color for the footer */
  }

    </style>
  </head>
  <body>

  <?php
   /* if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulations!</strong> You are successfully login.
</div>';
    }
?>*/ 
    
    if($invalid){
      // Trigger the modal using JavaScript
      echo '<script>
      document.addEventListener("DOMContentLoaded", function() {
          var myModal = new bootstrap.Modal(document.getElementById("usernameExistModal2"));
          myModal.show();
      });
    </script>';
    }
?>
   
   <!-- Pop-up Modal -->
<div class="modal fade custom-modal" id="usernameExistModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Error!!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Invalid Credentials.
            </div>
        </div>
    </div>
</div>

<section class="vh-100 bg-image">
    <!--For background image-->
    
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
   
  
  <!--For Logo-->
  <img src="IMAGES/logo.jpg" alt="Registration Image" width="100" height="50" class="logo">
  
  
    <div class="container h-100 pt-4 pb-0">
    <h1 class="text-center pt-5 mb-5">PAINT AND ACETATE YIELD MONITORING SYSTEM</h1>

      <div class="row d-flex justify-content-center align-items-center h-90">
      

      <div class="col-12 col-md-9 col-lg-7 col-xl-6">
      <h2 class="text-center mb-5">Good Day</h2>
          <div>
              <form action="login.php" method="post">
              <div class="form-outline">
                  <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control form-control-lg" placeholder="Username" name="Name" required />
                  </div>
                </div>


                <div class="form-outline">
                  <div class="input-group">
                 <span class="input-group-text"><i class="fas fa-lock"></i></span>
                 <input type="password" class="form-control form-control-lg" placeholder="Password" name="Password" required />
                 </div>
               </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary btn-lg text-body">Login</button>
                </div>
                
                <br>
                <p class="text-center text-muted mt-2">You don't have an account yet? <a href="index.php" class="fw-bold text-body"><u>Sign up here</u></a></p>
              </form>

            
          </div>
          <footer style="color:white;">
            Copyright © All rights reserved ~ MCC Internship 2023
          </footer>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>