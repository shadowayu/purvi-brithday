<?php
$username = $_REQUEST['susername'];
$password = $_REQUEST['spassword'];


$str = "select * from signup where username='$username' and password='$password'";
$con = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($con,'kusum');
$val = mysqli_query($con,$str) or die( mysqli_error($con));
$row = mysqli_fetch_array($val);

//to check in dbx
$user = $row["username"];
$pass = $row["password"];

if($username!=$user and $password!=$pass)
{
       echo("<script LANGUAGE = 'JavaScript'>
    window.alert('Wrong username or password');
    window.location.href = 'http://localhost/kusummedical/login/formdesign.html';
    </script>");
    exit();
}
else
{
    echo("<script LANGUAGE = 'JavaScript'>
    window.location.href = 'http://localhost/kusummedical/index.html';
    </script>");
    exit();
}
?>





<?php
session_start();

// If form submitted, insert values into the database.
if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con,'kusum');
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
