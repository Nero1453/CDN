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
    <title>CDN - </title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <?php include('nav.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Blank Page</li>
            </ol>
            <div class="row">
                <div class="col-2">
                    <h4 for="dropdownCampeonato" style="margin-left: 55px;margin-top: 15px">División:</h4>
                </div>
                <div class="col-3">
                    <?php $resultDiv = $mysqli->query("SELECT * FROM tblcampeonatos"); ?>
                    <select class="custom-select custom-select-lg mb-3" name="dropdownCampeonato" id="dropdownCampeonato" style="margin-left: 10px;margin-top: 12px">
                        <?php while ($row1 = $resultDiv->fetch_assoc()) : ?>
                            <option value=<?php echo $row1['Id']; ?>><?php echo $row1['Nombre']; ?></option>
                        <?php endwhile ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="table-wrapper">
                            <?php
                            //$mysqli = new mysqli('localhost', 'root', '', 'cdn') or die(mysqli_error($mysqli));
                            //pre_r($result->fetch_assoc());
                            ?>
                            <table class="table table-striped table-hover" id="posiciones">
                                <thead>
                                    <tr>
                                        <th>Pos</th>
                                        <th>Equipo</th>
                                        <th>GF</th>
                                        <th>GC</th>
                                        <th>Puntos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $mysqli->query("SELECT tblequipos.nombre AS nombre, tblpocisiones.puntos AS puntos,tblpocisiones.golF AS golF,tblpocisiones.golC AS golC FROM tblpocisiones INNER JOIN tblequipos ON (tblpocisiones.id_equipo=tblequipos.id) ORDER BY puntos DESC") or die($mysqli->error);
                                    while ($row = $result->fetch_assoc()) : 
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['golF']; ?></td>
                                         <td><?php echo $row['golC']; ?></td>
                                        <td><?php echo $row['puntos']; ?></td>

                                    </tr>
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
    <script src="js/sb-admin-export.js"></script>
    <script src="js/sb-admin-check.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script>
     $("#posiciones").dataTable({
                    pageLength: 10 ,
                    bLengthChange: false,
                    bFilter: false, 
                    bInfo : false,
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                        },
                    columnDefs: [ {
                    searchable: false,
                    orderable: false,
                    targets: 0
                        } ],
                    order: [[ 3, 'desc' ]]
                 });

    var  table = $("#posiciones").DataTable();
            table.on('order.dt search.dt', function () {
                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    });
            }).draw();        
    </script>
    </div>
</body>

</html>