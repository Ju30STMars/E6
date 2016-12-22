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
	<title>Certifications</title>
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
    <h1>Certificationss informations utiles</h1>	
    
    
	<!--Code php-->
	<?php
		//inclusion du fichier qui contient la connexion a la bdd  
		include '../include/connexionbdd.php';
		
		
		//Requete sql des infos du client
		$sqlInfosClient="SELECT IdProducteur FROM producteur WHERE CodeSite='".$_SESSION['id']."'";
		//on prepare la requete sql
		$prepareInfosClient=mysqli_prepare($link,$sqlInfosClient);
		
		//execution de la requete
		mysqli_stmt_execute($prepareInfosClient);
        
		//crée un objet dans lequel va etre stocké les valeurs de la requete
        $resuReqInfosClient = mysqli_stmt_get_result($prepareInfosClient);

        //stocke toutes les valeurs dans un tableau
        $listeInfosCient = mysqli_fetch_all($resuReqInfosClient);
		
		
		
		
		
		//on crée la requete sql avec les ? pour les champs remplis après
		$sqlInsertAdh="INSERT INTO adherent VALUES (DEFAULT, NOW(),'".$listeInfosCient[0][0]."')";

		//on prepare/connecte la requete sql avec la bdd
		$prepareInsertAdh=mysqli_prepare($link,$sqlInsertAdh);

		if(mysqli_stmt_execute($prepareInsertAdh)){
			echo utf8_encode("<center>Vous êtes maintenant adh&eacute;rent<br></center>");
		}
		else{
			echo "<center>Erreur lors de l'insertion<br></center>";
		}
		

		
	?>
	
	
</body>

</html>
