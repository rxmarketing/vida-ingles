<?php
	include('../inc/db_ceteci_conn.php');
    //Ajax code executes select asentamientos options
    $modcatid = $_POST['id'];
    $stmt = mysqli_query($db_conx, "SELECT * FROM module_names WHERE mod_cat_id = '$modcatid' ORDER BY mod_subcat_name");
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