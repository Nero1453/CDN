<div class="container">
    <div class="table-wrapper">
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'cdn') or die(mysqli_error($mysqli));
        $result = $mysqli->query(
            "SELECT v.id, tblfixture.goles_local AS golL ,tblfixture.goles_visita AS golV, v.Fecha , uv.nombre As Local , up.nombre As Visita, tblfixture.horario, tblcanchas.nombre As cancha 
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
                    <th>vs</th>
                    <th></th>
                    <th>Visitante</th>
                    <th>Horario</th>
                    <th>Cancha</th>
                </tr>
            </thead>
            <tbody id="fixture-table">
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['Fecha']; ?></td>
                        <td><?php echo $row['Local']; ?></td>
                        <td><?php echo $row['golL']; ?></td>
                        <td> - </td>
                        <td><?php echo $row['golV']; ?></td>
                        <td><?php echo $row['Visita']; ?></td>
                        <td><?php echo $row['horario']; ?></td>
                        <td><?php echo $row['cancha']; ?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table <?php
                function pre_r($array)
                {
                    echo '<pre>';
                    print_r($array);
                    echo '</pre>';
                }
                ?> </div> </div> </div>