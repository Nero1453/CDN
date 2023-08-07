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

if(isset($_REQUEST["opcion"]))
{
   $opciones = '';
   $conexion = new mysqli("localhost","root", "", "cdn");
   $sqlCIU = "SELECT transjugadores_equipo.Id_jugador as id, tbljugadores.nombre as nombre, tbljugadores.apellido as apellido
   FROM transjugadores_equipo
    INNER JOIN tbljugadores
     ON (tbljugadores.id = transjugadores_equipo.Id_jugador)
      WHERE Id_equipo = '" . $_REQUEST['opcion'] . "'";
   $resCIU = $conexion->query($sqlCIU);
   while( $fila = $resCIU->fetch_array() )
   {
      $opciones.='<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
   }

   // Liberar resultados
   mysqli_free_result($resCIU);

   // Cerrar la conexión
   mysqli_close($conexion);

   echo $opciones;
}
?>
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
   <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js">
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
                <li class="breadcrumb-item active">Goleadores</li>
            </ol>
            <div class="row">
                <div class="col-2">
                        <a href="#addGoleador" style="float: right;margin-bottom: 20px;" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span>Añadir goleador</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="table-wrapper">
                            <?php
                           $result = $mysqli->query("SELECT b.Id, b.Id_jugador ,b.Id_equipo ,c.nombre AS Nombre, c.apellido AS Apellido, d.nombre AS Equipo,
                           a.Goles AS Goles, a.Id AS Idgoleador
                           FROM
                               tblgoleadores a
                                   INNER JOIN
                               transjugadores_equipo b
                                   ON a.Id_jugador = b.Id
                                   INNER JOIN
                               tbljugadores c
                                   ON b.Id_jugador = c.Id
                                   INNER JOIN 
                               tblequipos d
                                   ON b.Id_equipo = d.Id") or die($mysqli->error);
                           ?>
                            <table class="table table-striped table-hover" id="goleadores">
                                <thead>
                                    <tr>
                                        <th>Pos.</th>
                                        <th>Jugador</th>
                                        <th>Equipo</th>
                                        <th>Goles</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $result->fetch_assoc()) : 
                                    ?>
                                     <tr>
                                        <td></td>
                                        <td><?php echo $row['Apellido'].', '. $row['Nombre'] ?></td>
                                        <td><?php echo $row['Equipo']; ?></td>
                                        <td><?php echo $row['Goles']; ?></td>
                                        <td>
                                            <a href="#edit_<?php Echo $row['Idgoleador']; ?>" class="btn btn-info btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                                            <a href="#delete_<?php echo $row['Idgoleador']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
                                        </td>
                                        <?php include('modals/edit_delete_modal_goleadores.php'); ?>
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
       <div id="addGoleador" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="controller\goleadores\save.php" method="post">
                <div class="modal-header">
                  <h4 class="modal-title">Agregar goleador</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                   <div class="row">
                    <label class="col-md-3">Equipo:</label>
                      <?php $resultDiv = $mysqli->query("SELECT id,nombre FROM tblequipos ORDER BY nombre asc"); ?>
                         <select onchange='resetTable()' class="custom-select custom-select-lg mb-3 col-md-8" name="dropdownEquipos" id="dropdownEquipos">
                            <option selected>Elige equipo</option>   
                             <?php while ($row1 = $resultDiv->fetch_assoc()) : ?>
                             <option value=<?php echo $row1['id']; ?>><?php echo $row1['nombre']; ?></option>
                            <?php endwhile ?>
                      </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                       <label class="col-md-3">Jugador:</label>
                            <select disabled class="custom-select custom-select-lg mb-3 col-md-8" name="dropdownJugadores" id="dropdownJugadores">
                                <option selected>Elige jugador</option> 
                            </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                         <label class="col-md-3">Goles:</label>
                        <input type="number" class="form-control col-md-8" name="goles" id="goles" required="" placeholder="Ingrese cantidad de goles">
                   </div>
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
    <script type="text/javascript">

    $(document).ready(function(){   
        $('#dropdownEquipos').on('change',function(){
            var equipo = $(this).val();
            $.ajax({
                type:"POST", 
                dataType:'html',
                url : "goleadores.php",
                data : { opcion:equipo },    
                success: function(response){
                    $("#dropdownJugadores").html(response);
                },  
                error: function() {
                    alert('Error occured');
                }
            });
         });

         setTableGoleadores();
     });
    
    function setTableGoleadores(){
     if (!$.fn.DataTable.isDataTable('#goleadores') ) {
            $("#goleadores").dataTable({
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


            var  table = $("#goleadores").DataTable();
            table.on('order.dt search.dt', function () {
                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    });
            }).draw();
        } 
    }

    function resetTable() {
        var table = $('#goleadores').DataTable();    
        table.destroy();
        if($('#goleadores_paginate')){$('#goleadores_paginate').remove();}
        $("#dropdownJugadores").prop( "disabled", false );
    }
       
      
    </script>
 </div>
</body>

</html>


