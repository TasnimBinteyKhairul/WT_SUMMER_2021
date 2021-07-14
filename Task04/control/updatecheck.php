<?php
include('../model/db.php');


 $error="";

if (isset($_POST['update'])) {
if (empty($_POST['firstname']) || empty($_POST['email']) )
 {
$error = "input given is invalid";
}


else
{
$connection = new db();
$conobj=$connection->OpenCon();

$firstname=$_REQUEST["firstname"];
$email=$_REQUEST["email"];
$address=$_REQUEST["address"];
$dob=$_REQUEST["dob"];
$password=$_REQUEST["password"];
$username=$_REQUEST["username"];
$gender=$prof="";

if(isset($_REQUEST["gender"]))
{
    $gender=$_REQUEST["gender"];
}

if(!empty($_POST['profession']))
 {
    $prof = $_POST['profession'];
}


    $validatecheckbox="";
   if(isset($_REQUEST["dancing"]))
   {
       $v1= $_REQUEST["dancing"];
       $validatecheckbox=$validatecheckbox.$v1;
   }
   if(isset($_REQUEST["reading"]))
   { 
       $v2= $_REQUEST["reading"];
       $validatecheckbox=$validatecheckbox.",".$v2;
   }
   if(isset($_REQUEST["travelling"]))
   {
    $v3= $_REQUEST["travelling"];
    $validatecheckbox=$validatecheckbox.",".$v3;
   }
   
$userQuery=$connection->UpdateUser($conobj,"student",$username,$firstname,$email,$address,$dob,$password,$gender,$validatecheckbox,$prof);
if($userQuery==TRUE)
{
    echo "update successful"; 
}
else
{
    echo "could not update";    
}
$connection->CloseCon($conobj);

}
}


?>
