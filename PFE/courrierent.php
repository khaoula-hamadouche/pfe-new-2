<?php

$conn = mysqli_connect('localhost','root','','courrier') or die('connection failed');
session_start();
$acc_name = $_SESSION['acc_name'];

if(!isset($acc_name)){
   header('location:index.php');
};



?> 


<!doctype html>
<html lang="fran">
<head>
    <meta charset="UTF-8" />
    <title>Courriers Entrants</title>
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
                 <a href="javascript:history.back()" >
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
            <h2> Les Courriers Entrants</h2>
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
    <?php

$sql = "SELECT * FROM `courrierarrive` WHERE distination = '$acc_name' OR sousdistination  = '$acc_name'";

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



         
?>

  </thead>
  <tbody>
 

            </tbody>

             
           
            </table>
     
            
        </form>
    </div>











    </body>
</html>
