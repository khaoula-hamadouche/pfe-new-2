<?php
session_start();

require("config/commande.php");


if(!isset($_GET['id'])){
    header("Location: affichercour.php");
}

if(empty($_GET['id']) OR !is_numeric($_GET['id'])){
    header("Location: affichercour.php");
}

if(isset($_GET['id'])){
    
    if(!empty($_GET['id']) OR is_numeric($_GET['id']))
    {
        $id = $_GET['id'];
        $cour = affichercourr($id);
    }
}



if(isset($_POST['valider'])){
    if( isset($_POST['ref']) AND  isset($_POST['naturecour'])AND isset($_POST['confidentiel']) 
    AND isset($_POST['datecourr']) AND isset($_POST['envoyerpar']) AND isset($_POST['distination']) 
    AND isset($_POST['sousdistination'])  AND isset($_POST['datetraite']) 
     AND isset($_POST['remarque']) AND isset($_POST['objet'])  AND isset($_POST['naturedoc'])  ){
        if(!empty($_POST['ref'])  AND !empty($_POST['naturecour']) AND  !empty($_POST['confidentiel']) 
        AND  !empty($_POST['datecourr']) AND !empty($_POST['envoyerpar']) AND !empty($_POST['distination']) 
        AND  !empty($_POST['sousdistination']) AND  !empty($_POST['datetraite']) 
        AND  !empty($_POST['remarque']) AND  !empty($_POST['objet']) AND !empty($_POST['naturedoc']) ){
        $ref=htmlspecialchars(strip_tags($_POST['ref']));
        $naturecour=htmlspecialchars(strip_tags($_POST['naturecour']));
        $confidentiel=htmlspecialchars(strip_tags($_POST['confidentiel']));
        $datecourr=htmlspecialchars(strip_tags($_POST['datecourr']));
        $envoyerpar=htmlspecialchars(strip_tags($_POST['envoyerpar']));
        $distination=htmlspecialchars(strip_tags($_POST['distination']));
        $sousdistination=htmlspecialchars(strip_tags($_POST['sousdistination']));
        $datetraite=htmlspecialchars(strip_tags($_POST['datetraite']));
        $remarque=htmlspecialchars(strip_tags($_POST['remarque']));
        $objet=htmlspecialchars(strip_tags($_POST['objet']));
        $naturedoc=htmlspecialchars(strip_tags($_POST['naturedoc']));
        

                if(isset($_GET['id'])){
    
                    if(!empty($_GET['id']) OR is_numeric($_GET['id']))
                    {
                        $id = $_GET['id'];
                    }
                }

            try 
            {
                modifiercourr($ref,$naturecour,$confidentiel,$datecourr,$envoyerpar,$distination,$sousdistination,$datetraite,$remarque,$objet,$naturedoc, $id);
                header('Location: affichercour.php');
            } 
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
    <title>Modifier un compte</title>
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
                 <a href="affichercour.php" >
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
        <?php foreach ($cour as $courrierarrive ): ?>
        <form method="post">
            <h2> Modifier Profil</h2>
            <div class="form1">
            <label for="nomcomplet"  >Reference</label>
                <input type="text" name="ref" class="input" value="<?= $courrierarrive ->ref ?>"><br><br>
                <label for="nomcomplet">Envoyer par :</label>
                <input type="text" placeholder="" required class="input" name="envoyerpar" value="<?= $courrierarrive ->envoyerpar ?>"><br><br>
                <label for="nomcomplet">Distinataire :</label>
                <input type="text" placeholder="" required class="input"name="distination" value="<?= $courrierarrive ->distination ?>" ><br><br>
                <label for="nomcomplet">Sous distinataire :</label>
                <input type="text" placeholder="" required class="input" name="sousdistination" value="<?= $courrierarrive ->sousdistination ?>"><br><br>
                <label>Nature de doucement :</label>
                <input type="text" placeholder="" required class="input"  name="naturedoc" value="<?= $courrierarrive ->naturedoc ?>"><br><br>
                <label>Objet :</label>
                <input type="text" placeholder="" required class="input"  name="objet" value="<?= $courrierarrive ->objet ?>"><br><br>
            </div>
            <div class="form2">
            <label for="nomcomplet">Date d'envoyer le courrier:</label>
                <input type="text" placeholder="" required class="input" name="datecourr" value="<?= $courrierarrive ->datecourr ?>"><br><br>
                <label for="nomcomplet">Date limité de traitement :</label>
                <input type="text" placeholder="" required class="input" name="datetraite" value="<?= $courrierarrive ->datetraite ?>"><br><br>
         
                <label> Nature de courrier :</label>
                <input type="text" placeholder=""  required name="naturecour"  class="input" value="<?= $courrierarrive ->naturecour ?>"><br><br>
                <label> Confidentiel :</label>
                <input type="text" placeholder=""  required name="confidentiel"  class="input" value="<?= $courrierarrive ->confidentiel ?>">
    
                <label>Remarque :</label>
                <input cols="10" rows="5" class="input" name="remarque" value="<?= $courrierarrive ->remarque ?>"><br><br>
            </div>
            <div class="buTTon">
                <input type="submit" value="Envoyer" name ="valider">
            </div>
            
            
        </form>
        <?php endforeach; ?>
    </div>
 </body>
</html>













