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
    <h1>Informations des producteurs</h1>	
    
    
	<!--Code php pour afficher toutes les informations du producteur ainsi que ses vergers-->
	<?php
		//inclusion du fichier qui contient la connexion a la bdd  
		include '../include/connexionbdd.php';
		
		//Requete sql des infos du client
		$sqlInfosClient="SELECT * FROM producteur ";
		//on prepare la requete sql
		$prepareInfosClient=mysqli_prepare($link,$sqlInfosClient);
		
		//execution de la requete
		mysqli_stmt_execute($prepareInfosClient);
        
		//crée un objet dans lequel va etre stocké les valeurs de la requete
        $resuReqInfosClient = mysqli_stmt_get_result($prepareInfosClient);

        //stocke toutes les valeurs dans un tableau
        $listeInfosCient = mysqli_fetch_all($resuReqInfosClient);
		
		echo "<table>";
		echo utf8_encode("<tr><td>Code du producteur dans la base de données</td><td>Nom de la société</td><td>Adresse de la société</td><td>Agriculture Biologique</td><td>Nom du responsable</td><td>Prénom du responsable</td><td>Code sur le site</td></tr>");
		foreach($listeInfosCient as $l){
			echo "<tr><td>".$l[0]."</td><td>".$l[1]."</td><td>".$l[2]."</td><td>";
			
			if ($l[3]==0)
				echo "Non";
			else
				echo "Oui"; 
			
			echo "</td><td>".$l[4]."</td><td>".$l[5]."</td>";
			
			//si le prod exite dans le site
			if ($l[7]!="0")
				echo "<td>".$l[6]."</td><td><a href='./accueilSupprSAVE.php?cdeProd=".$l[0]."&cdeSite=".$l[6]."'>Supprimer du site internet</a></td>";
			else
				echo "<td>".$l[6]."</td><td><a href='./accueilCreeMdp.php?cdeProd=".$l[0]."&cdeSite=".$l[6]."'>Ajouter le producteur au site internet</a></td>"; 
			
			
			
			
			
			echo "</td></tr>";
			
		}
		
		
		
	?>
	
</body>

</html>
