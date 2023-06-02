<?php
require("config/commande.php");
$prf=afficher();

?> 


<!doctype html>
<html lang="fran">
<head>
    <meta charset="UTF-8" />
    <title>Compte</title>
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
                 <a href="admin.php" >
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
            <h2> Comptes</h2>
            <table class="table">
  <thead class="thead-dark">
    <tr>
    
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">sexe</th>
      <th scope="col">D.naissance</th>
      <th scope="col">L.naissance</th>
      <th scope="col">Num.telephone</th>
      <th scope="col">Email</th>
      <th scope="col">M.passe</th>
      <th scope="col">Modifier</th>
    </tr>
  </thead>
  <tbody>
            <?php foreach($prf as $admin): ?>
                <tr>
                <th scope="row"><?= $admin->id ?></th>
                <td><img src="<?= $admin->image?>" style="width: 35px"></td>
                <td><?= $admin->nom?></td>
                <td ><?= $admin->prenom ?></td>
                <td ><?= $admin->sexe ?></td>
                <td><?= $admin->date ?></td>
                <td ><?= $admin->lieu ?></td>
                <td ><?= $admin->num?></td>
                <td ><?= $admin->email ?></td>
                <td ><?= $admin->mdp ?></td>


                <td><a href="editer.php?id=<?= $admin->id ?>"><img src="editer.jpg" style=width:40px;></a></td>
                </tr>      
            <?php endforeach; ?>

            </tbody>

             
           
            </table>
     
            
        </form>
    </div>















    </body>
</html>
