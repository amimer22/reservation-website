<?php
sleep(2);
include("main.php");
//
$specialCodeDelete=$_REQUEST['specialcode1'];
$nomDelete=$_REQUEST['name1'];
$emailDelete=$_REQUEST['email1'];

//check if exists
$sqlcheck = "SELECT * FROM reservation WHERE specialcode='$specialCodeDelete' AND name='$nomDelete' AND email ='$emailDelete' ";
$checkSqlResult=mysqli_query($db_connect,$sqlcheck) or die ("La requête a échoué check");
//

$checkResult=mysqli_num_rows($checkSqlResult);
//
  if ($checkResult>0) {
      while ($row=mysqli_fetch_assoc($checkSqlResult)) {                     
        //check if exists
        $sql = "DELETE  FROM reservation WHERE specialcode='$specialCodeDelete'";
        //delete if exists
        $delete=mysqli_query($db_connect,$sql) or die ("La requête a échoué anuller");
        //header("location:apres_annulation.html");
        echo "<p> ok </p>"; 
      }
  } 
  else {
       echo "Données inserées existent pas";

    }
  
  


?>