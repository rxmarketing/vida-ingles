<?php 
	include_once("../inc/checar_sesion.php");
	include_once("../inc/functions.php");
	$limit = 10;
 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$db_conx,$limit);
}
	function showData($data,$db_conx,$limit){
	$domain = "";
	
  $page = $data['page'];
   if($page==1){
   $start = 0;  
  }
  else{
		$start = ($page-1)*$limit;
  }
  
  $sql = "SELECT * FROM lecciones ORDER BY datepublished DESC limit $start,$limit";
  $str='';
  $data = $db_conx->query($sql);
  if($data!=null && $data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
		$less_id = $row['lessonid'];
		$less_course = $row['lesson_courseid'];
		$less_cef = $row['lessoncef'];
		$less_title = $row['lessontitle'];
		$less_title_notags = strip_tags($less_title);
		$less_friendly = $row["lesson_name"];
		$less_content = $row['lessoncontent'];
		$less_date_pub = $row['datepublished'];
		$less_date_mod = $row['datemodified'];
		$less_excerpt = strip_tags(substr($less_content, 0,230));
		$str .= '<li class="media">
		<div class="media‐left">
		<a href="'.$domain.'/lecciones/'.$less_id.'/'.$less_friendly.'">
		<img class="media‐object" src="i/vidaingles-logo30x30.png" alt="' .$less_title . '" title="' .$less_title_notags . '">
		</a>
		</div>
		<div class="media‐body">
		<h4 class="media‐heading"><a href="'.$domain.'/lecciones/'.$less_id.'/'.$less_friendly.'" title="' .$less_title_notags . '">' .$less_title . '</a></h4>
		<div class="cef">Actualizado: <abbr class="timeago" title="'.$less_date_mod .'">'. $less_date_mod .'</abbr></div>
		'.$less_excerpt.' ... '.'<a href="'.$domain.'/lecciones/'.$less_id.'/'.$less_friendly.'">[ lee más..]</a>
		</div>
		</li>'; 
		 
     // $str.="<div class='data-container'><p>".$row['verbID']. ' '.$row['baseForm']. ' '.$row['pastSimple']."</p></div>";
   }
   $str.="<input type='hidden' class='nextpage' value='".($page+1)."'><input type='hidden' class='isload' value='true'>";
   }else{
    $str .= "<input type='hidden' class='isload' value='false'><p>Finished</p>";
   }
  
   
echo $str; 

}	
?>