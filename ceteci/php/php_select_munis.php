<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    /* Ajax code executes select municipios options
	--------------------------------------------------------------------------------*/
    include_once '../classes/Database.php';

    $getMunis = new \dbconn\Database();

    $estadoid = $_POST['eid'];

    $getRows = $getMunis->getRows("SELECT * FROM munis WHERE estado_id = ?", [$estadoid]);
    echo '<option value="" selected="selected" disabled="disabled">-- Elige uno de la lista -----</option>';
    foreach ($getRows as $row) {
        echo '<option value="' . $row['muni_id'] . '">' . $row['muni_nombre'] . '</option>';
    }
} else {
    echo 'This page cannot be accessed directly.';
}
