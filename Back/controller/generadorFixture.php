<?php
$arrayEquipos = json_decode($_POST['str'], true);
$cantidadFechas = $_POST['cantidadFechas'];
$campeonato = $_POST['dropdownCampeonato'];
$temporada = $_POST['dropdownTemporada'];

$cantidadEquipos = count($arrayEquipos); 


if(count($arrayEquipos) - 1 == $cantidadFechas){
 /*Fixture sin equipos repetidos*/

  function scheduler($teams){
    // Check for even number or add a bye
    if (count($teams)%2 != 0){
      array_push($teams, 0);
    }
    // Splitting the teams array into two arrays
    $away = array_splice($teams,(count($teams)/2));
    $home = $teams;
    // The actual scheduling based on round robin
    for ($i=0; $i < count($home)+count($away)-1; $i++){
      for ($j=0; $j<count($home); $j++){
        $round[$i][$j]["Home"]=$home[$j];
        $round[$i][$j]["Away"]=$away[$j];
      }
      // Check if total numbers of teams is > 2 otherwise shifting the arrays is not neccesary
      if(count($home)+count($away)-1 > 2){
        $array_splice = array_splice($home,1,1);
        array_unshift($away,array_shift($array_splice));
        array_push($home,array_pop($away));
      }
    }
      return $round;
  }

  $all_games = array();
  $storage = array();
  $schedule = scheduler($arrayEquipos);
  $querysub ='';
  $mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));
  foreach($schedule AS $round => $games){
      echo "<br>";
      $roundC=$round+1;
     echo "Round: ".($round+1)."<br>";
     foreach($games AS $play){
      $home = $play["Home"];
      $away = $play["Away"];
      echo $home." - ".$away."\n";
      echo "campenato: ".$campeonato."\n";
      echo "temporada: ".$temporada."\n";
      $querysub = $querysub."(".$roundC.",".$home.",".$away.",".$campeonato.",".$temporada ."),";
    }
     
  }
    echo "\n";

    $querysub = trim($querysub, ',');
    echo "\n";
    $final = "INSERT INTO tblfechasnew (fecha,id_equipo_loc,id_equipo_vis,id_campeonato,id_temporada) VALUES ". $querysub;
    $mysqli->query($final);
    $mysqli->query("ALTER IGNORE TABLE tblfechasnew ADD UNIQUE INDEX(fecha,id_equipo_loc,id_equipo_vis)") or die($mysqli->error());
  }

else{
   /*Fixture con equipos repetidos*/

   function schedulerRepetido($teams){
    // Check for even number or add a bye
    if (count($teams)%2 != 0){
      array_push($teams, 0);
    }
    // Splitting the teams array into two arrays
    $away = array_splice($teams,(count($teams)/2));
    $home = $teams;
    $cantidadFechas = $_POST['cantidadFechas'];

      for ($i=0; $i < $cantidadFechas; $i++){
        $j = 0;
          while ($j<count($home)){
            $round[$i][$j]["Home"]=$home[$j];
            $round[$i][$j]["Away"]=$away[$j];
            $j++;
          }

        // Check if total numbers of teams is > 2 otherwise shifting the arrays is not neccesary
        if(count($home)+count($away)-1 > 2){
          $array_splice = array_splice($home,1,1);
          array_unshift($away,array_shift($array_splice));
          array_push($home,array_pop($away));
        }
      }

    return $round;
  }
  
  $all_games = array();
  $storage = array();
  $schedule = schedulerRepetido($arrayEquipos);
  $querysub = "";
  $mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));

  foreach($schedule AS $round => $games){
      echo "<br>";
      $roundC=$round+1;
     echo "Round: ".($round+1)."<br>";
     foreach($games AS $play){
      $home = $play["Home"];
      $away = $play["Away"];
      echo $home." - ".$away."\n";
      
      $querysub = $querysub."(".$roundC.",".$home.",".$away.",".$campeonato.",".$temporada ."),";
    }
     
  }
    echo "\n";

    $querysub = trim($querysub, ',');
    echo "\n";
    $final = "INSERT INTO tblfechasnew (fecha,id_equipo_loc,id_equipo_vis,id_campeonato,id_temporada) VALUES ". $querysub;
    $mysqli->query($final);
    $mysqli->query("ALTER IGNORE TABLE tblfechasnew ADD UNIQUE INDEX(fecha,id_equipo_loc,id_equipo_vis)") or die($mysqli->error());

  }
   
header("location:../configFixture.php");

$final2= "ALTER IGNORE TABLE tblfechasnew DROP INDEX fecha";
$final3= "ALTER IGNORE TABLE tblfechasnew DROP INDEX fecha_2";

$mysqli->query($final2);
$mysqli->query($final3);

?>