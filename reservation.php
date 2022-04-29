<?php

include("main.php");

$name=$_REQUEST['name'];
$age=$_REQUEST['age'];
$phone=$_REQUEST['phone'];
$date=$_REQUEST['date'];
$time=$_REQUEST['time'];
$email=$_REQUEST['email'];
$comment=$_REQUEST['comment'];
$specialcode=$_REQUEST['specialcode'];
$departements=$_REQUEST['departements'];
$medecins=$_REQUEST['medecins'];

$query=mysqli_query($db_connect,"INSERT INTO user (name,adresse, num, infos,horaire,pic) VALUES ('$name','$adresse','$num','$infos','$horaire','$pic')") or die(mysqli_error($db_connect));

mysqli_close($db_connect);
//header("location:hackathon.php?note=success");

