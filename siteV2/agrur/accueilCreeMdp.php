<?php
// on verifie si le prod a un code sur le site, c'est a dire si le prod a deja eu un compte
//si oui
if(isset($_GET['cdeSite'])){
	
	//Si le code du site est "" alors on ajoute simplement le mot de passe... etape 1
	if($_GET['cdeSite']==""){
		echo '<form action="accueilAjoutSAVE.php?cdeProd='.$_GET['cdeProd'].'&etape=1" method="post">
		Code du client : <br>
		<input type="text" name="cde" id="cde" required><br>
		
		Mot de passe : <br>
		<input type="password" name="mdp" id="mdp" required><br>
		Entrez de nouveau le mot de passe : <br>
		<input type="password" name="mdp2" id="mdp2" required><br>
	  
	  
		<input type="submit" value="Submit">';
	}
	
	else{
		echo '<form action="accueilAjoutSAVE.php?cdeProd='.$_GET['cdeProd'].'&cdeSite='.$_GET['cdeSite'].'&etape=2" method="post">
		
		Mot de passe : <br>
		<input type="password" name="mdp" id="mdp" required><br>
		Entrez de nouveau le mot de passe : <br>
		<input type="password" name="mdp2" id="mdp2" required><br>
	  
	  
		<input type="submit" value="Submit">';
	}
}
//sinon on met ce formulaire avec l'etape 3... 
else{
	
	echo '<form action="accueilAjoutSAVE.php?cdeProd='.$_GET['cdeProd'].'&etape=3" method="post">
	Code du client : <br>
	<input type="text" name="cde" id="cde" required><br>
	
	Mot de passe : <br>
	<input type="password" name="mdp" id="mdp" required><br>
	Entrez de nouveau le mot de passe : <br>
	<input type="password" name="mdp2" id="mdp2" required><br>
  
  
	<input type="submit" value="Submit">';
	
}


?>