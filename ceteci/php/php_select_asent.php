<?php

/* Ajax code executes select asentamientos options
	--------------------------------------------------------------------------------*/
include_once '../classes/Database.php';
$getAsent = new \dbconn\Database();
$muniid = $_POST['muniid'];
$getRows = $getAsent->getRows("SELECT * FROM asent WHERE muni_id = ?", [$muniid]);
foreach ($getRows as $row) {
    echo '<option value="' . $row['asent_id'] . '">' . $row['asentamiento_nombre'] . ' (' . $row['asentamiento_cp'] . ')</option>';
}
