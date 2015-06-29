<?php

  $id_dcto=$_POST['id_dcto'];

  $consulta=mysql_query("SELECT * FROM movimientos WHERE id_dcto='$id_dcto' AND tipo=1 ");
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
            <td>'.$row[4].'</td>
            <td><a class="eliminar" onClick="eliminar('.$row[0].')">X</a></td>
          </tr>';
        }
        echo '</tbody>
      </table>';
?>