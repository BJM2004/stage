<?php
$conn = new mysqli("localhost", "root", "", "axaroyal");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$requete = "SELECT * FROM voyage";
$result = $conn->query($requete);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="bordereaux.css">
</head>
<body id="voyage">
    <nav>
        <img src="images/logo.png" alt="">
        <span><b>Royal</b><br> Know you can | AXA</span>
    </nav>
    <div class="home-button">
        <a href="index.php"><i class="fas fa-home"></i> </a>
    </div>
<h1>Bordereaux</h1>
    <form action="">
        <fieldset>
            <table id="versement_voyage">
                <legend>BORDEREAU DE VERSEMENT</legend>
                <tr>
                    <td>Ordre de versement</td>
                </tr>
                <tr>
                    <th>Client</th><th>N de police</th><th>Mode de paiement</th>
                    <th>Montant du versement</th><th>Sort de la police</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr data-id='" . $row["N_police"] . "'>";
                        echo '<td><input type="text" value="' . $row["Client"] . '"></td>';
                        echo '<td><input type="text" value="' . $row["N_police"] . '"></td>';
                        echo '<td><input type="text" value="' . $row["Mode_de_paiement"] . '"></td>';
                        echo '<td><input type="number" class="mdv" value="' . $row["Montant_de_versement"] . '"></td>';
                        echo '<td><input type="text" value="' . $row["Sort_de_la_police"] . '"></td>';
                        echo "</tr>";
                    }
                }
                ?>
                <tr class="valeur">
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="number" name="Montant_du_versement" class="mdv"></td>
                    <td><input type="text"></td>
                </tr>
                <tr class="new">
                </tr>
                <tr class="result">
                    <td>Total</td>
                    <td><input type="text" readonly></td>
                    <td><input type="text" readonly></td>
                    <td><input type="number" name="Montant_du_versement" class="mdvs" readonly></td>
                    <td><input type="text" readonly></td>
                </tr>
                <tr class="nouveau">
                    <td><input type="button" value="OK" id="insertButton"></td>
                    <td><input type="button" value="New" class="push"></td>
                </tr>
            </table>
        </fieldset>
    </form><br><br><br><br>
    <footer>
        <a href="voyage.php">Voyage</a>
        <a href="bordereaux.php">Automobile</a>
    </footer>
    <script src="bordereaux.js"></script>
    <script>

    </script>
</body>
</html>
