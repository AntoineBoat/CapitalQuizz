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
}
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
