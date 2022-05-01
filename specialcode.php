<?php


function generateRandomString($length = 3) {
    include("main.php");
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = 'E-MED-';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $fixedstring = 'E-MED-001';
    $sql="SELECT * FROM reservation WHERE specialcode='$randomString'";
    $result=mysqli_query($db_connect,$sql) or die ("La requête a échoué");
    //echo($result1);
    
    $resultcheck=mysqli_num_rows($result);
    if ($resultcheck>0) {
        while ($row=mysqli_fetch_assoc($result)) {                     
        echo $row['specialcode'].'<br>';
        }
    } 
    else {
        echo 'not found <br>';
    }

    return $randomString;
   
}
echo generateRandomString();