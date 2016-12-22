<html>
<?php
    session_start();
   if(empty($_SESSION['id'])){
		header("Location: ../index.php");
		die();
	}
	include '../include/connexionbdd.php';
	date_default_timezone_set('Africa/Lagos');
	
    $mdp=crypt($_POST['mdp'],'$2a$11$'.md5($_POST['mdp'])).'$%';

	
	if($_GET["etape"]==1){
		$sqlInsert="INSERT INTO user VALUES(DEFAULT,?,'".$mdp."')";
	
		$prepareInsert=mysqli_prepare($link,$sqlInsert);
		$tmp=$_POST['cde'];
		mysqli_stmt_bind_param($prepareInsert,'s',$tmp);
		
		$sqlDel2="UPDATE producteur SET EtatProd=1, CodeSite='".$_POST['cde']."' WHERE IdProducteur=?";
		$prepareDel2=mysqli_prepare($link,$sqlDel2);
		mysqli_stmt_bind_param($prepareDel2,'s',$_GET['cdeProd']);
		if(mysqli_stmt_execute($prepareInsert) and mysqli_stmt_execute($prepareDel2)){
			echo utf8_encode("Tout s'est bien passé, le producteur a été ajouté.... ");
		}
		else{
			echo "Erreur.... ";
		}
	}
	
	else if($_GET["etape"]==2){
		$sqlUpdate="UPDATE user SET MdpUser='".$mdp."' WHERE CodeUser=?";
	
		$prepareUpdate=mysqli_prepare($link,$sqlUpdate);
		mysqli_stmt_bind_param($prepareUpdate,'s',$_GET['cdeSite']);
		
		$sqlUpdate2="UPDATE producteur SET EtatProd=1 WHERE IdProducteur=?";
		$prepareUpdate2=mysqli_prepare($link,$sqlUpdate2);
		mysqli_stmt_bind_param($prepareUpdate2,'s',$_GET['cdeProd']);
		if(mysqli_stmt_execute($prepareUpdate) and mysqli_stmt_execute($prepareUpdate2)){
		echo utf8_encode("Tout s'est bien passé, le producteur a été ajouté.... ");
		}
		else{
			echo "Erreur.... ";
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
window.setTimeout("document.form.time.value='0';location=('./accueil.php');",4000)
</script>

<center><FORM METHOD=POST name="form">
<br><br><br><b>  <br><br> 
<?php

?>
<br><br> Veuillez-patienter <INPUT TYPE="text" NAME="time" size="1" style="border: 0px outset #e8e8e8; color:#000000; background-color:#e8e8e8">secondes. Redirection en cours... </b>



</FORM> </center>
</html>