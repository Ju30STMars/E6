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
    <h1>Informations personnelles</h1>	
    
    
	<!--Code php-->
	<?php
		//inclusion du fichier qui contient la connexion a la bdd  
		include '../include/connexionbdd.php';
		
		//on crée la requete sql avec les ? pour les champs remplis après
		$sqlUpdate="UPDATE producteur SET NomSociete=?, AdresseSociete=?, NomResponsable=?, PrenomResponsable=?, AgriBio=?  WHERE CodeSite='".$_SESSION['id']."'";
		
		//on prepare/connecte la requete sql avec la bdd
		$prepareUpdate=mysqli_prepare($link,$sqlUpdate);
		//on remplace les  ? par 4 string (d'ou le ssss) par les variables après récupérés en méthode post

		mysqli_stmt_bind_param($prepareUpdate,'sssss',$_POST['NomSociete'],$_POST['AdresseSociete'],$_POST['NomResponsable'],$_POST['PrenomResponsable'],$_POST['AgriBio']);

		if(mysqli_stmt_execute($prepareUpdate)){
			echo "<center>Changement eff&eacute;ctu&eacute;<br></center>";
		}
		else{
			echo "<center>Erreur lors de la modification<br></center>";
		}
		
		echo utf8_encode("<a href='./accueil.php'>Retour à vos informations</a>");
		
	?>
	
	
</body>

</html>
