<?php
	include('../inc/db_ceteci_conn.php');
    //Ajax code executes select asentamientos options
    $modSubcatId = $_POST['id'];
    $stmt = mysqli_query($db_conx, "SELECT * FROM module_name_units WHERE mod_subcat_id = '$modSubcatId' ORDER BY unidad_id");
    if(mysqli_num_rows($stmt)>0) {
        echo '<option value="" selected="selected" disabled="disabled">-- Choose a module name -----</option>';
        while($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {
            $unitId = $row['unidad_id'];
            $unitName = $row['unidad_nombre'];
            echo '<option value="'.$unitId.'">'.$unitName. '</option>';
		} 
	} 
	else {
		echo "No data.";
	}
?>