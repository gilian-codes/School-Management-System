<?php 
//enables us to always login before directing us to the admin page
error_reporting(0);
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

    $sql ="SELECT * FROM user WHERE usertype='student'";

    $result=mysqli_query($conn,$sql);

?>



<!DOCTYPE html>
<html lang="en">
<head class="header">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student</title>
    <link rel="stylesheet" href="../admin.css">

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<style type = "text/css">
    .table_th{
        padding:20px;
        font-size:20px;
    }
    .table_td{
    padding:20px;
    background-color: skyblue;
    }
    .all{
        text-align: center;
    }


</style>

</head>
<body>

<?php 
   include'adminsidebar.php';
?>

    <div class="content">  
        <h1>Student Data</h1>

        <?php 
        if($_SESSION['message']){
            echo $_SESSION['message'];
        }

        unset($_SESSION['message']);
        
        ?>

           <br>

        <div class ="all">

        <table border= 1px>
            <tr>
                <th class="table_th">Username</th>
                <th class="table_th">Email</th>
                <th  class="table_th">Phone</th>
                <th  class="table_th">Password</th>
                <th  class="table_th">Matricule</th>
                <th  class="table_th">Grade</th>
                <th  class="table_th">Subject</th>
                <th  class="table_th">Score</th>
                <th  class="table_th">Delete</th>
                <th  class="table_th">Update</th>
            </tr>

            <?php 
            while($info=$result->fetch_assoc())
            {  ?>

            <tr>
                <td class="table_td">
                    <?php  echo "{$info['username']}"?>
                </td>
                <td class="table_td">
                    <?php  echo "{$info['email']}"?>
                </td>
                <td class="table_td">
                    <?php  echo "{$info['phone']}"?>
                </td>
                <td class="table_td">
                    <?php  echo "{$info['password']}"?>
                </td>
                <td class="table_td">
                    <?php  echo "{$info['matricule']}"?>
                </td>
                <td class="table_td">
                    <?php  echo "{$info['grade']}"?>
                </td>
                <td class="table_td">
                    <?php  echo "{$info['subject']}"?>
                </td>
                <td class="table_td">
                    <?php  echo "{$info['score']}"?>
                </td>


                <td class="table_td">
                    <?php  echo " <a  onClick=\" javascript:return confirm('Are you sure you want to delete this'); \" 
                 class = 'btn btn-danger' href='http://localhost:8080/SCHOOL/delete.php/?student_id={$info['id']}'>Delete</a>"; ?>
                </td>

                <td class="table_td">
                    <?php  echo "<a class='btn btn-primary'href='http://localhost:8080/SCHOOL/update_student.php/?student_id={$info['id']}'> Update</a>";?>
                </td>
            </tr>

            <?php 
            }?>
         </table>
        </div>
    </div>
</body>
</html>