<?php
include('../../inc/db_vidainglescore_conn.php');
$limit = 40;
 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$db_conx,$limit);
}
function showData($data,$db_conx,$limit){
	
  $page = $data['page'];
   if($page==1){
   $start = 0;  
  }
  else{
  $start = ($page-1)*$limit;
  }
  
  $sql = "select * from verbos order by verbID asc limit $start,$limit";
  $str='';
  $data = $db_conx->query($sql);
  if($data!=null && $data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
      $str.="<div class='data-container'><p>".$row['verbID']. ' '.$row['baseForm']. ' '.$row['pastSimple']."</p></div>";
   }
   $str.="<input type='hidden' class='nextpage' value='".($page+1)."'><input type='hidden' class='isload' value='true'>";
   }else{
    $str .= "<input type='hidden' class='isload' value='false'><p>Finished</p>";
   }
  
   
echo $str; 

}

?>