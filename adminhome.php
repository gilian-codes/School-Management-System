<?php 
//enables us to always login before directing us  to the admin page
session_start();
      
     if(!isset($_SESSION['username']))
     {
        header("location:login.php");
     }

     else if($_SESSION['usertype']=='student'){
     header("location:login.php");
    }
?>



<!DOCTYPE html>
<html lang="en">
<head class="header">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../admin.css">

      <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>

<?php 
   include'adminsidebar.php';
?>

    <div class="content">
        <h1>Admin Dashboard</h1>
    </div>
</body>
</html>