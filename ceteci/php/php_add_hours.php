<?php
require_once ('../db_cetec_conn.php');
$hrs_msg = "";
if (!empty($_POST)) {
sleep(2);
		$tcDate       = $_POST['tcDate'];
		$week         = $_POST['weekNum'];
		$groupID      = $_POST['groupID'];
		$modID				= $_POST['moduleID'];
		$tcIN         = $_POST['tcIN'];
		$tcOUT        = $_POST['tcOUT'];
		$hours        = $_POST['hoursWorked'];
		$room         = $_POST['classRoom'];
		$tcNotes      = $_POST['tcNotes'];
		$tcObjectives = $_POST['tcObjectives'];
		if ($tcDate == "") {
   $hrs_msg = "Key in the date";
  } else {
  $qry_insert = "INSERT INTO tbl_time_clock ( tcDate ,weekNum ,groupID ,modID ,tcIN ,tcOUT ,HoursWorked ,classRoom ,tcNotes ,classObjectives ) VALUES ( '$tcDate' ,'$week' ,'$groupID' ,'$modID' ,'$tcIN' ,'$tcOUT' ,'$hours' ,'$room' ,'$tcNotes' ,'$tcObjectives' )";
  $query = mysqli_query($db_cetec_conx,$qry_insert);
  $sql = "UPDATE tbl_modules SET modCurrWeek='$week' WHERE modID='$modID' LIMIT 1";
  $qry = mysqli_query($db_cetec_conx,$sql);
  $hrs_msg = "Data inserted successfully!";
  }
} else {
   $hrs_msg = "Form is empty!";
}
$json_out = array("mensaje" => $hrs_msg);
echo json_encode($json_out);
?>