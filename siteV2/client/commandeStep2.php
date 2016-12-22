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
	<title>Passer commande</title>
	<link href="../css/style.css" rel="stylesheet"/>
</head>



<body>

	<!--tete avec le logo -->
	<header>
		<br>
		<img id="logo" src="../image/AgrurLogo2.png" alt="Logo Agrur"/>
        <h1>Agrur</h1>
		
		
		
		<script type="text/javascript">

		function verifQte(){
			var qSac = parseInt(document.getElementById("qSac").value); 
			var sac = parseInt(document.getElementById("sac").value); 
			var qFil = parseInt(document.getElementById("qFil").value); 
			var fil = parseInt(document.getElementById("fil").value); 
			var qCar = parseInt(document.getElementById("qCar").value); 
			var car = parseInt(document.getElementById("car").value); 
			var qteMax = parseInt(document.getElementById("qteLot").innerHTML*1000); 
			var btn = document.getElementById("btn");
			
			
			if(qteMax >= parseInt(qSac*sac)+parseInt(qFil*fil)+parseInt(qCar*car)){
				btn.disabled=false;
			}
			else{
				btn.disabled=true;
			}
			
		}

		</script>
	</header>


	<!--Barre laterale gauche de navigation-->
    <?php
	include './menu.php';
	?>
    
    <!--Intitulé de la page-->
    <h1>Passer une commande</h1>	
    <h1>Poids maximum de la commande : <div id="qteLot"><?php  echo $_GET['qte']?></div></h1>
    
	<!--Code php-->
	<?php
		include '../include/connexionbdd.php';
		
		echo '<form method="post"  action="commandeSAVE.php?lot='.$_GET['lot'].'&qte='.$_GET['qte'].'" onChange="verifQte()">';
		
	?>
	
	
	<center>
	<table>
		
		<tr><td>Pour les sachets</td><td>Pour les filets</td><td>Pour les cartons</td></tr>
		<tr>
			<td>
				<SELECT  id="sac" name="sachet" >
					<OPTION value="250">250g
					<OPTION value="500">500g
					<OPTION value="1000">1kg
				</SELECT>		
			</td>
			<td>
				<SELECT  id="fil" name="filet" >
					<OPTION value="1000">1kg
					<OPTION value="5000">5kg
					<OPTION value="10000">10kg
					<OPTION value="25000">25kg
				</SELECT>		
			</td>
			<td>
				<SELECT id="car" name="carton" >
					<OPTION  value="10000">10kg
				</SELECT>		
			</td>
		</tr>
		<tr>
			<td>
				 Quantit&eacute; de sachets : <input required id="qSac"  type='number' value=0 name='qSachet'>
			</td>
			<td>
				 Quantit&eacute; de filets : <input required  id="qFil" type='number' value=0 name='qFilet'>
			</td>
			<td>
				 Quantit&eacute; de cartons : <input required  id="qCar" type='number' value=0 name='qCarton'>
			</td>
		</tr>
		
		
		
	</table>
	<input type='submit' id="btn" value='Enregistrer'>
	</center>
	</form>
	
</body>

</html>
