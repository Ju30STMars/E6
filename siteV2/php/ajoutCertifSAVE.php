<html>
<?php
    session_start();
   if(empty($_SESSION['id'])){
		header("Location: ../index.php");
		die();
	}
	include '../include/connexionbdd.php';
	
	//insertion dans la bdd
	$sqlInsert="INSERT INTO avoir VALUES (NOW(),?,?,?)";


	$prepareInsert=mysqli_prepare($link,$sqlInsert);
	mysqli_stmt_bind_param($prepareInsert,'sss',$_GET['certif'],$_GET['adh'],$_GET['prod']);

	
?>



<!--PETIT TRUC SYMPA POUR LA REDIRECTION-->

<body bgcolor = '#e8e8e8' style='background-position:center' ALINK = black LINK = black VLINK = black>
</body>
<script LANGUAGE="JavaScript">
window.setTimeout("document.form.time.value='3'",1000)
window.setTimeout("document.form.time.value='2'",2000)
window.setTimeout("document.form.time.value='1'",3000)
window.setTimeout("document.form.time.value='0';location=('./certif.php');",4000)
</script>
	

<center><FORM METHOD=POST name="form">
<br><br><br><b>  <br><br> 
<?php
if(mysqli_stmt_execute($prepareInsert)){
		echo utf8_encode("Tout s'est bien passé, la certification a été ajouté.... ");
	}
	else{
		echo "Erreur.... ";
	}
?>
<br><br> Veuillez-patienter <INPUT TYPE="text" NAME="time" size="1" style="border: 0px outset #e8e8e8; color:#000000; background-color:#e8e8e8">secondes. Redirection en cours... </b>



</FORM> </center>
</html>