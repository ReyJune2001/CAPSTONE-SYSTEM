<!--(1)-->

<?php
$success = 0;
$users = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $Level = mysqli_real_escape_string($con, $_POST['Level']);
    $Name = mysqli_real_escape_string($con, $_POST['Name']);
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
    $Password = mysqli_real_escape_string($con, $_POST['Password']);

    $sql = "SELECT * FROM `user_admin_account` WHERE Name = '$Name'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            // User already exists
            $users = 1;
        } else {
            // Insert the data into the database
            $sql = "INSERT INTO `user_admin_account` (Level, Name, Email, Password) VALUES ('$Level', '$Name', '$Email', '$Password')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                // Sign up successful
                $success = 1;
            } else {
                // Display error message
                die(mysqli_error($con));
            }
        }
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
   
    <title>Sign up page...</title>
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
        color: white !important; /* Set the desired text color */
        margin-top:70px;
      }

/*Input fields*/
.form-outline{
    margin-bottom:30px;
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
    height: 48px; 
    font-size: 20px;
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

    </style>
  </head>
  <body>
    
  <?php  //when the users is successfully sign up
    if($success){
    /*echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulations!</strong> You are successfully signup.
</div>';*/
header('location:login.php');
    }
?>
<?php //when the users is unsuccessfully sign up
    if($users){

     // Trigger the modal using JavaScript
    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById("usernameExistModal"));
        myModal.show();
    });
  </script>';
}
?>

<!-- Pop-up Modal -->
<div class="modal fade custom-modal" id="usernameExistModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Error!!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Your name or email is already taken. Please try again.
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
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
        <h1 class="text-center pt-5 mb-5">CREATE AN ACCOUNT</h1>
        
          

          <div>
              <form action="index.php" method="post">

               <!-- Add the following select option for choosing between "admin" and "user" -->
          <div class="form-outline">
                 <select name="Level" class="form-control-sm" required>
                   <option value="" disabled selected>Select Role</option>
                   <option value="admin">Admin</option>
                   <option value="user">User</option>
                 </select>
               </div>

                <div class="form-outline">
                  <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control form-control-lg" placeholder="Username" name="Name" required />
                  </div>
                </div>

                <div class="form-outline">
                  <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  <input type="email" class="form-control form-control-lg" placeholder="Email" name="Email" required />
                  </div>
                </div>

                <div class="form-outline">
                  <div class="input-group">
                 <span class="input-group-text"><i class="fas fa-lock"></i></span>
                 <input type="password" class="form-control form-control-lg" placeholder="Password" name="Password" required />
                 </div>
               </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary btn-lg text-body">Sign up</button>
                </div>
                <br>
                <p class="text-center text-muted mt-2">Have already an account? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>
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