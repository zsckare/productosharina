<?php
	include("php/conexion.php");

  $link3=Conectarse();
  $consulta=mysql_query("SELECT * FROM movimientos WHERE id_ruta ='$id_ruta' AND fecha='$fecha' ",$link3);
  echo '<table>
              <thead>
                <tr>
                    <th data-field="id">id Producto</th>
                    <th data-field="name">Cantidad</th>
                    
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody>';
        while ($row = mysql_fetch_row($consulta)){
          echo '<tr>
            <td>'.$row[1].'</td>
            <td>'.$row[3].'</td>
            <td><a onClick="eliminar('.$row[0].')">X</a></td>
          </tr>';
        }
        echo '</tbody>
      </table>';
?>