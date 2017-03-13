<?php
	include('inc/db_ceteci_conn.php');
	include('inc/ceteci_functions.php');
	//echo "<pre>";
	//print_r($_POST);
	//echo "</pre>";
	
	
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Add module</title>
		<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap-reboot.min.css"/>
		<script src="../bower_components/jquery/dist/jquery.min.js"></script>
		<script src="../bower_components/tether/dist/js/tether.min.js"></script>
		<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/ceteci.js"></script>
		
		<script>
			function restrict(elem) {
				var tf = _(elem);
				var rx = new RegExp;
				if(elem == "groupCode") {
					rx = /[.,'"; ]/gi;
					} else if(elem == "groupNotes"){
					rx = /['"]/gi;
				}
				tf.value = tf.value.replace(rx, "");
			}
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-9">
			<div class="stud-form-wrapper">
				<form action="php/php_add_module.php" class="form-horizontal" role="form" method="post" name="addModFrm" id="addModFrm">
					<h1 class="">New module</h1>
					<fieldset>
						<legend>Module Info</legend>
						<div class="form-group">
							<label class="control-label" for="groupID">Group</label>
							<select name="groupID" class="form-control" id="groupID" autofocus required="required">
								<option value="" selected disabled>--- Select a group from the list ----</option>
								<?php echo groupOptList($db_conx); ?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label" for="mod_cat_id">Category</label>
							<select class="form-control" name="mod_cat_id" id="mod_cat_id" required="required">
								<option value="" selected disabled>--- Select a module category ----</option>
								<?php echo select_mod_cat($db_conx); ?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label" for="modNameId">Module subcategory</label>
							<select class="form-control" name="modNameId" id="modNameId">
							</select>
						</div>
						<div class="form-group">
							<label class="control-label" for="days">Day(s)</label>
							<div class="form-check">
								<label class="form-check-label"><input type="checkbox" name="days[]" class="form-check-input"id="days" value="Mon"/> Mon</label>
							</div>
							<div class="form-check">
								<label class="form-check-label"><input type="checkbox" name="days[]" class="form-check-input"id="days" value="Tue"/> Tue</label>
							</div>
							<div class="form-check">
								<label class="form-check-label"><input type="checkbox" name="days[]" class="form-check-input" id="days" value="Wed"/> Wed</label>
							</div>
							<div class="form-check">
								<label class="form-check-label"><input type="checkbox" name="days[]" class="form-check-input" id="days" value="Thu"/> Thu</label>
							</div>
							<div class="form-check">
								<label class="form-check-label"><input type="checkbox" name="days[]" class="form-check-input" id="days" value="Fri"/> Fri</label>
							</div>
							<div class="form-check">
								<label class="form-check-label"><input type="checkbox" name="days[]" class="form-check-input" id="days" value="Sat"/> Sat</label>
							</div>
							<div class="form-check">
								<label class="form-check-label"><input type="checkbox" name="days[]" class="form-check-input" id="days" value="Sun"/> Sun</label>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label" for="modStartDate">Start Date</label>
							<input type="date" class="form-control" name="modStartDate" id="modStartDate" placeholder=""/>
						</div>
						<div class="form-group">
							<label class="control-label" for="modEndDate">End Date</label>
							<input type="date" class="form-control" name="modEndDate" id="modEndDate" placeholder=""/>
						</div>
						<div class="form-group">
							<label class="control-label" for="timein">Time in</label>
							<input class="form-control" type="time" name="timein" id="timein">
						</div>
						<div class="form-group">
							<label class="control-label" for="timeout">Time out</label>
							<input class="form-control" type="time" name="timeout" id="timeout">
						</div>					
						<div class="form-group">
							<label class="control-label" for="modWeeks"># of weeks</label>
							<input type="number" class="form-control" name="modWeeks" id="modWeeks"  placeholder="type number of weeks"/>
						</div>
						<div class="form-group">
							<label class="control-label" for="modStatus">Status</label>
							<select name="modStatus" class="form-control" id="modStatus" class="select">
								<option value="" selected disabled>--- Select a module status from the list ------------- </option>
								<?php echo modStatusOptList($db_conx); ?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label" for="modNotes">Notes</label>
							<textarea class="form-control" name="modNotes" id="modNotes" cols="47" rows="3" placeholder="Type some notes here (optional)"></textarea>
						</div>			
						<div class="form-group">
							<label class="control-label" for=""></label>
							<input type="hidden" name="mod_scl_id" id="mod_scl_id" value="1">
							<input type="hidden" name="" id="" value="">
							<button class="btn btn-primary btn-lg" id="addModuleBtn">Create module</button>
							<span class="msg"><img src="i/loader.gif"> espere un momento...</span>
						</div>
					</fieldset>
				</form>
			</div> <!-- Ends .stud-form-wrapper -->
				</div> <!-- Ends .col-md-9 -->
			</div> <!-- Ends .row -->
		</div> <!-- Ends .container -->
	</body>
</html>