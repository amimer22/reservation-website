<?php

include("main.php");
$specialcode=$_REQUEST['specialcode'];
$departements=$_REQUEST['departements'];
$medecins=$_REQUEST['medecins'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['phone'];
$name=$_REQUEST['name'];
$age=$_REQUEST['age'];
$date=$_REQUEST['date'];
$time=$_REQUEST['time'];
$comment=$_REQUEST['comment'];



$query=mysqli_query($db_connect,"INSERT INTO reservation (specialcode,departement,medecin,email,phone,name,age,date,horaire,comments) VALUES ('$specialcode','$departements','$medecins','$email','$phone','$name','$age','$date','$time','$comment')") or die(mysqli_error($db_connect));

mysqli_close($db_connect);
header("location:apres_reservation.html");

?>