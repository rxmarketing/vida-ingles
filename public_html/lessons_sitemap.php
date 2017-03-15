<?php
include_once("inc/checar_sesion.php");
include_once("inc/functions.php");
$les_FriendlyName = "";
$lessonSMList = "";
$sitemapQry = "SELECT lessonid, lesson_name FROM lecciones";
$sitemapResult = mysqli_query($db_conx,$sitemapQry);
while ($row = mysqli_fetch_array($sitemapResult,MYSQLI_ASSOC)) {
 $lesson_id = $row['lessonid'];
 $les_FriendlyName = $row['lesson_name'];
 $lessonSMList .= '<li>http://www.vidaingles.com/lecciones/'.$lesson_id.'/'.$les_FriendlyName.'</li>';
}
 echo '<ul class="example-list">';
 echo $lessonSMList;
 echo '</ul>';
?>

