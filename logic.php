<?php
// Liste associative de pays et leurs capitales
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

// Sélectionner un pays aléatoirement
$country = array_rand($countries);



//    $correctCapital = in_array($userInput, $countries[$country]);
//    header("Location: index.php?country=$country&correct=$correctCapital");



// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = trim($_POST["capital"]);
    $userInput = strtolower($userInput);
    $selectedCountry = $_POST["country"];
    $correctCapitals = $countries[$selectedCountry]; // Récupérer les deux versions des capitales

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

    // Vérifier si la similarité maximale est supérieure à 80%
    if ($maxPercent > 80) {
        $message = "Correct !";
    } else {
        $message = "Votre réponse $userInput est Incorrecte ($maxPercent %).<br>La capitale de $selectedCountry est " . implode(" ou ", $correctCapitals) . ".";
    }
    exit();
}

?>