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
    
    <div class="contenu">
	
	
	<!--Code php pour afficher toutes les informations du producteur ainsi que ses vergers-->
	<?php
		//inclusion du fichier qui contient la connexion a la bdd  
		include '../include/connexionbdd.php';
		
		//Requete sql des infos du client
		$sqlInfosClient="SELECT * FROM producteur WHERE CodeSite='".$_SESSION['id']."'";
		//on prepare la requete sql
		$prepareInfosClient=mysqli_prepare($link,$sqlInfosClient);
		
		//execution de la requete
		mysqli_stmt_execute($prepareInfosClient);
        
		//crée un objet dans lequel va etre stocké les valeurs de la requete
        $resuReqInfosClient = mysqli_stmt_get_result($prepareInfosClient);

        //stocke toutes les valeurs dans un tableau
        $listeInfosCient = mysqli_fetch_all($resuReqInfosClient, MYSQLI_ASSOC);
		
		
		?>
		<form method="post" action="accueilSAVE.php">
		
		<?php
		echo "<ul>";
		
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Nom de votre societe : <br><textarea name='NomSociete' rows='2' cols='50'>".$listeInfosCient[0]['NomSociete']."</textarea></li>";
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Adresse de votre societe : <br><textarea name='AdresseSociete' rows='2' cols='50'>".$listeInfosCient[0]['AdresseSociete']."</textarea></li>";
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Nom du responsable de votre societe : <br><textarea name='NomResponsable' rows='2' cols='50'>".$listeInfosCient[0]['NomResponsable']."</textarea></li>";
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Prenom du responsable de votre societe : <br><textarea name='PrenomResponsable' rows='2' cols='50'>".$listeInfosCient[0]['PrenomResponsable']."</textarea></li>";
		echo "<li>Agriculture Bio : <SELECT name=AgriBio>";
		if($listeInfosCient[0]['AgriBio']==1){
			echo "<OPTION value=0>Non
				<OPTION selected value=1>Oui";
		}
		else{
			echo "<OPTION selected value=0>Non
				<OPTION value=1>Oui";
		}
		echo "</SELECT> </li><br>";
		
		echo "<center><input type='submit' value='Enregistrer'></center>";
		echo "</ul>";
	?>
	
	</form>
	</div>
</body>

</html>
