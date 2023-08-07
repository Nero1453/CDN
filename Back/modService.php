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
  <title>CDN - Mofificar Pagina </title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include('nav.php');
  $mysqli = new mysqli('localhost', 'root', '', 'cdn_cms') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM servicios") or die($mysqli->error);
  $row = mysqli_fetch_array($result);
  $longitud = strlen($row['service_one']);
  $longitud2 = strlen($row['service_two']);
  $longitud3 = strlen($row['service_three']);
  $longitud4 = strlen($row['service_four']);

  $longitudTodo = strlen($row['todo']);
  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Modificar Sitio Web</a>
        </li>
        <li class="breadcrumb-item active">Servicios</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h3>Editar texto de la pagina "Quienes Somos"</h3>
          <form action="controller/cms/editService.php" method="post">
            <div class="row">
              <div class="col">
                <label>Cancha</label>
                <input type="text" class="form-control" id="cancha" name="cancha" size="<?php echo $longitud; ?>" value="<?php echo $row['service_one']; ?>">
              </div>
              <div class="col">
                <label>Cómodos Circuitos</label>
                <input type="text" class="form-control" id="circuito" name="circuito" size="<?php echo $longitud2; ?>" value="<?php echo $row['service_two']; ?>">
              </div>
              <div class="col">
                <label>Cerramiento Perimetral</label>
                <input type="text" class="form-control" id="cerrado" name="cerrado" size="<?php echo $longitud3; ?>" value="<?php echo $row['service_three']; ?>">
              </div>
              <div class="col">
                <label>Arbitros</label>
                <input type="text" class="form-control" id="arbitros" name="arbitros" size="<?php echo $longitud4; ?>" value="<?php echo $row['service_four']; ?>">
              </div>
            </div>
            <label>Todo</label>
            <input type="text" class="form-control" id="todo" name="todo" size="<?php echo $longitudTodo; ?>" value="<?php echo $row['todo']; ?>">
            <br>
            <button type="submit" name="edit" class="btn btn-info"><span class="glyphicon glyphicon-check"></span> Actualizar</a></button>
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
  </div>
</body>

</html>