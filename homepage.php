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
</head>
<style>
    .centring {margin: auto; display: flex;justify-content: center; align-items: center;}
    .introduction h1{ font-family: 'Lobster', cursive; font-size:50px;
    }
    .introduction h5{ font-family: 'Bebas Neue', cursive;
    }
    .introduction p{ font-family: 'Bebas Neue', cursive;
    }
    .introduction button { font-family: 'Bebas Neue', cursive;
    }
    .services {background-color: #0d6efd;}
    .services h2 {color: white;}
    .services .card:hover {background-color: #0d6efd; color: white;border: none;}
    .departements {background-color: white;}
    .departements .card:hover {background-color:#0d6efd;color: white;border: none;}
    .medecins .card {border: none;}
    .dr-infos {text-align: center;}
    footer{}

    .popup-hide { position: fixed;
    filter: drop-shadow(0 0 500px rgb(0, 0, 0));
    padding: 10px;
    top: 55%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 150ms ease-in-out;
    border: solid 1px #ededed;
    border-radius: 5px;
    z-index: 10;
    background-color: white;
    width: 800px;
    max-width: 80%;
    /*display: none;*/
    overflow-y: auto;
    overflow-x: hidden;
    }
    .reservation-form input {border-radius: 0px;}
    .reservation-form select {border-radius: 0px;}
    .reservation-form button {border-radius: 0px;}
</style>
<script>
   //script popup products
   function showpopup(params) {
        var popup=document.getElementById(params);
        
        popup.style.transform = 'translate(-50%, -50%) scale(1)';

            
      }
      function hidepopup(params) {
        var popup=document.getElementById(params);       
        
        popup.style.transform = 'translate(-50%, -50%) scale(0)';
        
      }
</script>
<?php
include("main.php");
?>
<body>

<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E-Med</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>    
      </ul>
    </div>
  </div>
</nav>

<div class="">
    <br><br>
    <div class="">
        <div class="container-fluid introduction">
          <div class="row">
            <div class="col-sm-5">
              <h5>Welcome to E-Med</h5>
              <h1>THE BEST Medical services</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
              <p>dit dolorum. Incidunt, repellendus dolores?</p>
              <br>
              <button onclick="showpopup('popup')" type="button" class="btn btn-outline-primary rounded-0 p-3">Prendre un rendez-vous  <i class="fas fa-calendar-plus"></i></button> 
            </div>
            <div class="col-sm-7">
              <img src="3.png" class="img-fluid" alt="">
            </div>
          </div>
           
        </div> 
        <br><br>
        <div class="popup-hide" id="popup">
          <div class="d-block">
            <h5 class="d-inline">Prendre un rendez-vous</h5>
            <button onclick="hidepopup('popup')" class="btn btn-sm btn-primary d-inline float-end rounded-0">Hide</button>
          </div>
                  
          <hr>
          <form action="reservation.php" class="reservation-form" method="post">
            <div class="input-group mb-1">
              <span class="input-group-text rounded-0">Code</span>
              <input type="text" class="form-control" value="variable-code-for-each-user" name="specialcode" readonly>
            </div>
            <select class="form-select mb-1" aria-label="Default select example" id="departements" name="departements">
              <option selected>Select Departement</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <select class="form-select mb-1" aria-label="Default select example" id="medecins" name="medecins">
              <option selected>Select Doctor</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
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
              <input type="submit" value="Confirmer" class="btn btn-block btn-primary p-2">
            </div>
            
          </form>
        </div>
        <div class="services">
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
        <div class="departements">
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
        <div class="medecins">
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
                    <div class="card-body"><img src="4.png" class="img-fluid" alt=""></div>
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
    </div>
    
</div>
<br><hr>
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
</html>

