<?php 
//start the session
session_start();
require_once 'config.php';

$username =$pass= '';
$username_err=$password_err =$gen_err='';
if(isset($_POST['login'])){

  if(isset($_POST['username']) && empty($_POST['username'])){
      $username_err = "Enter Username";
  }
  if(isset($_POST['password']) && empty($_POST['password'])){
      $password_err ="Enter password";
  }

  if(empty($username_err) && empty($password_err)){
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $select = "SELECT * FROM logdetails WHERE name = '$username'";
    $result= mysqli_query($conn,$select);
  
    if(mysqli_num_rows($result)>0){

      $row= mysqli_fetch_assoc($result);
        $db_name= $row['name'];
        $db_pass = $row['password'];
       // $secure_pass = password_verify($pass,$db_pass);
        //echo $secure_pass;
       // echo $db_pass." ".$pass;  
    

      if(password_verify($pass,(string)$db_pass)){

        $_SESSION['user_name']= $username;
        $_SESSION['logged']=true;
        header("location: welcome.php");

      }else{
      
        $password_err ="Wrong Password";
      }

      

    }else{
     $gen_err='No user found! Register first..';
    }


  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>LOGIN</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .style{
        margin-left:5ex; margin-right:5ex;
      }
      .error { color: red; }
    </style>
  </head>
  <body>

  <div class="container">
    <div class="row justify-content-center">
    

        <div class="col-md-6 text-center">
            <div class="jumbotron jumbotron-fluid">
                       
                                        <h2>Login</h2>
                            <p>Please fill this form to login.</p>
       

                <!--Registration Form -->

                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        
                        <div class="form-group w-60 style" >
                            <input type="text" name="username" class="form-control" value="" placeholder="Enter Full Name" />
                            <span class="error"><?php echo $username_err; ?></span>
                        </div> 

                        <div class="form-group w-60 style">
                            <input type="password" name="password" class="form-control" value="" placeholder="Enter Password" /> 
                            <span class="error"><?php echo $password_err; ?></span>
                        </div> 

                        <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Login" name="login">
                                <input type="reset" class="btn btn-primary" value="Reset">
                        </div>

                        <span class="error"><?php echo $gen_err; ?></span>
                            
                        <p> Not Registered yet?<a href="Register.php">Register here</a>.</p>
                        
                        </form>
                        </div>
      
      </div>
  </div>
</div>

  </body>
</html>