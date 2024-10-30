<?php
session_start(); // Démarrer la session

// Afficher les erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'logic.php';

// Définir le chemin du fichier de log
$logFile = __DIR__ . '/logs.txt';

// Initialiser la liste des pays exclus s'il n'existe pas encore
if (!isset($_SESSION['excludedCountries'])) {
    $_SESSION['excludedCountries'] = [];
}

// Vérifier si le formulaire a été soumis et traiter la réponse
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $country = $_POST["country"];
    $userInput = trim($_POST["capital"]);
    $userInput = strtolower($userInput);
    $correctCapitals = $_SESSION['correctCapitals'];

    logMessage("********** Nouvel appel *******", $logFile);
    logMessage("Formulaire soumis pour le pays $country", $logFile);
    logMessage("Entrée utilisateur: $userInput", $logFile);

    $message = checkCapital($userInput, $correctCapitals);
    logMessage("Message de réponse: $message", $logFile);

    if (strpos($message, "orrect") !== false) {
        // Ajouter le pays actuel à la liste des pays exclus
        $_SESSION['excludedCountries'][] = $country;
        logMessage("Capital correctement trouvé, pays exclu: $country", $logFile);
    } else {
        // Log que la réponse était fausse et que le pays reste dans la liste
        logMessage("Mauvaise réponse, le pays reste dans la liste: $country", $logFile);
    }
}

// Sélectionner un nouveau pays
$countryWithCapital = getRandomCountry($_SESSION['excludedCountries']);

// Vérifier que getRandomCountry() a retourné un tableau valide
if (!$countryWithCapital) {
    // Réinitialiser la liste des pays exclus si tous les pays ont été utilisés
    $_SESSION['excludedCountries'] = [];
    $countriesLeft = 0;
    $message = "Félicitations ! Vous avez trouvé toutes les capitales.";
    logMessage("Jeu terminé. Toutes les capitales ont été trouvées.", $logFile);
    $country = null;
} else {
    // Extraire les valeurs du tableau retourné
    $country = array_keys($countryWithCapital)[0];// Pays sélectionné
    $countriesLeft = $countryWithCapital["left"];// Nombre de pays restants
    $correctCapitals = $countryWithCapital[$country];// Capitales correctes
    // Stocker les capitales correctes dans la session
    $_SESSION['correctCapitals'] = $correctCapitals;
    if (!empty($country)) {
        // Log des valeurs initiales 
        logMessage("Prochain pays: $country, capitales attendus : " . implode(", ", $correctCapitals), $logFile);
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu des capitales</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script>
        // Script pour remettre le focus sur le champ de saisie après le rechargement de la page
        window.onload = function() {
            document.getElementById('capitalInput').focus();
        }
    </script>
</head>
<body>
    <h1>Quelle est la capitale de ce pays:<br><?php echo $country; ?> ?</h1>
    <form method="post">
        <input type="hidden" name="country" value="<?php echo $country; ?>">
        <input type="text" id="capitalInput" name="capital" required>
        <button type="submit">Soumettre</button>
    </form>
    <div class="message">
        <?php
        if (isset($message)) {
            echo "<p>$message</p>";
        }
        ?>
    </div>
    <div class="excluded-countries">
        <?php
        if (!empty($_SESSION['excludedCountries'])) {
            echo "<p>Nombre de pays restant à trouver : $countriesLeft</p>";
            echo "<h2>Pays déjà trouvés :</h2>";
            echo "<ul>";
            foreach ($_SESSION['excludedCountries'] as $excludedCountry) {
                echo "<li>$excludedCountry</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>
</body>
</html>
