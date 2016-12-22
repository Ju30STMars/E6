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
	<title>Livraisons</title>
	<link href="../css/style.css" rel="stylesheet"/>
</head>



<body>

	<!--tete avec le logo -->
	<header>
		<br>
		<img id="logo" src="../image/AgrurLogo2.png" alt="Logo Agrur"/>
        <h1>Agrur</h1>
		
		<!--POUR LE DATEPICKER C'EST ICI-->
		  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		  <link rel="stylesheet" href="/resources/demos/style.css">
		  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		  <script>
		  $( function() {
			$( "#datepicker" ).datepicker();
		  } );
		  </script>
	</header>


	<!--Barre laterale gauche de navigation-->
    <?php
	include './menu.php';
	?>
    
    <!--Intitulé de la page-->
    <h1>Livraisons</h1>	
    
    
	<!--Code php-->
	<?php
		include '../include/connexionbdd.php';
		
		
		
		/*** RECUPERATION DE L'IdProducteur ***/
		//Requete sql des infos du client
		$sqlInfosClient="SELECT IdProducteur FROM producteur WHERE CodeSite='".$_SESSION['id']."'";
		$listeInfosCient = ExecReq($link,$sqlInfosClient);
	
		/*** RECUPERATION DES VARIETES ***/
		//Requete sql des infos des varietes
		$sqlVariete="SELECT IdVariete, Libelle, aoc FROM variete";
		$listeVariete=ExecReq($link,$sqlVariete);
	
	
		/*** RECUPERATION DES CALIBRES ***/
		//Requete sql des infos des calibres
		$sqlCalibre="SELECT IdCalibre, NomCalibre FROM listecalibre";
		$listeCalibre=ExecReq($link,$sqlCalibre);
	
		/*** RECUPERATION DES VERGERS ***/
		//Requete sql des infos des vergers
		$sqlVerger="SELECT IdVerger, NomVerger FROM verger WHERE IdProducteur=".$listeInfosCient[0]["IdProducteur"];
		$listeVerger=ExecReq($link,$sqlVerger);
	
	
	
		echo '<form method="post" action="livraisonSAVE.php?prod='.$listeInfosCient[0]["IdProducteur"].'">';
		
		echo "<ul><br>";
		
		//choix du verger
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Choix du verger : <SELECT required name=verge>";
		foreach($listeVerger as $ve){
			echo "<OPTION value='".$ve['IdVerger']."'>".$ve['NomVerger']."</option>";
		}
		echo "</SELECT> </li><br>";
		
		//choix de la date de livraison
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Date de livraison : <input required type='text' name='date' id='datepicker'></li><br>";
		
		//choix du type de produit (variété)
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Type de produit : <SELECT required name=type>";
		foreach($listeVariete as $v){
			echo "<OPTION value='".$v['IdVariete']."'>".$v['Libelle'] ;
			if($v['aoc']==1){
				echo "   Aoc : Oui";
			}
			else{
				echo "   Aoc : Non";
			}
		echo "</option>";
		}
		echo "</SELECT> </li><br>";
		
		//choix de la quantité
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Quantit&eacute; (en kg) : <input required type='number' name='quantite' ></li><br>";
		
		//choix du calibre
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Calibre : <SELECT required name=cal>";
		foreach($listeCalibre as $c){
			echo "<OPTION value='".$c['NomCalibre']."'>".$c['NomCalibre']."</option>";
		}
		echo "</SELECT> </li><br>";
		
		echo "<br><center><input type='submit' value='Enregistrer'></center>";
		echo "</ul>";
		
		echo '</form>';
	?>
	
	
</body>

</html>
