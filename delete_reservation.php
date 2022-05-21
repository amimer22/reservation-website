<?php
sleep(2);
include("main.php");
//

if (isset($_REQUEST['specialcode1']) && isset($_REQUEST["name1"]) && isset($_REQUEST["email1"])) { //verification si les donnes existe dans le request
  // request data
  $specialCodeDelete=$_REQUEST['specialcode1'];
  $nomDelete=$_REQUEST['name1'];
  $emailDelete=$_REQUEST['email1'];
  //
  if ($specialCodeDelete === "" || $nomDelete ==="" || $emailDelete === "") { //verifier si un champ est vide et envoyer un msg
    echo "<b>un champ est vide </b>";   
  }
  else {
    //check if exists
  $sqlcheck = "SELECT * FROM reservation WHERE specialcode='$specialCodeDelete' AND name='$nomDelete' AND email ='$emailDelete' "; //selectionner tous les donneéés qui coorespond au code non et email
  $checkSqlResult=mysqli_query($db_connect,$sqlcheck) or die ("La requête a échoué check");// envoyer au db
  //
  
  $checkResult=mysqli_num_rows($checkSqlResult); // verifier si les donneés existe
  //
    if ($checkResult>0) { // si il existe 
        while ($row=mysqli_fetch_assoc($checkSqlResult)) {                     
          //check if exists
          $sql = "DELETE  FROM reservation WHERE specialcode='$specialCodeDelete'"; //supprimer les données de db ( annuler le rdv)
          //delete if exists
          $delete=mysqli_query($db_connect,$sql) or die ("La requête a échoué anuller");
          
          echo "<b>Reservation annulé</b>"; // envoyer un msg
          //sleep(2);
          //header("location:homepage.php"); 
        }
    } 
    else { // si les données exite pas
         echo "<b>Données inserées existent pas</b>";
  
      }
    
  }
  
}


  


?>