<?php
include_once("inc/checar_sesion.php");
include_once("inc/functions.php");
$les_FriendlyName = "";
$lessonSMList = "";
$sitemapQry = "SELECT ejer_id, ejer_friendly_name FROM ejercicios";
$sitemapResult = mysqli_query($db_conx,$sitemapQry);
while ($row = mysqli_fetch_array($sitemapResult,MYSQLI_ASSOC)) {
 $e_id = $row['ejer_id'];
 $e_FriendlyName = $row['ejer_friendly_name'];
 $lessonSMList .= '<li>http://www.vidaingles.com/ejercicios/'.$e_id.'/'.$e_FriendlyName.'</li>';
}
 echo '<ul class="example-list">';
 echo $lessonSMList;
 echo '</ul>';
?>