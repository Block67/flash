<?php
// Détruire la session existante (s'il y en a une)
session_start();
session_destroy();

// Rediriger l'utilisateur vers la page de connexion ou une autre page appropriée après la déconnexion
header('Location: index.php');
exit();
?>
