<!DOCTYPE html>
<html lang="en">
<?php
require_once 'controller\validacion.php';
if (!isset($_SESSION['rol'])) {
    header("location:../login.php");
} else {
    if ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 2) {
        header("location:../login.php");
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CDN - Fixture</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <?php include('nav.php'); ?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="fixture.php">Fixture</a>
                </li>
                <li class="breadcrumb-item active">Editar Fixture</li>
            </ol>
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'cdn') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT v.id , v.Fecha , uv.nombre As Local , up.nombre As Visita From tblfechasnew As v Inner Join tblequipos As uv On v.id_equipo_loc = uv.id Inner Join tblequipos As up On v.id_equipo_vis = up.id") or die($mysqli->error);
            $result3 = $mysqli->query("SELECT * FROM tblarbitros") or die($mysqli->error);
            // pre_r($result->fetch_assoc());
            ?>
            <div class="row">
                <div class="col-3">
                    <h5 style="margin-left: 9%;margin-top: 2%;">División "" </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="table-wrapper">
                            <table class="table table-striped table-hover" id="calendario">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Fecha</th>
                                        <th>Local</th>
                                        <th>vs</th>
                                        <th>Visitante</th>
                                        <th>Horario</th>
                                        <th>Cancha</th>
                                        <th>Arbitro</th>
                                        <th>Linea 1</th>
                                        <th>Linea 2</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()) : ?>
                                        <form action="controller/configFixtureUp.php" method="post">

                                            <tr>
                                                <td><input type="hidden" name="idfecha" value="<?php echo $row['id']; ?>"></td>
                                                <td><?php echo $row['Fecha']; ?></td>
                                                <td><?php echo $row['Local']; ?></td>
                                                <td> - </td>
                                                <td><?php echo $row['Visita']; ?></td>
                                                <?php
                                                    $id =  $row['id'];
                                                    $resultado5 =  $mysqli->query("SELECT * FROM tblfixture Where id_fecha =$id");
                                                    $num = mysqli_num_rows($resultado5);
                                                    if ($num == 0) { ?>
                                                    <td><input type="datetime-local" name="hora" value="datetime"></td>
                                                    <td>
                                                        <select class="custom-select custom-select-lg mb-3" name="dropdownCancha">
                                                            <?php $result2 = $mysqli->query("SELECT * FROM tblcanchas") or die($mysqli->error);
                                                                    while ($row1 = $result2->fetch_assoc()) : ?>
                                                                <option value="" selected disabled hidden></option>
                                                                <option value="<?php echo $row1['id']; ?>"><?php echo $row1['nombre']; ?></option>
                                                            <?php endwhile ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="custom-select custom-select-lg mb-3" name="dropdownArbitro">
                                                            <?php $result3 = $mysqli->query("SELECT * FROM tblarbitros") or die($mysqli->error);
                                                                    while ($row = $result3->fetch_assoc()) : ?>
                                                                <option value="" selected disabled hidden></option>
                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                                            <?php endwhile ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="custom-select custom-select-lg mb-3" name="dropdownLinea1">
                                                            <?php $result3 = $mysqli->query("SELECT * FROM tblarbitros") or die($mysqli->error);
                                                                    while ($row = $result3->fetch_assoc()) : ?>
                                                                <option value="" selected disabled hidden></option>
                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                                            <?php endwhile ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="custom-select custom-select-lg mb-3" name="dropdownLinea2">
                                                            <?php $result3 = $mysqli->query("SELECT * FROM tblarbitros") or die($mysqli->error);
                                                                    while ($row = $result3->fetch_assoc()) : ?>
                                                                <option value="" selected disabled hidden></option>
                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                                            <?php endwhile ?>
                                                        </select>
                                                    </td>
                                                    <td><input type="submit" name="save-fixture" class="btn btn-success btn-hover" onclick="refresh()" value="Guardar"></td>
                                            </tr>
                                            <?php } else {
                                                    while ($row4 = $resultado5->fetch_assoc()) :
                                                        $fecha = $row4['horario'];

                                                        $nueva_fecha = date("d-m-Y H:m:s", strtotime($fecha));  ?>
                                                <td><input type="" name="hora" value="<?php echo $nueva_fecha  ?>"></td>
                                                <td>
                                                    <select class="custom-select custom-select-lg mb-3" name="dropdownCancha">
                                                        <?php $result2 = $mysqli->query("SELECT * FROM tblcanchas") or die($mysqli->error);
                                                                    while ($row1 = $result2->fetch_assoc()) : ?>
                                                            <option value="<?php echo $row1['id'] ?>" <?= $row1['id'] == $row4['id_cancha'] ? 'selected="selected"' : ''; ?>><?php echo $row1['nombre']; ?></option>

                                                        <?php endwhile; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="custom-select custom-select-lg mb-3" name="dropdownArbitro">
                                                        <?php $result3 = $mysqli->query("SELECT * FROM tblarbitros") or die($mysqli->error);
                                                                    while ($row = $result3->fetch_assoc()) : ?>
                                                            <option value="<?php echo $row['id'] ?>" <?= $row['id'] == $row4['id_arbitro'] ? 'selected="selected"' : ''; ?>><?php echo $row['nombre']; ?></option>
                                                        <?php endwhile ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="custom-select custom-select-lg mb-3" name="dropdownLinea1">
                                                        <?php $result3 = $mysqli->query("SELECT * FROM tblarbitros") or die($mysqli->error);
                                                                    while ($row = $result3->fetch_assoc()) : ?>
                                                            <option value="<?php echo $row['id'] ?>" <?= $row['id'] == $row4['id_arbitro_linea1'] ? 'selected="selected"' : ''; ?>><?php echo $row['nombre']; ?></option>
                                                        <?php endwhile ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="custom-select custom-select-lg mb-3" name="dropdownLinea2">
                                                        <?php $result3 = $mysqli->query("SELECT * FROM tblarbitros") or die($mysqli->error);
                                                                    while ($row = $result3->fetch_assoc()) : ?>
                                                            <option value="<?php echo $row['id'] ?>" <?= $row['id'] == $row4['id_arbitro_linea2'] ? 'selected="selected"' : ''; ?>><?php echo $row['nombre']; ?></option>
                                                        <?php endwhile ?>
                                                    </select>
                                                </td>
                                                <td><input type="submit" name="edit-fixture" class="btn btn-info btn-hover" onclick="refresh()" value="Editar"></td>
                                        <?php endwhile;
                                            } ?>
                                        </form>
                                    <?php endwhile ?>
                                </tbody>
                            </table>
                            <?php
                            function pre_r($array)
                            {
                                echo '<pre>';
                                print_r($array);
                                echo '</pre>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid-->
                <!-- /.content-wrapper-->
                <footer class="sticky-footer">
                    <div class="container">
                        <div class="text-center">
                            <small>Copyright © CDN 2019</small>
                        </div>
                    </div>
                </footer>
                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fa fa-angle-up"></i>
                </a>
                <!-- Logout Modal-->
                <!-- Logout Modal-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de cerrar sesión?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Seleccion "Cerrar Sesión" para cerrar la sesión actual."</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                <a class="btn btn-primary" href="controller\logout.php">Cerrar Sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin.min.js"></script>
                <!-- <script>
                    function refresh(){
                        window.location.reload();
                    }
                </script> -->
            </div>

</body>

</html>