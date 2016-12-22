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
	<title>Ajouter un producteur</title>
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
    <h1>Ajouter un producteur</h1>	
    
    
	<!--Code php-->
	<form method="post" action="ajoutProdSAVE.php">
	<?php
		
		echo "<ul>";
		
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Nom du producteur : <br><textarea required name='NomSociete' rows='2' cols='50'></textarea></li>";
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Adresse du producteur : <br><textarea required name='AdresseSociete' rows='2' cols='50'></textarea></li>";
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Nom du responsable de la societe : <br><textarea required name='NomResponsable' rows='2' cols='50'></textarea></li>";
		echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Prenom du responsable de la societe : <br><textarea required name='PrenomResponsable' rows='2' cols='50'></textarea></li>";
		//echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;Code du producteur sur le site : <br><input type='text' name='cdeSite' required></li>";
		echo "<li>Agriculture Bio : <SELECT name=AgriBio>";
			echo "<OPTION value=0>Non
				<OPTION selected value=1>Oui";
		echo "</SELECT> </li>";
		
		echo "<center><input type='submit' value='Enregistrer'></center>";
		echo "</ul>";
		
	?>
	
	
</body>

</html>
