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
    

    
    
	<!--Code php-->
	<?php
		include '../include/connexionbdd.php';
		
		
		/*
			On va récuperer les infos des clients, et principalement l'IdProducteur
			ensuite on va verifier si on est un adhérent 
				Si le producteur n'est pas adhérent, alors on demande si le producteur veut devenir un adherent
				
				Sinon c'est qu'il est adhérent donc on fait le traitement suivant
				
					on verifie si le prod a deja des certifications
						Si oui alors on les affiches
						Sinon alors on n'affiche rien
					
					On liste toute les certifications que propose agrur, le prod doit cliquer sur un lien afin d'ajouter une certification
						Ce lien renvoie vers une Certifications page qui va sauvegarder la certification  et 
		
		
		*/
		
		
		/*** RECUPERATION DE L'IdProducteur ***/
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
		
		
	
		/*** VERIFICATION DE L'ADHERENCE (jeu de mot) ***/
		$sqlAdh="SELECT IdAdh, DateAdh FROM adherent WHERE IdProducteur=".$listeInfosCient[0][0]."";
		//on prepare la requete sql
		$prepareAdh=mysqli_prepare($link,$sqlAdh);
		
		//execution de la requete
		mysqli_stmt_execute($prepareAdh);
        
		//crée un objet dans lequel va etre stocké les valeurs de la requete
        $resuReqAdh= mysqli_stmt_get_result($prepareAdh);

        //stocke toutes les valeurs dans un tableau
        $adh = mysqli_fetch_all($resuReqAdh);
		
		// s'il y a 0 ligne c'est que ce n'est pas un adhérent
		if(sizeof($adh)==0){
			echo utf8_encode("<center>Vous n'êtes pas adhérent</center>");
			echo '<form name="adh" method="POST" action="devenirAdh.php" onSubmit="if(!confirm(\'Voulez-vous vraiment devenir adh\351rent ?\')){return false;}">';
			echo utf8_encode("<center><INPUT type='submit' value='Cliquez ici pour devenir adérent'></center>");
			echo '</form>';
		}
		
		//SINON il est adherent
		else{
			$sqlCertif="SELECT A.DateCertif, A.IdCertif, A.IdAdh, C.NomCertif FROM avoir A, certification C WHERE A.IdCertif=C.IdCertif AND A.IdProducteur=".$listeInfosCient[0][0]."";
			//on prepare la requete sql
			$prepareCertif=mysqli_prepare($link,$sqlCertif);
			
			//execution de la requete
			mysqli_stmt_execute($prepareCertif);
			
			//crée un objet dans lequel va etre stocké les valeurs de la requete
			$resuReqCertif= mysqli_stmt_get_result($prepareCertif);

			//stocke toutes les valeurs dans un tableau
			$certif = mysqli_fetch_all($resuReqCertif, MYSQLI_ASSOC);
			if(sizeof($certif)>0){
				echo "<h1>Mes certifications</h1>";	
				
				echo "<table>";
				echo "<tr><td>Code de la certification</td><td>Nom de la certification</td><td>Supprimer des certifications</td></tr>";
				foreach($certif as $c){
					echo "<tr><td>".$c['IdCertif']."</td><td>".utf8_encode($c['NomCertif'])."</td><td><a href='./supprCertifSAVE.php?certif=".$certif[0]['IdCertif']."&prod=".$listeInfosCient[0][0]."&adh=".$adh[0][0]."'>Supprimer cette certification</a></td></tr>";
				}
				echo "</table><br><br><br><br><br><br><br><br><br>";
			}
			
			//selection de toutes les certifications sauf celles auquelles le producteur adhère deja
			$sqlAjout="SELECT * FROM certification WHERE IdCertif NOT IN (SELECT A.IdCertif FROM avoir A, certification C WHERE A.IdCertif=C.IdCertif AND A.IdProducteur=".$listeInfosCient[0][0].")";
			$prepareAjout=mysqli_prepare($link,$sqlAjout);
			
			//execution de la requete
			mysqli_stmt_execute($prepareAjout);
			
			//crée un objet dans lequel va etre stocké les valeurs de la requete
			$resuReqAjout= mysqli_stmt_get_result($prepareAjout);

			//stocke toutes les valeurs dans un tableau
			$ajout = mysqli_fetch_all($resuReqAjout, MYSQLI_ASSOC);
			if(sizeof($ajout)>0){
				echo "<h1>Ajout de certification</h1>";
				echo "<table>";
				echo "<tr><td>Code de la certification</td><td>Nom de la certification</td><td>Ajouter des certifications</td></tr>";
				foreach($ajout as $a){
					echo "<tr><td>".$a['IdCertif']."</td><td>".utf8_encode($a['NomCertif'])."</td><td><a href='./ajoutCertifSAVE.php?certif=".$a['IdCertif']."&prod=".$listeInfosCient[0][0]."&adh=".$adh[0][0]."'>Ajouter cette certification</a></td></tr>";
				}
				echo "</table>";
			}
		}
		
		
	?>
	
	
</body>

</html>
