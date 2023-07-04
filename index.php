<?php 
session_start();
include "./model/db.php";
    $idu= $_SESSION["utilisateur"]["id"];
   
    
    
  
if (isset($_POST['submit'])) {  
    $media= $_POST['media'];
    $img=$_FILES['img']['name'];
    $dist="./images".$img;
    move_uploaded_file($_FILES['img']['tmp_name'],$dist);
  
  $bon="INSERT INTO `posts` ( `user_id`, `media`, `text`, `created_at`) VALUES ('$idu', '$media', '$img', current_timestamp())";
  $requet4 = mysqli_query($conn,$bon);
     if($requet4){
                header('location: index.php');
              
    }else {
     echo "pots pas introduit";
     }
        
    


}


?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="shortcut icon" href="./images/apple.jpg" type="image/jpg">
<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
        <link rel="stylesheet" href="index.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        
        <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">resauxMANGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./index.php">
          <i class="fa fa-home"></i>
          Home
          <span class="sr-only">(current)</span>
          </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-envelope-o">
            <span class="badge badge-primary">13</span>
          </i>
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ">
        <?php if (!$_SESSION["utilisateur"]) {
            
        ?>
      <li class="nav-item">
        <a class="nav-link" href="./view/conexion.php">
          <i class="fa fa-user">
            
          </i>
          connexion
        </a>
      </li>
      <?php }else{?>
        <li class="nav-item">
        <a class="nav-link" href="./view/deconnexion.php">
          <i class="fa fa-power-off">
            
          </i>
          deconnexion
        </a>
      </li>
      <?php }?>

      <li class="nav-item">
        <a class="nav-link" href="./view/inscription.php">
          <i class="fa fa-globe">
            
          </i>
          inscription
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./view/profiles_utilisateur.php">
          <i class="fa fa-user">
            <span class="badge badge-success">52</span>
          </i>
          mon compte
        </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>



    <div class="container-fluid gedf-wrapper">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="h5">@LeeCross</div>
                        <div class="h7 text-muted">christopher</div>
                        <div class="h7">Developer of web applications, JavaScript, PHP, Java, Python, Ruby, Java, Node.js,
                            etc.
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-6 gedf-main">

            <!-- tous sur le code php pour l'ajout des post -->

                <!--- \\\\\\\Post-->
               <?php  if ($_SESSION["utilisateur"]) {
                # code...
               ?>
                <div class="card gedf-card">
                <div class="card-body">
                    <h1 class="text-center">faite des poste </h1>
                <form  method="post" action="index.php" enctype="multipart/form-data">
                    <div class="nb-3">
                        <label for="prix" class="form-label">commentaire</label>
                        <input type="text" class="form-control"  name="media" >
                    </div>
                    <div class="nb-3">
                        <label for="img" class="form-label">image</label>
                        <input type="file" class="form-control-file"  name="img" >
                    </div>
                    <br>
                    <div class="user-box">
                    </div>
                <br>
                <div class="nb-3">
                    <button type="submit" class="btn btn-success mb-3" name="submit">Confirm</button>
                    <button type="button" class="btn btn-danger mb-3" name="annulez">annulez</button>
                </div>
        </form>
                    </div>
                    
                </div>
                <?php }?>
                <!-- Post /////-->


                <?php
                $req="SELECT *from posts";                                      
                $result=mysqli_query($conn,$req);

                $req2= "SELECT * FROM users";
                 $resp1=mysqli_query($conn,$req2);
    
	            
                if (!$_SESSION["utilisateur"]) {
                    
                while ($row= mysqli_fetch_assoc($result) and $row1= mysqli_fetch_assoc($resp1)) {
                ?>
                <!-- ITEM -->
                <form  method="post" action="#" enctype="multipart/form-data">
                <div class="card my-3">
                            <div class="card-header bg-white border-0 py-2">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between">
                                        <a href="#">
                                            <img class="rounded-circle" src="https://picsum.photos/80/80/?random?image=1" width="45" alt="" />
                                        </a>
                                        <div class="ml-3">
                                            <div class="h6 m-0">
                                                <a href="#"></a> <?php echo $row3['username']?> <a href="#"><?php echo $_SESSION["email"]?></a>
                                            </div>
                                            <div class="text-muted h8">Hace 5 miin <i class="fa fa-globe" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="card-body pt-0 pb-2"><?php echo $row['media']?>
                                La fuerza es el único lenguaje que el mal entiende. ¡Derrota monstruos para conseguir
                                muchas recompensas!
                            </div>
                            <img class="card-img-top rounded-0" src="<?php echo "images/".$row['text'] ?>" alt="Card image cap">
                            <div class="card-footer bg-white border-0 p-0">
                                <div class="d-flex justify-content-between align-items-center py-2 mx-3 border-bottom">
                                    <div>

                                    </div>
                                    <div class="h7"> 3279 <a href="#"></a> 44845 veces <a href="#">compartido</a></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center my-1">
                                    <div class="col">
                                    <a class="btn icon-btn btn-primary" href="#?id=<?php echo $row['author_id']; ?>" > <i class="fa fa-mail-forward"></i><span class="glyphicon btn-glyphicon glyphicon-share img-circle text-info"></span>Share</a>
                                       
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        </form>
                        <?php } }else {
                            
                            while ($row= mysqli_fetch_assoc($result) and $row3= mysqli_fetch_assoc($resp1)) {  
                        ?>

                <!--- \\\\\\\Post-->
                <form  method="post" action="#" enctype="multipart/form-data">
                <div class="card gedf-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0"><?php echo $row3['username']?> </div>
                                    <div class="h7 text-muted"></div>
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                        <div class="h6 dropdown-header"></div>
                                        <a class="dropdown-item" href="#">Save</a>
                                        <a class="dropdown-item" href="#">Hide</a>
                                        <a class="dropdown-item" href="#">Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> Hace 40 min</div>
                        <a class="card-link" href="#">
                            <h5 class="card-title">Totam non adipisci hic! Possimus ducimus amet, dolores illo ipsum quos
                                cum.</h5>
                        </a>
                        <div class="card-body pt-0 pb-2">
                            <img class="card-img-top rounded-0" src="<?php echo "images/".$row['text'] ?>" alt="Card image cap">
                        </div>

                        <p class="card-text"><?php echo $row['media']?>
                            
                            <a href="#" target="_blank">https://mega.nz/#!1J01nRIb!lMZ4B_DR2UWi9SRQK5TTzU1PmQpDtbZkMZjAIbv97hU</a>
                        </p>
                    </div>
                    <div class="card-footer"
                    >
                        
                    <a class="btn icon-btn btn-primary"href="#?id=<?php echo $row['author_id']; ?>" id="likeButton" name="like"><i class="fa fa-thumbs-up"
                                                aria-hidden="true"  id="likeButton" name="like"></i><span class="glyphicon btn-glyphicon glyphicon-thumbs-up img-circle text-primary"></span>Like</a>
                                                <a class="btn icon-btn btn-primary" href="#?id=<?php echo $row['author_id']; ?>" > <i class="fa fa-mail-forward"></i><span class="glyphicon btn-glyphicon glyphicon-share img-circle text-info"></span>Share</a>
                        
                    </div>
                 <textarea class="form-control " placeholder="Votre texte" name="messageaide" id="messg" cols="10" rows=""></textarea>
                 <a href="#?id=<?php echo $row['author_id']; ?>" class="card-link"><i class="fa fa-send"></i> Comment</a>
                                         
                </div>
                </form>
                <?php } }?>
                <!-- Post /////-->
            </div>

            <div class="col-md-3">
                <div class="card gedf-card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
                <div class="card gedf-card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>

 
   
<script>
  // Écoutez l'événement de clic sur le bouton "J'aime"
  document.getElementById("likeButton").addEventListener("click", function() {
    // Vérifiez l'état actuel du bouton
    var isLiked = this.classList.contains('liked');
    
    // Envoyer la requête AJAX ici
    // Vous pouvez utiliser la bibliothèque jQuery ou la méthode native XMLHttpRequest pour cela
    // Par exemple, en utilisant jQuery :
    $.ajax({
      url: "index.php", // L'URL du script PHP qui met à jour les likes
      type: "POST", // Utilisez la méthode POST pour envoyer les données au serveur
      data: { 
        post_id: <?php echo $post_id; ?>,
        is_liked: !isLiked // Inversez l'état actuel du bouton
      },
      success: function(response) {
        // Traitement de la réponse du serveur (si nécessaire)
        // Par exemple, vous pouvez rafraîchir l'affichage du nombre de likes ici
        
        // Modifiez l'état du bouton en fonction de la réponse
        var likeButton = document.getElementById("likeButton");
        likeButton.classList.toggle('liked'); // Inversez la classe CSS "liked"
        
        // Mettez à jour le texte du bouton en fonction de l'état actuel
        if (likeButton.classList.contains('liked')) {
          likeButton.textContent = 'Je n aime plus';
        } else {
          likeButton.textContent = 'Jaime';
        }
      }
    });
  });
</script>


