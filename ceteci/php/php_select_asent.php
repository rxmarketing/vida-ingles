<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {

    /* Ajax code executes select asentamientos options
	--------------------------------------------------------------------------------*/
    include_once '../classes/Database.php';

    $getAsent = new \dbconn\Database();

    $muniid = $_POST['muniid'];

    $getRows = $getAsent->getRows("SELECT * FROM asent WHERE muni_id = ?", [$muniid]);
    echo '<option value="" selected="selected" disabled="disabled">-- Elige uno de la lista -----</option>';
    foreach ($getRows as $row) {
        echo '<option value="' . $row['asent_id'] . '">' . $row['asentamiento_nombre'] . ' (' . $row['asentamiento_cp'] . ')</option>';
    }
} else {
    echo 'This page cannot be accessed directly!';
}
