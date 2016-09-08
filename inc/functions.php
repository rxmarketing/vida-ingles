<?php
	$domain = 'http://'.$_SERVER['HTTP_HOST'].'/vidaingles';//outputs http://
	function canonical() {
		$url  = 'http://';
		$url .= $_SERVER['HTTP_HOST'];
		$url .= $_SERVER['REQUEST_URI'];
		echo $url;
    }
	function home() {
		$domain = 'http://';
		$domain .= $_SERVER['HTTP_HOST'];
		$domain .= '/vidaingles';
		echo $domain;
    }
	function convertHashtags($str){
		$regex = "/#+([a-zA-Z0-9_]+)/";
		$str = preg_replace($regex, '<a href="hashtag.php?tag=$1">$0</a>',$str);
		return($str);
    }
	function course_list() {
		$lista_cursos = "";
		$sql = "SELECT cursos.courseid, cursos.coursename AS Curso, cursos.coursedesc AS Descripcion, categorias.catname AS Category, cursos.cefdesc, cursos.competences, cursos.courseweeks, cursos.lastmodified
		FROM cursos
		INNER JOIN categorias
		ON cursos.course_cat_id = categorias.catid";
		$query = mysqli_query($db_conx,$sql);
		while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$nombrecurso = $row["Curso"];
			$descripcion = $row["Descripcion"];
			$categoria = $row["Category"];
			$lista_cursos .= $nombrecurso;
        }
		echo $lista_cursos;
    }
	//FETCH ejercicios LIST FOR SIDEBAR AND FOOTER
	$exam_list = "";
	$viewing_exam_count = "";
	$view_all_exams_link = "";
	$featured_tests = "";
	// How many exercises are there in database
	$sql = "SELECT COUNT(ejer_id) FROM ejercicios";
	$qry = mysqli_query($db_conx,$sql);
	$qry_count = mysqli_fetch_row($qry);
	$exam_count = $qry_count[0];
	// Si el resultado es menos de 1, mostrar mensaje
	if($exam_count < 1) {
		$exam_list = '<li>No hay ejercicios publicados por el momento.</li>';
		// If there are exercises in db display only seven in random order
		} else {
		$maxexams = 7;
		$sql = "SELECT ejercicios.ejer_id, ejercicios.ejer_nombre, ejercicios.ejer_desc, ejercicios.ejer_friendly_name, ejercicios.cef_level_id, cef.cef_name FROM ejercicios INNER JOIN cef ON ejercicios.cef_level_id = cef.cef_id ORDER BY RAND() LIMIT $maxexams";
        //echo "<b>Filas affectadas (SELECT):</b> " . $db_conx->affected_rows . '<br />';
        if(!$result = $db_conx->query($sql)) {
            echo "Lo sentimos, este sitio esta teniendo problemas. Intentelo mas tarde.<br />";
            echo "errno: " . $db_conx->errno . '<br />';
            echo "error: " . $db_conx->error . '<br />';
            //echo '<code><pre style="white-space:pre-wrap;word-wrap:break-word;">' . $sql . '</pre></code>';
            exit;
            } else {
            while ($ejer = $result->fetch_assoc()) {
                $examid = $ejer["ejer_id"];
                $examname = $ejer["ejer_nombre"];
                $examinstruc = $ejer["ejer_desc"];
                $cefname = $ejer["cef_name"];
                $ejerNoTags = strip_tags($examname);
                $ejerFriendlyName = $ejer["ejer_friendly_name"];
                $exam_list .= '<li><a href="'.$domain.'/ejercicios/'.$examid.'/'.$ejerFriendlyName.'" title="'.$ejerNoTags.'">'.$examname.'</a><span class="cef"><a href="'.$domain.'/paginas/1/marco-comun-europeo" title="Common European Framework of Reference">'.$cefname.' </a></span></li>';
                $featured_tests .= '<hr class="featurette-divider">
                <div class="row featurette">
                <div class="col-md-7">
                <h2 class="featurette-heading"><span class="text-muted">Ejercicio: </span>'. $examname .' </h2>
                <p class="lead">'. $examinstruc .'</p>
				</div>
                <div class="col-md-5">
                <img class="featurette-image img-responsive center-block" width="350" height="350" src="i/vidaingles-500x500.png" alt="Generic placeholder image">
				</div>
                </div>';
            }
        }
		if($exam_count < $maxexams) {
			$viewing_exam_count = $exam_count.' de '.$exam_count;
			} else {
			$viewing_exam_count = $maxexams.' de '.$exam_count;
        }
		if($exam_count > $maxexams){
			$view_all_exams_link = '<a role="menu-item" href="'.$domain.'/ejercicios">ver todos</a>';
			} else {
			$view_all_exams_link = 'No hay mas ejercicios';
        }
    }
	//FETCH COURSES LIST FOR SIDEBAR AND FOOTER
	$course_list = "";
	$view_all_courses_link = "";
	$course_count = "";
	$viewing_course_count = "";
	$featured_courses = "";
	$sql = "SELECT COUNT(courseid) FROM cursos WHERE curso_publicado=1";
	$qry = mysqli_query($db_conx,$sql);
	$qry_count = mysqli_fetch_row($qry);
	$course_count = $qry_count[0];
	if($course_count < 1) {
		$course_list = '<li>No hay cursos</li>';
		} else {
		$maxcourses = 7;
		$sql = "SELECT * FROM cursos WHERE curso_publicado=1 LIMIT $maxcourses";
		$courselist = mysqli_query($db_conx,$sql);
		while ($row = mysqli_fetch_array($courselist, MYSQLI_ASSOC)) {
			$course_id = $row["courseid"];
			$course_name = $row["coursename"];
			$course_desc = $row["coursedesc"];
			$course_cat = $row["course_cat_id"];
			$course_weeks = $row["courseweeks"];
			$cef_desc = $row["cefdesc"];
			$couseFriendlyName = $row["curso_friendly_name"];
			$course_list .= '<li><a href="'.$domain.'/cursos/'.$course_id.'/'.$couseFriendlyName.'" title="'.$course_name.'"">'.$course_name.'</a><span class="cef"><a href="vi_page.php?id=1" title="Common European Framework of Reference">'.$cef_desc.' </a></span></li>';
			$featured_courses .= '<li><a href="vi_course.php?id='.$course_id.'" title="'.$course_name.'">'.$course_name.'</a></li>';
        }
		if($course_count <= $maxcourses){
			$viewing_course_count = $course_count .' de '. $course_count;
			} else {
			$viewing_course_count = $maxcourses.' de '. $course_count;
        }
		if($course_count > $maxcourses) {
			$view_all_courses_link = '<a role="menu-item" href="todos_cursos.php">ver todos</a>';
			} else {
			$view_all_courses_link = 'No hay mas cursos';
        }
    }
	$timeAgoObject = new convertToAgo;
	// fetch recent lecciones for Featured list
	$recent_lessons = "";
	$featured_lessons = "";
	$lessonid = "";
	$lessontitle = "";
	$lessonexcerpt = "";
	$sql = "SELECT * FROM lecciones WHERE ispublished='1' ORDER BY datepublished DESC LIMIT 3";
	$lessonslist = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($lessonslist, MYSQLI_ASSOC)) {
		$countquery = mysqli_query($db_conx, "SELECT COUNT(lessonid) FROM lecciones");
		$countrow = mysqli_fetch_row($countquery);
		$lesson_count = $countrow[0];
		$featuredlessonid = $row["lessonid"];
		$lessonlevel = $row["lessonlevel"];
		$lessoncourse = $row["course_name"];
		$lessoncef = $row["lessoncef"];
		$lessonauthor = $row["lessonauthor"];
		$feturedlessontitle = $row["lessontitle"];
		$feturedlessontitleNoTags = strip_tags($feturedlessontitle);
		$featuredlesson_friendly = $row["lesson_name"];
		$lessoncontent = $row["lessoncontent"];
		$lessonimage = $row["lesson_image"];
		$lessoncontent = convertHashtags($lessoncontent);
		$featuredlessonexcerpt = strip_tags(substr($lessoncontent, 0, 230));
		$date_published = $row["datepublished"];
		
		$recent_lessons .= '<div class="col-lg-4">
		<img class="img-circle" src="'.$domain.'/i/'.$lessonimage.'" alt=" ' .$feturedlessontitleNoTags .' " width="140" height="140" title="'.$feturedlessontitleNoTags.'">
		<h2><a href="'.$domain.'/lecciones/'.$featuredlessonid.'/'.$featuredlesson_friendly.'" title="Lección: '.$feturedlessontitleNoTags.'">'.$feturedlessontitle.'</a></h2>
		<div class="cef">Publicado: <abbr class="timeago" title="'.$date_published.'">'. $date_published .'</abbr></div>
		<i>'.$featuredlessonexcerpt.' ...</i>
		<p><a class="btn btn-primary" href="'.$domain.'/lecciones/'.$featuredlessonid.'/'.$featuredlesson_friendly.'" role="button">Continua leyendo &raquo;</a></p>
		</div><!-- /.col-lg-4 -->';
		
		$featured_lessons .= '<a class="list-group-item" href="lesson.php?id='.$lessonid.'"><h4 class="list-group-item-heading">'.$lessontitle.'</h4><p class="list-group-item-text">'.$lessonexcerpt.'</p></a>';
    }
	// FETCH lecciones LIST FOR SIDEBAR AND FOOTER
	$lessons_list = "";
	$viewing_lesson_count = "";
	$view_all_lessons_link = "";
	$lesson_image = "";
	$coursename_link = "";
	$lesson_page_title = "";
	$sql = "SELECT COUNT(lessonid) FROM lecciones";
	$qry = mysqli_query($db_conx,$sql);
	$qry_count = mysqli_fetch_row($qry);
	$lesson_count = $qry_count[0];
	if($lesson_count < 1) {
		$lesson_list = '<li>No hay lecciones</li>';
		} else {
		$maxlessons = 7;
		$sql = "SELECT * FROM lecciones WHERE ispublished='1' ORDER BY RAND() LIMIT $maxlessons";
		$lessonslist = mysqli_query($db_conx,$sql);
		while ($row = mysqli_fetch_array($lessonslist, MYSQLI_ASSOC)) {
			$lessonid = $row["lessonid"];
			$lessonlevel = $row["lessonlevel"];
			$lessoncourse = $row["course_name"];
			$lessoncef = $row["lessoncef"];
			$lessonauthor = $row["lessonauthor"];
			$lessontitle = $row["lessontitle"];
			$lessonNoTags = strip_tags($lessontitle);
			$lessonfriendlyname = $row['lesson_name'];
			$date_published = $row["datepublished"];
			$lessons_list .= '<li><a href="'.$domain.'/lecciones/'.$lessonid.'/'.$lessonfriendlyname.'" title="'.$lessonNoTags.'">'.$lessontitle.'</a><span class="cef"><a href="'.$domain.'/paginas/1/marco-comun-europeo" title="Common European Framework of Reference">'.$lessoncef.' </a></span></li>';
        }
		if($lesson_count <= $maxlessons){
			$viewing_lesson_count = $lesson_count.' de '.$lessons_count;
			} else {
			$viewing_lesson_count = $maxlessons.' de '.$lesson_count;
        }
		if($lesson_count > $maxlessons) {
			$view_all_lessons_link = '<a role="menu-item" tabindex="1" href="'.$domain.'/lecciones">ver todas</a>';
        }
    }
	//fetch paginas
	$page_list = "";
	$viewing_page_count = "";
	$view_all_pages_link = "";
	$sql = "SELECT COUNT(pageid) FROM paginas";
	$qry = mysqli_query($db_conx,$sql);
	$qry_count = mysqli_fetch_row($qry);
	$page_count = $qry_count[0];
	if($page_count < 1) {
		$page_list = '<li>No hay páginas</li>';
		} else {
		$maxpages = 7;
		$sql = "SELECT * FROM paginas ORDER BY RAND() LIMIT $maxpages";
		$pagelist = mysqli_query($db_conx,$sql);
		while ($row = mysqli_fetch_array($pagelist,MYSQLI_ASSOC)) {
			$page_id = $row["pageid"];
			$page_title = $row["pagetitle"];
			$friendly_title = $row["friendlytitle"];
			$page_content = $row["pagecontent"];
			$page_excerpt = strip_tags(substr($page_content, 0, 220));
			$page_list .= '<li><a href="'.$domain.'/paginas/'.$page_id.'/'.$friendly_title.'" title="'.$page_title.'">'.$page_title.'</a></li>';
        }
		if($page_count <= $maxpages) {
			$viewing_page_count = $page_count . ' de ' . $page_count;
			} else {
			$viewing_page_count = $maxpages . ' de ' . $page_count;
        }
		if ($page_count > $maxpages) {
			$view_all_pages_link = '<a role="menu-item" tabindex="1" href="'.$domain.'/paginas">Ver todas</a>';
			} else {
			$view_all_pages_link = '<a>No hay mas páginas</a>';
        }
    }
	// CLASS FOR CONVERTING TIME TO AGO
	class convertToAgo {
        function convert_datetime($str) {
            list($date, $time) = explode(' ', $str);
            list($year, $month, $day) = explode('-', $date);
            list($hour, $minute, $second) = explode(':', $time);
            $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
            return $timestamp;
        }
        function makeAgo($timestamp){
            $difference = time() - $timestamp;
            $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
            $lengths = array("60","60","24","7","4.35","12","10");
            for($j = 0; $difference >= $lengths[$j]; $j++)
			$difference /= $lengths[$j];
			$difference = round($difference);
            if($difference != 1) $periods[$j].= "s";
			$text = "$difference $periods[$j] ago.";
			return $text;
        }
    } // END CLASS
	//FETCH canciones LIST FOR SIDEBAR
	$song_list = "";
	$songs_count = "";
	$view_all_songs_link = "";
	$sql = "SELECT COUNT(songid) FROM canciones ";
	$qry = mysqli_query($db_conx,$sql);
	$qry_count = mysqli_fetch_row($qry);
	$songs_count = $qry_count[0];
	if($songs_count < 1){
		$song_list = 'No hay canciones.';
		} else {
		$max = 7;
		$sql = "SELECT * FROM canciones ORDER BY RAND() LIMIT $max";
		$qry = mysqli_query($db_conx,$sql);
		while($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
			$song_Id = $row['songid'];
			$song_Name = $row['songname'];
			$song_Group = $row['songgroup'];
			$song_friendly_name = $row['songfriendlyname'];
			$song_list .= '<li><a href="'.$domain.'/canciones/'.$song_Id.'/'.$song_friendly_name.'" title="'.$song_Name.'">'.$song_Name.'</a></li>';
        }
		if($songs_count < $max){
			$viewing_count = $songs_count.' de '.$songs_count;
			} else {
			$viewing_count = $max.' de '.$songs_count;
        }
		if($songs_count > $max){
			$view_all_songs_link = '<a role="menu-item" href="'.$domain.'/canciones">ver todas</a>';
			} else {
			$view_all_songs_link = '<a>No hay mas canciones</a>';
        }
    }
	// FETCH VERBOS FROM DB TABLE
	$verb1_list = "";
	$sql = "SELECT * FROM verbos WHERE verbCat='1' ORDER BY verbCat ";
	$test_query = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($test_query, MYSQLI_ASSOC)) {
		$verb1_id = $row["verbID"];
		$verb1_name = $row["verbName"];
		$verb1_base = $row["baseForm"];
		$verb1_past = $row["pastSimple"];
		$verb1_participle = $row["pastParticiple"];
		$verb1_cat = $row["verbCat"];
		$verb1_list .= '<tr>
		<td>'.$verb1_base.'</td><td>'.$verb1_past.'</td><td>'.$verb1_participle.'</td>
		</tr>';
    }
	$verb2_list = "";
	$sql = "SELECT * FROM verbos WHERE verbCat='2' ORDER BY verbCat ";
	$test_query = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($test_query, MYSQLI_ASSOC)) {
		$verb2_id = $row["verbID"];
		$verb2_name = $row["verbName"];
		$verb2_base = $row["baseForm"];
		$verb2_past = $row["pastSimple"];
		$verb2_participle = $row["pastParticiple"];
		$verb2_cat = $row["verbCat"];
		$verb2_list .= '<tr>
		<td>'.$verb2_base.'</td><td>'.$verb2_past.'</td><td>'.$verb2_participle.'</td>
		</tr>';
    }
	$verb3_list = "";
	$sql = "SELECT * FROM verbos WHERE verbCat='3' ORDER BY verbCat ";
	$test_query = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($test_query, MYSQLI_ASSOC)) {
		$verb3_id = $row["verbID"];
		$verb3_name = $row["verbName"];
		$verb3_base = $row["baseForm"];
		$verb3_past = $row["pastSimple"];
		$verb3_participle = $row["pastParticiple"];
		$verb3_cat = $row["verbCat"];
		$verb3_list .= '<tr>
		<td>'.$verb3_base.'</td><td>'.$verb3_past.'</td><td>'.$verb3_participle.'</td>
		</tr>';
    }
	//showcase
	$showcase = "";
	if ($user_ok == true) {
		$showcase = ' <div class="jumbotron noprint">
		<h1>¿Necesitas Asesor&iacute;a <span class="text-muted">Personalizada</span>?</h1>
		<p class="lead">Nosotros vamos contigo o tu vienes con nosotros, <span class="text-muted">d&aacute;le</span>.</p>
		<p><a class="btn btn-primary btn-lg" role="button">Ver detalles</a></p>
		</div>';
		} else {
		$showcase = ' <div class="jumbotron noprint">
		<h1>Vida Ingl&eacute;s</h1>
		<p>Prep&aacute;rate para tus ex&aacute;menes</p>
		<p><a href="'.$domain.'/registrar" class="btn btn-primary btn-lg" role="button">&iexcl;Reg&iacute;strate Ya!</a> <small>es gr&aacute;tis</small></p>
		</div>';
    }
	// fetch first and lastname of logged user
	$user_fullname = "";
	$sql = "SELECT user_name1, user_name2, user_lastname1, user_lastname2 FROM usuarios WHERE username='$log_username' AND activated='1' LIMIT 1";
	$ufullname_query = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($ufullname_query, MYSQLI_ASSOC)) {
		$user_name1 = $row["user_name1"];
		$user_name2 = $row["user_name2"];
		$user_lastname1 = $row["user_lastname1"];
		$user_lastname2 = $row["user_lastname2"];
		$user_fullname .= $user_name1. ' '. $user_name2 . ' ' . $user_lastname1 . ' ' . $user_lastname2;
    }
	// select categoria option list
	function lista_categoria($db_conx) {
		$cat_list_option="";
		$selqry = "SELECT * FROM categorias";
		$qry  = mysqli_query($db_conx,$selqry);
		while($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
			$cat_id = $row["catid"];
			$cat_name = $row["catname"];
			$cat_list_option .="<option value=".$cat_id.">".$cat_name."</option>";
        }
		return $cat_list_option;
    }
	// select cef option list
	function lista_cef($db_conx) {
		$cef_list_option="";
		$consulta = "SELECT * FROM cef";
        if (!$sql = $db_conx->prepare($consulta)) {
            echo "Falló la preparación: (" . $db_conx->errno . ") " . $db_conx->error;
            exit;
        }
        $sql->execute();
		$result = $sql->get_result();
		while($cef = $result->fetch_assoc()) {
			$cef_id = $cef["cef_id"];
			$cef_name = $cef["cef_name"];
			$cef_list_option .="<option value=".$cef_id.">".$cef_name."</option>";
        }
		return $cef_list_option;
    }
	// Select lesson option list
	function selectLessonOptionList($db_conx) {
		$select_lesson_list = "";
		$sql = "SELECT * FROM lecciones";
		$qry = mysqli_query($db_conx,$sql);
		while( $row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
			$selectlessid = $row['lessonid'];
			$selectlesstitle = $row['lessontitle'];
			$select_lesson_list .= '<option value="'.$selectlessid.'">'.$selectlesstitle.'</option>';
        }
		return $select_lesson_list;
    }
	$aviso = "";
	if ($admin_ok == true) {
		$adminNav = '<a href="add_lesson.php">Add lesson</a> | <a href="add_exercise.php">Add exercise</a> | <a href="add_course.php">Add course</a>';
		} else {
		$aviso = "<p>Has iniciado sesión como usuario</p>";
    }
	// select curso option list
	function lista_cursos($db_conx) {
		$cat_list_option="";
		$selqry = "SELECT * FROM cursos";
		$qry  = mysqli_query($db_conx,$selqry);
		while($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
			$course_id = $row["courseid"];
			$course_name = $row["coursename"];
			$course_list_option .="<option value=".$course_id.">".$course_name."</option>";
        }
		return $course_list_option;
    }
	// select asunto option list
	function lista_asuntos($db_conx) {
        $asunto_option_list = NULL;
        if(!$sql = $db_conx->prepare("SELECT * FROM asuntos")) {
            echo "Falló la preparación: (" . $db_conx->errno . ") " . $db_conx->error;
            exit;
        }
        $sql->execute();
        $result = $sql->get_result();
		while($asunto = $result->fetch_assoc()) {
			$asunto_id = $asunto['asunto_id'];
			$asunto_nombre = $asunto['asunto_nombre'];
			$asunto_option_list .= '<option value='. $asunto_id .'>'. $asunto_nombre .'</option>';
        }
		return $asunto_option_list;
    }
?>