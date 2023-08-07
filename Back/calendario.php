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
    <title>CDN - Calendario</title>
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
                    <a href="calendario.php">Calendario</a>
                </li>
            </ol>
            <div class="row">
                <div class="col-3">
                    <h5 style="margin-left: 9%;margin-top: 2%;">Seleccione una division: </h5>
                </div>
                <div class="col-3">
                    <div class="nav-item">
                        <select class="custom-select custom-select-lg mb-3" name="dropdownDivision">
                            <option value=1>"A"</option>
                            <option value=2>"B"</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="col-3">
                    <h5 style="margin-left: 9%;margin-top: 2%;">Seleccione una fecha: </h5>
                </div>
                <div class="col-3">
                    <div class="nav-item">
                        <select class="custom-select custom-select-lg mb-3" name="dropdownFechas">
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                            <option value=6>6</option>
                            <option value=7>7</option>
                            <option value=8>8</option>
                            <option value=9>9</option>
                            <option value=10>10</option>
                            <option value=11>11</option>
                            <option value=12>12</option>
                            <option value=13>13</option>
                            <option value=14>14</option>
                            <option value=15>15</option>
                            <option value=16>16</option>
                            <option value=17>17</option>
                            <option value=18>18</option>
                        </select>
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="table-wrapper">
                            <?php
                            $mysqli = new mysqli('localhost', 'root', '', 'cdn') or die(mysqli_error($mysqli));
                            $result = $mysqli->query(
                            " SELECT tblfixture.id AS idFixture, v.id , v.Fecha , uv.nombre As Local , up.nombre As Visita, tblfixture.horario,v.id_equipo_loc AS idLocal,
                            v.id_equipo_vis AS idVisita,   

                            CASE
                                WHEN ISNULL(tblfixture.goles_local) THEN ''  
                                ELSE tblfixture.goles_local
                            END AS GL,
                            
                             CASE
                                WHEN ISNULL(tblfixture.goles_visita) THEN ''    
                                ELSE tblfixture.goles_visita
                            END AS GV,
                            
                             tblcanchas.nombre As cancha 
                            From tblfechasnew As v 
                            Inner Join tblequipos As uv
                             On v.id_equipo_loc = uv.id 
                            
                            Inner Join tblequipos As up 
                            On v.id_equipo_vis = up.id 
                            
                            Inner Join tblfixture
                             ON tblfixture.id_fecha = v.id
                             
                             Inner Join tblcanchas
                             ON tblcanchas.id = tblfixture.id_cancha 
                             
                             ORDER BY v.Fecha ASC"
                            ) or die($mysqli->error);
                            // pre_r($result->fetch_assoc());
                            ?>
                            <table class="table table-striped table-hover" id="calendario">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Local</th>
                                        <th></th>
                                        <th style="text-align:center">vs</th>
                                        <th></th>
                                        <th>Visitante</th>
                                        <th>Horario</th>
                                        <th>Cancha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="fixture-table">
                                    <?php while ($row = $result->fetch_assoc()) : ?>
                                        <tr>
                                            <td style="text-align:center"><?php echo $row['Fecha']; ?></td>
                                            <td><?php echo $row['Local']; ?></td>
                                            <td><?php echo $row['GL']; ?></td>
                                            <td style="text-align:center;font-weight: 600;"> <?php if($row['GL'] == ""){ echo "Por jugar";} else echo "-";  ?> </td>
                                            <td><?php echo $row['GV']; ?></td>
                                            <td><?php echo $row['Visita']; ?></td>
                                            <td><?php echo $row['horario']; ?></td>
                                            <td><?php echo $row['cancha']; ?></td>
                                            <td><a href="#edit_<?php echo $row['idFixture']; ?>" class="btn btn-info btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar</a></td>
                                            <?php include('modals\edit_modal_calendario.php'); ?>
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
                        $('#calendario').tableExport({
                            displayTableName: false,
                            fileName: 'Tabla Calendario',
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
                        $("table").tableExport({
                            displayTableName: true,
                            fileName: 'Tabla calendario',
                        });
                    }
                      
                    $('#calendario').dataTable({
                        pageLength: 10,
                        bLengthChange: false,
                        bInfo: false,
                        bFilter: false, 
                        language: {
                            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                        },
                        ordering: false
                    });
                </script>
            </div>
</body>

</html>