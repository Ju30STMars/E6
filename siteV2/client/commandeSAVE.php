<html>
<?php
    session_start();
   if(empty($_SESSION['id'])){
		header("Location: ../index.php");
		die();
	}
	include '../include/connexionbdd.php';
	
	/*FONCTION qui permet d'executer toutes les requetes SELECT sans préparation*/
	function InsertConditionner($link,$q,$a,$b){
		$sqlCon="INSERT INTO conditionner VALUES (".$q.",".$a.",".$b.")";
		$prepareCon=mysqli_prepare($link,$sqlCon);	
		mysqli_stmt_execute($prepareCon);
	}
	
	/*** RECUPERATION DE L'IdProducteur ***/
	//Requete sql des infos du client
	$sqlInfosClient="SELECT IdClient FROM client WHERE CodeClient='".$_SESSION['id']."'";
	$listeInfosCient = ExecReq($link,$sqlInfosClient);
	
	$sac=$_POST['sachet'];
	$fil=$_POST['filet'];
	$car=$_POST['carton'];
	
	$qSac=$_POST['qSachet'];
	$qFil=$_POST['qFilet'];
	$qCar=$_POST['qCarton'];
	
	$sqlCommande="INSERT INTO commande VALUES (DEFAULT,NOW(),'".$listeInfosCient[0]['IdClient']."',".$_GET['lot'].")";

	$prepareCommande=mysqli_prepare($link,$sqlCommande);
	//mysqli_stmt_bind_param($prepareCommande,'s',$_GET['lot']);
	
	if(mysqli_stmt_execute($prepareCommande)){
		$idCommande=mysqli_insert_id (  $link );
		if($qSac!=0){
			$sqlCommande="INSERT INTO typeconditionnement VALUES (DEFAULT,'Sachet','".$sac."')";
			$prepareCommande=mysqli_prepare($link,$sqlCommande);	
			mysqli_stmt_execute($prepareCommande);
			InsertConditionner($link,$qSac,$idCommande,mysqli_insert_id (  $link ));
		}
		if($qFil!=0){
			$sqlCommande="INSERT INTO typeconditionnement VALUES (DEFAULT,'Filet','".$fil."')";
			$prepareCommande=mysqli_prepare($link,$sqlCommande);
			mysqli_stmt_execute($prepareCommande);
			InsertConditionner($link,$qFil,$idCommande,mysqli_insert_id (  $link ));
		}
		if($qCar!=0){
			$sqlCommande="INSERT INTO typeconditionnement VALUES (DEFAULT,'Carton','".$fil."')";
			$prepareCommande=mysqli_prepare($link,$sqlCommande);
			mysqli_stmt_execute($prepareCommande);
			InsertConditionner($link,$qCar,$idCommande,mysqli_insert_id (  $link ));
		}
	}
	
?>



<!--PETIT TRUC SYMPA POUR LA REDIRECTION-->

<body bgcolor = '#e8e8e8' style='background-position:center' ALINK = black LINK = black VLINK = black>
</body>
<script LANGUAGE="JavaScript">
window.setTimeout("document.form.time.value='3'",1000)
window.setTimeout("document.form.time.value='2'",2000)
window.setTimeout("document.form.time.value='1'",3000)
window.setTimeout("document.form.time.value='0';location=('./commande.php');",4000)
</script>
	
<center><FORM METHOD=POST name="form">
<br><br><br><b>  <br><br> 
Commande OK

<br><br> Veuillez-patienter <INPUT TYPE="text" NAME="time" size="1" style="border: 0px outset #e8e8e8; color:#000000; background-color:#e8e8e8">secondes. Redirection en cours... </b>



</FORM> </center>
</html>