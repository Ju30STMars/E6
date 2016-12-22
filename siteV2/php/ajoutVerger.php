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
    
	<h1>Ajouter un verger</h1>
    
    
	<!--Code php-->
	<?php
		include '../include/connexionbdd.php';
		
		
		
		
		
		/*** RECUPERATION DE L'IdProducteur ***/
		//Requete sql des infos du client
		$sqlInfosClient="SELECT IdProducteur FROM producteur WHERE CodeSite='".$_SESSION['id']."'";
		$listeInfosCient = ExecReq($link,$sqlInfosClient);
		
		
		/*** RECUPERATION DES COMMUNES ***/
		//Requete sql des infos des communes
		$sqlCommune="SELECT IdCommune, Nom, aoc FROM commune";
        $listeCommune = ExecReq($link,$sqlCommune);
	

		/*** RECUPERATION DES VARIETES ***/
		//Requete sql des infos des varietes
		$sqlVariete="SELECT IdVariete, Libelle, aoc FROM variete";
		$listeVariete=ExecReq($link,$sqlVariete);
		
		
		
		echo '<form method="post" action="ajoutVergerSAVE.php?prod='.$listeInfosCient[0]["IdProducteur"].'">';
		
		
		echo "<ul>";
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Nom du verger : <br><textarea required name='NomVerger' rows='2' cols='50'></textarea></li>";
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Superficie du verger : <br><textarea  required name='SuperficieVerger' rows='2' cols='50'></textarea></li>";
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Type d'arbres : <br><textarea  required name='arbre' rows='2' cols='50'></textarea></li>";
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Nombre d'hectar : <br><textarea  required name='hectar' rows='2' cols='50'></textarea></li>";
		echo "<li>Commune du verger : <SELECT  required name=com>";
		foreach($listeCommune as $c){
			echo "<OPTION value='".$c['IdCommune']."'>".$c['Nom'] ;
			if($c['aoc']==1){
				echo "   Aoc : Oui";
			}
			else{
				echo "   Aoc : Non";
			}
		echo "</option>";
		}
		echo "</SELECT> </li>";
		
		
		echo "<li>Variete du verger : <SELECT  required name=var>";
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
		echo "</SELECT> </li>";
		
		echo "<center><input type='submit' value='Enregistrer'></center>";
		echo "</ul>";
	?>
	
	</form>
		
		
		
	
</body>

</html>
