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
		

		
	?>
	
	
</body>

</html>
