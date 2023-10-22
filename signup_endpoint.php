<?php
// Inclure le fichier de configuration de la base de données
include('connect.php');

if (isset($_POST['signup'])) {
    // Récupérer les données du formulaire
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    // Hacher le mot de passe
    $hashedPassword = hash('sha256', $password);

    // Vérifier l'unicité de l'e-mail
    $query_check_email = "SELECT id FROM users WHERE email = ?";
    $stmt_check_email = $mysqli->prepare($query_check_email);
    $stmt_check_email->bind_param('s', $email);

    $stmt_check_email->execute();
    $stmt_check_email->store_result();

    if ($stmt_check_email->num_rows > 0) {
        // Afficher l'alerte si l'adresse e-mail est déjà associée à un compte existant
?>

        <!DOCTYPE html>
        <html lang="fr" class="">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Flash</title>
            <link href="css/output.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
        </head>

        <body>
            <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    L'adresse e-mail est déjà associée à un compte existant. Veuillez utiliser une autre adresse e-mail.
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <meta http-equiv="refresh" content="3;url=signup.php">
        </body>

        </html>

<?php
        $stmt_check_email->close();
        exit();
    }

    // Insérer les données dans la base de données
    $query = "INSERT INTO users (fullname, email, number, password) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssss', $fullname, $email, $number, $hashedPassword);

    if ($stmt->execute()) {
        // Rediriger vers la page de succès après l'inscription
        header('Location:succes.php');
        exit();
    } else {
        // Afficher un message d'erreur en cas d'échec de l'inscription
        echo 'Erreur lors de l\'inscription. Veuillez réessayer.';
    }

    // Fermer la requête
    $stmt->close();
}

// Fermer la connexion à la base de données
$mysqli->close();
?>