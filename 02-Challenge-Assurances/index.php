<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>O'ssurance</title>
		<link rel="stylesheet" href="../02-Challenge-Assurances/css/style.css">
	</head>
	<body>
		<?php

		$reponse= [
			'Refus d\'assurer',
			'Rouge',
			'Orange',
			'Vert',
			'Bleu',

		];
		$index = 1 ; // correspond au palier qui sera affiché 
		$palier = $reponse[$index] ;
		
		// 1. Créer un formulaire HTML demandant les informations nécessaires au calcul
		// 2. Après soumission du formulaire, créer les variables qui vont contenir les informations du client
		// 3. Écrire le script qui permet de déterminer à quel palier peut prétendre un client, selon ses informations (et donc à quelle couleur de tarif)
		// 4. Afficher le résultat, par ex. "Votre client a droit au tarif Vert"
		// Bonus 1. Afficher le résultat de trois manières différentes : via `if` & `elseif` ou bien `switch` ou bien `array()`
		// Bonus 2. fioritures graphiques
		if (!empty($_POST)) {
			
			// - Par défaut, tout le monde entre au palier 1 (tarif Rouge)
			// - Le nombre d'accidents réduit d'autant le nombre de paliers
			// - Un permis de plus de 2 ans augmente le palier d'un niveau
			// - Un âge de plus de 25 ans augmente le palier d'un niveau
			// - Une ancienneté de plus de 5 ans augmente le palier d'un niveau, si le conducteur n'est pas déjà refusé 

			
			
			$index=$index+$_POST['nbAccidents'] ;
			
			if ($_POST['anciennete_Permis']>=2) {
				$index++;
			}
			
			if ($_POST['age']>=25) {
				$index++;
			}else {
				$index--;
			}
			
			if ($_POST['anciennete_Assureur']>=5 && $index>0) {
				$index++;
			}
			
			$palier = $reponse[$index] ;

			?>
			
	
			<?php
		};
		?>

		<h1>O'ssurance</h1>
		<h2>Calcul du tarif de votre client</h2>

		<p>Votre client à droit au tarif <strong><?=$palier?></strong></p>
		
			<div class="left">

				<!-- création d'un formulaire
				La balise <form></form> est indispensable -->

				<form action="" method="post">
					<div class="form">
					
							
						<label for="age">Âge</label>
						<input type="number" name="age" id="age" required>

						<label for="anciennete_Permis">Nombre d'années de permis</label>
						<input type="number" name="anciennete_Permis" id="anciennete_Permis" required>
						
					
						<label for="nbAccidents">Nombre d'accidents responsables</label>
						<input type="number" name="nbAccidents" id="nbAccidents" required>
						
						<label for="anciennete_Assureur">Nombre d'années chez l'assureur</label>
						<input type="number" name="anciennete_Assureur" id="anciennete_Assureur" required>

						<div class="button">
						<button type="submit">Calculer le tarif</button>
					</div>
					
				</form>

			</div class="right">
				<img src="../02-Challenge-Assurances/images/voitures.jpg" alt="voiture">

			</div>
      	</div>
	</body>
</html>
