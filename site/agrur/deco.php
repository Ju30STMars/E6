<?php
    // demarrage session
    session_start();

    // suppression des donn�es de la session
    session_unset();

    // Fermeture de la session
    session_destroy();

    // redirection vers l'index
    header('Location: ../index.php');
?>
