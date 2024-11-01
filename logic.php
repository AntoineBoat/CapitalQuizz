<?php
function initiateCountries() {
    // Liste des pays et de leurs capitales
    $countries = 
[
"Afghanistan" => ["capital_fr" => "kaboul", "capital_en" => "kabul", "gps" => ["latitude" => 34.5553, "longitude" => 69.2075]], 
"Afrique du Sud" => ["capital_fr" => "pretoria", "capital_en" => "pretoria", "gps" => ["latitude" => -25.7479, "longitude" => 28.2293]], 
"Allemagne" => ["capital_fr" => "berlin", "capital_en" => "berlin", "gps" => ["latitude" => 52.5200, "longitude" => 13.4050]],
"Argentine" => ["capital_fr" => "buenos aires", "capital_en" => "buenos aires", "gps" => ["latitude" => -34.6037, "longitude" => -58.3816]],
"Australie" => ["capital_fr" => "canberra", "capital_en" => "canberra", "gps" => ["latitude" => -35.2809, "longitude" => 149.1300]],
"Brésil" => ["capital_fr" => "brasilia", "capital_en" => "brasilia", "gps" => ["latitude" => -15.8267, "longitude" => -47.9218]],
"Canada" => ["capital_fr" => "ottawa", "capital_en" => "ottawa", "gps" => ["latitude" => 45.4215, "longitude" => -75.6972]],
"Chine" => ["capital_fr" => "pékin", "capital_en" => "beijing", "gps" => ["latitude" => 39.9042, "longitude" => 116.4074]],
"Espagne" => ["capital_fr" => "madrid", "capital_en" => "madrid", "gps" => ["latitude" => 40.4168, "longitude" => -3.7038]],
"États-Unis" => ["capital_fr" => "washington", "capital_en" => "washington", "gps" => ["latitude" => 38.9072, "longitude" => -77.0369]],
"France" => ["capital_fr" => "paris", "capital_en" => "paris", "gps" => ["latitude" => 48.8566, "longitude" => 2.3522]],
"Inde" => ["capital_fr" => "new delhi", "capital_en" => "new delhi", "gps" => ["latitude" => 28.6139, "longitude" => 77.2090]],
"Italie" => ["capital_fr" => "rome", "capital_en" => "rome", "gps" => ["latitude" => 41.9028, "longitude" => 12.4964]],
"Japon" => ["capital_fr" => "tokyo", "capital_en" => "tokyo", "gps" => ["latitude" => 35.6895, "longitude" => 139.6917]],
"Corée du Sud" => ["capital_fr" => "séoul", "capital_en" => "seoul", "gps" => ["latitude" => 37.5665, "longitude" => 126.9780]],
"Indonésie" => ["capital_fr" => "jakarta", "capital_en" => "jakarta", "gps" => ["latitude" => -6.2088, "longitude" => 106.8456]],
"Malaisie" => ["capital_fr" => "kuala lumpur", "capital_en" => "kuala lumpur", "gps" => ["latitude" => 3.1390, "longitude" => 101.6869]],
"Philippines" => ["capital_fr" => "manille", "capital_en" => "manila", "gps" => ["latitude" => 14.5995, "longitude" => 120.9842]],
"Thaïlande" => ["capital_fr" => "bangkok", "capital_en" => "bangkok", "gps" => ["latitude" => 13.7563, "longitude" => 100.5018]],
"Vietnam" => ["capital_fr" => "hanoï", "capital_en" => "hanoi", "gps" => ["latitude" => 21.0285, "longitude" => 105.8542]],
"Singapour" => ["capital_fr" => "singapour", "capital_en" => "singapore", "gps" => ["latitude" => 1.3521, "longitude" => 103.8198]],
"Pakistan" => ["capital_fr" => "islamabad", "capital_en" => "islamabad", "gps" => ["latitude" => 33.6844, "longitude" => 73.0479]],
"Bangladesh" => ["capital_fr" => "dacca", "capital_en" => "dhaka", "gps" => ["latitude" => 23.8103, "longitude" => 90.4125]],
"Népal" => ["capital_fr" => "katmandou", "capital_en" => "kathmandu", "gps" => ["latitude" => 27.7172, "longitude" => 85.3240]],
"Sri Lanka" => ["capital_fr" => "colombo", "capital_en" => "colombo", "gps" => ["latitude" => 6.9271, "longitude" => 79.8612]],
"Birmanie" => ["capital_fr" => "naypyidaw", "capital_en" => "naypyidaw", "gps" => ["latitude" => 19.7633, "longitude" => 96.0785]],
"Arabie Saoudite" => ["capital_fr" => "riyad", "capital_en" => "riyadh", "gps" => ["latitude" => 24.7136, "longitude" => 46.6753]],
"Iran" => ["capital_fr" => "téhéran", "capital_en" => "tehran", "gps" => ["latitude" => 35.6892, "longitude" => 51.3890]],
"Irak" => ["capital_fr" => "bagdad", "capital_en" => "baghdad", "gps" => ["latitude" => 33.3152, "longitude" => 44.3661]],
"Israël" => ["capital_fr" => "jérusalem", "capital_en" => "jerusalem", "gps" => ["latitude" => 31.7683, "longitude" => 35.2137]],
"Jordanie" => ["capital_fr" => "amman", "capital_en" => "amman", "gps" => ["latitude" => 31.9454, "longitude" => 35.9284]],
"Koweït" => ["capital_fr" => "koweït", "capital_en" => "kuwait city", "gps" => ["latitude" => 29.3759, "longitude" => 47.9774]],
"Liban" => ["capital_fr" => "beyrouth", "capital_en" => "beirut", "gps" => ["latitude" => 33.8938, "longitude" => 35.5018]],
"Oman" => ["capital_fr" => "mascate", "capital_en" => "muscat", "gps" => ["latitude" => 23.5880, "longitude" => 58.3829]],
"Qatar" => ["capital_fr" => "doha", "capital_en" => "doha", "gps" => ["latitude" => 25.276987, "longitude" => 51.520008]],
"Syrie" => ["capital_fr" => "damas", "capital_en" => "damascus", "gps" => ["latitude" => 33.5138, "longitude" => 36.2765]],
"Turquie" => ["capital_fr" => "ankara", "capital_en" => "ankara", "gps" => ["latitude" => 39.9334, "longitude" => 32.8597]],
"Yémen" => ["capital_fr" => "sanaa", "capital_en" => "sanaa", "gps" => ["latitude" => 15.3694, "longitude" => 44.1910]],
"Algérie" => ["capital_fr" => "alger", "capital_en" => "algiers", "gps" => ["latitude" => 36.7372, "longitude" => 3.0865]],
"Angola" => ["capital_fr" => "luanda", "capital_en" => "luanda", "gps" => ["latitude" => -8.8390, "longitude" => 13.2894]],
"Bénin" => ["capital_fr" => "porto-novo", "capital_en" => "porto-novo", "gps" => ["latitude" => 6.4969, "longitude" => 2.6289]],
"Botswana" => ["capital_fr" => "gaborone", "capital_en" => "gaborone", "gps" => ["latitude" => -24.6282, "longitude" => 25.9231]],
"Burkina Faso" => ["capital_fr" => "ouagadougou", "capital_en" => "ouagadougou", "gps" => ["latitude" => 12.3714, "longitude" => -1.5197]],
"Burundi" => ["capital_fr" => "gitega", "capital_en" => "gitega", "gps" => ["latitude" => -3.4264, "longitude" => 29.9306]],
"Cameroun" => ["capital_fr" => "yaoundé", "capital_en" => "yaoundé", "gps" => ["latitude" => 3.8480, "longitude" => 11.5021]],
"Cabo Verde" => ["capital_fr" => "praia", "capital_en" => "praia", "gps" => ["latitude" => 14.9330, "longitude" => -23.5133]],
"République centrafricaine" => ["capital_fr" => "bangui", "capital_en" => "bangui", "gps" => ["latitude" => 4.3947, "longitude" => 18.5582]],
"Tchad" => ["capital_fr" => "ndjamena", "capital_en" => "ndjamena", "gps" => ["latitude" => 12.1348, "longitude" => 15.0557]],
"Comores" => ["capital_fr" => "moroni", "capital_en" => "moroni", "gps" => ["latitude" => -11.7172, "longitude" => 43.2473]],
"Congo" => ["capital_fr" => "brazzaville", "capital_en" => "brazzaville", "gps" => ["latitude" => -4.2634, "longitude" => 15.2429]],
"République démocratique du Congo" => ["capital_fr" => "kinshasa", "capital_en" => "kinshasa", "gps" => ["latitude" => -4.4419, "longitude" => 15.2663]],
"Côte d'Ivoire" => ["capital_fr" => "yamoussoukro", "capital_en" => "yamoussoukro", "gps" => ["latitude" => 6.8276, "longitude" => -5.2893]],
"Djibouti" => ["capital_fr" => "djibouti", "capital_en" => "djibouti", "gps" => ["latitude" => 11.5721, "longitude" => 43.1456]],
"Égypte" => ["capital_fr" => "le caire", "capital_en" => "cairo", "gps" => ["latitude" => 30.0444, "longitude" => 31.2357]],
"Guinée équatoriale" => ["capital_fr" => "malabo", "capital_en" => "malabo", "gps" => ["latitude" => 3.7500, "longitude" => 8.7833]],
"Erythrée" => ["capital_fr" => "asmara", "capital_en" => "asmara", "gps" => ["latitude" => 15.3229, "longitude" => 38.9251]],
"Eswatini" => ["capital_fr" => "mbabane", "capital_en" => "mbabane", "gps" => ["latitude" => -26.3054, "longitude" => 31.1367]],
"Éthiopie" => ["capital_fr" => "addis-abeba", "capital_en" => "addis ababa", "gps" => ["latitude" => 9.0300, "longitude" => 38.7400]],
"Gabon" => ["capital_fr" => "libreville", "capital_en" => "libreville", "gps" => ["latitude" => 0.4162, "longitude" => 9.4673]],
"Gambie" => ["capital_fr" => "banjul", "capital_en" => "banjul", "gps" => ["latitude" => 13.4549, "longitude" => -16.5790]],
"Ghana" => ["capital_fr" => "accra", "capital_en" => "accra", "gps" => ["latitude" => 5.6037, "longitude" => -0.1870]],
"Guinée" => ["capital_fr" => "conakry", "capital_en" => "conakry", "gps" => ["latitude" => 9.6412, "longitude" => -13.5784]],
"Guinée-Bissau" => ["capital_fr" => "bissau", "capital_en" => "bissau", "gps" => ["latitude" => 11.8817, "longitude" => -15.6170]],
"Kenya" => ["capital_fr" => "nairobi", "capital_en" => "nairobi", "gps" => ["latitude" => -1.2864, "longitude" => 36.8172]],
"Lesotho" => ["capital_fr" => "maseru", "capital_en" => "maseru", "gps" => ["latitude" => -29.3158, "longitude" => 27.4860]],
"Liberia" => ["capital_fr" => "monrovia", "capital_en" => "monrovia", "gps" => ["latitude" => 6.3000, "longitude" => -10.7970]],
"Libye" => ["capital_fr" => "tripoli", "capital_en" => "tripoli", "gps" => ["latitude" => 32.8872, "longitude" => 13.1913]],
"Madagascar" => ["capital_fr" => "antananarivo", "capital_en" => "antananarivo", "gps" => ["latitude" => -18.8792, "longitude" => 47.5079]],
"Malawi" => ["capital_fr" => "lilongwe", "capital_en" => "lilongwe", "gps" => ["latitude" => -13.9626, "longitude" => 33.7741]],
"Mali" => ["capital_fr" => "bamako", "capital_en" => "bamako", "gps" => ["latitude" => 12.6392, "longitude" => -8.0029]],
"Mauritanie" => ["capital_fr" => "nouakchott", "capital_en" => "nouakchott", "gps" => ["latitude" => 18.0735, "longitude" => -15.9582]],
"Maurice" => ["capital_fr" => "port-louis", "capital_en" => "port louis", "gps" => ["latitude" => -20.1609, "longitude" => 57.5012]],
"Maroc" => ["capital_fr" => "rabat", "capital_en" => "rabat", "gps" => ["latitude" => 34.0209, "longitude" => -6.8416]],
"Mozambique" => ["capital_fr" => "maputo", "capital_en" => "maputo", "gps" => ["latitude" => -25.9692, "longitude" => 32.5732]],
"Namibie" => ["capital_fr" => "windhoek", "capital_en" => "windhoek", "gps" => ["latitude" => -22.5609, "longitude" => 17.0658]],
"Niger" => ["capital_fr" => "niamey", "capital_en" => "niamey", "gps" => ["latitude" => 13.5126, "longitude" => 2.1128]],
"Nigeria" => ["capital_fr" => "abuja", "capital_en" => "abuja", "gps" => ["latitude" => 9.0578, "longitude" => 7.4951]],
"Rwanda" => ["capital_fr" => "kigali", "capital_en" => "kigali", "gps" => ["latitude" => -1.9706, "longitude" => 30.1044]],
"Sao Tomé-et-Principe" => ["capital_fr" => "sao tomé", "capital_en" => "sao tome", "gps" => ["latitude" => 0.3365, "longitude" => 6.7273]],
"Sénégal" => ["capital_fr" => "dakar", "capital_en" => "dakar", "gps" => ["latitude" => 14.6928, "longitude" => -17.4467]],
"Seychelles" => ["capital_fr" => "victoria", "capital_en" => "victoria", "gps" => ["latitude" => -4.6191, "longitude" => 55.4513]],
"Sierra Leone" => ["capital_fr" => "freetown", "capital_en" => "freetown", "gps" => ["latitude" => 8.4657, "longitude" => -13.2317]],
"Somalie" => ["capital_fr" => "mogadiscio", "capital_en" => "mogadishu", "gps" => ["latitude" => 2.0469, "longitude" => 45.3182]],
"Afrique du Sud" => ["capital_fr" => "prétoria", "capital_en" => "pretoria", "gps" => ["latitude" => -25.7479, "longitude" => 28.2293]],
"Soudan du Sud" => ["capital_fr" => "djouba", "capital_en" => "juba", "gps" => ["latitude" => 4.8594, "longitude" => 31.5713]],
"Soudan" => ["capital_fr" => "khartoum", "capital_en" => "khartoum", "gps" => ["latitude" => 15.5007, "longitude" => 32.5599]],
"Tanzanie" => ["capital_fr" => "dodoma", "capital_en" => "dodoma", "gps" => ["latitude" => -6.1630, "longitude" => 35.7516]],
"Togo" => ["capital_fr" => "lomé", "capital_en" => "lomé", "gps" => ["latitude" => 6.1725, "longitude" => 1.2314]],
"Tunisie" => ["capital_fr" => "tunis", "capital_en" => "tunis", "gps" => ["latitude" => 36.8065, "longitude" => 10.1815]],
"Ouganda" => ["capital_fr" => "kampala", "capital_en" => "kampala", "gps" => ["latitude" => 0.3476, "longitude" => 32.5825]],
"Zambie" => ["capital_fr" => "lusaka", "capital_en" => "lusaka", "gps" => ["latitude" => -15.3875, "longitude" => 28.3228]],
"Zimbabwe" => ["capital_fr" => "harare", "capital_en" => "harare", "gps" => ["latitude" => -17.8292, "longitude" => 31.0522]],
"Arménie" => ["capital_fr" => "erevan", "capital_en" => "yerevan", "gps" => ["latitude" => 40.1792, "longitude" => 44.4991]],
"Azerbaïdjan" => ["capital_fr" => "bakou", "capital_en" => "baku", "gps" => ["latitude" => 40.4093, "longitude" => 49.8671]],
"Bahreïn" => ["capital_fr" => "manama", "capital_en" => "manama", "gps" => ["latitude" => 26.2285, "longitude" => 50.5861]],
"Barbade" => ["capital_fr" => "bridgetown", "capital_en" => "bridgetown", "gps" => ["latitude" => 13.0975, "longitude" => -59.6167]],
"Bhoutan" => ["capital_fr" => "thimphou", "capital_en" => "thimphu", "gps" => ["latitude" => 27.4728, "longitude" => 89.6390]],
"Bolivie" => ["capital_fr" => "sucre", "capital_en" => "sucre", "gps" => ["latitude" => -19.0196, "longitude" => -65.2619]],
"Bosnie-Herzégovine" => ["capital_fr" => "sarajevo", "capital_en" => "sarajevo", "gps" => ["latitude" => 43.8563, "longitude" => 18.4131]],
"Brunei" => ["capital_fr" => "bandar seri begawan", "capital_en" => "bandar seri begawan", "gps" => ["latitude" => 4.9031, "longitude" => 114.9398]],
"Chypre" => ["capital_fr" => "nicosie", "capital_en" => "nicosia", "gps" => ["latitude" => 35.1856, "longitude" => 33.3823]],
"Corée du Nord" => ["capital_fr" => "pyongyang", "capital_en" => "pyongyang", "gps" => ["latitude" => 39.0392, "longitude" => 125.7625]],
"Croatie" => ["capital_fr" => "zagreb", "capital_en" => "zagreb", "gps" => ["latitude" => 45.8150, "longitude" => 15.9819]],
"Danemark" => ["capital_fr" => "copenhague", "capital_en" => "copenhagen", "gps" => ["latitude" => 55.6761, "longitude" => 12.5683]],
"Dominique" => ["capital_fr" => "roseau", "capital_en" => "roseau", "gps" => ["latitude" => 15.3092, "longitude" => -61.3790]],
"El Salvador" => ["capital_fr" => "san salvador", "capital_en" => "san salvador", "gps" => ["latitude" => 13.6929, "longitude" => -89.2182]],
"Fidji" => ["capital_fr" => "suva", "capital_en" => "suva", "gps" => ["latitude" => -18.1248, "longitude" => 178.4501]],
"Finlande" => ["capital_fr" => "helsinki", "capital_en" => "helsinki", "gps" => ["latitude" => 60.1695, "longitude" => 24.9354]],
"Géorgie" => ["capital_fr" => "tbilissi", "capital_en" => "tbilisi", "gps" => ["latitude" => 41.7151, "longitude" => 44.8271]],
"Grèce" => ["capital_fr" => "athènes", "capital_en" => "athens", "gps" => ["latitude" => 37.9838, "longitude" => 23.7275]],
"Grenade" => ["capital_fr" => "saint-georges", "capital_en" => "saint george's", "gps" => ["latitude" => 12.0561, "longitude" => -61.7486]],
"Guatemala" => ["capital_fr" => "guatemala", "capital_en" => "guatemala city", "gps" => ["latitude" => 14.6349, "longitude" => -90.5069]],
"Guyana" => ["capital_fr" => "georgetown", "capital_en" => "georgetown", "gps" => ["latitude" => 6.8013, "longitude" => -58.1551]],
"Honduras" => ["capital_fr" => "tegucigalpa", "capital_en" => "tegucigalpa", "gps" => ["latitude" => 14.0723, "longitude" => -87.1921]],
"Islande" => ["capital_fr" => "reykjavik", "capital_en" => "reykjavik", "gps" => ["latitude" => 64.1355, "longitude" => -21.8954]],
"Jamaïque" => ["capital_fr" => "kingston", "capital_en" => "kingston", "gps" => ["latitude" => 17.9712, "longitude" => -76.7936]],
"Kirghizistan" => ["capital_fr" => "bichkek", "capital_en" => "bishkek", "gps" => ["latitude" => 42.8746, "longitude" => 74.5698]],
"Kiribati" => ["capital_fr" => "tarawa", "capital_en" => "tarawa", "gps" => ["latitude" => 1.4518, "longitude" => 173.0327]],
"Laos" => ["capital_fr" => "vientiane", "capital_en" => "vientiane", "gps" => ["latitude" => 17.9757, "longitude" => 102.6331]],
"Lettonie" => ["capital_fr" => "riga", "capital_en" => "riga", "gps" => ["latitude" => 56.9496, "longitude" => 24.1052]],
"Liechtenstein" => ["capital_fr" => "vaduz", "capital_en" => "vaduz", "gps" => ["latitude" => 47.1410, "longitude" => 9.5209]],
"Lituanie" => ["capital_fr" => "vilnius", "capital_en" => "vilnius", "gps" => ["latitude" => 54.6872, "longitude" => 25.2797]],
"Luxembourg" => ["capital_fr" => "luxembourg", "capital_en" => "luxembourg", "gps" => ["latitude" => 49.6117, "longitude" => 6.1319]],
"Maldives" => ["capital_fr" => "malé", "capital_en" => "male", "gps" => ["latitude" => 4.1755, "longitude" => 73.5093]],
"Malte" => ["capital_fr" => "la valette", "capital_en" => "valletta", "gps" => ["latitude" => 35.8997, "longitude" => 14.5147]],
"Marshall" => ["capital_fr" => "majuro", "capital_en" => "majuro", "gps" => ["latitude" => 7.0897, "longitude" => 171.3803]],
"Micronésie" => ["capital_fr" => "palikir", "capital_en" => "palikir", "gps" => ["latitude" => 6.9248, "longitude" => 158.1611]],
"Moldavie" => ["capital_fr" => "chisinau", "capital_en" => "chisinau", "gps" => ["latitude" => 47.0105, "longitude" => 28.8638]],
"Monaco" => ["capital_fr" => "monaco", "capital_en" => "monaco", "gps" => ["latitude" => 43.7384, "longitude" => 7.4246]],
"Mongolie" => ["capital_fr" => "oulane-bator", "capital_en" => "ulaanbaatar", "gps" => ["latitude" => 47.8864, "longitude" => 106.9057]],
"Monténégro" => ["capital_fr" => "podgorica", "capital_en" => "podgorica", "gps" => ["latitude" => 42.4410, "longitude" => 19.2636]],
"Nicaragua" => ["capital_fr" => "managua", "capital_en" => "managua", "gps" => ["latitude" => 12.1364, "longitude" => -86.2514]],
"Norvège" => ["capital_fr" => "oslo", "capital_en" => "oslo", "gps" => ["latitude" => 59.9139, "longitude" => 10.7522]],
"Ouzbékistan" => ["capital_fr" => "tachkent", "capital_en" => "tashkent", "gps" => ["latitude" => 41.2995, "longitude" => 69.2401]],
"Palaos" => ["capital_fr" => "ngerulmud", "capital_en" => "ngerulmud", "gps" => ["latitude" => 7.5000, "longitude" => 134.6242]],
"Panama" => ["capital_fr" => "panama", "capital_en" => "panama city", "gps" => ["latitude" => 8.9824, "longitude" => -79.5199]],
"Paraguay" => ["capital_fr" => "asuncion", "capital_en" => "asuncion", "gps" => ["latitude" => -25.2637, "longitude" => -57.5759]],
"Pérou" => ["capital_fr" => "lima", "capital_en" => "lima", "gps" => ["latitude" => -12.0464, "longitude" => -77.0428]],
"Portugal" => ["capital_fr" => "lisbonne", "capital_en" => "lisbon", "gps" => ["latitude" => 38.7223, "longitude" => -9.1393]],
"République dominicaine" => ["capital_fr" => "saint-domingue", "capital_en" => "santo domingo", "gps" => ["latitude" => 18.4861, "longitude" => -69.9312]],
"Roumanie" => ["capital_fr" => "bucarest", "capital_en" => "bucharest", "gps" => ["latitude" => 44.4268, "longitude" => 26.1025]],
"Saint-Kitts-et-Nevis" => ["capital_fr" => "basseterre", "capital_en" => "basseterre", "gps" => ["latitude" => 17.3026, "longitude" => -62.7177]],
"Saint-Vincent-et-les-Grenadines" => ["capital_fr" => "kingstown", "capital_en" => "kingstown", "gps" => ["latitude" => 13.1600, "longitude" => -61.2248]],
"Sainte-Lucie" => ["capital_fr" => "castries", "capital_en" => "castries", "gps" => ["latitude" => 14.0101, "longitude" => -60.9875]],
"Saint-Marin" => ["capital_fr" => "saint-marin", "capital_en" => "san marino", "gps" => ["latitude" => 43.9333, "longitude" => 12.4500]],
"Salomon" => ["capital_fr" => "honiara", "capital_en" => "honiara", "gps" => ["latitude" => -9.4456, "longitude" => 159.9729]],
"Serbie" => ["capital_fr" => "belgrade", "capital_en" => "belgrade", "gps" => ["latitude" => 44.7866, "longitude" => 20.4489]],
"Slovaquie" => ["capital_fr" => "bratislava", "capital_en" => "bratislava", "gps" => ["latitude" => 48.1486, "longitude" => 17.1077]],
"Slovénie" => ["capital_fr" => "ljubljana", "capital_en" => "ljubljana", "gps" => ["latitude" => 46.0569, "longitude" => 14.5058]],
"Suriname" => ["capital_fr" => "paramaribo", "capital_en" => "paramaribo", "gps" => ["latitude" => 5.8520, "longitude" => -55.2038]],
"Tadjikistan" => ["capital_fr" => "douchanbé", "capital_en" => "dushanbe", "gps" => ["latitude" => 38.5598, "longitude" => 68.7870]],
"Timor oriental" => ["capital_fr" => "dili", "capital_en" => "dili", "gps" => ["latitude" => -8.5569, "longitude" => 125.5603]],
"Tonga" => ["capital_fr" => "nuku'alofa", "capital_en" => "nuku'alofa", "gps" => ["latitude" => -21.1394, "longitude" => -175.2048]],
"Turkménistan" => ["capital_fr" => "achgabat", "capital_en" => "ashgabat", "gps" => ["latitude" => 37.9601, "longitude" => 58.3261]],
"Tuvalu" => ["capital_fr" => "funafuti", "capital_en" => "funafuti", "gps" => ["latitude" => -8.5243, "longitude" => 179.1942]],
"Ukraine" => ["capital_fr" => "kiev", "capital_en" => "kyiv", "gps" => ["latitude" => 50.4501, "longitude" => 30.5234]],
"Uruguay" => ["capital_fr" => "montevideo", "capital_en" => "montevideo", "gps" => ["latitude" => -34.9011, "longitude" => -56.1645]],
"Vanuatu" => ["capital_fr" => "port-vila", "capital_en" => "port vila", "gps" => ["latitude" => -17.7333, "longitude" => 168.3273]],
"Vatican" => ["capital_fr" => "vatican", "capital_en" => "vatican city", "gps" => ["latitude" => 41.9029, "longitude" => 12.4534]],
"Venezuela" => ["capital_fr" => "caracas", "capital_en" => "caracas", "gps" => ["latitude" => 10.4806, "longitude" => -66.9036]],
"Antigua-et-Barbuda" => ["capital_fr" => "saint john's", "capital_en" => "saint john's", "gps" => ["latitude" => 17.1274, "longitude" => -61.8468]],
"Bahamas" => ["capital_fr" => "nassau", "capital_en" => "nassau", "gps" => ["latitude" => 25.0343, "longitude" => -77.3963]],
"Belize" => ["capital_fr" => "belmopan", "capital_en" => "belmopan", "gps" => ["latitude" => 17.2514, "longitude" => -88.7590]],
"Bolivie" => ["capital_fr" => "la paz", "capital_en" => "la paz", "gps" => ["latitude" => -16.5000, "longitude" => -68.1500]],
"Cap-Vert" => ["capital_fr" => "praia", "capital_en" => "praia", "gps" => ["latitude" => 14.9330, "longitude" => -23.5133]],
"Dominique" => ["capital_fr" => "roseau", "capital_en" => "roseau", "gps" => ["latitude" => 15.3092, "longitude" => -61.3790]],
"Fidji" => ["capital_fr" => "suva", "capital_en" => "suva", "gps" => ["latitude" => -18.1248, "longitude" => 178.4501]],
"Haïti" => ["capital_fr" => "port-au-prince", "capital_en" => "port-au-prince", "gps" => ["latitude" => 18.5944, "longitude" => -72.3074]],
"Jamaïque" => ["capital_fr" => "kingston", "capital_en" => "kingston", "gps" => ["latitude" => 17.9712, "longitude" => -76.7936]],
"Kiribati" => ["capital_fr" => "tarawa", "capital_en" => "tarawa", "gps" => ["latitude" => 1.4518, "longitude" => 173.0327]],
"Lesotho" => ["capital_fr" => "maseru", "capital_en" => "maseru", "gps" => ["latitude" => -29.3158, "longitude" => 27.4860]],
"Malawi" => ["capital_fr" => "lilongwe", "capital_en" => "lilongwe", "gps" => ["latitude" => -13.9626, "longitude" => 33.7741]],
"Maldives" => ["capital_fr" => "malé", "capital_en" => "male", "gps" => ["latitude" => 4.1755, "longitude" => 73.5093]],
"Malte" => ["capital_fr" => "la valette", "capital_en" => "valletta", "gps" => ["latitude" => 35.8997, "longitude" => 14.5147]],
"Marshall" => ["capital_fr" => "majuro", "capital_en" => "majuro", "gps" => ["latitude" => 7.0897, "longitude" => 171.3803]],
"Micronésie" => ["capital_fr" => "palikir", "capital_en" => "palikir", "gps" => ["latitude" => 6.9248, "longitude" => 158.1611]],
"Nauru" => ["capital_fr" => "yaren", "capital_en" => "yaren", "gps" => ["latitude" => -0.5477, "longitude" => 166.9209]],
"Saint-Kitts-et-Nevis" => ["capital_fr" => "basseterre", "capital_en" => "basseterre", "gps" => ["latitude" => 17.3026, "longitude" => -62.7177]],
"Saint-Vincent-et-les-Grenadines" => ["capital_fr" => "kingstown", "capital_en" => "kingstown", "gps" => ["latitude" => 13.1600, "longitude" => -61.2248]],
"Sainte-Lucie" => ["capital_fr" => "castries", "capital_en" => "castries", "gps" => ["latitude" => 14.0101, "longitude" => -60.9875]],
"Samoa" => ["capital_fr" => "apia", "capital_en" => "apia", "gps" => ["latitude" => -13.8333, "longitude" => -171.7500]],
"Salomon" => ["capital_fr" => "honiara", "capital_en" => "honiara", "gps" => ["latitude" => -9.4456, "longitude" => 159.9729]],
"Saint-Marin" => ["capital_fr" => "saint-marin", "capital_en" => "san marino", "gps" => ["latitude" => 43.9333, "longitude" => 12.4500]],
"Sao Tomé-et-Principe" => ["capital_fr" => "sao tomé", "capital_en" => "sao tome", "gps" => ["latitude" => 0.3365, "longitude" => 6.7273]],
"Seychelles" => ["capital_fr" => "victoria", "capital_en" => "victoria", "gps" => ["latitude" => -4.6191, "longitude" => 55.4513]],
"Tonga" => ["capital_fr" => "nuku'alofa", "capital_en" => "nuku'alofa", "gps" => ["latitude" => -21.1394, "longitude" => -175.2048]],
"Trinité-et-Tobago" => ["capital_fr" => "port-d'espagne", "capital_en" => "port of spain", "gps" => ["latitude" => 10.6549, "longitude" => -61.5019]],
"Tuvalu" => ["capital_fr" => "funafuti", "capital_en" => "funafuti", "gps" => ["latitude" => -8.5243, "longitude" => 179.1942]],
"Vanuatu" => ["capital_fr" => "port-vila", "capital_en" => "port vila", "gps" => ["latitude" => -17.7333, "longitude" => 168.3273]]
];
//mélanger les pays et choisir les X premiers
$countryKeys = array_keys($countries);
shuffle($countryKeys);

// Créer un tableau mélangé
$pays_melange = [];
foreach ($countryKeys as $key) {
    $pays_melange[$key] = $countries[$key];
}
$totalCountryToGuess= 20;
$PickedCountries = array_slice($pays_melange, 0, $totalCountryToGuess,true);//choisir les X premiers pays
logMessage("******** nouveaux pays **********", "debug.txt");
foreach ($PickedCountries as $country => $details) {//afficher les pays choisis avec leurs capitales
    logMessage("Pays: $country, Capitale FR: " . $details['capital_fr'] . ", Capitale EN: " . $details['capital_en'], "debug.txt");
}
logMessage("********************************", "debug.txt");
return $PickedCountries;

}

function getRandomCountry($excludedCountries = []) {
    $PickedCountriesWithDetails = $_SESSION['pickedCountries'];
    
    $PickedCountries = array_keys($PickedCountriesWithDetails);
    //$excludedCountries = array_keys($excludedCountries);
    logMessage("Pays disponible au debut de GetRandomCountry: " . implode(", ", $PickedCountries), "debug.txt");
    logMessage("Pays Exclu au debut de GetRandomCountry: " . implode(", ", $excludedCountries), "debug.txt");
    
    // Remove countries alredey guessed
    if (!empty($excludedCountries)) {
        foreach ($excludedCountries as $excludedCountry) {
            if (($key = array_search($excludedCountry, $PickedCountries)) !== false) {
                unset($PickedCountries[$key]);
            }

            //unset($PickedCountries[$excludedCountry]);
        }        
    }
    logMessage("Pays restant à deviner apres suppression des exclus: " . implode(", ", $PickedCountries), "debug.txt");

    // Check if all countries have already been guessed
    if (empty($PickedCountries)) {
        logMessage("La liste des pays à trouver est vide, renvoi NULL", "debug.txt");
        return null;
    }

    // Select a random country from the remaining list
    $countryNumber = array_rand($PickedCountries);
    $countryName = $PickedCountries[$countryNumber];
    //logMessage("Contenu de PickedCountries: " . print_r($PickedCountries, true), "debug.txt");
    logMessage("Pay sélectionné au hasard: $countryName", "debug.txt");
    // Return the selected country with the capitals and the number of countries left
    
    return $countryName;
}


// Vérifier la réponse de l'utilisateur
function checkCapital($userInput,$correctCapitalFr,$correctCapitalEn, $desiredPercent = 70) {
    $userInput = trim($userInput);
    $userInput = strtolower($userInput);

    // Initialiser la variable de pourcentage de similarité
    $maxPercent = 0;

    // Vérifier la similarité avec les deux versions des capitales
    //$capitalFr = $_SESSION['correctCapitalFr'];
    //$capitalEn = $_SESSION['correctCapitalEn'];
    
    similar_text($userInput, $correctCapitalFr, $percentFr);
    similar_text($userInput, $correctCapitalEn, $percentEn);
    $percentFr = round($percentFr, 1);
    $percentEn = round($percentEn, 1);
    if ($percentFr > $maxPercent) {
        $maxPercent = $percentFr;
    }
    if ($percentEn > $maxPercent) {
        $maxPercent = $percentEn;
    }
    
    // Vérifier si la similarité maximale est supérieure au pourcentage souhaité
    if ($maxPercent > $desiredPercent) {
        // Bonne réponse
        $message = "Correct !";
    } else {
        // Mauvaise réponse
        $message = "$userInput est une mauvaise réponse ($maxPercent % uniquement de la bonne réponse).<br>La bonne réponse est '$correctCapitalFr' ou '$correctCapitalEn'"; 
    }
    return $message;
}

function logMessage($message, $logFilePath = __DIR__ . '/logs.txt') {
    // Ajouter la date et l'heure au message
    $date = date('Y-m-d H:i:s');
    $logEntry = "[$date] $message" . PHP_EOL;

    // Écrire le message dans le fichier de loga
    file_put_contents($logFilePath, $logEntry, FILE_APPEND);
}

function initializeSessionVariables() {
    if (!isset($_SESSION['excludedCountries'])) {//
        $_SESSION['excludedCountries'] = [];
    }

    if (!isset($_SESSION['wrongCountries'])) {
        $_SESSION['wrongCountries'] = [];
    }

    if (!isset($_SESSION['CountriesToGuess'])) {
        $_SESSION['CountriesToGuess'] = 20;
    }

    if (!isset($_SESSION['errorCount'])) {
        $_SESSION['errorCount'] = 0;
    }
    }
    if (!isset($_SESSION['excludedCount'])) {
        $_SESSION['excludedCount'] = 0;
    }

    if (!isset($_SESSION['countriesLeft'])) {
        $_SESSION['countriesLeft'] = 0;
    }
    if (!isset($_SESSION['pickedCountries'])) {
        $_SESSION['pickedCountries'] = initiateCountries();
    }

?>