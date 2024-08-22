<?php
$conn = new mysqli("localhost", "root", "", "axaroyal");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $N_police = $_POST['N_police'];
    $Client = $_POST['Client'];
    $Mode_de_paiement = $_POST['Mode_de_paiement'];
    $Montant_de_versement = $_POST['Montant_de_versement'];
    $Sort_de_la_police = $_POST['Sort_de_la_police'];

        $stmt = $conn->prepare("UPDATE voyage SET Client = ?, Mode_de_paiement = ?, Montant_de_versement = ?, Sort_de_la_police = ? WHERE N_police = ?");
        $stmt->bind_param("sssss", $Client, $Mode_de_paiement, $Montant_de_versement, $Sort_de_la_police, $N_police);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
