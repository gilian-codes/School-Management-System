<?php 
//enables us to always login before direcrinf us to the admin page
session_start();
      
     if(!isset($_SESSION['username']))
     {
        header("location:login.php");
     }

     else if($_SESSION['usertype'] =='student'){
     header("location:login.php");
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="schoolproject";

    $conn = mysqli_connect($host,$user,$password,$db);


    if(isset($_POST['add_student']))
    {
              $username=$_POST['name'];
              $user_email=$_POST['email'];
              $user_phone=$_POST['phone'];
              $user_password=$_POST['password'];
              $usertype="student";

              //if the user name exist or not
              $check = "SELECT * FROM user WHERE username ='{$username}'";

              $check_user = mysqli_query($conn,$check);

              $row_count=mysqli_num_rows($check_user);

              if($row_count>0){
                echo "<script type='text/javascript'>
                alert('Username already exist, try another one');
                </script>";
              }

                 else {
        
                 $sql="INSERT INTO user(username,email,phone,usertype,password) VALUES ('$username','$user_email','$user_phone','$usertype','$user_password')";

                 $result = mysqli_query($conn,$sql);

                 if($result){
                    echo "<script type='text/javascript'>
                    alert('Data uploaded successfully');
                    </script>";
                   } else{
                       echo"upload failed";
                    }
            
               } //end of else in line 40
            
    }    

?>

<!DOCTYPE html>
<html lang="en">
<head class="header">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-student</title>
    <link rel="stylesheet" href="../admin.css">

      <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<style>
    .content {
    background-color: skyblue;
    width: 400px;
    padding-bottom: 70px;
    padding-top: 50px;
    border-radius: 10px;
    text-align: center;
    margin-left:500px;
    margin-top:50px;
    }
    .content-h1{
        text-align: center; 

        margin-top:70px;
    }
</style>

</head>
<body>

<?php 
   include'adminsidebar.php';
?>

<div class="div_deg">
    <div class="content-h1">
        <h1>Add Student</h1>

        <div class="content" >
            <form action ="#" method="POST">
                <div>
                    <label>Username</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div>
                    <label>Phone</label>
                    <input type="number" id="phone" name="phone" required>
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" id="password" name="password" minlength="8" required>
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="add_student" value="Add Student">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>