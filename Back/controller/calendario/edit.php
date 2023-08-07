<?php
	session_start();
	$mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));
	
		$puntosLocal = 0;
		$puntosVisita = 0;
        $id = $_GET['id'];
		$golesLocal = $_POST['goleslocal'];
		$golesVisitante = $_POST['golesvisita'];
		$equipoLocal = $_POST['idLocal'];
		$equipoVisita = $_POST['idVisita'];
		$golesLocalOld = $_POST['golesLocalOld'];
		$golesVisitaOld = $_POST['golesVisitaOld'];
			
		 if (isset($_POST['save'])) {
			$mysqli->query("UPDATE tblFixture SET goles_local='$golesLocal',goles_visita = '$golesVisitante' WHERE id=$id") or die($mysqli->error());
			// Puntos Posiciones
			if ($golesLocal > $golesVisitante) {
				$puntosLocal = 3;
				$puntosVisita = 0;
	
				$mysqli->query("UPDATE tblpocisiones SET puntos=puntos+'$puntosLocal' WHERE id_equipo = $equipoLocal");

				$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesLocal' WHERE id_equipo = $equipoLocal");
				$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesVisitante' WHERE id_equipo = $equipoVisita");

				$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesVisitante' WHERE id_equipo = $equipoLocal");
				$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesLocal' WHERE id_equipo = $equipoVisita");

			}
			if ($golesLocal < $golesVisitante) {
				$puntosLocal = 0;
				$puntosVisita = 3;
	
				$mysqli->query("UPDATE tblpocisiones SET puntos=puntos+'$puntosVisita' WHERE id_equipo = $equipoVisita");

				$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesLocal' WHERE id_equipo = $equipoLocal");
				$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesVisitante' WHERE id_equipo = $equipoVisita");

				$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesVisitante' WHERE id_equipo = $equipoLocal");
				$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesLocal' WHERE id_equipo = $equipoVisita");
			}
			if ($golesLocal == $golesVisitante) {
				$puntosLocal = 1;
				$puntosVisita = 1;
	
				$mysqli->query("UPDATE tblpocisiones SET puntos=puntos+'$puntosLocal' WHERE id_equipo = $equipoLocal");
				$mysqli->query("UPDATE tblpocisiones SET puntos=puntos+'$puntosVisita' WHERE id_equipo = $equipoVisita");

				$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesLocal' WHERE id_equipo = $equipoLocal");
				$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesVisitante' WHERE id_equipo = $equipoVisita");

				$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesVisitante' WHERE id_equipo = $equipoLocal");
				$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesLocal' WHERE id_equipo = $equipoVisita");
	
			}
	
		 }
		 if (isset($_POST['edit'])) {
			$mysqli->query("UPDATE tblFixture SET goles_local='$golesLocal',goles_visita = '$golesVisitante' WHERE id=$id") or die($mysqli->error());
                // if(($golesLocal>$golesVisitante)&&($golesLocalOld>$golesVisitaOld)){

				// }

				if(($golesLocal>$golesVisitante)&&($golesLocalOld<$golesVisitaOld)){ // se confundio y gano Local
					
					$mysqli->query("UPDATE tblpocisiones SET puntos=puntos - 3 WHERE id_equipo = $equipoVisita");
					$mysqli->query("UPDATE tblpocisiones SET puntos=puntos + 3 WHERE id_equipo = $equipoLocal");

					$golesL = $golesLocal - $golesLocalOld;
					$golesV = $golesVisitante - $golesVisitaOld;

					$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesL' WHERE id_equipo = $equipoLocal");
					// Cambiar Goles a Favor y Goles en contra
					if ($golesV > 0) {
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesV' WHERE id_equipo = $equipoVisita");	
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesV' WHERE id_equipo = $equipoLocal");	

					}else{
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesV' WHERE id_equipo = $equipoVisita");	
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesV' WHERE id_equipo = $equipoLocal");	
					}
					
					if ($golesL > 0) {
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesL' WHERE id_equipo = $equipoVisita");	
					}else{
						$mysqli->query("UPDATE tblpocisiones SET golC=golC-'$golesL' WHERE id_equipo = $equipoVisita");	
					}
				}

				if(($golesLocal<$golesVisitante)&&($golesLocalOld>$golesVisitaOld)){ // se confundio y gano Visita
					
					$mysqli->query("UPDATE tblpocisiones SET puntos=puntos - 3 WHERE id_equipo = $equipoLocal");
					$mysqli->query("UPDATE tblpocisiones SET puntos=puntos + 3 WHERE id_equipo = $equipoVisita");

					$golesL = $golesLocal - $golesLocalOld;
					$golesV = $golesVisitante - $golesVisitaOld;

					$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesV' WHERE id_equipo = $equipoVisita");
					// Cambiar Goles a Favor y Goles en contra
					if ($golesL > 0) {
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesL' WHERE id_equipo = $equipoLocal");	
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesL' WHERE id_equipo = $equipoVisita");	

					}else{
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesL' WHERE id_equipo = $equipoLocal");		
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesL' WHERE id_equipo = $equipoVisita");
					}
					
					if ($golesV > 0) {
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesV' WHERE id_equipo = $equipoLocal");	
					}else{
						$mysqli->query("UPDATE tblpocisiones SET golC=golC-'$golesV' WHERE id_equipo = $equipoLocal");	
					}
				}

				if(($golesLocal>$golesVisitante)&&($golesLocalOld==$golesVisitaOld)){ // estaban empatdos y gano local
					
					$mysqli->query("UPDATE tblpocisiones SET puntos=puntos+2 WHERE id_equipo = $equipoLocal");
					$mysqli->query("UPDATE tblpocisiones SET puntos=puntos - 2 WHERE id_equipo = $equipoVisita");

					$golesL = $golesLocal - $golesLocalOld;
					$golesV = $golesVisitante - $golesVisitaOld;

					$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesL' WHERE id_equipo = $equipoLocal");
					// Cambiar Goles a Favor y Goles en contra
					if ($golesV > 0) {
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesV' WHERE id_equipo = $equipoVisita");	
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesV' WHERE id_equipo = $equipoLocal");	

					}else{
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesV' WHERE id_equipo = $equipoVisita");	
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesV' WHERE id_equipo = $equipoLocal");	
					}
					
					if ($golesL > 0) {
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesL' WHERE id_equipo = $equipoVisita");	
					}else{
						$mysqli->query("UPDATE tblpocisiones SET golC=golC-'$golesL' WHERE id_equipo = $equipoVisita");	
					}
				}

				if(($golesLocal<$golesVisitante)&&($golesLocalOld==$golesVisitaOld)){ // estaban empatdos y gano Visita
					
					$mysqli->query("UPDATE tblpocisiones SET puntos=puntos-2 WHERE id_equipo = $equipoLocal");
					$mysqli->query("UPDATE tblpocisiones SET puntos=puntos + 2 WHERE id_equipo = $equipoVisita");

					$golesL = $golesLocal - $golesLocalOld;
					$golesV = $golesVisitante - $golesVisitaOld;

					$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesV' WHERE id_equipo = $equipoVisita");
					// Cambiar Goles a Favor y Goles en contra
					if ($golesL > 0) {
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesL' WHERE id_equipo = $equipoLocal");	
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesL' WHERE id_equipo = $equipoVisita");	

					}else{
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesL' WHERE id_equipo = $equipoLocal");		
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesL' WHERE id_equipo = $equipoVisita");
					}
					
					if ($golesV > 0) {
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesV' WHERE id_equipo = $equipoLocal");	
					}else{
						$mysqli->query("UPDATE tblpocisiones SET golC=golC-'$golesV' WHERE id_equipo = $equipoLocal");	
					}
				}
				if(($golesLocal==$golesVisitante)&&($golesLocalOld>$golesVisitaOld)){ // Gano Local y Empataron
					
					$mysqli->query("UPDATE tblpocisiones SET puntos=puntos-2 WHERE id_equipo = $equipoLocal");
					$mysqli->query("UPDATE tblpocisiones SET puntos=puntos + 1 WHERE id_equipo = $equipoVisita");

					$golesL = $golesLocal - $golesLocalOld;
					$golesV = $golesVisitante - $golesVisitaOld;

					// Cambiar Goles a Favor y Goles en contra
					if ($golesV > 0) {
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesV' WHERE id_equipo = $equipoVisita");	
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesV' WHERE id_equipo = $equipoLocal");	

					}else{
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesV' WHERE id_equipo = $equipoVisita");	
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesV' WHERE id_equipo = $equipoLocal");	
					}
					
					if ($golesL > 0) {
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesL' WHERE id_equipo = $equipoLocal");
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesL' WHERE id_equipo = $equipoVisita");	
					}else{
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesL' WHERE id_equipo = $equipoLocal");
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesL' WHERE id_equipo = $equipoVisita");	
					}
				}
				if(($golesLocal==$golesVisitante)&&($golesLocalOld<$golesVisitaOld)){ // Gano Visita y Empataron
					
					$mysqli->query("UPDATE tblpocisiones SET puntos=puntos + 1 WHERE id_equipo = $equipoLocal");
					$mysqli->query("UPDATE tblpocisiones SET puntos=puntos - 2 WHERE id_equipo = $equipoVisita");

					$golesL = $golesLocal - $golesLocalOld;
					$golesV = $golesVisitante - $golesVisitaOld;

					// Cambiar Goles a Favor y Goles en contra
					if ($golesL > 0) {
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesL' WHERE id_equipo = $equipoLocal");	
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesL' WHERE id_equipo = $equipoVisita");	

					}else{
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesL' WHERE id_equipo = $equipoLocal");		
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesL' WHERE id_equipo = $equipoVisita");
					}
					
					if ($golesV > 0) {
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesV' WHERE id_equipo = $equipoVisita");
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesV' WHERE id_equipo = $equipoLocal");	
					}else{
						$mysqli->query("UPDATE tblpocisiones SET golF=golF+'$golesV' WHERE id_equipo = $equipoVisita");
						$mysqli->query("UPDATE tblpocisiones SET golC=golC+'$golesV' WHERE id_equipo = $equipoLocal");	
					}
				}

		 }
	
		
		header('location: ../../calendario.php');
    
?>