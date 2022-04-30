<?php
function generateRandomString($length = 3) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = 'E-MED-';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
echo generateRandomString();