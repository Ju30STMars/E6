<?php
    //demarrage de la session
    session_start(); 
	
    //si la session est ouverte, on passe a la page d'accueil grace a l'id
    if(isset($_SESSION['id'])){
        header('Location: ./accueil.php');
        exit();
    }
    
    //inclusion du fichier qui contient la connexion a la bdd  
    include '../include/connexionbdd.php';
	
	
    //verification de connexion entre le site et la bdd
    if (mysqli_connect_errno()) {
		printf("&eacute;chec de la connexion : %s\n", mysqli_connect_error());
		exit();
    }
    
    $id=$_POST['id'];
    
    //codage du mot de passe
    $temp=$_POST['mdp'];
    $mdp=crypt($temp,'$2a$11$'.md5($temp)).'$%';
	
	//permet d'afficher le mot de passe pour le mettre manuellement dans la bdd
	//print_r($mdp);

   //on compte le nombre de ligne de cet utilisateur (normalement 1 seule)
    $sql="SELECT count(*) FROM agrur WHERE CodeAgr=? AND MdpAgr=?;";
        
    //preparation de la requete pour eviter les injection sql pas tres cool
    $prepare=mysqli_prepare($link,$sql);
    mysqli_stmt_bind_param($prepare,'ss',$id,$mdp);
        
	//execution de la requete
    mysqli_stmt_execute($prepare);
        
    //lecture des resultats et mise du resultat dans la variable $data
    mysqli_stmt_bind_result($prepare,$data);

    //redirection vers la page de connexion
    mysqli_stmt_fetch($prepare);
    
    if($data==0){
        header('Location: ../index.php');
        exit();
    }
    
    //ouverture de la session (les $_SESSION sont des sortes tableau ou il est permit de retenir des variables (comme là l'id et le mdp))
    $_SESSION['id']=$_POST['id'];
    $_SESSION['mdp']=$_POST['mdp'];

    //redirection vers la page d'acceuil perso
    if($data==1){
        header('Location: ./accueil.php');
        exit();
    }
?>