<?php

include("main.php");
//

$specialcode= $_REQUEST["specialcode"];
echo "CODE :";
echo $specialcode ;

//check if exists
/*$sqlcheck = "SELECT specialcode FROM reservation WHERE specialcode='$specialcode'";
$checkSqlResult=mysqli_query($db_connect,$sqlcheck) or die ("La requête a échoué check");
//

$checkResult=mysqli_num_rows($checkSqlResult);
//
  if ($checkResult>0) {
      while ($row=mysqli_fetch_assoc($checkSqlResult)) {                     
        
        echo $row["specialcode"];
        
      }
  } 
  else {
       echo "Données inserées existent pas mljmojojom";

    }*/
  
  


?>