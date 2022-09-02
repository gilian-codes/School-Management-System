<?php 
//enables us to always login before direcrinf us to the admin page
session_start();
      
     if(!isset($_SESSION['username']))
     {
        header("location:login.php");
     }

     else if($_SESSION['usertype']=='student'){
     header("location:login.php");
    }

    $host="localhost";
    $user ="root";
    $password="";
    $db="schoolproject";

    $conn =mysqli_connect($host,$user,$password,$db);

    $id =$_GET['student_id'];

    $sql ="SELECT * FROM user WHERE id='$id'";

    $result=mysqli_query($conn,$sql);

    $info = $result->fetch_assoc();

    //UPDATE BUTTON
    if(isset($_POST['update'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $password=$_POST['matricule'];
        $email=$_POST['grade'];
        $email=$_POST['subject'];
        $email=$_POST['score'];
        $phone=$_POST['phone'];

        $query="UPDATE user SET username='$name',email='$email', phone='$phone',password='$password',matricule='$matricule',grade='$grade',subject='$subject',score='$score' WHERE id='$id'";

        $result2= mysqli_query($conn,$query);

        if($result2){
            header("location:http://localhost:8080/SCHOOL/view_student.php/");
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head class="header">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update_student</title>
    <link rel="stylesheet" href="../admin.css">

      <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<style>
    .update{
    background-color: skyblue;
    width: 400px;
    padding-bottom: 70px;
    padding-top: 70px;
    border-radius: 10px;
    text-align: center;
}
</style>

</head>
<body>

<?php 
   include'adminsidebar.php';
?>

    <div class="content">
        <h1>Update Student</h1>

        <div class="update">
            <form action="#" method="POST"> 
                <div>
                    <label>Username</label>
                    <input type ="text" name="name" value=<?php  echo "{$info['username']}";?>/>
                </div>
                
 
                <div>
                    <label>Email</label>
                    <input type ="email" name="email" value=<?php  echo "{$info['email']}";?>/>
                </div>

                <div>
                    <label>Phone</label>
                    <input type ="number" name="phone" value=<?php  echo "{$info['phone']}";?>/>
                </div>

                <div>
                    <label>Password</label>
                    <input type ="password" name="password" value=<?php  echo "{$info['password']}";?>/>
                </div>

                <div>
                    <label>Matricule</label>
                    <input type="text" name="matricule" value=<?php echo "{$info['matricule']}";?>/>
                </div>

                
                <div>
                    <label>Grade</label>
                    <input type ="number" name="grade" value=<?php  echo "{$info['grade']}";?>/>
                </div>

                
                <div>
                    <label>Subject</label>
                    <input type ="text" name="subject" value=<?php  echo "{$info['subject']}";?>/>
                </div>

                
                <div>
                    <label>Score</label>
                    <input type ="number" name="score" value=<?php  echo "{$info['score']}";?>/>
                </div>

                <div>
                    <input class="btn btn-success" type ="submit" name="update" value="Update">
                </div>
            </form>
        </div>
    </div>
</body>
</html>