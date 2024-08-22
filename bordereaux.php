<?php
$conn = new mysqli("localhost", "root", "", "axaroyal");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$requete = "SELECT * FROM versement";
$requete_saisie = "SELECT * FROM saisie";
$requete_transmission = "SELECT * FROM piece_de_production";
$result = $conn->query($requete);
$result_saisie = $conn->query($requete_saisie);
$result_transmission = $conn->query($requete_transmission);
$result_transmission = $conn->query($requete_transmission);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="bordereaux.css">
    <title>Bordereaux</title>
</head>
<body id="bordereaux">
    <nav>
        <img src="images/logo.png" alt="">
        <span><b>Royal</b><br> Know you can | AXA</span>
    </nav>
    <div class="home-button">
        <a href="index.php"><i class="fas fa-home"></i> </a>
    </div>

    <h1>Bordereaux</h1>
    <div class="buttons">
        <button class="show-versement">Afficher Bordereau de Versement</button>
        <button class="show-saisie">Afficher Bordereau de Saisie</button>
        <button class="show-transmission">Afficher Bordereau de Transmission</button>
    </div>
    <form action="">
        <fieldset>
            <table id="versement">
                <legend>BORDEREAU DE VERSEMENT</legend>
                <tr>
                    <td>Ordre de versement</td>
                </tr>
                <tr>
                    <th>Client</th><th>N de police</th><th>Immatriculation</th><th>PU</th><th>Mode de paiement</th><th>Prime TTC</th><th>Vignette</th>
                    <th>Montant du versement</th><th>Sort de la police</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr data-id='" . $row["N_police"] . "'>";
                        echo '<td><input type="text" value="' . $row["Client"] . '"></td>';
                        echo '<td><input type="text" value="' . $row["N_police"] . '"></td>';
                        echo '<td><input type="text" value="' . $row["Immatriculation"] . '"></td>';
                        echo '<td><input type="text"  value="' . $row["PU"] . '"></td>';
                        echo '<td><input type="text" value="' . $row["Mode_de_paiement"] . '"></td>';
                        echo '<td><input type="number" class="pttc" value="' . $row["Prime_TTC"] . '"></td>';
                        echo '<td><input type="number" name="Vignette" class="v" value="' . $row["Vignette"] . '"></td>';
                        echo '<td><input type="number" value="' . $row["Montant_de_versement"] . '"></td>';
                        echo '<td><input type="text" name="Montant_du_versement" class="mdv" value="' . $row["Sort_de_la_police"] . '"></td>';
                        echo "</tr>";
                    }
                }
                ?>

                <tr class="valeur">
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="number" name="Prime_TTC" class="pttc"></td>
                    <td><input type="number" name="Vignette" class="v"></td>
                    <td><input type="number" name="Montant_du_versement" class="mdv"></td>
                    <td><input type="text"></td>
                </tr>

                <tr class="new">
                </tr>

                <tr class="result">
                    <td>Total</td>
                    <td><input type="hidden" readonly></td>
                    <td><input type="hidden" readonly></td>
                    <td><input type="hidden" readonly></td>
                    <td><input type="hidden" readonly></td>
                    <td><input type="number" name="Prime_TTC" class="pttcs" readonly></td>
                    <td><input type="number" name="Vignette" class="vs" readonly></td>
                    <td><input type="number" name="Montant_du_versement" class="mdvs" readonly></td>
                    <td><input type="hidden" readonly></td>
                </tr>
                <tr class="nouveau">
                    <td><input type="button" value="OK" id="insertButtonv"></td>
                    <td><input type="button" value="New" class="push"></td>
                </tr>

            </table>

        </fieldset>
        <fieldset>
            <table id="saisie">
                <legend>BORDEREAU DE SAISIE</legend>
                <tr>
                    <td>Ordre de versement</td>
                </tr>
                <tr>
                    <th>Client</th><th>N de police</th><th>N ATTESTATION</th><th>NATURE DU RISQUE</th><th>GARANTIE</th><th>DATE D'EFFET</th><th>DATE D'ECHEANCE</th><th>DUREE</th><th>Immatriculation</th><th>PTTC</th><th>VIGNETTE</th><th>Total</th>

                </tr>
                <?php
                if ($result_saisie->num_rows > 0) {
                    while ($row = $result_saisie->fetch_assoc()) {
                        echo "<tr data-id='" . $row["N_police"] . "'>";
                        echo '<td><input type="text" value="' . $row["Client"] . '"></td>';
                        echo '<td><input type="text" value="' . $row["N_police"] . '"></td>';
                        echo '<td><input type="text" value="' . $row["N_Attestation"] . '"></td>';
                        echo '<td><input type="text"  value="' . $row["Nature_du_risque"] . '"></td>';
                        echo '<td><input type="text" value="' . $row["Garantie"] . '"></td>';
                        echo '<td><input type="date" value="' . $row["Date_effect"] . '"></td>';
                        echo '<td><input type="date" value="' . $row["Date_echeance"] . '"></td>';
                        echo '<td><input type="text" value="' . $row["Duree"] . '"></td>';
                        echo '<td><input type="text" name="immatriculation" value="' . $row["N_Immatriculation"] . '"></td>';
                        echo '<td><input type="number" name="pttc" class="pttc_saisie" value="' . $row["PTTC"] . '"></td>';
                        echo '<td><input type="number" class="v_saisie" value="' . $row["Vignette"] . '"></td>';
                        echo '<td><input type="number" name="" class="total" readonly class="v_saisie" value=""></td>';
                        echo "</tr>";
                    }
                }
                ?>
                <tr class="valeur_saisie">
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="date" name="" ></td>
                    <td><input type="date" name="" ></td>
                    <td><input type="text"></td>
                    <td><input type="text" name="immatriculation" ></td>
                    <td><input type="number" name="pttc" class="pttc_saisie"></td>
                    <td><input type="number" class="v_saisie"></td>
                    <td><input type="number" name="" class="total" readonly></td>
                </tr>

                <tr class="new_saisie">
                </tr>

                <tr>
                    <td>Total</td>
                    <td><input type="hidden" name=""></td>
                    <td><input type="hidden" readonly></td>
                    <td><input type="hidden"readonly></td>
                    <td><input type="hidden" readonly></td>
                    <td><input type="hidden" readonly></td>
                    <td><input type="hidden" readonly></td>
                    <td><input type="hidden"  readonly></td>
                    <td><input type="hidden" readonly></td>
                    <td><input type="number" name="N ATTESTATION" class="pttc_saisieT" readonly></td>
                    <td><input type="number" class="v_saisieT" readonly></td>
                    <td><input type="number" name="" class="totalT" readonly></td>

                </tr>
                <tr class="nouveau">
                    <td><input type="button" value="OK" id="insertButtons"></td>

                    <td><input type="button" value="New" class="push_saisie"></td>

                </tr>

            </table>
        </fieldset>
        <fieldset>
            <table id="transmission">
                <legend>BORDEREAU DE TRANSMISSION</legend>
                <tr>
                    <td>Ordre de versement</td>
                </tr>
                <tr>
                    <th>Client</th><th>N de police</th><th>N ATTESTATION JAUNES</th><th>N ATTESTATION ROSES</th><th>NATURE DU RISQUE</th><th>GARANTIE</th>

                </tr>
                <?php
                if ($result_transmission->num_rows > 0) {
                    while ($row = $result_transmission->fetch_assoc()) {
                        echo "<tr data-id='" . $row["N_police"] . "'>";
                        echo '<td><input type="text" value="' . $row["Client"] . '"></td>';
                        echo '<td><input type="text" value="' . $row["N_police"] . '"></td>';
                        echo '<td><input type="text" value="' . $row["N_Attestation_jaune"] . '"></td>';
                        echo '<td><input type="text"  value="' . $row["N_Attestation_roses"] . '"></td>';
                        echo '<td><input type="text" value="' . $row["Nature_du_risque"] . '"></td>';
                        echo '<td><input type="text" value="' . $row["Garantie"] . '"></td>';
                        echo "</tr>";
                    }
                }
                ?>

                <tr class="valeur_transmission">
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text" name="N ATTESTATION ROSES" class="attestation_roses"></td>
                    <td><input type="text" name="N ATTESTATION JAUNIES" class="attestation_jaunies" ></td>
                    <td><input type="text"></td>
                </tr>

                <tr class="new_transmission">
                </tr>

                <tr class="nouveau" style="border-collapse:separate">
                <td><input type="button" value="OK" id="insertButtont"></td>
                <td><input type="button" value="New" class="push_transmission"> </td>

                </tr>
            </table>

        </fieldset>

    </form><br><br><br><br>
    <footer>
        <a href="voyage.php">Voyage</a>
        <a href="bordereaux.php">Automobile</a>
    </footer>

</body>
<script src="bordereaux.js"></script>
<script>
       // Afficher les tableaux lorsque les boutons sont cliqués
   document.querySelector(".show-versement").addEventListener("click", function() {
    document.getElementById("versement").style.display = "block";

});

document.querySelector(".show-saisie").addEventListener("click", function() {
    document.getElementById("saisie").style.display = "block";
});

document.querySelector(".show-transmission").addEventListener("click", function() {
    document.getElementById("transmission").style.display = "block";
});

</script>
<script src="js.js"></script>
</html>
