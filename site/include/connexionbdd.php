<?php
	$link=new mysqli("localhost","root","root","etudecas");

	
	
	/*FONCTION qui permet d'executer toutes les requetes SELECT sans préparation*/
	function ExecReq($link,$sql){
		//preparation de la requete 
		$prepare=mysqli_prepare($link,$sql);
		//execution de la requete
		mysqli_stmt_execute($prepare);
		//crée un objet dans lequel va etre stocké les valeurs de la requete
        $resuReq= mysqli_stmt_get_result($prepare);
        //stocke toutes les valeurs dans un tableau
        return mysqli_fetch_all($resuReq,MYSQLI_ASSOC);
	}
?>