<?php
function getRandomCountry($excludedCountries = []) {
    // Liste des pays et de leurs capitales
    $countries = [
        "Afghanistan" => ["kaboul", "kabul"],
        "Afrique du Sud" => ["pretoria", "pretoria"],
        "Albanie" => ["tirana", "tirana"],
        "Algérie" => ["alger", "algiers"],
        "Andorre" => ["andorre-la-vieille", "andorra la vella"],
        "Angola" => ["luanda", "luanda"],
        "Arabie Saoudite" => ["riyad", "riyadh"],
        "Arménie" => ["erevan", "yerevan"],
        "Australie" => ["canberra", "canberra"],
        "Azerbaïdjan" => ["bakou", "baku"],
        "Bahreïn" => ["manama", "manama"],
        "Bangladesh" => ["dacca", "dhaka"],
        "Bélarus" => ["minsk", "minsk"],
        "Bhoutan" => ["thimphou", "thimphu"],
        "Birmanie" => ["naypyidaw", "naypyidaw"],
        "Bosnie-Herzégovine" => ["sarajevo", "sarajevo"],
        "Botswana" => ["gaborone", "gaborone"],
        "Brunei" => ["bandar seri begawan", "bandar seri begawan"],
        "Bulgarie" => ["sofia", "sofia"],
        "Burkina Faso" => ["ouagadougou", "ouagadougou"],
        "Burundi" => ["gitega", "gitega"],
        "Cape Vert" => ["praia", "praia"],
        "Cambodge" => ["phnom penh", "phnom penh"],
        "Cameroun" => ["yaoundé", "yaounde"],
        "Centrafrique" => ["bangui", "bangui"],
        "Chad" => ["ndjamena", "n'djamena"],
        "Chine" => ["pékin", "beijing"],
        "Chypre" => ["nicosie", "nicosia"],
        "Comores" => ["moroni", "moroni"],
        "Congo" => ["brazzaville", "brazzaville"],
        "Corée du Nord" => ["pyongyang", "pyongyang"],
        "Corée du Sud" => ["séoul", "seoul"],
        "Côte d'Ivoire" => ["yamoussoukro", "yamoussoukro"],
        "Croatie" => ["zagreb", "zagreb"],
        "Djibouti" => ["djibouti", "djibouti"],
        "Dominique" => ["roseau", "roseau"],
        "Égypte" => ["le caire", "cairo"],
        "Émirats Arabes Unis" => ["abou dabi", "abu dhabi"],
        "Érythrée" => ["asmara", "asmara"],
        "Estonie" => ["tallinn", "tallinn"],
        "Eswatini" => ["mbabane", "mbabane"],
        "Éthiopie" => ["addis-abeba", "addis ababa"],
        "Fidji" => ["suva", "suva"],
        "Gabon" => ["libreville", "libreville"],
        "Gambie" => ["banjul", "banjul"],
        "Géorgie" => ["tbilissi", "tbilisi"],
        "Ghana" => ["accra", "accra"],
        "Grenade" => ["saint george's", "saint george's"],
        "Guatemala" => ["guatemala", "guatemala city"],
        "Guinée" => ["conakry", "conakry"],
        "Guinée-Bissau" => ["bissau", "bissau"],
        "Guinée équatoriale" => ["malabo", "malabo"],
        "Guyana" => ["georgetown", "georgetown"],
        "Haïti" => ["port-au-prince", "port-au-prince"],
        "Honduras" => ["tegucigalpa", "tegucigalpa"],
        "Hongrie" => ["budapest", "budapest"],
        "Inde" => ["new delhi", "new delhi"],
        "Indonésie" => ["jakarta", "jakarta"],
        "Irak" => ["bagdad", "baghdad"],
        "Iran" => ["téhéran", "tehran"],
        "Islande" => ["reykjavik", "reykjavik"],
        "Israël" => ["jérusalem", "jerusalem"],
        "Japon" => ["tokyo", "tokyo"],
        "Jordanie" => ["amman", "amman"],
        "Kazakhstan" => ["astana", "astana"],
        "Kenya" => ["nairobi", "nairobi"],
        "Kirghizistan" => ["bichkek", "bishkek"],
        "Kiribati" => ["tarawa-sud", "south tarawa"],
        "Koweït" => ["koweït", "kuwait city"],
        "Laos" => ["vientiane", "vientiane"],
        "Lesotho" => ["maseru", "maseru"],
        "Lettonie" => ["riga", "riga"],
        "Liban" => ["beyrouth", "beirut"],
        "Libéria" => ["monrovia", "monrovia"],
        "Libye" => ["tripoli", "tripoli"],
        "Liechtenstein" => ["vaduz", "vaduz"],
        "Lituanie" => ["vilnius", "vilnius"],
        "Luxembourg" => ["luxembourg", "luxembourg"],
        "Macédoine du Nord" => ["skopje", "skopje"],
        "Madagascar" => ["antananarivo", "antananarivo"],
        "Malaisie" => ["kuala lumpur", "kuala lumpur"],
        "Malawi" => ["lilongwe", "lilongwe"],
        "Maldives" => ["malé", "male"],
        "Mali" => ["bamako", "bamako"],
        "Malte" => ["la valette", "valletta"],
        "Maroc" => ["rabat", "rabat"],
        "Marshall" => ["majuro", "majuro"],
        "Maurice" => ["port-louis", "port louis"],
        "Mauritanie" => ["nouakchott", "nouakchott"],
        "Micronésie" => ["palikir", "palikir"],
        "Moldavie" => ["chisinau", "chisinau"],
        "Monaco" => ["monaco", "monaco"],
        "Mongolie" => ["oulann-bator", "ulaanbaatar"],
        "Monténégro" => ["podgorica", "podgorica"],
        "Mozambique" => ["maputo", "maputo"],
        "Namibie" => ["windhoek", "windhoek"],
        "Nauru" => ["yaren", "yaren"],
        "Népal" => ["katmandou", "kathmandu"],
        "Niger" => ["niamey", "niamey"],
        "Nigeria" => ["abuja", "abuja"],
        "Oman" => ["mascate", "muscat"],
        "Ouganda" => ["kampala", "kampala"],
        "Ouzbékistan" => ["tachkent", "tashkent"],
        "Pakistan" => ["islamabad", "islamabad"],
        "Palaos" => ["ngerulmud", "ngerulmud"],
        "Papouasie-Nouvelle-Guinée" => ["port moresby", "port moresby"],
        "Philippines" => ["manille", "manila"],
        "Qatar" => ["doha", "doha"],
        "République Centrafricaine" => ["bangui", "bangui"],
        "République Démocratique du Congo" => ["kinshasa", "kinshasa"],
        "République Tchèque" => ["prague", "prague"],
        "Roumanie" => ["bucarest", "bucharest"],
        "Russie" => ["moscou", "moscow"],
        "Rwanda" => ["kigali", "kigali"],
        "Saint-Christophe-et-Niévès" => ["basseterre", "basseterre"],
        "Saint-Marin" => ["saint-marin", "san marino"],
        "Saint-Vincent-et-les-Grenadines" => ["kingstown", "kingstown"],
        "Sainte-Lucie" => ["castries", "castries"],
        "Salomon" => ["honiara", "honiara"],
        "Samoa" => ["apia", "apia"],
        "Sao Tomé-et-Principe" => ["sao tomé", "sao tome"],
        "Sénégal" => ["dakar", "dakar"],
        "Serbie" => ["belgrade", "belgrade"],
        "Seychelles" => ["victoria", "victoria"],
        "Sierra Leone" => ["freetown", "freetown"],
        "Singapour" => ["singapour", "singapore"],
        "Slovaquie" => ["bratislava", "bratislava"],
        "Slovénie" => ["ljubljana", "ljubljana"],
        "Somalie" => ["mogadiscio", "mogadishu"],
        "Soudan" => ["khartoum", "khartoum"],
        "Soudan du Sud" => ["djouba", "juba"],
        "Sri Lanka" => ["colombo", "colombo"],
        "Syrie" => ["damas", "damascus"],
        "Tadjikistan" => ["douchanbé", "dushanbe"],
        "Tanzanie" => ["dodoma", "dodoma"],
        "Tchad" => ["ndjamena", "n'djamena"],
        "Thaïlande" => ["bangkok", "bangkok"],
        "Timor-Leste" => ["dili", "dili"],
        "Togo" => ["lomé", "lome"],
        "Tonga" => ["nuku'alofa", "nuku'alofa"],
        "Trinité-et-Tobago" => ["port d'espagne", "port of spain"],
        "Tunisie" => ["tunis", "tunis"],
        "Turkménistan" => ["achgabat", "ashgabat"],
        "Turquie" => ["ankara", "ankara"],
        "Tuvalu" => ["funafuti", "funafuti"],
        "Ukraine" => ["kiev", "kyiv"],
        "Uruguay" => ["montevideo", "montevideo"],
        "Vanuatu" => ["port-vila", "port vila"],
        "Vatican" => ["vatican", "vatican city"],
        "Venezuela" => ["caracas", "caracas"],
        "Vietnam" => ["hanoï", "hanoi"],
        "Yémen" => ["sanaa", "sanaa"],
        "Zambie" => ["lusaka", "lusaka"],
        "Zimbabwe" => ["harare", "harare"],
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
function checkCapital($userInput, $correctCapitals, $desiredPercent = 70) {
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
    if ($maxPercent > $desiredPercent) {// Bonne réponse
        $message = "Correct !";
    } else {// Mauvaise réponse
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

function initializeLists() {
    if (!isset($_SESSION['excludedCountries'])) {//
        $_SESSION['excludedCountries'] = [];
    }

    if (!isset($_SESSION['wrongCountries'])) {
        $_SESSION['wrongCountries'] = [];
    }
}

?>