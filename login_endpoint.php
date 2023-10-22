<?php
// Inclure le fichier de configuration de la base de données
include('connect.php');

if (isset($_POST['login'])) {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hacher le mot de passe pour la comparaison
    $hashedPassword = hash('sha256', $password);

    // Vérifier les informations d'identification de l'utilisateur dans la base de données
    $query = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss', $email, $hashedPassword);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Les informations d'identification sont valides, connectez l'utilisateur
        // Vous pouvez rediriger l'utilisateur vers la page appropriée après la connexion
        header('Location:dashboard.php');
        exit();
    } else {
        // Les informations d'identification sont invalides, afficher un message d'erreur
        ?>

        <!DOCTYPE html>
        <html lang="fr" class="">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Flash</title>
            <link href="css/output.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet">
        </head>
        <body>
            <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    Identifiants invalides. Veuillez réessayer.
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                    </svg>
                </button>
            </div>
            <meta http-equiv="refresh" content="3;url=login.php">
        </body>
        </html>

        <?php
    }

    // Fermer la requête
    $stmt->close();
}

// Fermer la connexion à la base de données
$mysqli->close();
?>
