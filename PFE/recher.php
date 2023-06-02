<!doctype html>
<html lang="fran">
<head>
    <meta charset="UTF-8" />
    <title>Courrier Sortants</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="styleaccueil.css">
    <link rel="stylesheet"  href="styleformulaire.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
    </div>
<body>
    <div class="formulaire">
        <div class="barre"></div><br>
        <form method="post">
            <h2> Rechercher Un courrier</h2>
            <form method="post">

<center><input type="text" name="search" >
<input type="submit" name="submit" value="rechercher"></center>
<?php

$con = new PDO("mysql:host=localhost;dbname=courrier",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `courrierarrive` WHERE envoyerpar = '$str' OR ref='$str' OR distination='$str' OR sousdistination='$str' OR objet='$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
                          <table class="table">
           
      
     
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
         <tr><td><?= $row->ref?></td>
                <td><?= $row->naturecour?></td>
                <td><?= $row->confidentiel ?> </td>
                <td ><?= $row->datecourr ?></td>
                <td ><?= $row->envoyerpar ?></td>
                <td><?= $row->distination ?></td>
                <td ><?= $row->sousdistination ?></td>
                <td ><?= $row->datetraite?></td>
                <td ><?= $row->remarque ?></td>
                <td ><?= $row->objet ?></td>
                <td ><?= $row->naturedoc ?></td>
                <td><a href="pdf.php?id=<?= $row->id ?>"><img src="voir.png" style=width:40px;></a></td>
      
		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?>
	
</form>
      

    </div>











    </body>
</html>

           


