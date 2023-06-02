<?php
session_start();
require("config/connexion.php");
require("config/commande.php");


if(isset($_POST['valider'])){
    if( isset($_POST['nom']) AND  isset($_POST['prenom'])AND isset($_POST['sexe']) 
    AND isset($_POST['image']) AND isset($_POST['date']) AND isset($_POST['lieu']) 
    AND isset($_POST['num'])  AND isset($_POST['email']) 
     AND isset($_POST['mdp']) AND isset($_POST['mdp1']) ) {
        if(!empty($_POST['nom'])  AND !empty($_POST['prenom']) AND  !empty($_POST['sexe']) 
        AND  !empty($_POST['image']) AND !empty($_POST['date']) AND !empty($_POST['lieu']) 
        AND  !empty($_POST['num']) AND  !empty($_POST['email']) 
        AND  !empty($_POST['mdp']) AND  !empty($_POST['mdp1'])){
        $nom=htmlspecialchars(strip_tags($_POST['nom']));
        $prenom=htmlspecialchars(strip_tags($_POST['prenom']));
        $sexe=htmlspecialchars(strip_tags($_POST['sexe']));
        $image=htmlspecialchars(strip_tags($_POST['image']));
        $date=htmlspecialchars(strip_tags($_POST['date']));
        $lieu=htmlspecialchars(strip_tags($_POST['lieu']));
        $num=htmlspecialchars(strip_tags($_POST['num']));
        $email=htmlspecialchars(strip_tags($_POST['email']));
        $mdp=htmlspecialchars(strip_tags($_POST['mdp']));
        $mdp1=htmlspecialchars(strip_tags($_POST['mdp1']));
        try 
              {
        if($mdp == $mdp1){
          ajoutercompte($nom,$prenom,$num,$image,$sexe,$date,$email,$mdp,$lieu);
          $erreur = "le compte a bien ete cree";
        }
        else{
          $erreur = "paas de meme  mot de passe ";
       }}
       catch (Exception $e) 
              {
                  $e->getMessage();
              }
  
        } 
    }
   }
?> 
<!doctype html>
<html lang="fran">
<head>
    <meta charset="UTF-8" />
    <title>Nouveau courrier</title>
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
            <h2> Nouveau Compte</h2>
            <div class="form1">
                <label for="nomcomplet"  >Nom</label>
                <input type="text" name="nom" class="input"><br><br>
                <label for="nomcomplet">Image:</label>
                <input type="text" placeholder="" required class="input"name="image" ><br><br>
                <label for="nomcomplet">Date De naissance </label>
                <input type="date" placeholder="" required class="input" name="date" ><br><br>
                <label>Numero De téléphone</label>
                <input type="numbre" placeholder="" required class="input"  name="num"><br><br>
                <label>Mot de passe</label>
                <input type="password" placeholder="" required class="input"  name="mdp"><br><br>
            </div>
            <div class="form2">
                <label for="nomcomplet">Prenom</label>
                <input type="text" placeholder="" required class="input" name="prenom"><br><br>
                <label>Sexe :</label>
                <select name="sexe"  class="input">
                    <option value="femme">Femme</option>
                    <option value="homme">Homme</option>
                </select><br><br>
              
                <label>Lieu De Naissance:</label>
                <input type="text" placeholder="" required class="input" name="lieu"><br><br>
                <label>Email</label>
                <input type="text" placeholder="" required class="input"  name="email"><br><br>
                <label>Confirmer le Mot de Passe</label>
                <input type="password" placeholder="" required class="input"  name="mdp1"><br><br>
            </div>
            <div class="buTTon">
                <input type="submit" value="Envoyer" name ="valider">
            </div>
          
            <?php 
        if(isset($erreur)){
            echo '<font color="black"><b>'.$erreur."</b></font>";
        }
        ?>
        </form>
       
    </div>
 </body>
</html>
