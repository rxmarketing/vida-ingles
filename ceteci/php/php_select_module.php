<?php
	include('../inc/db_ceteci_conn.php');
    //Ajax code executes select asentamientos options
    $grpID = $_POST['id'];
    $stmt = mysqli_query($db_conx, "SELECT modulos.mod_grupo_id, module_names.mod_subcat_id, module_names.mod_subcat_name 
	FROM module_names 
	INNER JOIN modulos ON modulos.mod_nombre_id = module_names.mod_subcat_id
	WHERE modulos.mod_grupo_id = '$grpID'
	ORDER BY mod_subcat_name");
    if(mysqli_num_rows($stmt)>0) {
        echo '<option value="" selected="selected" disabled="disabled">-- Choose a module name -----</option>';
        while($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {
            $modSubCatId = $row['mod_subcat_id'];
            $modSubCatName = $row['mod_subcat_name'];
            echo '<option value="'.$modSubCatId.'">'.$modSubCatName. '</option>';
		} 
        } else {
		echo "No data.";
        
	}
?>