<?php
    $db_conx = new mysqli("localhost","ricardo","tiotony","ceteci");
    $db_conx->set_charset("utf8");
    if($db_conx->connect_errno) {
        echo "Lo sentimos, este sitio esta teniendo problemas, intentelo mas tarde. <br />";
        //echo "ERRNO: " . $db_conx->connect_errno . "<br />";
        //echo "ERROR: " . $db_conx->connect_error;
        exit;
    }
    
    //Ajax code executes select asentamientos options
    $muniid = $_POST['muniid'];
    $asentqry = mysqli_query($db_conx, "SELECT * FROM asentamientos WHERE c_mnpio = '$muniid' ORDER BY asentamiento_nombre");
    if(mysqli_num_rows($asentqry)>0) {
        echo '<option value="" selected="selected" disabled="disabled">-- Choose one from the list -----</option>';
        while($row = mysqli_fetch_array($asentqry, MYSQLI_ASSOC)) {
            $asentcp = $row['asentamiento_cp'];
            echo '<option value="'.$row['asentamiento_id'].'">'.$row['asentamiento_nombre'].' ('.$asentcp.' )</option>';
        } 
        } else {
            echo "No data.";
        
    }
?>