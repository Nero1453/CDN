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
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <?php include('nav.php'); ?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Estadisticas</a>
                </li>
                <li class="breadcrumb-item active">Sanciones</li>
            </ol>
            <div class="row">
                <div class="col-2">
                        <a href="#addSancion" style="float: right;margin-bottom: 20px;" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span>Añadir sancion</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="table-wrapper">
                            <?php
                            $result = $mysqli->query("SELECT jugador,equipo,descripcion,cantidad FROM tblsanciones WHERE fecha <= CURDATE() AND fecha >= DATE_SUB(CURDATE(), INTERVAL 2 WEEK)") or die($mysqli->error);
                           ?>
                            <table class="table table-striped table-hover" id="sanciones">
                                <thead>
                                    <tr>
                                        <th>Jugador</th>
                                        <th>Equipo</th>
                                        <th>Descripcion</th>
                                        <th>Fecha/s de suspension</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $result->fetch_assoc()) : 
                                    ?>
                                     <tr>
                                        <td><?php echo $row['jugador']; ?></td>
                                        <td><?php echo $row['equipo']; ?></td>
                                        <td><?php echo $row['descripcion']; ?></td>
                                        <td><?php echo $row['cantidad']; ?></td>
                                    </tr>
                                    <?php endwhile 
                                    ?>
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
       <!-- Save Modal HTML -->
       <div id="addSancion" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="controller\sanciones\save.php" method="post">
                <div class="modal-header">
                  <h4 class="modal-title">Agregar sancion</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Jugador:</label>
                    <input type="text" class="form-control" name="jugador" required="">
                  </div>
                  <div class="form-group">
                    <label>Equipo:</label>
                    <input type="text" class="form-control" name="equipo" required="">
                  </div>
                  <div class="form-group">
                    <label>Sancion:</label>
                    <input type="text" class="form-control" name="sancion" required="">
                  </div>
                  <div class="form-group">
                    <label>Fechas de sancion:</label>
                    <input type="number" class="form-control" name="cantidad_fechas" required="" placeholder="Ingrese cantidad de fechas de suspencion...">
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                  <input type="submit" class="btn btn-success" name="save" value="Agregar">
                </div>
              </form>
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
      $("#sanciones").dataTable({
            pageLength: 10,
            bLengthChange: false,
            bFilter: false, 
            bInfo : false,
            language: {
              "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            }
          });

    </script>
    </div>
</body>

</html>