<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");

  $sql = "SELECT * FROM tbl_temarios2";
  $query = mysqli_query($db_conx, $sql);
  	while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$course_id = $row["curso_id"];
		$gram = $row["grammar"];
		$voc = $row["vocabulary"];
  //$gram_list .=  $gram;
  $voc_list .= $voc;
   
	}
 
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<table>
<th>Modulo</th>
<th>Unidad</th>
<th>Gramatica</th>
<th>Vocabulario</th>
<tbody>
 <tr>
 	<td></td>
 	<td></td>
 	<td><?php echo $gram_list  ?></td>
 	<td><?php echo $voc_list  ?></td>
 </tr>
</tbody>
</table>
</body>
</html>
