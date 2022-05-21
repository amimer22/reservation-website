<?php

// generation du random code 
function generateRandomString($length = 3) {
    
    $characters = '0123456789';//characteres du choix a generer
    $charactersLength = strlen($characters); // length des  caracteres 10
    $randomString = 'E-MED-'; // string constant 
    for ($i = 0; $i < $length; $i++) { // loop pour donner un random character a chaque incrementation de i (3fois)
        $randomString .= $characters[rand(0, $charactersLength - 1)]; //concatenation de charactere generé avec string constant
    }
    checkRandomString($randomString);//verifier le code finale dans la fontion checkRandomString
    //echo $randomString;  
}

function checkRandomString($randomString){
  include("main.php"); // besoin de database 
  $sql="SELECT * FROM reservation WHERE specialcode='$randomString'"; // query pour selectionner le code generé dans la fonction generate
  $result=mysqli_query($db_connect,$sql) or die ("La requête a échoué"); // envoyer la requete vers db 
  
  $resultcheck=mysqli_num_rows($result); // trouver la ligne correspondante au code 
  if ($resultcheck>0) { //verifier si le code existe donc le string de resullcheck est nonn nulle 
      while ($row=mysqli_fetch_assoc($result)) {                     
          //echo $row['specialcode'].'<br>';
          generateRandomString(); // on refait la generation de code car il existe déja dan db
      }
  } 
  else { // sinon
      echo $randomString; // on met le code generéé au output
  } 
}

echo generateRandomString(); //lancer la fonction