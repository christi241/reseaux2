<?php
session_start();
include "../model/db.php";


if (isset($_POST['ajouter'])) {

  $email=$_POST['email'];
  $nom=$_POST['nom'];
  $date_danniv=$_POST['date'];
  $motp=$_POST['motp'];


    if(!empty($nom) and !empty($email) and !empty($date_danniv) and !empty($motp)){
      $sql2= "INSERT INTO `users` ( `username`, `password`, `email`, `date_aniv`, `created_at`) VALUES ('$nom', '$motp', '$email', '$date_danniv', current_timestamp())";
      $resultat = mysqli_query($conn,$sql2);
      if ($resultat) {

             $_SESSION['utilisateur'] = ["email"=>$_POST['mail'] , "nom" =>$_POST['nom'], "pasword"=>$_POST['motp']];
             

            $id_u="SELECT id FROM users where email==$email";
            $R = mysqli_query($conn,$id_u);
            
            if ($ligne=mysqli_fetch_assoc($R)) {
                $idU=$ligne['id'];
                echo $idu;
                $_SESSION['utilisateur']= ["id"=>$idu];
            }

            $dataLine = "$nomUtilisateur,$email\n"; // Modifiez le format selon vos besoins

            // Chemin du fichier d'enregistrement des utilisateurs
            $cheminFichier = '../includes/tous_inscrit.txt'; // Modifiez le chemin selon vos besoins

            // Enregistrer les données d'inscription dans le fichier
            file_put_contents($cheminFichier, $dataLine, FILE_APPEND);      
          header('location:../index.php');


      }else{

     

      }

    }else{

        echo "remplissers tous les champs";
  
        }
    }







?>






<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



    <div class="container">    
       
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form" method="POST" action="./inscription.php">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label"> Nom</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nom" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="motp" placeholder="Password">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">date d'anniv</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" name="date" placeholder="Last Name">
                                    </div>
                                </div>  

                               
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="submit" name="ajouter" class="btn btn-primary"><i class="icon-facebook"></i> envoyer</button>
                                    </div>                                           
                                        
                                </div>
                                
                                
                                
                            </form>
                         </div>
                    </div>

               
               
                
         
    </div>
    