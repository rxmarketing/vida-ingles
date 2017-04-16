<?php
require 'classes/Database.php';
//include('inc/db_cetec_mysqliconn.php');
//include('inc/ceteci_functions.php');
	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Add group</title>
	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap-reboot.min.css"/>
	<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/cetec.css">
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<script src="../bower_components/tether/dist/js/tether.min.js"></script>
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/ceteci.js"></script>
	<script>
      function restrict(elem) {
                var tf = _(elem);
                var rx = new RegExp;
          if (elem === "groupCode") {
                    rx = /[.,'"; ]/gi;
          } else if (elem === "groupNotes") {
                    rx = /['"]/gi;
				}
                tf.value = tf.value.replace(rx, "");
			}
	</script>
</head>
<body>
<div class="container">
    <?php include_once 'templates/topnav-template.php'; ?>
	<div class="row">
		<div class="col-md-9">
			<h1 class="">New group</h1>
			<form action="php/php_add_group.php" class="form" role="form" method="post" name="addGrpFrm" id="addGrpFrm">
				<fieldset>
					<legend>Group info</legend>
					<div class="form-group">
						<label class="control-label" for="schoolID">School</label>
						<select class="form-control" name="schoolID" id="schoolID" required="required" autofocus>
							<option value="" disabled selected>--- Select one from the list ----</option>
                <?php echo $sclOpt; ?>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="grpCatId">Category</label>
						<select class="form-control" name="grpCatId" id="grpCatId" required="required">
							<option value="" disabled selected>--- Select one from the list ----</option>
                <?php echo $grpCatOpt; ?>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="fechaInicio">Start date</label>
						<input class="form-control required" type="date" name="fechaInicio" id="fechaInicio" required="required"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="fechaFinal">End date</label>
						<input class="form-control required" type="date" name="fechaFinal" id="fechaFinal" required="required"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="timein">Time in</label>
						<input class="form-control" type="time" name="timein" id="timein" required="required">
					</div>
					<div class="form-group">
						<label class="control-label" for="timeout">Time out</label>
						<input class="form-control" type="time" name="timeout" id="timeout" required="required">
					</div>
					<div class="form-group"><label class="control-label" for="days">Day(s)</label>
						<div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="days[]" id="days" value="Mon"/> Mon</label></div>
						<div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="days[]" id="days" value="Tue"/> Tue</label></div>
						<div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="days[]" id="days" value="Wed"/> Wed</label></div>
						<div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="days[]" id="days" value="Thu"/> Thu</label></div>
						<div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="days[]" id="days" value="Fri"/> Fri</label></div>
						<div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="days[]" id="days" value="Sat"/> Sat</label></div>
						<div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="days[]" id="days" value="Sun"/> Sun</label></div>
						<div class="form-group"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="days[]" id="days" value="Open"/> Open</label></div>
					</div>
					<div class="form-group">
						<label for="teacher" class="control-label">Teacher</label>
						<select class="form-control" name="teacher" id="teacher" required="required">
							<option value="" selected disabled>--- Select one from the list ----</option>
                <?php echo $teachOpt; ?>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="groupCode">Code</label>
						<input type="text" class="form-control" onkeyup="restrict('groupCode')" name="groupCode" id="groupCode" placeholder="Key in group code" maxlength="8"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="groupStatusID">Status</label>
						<select class="form-control" name="groupStatusID" id="groupStatusID" required="required">
							<option value="" selected disabled>--- Select one from the list ----</option>
                <?php echo $grpStatOpt; ?>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="groupNotes">Notes</label>
						<textarea class="form-control textarea" onkeyup="restrict('groupNotes')" name="groupNotes" id="groupNotes" cols="3" rows="5">
						</textarea>
					</div>
					<div class="form-group">
						<label for="" class="control-label"></label>
						<button class="btn btn-primary btn-lg" id="addGroupBtn">Save</button>
						<span class="msg"></span>
					</div>
				</fieldset>
			</form>
			<script src="js/add_group.js"></script>
		</div>
		<div class="col-md-3">
			right nav
		</div>
      <?php include_once 'templates/footer-template.php'; ?>
	</div>
</div>
</body>
</html>