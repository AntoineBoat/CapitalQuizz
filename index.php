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

    error_log("Formulaire soumis pour le pays $country\n", 3, $logFile);
    error_log("Entrée utilisateur: $userInput\n", 3, $logFile);

    $message = checkCapital($userInput, $correctCapitals);
    error_log("Message de réponse: $message\n", 3, $logFile);

    // Ajouter le pays actuel à la liste des pays exclus
    $_SESSION['excludedCountries'][] = $country;
}

// Sélectionner un nouveau pays
$countryWithCapital = getRandomCountry($_SESSION['excludedCountries']);

// Vérifier si tous les pays ont été répondus
if ($countryWithCapital === null) {
    echo "<p>Tous les pays ont été répondus. Félicitations !</p>";
    session_destroy(); // Réinitialiser la session
    exit();
}
$countryWithCapital = getRandomCountry($_SESSION['excludedCountries']);
$country = array_keys($countryWithCapital)[0];
$correctCapitals = $countryWithCapital[$country];

// Stocker les capitales correctes dans la session
$_SESSION['correctCapitals'] = $correctCapitals;

// Log des valeurs initiales
error_log("Pays sélectionné: $country\n", 3, $logFile);
error_log("Capitales correctes: " . implode(", ", $correctCapitals) . "\n", 3, $logFile);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu de Capitales</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script>
        // Script pour remettre le focus sur le champ de saisie après le rechargement de la page
        window.onload = function() {
            document.getElementById('capitalInput').focus();
        }
    </script>
</head>
<body>
    <h1>Quel est la capitale de <?php echo $country; ?> ?</h1>
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
</body>
</html>
