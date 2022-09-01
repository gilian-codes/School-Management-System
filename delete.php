<?php 
session_start();
 
 $host ="localhost";
 $user ="root";
 $password="";
 $db="schoolproject";

 $conn =mysqli_connect($host,$user,$password,$db);

if($_GET['student_id']){

    $user_id=$_GET['student_id'];

    $sql = "DELETE FROM user WHERE id='$user_id' ";

    $result=mysqli_query($conn,$sql);

    if($result){
        $_SESSION['message'] ='Delete Student is successful';
        header("location:http://localhost:8080/SCHOOL/view_student.php/");
    }
}







?>