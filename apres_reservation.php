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
<script src="html2pdf.bundle.min.js"></script>
<script>
  function download(params) {
    var ticket=document.getElementById("ticket1");
    var opt = {
      margin : 2,
      filename :'myticket.pdf',
      image : {type: 'jpeg' , quality:0.98},
      html2canvas: {scale:2},
      jsPDF: {unit:'in',format:'letter',}
    };
    html2pdf(ticket,opt);
  }
</script>
<style>
    .centring {margin: auto; display: flex;justify-content: center; align-items: center;}
    .message {height:300px}
    .message h5 {text-align: center;}
    .message a {text-decoration: none;}
    .ticket {border:solid 2px #ededed; border-radius:3px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      position: relative;
      top: 60%;
      left: 50%;
      transform: translate(-50%, -50%) scale(1);
      z-index: 10;
      background-color: white;
      width: 450px;
      max-width: 90%;
    }
    .accueil {text-decoration :none}
</style>
<script>
  
</script>

<body onload="webstorage('')">
  <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="container-fluid">
      <a href="homepage.php" class="accueil text-white"><i class="fas fa-chevron-left"></i><h6 class="d-inline"> Accueil</h6></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Telecharger ticket</a>
            <ul class="dropdown-menu">
              <li><button class="dropdown-item" id="d-pdf" onclick="download('')" >telecharger comme PDF</button></li>
              <li><a class="dropdown-item" href="#">Copier dans presse papier</a></li>
              <li><a class="dropdown-item" href="#">A third link</a></li>
            </ul>
          </li> 
        </ul>
        
      </div>
    </div> 
  </nav>
  <div class="message bg-primary"> 
      <h5 class="text-white">Reservation eregistrée <i class="far fa-calendar-check"></i></h5>
  </div>
          
     <br><br>  
    <div class="container" id="ticket1">       
      <br>           
      <div class="ticket p-2 bg-white" >
          
          <div class="warning bg-warning p-1">
              <p class="text-center"> <small> <b>Utilisation du code est necessaire pour modification ou annulation du rdv</b> </small></p>
          </div>
          <hr>
          <div class="infos">
            <h5>Détail du patient</h5>
            <?php
              include("main.php");
              $specialcode= $_REQUEST["specialcode"]; //specialcode déja inseré
              
              
              $sqlcheck = "SELECT * FROM reservation WHERE specialcode='$specialcode'"; // selectionner tous dans la ligne  qui correspond au code dans db
              $checkSqlResult=mysqli_query($db_connect,$sqlcheck) or die ("La requête a échoué check");
              //

              $checkResult=mysqli_num_rows($checkSqlResult);
              //
                if ($checkResult>0) {
                    while ($row=mysqli_fetch_assoc($checkSqlResult)) {                     
                      // ecrire tous les donnéées qui correspond au code 
                      echo '<p class="bg-warning p-1"><b>Code</b> <span class="float-end"> ' ;
                      echo  $row["specialcode"];
                      echo '</span></p>';
                      echo '<p> <b>Nom </b> <span class="float-end">' ;
                      echo $row["name"];
                      echo '</span></p>';
                      echo '<p> <b>Age </b> <span class="float-end">' ;
                      echo $row["age"];
                      echo '</span></p>';
                      echo "<hr>";
                      echo "<h5>Détail du rendez-vous</h5>";
                      echo '<p> <b>Departement</b> <span class="float-end">' ;
                      echo $row["departement"];
                      echo '</span></p>';
                      echo '<p> <b>Doctor</b> <span class="float-end">' ;
                      echo $row["medecin"];
                      echo '</span></p>';
                      echo '<p> <b>Date</b> <span class="float-end">' ;
                      echo $row["date"];
                      echo '</span></p>';
                      echo '<p> <b>Heure</b> <span class="float-end">' ;
                      echo $row["horaire"];
                      echo '</span></p>';
                                                                                                                    
                    }
                } 
                else {
                    echo "error try again";
                  }
            ?>
          </div>
          <hr>
          <div class="contact d-block">
              <div class="d-inline-block">
                <small>
                  <p><img src="https://img.icons8.com/ios/20/000000/apple-mail.png"/> e-med@gmail.com</p>
                  <p><img src="https://img.icons8.com/ios-filled/20/000000/apple-phone.png"/> 0545789845</p>
                </small>
                
              </div>   
              <div class="d-inline-block float-end">
                <small>
                  <p><img src="https://img.icons8.com/material-outlined/20/000000/marker.png"/> Garidi, Kouba, 16000 </p>
                  <p><img src="https://img.icons8.com/material-outlined/20/000000/domain.png"/> https://E-MED.com</p> 
                </small>
                
              </div>
              
          </div>
          
      </div>                
    </div>
    <hr>
    <footer class="">
        <div class="container">
          <div class="map centring">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25583.532688415577!2d3.06069184003464!3d36.72396411574034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fad41c48b28b5%3A0x85ce2eadf67d55fe!2sKouba!5e0!3m2!1sfr!2sdz!4v1653001093491!5m2!1sfr!2sdz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
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
                <a class="btn btn-link" href="#">A propos</a>
                <br>
                <a class="btn btn-link" href="#">Notre Blog</a>
                <br>
                <a class="btn btn-link" href="#">Link 1</a>
                <br>
              </div>
              <div class="col-sm-4">
                <h5>Links</h5>
                <a class="btn btn-link" href="#">Connecter</a>
                <br>
                <a class="btn btn-link" href="#">Plus d'infos</a>
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