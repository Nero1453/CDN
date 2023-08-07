<?php
$mysqli = new mysqli('localhost', 'root', '', 'cdn_cms') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM servicios") or die($mysqli->error);
$row = mysqli_fetch_array($result);
?>
<div class="row">
    <div class="col-lg-3 col-md-6 text-center">
        <div class="mt-5">
            <img src="img/service/1.png" alt="field" class="mb-4">
            <h3 class="h4 mb-2">7 Canchas</h3>
            <p class="text-muted mb-0"><?php echo $row['service_one'] ?></p>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 text-center">
        <div class="mt-5">
            <img src="img/service/4.png" alt="circuit" class="mb-4">
            <h3 class="h4 mb-2">Cómodos Circuitos</h3>
            <p class="text-muted mb-0"><?php echo $row['service_two'] ?></p>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 text-center">
        <div class="mt-5">
            <img src="img/service/3.png" alt="grill" class="mb-4">
            <h3 class="h4 mb-2">Cerramiento Perimetral</h3>
            <p class="text-muted mb-0"><?php echo $row['service_three'] ?></p>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 text-center">
        <div class="mt-5">
            <img src="img/service/2.png" alt="referee" class="mb-4">
            <h3 class="h4 mb-2">Árbitros de la Liga Salteña</h3>
            <p class="text-muted mb-0"><?php echo $row['service_four'] ?></p>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <p class="text-white-50-2 mb-4 text-service"><?php echo $row['todo'] ?></p>
</div>