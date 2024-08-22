

document.addEventListener('DOMContentLoaded', () => {
    let valeurs = document.querySelectorAll('.valeur');
    let buts = document.querySelectorAll('.push');
    let newElement = document.querySelector('.new');

    let valeur_saisie = document.querySelectorAll('.valeur_saisie');
    let newElement_saisie= document.querySelector('.new_saisie');
    let buts_saisie = document.querySelectorAll('.push_saisie');

    let newElement_transmission = document.querySelector('.new_transmission');
    let valeur_transmission = document.querySelectorAll('.valeur_transmission');
    let buts_transmission = document.querySelectorAll('.push_transmission');

  // Sélectionner les colonnes où vous voulez calculer les totaux (adapter les sélecteurs)
  const colonnes = ['pttc', 'v', 'mdv'];
  const colonnes_saisie = ['pttc_saisie', 'v_saisie', 'total'];

  // Initialiser un tableau pour stocker les totaux
  let totaux = colonnes.map(() => 0);
    let champsTotaux_saisie = colonnes_saisie.map(() => 0);

  // Fonction pour ajouter un écouteur d'événement à tous les éléments input d'un élément donné
  function ajouterEcouteur(element) {
      // Sélectionner tous les éléments input de type nombre
      const inputs = element.querySelectorAll('input[type="number"]');
      inputs.forEach(input => {
          input.addEventListener('change', calculerTotaux);
          input.addEventListener('keyup',calculerTotaux);
      });
  }

  // Initialement, ajouter l'écouteur à tous les éléments input existants
  ajouterEcouteur(document.querySelector('table'));

/*Ajout des nouvelles personnes */
buts_transmission.forEach(button => {
    button.addEventListener('click', () => {
        // Cloner la première ligne (à adapter si nécessaire)
        let nouvelleLignet = valeur_transmission[0].cloneNode(true);


        // Vider les champs d'entrée du clone
        nouvelleLignet.querySelectorAll('input').forEach(input => {
            input.value = '';
        });

        // Insérer la nouvelle ligne après la ligne actuelle
        newElement_transmission.parentNode.insertBefore(nouvelleLignet, newElement_transmission);
        ajouterEcouteur(nouvelleLignet);
    });
});

  buts.forEach(button => {
      button.addEventListener('click', () => {
          // Cloner la première ligne (à adapter si nécessaire)
          let nouvelleLigne = valeurs[0].cloneNode(true);


          // Vider les champs d'entrée du clone
          nouvelleLigne.querySelectorAll('input').forEach(input => {
              input.value = '';
          });
          console.log("hey");

          // Insérer la nouvelle ligne après la ligne actuelle
          newElement.parentNode.insertBefore(nouvelleLigne, newElement);
          ajouterEcouteur(nouvelleLigne);
      });
  });
  buts_saisie.forEach(button => {
    button.addEventListener('click', () => {
        // Cloner la première ligne (à adapter si nécessaire)
        let nouvelleLigne = valeur_saisie[0].cloneNode(true);


        // Vider les champs d'entrée du clone
        nouvelleLigne.querySelectorAll('input').forEach(input => {
            input.value = '';
        });

        // Insérer la nouvelle ligne après la ligne actuelle
        newElement_saisie.parentNode.insertBefore(nouvelleLigne, newElement_saisie);
        ajouterEcouteur(nouvelleLigne);
    });
});



  // Calcul du total (à adapter selon vos besoins)
  function calculerTotaux() {
      // Sélectionner tous les champs de totaux
      const champsTotaux = document.querySelectorAll('.pttcs, .vs, .mdvs');
      const champsTotaux_saisie = document.querySelectorAll('.pttc_saisieT, .v_saisieT, .totalT');

      // Réinitialiser la valeur de chaque champ
      champsTotaux.forEach(champ => {
          champ.value = '';
      });
      champsTotaux_saisie.forEach(champ => {
        champ.value = '';
    });

      // Sélectionner toutes les lignes (sauf la première qui contient les en-têtes)
      const lignes = document.querySelectorAll('#versement tr:not(:first-child)');
      const lignes_voyage = document.querySelectorAll('#versement_voyage tr:not(:first-child)');
        const lignes_saisie = document.querySelectorAll('#saisie tr:not(:first-child)');
        const ligne_voyage = document.querySelectorAll('#versement_voyage tr:not(:first-child)');

      // Initialiser un tableau pour stocker les totaux
      let totaux = colonnes.map(() => 0);
      let totaux_saisie = colonnes_saisie.map(() => 0);
    
      lignes.forEach(ligne => {
          const cellules = ligne.querySelectorAll('td input[type="number"]');
          cellules.forEach((cellule, index) => {
              // Nettoyer la valeur pour supprimer les espaces et autres caractères
              const valeurString = cellule.value.trim();
              // Convertir en nombre en utilisant parseFloat pour gérer les nombres à virgule flottante
              const valeur = parseFloat(valeurString);
              if (!isNaN(valeur)) {
                  totaux[index] += valeur;
              } else {
                  console.error("Valeur non numérique:", valeurString);
              }
          });
      });
      lignes_voyage.forEach(ligne => {
        const cellules = ligne.querySelectorAll('td input[type="number"]');
        cellules.forEach((cellule, index) => {
            // Nettoyer la valeur pour supprimer les espaces et autres caractères
            const valeurString = cellule.value.trim();
            // Convertir en nombre en utilisant parseFloat pour gérer les nombres à virgule flottante
            const valeur = parseFloat(valeurString);
            if (!isNaN(valeur)) {
                totaux[index] += valeur;
                console.log("hey")
            } else {
                console.error("Valeur non numérique:", valeurString);
            }
        });
    });

      lignes_saisie.forEach(ligne => {
        const cellules = ligne.querySelectorAll('td input[type="number"]');
        cellules.forEach((cellule, index) => {
            // Nettoyer la valeur pour supprimer les espaces et autres caractères
            const valeurString = cellule.value.trim();
            // Convertir en nombre en utilisant parseFloat pour gérer les nombres à virgule flottante
            const valeur = parseFloat(valeurString);
            if (!isNaN(valeur)) {
                totaux_saisie[index] += valeur;
            } else {
                console.error("Valeur non numérique:", valeurString);
            }
        });
    });


      // Afficher les totaux dans les champs correspondants
      champsTotaux.forEach((champ, index) => {
          champ.value = totaux[index];
      });
        champsTotaux_saisie.forEach((champ, index) => {
            champ.value = totaux_saisie[index];
        });

  }

  // Appel initial pour calculer le total au chargement de la page
  calculerTotaux();
});



document.addEventListener('DOMContentLoaded', function() {
    //insersion et update des données dans la table voyage
    try {
        const table = document.getElementById('versement_voyage');

        table.addEventListener('input', function(event) {
            const row = event.target.closest('tr');
            /*Update de la table voyage*/
            if (row && row.dataset.id) {
                const N_police = row.dataset.id;
                const Client = row.querySelector('td:nth-child(1) input').value;
                const Mode_de_paiement = row.querySelector('td:nth-child(3) input').value;
                const Montant_de_versement = row.querySelector('td:nth-child(4) input').value;
                const Sort_de_la_police = row.querySelector('td:nth-child(5) input').value;
    
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'update_voyage.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send(`N_police=${N_police}&Client=${Client}&Mode_de_paiement=${Mode_de_paiement}&Montant_de_versement=${Montant_de_versement}&Sort_de_la_police=${Sort_de_la_police}`);
            }
        });
    
        // Ajouter un bouton pour l'insertion
        const insertButton = document.getElementById('insertButton');
        insertButton.addEventListener('click', function() {
            const row = table.querySelectorAll('tr'); 
            let rowi = row[row.length-4];// Sélectionne l'avant-dernière ligne

        if (rowi) {
            const client = rowi.querySelector('td:nth-child(1) input').value;
            const n_police = rowi.querySelector('td:nth-child(2) input').value;
            const mode_de_paiement = rowi.querySelector('td:nth-child(3) input').value;
            const montant_de_versement = rowi.querySelector('td:nth-child(4) input').value;
            const sort_de_la_police = rowi.querySelector('td:nth-child(5) input').value;
    
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "insert_voyage.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        console.log(xhr.responseText);
                    }
                };
                xhr.send("Client=" + encodeURIComponent(client) +
                         "&N_police=" + encodeURIComponent(n_police) +
                         "&Mode_de_paiement=" + encodeURIComponent(mode_de_paiement) +
                         "&Montant_de_versement=" + encodeURIComponent(montant_de_versement) +
                         "&Sort_de_la_police=" + encodeURIComponent(sort_de_la_police));
            }
        });
    
        
    } catch (error) {
        
    }
    try {
                const table = document.getElementById('saisie');

        table.addEventListener('input', function(event) {
            const row = event.target.closest('tr');
            /*Update de la table voyage*/
            if (row && row.dataset.id) {
                const N_police = row.dataset.id;
                const Client = row.querySelector('td:nth-child(1) input').value;
                const N_Attestation = row.querySelector('td:nth-child(3) input').value;
                const NATURE_DU_RISQUE = row.querySelector('td:nth-child(4) input').value;
                const GARANTIE = row.querySelector('td:nth-child(5) input').value;
                const DATE_D_EFFET = row.querySelector('td:nth-child(6) input').value;
                const DATE_D_ÉCHEANCE = row.querySelector('td:nth-child(7) input').value;
                const DUREE = row.querySelector('td:nth-child(8) input').value;
                const Immatriculation = row.querySelector('td:nth-child(9) input').value;
                const PTTC = row.querySelector('td:nth-child(10) input').value;
                const VIGNETTE = row.querySelector('td:nth-child(11) input').value;
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'insert_bordereaux.php', true);
                xhr.setRequestHeader('Conte:nt-Type', 'application/x-www-form-urlencoded');
                xhr.send(`N_police=${N_police}&Client=${Client}&N_Attestation=${N_Attestation}&NATURE_DU_RISQUE=${NATURE_DU_RISQUE}&GARANTIE=${GARANTIE}&DATE_D_EFFET=${DATE_D_EFFET}&DATE_D_ÉCHEANCE=${DATE_D_ÉCHEANCE}&DUREE=${DUREE}&Immatriculation=${Immatriculation}&PTTC=${PTTC}&VIGNETTE=${VIGNETTE}`);
            }
        });
    
        // Ajouter un bouton pour l'insertion
        const insertButton = document.getElementById('insertButtons');
        insertButton.addEventListener('click', function() {
            const row = table.querySelectorAll('tr'); 
            let rowi = row[row.length-4];// Sélectionne l'avant-dernière ligne
            
        if (rowi) {
            const N_police = row.dataset.id;
            const Client = row.querySelector('td:nth-child(1) input').value;
            const N_Attestation = row.querySelector('td:nth-child(3) input').value;
            const NATURE_DU_RISQUE = row.querySelector('td:nth-child(4) input').value;
            const GARANTIE = row.querySelector('td:nth-child(5) input').value;
            const DATE_D_EFFET = row.querySelector('td:nth-child(6) input').value;
            const DATE_D_ÉCHEANCE = row.querySelector('td:nth-child(7) input').value;
            const DUREE = row.querySelector('td:nth-child(8) input').value;
            const Immatriculation = row.querySelector('td:nth-child(9) input').value;
            const PTTC = row.querySelector('td:nth-child(10) input').value;
            const VIGNETTE = row.querySelector('td:nth-child(11) input').value;

                const xhr = new XMLHttpRequest();
                xhr.open("POST", "insert_voyage.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        console.log(xhr.responseText);
                    }
                };
                xhr.send(`N_police=${N_police}&Client=${Client}&N_Attestation=${N_Attestation}&NATURE_DU_RISQUE=${NATURE_DU_RISQUE}&GARANTIE=${GARANTIE}&DATE_D_EFFET=${DATE_D_EFFET}&DATE_D_ÉCHEANCE=${DATE_D_ÉCHEANCE}&DUREE=${DUREE}&Immatriculation=${Immatriculation}&PTTC=${PTTC}&VIGNETTE=${VIGNETTE}`);
            }
        });

    } catch (error) {
        
    }
});



