<!DOCTYPE html>
<html lang="en">
<head>
  <title>HOME</title>
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
  <link rel="stylesheet" href="style.css" >
</head>
<style>
   
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  //annuler le  rdv
  $(document).ready(function(){
    var myform=$('#delete_form');  
    myform.submit(function(event) {
     
      var formData = {
      specialcode1: $("#specialcode1").val(),
      name1: $("#name1").val(),
      email1: $("#email1").val(),
      };
    
      $.ajax({
          type: "POST",
          url: "delete_reservation.php",
          data: formData,
          success: function(result) {
             $("#msg").html(result);

            if (result === "<b>Reservation annulé</b>") {
              setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 3000);    
            }
           
          }
      });
       event.preventDefault();
    });
  });
  
  //reserver un rdv + envoyer les donneés a database et after_reservation pour ticket
  $(document).ready(function(){
    
    var form=$('#reservation_form');  
    form.submit(function(event) {
      event.preventDefault();
      var formData = {
      specialcode: $("#specialcode").val(),
      departements: $("#departements").val(),
      medecins: $("#medecins").val(),
      email: $("#email").val(),
      phone: $("#phone").val(),
      name: $("#name").val(),
      age: $("#age").val(),
      date: $("#date").val(),
      time: $("#time").val(),
      comment: $("#comment").val(),
      };
      //data: $('#reservation_form').serialize(),
      
      $.ajax({
          type: "POST",
          url: "reservation.php",
          data: formData, 
          success : function(result) {
            $("#msg0").html(result);
            if (result === "<b>success</b>") {
              setTimeout(
                  function() 
                  {
                    location.replace("apres_reservation.php?specialcode="+specialcode.value,true);
                  },1000);    
            }
          
            
          }                  
      });
      /*var formData1 = {
      specialcode: $("#specialcode").val(),
      name: $("#name").val(),
      };
      $.ajax({
          type: "POST",
          url: "test_ticket.php",
          data: formData1,
                 
      });*/
    });
  });
/*
   /* function annuler(event) {
      event.preventDefault();
      var formData = {
      specialcode: $("#specialcode1").val(),
      name1: $("#name1").val(),
      email1: $("#email1").val(),
      };

      $.ajax({
          type: "POST",
          url: "delete_reservation.php",
          data: formData,
          success: function(result) {
              alert(result);
          }
      });
    }*/
    //webstorage
  /*if (typeof(Storage) !== "undefined") {
  // Store
  localStorage.setItem("name",document.getElementById("name").value);
  
  } else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
  }*/

  //navbar links
  $(document).ready(function() {
    $(window).scroll(function() {
      if ($(document).scrollTop() > 50) {
        $("#nav").addClass("navonscroll");
      } 
      else {
        $("#nav").removeClass("navonscroll");
      }
      });
  });

   //open popup
  function showpopup(params) {
      var popup=document.getElementById(params); //get popup id through the parameter
      
      popup.style.transform = 'translate(-50%, -50%) scale(1)'; //change popup style onclick - show it 

          
    }
  function hidepopup(params) {
    var popup=document.getElementById(params);    //get popup id through the parameter   
    
    popup.style.transform = 'translate(-50%, -50%) scale(0)';  //change popup style onclick - hide it
    
  }
  //copier - dans reservation popup
  function copy() {
    var CopySpan = document.getElementById("CopySpan"); // call the span to click on
    var text = document.getElementById("specialcode").value; //call the input with the value 
    var textCopied = navigator.clipboard.writeText(text); // copy to clipboard
    
    CopySpan.innerHTML ="Copied!"; // change span text to copied!
  }
  //after reservation 
  function afterReservation(params) {
    var popup1=document.getElementById(params);
        
        popup1.style.transform = 'translate(-50%, -50%) scale(1)';

        
  }
  function afterReservationClose(params) {
    var popup1=document.getElementById(params);       
        
        popup1.style.transform = 'translate(-50%, -50%) scale(0)';
        
  }
  // code du spinner aprés confirmation du rdv
  function spinneron() {
  document.getElementById("spinner").style.display = "block"; // call the div spinner with id
  
  setTimeout(
    function spinneroff() {
    document.getElementById("spinner").style.display = "none"; // call the div spinner with id
  
    }, 3000);
  
}



//
/*function showUser(specialcode1,name1,email1) {
  /*$.ajax ({
    url:"delete_reservation.php",
    method:"POST",
    data:{specialcode:specialcode,name:name,email:email},
  });
  var $specialCodeDelete = document.getElementById(specialcode1);
  var $nomDelete = document.getElementById(name1);
  var $emailDelete = document.getElementById(email1);
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("msg").innerHTML=this.responseText;
    }
  };
  xmlhttp.open("GET","delete_reservation.php",true);
  xmlhttp.send();
}*/


</script>
<?php
include("main.php");
?>
<body>

<nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top" id="nav">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E-Med</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" id="link0" href="#section0">Accuiel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="link1" href="#section1">Nos services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="link2" href="#section2">Nos departements</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="link3" href="#section3">Nos medecins</a>
        </li>    
        <li class="nav-item">
          <a class="nav-link" id="link4" href="#section4">A propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="link5" href="#section5">Contact</a>
        </li>    
      </ul>
    </div>
  </div>
</nav>

<div class="">
    
    <div class="">
        <div class="container-fluid introduction pt-5" id="section0">
          <br><br>
          <div class="row">
            <div class="col-sm-5">
              <h5>Welcome to E-Med</h5>
              <h5 id="result"></h5>
              <h1>THE BEST Medical services</h1>
              <p>Afin de vous éviter les déplacements inutiles, la Clinique met à votre disposition un service de prise de rendez-vous en ligne. </p>
              <p>Avec des options pour la modification ou annulation de votre rendez-vous</p>
              <br>
              <div class="d-grid">
                <button onclick="showpopup('popup')" type="button" class="btn btn-block btn-primary rounded-0 p-3 m-1">Prendre un rendez-vous  <i class="fas fa-calendar-plus"></i></button> 
                <button onclick="showpopup('popup2')" type="button" class="btn btn-block btn-outline-warning rounded-0 p-3 m-1" disabled>Modifier un rendez-vous  <img src="https://img.icons8.com/material-rounded/20/000000/edit-calendar.png"/ ></button> 
                <button onclick="showpopup('popup3')" type="button" class="btn btn-block btn-outline-danger rounded-0 p-3 m-1">Annuler un rendez-vous  <i class="fas fa-calendar-times"></i></button> 
              </div>            
            </div>
            <div class="col-sm-7">
              <img src="3.png" class="img-fluid d-none d-sm-block" alt="">
            </div>
          </div>          
        </div> 
        <br><br>

        <!-- partie popup reservation -->
        <div class="popup-hide" id="popup">
          <div class="d-block" id="upper-popup">
            <h5 class="d-inline">Prendre un rendez-vous</h5>
            <button onclick="hidepopup('popup')" class="btn btn-sm btn-primary d-inline float-end rounded-0">Hide</button>
            <hr>
          </div>
          <div class="spinner pt-4" id="spinner">
            <div class="d-flex justify-content-center">
              
              <div class="spinner-border" role="status">
                
                <span class="visually-hidden">Loading...</span>
              </div>
            </div> 
          </div>
          <div id="msg0" class="msg p-1">
           Inserer vos donneés
          </div>  
          
          <form  id="reservation_form" class="reservation-form" method="post">
            <div class="input-group mb-1">
              <span class="input-group-text bg-white rounded-0">Code</span>
              
              <input type="text" class="form-control" value='<?php include("specialcode.php") ?>' id='specialcode' name="specialcode" readonly>
              
              <span class="input-group-text bg-white rounded-0" id="CopySpan" onclick='copy()'>Copier</span>
              <span class="input-group-text bg-warning rounded-0"><small><i class="fas fa-exclamation-triangle"></i> Code est necessaire en cas d'annulation</small></span>
            </div>
            <select class="form-select mb-1" aria-label="Default select example" id="departements" name="departements">
              <option selected>Select Departement</option>
              <option>Surgical</option>
              <option>Dental</option>
              <option>Cardiology</option>
              <option>Neurology</option>
              <option>Opthalmology</option>
              <option>Psycology</option>
             
            </select>
            <select class="form-select mb-1" aria-label="Default select example" id="medecins" name="medecins">
              <option selected>Select Doctor</option>
              <option>AGLI Dalil</option>
              <option>ALIMIHOUB Akram</option>
              <option>ANAD Yacine</option>
            </select>           
            <div class="row mb-1">
              <div class="col">
                <div class="form-floating">
                  <input type="text" class="form-control form-control-sm" id="email" placeholder="Enter email" name="email">
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating">
                  <input type="text" class="form-control form-control-sm" id="phone" placeholder="Enter phone" name="phone">
                  <label for="phone">Phone</label>
                </div>
              </div>
            </div>
            <div class="row mb-1">
              <div class="col">
                <div class="form-floating">
                  <input type="text" class="form-control form-control-sm" id="name" placeholder="Enter name" name="name">
                  <label for="name">Name</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating">
                  <input type="text" class="form-control form-control-sm" id="age" placeholder="Enter age" name="age">
                  <label for="age">Age</label>
                </div>
              </div>
            </div>
            <div class="row mb-1">
              <div class="col">
                <div class="form-floating">
                  <input type="date" class="form-control form-control-sm" id="date" placeholder="Enter date" name="date">
                  <label for="date">Date</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating">
                  <input type="time" class="form-control form-control-sm" id="time" placeholder="Enter time" name="time">
                  <label for="time">Horaire</label>
                </div>
              </div>
            </div>
            <div class="form-floating mb-1">
              <textarea class="form-control" id="comment" name="comment" placeholder="Comment goes here"></textarea>
              <label for="comment">Comments</label>
            </div> 
            <div class="d-grid">
              <input type="submit"  onclick="spinneron('')"  value="Confirmer" class="btn btn-block btn-primary p-2">
              
            </div>
            
          </form>
        </div>
        <!-- holding on modify feature for later -->
        <!--
        <div class="popup-hide" id="popup2">
          <div class="d-block" id="upper-popup2">
            <h5 class="d-inline">modifier un rendez-vous </h5>
            
            <button onclick="hidepopup('popup2')" class="btn btn-sm btn-primary d-inline float-end rounded-0">Hide</button>
            <hr>
          </div>

          <div class="description">
            <p>Complete the form to access modfication</p>
          </div>
          <form action="">
            <div class="input-group mb-1">
              <span class="input-group-text bg-white rounded-0" id="emedSpan">E-MED-</span>
              <input type="text" class="form-control" placeholder="Enter Code" name="entercode">             
            </div>
            <div class="row mb-1">
              <div class="col">
                <div class="form-floating">
                  <input type="text" class="form-control form-control-sm" id="name" placeholder="Enter name" name="name-modify">
                  <label for="name">Nom</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating">
                  <input type="text" class="form-control form-control-sm" id="name" placeholder="Enter " name="name-modify">
                  <label for="name">Prenom</label>
                </div>
              </div>
            </div>
            <div class="form-floating mb-1">
                  <input type="email" class="form-control form-control-sm" id="name" placeholder="Enter name" name="name-modify">
                  <label for="name">Email</label>
            </div>
            <div class="d-grid">
                <input class="btn btn-block btn-primary " type="text" value="Modifier">
            </div>
          </form>
        </div> -->

        <!-- partie popup annuler / non visible / visible aprés cliquer sur btn reserver -->
        <div class="popup-hide" id="popup3">
          <div class="d-block" id="upper-popup3">
            <h5 class="d-inline">Annuler un rendez-vous </h5>
            
            <button onclick="hidepopup('popup3')" class="btn btn-sm btn-primary d-inline float-end rounded-0">Hide</button>
            <hr>
          </div>
          <div id="msg" class="msg p-1">
           Inserer vos donneés
          </div>
          <form  id="delete_form"  action="delete_reservation.php" method="POST">
            <div class="input-group mb-1">
              
              <input type="text" class="form-control rounded-0" id="specialcode1" placeholder="Enter Code" name="specialcode1"> 
              <span class="input-group-text bg-white rounded-0" id="emedSpan"><small> Code oublié ?</small></span>            
            </div>
            <div class="row mb-1">
              <div class="col">
                <div class="form-floating">
                  <input type="text" class="form-control form-control-sm  rounded-0" id="name1" placeholder="Enter name" name="name1">
                  <label for="name">Nom</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating">
                  <input type="text" class="form-control form-control-sm  rounded-0" id="email1" placeholder="Enter " name="email1">
                  <label for="name">Email</label>
                </div>
              </div>
            </div>
            
            <div class="d-grid">
                <input type="submit" class="btn btn-block btn-danger rounded-0" value="Annuler">
            </div>
          </form>
        </div>
        
        <!-- after reservation popup /non visible / visible aprés cliquer sur btn annuler  -->
        <!--div class="popup-hide1" id='popup1'>
          <div class="message">
            <h5>Dont forget code</h5>
          </div>
          <div class="options">
            <button onclick="afterReservationClose('popup1')">ok</button>
          </div>
        </div-->
        <br><br><br><br>

        <!-- partie services -->
        <div class="services pt-5" id="section1">
            <br>
            <h2 class="centring">Nos services</h2>
            <br>
            <div class="cards row centring">
                 <div class="card col-sm-3 rounded-0 m-2">
                    <div class="centring m-2"><p><i class="fas fa-ambulance"></i> Emergency Services</p> </div>
                    <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, suscipit qlkmm?
                      <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, suscipit qlkmm?
                    </div>                   
                </div>
                <div class="card col-sm-3 rounded-0 m-2">
                  <div class="centring m-2"><p><i class="fas fa-user-md"></i> Qualified Doctors</p> </div>
                  <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, suscipit qlkmm?
                    <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, suscipit qlkmm?
                  </div> 
                </div>
                <div class="card col-sm-3 rounded-0 m-2">
                  <div class="centring m-2"><p><i class="fas fa-clock"></i> 24 Hours Service</p> </div>
                  <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, suscipit qlkmm?
                    <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, suscipit qlkmm?
                  </div> 
                </div>               
            </div>
            <br><br>
        </div>   
        <br><br>
        <!-- partie departements -->
        <div class="departements pt-5" id="section2">
            <br>
            <h2 class="centring">Nos Départements</h2>
            <br>
            <div class="cards row centring">
                <div class="card col-sm-3 rounded-0 m-2">
                    <div class="centring m-2"> <p><i class="fas fa-stethoscope"></i> Surgical</p></div>
                    <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, suscipit qlkmm?</div>
                </div>
                <div class="card col-sm-3 rounded-0 m-2">
                  <div class="centring m-2"> <p><i class="fas fa-stethoscope"></i> Dental</p></div>
                  <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, suscipit qlkmm?</div>
                </div>
                <div class="card col-sm-3 rounded-0 m-2">
                  <div class="centring m-2"> <p><i class="fas fa-stethoscope"></i> Cardiology</p></div>
                  <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, suscipit qlkmm?</div>
                </div>            
            </div>
            <div class="cards row centring">
              <div class="card col-sm-3 rounded-0 m-2">
                <div class="centring m-2"> <p><i class="fas fa-stethoscope"></i> Neurology</p></div>
                <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, suscipit qlkmm?</div>
              </div>
              <div class="card col-sm-3 rounded-0 m-2">
                <div class="centring m-2"> <p><i class="fas fa-stethoscope"></i> Opthalmology</p></div>
                <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, suscipit qlkmm?</div>
              </div>
            <div class="card col-sm-3 rounded-0 m-2">
              <div class="centring m-2"> <p><i class="fas fa-stethoscope"></i> Psycology</p></div>
              <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, suscipit qlkmm?</div>
            </div>             
           </div>
           <br>
        </div> 
        <br><br>
        <!-- partie medecins -->
        <div class="medecins pt-5" id="section3">
            <br>
            <h2 class="centring">Nos Medecins</h2>
            <br>
            <div class="cards row centring">
                 <div class="card col-sm-3 rounded-0 m-2">                   
                    <div class="card-body"><img src="4.png" class="img-fluid" alt=""></div>
                    <div class="dr-infos">
                      <p>Dr. AGLI Dalil</p>
                      <p>Neurologist</p>
                      <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
                    </div>
                </div>
                <div class="card col-sm-3 rounded-0 m-2">
                    <div class="card-body"><img src="5.png" class="img-fluid" alt=""></div>
                    <div class="dr-infos">
                      <p>Dr. BLACK Walter</p>
                      <p>Ophthalmologist</p>
                      <p>I am an ambitious black, but apart from that, pretty simple black.</p>
                    </div>
                </div>
                <div class="card col-sm-3 rounded-0 m-2">
                    <div class="card-body"><img src="4.png" class="img-fluid" alt=""></div>
                    <div class="dr-infos">
                      <p>Dr. AGLI Dalil</p>
                      <p>Neurologist</p>
                      <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
                    </div>
                </div>               
            </div>
            <br>
        </div>
        <br>
        <!-- partie a propos -->
        <div class="a-propos bg-primary p-5" id="section4">  <!--divisin a propos -->
          <br>
          <h2 class="text-white text-center">A propos</h2> <!--titre a propos -->
          <br>
            <div class="row"> <!--la ligne -->
              <div class="col-sm-6"> <!--1er colone  -->
                <div class="a-p-description">
                  <h4 class="m-2">E-MED</h4>
                  <br>
                  <p class="m-2">
                  Centre médical leader en Algérie, car nous mettons à disposition de tout le secteur médical une salle d’angiographie exceptionnelle permettant à la fois la réalisation d’une panoplie variée de gestes interventionnels en cardiologie et en électrophysiologie cardiaque, mais surtout de neuroradiologie et d’angiologie interventionnelles évitant des chirurgies parfois lourdes ou permettant d’optimiser des gestes chirurgicaux inévitables Notre centre propose aussi des solutions innovatrices d’hépato-gastro-entérologie en Algérie car il est l’un des rares qui propose l’écho-endoscopie et le FibroScan hépatique et certainement le premier à proposer le diagnostic par vidéo capsule.
                  </p>
                </div>
                
              </div>
              <div class="col-sm-6">  <!--la 2eme ligne -->
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                      <div class="carousel-item active">
                      <img style="width:500px;height:400px" class="img-fluid float-end d-block w-100" src="6.jpg" alt=""> <!--tla taille de l'image-->
                      </div>
                      <div class="carousel-item">
                      <img style="width:500px;height:400px" class="img-fluid float-end d-block w-100" src="7.png" alt="">
                      </div>
                      <div class="carousel-item">
                      <img style="width:500px;height:400px" class="img-fluid float-end d-block w-100" src="6.jpg" alt="">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev"> <!--bp gauche -->
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next"> <!--bp droite  -->
                      <span class="carousel-control-next-icon" aria-hidden="true"></span> 
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                    
                </div>
            </div>
        </div>       
    </div>
    
</div>
  
<br><hr>

<footer class="pt-5" id="section5">
  <div class="container">
    <div class="map centring">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25583.532688415577!2d3.06069184003464!3d36.72396411574034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fad41c48b28b5%3A0x85ce2eadf67d55fe!2sKouba!5e0!3m2!1sfr!2sdz!4v1653001093491!5m2!1sfr!2sdz" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <hr>
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
          <a class="btn btn-link" href="#section4">A propos</a>
          <br>
          <a class="btn btn-link" href="#">Notre Blog</a>
          <br>
         
          <br>
        </div>
        <div class="col-sm-4">
          <h5>Links</h5>
          <a class="btn btn-link" href="#">Connecter</a>
          <br>
          <a class="btn btn-link" href="#">Plus d'infos</a>
          <br>
          
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
</html>


