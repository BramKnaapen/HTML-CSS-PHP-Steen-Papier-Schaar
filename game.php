<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <h1>steen papier schaar</h1>
    <div class="speler_1">
        <form method="get" class="speler_1">
            <label for="">Speler 1: </label>
    </div>
    <div class="speler_1">
        <select name="type" id="speler1">
            <option value="Steen">Steen</option>
            <option value="Papier">Papier</option>
            <option value="Schaar">Schaar</option>
        </select>
        <input type="submit" value="submit" name="submit">
        </form>
    </div>
    <button><a href="index.php">Nieuw spel</a></button>

    <?php

    session_start();
    if (isset($_GET['submit'])) {
        if (!isset($_SESSION['type'])) {
            $_SESSION['type'] = $_GET['type'];

            echo "<style>
            .speler_1{
                display: none;
            }
            </style>";

            echo "<div class='speler_2'>";
            echo "<form method='get'>";
            echo "<label for='player1'>Speler 2: </label>";
            echo "</div>";

            echo "<div class='speler_2'>";

            echo "<select name='type2' id='speler2'>";
            echo "<option value='Steen'>Steen</option>";
            echo "<option value='Papier'>Papier</option>";
            echo "<option value='Schaar'>Schaar</option>";
            echo "</select>";
            echo "<input type='submit' value='Submit' name='submit_2'>";
            echo "</form>";
            echo "</div>";
        }
    }

    if (isset($_SESSION['type']) && isset($_GET['type2'])) {
        echo "<div class='center'>";
        echo "Keuze speler 1: " . $_SESSION['type'] . "<br>";
        echo "Keuze speler 2: " . $_GET['type2'] . "<br>";
        echo "</div>";
        if ($_SESSION['type'] === $_GET['type2']) {
            echo "<p>Gelijkspel</p>";
        } elseif ($_SESSION['type'] == 'Steen' && $_GET['type2'] == 'Schaar') {
            echo "<p>Speler 1 heeft gewonnen<p>";
        } elseif ($_SESSION['type'] == 'Papier' && $_GET['type2'] == 'Steen') {
            echo "<p>Speler 1 heeft gewonnen</p>";
        } elseif ($_SESSION['type'] == 'Schaar' && $_GET['type2'] == 'Papier') {
            echo "<p>Speler 1 heeft gewonnen</p>";
        } else {
            echo "<p>Speler 2 heeft gewonnen, Helaas!!!</p>";
        }
        session_destroy();
    }

    ?>
</body>

</html>