<html>
<?php
    session_start();
   if(empty($_SESSION['id'])){
		header("Location: ../index.php");
		die();
	}
	include '../include/connexionbdd.php';
	
	date_default_timezone_set('Europe/Paris');
	//insertion dans la bdd de la livraison
	$sqlInsert="INSERT INTO livraison VALUES (DEFAULT,?,?,?,?)";
	$prepareInsert=mysqli_prepare($link,$sqlInsert);
	//mise en forme de la date
	$date=date("Y-m-d",strtotime($_POST['date']));
	mysqli_stmt_bind_param($prepareInsert,'ssss',$date,$_POST['type'],$_POST['quantite'],$_POST['verge']);

	
	
?>



<!--PETIT TRUC SYMPA POUR LA REDIRECTION-->

<body bgcolor = '#e8e8e8' style='background-position:center' ALINK = black LINK = black VLINK = black>
</body>
<script LANGUAGE="JavaScript">
window.setTimeout("document.form.time.value='3'",1000)
window.setTimeout("document.form.time.value='2'",2000)
window.setTimeout("document.form.time.value='1'",3000)
window.setTimeout("document.form.time.value='0';location=('./livraison.php');",4000)
</script>
	
<center><FORM METHOD=POST name="form">
<br><br><br><b>  <br><br> 
<?php

if(mysqli_stmt_execute($prepareInsert)  ){
		//insertion dans la bdd du lot
		$sqlLot="INSERT INTO lot VALUES (DEFAULT,?,?)";
		$prepareLot=mysqli_prepare($link,$sqlLot);
		//on recupère l'id de la livraison
		$UID=mysqli_insert_id($link);
		mysqli_stmt_bind_param($prepareLot,'ss',$_POST['cal'],$UID);
		
		if(mysqli_stmt_execute($prepareLot)){
			echo utf8_encode("Tout s'est bien passé, la livraison a été ajouté.... ");
		}
		else{
			echo "Erreur.... ";
		}
	}
	else{
		echo "Erreur.... ";
	}
?>
<br><br> Veuillez-patienter <INPUT TYPE="text" NAME="time" size="1" style="border: 0px outset #e8e8e8; color:#000000; background-color:#e8e8e8">secondes. Redirection en cours... </b>



</FORM> </center>
</html>