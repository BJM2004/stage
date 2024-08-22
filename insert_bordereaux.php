<?php
$conn = new mysqli("localhost", "root", "", "axaroyal");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client = $conn->real_escape_string($_POST['Client']);
    $n_police = $conn->real_escape_string($_POST['N_police']);
    $immatriculation = $conn->real_escape_string($_POST['Immatriculation']);
    $pu = $conn->real_escape_string($_POST['PU']);
    $mode_de_paiement = $conn->real_escape_string($_POST['Mode_de_paiement']);
    $prime_ttc = $conn->real_escape_string($_POST['Prime_TTC']);
    $vignette = $conn->real_escape_string($_POST['Vignette']);
    $montant_du_versement = $conn->real_escape_string($_POST['Montant_du_versement']);
    $sort_de_la_police = $conn->real_escape_string($_POST['Sort_de_la_police']);

    $sql = "INSERT INTO versement (Client, N_police, Immatriculation, PU, Mode_de_paiement, Prime_TTC, Vignette, Montant_de_versement, Sort_de_la_police)
            VALUES ('$client', '$n_police', '$immatriculation', '$pu', '$mode_de_paiement', '$prime_ttc', '$vignette', '$montant_du_versement', '$sort_de_la_police')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<?php
$conns = new mysqli("localhost", "root", "", "axaroyal");

if ($conns->connect_error) {
    die("Connection failed: " . $conns->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client = $conns->real_escape_string($_POST['Client']);
    $n_police = $conns->real_escape_string($_POST['N_police']);
    $immatriculation = $conns->real_escape_string($_POST['Immatriculation']);
    $pu = $conn->real_escape_string($_POST['PU']);
    $mode_de_paiement = $conns->real_escape_string($_POST['Mode_de_paiement']);
    $prime_ttc = $conns->real_escape_string($_POST['Prime_TTC']);
    $vignette = $conns->real_escape_string($_POST['Vignette']);
    $montant_du_versement = $conns->real_escape_string($_POST['Montant_du_versement']);
    $sort_de_la_police = $conns->real_escape_string($_POST['Sort_de_la_police']);

    $sql = "INSERT INTO versement (Client, N_police, Immatriculation, PU, Mode_de_paiement, Prime_TTC, Vignette, Montant_de_versement, Sort_de_la_police)
            VALUES ('$client', '$n_police', '$immatriculation', '$pu', '$mode_de_paiement', '$prime_ttc', '$vignette', '$montant_du_versement', '$sort_de_la_police')";

    if ($conns->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
