<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz des Capitales</title>
</head>
<body>
    <?php
    include 'logic.php';
    ?>
    <h1>Quelle est la capitale de <?php echo $country; ?> ?</h1>
    <form method="post" action="logic.php">
        <input type="text" name="capital" required>
        <button type="submit">Soumettre</button>
    </form>
    <?php
    if (isset($_GET['correct'])) {
        if ($_GET['correct'] == 1) {
            echo "<p>Correct!</p>";
        } else {
            echo "<p>Incorrect. Essayez encore.</p>";
        }
    }
    ?>
</body>
</html>