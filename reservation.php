<?php
sleep(1);//delay
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

if ($departements==="Select Departement" || $medecins==="Select Doctor" || $email==="" || $phone ==="" || $name==="" || $age==="0" || $date ==="0000-00-00" || $time ==="00:00:00") {
   echo "<b>remplire tous les champs</b>";
}

else {
    $query=mysqli_query($db_connect,"INSERT INTO reservation (specialcode,departement,medecin,email,phone,name,age,date,horaire,comments) VALUES ('$specialcode','$departements','$medecins','$email','$phone','$name','$age','$date','$time','$comment')") or die(mysqli_error($db_connect));
    echo "<b>success</b>";
    mysqli_close($db_connect);
}

//header("location:apres_reservation.html");

?>