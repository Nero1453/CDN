<?php
$mysqli = new mysqli('localhost', 'root', '', 'cdn_cms') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM about") or die($mysqli->error);
$row = mysqli_fetch_array($result);
?>
<p class="text-sub-text mb-4">Quienes Somos</p>
<p class="text-white-50-2 mb-4"><?php echo $row['todo'] ?></p>
<p class="text-sub-text mb-4">Objetivo</p>
<p class="text-white-50-2 mb-4"><?php echo $row['obj'] ?></p>