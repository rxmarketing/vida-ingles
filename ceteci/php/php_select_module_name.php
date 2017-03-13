<?php
	include('../inc/db_ceteci_conn.php');
    //Ajax code executes select  options
    $modcatid = $_POST['id'];
    $stmt = mysqli_query($db_conx, "SELECT * FROM modulo_subcategorias WHERE modulo_categoria_id = '$modcatid' ORDER BY modulo_subcat_nombre");
    if(mysqli_num_rows($stmt)>0) {
        echo '<option value="" selected="selected" disabled="disabled">-- Choose a module name -----</option>';
        while($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {
            $modSubCatId = $row['modulo_subcat_id'];
            $modSubCatName = $row['modulo_subcat_nombre'];
            echo '<option value="'.$modSubCatId.'">'.$modSubCatName. '</option>';
        } 
        } else {
            echo "No data.";
        
    }
?>