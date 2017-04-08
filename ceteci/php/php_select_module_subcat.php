<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {

    /* Ajax code executes select municipios options
	--------------------------------------------------------------------------------*/
    include_once '../classes/Database.php';

    $getModSubCat = new \dbconn\Database();

    $modcatid = $_POST['id'];

    $getRows = $getModSubCat->getRows("SELECT * FROM modulo_subcategorias WHERE modulo_categoria_id = ?", [$modcatid]);
    echo '<option value="" selected="selected" disabled="disabled">-- Elige uno de la lista -----</option>';
    foreach ($getRows as $row) {
        echo '<option value="' . $row['modulo_subcat_id'] . '">' . $row['modulo_subcat_nombre'] . '</option>';
    }
} else {
    echo 'This page cannot be accessed directly.';
}
