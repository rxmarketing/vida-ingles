<?php
include('../inc/db_vidainglescore_conn.php');

if(isset($_POST['lastlessonid']) && is_numeric($_POST['lastlessonid'])){
	$lastlessonid = $_POST['lastlessonid'];
	$less_list = "";
	$sql = "SELECT * FROM lecciones WHERE lessonid>'$lastlessonid' ORDER BY lessonid ASC LIMIT 10";
	$qry = mysqli_query($db_conx,$sql);
	while($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
		$less_id = $row['lessonid'];
		$less_course = $row['lesson_courseid'];
		$less_cef = $row['lessoncef'];
		$less_title = $row['lessontitle'];
		$less_content = $row['lessoncontent'];
		$less_excerpt = strip_tags(substr($less_content, 0,200));
		$less_list .= '<li><a href="lesson.php?id='.$less_id.'"><h4>' .$less_title . '</h4></a><p>'.$less_excerpt.'</p></li>';
	}
	
	echo $less_list;
	
	if(mysqli_num_rows($qry)==9){
		echo '<div class="show-more-wrapper" id="show-more-wrapper">
		<a href="#" id="<?php echo $less_id ?>" class="load-more">Mostrar mas lecciones <span class="caret"></span></a>
	</div>';
	} else {
		echo '<div class="show-more-wrapper well" id="show-more-wrapper">
		<p id="end" class="load-more">No hay mas lecciones</p>
	</div>';
	}
}
?>