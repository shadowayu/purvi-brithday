<?php
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$email=$_REQUEST['email'];
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con,'aqstills');

if($_REQUEST['username']=='' || $_REQUEST['email']=='' || $_REQUEST['password']=='' )
{
header('Location:http://localhost/aqstills/login/unsuccessful.html');
}
else
{
  $string="insert into signup values('$username','$password','$email')";
  mysqli_query($con,$string);
  header('Location:http://localhost/aqstills/login/successful.html');

}

?>