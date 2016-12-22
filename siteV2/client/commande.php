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
	<title>Passer commande</title>
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
	?>
    
    <!--Intitulé de la page-->
    <h1>Passer une commande</h1><h1>S&eacute;lection du lot de provenance</h1>	
    
    
	<!--Code php-->
	<?php
		include '../include/connexionbdd.php';

		
	?>
	
	<form>
	<center>
	<table>
		<tr><td>Num&eacute;ro de lot</td><td>Calibre</td><td>Date de d&eacute;pot</td><td>Quantit&eacute;</td><td>Nom du verger</td><td>Type de produit</td><td>Selectionner ce produit</td></tr>
			<?php
				date_default_timezone_set('Europe/Paris');
				/*** RECUPERATION DES LOT ET INFOS ***/
				//Requete sql des infos des lot et autres....
				$sqlInfos="SELECT * FROM lot, livraison liv, verger verg, producteur p, variete vari, commune c WHERE lot.IdLivraison=liv.IdLivraison AND liv.IdVerger=verg.IdVerger AND verg.IdVariete=vari.IdVariete AND verg.IdCommune=c.IdCommune AND verg.IdProducteur=p.IdProducteur AND lot.IdLot NOT IN (SELECT IdLot FROM commande)";
				$listeInfos=ExecReq($link,$sqlInfos);

				foreach($listeInfos as $l){
					$date=date("d/m/Y",strtotime($l['DateLivraison']));
					echo "<tr><td>".$l['IdLot']."</td><td>".$l['Calibre']."</td><td>".$date."</td><td>".$l['Quantite']."</td><td>".$l['NomVerger']."</td><td>".$l['Libelle']."</td><td><a href='./commandeStep2.php?lot=".$l['IdLot']."&qte=".$l['Quantite']."'>Continuer avec ce produit</a></td></tr>";
				}
				
			?>
			
		
		
		
	</table>
	<input type='submit' value='Enregistrer'>
	</center>
	</form>
	
</body>

</html>
