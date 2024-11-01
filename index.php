<?php
session_start(); // Démarrer la session

// Afficher les erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'logic.php';

// Définir le chemin du fichier de log
$logFile = __DIR__ . '/logs.txt';

// Fonction pour initialiser les listes de pays exclus et de pays en erreur
initializeLists();

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
        // Ajouter le pays actuel à la liste des pays avec une mauvaise réponse
        $_SESSION['wrongCountries'][] = $country;
        // Log que la réponse était fausse et que le pays reste dans la liste
        logMessage("Mauvaise réponse, le pays reste dans la liste: $country", $logFile);
        logMessage("Tableau des mauvaises réponses: " . implode(", ", $_SESSION['wrongCountries']), $logFile);
    }
}

// Sélectionner un nouveau pays
$countryWithCapital = getRandomCountry($_SESSION['excludedCountries']);

// Vérifier que getRandomCountry() a retourné un tableau valide
if (!$countryWithCapital) {// Si il ne reste plus de pays, on a gagné
    // Réinitialiser la liste des pays exclus si tous les pays ont été utilisés
    $_SESSION['excludedCountries'] = [];
    $countriesLeft = 0;
    $message = "Félicitations ! Vous avez trouvé toutes les capitales.";
    logMessage("Jeu terminé. Toutes les capitales ont été trouvées.", $logFile);
    $country = null;
} else {// Si un pays a été retourné, alors on continue
    // Extraire les valeurs du tableau retourné
    $country = array_keys($countryWithCapital)[0];// Pays sélectionné
    $countriesLeft = $countryWithCapital["left"];// Nombre de pays restants
    $correctCapitals = $countryWithCapital[$country];// Capitales correctes
    $gps = $correctCapitals["gps"];// Coordonnées GPS du pays
    $longitude = $gps["longitude"];// Longitude du pays
    $latitude = $gps["latitude"];// Latitude du pays
    // Stocker les capitales correctes dans la session
    $_SESSION['correctCapitals'] = $correctCapitals;
    if (!empty($country)) {
        // Log des valeurs initiales 
        logMessage("Prochain pays: $country, capitales attendus : $correctCapitals[capital_fr] ou $correctCapitals[capital_en]", $logFile);
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <style>
        #map { height: 250px; width: 1550px; }
    </style>
    <title>Jeu des capitales</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script>
        // Script pour remettre le focus sur le champ de saisie après le rechargement de la page
        window.onload = function() {
            document.getElementById('capitalInput').focus();
        }
    </script>
</head>
<body>
    <h1>Quelle est la capitale de ce pays: <?php echo $country; ?></h1>
    <div id="map"></div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialisation de la carte
        var map = L.map('map').setView([<?php echo $latitude; ?>, <?php echo $longitude; ?>],4);
        
        // Ajout des tuiles sans étiquettes
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>'
        }).addTo(map);

    </script>
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
    <div class="lists-container">
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
        <div class="wrong-countries">
            <?php
            if (!empty($_SESSION['wrongCountries'])) {
                echo "<h2>Pays avec au moins une erreur :</h2>";
                echo "<ul>";
                foreach ($_SESSION['wrongCountries'] as $wrongCountry) {
                    echo "<li>$wrongCountry</li>";
                }
                echo "</ul>";        
            }
            ?>
        </div>
    </div>
</body>
</html>
