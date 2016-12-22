<html>
<?php
    session_start();
   if(empty($_SESSION['id'])){
		header("Location: ../index.php");
		die();
	}
	include '../include/connexionbdd.php';
	date_default_timezone_set('Africa/Lagos');
	
    $mdp=crypt(date("Y-m-d H:i:s"),'$2a$11$'.md5(date("Y-m-d H:i:s"))).'$%';
	
	//modif de la bdd
	$sqlDel="UPDATE user SET MdpUser='".$mdp."' WHERE CodeUser=?";
	
	$prepareDel=mysqli_prepare($link,$sqlDel);
	mysqli_stmt_bind_param($prepareDel,'s',$_GET['cdeSite']);
	
	$sqlDel2="UPDATE producteur SET EtatProd=0 WHERE IdProducteur=?";
	$prepareDel2=mysqli_prepare($link,$sqlDel2);
	mysqli_stmt_bind_param($prepareDel2,'s',$_GET['cdeProd']);
	
	

	
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

if(mysqli_stmt_execute($prepareDel) and mysqli_stmt_execute($prepareDel2)){
		echo utf8_encode("Tout s'est bien passé, le producteur a été supprimé.... ");
	}
	else{
		echo "Erreur.... ";
	}



?>
<br><br> Veuillez-patienter <INPUT TYPE="text" NAME="time" size="1" style="border: 0px outset #e8e8e8; color:#000000; background-color:#e8e8e8">secondes. Redirection en cours... </b>



</FORM> </center>
</html>