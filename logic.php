<?php

function getRandomCountry($excludedCountries = []) {
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
        "Grèce" => ["athènes", "athens"]
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
    return [$country => $countries[$country]];
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
        $message = "Votre réponse $userInput est Incorrecte ($maxPercent %).<br>La capitale est " . implode(" ou ", $correctCapitals) . ".";
    }
    return $message;
}

?>