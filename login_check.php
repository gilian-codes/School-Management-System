<?php 
session_start();
error_reporting(0);

//   connecting the login_check.php to the database
  $host="localhost";
  $user ="root";
  $password ="";
  $db="schoolproject";

  $conn = mysqli_connect($host,$user,$password,$db);


//checking if i am actually connected to the database 
 if($conn===false)
 {
    die("connection error");
 }

 //executes if someone clicks on the submit button
     if($_SERVER["REQUEST_METHOD"]=="POST"){
         $name = $_POST['username'];

         $pass = $_POST['password'];

          //gets the username and password
          $sql ="select * from user where username ='".$name."' AND password ='".$pass."'  ";

          //performs a query on the database
          $result = mysqli_query($conn,$sql);
          //fetches one row of data and returns the next row
          $row = mysqli_fetch_array($result);

          if($row["usertype"]=="admin"){
            $_SESSION['username']=$name;
            $_SESSION['usertype']="admin";
            header("location:http://localhost:8080/SCHOOL/adminhome.php/");
          }
 
         else if($row["usertype"]=="student"){
            $_SESSION['username']=$name;
            $_SESSION['usertype']="student";
            header("location:http://localhost:8080/SCHOOL/studenthome.php/");
            
          }

          else{  
           $message= "username or password do not match";

           $_SESSION['loginMessage']=$message;

           header("location:login.php");
          }
     }

?>