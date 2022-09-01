<?php 

require('Add_Form.php');
if(isset($_POST['apply'])){
  //validate the form
  //echo 'form submitted';

  //validate entries
  $validation = new Uservalidator($_POST);
  $errors = $validation->validateForm();




}


  //save data to the database
  session_start();

$host="localhost";
$user = "root";
$password="";
$db="schoolproject";


$conn =mysqli_connect($host,$user,$password,$db);

if($conn === false){
    die("connection error");
} else{
    if(isset($_POST['apply'])){
        $data_name =$_POST['name'];
        $data_email =$_POST['email'];
        $data_phone =$_POST['phone'];
        $data_message =$_POST['message'];
    
        $sql="INSERT INTO admission(name,email,phone,message) VALUES('$data_name','$data_email','$data_phone','$data_message')";
     
        $result =mysqli_query($conn,$sql);    
  

      }
    }

    // if($result){
    //     $_SESSION['message']="Application sent successfully";
    //     header("location:http://localhost:8080/SCHOOL/");
    // }else{
    //     echo 'Apply failed';
    // }


// error_reporting(0);
// session_start();
// session_destroy();

// if($_SESSION['message'])
// {
//   $message= $_SESSION['message'];

//   // echo "<script type='text/javascript'> 
//   // alert($message);
//   // </script>";
// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCHOOL MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="style.css">

   <!-- CSS only-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<style>
  .error{
    color: red;
  }
</style>

</head>
<body>
    

  <!-- NAV BAR -->
  <nav>
    <label class="logo">G-Tech</label>

    <ul>
      <li><a href="">Home</a></lddi> 
      <li><a href="">Contact</a></li> 
      <li><a href="">Admission</a></li> 
      <li><a href="http://localhost:8080/SCHOOL/login.php" class ="btn btn-success">Login</a></li> 
    </ul>

  </nav>


  <div class="section1">
    <div class="h3">Welcome to G-Tech school</div>

    <label class="img_text"> 
        
          <h3> One School One System</h3> 
          <h5> We teach students with care </h5>    
   </label>

   <img class ="main_img"src="img/school_management.jpg">
  </div>

 <div class="container">
  <div class="row">
    <div class="col-md-4">
     <img  class ="welcome_img"src ="img/school2.jpg">
    </div>

    <div class="col-md-8">
      <h1>About Us</h1>
      <p> Our mission is to power the education ecosystem with unified technology that helps educators and students realize their full potential in their own way. With more than two decades of experience delivering innovative, best-in-class education technology, we connect students, teachers, administrators, and parents, with the shared goal of improving student outcomes.</p>
      <p>From the office to the classroom to the home, we help schools and districts efficiently manage state reporting and related compliance, special education, finance, human resources, talent, enrollment, attendance, funding, learning, instruction, grading, assessments, and analytics all in one unified platform.</p>
    </div>

  </div>
 </div>

<div class="teachers">
      <h1>Our Teachers</h1>
</div>

  <div class="row">
    <div class="col-md-4">
        <img class="teacher1" src="img/teacher1.jpg">
        <p class ="p">My aim is to impact students with more knowledge.</p>
    </div>

    <div class="col-md-4">
        <img  class="teacher" src="img/teacher2.jpg">
        <p class ="p">My aim is to impact students with more knowledge.</p>
      </div>

      <div class="col-md-4">
      <img  class="teacher" src="img/teacher3.jpg">
      <p class ="p"> My aim is to impact students with more knowledge.</p>
      </div>
  </div>
  

 <div class ="Add-form">
    <h1>Admission Form</h1>
 </div>

 <div class="admission_form">

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

   <div class="adm_int">
     <label class="label_text">Name</label>
     <input class="input_deg" type  ="text" name="name"/>
   </div>
           <div class="error">
              <?php echo $errors['name'] ?? ''?>    <!--Outputs the errors on the form-->
           </div>

   <div class="adm_int">
    <label class="label_text">Email</label>
    <input  class="input_deg" type ="text" name="email"/>
           <div class="error">
              <?php echo $errors['email'] ?? ''?>    <!--Outputs the errors on the form-->
           </div>
   </div>
          

   <div class="adm_int">
    <label class="label_text">phone</label>
    <input class="input_deg" type ="text" name="phone">
           <div class="error">
              <?php echo $errors['phone'] ?? ''?>    <!--Outputs the errors on the form-->
           </div>
   </div>
 
   <div class="adm_int">
    <label class="label_text">Message</label>
    <textarea class="input_text" name="message"></textarea>
   </div>

   <div class="adm_int">
    <input class ="btn btn-primary" id="submit" type="submit" value="apply" name="apply">  
   </div>


  </form>
  
 </div>


 <footer>
  <h6>All @Copyright reserved by G-Tech knowledge</h6>
 </footer>

</body>
</html>