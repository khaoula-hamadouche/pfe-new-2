<?php
session_start();

require("config/commande.php");


if(!isset($_GET['id'])){
    header("Location: afficher.php");
}

if(empty($_GET['id']) OR !is_numeric($_GET['id'])){
    header("Location: afficher.php");
}

if(isset($_GET['id'])){
    
    if(!empty($_GET['id']) OR is_numeric($_GET['id']))
    {
        $id = $_GET['id'];
        $prf = afficherUnPro($id);
    }
}


?>



<!doctype html>
<html lang="fran">
<head>
    <meta charset="UTF-8" />
    <title>Supprimer un compte</title>
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
        <?php foreach ($prf as $admin): ?>
        <form method="post">
            <h2> supprimer Profil</h2><br><br>
            <div >
            <center>Si vous etes sur que vous voulez supprimer ce utilisateur?</center> </div> <br><br>
            <div class="buTTon">
                <input type="submit" value="Oui" name ="valider">
            </div>
       
            
            
        </form>
        <?php endforeach; ?>
    </div>
 </body>
</html>

 <?php
   if(isset($_POST['valider'])){
    if(isset($_GET['id'])){

        if(!empty($_GET['id']) OR is_numeric($_GET['id'])){
        
        try{
            supprimerpro($id);
            header('Location: afficher1.php');
        }
        catch(Exception $e){
            $e->getMessage();
        }
        
        } 
    }
   }
?>
