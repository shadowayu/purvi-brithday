<?php
session_start();

// If form submitted, insert values into the database.
if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con,'aqstills');
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($con,$username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 //Checking is user existing in the database or not
        $query = "SELECT * FROM `signup` WHERE username='$username'
and password='$password'";
 $result = mysqli_query($con,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['username'] = $username;
            // Redirect user to index.php
     header("Location:http://localhost/aqstills/gallery.html");
   }else{
       echo ("<script LANGUAGE='JavaScript'>
    window.alert('Invalid Username or Password Try Again!');
    window.location.href='http://localhost/aqstills/loginform.php';
    </script>");
    exit();

   }
    }
    else {
      echo ("<script LANGUAGE='JavaScript'>
   window.alert('All fields are required!');
   window.location.href='http://localhost/aqstills/loginform.php';
   </script>");
   exit();
   }
?>