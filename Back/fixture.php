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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
        <li class="breadcrumb-item active">Crear Fixture</li>
      </ol>
      <div class="row">
        <div class="container">
          <div class="table-wrapper">
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'cdn') or die(mysqli_error($mysqli));
            //pre_r($result->fetch_assoc());
            ?>
            <table class="table table-striped table-hover" id="display">
              <thead>
                <tr>
                  <th>
                    <span class="custom-checkbox">
                      <input type="checkbox" id="selectAll">
                      <label for="selectAll"></label>
                    </span>
                    Seleccionar Todo
                  </th>
                  <th>Nombre</th>
                  <th>División</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = $mysqli->query("SELECT  tblequipos.id AS id, tblequipos.nombre AS nombre, tblcampeonatos.Nombre AS campeonato FROM tblequipos INNER JOIN tblcampeonatos ON (tblequipos.id_campeonato=tblcampeonatos.Id)") or die($mysqli->error);
                while ($row = $result->fetch_assoc()) : ?>
                  <tr>
                    <td>
                      <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox1" name="options[]" value="<?php echo $row['id']; ?>">
                        <label for=" checkbox1"></label>
                      </span>
                    </td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['campeonato']; ?></td>
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
        <form id="myForm" style="width: 99%" action="controller\generadorFixture.php" method="post">
          <div class="row">
            <div class="form-inline col-3">
              <label for="dropdownCampeonato" style="margin-left: 55px">División</label>
                <?php $resultDiv = $mysqli->query("SELECT * FROM tblcampeonatos"); ?>
                <select class="custom-select custom-select-lg mb-3" name="dropdownCampeonato" id="dropdownCampeonato" style="margin-left: 10px;margin-top: 12px">
                  <?php while ($row1 = $resultDiv->fetch_assoc()) : ?>
                    <option value=<?php echo $row1['Id']; ?>><?php echo $row1['Nombre']; ?></option>
                  <?php endwhile ?>
                </select>
            </div>
            <div class="col-1">
              <label for="male" style="margin-top: 19px">Fechas</label>
            </div>
            <div class="col-2">
              <input type="numeric" name="cantidadFechas" style="margin-top: 15px"><br>
            </div>
            <div class="form-inline col-3">
              <label style="margin-left: 45px">Temporada</label>
                <?php $resultTem = $mysqli->query("SELECT * FROM tbltemporada_campeonatos"); ?>
                <select class="custom-select custom-select-lg mb-3" name="dropdownTemporada" style="margin-left: 10px;margin-top: 12px">
                  <?php while ($row = $resultTem->fetch_assoc()) : ?>
                    <option value=<?php echo $row['Id']; ?>><?php echo $row['Nombre']; ?></option>
                  <?php endwhile ?>
                </select>
            </div>
            <div class="col-2">
              <input type="hidden" id="str" name="str" value="" />
              <input type="submit" style="margin-left: 3px;margin-top: 11px" onclick='generarFixture();' class="btn btn-primary" id="btn" name="submit" value="Generar fixture" />
            </div>
          </div>
        </form>
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
      <!-- Check All Script -->
      <script src="js/sb-admin-check.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
      <script src="vendor/datatables/jquery.dataTables.js"></script>
      <script src="js/sb-admin-datatables.js"></script>

    </div>
</body>

</html>