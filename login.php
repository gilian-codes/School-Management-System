<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">

      <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body background="img/school_chrome.jpg" class="login_body">
    
<!-- <div class="login_form" > -->
    <div class="form_deg">
    <div class="login_Title"><h3>Login Form </h3></div>
         
        <!-- //displays the error -->
        <h4>
            <?php   
            error_reporting(0);
            session_start(); //prints the error message on the browser
            echo $_SESSION['loginMessage'];
            session_destroy();
             ?>
         </h4>

    </div>
        <form action="login_check.php" method="POST" class="login_form">
            <div>
                <label class="label_deg">username </label>
                <input type="text" name="username">
            </div>

            <div>
                <label class="label_deg">password </label>
                <input type="password" name="password" >
            </div>
             
            <div>
                <input class="btn btn-primary" type="submit" name="submit" value="Login">
            </div>
        </form>
    </div>
<!-- </div>  -->
</body>
</html>