
    // Fonction pour envoyer les données via AJAX
    function sendData(tableId, rowClass) {
        var table = document.getElementById(tableId);
        var rows = table.querySelectorAll("." + rowClass);
        rows.forEach(function(row) {
            var client = row.querySelector('td:nth-child(1) input').value;
            var n_police = row.querySelector('td:nth-child(2) input').value;
            var immatriculation = row.querySelector('td:nth-child(3) input').value;
            var pu = row.querySelector('td:nth-child(4) input').value;
            var mode_de_paiement = row.querySelector('td:nth-child(5) input').value;
            var pttc = row.querySelector('td:nth-child(6) input').value;
            var v = row.querySelector('td:nth-child(7) input')?.value;
            var mdv = row.querySelector('td:nth-child(8) input')?.value;
            var sort_de_la_police = row.querySelector('td:nth-child(9) input')?.value;
            

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "insert_bordereaux.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            };
            xhr.send("Client=" + encodeURIComponent(client) +
                     "&N_police=" + encodeURIComponent(n_police) +
                     "&Immatriculation=" + encodeURIComponent(immatriculation) +
                     "&PU=" + encodeURIComponent(pu) +
                     "&Mode_de_paiement=" + encodeURIComponent(mode_de_paiement) +
                     "&Prime_TTC=" + encodeURIComponent(pttc) +
                     "&Vignette=" + encodeURIComponent(v) +
                     "&Montant_du_versement=" + encodeURIComponent(mdv) +
                     "&Sort_de_la_police=" + encodeURIComponent(sort_de_la_police));
        });
    }

    // Envoyer les données lorsque l'utilisateur modifie les champs
    const insertButtonv = document.getElementById('insertButtonv');
    const insertButtons = document.getElementById('insertButtons');
    const insertButtont = document.getElementById('insertButtont');

    insertButtonv.addEventListener('click', function() {
        sendData("versement", "valeur");
    });
    insertButtons.addEventListener('click', function() {
        sendData("saisie", "valeur_saisie");
    });
    insertButtont.addEventListener('click', function() {
        sendData("transmission", "valeur_transmission");
    });

