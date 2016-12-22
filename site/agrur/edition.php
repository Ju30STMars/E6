<?php
    session_start();
   if(empty($_SESSION['id'])){
		header("Location: ../index.php");
		die();
	}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" >

<head>
	<title>Edition des commandes</title>
	<link href="../css/style.css" rel="stylesheet"/>
</head>



<body>

	<!--tete avec le logo -->
	<header>
		<br>
		<img id="logo" src="../image/AgrurLogo2.png" alt="Logo Agrur"/>
        <h1>Agrur</h1>
	</header>


	<!--Barre laterale gauche de navigation-->
    <?php
	include './menu.php';
	include '../include/connexionbdd.php';
	?>
    
    <!--Intitulé de la page-->
    <h1>Listes des commandes</h1>	
    
    
	<!--Code php-->
	<center><table><tr><td>Num&eacute;ro de commande</td><td>Client</td><td>Facture</td></tr>
	<?php
	
		/*** RECUPERATION DES COMMANDEs ***/
		//Requete sql des infos sur les commandes
		$sqlInfosCommande="SELECT * FROM commande com, client cli, lot l WHERE com.IdClient=cli.IdClient AND l.IdLot=com.IdLot ";
		$listeInfosCommande = ExecReq($link,$sqlInfosCommande);
		foreach($listeInfosCommande as $l){
			echo "<tr><td>".$l['IdCommande']."</td><td>".$l['NomClient']."</td><td><a href='./pdf.php?lot=".$l['IdLot']."&com=".$l['IdCommande']."&cli=".$l['IdClient']."'>Facture ici</a></td></tr>"; 
		}
		
		
	?>
	</table></center>
	
	
</body>

</html>
