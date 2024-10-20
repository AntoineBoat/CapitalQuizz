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

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = trim($_POST["capital"]);
    $userInput = strtolower($userInput);
    $correctCapital = in_array($userInput, $countries[$country]);
    header("Location: index.php?country=$country&correct=$correctCapital");
    exit();
}
?>