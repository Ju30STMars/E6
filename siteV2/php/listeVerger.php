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
	<title>Accueil</title>
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
    <h1>Informations sur les vergers</h1>	
    
    
	<!--Code php-->
	<?php
		//inclusion du fichier qui contient la connexion a la bdd  
		include '../include/connexionbdd.php';
		
		
		/*** RECUPERATION DE L'IdProducteur ***/
		//Requete sql des infos du client
		$sqlInfosClient="SELECT IdProducteur FROM producteur WHERE CodeSite='".$_SESSION['id']."'";
		$listeInfosCient = ExecReq($link,$sqlInfosClient);
		
		/*** RECUPERATION DES VERGERS ***/
		//Requete sql des infos des vergers
		$sqlVerger="SELECT * FROM verger WHERE IdProducteur=".$listeInfosCient[0]["IdProducteur"]."";
		$listeVerger=ExecReq($link,$sqlVerger);
		
		echo "<ul>";
		foreach($listeVerger as $v){
			echo "<li><h4>Code du verger : ".$v['IdVerger']."</h4></li>";
			echo "<li>Nom du verger : ".$v['NomVerger']."</li>";
			echo "<li>Superficie du verger : ".$v['SuperficieVerger']."</li>";
			echo "<li>Arbres du verger : ".$v['Arbres']."</li>";
			echo "<li>Nombre d'hectars : ".$v['Hectar']."</li>";
			
			
			/*** RECUPERATION DES varietes			***/
			//Requete sql des infos des varietes
			$sqlVariete="SELECT Libelle FROM variete WHERE IdVariete=".$v['IdVariete']."";
			$variete=ExecReq($link,$sqlVariete);
			echo "<li>Variete : ".$variete[0]['Libelle']."</li>";
			
			/*** RECUPERATION DES communes			***/
			//Requete sql des infos des communes
			$sqlCommune="SELECT Nom FROM commune WHERE IdCommune=".$v['IdCommune']."";
			$commune=ExecReq($link,$sqlCommune);
			echo "<li>Variete : ".$commune[0]['Nom']."</li><br><br><br><br><br>";
			
		}

		
	?>
	
	
</body>

</html>
