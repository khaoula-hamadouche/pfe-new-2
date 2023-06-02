<!DOCTYPE html>
<html>
<head>
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="styleaccueil.css">
    <link rel="stylesheet"  href="styleformulaire.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<title>Rechercher un courrier</title>
</head>
<body translate="no" >
    <br>
<div class="naVbar">
        <naV>
            <ul>
			  
              <li> 
                 <a href="accueil.php" >
		   <img src="home.png" width="42" height="42" class="rounded-circle" >          
	</a>	         
              </li>
              
              <li> 
                 <a href="profil.php" >
		             <img src="2.png" width="42" height="42" class="rounded-circle" >
		         </a>
              </li>
           </ul>
        </naV>
    </div></body>
<body>
    <div class="formulaire">
        <div class="barre"></div><br>
        <form method="post">
        
            <table class="table">
           
            <h2> Rechercher Un courrier</h2>
            <center><input type="text" name="search">
<input type="submit" name="submit"></center>
     
      <thead class="thead-dark">
    <tr>
    
      <th scope="col">Ref</th>
      <th scope="col">N.courrier</th>
      <th scope="col">confidentiel</th>
      <th scope="col">Date.cour</th>
      <th scope="col">Envoyer</th>
      <th scope="col">Dis</th>
      <th scope="col">Sous.dis</th>
      <th scope="col">Date.tra</th>
      <th scope="col">Rema</th>
      <th scope="col">Objet</th>
      <th scope="col">Naturedoc</th>
      <th scope="col">Fichier</th>
    </tr>
    <?php

$conn = mysqli_connect('localhost','root','','courrier') or die('connection failed');
session_start();


if (isset($_POST["submit"])) {
	$str = $_POST["search"];


$sql = "SELECT * FROM `courrierarrive` WHERE envoyerpar = '$str' OR ref='$str' OR distination='$str' OR sousdistination='$str' OR objet='$str' ";

if ($result = mysqli_query($conn, $sql)) {
  // Fetch one and one row
    while ($row = mysqli_fetch_row($result)) {?>
      <tr><td><?php echo $row[1] ; ?></td>
      <td> <?php echo $row[2] ; ?></td>
      <td><?php echo $row[3] ; ?></td>
      <td><?php echo $row[4] ; ?></td>
      <td><?php echo $row[5] ; ?></td>
      <td><?php echo $row[6] ; ?></td>
      <td><?php echo $row[7] ; ?></td>
      <td><?php echo $row[8] ; ?></td>
      <td><?php echo $row[9] ; ?></td>
      <td><?php echo $row[10] ; ?></td>
      <td><?php echo $row[11] ; ?></td>
      <td><a href="pdf.php?id=<?php echo $row[0] ; ?>"><img src="voir.png" style=width:40px;></a></td>
      </tr>
      <?php
        }
      }

    mysqli_free_result($result);
  
  
}

     
  ?>




	
</form>

</body>
</html>




           


