<?php 
session_start();
      
     if(!isset($_SESSION['username']))  //sends username to login.php if there is no username
     {
        header("location:login.php");
     }

     else if($_SESSION['usertype'] =='admin'){
        header("location:login.php");
       }

       $host="localhost";
       $user ="root";
       $password ="";
       $db="schoolproject";
     
       $conn = mysqli_connect($host,$user,$password,$db);

       $name=$_SESSION['username'];
       $sql="SELECT * FROM user WHERE username ='$name' ";

       $result=mysqli_query($conn,$sql);

       $info=mysqli_fetch_assoc($result);

       //submit button
       if(isset($_POST['update_profile'])){
           $email=$_POST['email'];
           $email=$_POST['phone'];
           $email=$_POST['password'];

           $sql2 = "UPDATE user SET email ='$email',phone='$phone', password='$password'
           WHERE username='$name' ";

           $result2=mysqli_query($conn,$sql2);

           if($result2){
            header('location:student_profile.php');
           }
       }

?>


<!DOCTYPE html>
<html lang="en">
<head class="header">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../admin.css">

      <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<style>
    .btn{
        text-align: center;
        margin-left:70px;
    }
    .profile{
        background-color: skyblue;
        width: 400px;
        padding-bottom: 70px;
        padding-top: 70px;
        border-radius: 10px;
        text-align: center;
        margin-left:350px ;
        margin-top:30px ;
    }
    .content{
        text-align:center;
    }
</style>
</head>
<body>
   
<?php 
  include'student_sidebar.php';
?>

    <div class="content">
        <h1>My Profile</h1>

      <div class="profile">
         <form action ="#" method="POST">

            <div>
                <label>Email</label>
                <input email="text" name="email" value="<?php  echo "{$info['email']}"?>"> 
            </div>

            <div>
                <label>Phone</label>
                <input number="text" name="phone" value="<?php  echo "{$info['phone']}"?>"> 
            </div>

             <div>
                <label>Password</label>
                <input type="password" name="password" value="<?php  echo "{$info['password']}"?>"> 
            </div>
            
            <div class="btn">
                <input class="btn btn-primary" type="submit" name="update_profile" value="submit"> 
            </div>

       </form>
        


    </div>
</body>
</html>