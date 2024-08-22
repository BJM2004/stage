<?php
$conn = new mysqli("localhost", "root", "", "axaroyal");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client = $conn->real_escape_string($_POST['Client']);
    $n_police = $conn->real_escape_string($_POST['N_police']);
    $mode_de_paiement = $conn->real_escape_string($_POST['Mode_de_paiement']);
    $montant_de_versement = $conn->real_escape_string($_POST['Montant_de_versement']);
    $sort_de_la_police = $conn->real_escape_string($_POST['Sort_de_la_police']);

    $sql = "INSERT INTO voyage (Client, N_police, Mode_de_paiement, Montant_de_versement, Sort_de_la_police)
            VALUES ('$client', '$n_police', '$mode_de_paiement', '$montant_de_versement', '$sort_de_la_police')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
