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
initializeSessionVariables();

// Vérifier si le formulaire a été soumis et traiter la réponse
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $country = $_POST["country"];
    $userInput = trim($_POST["capital"]);
    $userInput = strtolower($userInput);
    $capitalFr = $_SESSION['correctCapitalFr'];
    $capitalEn = $_SESSION['correctCapitalEn'];

    logMessage("********** Nouvel appel *******", $logFile);
    logMessage("Formulaire soumis pour le pays $country", $logFile);
    logMessage("Entrée utilisateur: $userInput", $logFile);

    $message = checkCapital($userInput,$capitalFr,$capitalEn);
    logMessage("Message de réponse: $message", $logFile);

    if (strpos($message, "orrect") !== false) {//si la réponse est correcte
        
        // Ajouter le pays actuel à la liste des pays exclus
        if (!in_array($country, $_SESSION['excludedCountries'])) {
            $_SESSION['excludedCountries'][] = $country;
        }
        //array_unshift($_SESSION['excludedCountries'], "$country");
        logMessage("Capital correctement trouvé, pays exclu: $country", $logFile);
        
        // Compter le nombre d'éléments dans la liste des pays exclus
        $excludedCount = count($_SESSION['excludedCountries']);
        $_SESSION['excludedCount'] = $excludedCount;
        $_SESSION['CountriesToGuess'] = $_SESSION['CountriesToGuess'] - 1;

    } else {//si la réponse est incorrecte
        
        // Ajouter le pays actuel au début de la liste des pays avec une mauvaise réponse
        array_unshift($_SESSION['wrongCountries'], "$country => $capitalFr");
        
        // Compter le nombre d'éléments dans la liste des pays avec une mauvaise réponse
        $errorCount = count($_SESSION['wrongCountries']);
        $_SESSION['errorCount'] = $errorCount;
        
        logMessage("Mauvaise réponse, le pays reste dans la liste: $country", $logFile);
        logMessage("Tableau des mauvaises réponses: " . implode(", ", $_SESSION['wrongCountries']), $logFile);
    }
}

// Sélectionner un nouveau pays
$country = getRandomCountry($_SESSION['excludedCountries']);

// Vérifier que getRandomCountry() a retourné un tableau valide
if (!$country) {// Si il ne reste plus de pays, on a gagné
    
    $message = "Félicitations ! Vous avez trouvé toutes les capitales.";
    logMessage("Jeu terminé. Toutes les capitales ont été trouvées.", $logFile);
    
    // Réinitialiser la liste des pays exclus si tous les pays ont été utilisés
    $_SESSION['wrongCountries'] = [];    
    $_SESSION['excludedCountries'] = [];   
    $_SESSION['CountriesToGuess'] = 20;
    $_SESSION['pickedCountries'] = initiateCountries();
    $country = getRandomCountry($_SESSION['excludedCountries']);
    // Extraire les valeurs du tableau retourné
    $countriesWithDetails = $_SESSION['pickedCountries'];
    $countryWithDetails = $countriesWithDetails[$country];// Pays sélectionné
    
    $correctCapitalFr = $countryWithDetails["capital_fr"];// Capitale correcte en français
    $correctCapitalEn = $countryWithDetails["capital_en"];// Capitale correcte en anglais
    
    $gps = $countryWithDetails["gps"];// Coordonnées GPS du pays
    $longitude = $gps["longitude"];// Longitude du pays
    $latitude = $gps["latitude"];// Latitude du pays
    // Stocker les capitales correctes dans la session
    $_SESSION['correctCapitalFr'] = $correctCapitalFr;
    $_SESSION['correctCapitalEn'] = $correctCapitalEn;

} else {// Si un pays a été retourné, alors on continue
    // Extraire les valeurs du tableau retourné
    $countriesWithDetails = $_SESSION['pickedCountries'];
    $countryWithDetails = $countriesWithDetails[$country];// Pays sélectionné
    
    $correctCapitalFr = $countryWithDetails["capital_fr"];// Capitale correcte en français
    $correctCapitalEn = $countryWithDetails["capital_en"];// Capitale correcte en anglais
    
    $gps = $countryWithDetails["gps"];// Coordonnées GPS du pays
    $longitude = $gps["longitude"];// Longitude du pays
    $latitude = $gps["latitude"];// Latitude du pays
    // Stocker les capitales correctes dans la session
    $_SESSION['correctCapitalFr'] = $correctCapitalFr;
    $_SESSION['correctCapitalEn'] = $correctCapitalEn;
    if (!empty($country)) {
        // Log des valeurs initiales 
        logMessage("Prochain pays: $country, capitales attendus : $correctCapitalFr; ou $correctCapitalEn;", $logFile);
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <style>
        #map { height: 200px; width: 100vw; }
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
        var map = L.map('map').setView([<?php echo $latitude; ?>, <?php echo $longitude; ?>],3);
        
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
                //echo "<p>Nombre de pays restant à trouver : $countriesLeft</p>";
                echo "<h2>Pays déjà trouvés : (" .$_SESSION['excludedCount'] . ")  Reste à trouver: (".$_SESSION['CountriesToGuess'].")  </h2>";
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
                echo "<h2>Erreurs :(" .$_SESSION['errorCount'] . ")</h2>";
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
