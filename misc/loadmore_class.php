<?php
	//include_once("../inc/functions.php");
	class lessons {
		public function query($from,$to) {
			include_once("../inc/db_vidainglescore_conn.php");
			$sql = "SELECT * FROM lecciones WHERE lessonid>$from AND lessonid<$to";
			$qry = mysqli_query($db_conx, $sql);
			$titleList = "";
			while ($lesson = mysqli_fetch_array($qry)) {
				$lessonid = $lesson['lessonid'];
				$lessontitle = $lesson['lessontitle'];
				$titleList = $titleList.'<blockquote><p>'.$lessontitle.'</p></blockquote>';
				//$data[$lessonid]=$lessontitle;
			}
			$titleList = $titleList.'<div class="final" val="'.$lessonid.'"></div>';
			return $titleList;
		}//ENDS PUBLIC FUNCTION QUERY
		public function titulos() {
		if(isset($_POST['from'])) {
			$from = $_POST['from'];
			$to = $from+13;
			$titleList = $this->query($from,$to);
			//echo $titleList;
		} else {
			$titleList = $this->query(0,14);
			return $titleList;
		}
		}//ENDS FUNCTION TITULOS()
	}//ENDS CLASS lessons
	//var_dump($data);
	$obj = new lessons();
	$titleList = $obj->titulos();
?>