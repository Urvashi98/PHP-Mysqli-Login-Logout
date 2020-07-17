<?php 
    require_once 'config.php';
    
    $username = $password = $cofirmpass ='';
    $username_err=$password_err=$confirmpass_err ='';

    //check submit
    if(isset($_POST['register'])){

    

        if(isset($_POST['username']) && empty($_POST['username'])){
            $username_err = "Enter Username";
        }else{
          //  $username =$_POST['username'];
        }
        if(isset($_POST['password']) && empty($_POST['password'])){
            $password_err ="enter password";
        }else{
           // $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        }
        if(isset($_POST['confirm_password']) && empty($_POST['confirm_password'])){
            $confirmpass_err= "enter a password to confirm";
        }else{

            if($_POST['confirm_password'] != $_POST['password']){
                $confirmpass_err ='Password did not match!';
            }
        }    
        
        if(empty($username_err) && empty($password_err) && empty($confirmpass_err)){
           
            $usercheck= "SELECT * FROM logdetails WHERE name = :username";
           
            if($stmt = $pdo->prepare($usercheck)){

                $stmt->bindParam(':username',$username,PDO::PARAM_STR);
                $username = $_POST['username'];
               
                if($stmt->execute()){

                    if($stmt->rowCount() == 1){
                        
                        $username_err = "This username is already taken.";

                    } else {
                       
                        //echo "Registered.";
                        // make sure ':param_name' should not be repeated in queries , forex SELECT query used :username , using same for INSERT QUERY will not work.
                        $insert= "INSERT INTO logdetails(name,password) VALUES (:user,:pwd )";

                        //prepare statement
                        if($stmt = $pdo->prepare($insert)){

                            $stmt->bindParam(':user',$username,PDO::PARAM_STR);
                            $stmt->bindParam(':pwd',$password,PDO::PARAM_STR);

                            //set password
                         $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

                            //try to execute
                            if($stmt->execute()){
                                // Redirect to login page
                                header("location: login.php");
                            } else{
                                echo "Something went wrong. Please try again later.";
                            }

                        }else{
                            echo "insert failed.";
                        }
                        

                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

            }
           

            
        }
        
    }
 
?>
<html>
<head><title> REGISTER</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        .style{
        margin-left:5ex; margin-right:5ex;
      }
        .error { color: red; }
    </style>

</head>
<body>
<div class="container">
  <div class="row justify-content-center " style="margin-top:10em;">
    

        <div class="col-md-6 text-center">
            <div class="jumbotron jumbotron-fluid">
                       
                                        <h2>Sign Up</h2>
                            <p>Please fill this form to create an account.</p>
       

                <!--Registration Form -->

                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        
                        <div class="form-group style">
                            <input type="text" name="username" class="form-control" value="" placeholder="Enter Full Name" />
                            <span class="error"><?php echo $username_err; ?></span>
                        </div> 

                        <div class="form-group style">
                            <input type="password" name="password" class="form-control" value="" placeholder="Enter Password" /> 
                            <span class="error"><?php echo $password_err; ?></span>
                        </div> 

                        <div class="form-group style">
                                <input type="password" name="confirm_password" class="form-control" value="" placeholder="Enter Confirm Password" />
                                <span class="error"><?php echo $confirmpass_err; ?></span>
                        </div>
                        <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Register" name="register">
                                <input type="reset" class="btn btn-primary" value="Reset">
                        </div>

                        
                            
                        <p>Already have an account? <a href="login.php">Login</a>.</p>
                        
                        </form>
                        
                           
             </div>
      
        </div>
    </div>
</div>
  
</body>
</html>


