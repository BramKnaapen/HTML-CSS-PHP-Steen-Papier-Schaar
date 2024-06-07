<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" class="soort_spel">
        <input type="submit" value="speler vs speler" formaction="game.php">
        <input type="submit" value="speler vs computer" name="speler_vs_computer">
    </form>


    <?php
    session_start();
    if (isset($_POST['speler_vs_computer'])) {
        if (!isset($_SESSION['type'])) {
            $_SESSION['type'] = $_POST['speler_vs_computer'];
            echo "<style>
.soort_spel{
    display: none;
}
</style>";

            echo "<div class='speler_1'>";
            echo "<form method='post'>";
            echo "<label for='player1'>Speler 1: </label>";
            echo "</div>";

            echo "<div class='speler_1'>";

            echo "<select name='type1' id='speler1'>";
            echo "<option value='Steen'>Steen</option>";
            echo "<option value='Papier'>Papier</option>";
            echo "<option value='Schaar'>Schaar</option>";
            echo "</select>";
            echo "<input type='submit' value='Submit' name='submit_1'>";
            echo "</form>";
            echo "</div>";
        }
    }
    if (isset($_POST['submit_1']) && isset($_SESSION['type'])) {
        $_SESSION['type'] = $_POST['type1']; // Update the session with player 1's choice
        echo "<style>
.speler_1{
    display: none;
}
</style>";
        echo "<div class='center'>";
        echo "Keuze speler 1: " . $_SESSION['type'] . "<br>";
        $computer = mt_rand(1, 3);
        if ($computer == 1) {
            $_SESSION['type2'] = 'Steen';
            echo "keuze computer: " . $_SESSION['type2'];
        } elseif ($computer == 2) {
            $_SESSION['type2'] = 'Papier';
            echo "keuze computer: " . $_SESSION['type2'];
        } elseif ($computer == 3) {
            $_SESSION['type2'] = 'Schaar';
            echo "keuze computer: " . $_SESSION['type2'];
        }

        echo "</div>";
        if ($_SESSION['type'] === $_SESSION['type2']) {
            echo "<p>Gelijkspel</p>";
        } elseif ($_SESSION['type'] == 'Steen' && $_SESSION['type2'] == 'Schaar') {
            echo "<p>Speler 1 heeft gewonnen</p>";
        } elseif ($_SESSION['type'] == 'Papier' && $_SESSION['type2'] == 'Steen') {
            echo "<p>Speler 1 heeft gewonnen</p>";
        } elseif ($_SESSION['type'] == 'Schaar' && $_SESSION['type2'] == 'Papier') {
            echo "<p>Speler 1 heeft gewonnen</p>";
        } else {
            echo "<p>Computer heeft gewonnen, Helaas!!!</p>";
        }
        session_destroy();
    }

    ?>


</body>

</html>