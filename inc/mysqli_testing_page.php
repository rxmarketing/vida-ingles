<?php 
    //$lessonid = 10;
    if(isset($_GET["lid"])) {
        $lessonid = preg_replace('#[^0-9]#', '', $_GET['lid']);
    } else {
        echo "lid not set.";
        exit;
    }
    //    $domain = null;
    //    include_once("db_vidainglescore_conn.php");
    //    $ejercicioFriendNam = "";
    //    $lesson_coursename = "";
    //    //Fetch the lesson from DB table
    //	$consulta = "SELECT * FROM lecciones WHERE lessoid='$lessonid' AND ispublished='1' LIMIT 1";
    //	if(!$sql = $db_conx->prepare($consulta)) {
    //        echo "Lo siento, este sitio esta experimentando problemas, intentalo mas tarde.<br />";
    //        echo "Fallo la preparacion: (" . $db_conx->errno . ") " . $db_conx->error;
    //        exit;
    //    }
    //    $sql->execute();
    //    $result = $sql->get_result();
    //	while ($row = $result->fetch_assoc()) {
    //		$lesson_id = $row["lessonid"];
    //		$lesson_level = $row["lessonlevel"];
    //		$lesson_courseid = $row["lesson_courseid"];
    //		$lesson_cef = $row["lessoncef"];
    //		$lesson_author = $row["lessonauthor"];
    //		$lesson_title = $row["lessontitle"];
    //		$lesson_page_title = strip_tags($lesson_title);
    //		$lesson_content = "Gramatica: ". $row["lessoncontent"];
    //		//$lesson_content = convertHashtags($lesson_content);
    //		$lessonexcerpt = strip_tags(substr($lesson_content, 0, 230). '...');
    //		$lesson_image_name = $row['lesson_image'];
    //		$lesson_image_canonical = $domain.'/i/'.$lesson_image_name;
    //		$lesson_image = '<img class="img-circle content-image" src="'.$lesson_image_canonical.'" width="150" height="150" title="'.$lesson_page_title.'" alt="'.$lesson_page_title.'"/>';
    //		$test_id = $row["testid"];
    //		$lessonguid = $row["lesson_guid"];
    //		$lessonfriendlyname = $row["lesson_name"];
    //		$lesson_canonical = $domain.$lesson_id.'/'.$lessonfriendlyname;
    //		$date_published = $row["datepublished"];
    //		$date_modified = $row["datemodified"];
    //		// FETCH THE COURSE NAME AND COURSE FRIENDLY NAME FOR THE LESSON FROM CURSOS TABLE
    //		$qry = "SELECT coursename, curso_friendly_name FROM cursos WHERE courseid='$lesson_courseid'";
    //		$res = mysqli_query($db_conx,$qry);
    //		while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)) {
    //			$cursoName = $row['coursename'];
    //			$cursoFriendlyName = $row['curso_friendly_name'];
    //        }
    //		// BUILD THE CURSO LINK
    //		$coursename_link = '<a href="'.$domain.'/cursos/'.$lesson_courseid.'/'.$cursoFriendlyName.'" title="Curso: '.$cursoName.'">Curso: '.$cursoName.'</a>';
    //		//Fetch ejercicio friendly name FROM EJERCICIOS TABLE AND ASSIGN IT TO $ejercicioFriendNam VARIABLE
    //		$qry = "SELECT ejer_friendly_name FROM ejercicios WHERE ejer_id='$test_id' LIMIT 1";
    //		$ejerFriendName = mysqli_query($db_conx,$qry);
    //		while ( $row = mysqli_fetch_array($ejerFriendName,MYSQLI_ASSOC)) {
    //			$ejercicioFriendNam = $row['ejer_friendly_name'];
    //        }
    //    }
    //    
    //    echo $lesson_content;
    
    
    include_once("db_vidainglescore_conn.php");
    
    
//    printf("Conjunto de caracteres actual: %s\n", $db_conx->character_set_name());
    
    
    function el_titulo($db_conx, $lessonid){
        $consulta = "select lessontitle FROM lecciones WHERE lessonid=? LIMIT 1";
        if(!$sql = $db_conx->prepare($consulta)){
            echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
            echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
            exit;
        }
        $sql->bind_param("d",$lessonid);
        $sql->execute();
        $resultado = $sql->get_result();
        if($db_conx->affected_rows == 0) {
            echo "No existe el id " . $lessonid;
        }
        $titulo = $resultado->fetch_array();
        $elTitulo = $titulo[0];
        return $elTitulo;
    }
    
    function titulos_lecciones($db_conx){
        $titulos = null;
        $consulta = "select lessonid, lessontitle FROM lecciones";
        if(!$sql = $db_conx->prepare($consulta)){
            echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde";
            echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
            exit;
        }
        $sql->execute();
        $resultado = $sql->get_result();
        while ($titulo = $resultado->fetch_assoc()) {
            $id = $titulo['lessonid'];
            $title = $titulo['lessontitle'];
            $titulos .= '<li><a href="mysqli_testing_page.php?lid='. $id.'"> ' . $title . '</a></li>';    
        }
        return $titulos;
    }
    
    function el_contenido($db_conx,$lessonid) {
        $consulta = "SELECT * FROM lecciones WHERE lessonid=? AND ispublished='1' LIMIT 1";
        if(!$sql = $db_conx->prepare($consulta)) {
            echo "Lo siento, este sitio esta experimentando problemas, intentalo mas tarde.<br />";
            echo "Fallo la preparacion: (" . $db_conx->errno . ") " . $db_conx->error;
            exit;
        }
        $sql->bind_param("d",$lessonid);
        $sql->execute();
        $result = $sql->get_result();
        $fila = $result->fetch_assoc();
        $elContenido = $fila["lessoncontent"];
        return $elContenido;
    }
    
    function el_autor($db_conx,$lessonid) {
        $consulta = "SELECT lessonauthor FROM lecciones WHERE lessonid=? LIMIT 1";
        if(!$sql = $db_conx->prepare($consulta)) {
            echo "Lo siento, el sitio esta teniendo problemas, intentalo mas tarde.";
            echo "Fallo la preparacion: (" . $db_conx->errno . ") " . $db_conx->error;
            exit;
        }
        $sql->bind_param("i",$lessonid);
        $sql->execute();
        $resultado = $sql->get_result();
        if($db_conx->affected_rows == 0){
            echo "";
        }
        $autor = $resultado->fetch_array();
        $Autor = $autor[0];
        if ($Autor == null) {
            $elAutor = "<i>sin autor</i>";
        } else {
            $elAutor = $Autor;
        }
        return $elAutor;
    }
    
    function fecha_modificada($db_conx,$lessonid) {
        $consulta = "SELECT datemodified FROM lecciones WHERE lessonid = ? LIMIT 1";
        if (!$sql = $db_conx->prepare($consulta)) {
           echo "Lo siento, el sitio esta teniendo problemas, intentalo mas tarde.";
            echo "Fallo la preparacion: (" . $db_conx->errno . ") " . $db_conx->error;
            exit; 
        }
        $sql->bind_param("d",$lessonid);
        $sql->execute();
        $resultado = $sql->get_result();
        $fila = $resultado->fetch_array();
        $fechaModificada = $fila[0];
        return $fechaModificada;
    }
    
     // INSERT exercise
     
               //  $ejId = $_POST["ejerid"];
               //  $ejUsername = $_POST["logusername"];
               //  $ejInput1 = $_POST["inputq1"];
               //  $ejInput2 = $_POST["inputq2"];
               //  $ejInput3 = $_POST["inputq3"];
               //  $ejInput4 = $_POST["inputq4"];
               //  $ejInput5 = $_POST["inputq5"];
               //  $ejInput6 = $_POST["inputq6"];
               //  $ejInput7 = $_POST["inputq7"];
               //  $ejInput8 = $_POST["inputq8"];
               //  $ejInput9 = $_POST["inputq9"];
               //  $ejInput10 = $_POST["inputq10"];
               //  $ejIp = getenv('REMOTE_ADDR');
                 
     
     
    $consulta = "INSERT INTO resultados_ejercicios (
                 ejer_id
                 ,userid
                 ,user_answer1
                 ,user_answer2
                 ,user_answer3
                 ,user_answer4
                 ,user_answer5
                 ,user_answer6
                 ,user_answer7
                 ,user_answer8
                 ,user_answer9
                 ,user_answer10
                 ,ip
                 ,datetaken
                 ) 
                    
                 VALUES (
                    200
                    ,'1'
                    ,'lkj'
                    ,'sda'
                    ,'ri'
                    ,'sdsdsdfs'
                    ,'sdsdsdfs'
                    ,'sdsdsdfs'
                    ,'sdsdsdfs'
                    ,'sdsdsdfs'
                    ,'sdsdsdfs'
                    ,'sdsdsdfs'
                    ,222
                    ,now()
                 )";
                 if(!$sql = $db_conx->prepare($consulta)) {
                    echo "Lo siento, el sitio esta teniendo problemas, intentalo mas tarde.";
                    echo "Fallo la preparacion: (" . $db_conx->errno . ") " . $db_conx->error;
                    exit; 
                 }
                 $sql->execute();
                 echo "Filas affectadas: " . $db_conx->affected_rows . "<br />";
                 echo $db_conx->insert_id;
    
    
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>PHP: mysqli function testing page</title>
        <link rel="stylesheet" href="styles.css" media="screen" />
    </head>
    <body>
        <ul>
            <?php echo titulos_lecciones($db_conx); ?>
        </ul>
        <h1><?php echo el_titulo($db_conx,$lessonid)?></h1>
        <small>Por: <?php echo el_autor($db_conx,$lessonid) . " | Actualizado: " . fecha_modificada($db_conx,$lessonid); ?></small>
        <p><?php echo el_contenido($db_conx,$lessonid)?></p>
    </body>
</html>