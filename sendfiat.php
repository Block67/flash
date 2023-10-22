<?php
include('connect.php');

$successMessage = $errorMessage = ''; // Initialisation des messages

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
    try {
        $from_country = htmlspecialchars($_POST['from_country']);
        $to_country = htmlspecialchars($_POST['to_country']);
        $network = htmlspecialchars($_POST['network']);
        $bitcoin_address = htmlspecialchars($_POST['bitcoin_address']);
        $amount_xof = htmlspecialchars($_POST['amount_xof']);
        $amount_sat = htmlspecialchars($_POST['amount_sat']);
        

        // Préparez votre requête SQL d'insertion avec le statut
        $sql = "INSERT INTO sendfiat (from_country, to_country, network, bitcoin_address, amount_xof, amount_sat) VALUES (?, ?, ?, ?, ?, ?)";

        // Préparez les valeurs à insérer
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ssssss', $from_country, $to_country, $network, $bitcoin_address, $amount_xof, $amount_sat);
        $stmt->execute();

        // Ajoutez la logique de la requête cURL ici

        $lnbits_url = "https://legend.lnbits.com/api/v1/payments";
        $lnbits_api_key = "2b11ca52df474d5dae31c0c977e2a7cf";

        $invoice_amount = $amount_sat; // Utilisez le montant de satoshis calculé précédemment
        $invoice_description = "flash";

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

        // Traitez le résultat de la requête
        if ($httpcode === 201) {
            $lnbits_invoice = json_decode($result, true);
            // Redirigez l'utilisateur vers la page de paiement LNbits avec la nouvelle facture
            $payment_request = $lnbits_invoice['payment_request']; // ou 'payment_hash' selon la réponse
            header("Location: pay.php?payment_request=" . $payment_request);
            exit();
        } else {
            // Gérez les erreurs de requête
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
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="country">
                        Select Country
                    </label>
                    <select name="from_country" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                        <option value="" disabled selected>Select Country</option>
                        <option value="benin">Benin</option>
                        <option value="togo">Togo</option>
                        <option value="burkina">Burkina</option>
                        <option value="ivory_cost">Ivory Cost</option>
                        <!-- Ajoutez d'autres options comme nécessaire -->
                    </select>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="to">
                        To
                    </label>
                    <select name="to_country" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                        <option value="" disabled selected>Select Country</option>
                        <option value="benin">Benin</option>
                        <option value="togo">Togo</option>
                        <option value="burkina">Burkina</option>
                        <option value="ivory_cost">Ivory Cost</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="network">
                        Select Network
                    </label>
                    <select name="network" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                        <option value="" disabled selected>Select Network</option>
                        <option value="mtn">MTN</option>
                        <option value="moov">MOOV</option>
                        <option value="celtis">CELTIS</option>
                        <!-- Ajoutez d'autres options comme nécessaire -->
                    </select>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="bitcoin-address">
                        Bitcoin Address (BTC/LN)
                    </label>
                    <input name="bitcoin_address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="Enter your Bitcoin address" required>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="amount-xof">
                        AmountXOF
                    </label>
                    <input name="amount_xof" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" type="text" placeholder="Enter amount in XOF" required>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="amount-sat">
                        Amount Sat To
                    </label>
                    <textarea name="amount_sat" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" placeholder="Sat" readonly></textarea>
                </div>
            </div>
            <input class="w-full px-8 py-2 rounded-lg font-medium bg-orange-500 text-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-orange-400 hover:bg-orange-600 transition-all duration-300 ease-in-out" type="submit" value="Continue" name="send" />
        </form>

    </div>

    <script>
        function calculateSatoshi() {
            var xhr = new XMLHttpRequest();
            var url = "https://api.yadio.io/exrates/XOF";
            xhr.open("GET", url, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    var xof_to_btc_rate = data["BTC"];
                    var amount_in_xof = parseFloat(document.getElementById("grid-state").value);
                    var equivalent_in_btc = amount_in_xof / xof_to_btc_rate;
                    var equivalent_in_satoshi = equivalent_in_btc * 100000000;
                    document.getElementById("grid-city").value = equivalent_in_satoshi;
                } else {
                    console.log("La requête a échoué.");
                }
            };
            xhr.send();
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById("grid-state").addEventListener('input', calculateSatoshi);
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