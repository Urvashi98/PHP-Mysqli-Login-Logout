<?php 

session_start();

$username = $_SESSION['user_name'];
$logged =  $_SESSION['logged'];
if(!isset($username) && !isset($logged)){

    echo 'login first';
}

?>
    <!doctype html>
    <html lang="en">
      <head>
        <title>Index</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         <!-- fFont Awesome CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
      <body>
          
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="jumbotron">
                        <h1 class="display-3"><i class="fa fa-home  " aria-hidden="true"></i>WELCOME!</h1>
                        <p class="lead">Hello, Sucessful Login of the User : <b style="font-size:4ex;"><?php echo $username;?></b></p>
                        <hr class="my-5">
                        <p>Hope you enjoyed this tutorial!! To get the entire code <a href="#">Press Here</a></p>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="logout.php" role="button">Logout</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>






       
      </body>
    </html>
