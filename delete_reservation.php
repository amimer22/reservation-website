<?php
include("main.php");
$specialCodeDelete=$_REQUEST['specialcode'];
$nomDelete=$_REQUEST['name'];
$emailDelete=$_REQUEST['email'];

//check if exists
$sql = "DELETE FROM reservation WHERE specialcode='$specialCodeDelete' AND name='$nomDelete' AND email ='$emailDelete' ";
//delete if exists


//
?>