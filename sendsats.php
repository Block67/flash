<?php
session_start();
include('connect.php');
$successMessage = $errorMessage = ''; // Initialisation des messages

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
    try {

        $user_id = $_SESSION['user_id']; 
        $from_country = htmlspecialchars($_POST['from_country']);
        $to_country = htmlspecialchars($_POST['to_country']);
        $selected_network = htmlspecialchars($_POST['selected_network']);
        $number = htmlspecialchars($_POST['number']);
        $amount_sat = htmlspecialchars($_POST['amount_sat']);
        $amount_xof = htmlspecialchars($_POST['amount_xof']);

        // Préparez votre requête SQL d'insertion avec le statut
        $sql = "INSERT INTO sendsats (user_id,from_country, to_country, selected_network, number, amount_sat, amount_xof) VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Préparez les valeurs à insérer
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sssssss', $user_id, $from_country, $to_country, $selected_network, $number, $amount_sat, $amount_xof);
        $stmt->execute();


        $lnbits_url = "https://legend.lnbits.com/api/v1/payments";
        $lnbits_api_key = "2b11ca52df474d5dae31c0c977e2a7cf";

        $invoice_amount = $amount_sat;
        $invoice_description = "send_sats_with_flash";

        $data = array(
            'out' => false,
            'amount' => intval($invoice_amount),
            'memo' => $invoice_description
        );

        $payload = json_encode($data);

        $ch = curl_init($lnbits_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-Api-Key: ' . $lnbits_api_key
        ));

        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpcode === 201) {
            $lnbits_invoice = json_decode($result, true);
            // Redirigez l'utilisateur vers la page de paiement pay.php avec la nouvelle facture
            $payment_request = $lnbits_invoice['payment_request']; // ou 'payment_hash' selon la réponse
            header("Location: pay.php?payment_request=" . $payment_request);
            exit();
        } else {
            // Gestion des erreurs de requête
            $errorMessage = "Erreur lors de la création de la facture LNbits.";
        }

        $successMessage = "Dossier ajouté avec succès.";

        // Redirection vers une autre page après l'insertion
        // header("Location: pay.php");
        // exit();
    } catch (mysqli_sql_exception  $e) {
        // Gérez les erreurs de base de données ici
        $errorMessage = "Erreur de base de données : " . $e->getMessage();
    }
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash</title>
    <link href="css/output.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <header>
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 fixed top-0 w-full z-50">
            <div class="flex items-center justify-between mx-auto max-w-screen-xl">
                <div class="flex items-center">
                    <a href="index.php" class="flex items-center">
                        <img src="img/Logo Flash.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flash</span>
                    </a>
                </div>
                <div class="hidden lg:flex lg:items-center lg:w-auto" id="menu">
                    <ul class="flex items-center font-medium space-x-8">
                        <li>
                            <a href="index.php" class="text-primary-700 dark:text-white" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-700 hover:text-primary-700 dark:text-gray-400 dark:hover:text-white">Testinomie</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-700 hover:text-primary-700 dark:text-gray-400 dark:hover:text-white">FAQs</a>
                        </li>
                    </ul>
                </div>
                <div class="hidden lg:flex lg:items-center lg:w-auto">
                    <a href="login.php" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a>
                    <a href="signup.php" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Get started</a>
                </div>
                <div class="lg:hidden">
                    <button data-collapse-toggle="mobile-menu" type="button" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:text-gray-300" aria-controls="mobile-menu" aria-expanded="false">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="hidden" id="mobile-menu">
                <ul class="flex flex-col mt-4 font-medium">
                    <li>
                        <a href="index.php" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50">Testinomie</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50">FAQs</a>
                    </li>
                    <li>
                        <a href="login.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50">Log in</a>
                    </li>
                    <li>
                        <a href="signup.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50">Get started</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    </br></br></br>
    <div class="mt-20 px-4 sm:px-6 lg:px-4">
        <form action="" method="post" class="w-full max-w-lg mx-auto">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="country" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Select Country
                    </label>
                    <select name="from_country" id="country" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                        <option value="" disabled selected>Select Country</option>
                        <option value="Benin">Benin</option>
                        <option value="Togo">Togo</option>
                        <option value="Burkina">Burkina</option>
                        <option value="ivory_coast">Ivory Coast</option>
                    </select>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="to" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">To</label>
                    <select name="to_country" id="to" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                        <option value="" disabled selected>Select Country</option>
                        <option value="benin">Benin</option>
                        <option value="togo">Togo</option>
                        <option value="burkina">Burkina</option>
                        <option value="ivory_coast">Ivory Coast</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <label for="network" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Select Network</label>
                    <select name="selected_network" id="network" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                        <option value="" disabled selected>Select Network</option>
                        <option value="mtn">MTN</option>
                        <option value="moov">MOOV</option>
                        <option value="celtis">CELTIS</option>
                    </select>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label for="number" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Number</label>
                    <input name="number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="number" type="text" placeholder="Enter your number" required>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="amount_sat" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Amount Sat To</label>
                    <input name="amount_sat" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="amount-sat" type="text" placeholder="Enter amount in Sat" required>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="amount_xof" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">AmountXOF</label>
                    <textarea name="amount_xof" readonly class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="amount-xof" placeholder="XOF" required></textarea>
                </div>

            </div>
            <input class="w-full px-8 py-2 rounded-lg font-medium bg-orange-500 text-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-orange-400 hover:bg-orange-600 transition-all duration-300 ease-in-out" type="submit" value="Continue" name="send" />
        </form>
    </div>
    <script>
        function calculateXOF() {
            var xhr = new XMLHttpRequest();
            var url = "https://api.yadio.io/exrates/XOF";
            xhr.open("GET", url, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    var xof_to_btc_rate = data["BTC"];
                    var amount_in_satoshi = parseFloat(document.getElementById("amount-sat").value);
                    var equivalent_in_btc = amount_in_satoshi / 100000000;
                    var equivalent_in_xof = equivalent_in_btc * xof_to_btc_rate;
                    document.getElementById("amount-xof").value = equivalent_in_xof;
                } else {
                    console.log("La requête a échoué.");
                }
            };
            xhr.send();
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById("amount-sat").addEventListener('input', calculateXOF);
        });
    </script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <style>
        .input-group {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .input-group label {
            width: 30%;
        }

        .input-group input,
        .input-group select {
            width: 70%;
        }
    </style>
</body>

</html>