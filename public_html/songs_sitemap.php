<?php
include_once("inc/checar_sesion.php");
include_once("inc/functions.php");
$s_FriendlyName = "";
$lessonSMList = "";
$sitemapQry = "SELECT songid, songfriendlyname FROM canciones";
$sitemapResult = mysqli_query($db_conx,$sitemapQry);
while ($row = mysqli_fetch_array($sitemapResult,MYSQLI_ASSOC)) {
 $s_id = $row['songid'];
 $s_FriendlyName = $row['songfriendlyname'];
 $lessonSMList .= '<li>http://www.vidaingles.com/canciones/'.$s_id.'/'.$s_FriendlyName.'</li>';
}
 echo '<ul class="example-list">';
 echo $lessonSMList;
 echo '</ul>';
?>