<?php
// auteur: ishika
// functie: bewerk een ziekmelding op basis van de ziekmelding
include 'functions.php';

// Haal de ziekmelding uit de database op basis van de meegegeven id
if(isset($_GET['naam'])){
    $naam = $_GET['naam'];
    $ziekmelding = getZiekmeldingById($naam);
}

// Bewerk ziekmelding in de database
if(isset($_POST['submit'])){
    $naam = $_POST['naam'];
    $naam = $_POST['naam'];
    $reden = $_POST['reden'];
    $afdeling = $_POST['afdeling'];

    $result = updateZiekmelding($naam, $naam, $reden, $afdeling);

    if ($result) {
        echo '<script>alert("Ziekmelding met ID: ' . $naam . ' is bijgewerkt")</script>';
        echo "<script> location.replace('ziekmeldingen.php'); </script>";
    } else {
        echo '<script>alert("Ziekmelding met ID: ' . $naam . ' kon niet worden bijgewerkt")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziekmelding Bewerken</title>
</head>
<body>
    <h1>Ziekmelding Bewerken</h1>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="naam">Naam:</label><br>
        <input type="text" id="naam" name="naam" value="<?php echo $ziekmelding['naam']; ?>" required><br>
        <label for="reden">Reden:</label><br>
        <input type="text" id="reden" name="reden" value="<?php echo $ziekmelding['reden']; ?>" required><br>
        <label for="afdeling">Afdeling (optioneel):</label><br>
        <input type="text" id="afdeling" name="afdeling" value="<?php echo $ziekmelding['afdeling']; ?>"><br>
        <input type="submit" name="submit" value="Bijwerken">
    </form>
</body>
</html>
