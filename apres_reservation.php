<!DOCTYPE html>
<html lang="en">
<head>
  <title>Apres-reservation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" 
    crossorigin="anonymous">
</head>
<style>
    .centring {margin: auto; display: flex;justify-content: center; align-items: center;}
    .message h5 {text-align: center;}
    .message a {text-decoration: none;}
</style>
<script>
  
</script>
<?php include("main.php"); ?>
<body onload="webstorage('')">
    <div class="message p-3 bg-primary"> 
        <a href="homepage.php" class="text-white float-start"><i class="fas fa-chevron-left"></i><h6 class="d-inline"> Accueil</h6></a>                   
        <h5 class="text-white">Reservation eregistrée <i class="far fa-calendar-check"></i></h5>
    </div>
    
    <div class="container">
        
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="ticket">
                    <h5 class="brandname"> E-MED</h5>
                    <div class="infos">
                      <?php
                        $specialcode= $_REQUEST["specialcode"];
                        echo "CODE :";
                        echo $specialcode ; 
                        
                      ?>
                    </div>
                    <hr>
                    <div class="contact">
                        <p>Pour nous contacter : </p>
                        <p>Email :</p>
                        <p>Tel :</p>
                        <p>adresse : </p>
                        <p>website :</p>
                    </div>
                    <div class="warning bg-warning p-1">
                        <p>Utilisation du code est necessaire pour modification ou annulation du rdv</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="description">
                    <p>Choisissez une des methodes suivantes pour enregister votre tickets</p>
                </div>
                <div class="options">
                    <div class="d-grid">
                        <button class="btn rounded-0 btn-block btn-primary">Telecharger comme PDF</button>
                        <hr>
                        <button class="btn rounded-0 btn-block btn-primary">Copier dans press-papier</button>
                        
                
                    </div>
                    
                </div>
            </div>
        </div>
        
        
    </div>
    <hr>
    <footer class="">
        <div class="container">
          <div class="network">
            <div class="d-none d-sm-block">
              <h5 class="m-2 float-start ">Connectez avec nous sur les reseaux sociaux  </h5>
            </div>     
            <div class="socials centring m-2">
              <i class="fab fa-facebook m-3"></i>
              <i class="fab fa-twitter m-3"></i>
              <i class="fab fa-instagram m-3"></i>
            </div>   
            
          </div>
          <hr>
          <div class="float-none">
            <div class="row">
              <div class="col-sm-4">
                <div class="contact">
                  <h5>Contact</h5>
                  <p> <i class="fas fa-map-marker-alt"></i> Kouba, Alger, 0250, ALGERIE</p>
                  <p> <i class="fas fa-envelope"></i> emed01@gmail.com</p>
                  <p> <svg xmlns="http://www.w3.org/2000/svg" style="width:15px;" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"/></svg> +21354897773</p>
      
                </div>
                
              </div>
              <div class="col-sm-4">
                <h5>Links</h5>
                <a class="btn btn-link" href="#">Link 1</a>
                <br>
                <a class="btn btn-link" href="#">Link 1</a>
                <br>
                <a class="btn btn-link" href="#">Link 1</a>
                <br>
              </div>
              <div class="col-sm-4">
                <h5>Links</h5>
                <a class="btn btn-link" href="#">Link 1</a>
                <br>
                <a class="btn btn-link" href="#">Link 1</a>
                <br>
                <a class="btn btn-link" href="#">Link 1</a>
                <br>
              </div>
            </div>
          </div>
          <hr>
          <div class="centring">
            <h5>© 2022 Copyright: USTHB-ESE-STUDENTS</h5>
          </div>
        </div>
        
    </footer>
</body>