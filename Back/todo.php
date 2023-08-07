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
  <title>CDN - Tareas</title>
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
  <!-- Navigation-->
  <?php include('nav.php'); ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="todo.php">Tareas</a>
        </li>
      </ol>
      <div class="row">
        <div class="col-12">
          <div class="container">
            <div class="table-wrapper">
              <?php
              $mysqli = new mysqli('localhost', 'root', '', 'cdn') or die(mysqli_error($mysqli));
              $result = $mysqli->query("SELECT * FROM todo") or die($mysqli->error);
              //pre_r($result->fetch_assoc());
              ?>
              <table class="table table-striped table-hover" id="todo-all">
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <button id="button-addon7" type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                  </div>
                  <input type="search" id="todo" placeholder="¿Qué estas buscando?" aria-describedby="button-addon7" class="form-control">
                  <span><a href="#addTodoModal" class="btn btn-success" data-toggle="modal">Crear Nueva Tarea</a></span>
                </div>
                <thead>
                  <tr>
                    <th>Tarea</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="todo-table">
                  <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                      <td><?php echo $row['tarea']; ?></td>
                      <td>
                        <a href="#edit_<?php echo $row['id']; ?>" class="btn btn-info btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                        <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
                      </td>
                      <?php include('modals/edit_delete_modal.php'); ?>
                    </tr>
                  <?php endwhile ?>
                </tbody>
              </table>
              <button onclick="exportDataExcelTodo()" class="btn btn-success">Exportar para Excel</button>
              <button onclick="exportDataTodo()" class="btn btn-danger">Exportar para PDF</button>
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
        <!-- Export tables Jquery-->
        <script src="vendor/table-export/libs/FileSaver/FileSaver.min.js"></script>
        <script src="vendor/table-export/libs/js-xlsx/xlsx.core.min.js"></script>
        <script src="vendor/table-export/libs/jsPDF/jspdf.min.js"></script>
        <script src="vendor/table-export/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
        <script src="vendor/table-export/tableExport.min.js"></script>
        <script src="js/sb-admin-export.js"></script>
        <script src="js/sb-admin-check.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script>
          function exportDataTodo() {
            $('#todo-all').tableExport({
              displayTableName: false,
              fileName: 'Tabla Tareas',
              ignoreColumn: [1],
              type: 'pdf',
              jspdf: {
                orientation: 'l',
                format: 'a3',
                margins: {
                  left: 10,
                  right: 10,
                  top: 20,
                  bottom: 20
                },
                autotable: {
                  styles: {
                    fillColor: 'inherit',
                    textColor: 'inherit'
                  },
                  tableWidth: 'auto'
                }
              }
            });
          }
          // Excel Format

          function exportDataExcelTodo() {
            $("#todo-all").tableExport({
              displayTableName: true,
              fileName: 'Tabla Tareas',
              ignoreColumn: [1],
            });
          }

          $("#todo-all").dataTable({
            pageLength: 10,
            bLengthChange: false,
            bFilter: false, 
            bInfo : false,
            language: {
              "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            }
          });

          //bootstrap table search arbitro
          $(document).ready(function() {
            $("#todo").on("keyup", function() {
              var value = $(this)
                .val()
                .toLowerCase();
              $("#todo-table tr").filter(function() {
                $(this).toggle(
                  $(this)
                  .text()
                  .toLowerCase()
                  .indexOf(value) > -1
                );
              });
            });
          });
        </script>
        <!-- Save Modal HTML -->
        <div id="addTodoModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="controller\todo\save.php" method="post">
                <div class="modal-header">
                  <h4 class="modal-title">Agregar Tarea</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Nueva Tarea</label>
                    <input type="text" class="form-control" name="todo" required="">
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
</body>

</html>