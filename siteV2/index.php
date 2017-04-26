<?php
    session_start(); 

    
	
	//inclusion de la connexion a la base de donnee
	include './include/connexionbdd.php';
	
	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" >

<head>
	<title>Connexion</title>
	<meta charset="UTF-8"/>
	<link href="./css/style.css" rel="stylesheet"/>
</head>



<body>

	<!--tete avec le logo -->
	<header>
		<br>
		<img id="logo" src="./image/AgrurLogo2.png" alt="Logo Agrur"/>
        <h1>Agrur</h1>
	</header>

    
	<!-- Tableau des differents choix possibles-->
	<h1 id='title'>Bienvenue sur notre site</h1>
	<table id="connexion">
		<!-- Premier formulaire-->
		<tr>
			<td>
				<!-- Formulaire de connexion qui ednvoie a la page du producteur-->
				<form method="post" action="./php/connexion.php">
					<p>Connexion &agrave; votre compte producteur</p>
					<p>Code utilisateur :</p>
					<input type="text" name="id" autofocus><br>
					<p>Mot de passe :</p>
					<input type="password" name="mdp"><br>
					<input type="submit" value="Connexion">
				</form>
                
			</td>
		</tr>
		<!--Deuxieme ligne avec les Certificationss options-->
		<tr>
			<td>
				<!-- Formulaire de connexion qui envoie a la page d'agrur-->
				<form method="post" action="./agrur/connexion2.php">
					<p>Connexion en tant que personnel d'Agrur</p>
					<p>Code utilisateur :</p>
					<input type="text" name="id" ><br>
					<p>Mot de passe :</p>
					<input type="password" name="mdp"><br>
					<input type="submit" value="Connexion">
				</form>
                
			</td>
		</tr>
		<tr>
			<td>
				<!-- Formulaire de connexion qui envoie a la page des clients-->
				<form method="post" action="./client/connexion3.php">
					<p>Connexion en tant que client d'Agrur</p>
					<p>Code utilisateur :</p>
					<input type="text" name="id" ><br>
					<p>Mot de passe :</p>
					<input type="password" name="mdp"><br>
					<input type="submit" value="Connexion">
				</form>
                
			</td>
		</tr>
	</table>
	
	
</body>

</html>
