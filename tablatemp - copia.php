<?php 
$id_dcto=$_POST['id_dcto'];
	$link3=Conectarse();
	$consulta=mysql_query("SELECT * FROM movimientos WHERE id_dcto ='$id_dcto' ",$link3);
	echo '<table>
              <thead>
                <tr>
                    <th data-field="id">id Prodcuto</th>
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

          </tr>';
        }
        echo '</tbody>
      </table>';
 ?>