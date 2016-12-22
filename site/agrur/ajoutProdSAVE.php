<html>
<?php
    session_start();
   if(empty($_SESSION['id'])){
		header("Location: ../index.php");
		die();
	}
	include '../include/connexionbdd.php';
	$sqlUpdate="INSERT INTO producteur VALUES(DEFAULT,?,?,?,?,?,'',0)";
		
		//on prepare/connecte la requete sql avec la bdd
		$prepareUpdate=mysqli_prepare($link,$sqlUpdate);
		//on remplace les  ? par 4 string (d'ou le ssss) par les variables après récupérés en méthode post

		mysqli_stmt_bind_param($prepareUpdate,'sssss',$_POST['NomSociete'],$_POST['AdresseSociete'],$_POST['AgriBio'],$_POST['NomResponsable'],$_POST['PrenomResponsable']);

		if(mysqli_stmt_execute($prepareUpdate)){
			echo "<center>Ajout eff&eacute;ctu&eacute;<br></center>";
		}
		else{
			echo "<center>Erreur lors de l'ajout<br></center>";
		}
	
?>



<!--PETIT TRUC SYMPA POUR LA REDIRECTION-->

<body bgcolor = '#e8e8e8' style='background-position:center' ALINK = black LINK = black VLINK = black>
</body>

<script LANGUAGE="JavaScript">
window.setTimeout("document.form.time.value='3'",1000)
window.setTimeout("document.form.time.value='2'",2000)
window.setTimeout("document.form.time.value='1'",3000)
window.setTimeout("document.form.time.value='0';location=('./accueil.php');",4000)
</script>

<center><FORM METHOD=POST name="form">
<br><br><br><b>  <br><br> 
<?php

?>
<br><br> Veuillez-patienter <INPUT TYPE="text" NAME="time" size="1" style="border: 0px outset #e8e8e8; color:#000000; background-color:#e8e8e8">secondes. Redirection en cours... </b>



</FORM> </center>
</html>