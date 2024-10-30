<?php
function getRandomCountry($excludedCountries = []) {
    // Liste des pays et de leurs capitales
    $countries = [
        "France" => ["paris", "paris"],
        "Allemagne" => ["berlin", "berlin"],
        "Espagne" => ["madrid", "madrid"],
        "Italie" => ["rome", "rome"],
        "Portugal" => ["lisbonne", "lisbon"],
        "Belgique" => ["bruxelles", "brussels"],
        "Suisse" => ["berne", "bern"],
        "Royaume-Uni" => ["londres", "london"],
        "Pays-Bas" => ["amsterdam", "amsterdam"],
        "Autriche" => ["vienne", "vienna"],
        "Suède" => ["stockholm", "stockholm"],
        "Norvège" => ["oslo", "oslo"],
        "Danemark" => ["copenhague", "copenhagen"],
        "Finlande" => ["helsinki", "helsinki"],
        "Irlande" => ["dublin", "dublin"],
        "Pologne" => ["varsovie", "warsaw"],
        "Grèce" => ["athènes", "athens"],
        "États-Unis" => ["washington", "washington"],
        "Canada" => ["ottawa", "ottawa"],
        "Mexique" => ["mexico", "mexico city"],
        "Brésil" => ["brasilia", "brasilia"],
        "Argentine" => ["buenos aires", "buenos aires"],
        "Colombie" => ["bogota", "bogota"],
        "Chili" => ["santiago", "santiago"],
        "Pérou" => ["lima", "lima"],
        "Venezuela" => ["caracas", "caracas"],
        "Uruguay" => ["montevideo", "montevideo"],
        "Paraguay" => ["asuncion", "asuncion"],
        "Bolivie" => ["sucre", "sucre"],
        "Équateur" => ["quito", "quito"],
        "Guyana" => ["georgetown", "georgetown"],
        "Suriname" => ["paramaribo", "paramaribo"],
        "Panama" => ["panama", "panama city"],
        "Costa Rica" => ["san jose", "san jose"],
        "Nicaragua" => ["managua", "managua"],
        "Honduras" => ["tegucigalpa", "tegucigalpa"],
        "Salvador" => ["san salvador", "san salvador"],
        "Guatemala" => ["guatemala", "guatemala city"],
        "Cuba" => ["la havane", "havana"],
        "Haïti" => ["port-au-prince", "port-au-prince"],
        "République Dominicaine" => ["saint-domingue", "santo domingo"],
        "Jamaïque" => ["kingston", "kingston"],
        "Trinité-et-Tobago" => ["port d'espagne", "port of spain"],
        "Bahamas" => ["nassau", "nassau"],
        "Barbade" => ["bridgetown", "bridgetown"],
        "Saint-Kitts-et-Nevis" => ["basseterre", "basseterre"],
        "Antigua-et-Barbuda" => ["saint john's", "saint john's"],
        "Saint-Vincent-et-les-Grenadines" => ["kingstown", "kingstown"],
        "Sainte-Lucie" => ["castries", "castries"],
        "Grenade" => ["saint george's", "saint george's"],
        "Belize" => ["belmopan", "belmopan"]
    ];

    // Remove excluded countries
    if (!empty($excludedCountries)) {
        foreach ($excludedCountries as $excludedCountry) {
            unset($countries[$excludedCountry]);
        }
    }

    // Check if all countries are excluded
    if (empty($countries)) {
        return null;
    }

    // Select a random country from the remaining list
    $country = array_rand($countries);
    // Return the selected country with the capitals and the number of countries left
    return [$country => $countries[$country], "left" => count($countries)];
}


// Vérifier la réponse de l'utilisateur
function checkCapital($userInput, $correctCapitals, $desiredPercent = 80) {
    $userInput = trim($userInput);
    $userInput = strtolower($userInput);

    // Initialiser la variable de pourcentage de similarité
    $maxPercent = 0;

    // Vérifier la similarité avec les deux versions des capitales
    foreach ($correctCapitals as $correctCapital) {
        similar_text($userInput, $correctCapital, $percent);
        $percent = round($percent, 1);
        if ($percent > $maxPercent) {
            $maxPercent = $percent;
        }
    }

    // Vérifier si la similarité maximale est supérieure au pourcentage souhaité
    if ($maxPercent > $desiredPercent) {
        $message = "Correct !";
    } else {
        $message = "$userInput est une mauvaise réponse ($maxPercent % uniquement de la bonne réponse).<br>La bonne réponse est " . implode(" ou ", $correctCapitals) . ".";
    }
    return $message;
}

function logMessage($message, $logFilePath = __DIR__ . '/logs.txt') {
    // Ajouter la date et l'heure au message
    $date = date('Y-m-d H:i:s');
    $logEntry = "[$date] $message" . PHP_EOL;

    // Écrire le message dans le fichier de log
    file_put_contents($logFilePath, $logEntry, FILE_APPEND);
}

?>