<?php
include_once("../inc/db_vidainglescore_conn.php");
$eid = $_GET['id'];
$result = mysqli_query($db_conx, "SELECT * FROM ejercicios_answerkeys_app WHERE id=$eid");          //query
$array = mysqli_fetch_row($result);
echo json_encode($array);
?>