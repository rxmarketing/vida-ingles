<?php
    $db_conx = new mysqli("localhost","ricardo","tiotony","ceteci");
    $db_conx->set_charset("utf8");
    if($db_conx->connect_errno) {
        echo "Lo sentimos, este sitio esta teniendo problemas, intentelo mas tarde. <br />";
        //echo "ERRNO: " . $db_conx->connect_errno . "<br />";
        //echo "ERROR: " . $db_conx->connect_error;
        exit;
    }
    
    //Ajax code executes select muni options
    $estadoid = $_POST['eid'];
    $muniqry = mysqli_query($db_conx, "SELECT * FROM municipios WHERE estado_id = '$estadoid'");
    if(mysqli_num_rows($muniqry)>0) {
        echo '<option value="" selected="selected" disabled="disabled">-- Choose one from the list -----</option>';
        while($row = mysqli_fetch_array($muniqry, MYSQLI_ASSOC)) {
            echo '<option value="'.$row['muni_id'].'">'.$row['muni_nombre'].'</option>';
        }
    }
?>