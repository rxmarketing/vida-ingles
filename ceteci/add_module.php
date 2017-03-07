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
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/cetec.css" />
		<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script src="js/aajax.js"></script>
		<script src="js/main.js"></script>
		<script src="js/myjavascript.js"></script>
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
			<div class="stud-form-wrapper">
				<form action="php/php_add_module.php" class="form-horizontal" role="form" method="post" name="addModFrm" id="addModFrm">
					<h1 class="">New module</h1>
					<fieldset>
						<legend>Module Info</legend>
						<div class="form-group">
							<label class="control-label col-md-5" for="groupID">Group</label>
							<div class="col-md-4">
								<select name="groupID" class="form-control" id="groupID" autofocus required="required">
									<option value="" selected disabled>--- Select one from the list ----</option>
									<?php echo groupOptList($db_conx); ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5 col-md-5" for="mod_cat_id">Category</label>
							<div class="col-md-4">
								<select class="form-control" name="mod_cat_id" id="mod_cat_id" required="required">
									<option value="" selected disabled>--- Select a category ----</option>
									<?php echo select_mod_cat($db_conx); ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="modNameId">Module name</label>
							<div class="col-md-4">
								<select class="form-control" name="modNameId" id="modNameId">
									<option value="" selected disabled>--- Select a name ----</option>
									<?php echo modNameOptList($db_conx); ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="days">Day(s)</label>
							<div class="col-md-4">
								<label class="checkbox"><input type="checkbox" name="days[]" id="days" value="Mon"/>Mon</label>
								<label class="checkbox"><input type="checkbox" name="days[]" id="days" value="Tue"/>Tue</label>
								<label class="checkbox"><input type="checkbox" name="days[]" id="days" value="Wed"/>Wed</label>
								<label class="checkbox"><input type="checkbox" name="days[]" id="days" value="Thu"/>Thu</label>
								<label class="checkbox"><input type="checkbox" name="days[]" id="days" value="Fri"/>Fri</label>
								<label class="checkbox"><input type="checkbox" name="days[]" id="days" value="Sat"/>Sat</label>
								<label class="checkbox"><input type="checkbox" name="days[]" id="days" value="Sun"/>Sun</label>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="modStartDate">Start Date</label>
							<div class="col-md-4">
								<input type="date" class="form-control" name="modStartDate" id="modStartDate" placeholder=""/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="modEndDate">End Date</label>
							<div class="col-md-4">
								<input type="date" class="form-control" name="modEndDate" id="modEndDate" placeholder=""/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="timein">Time in</label>
							<div class="col-md-4">
								<input class="form-control" type="time" name="timein" id="timein">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="timeout">Time out</label>
							<div class="col-md-4">
								<input class="form-control" type="time" name="timeout" id="timeout">
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-5" for="modWeeks"># of weeks:</label>
							<div class="col-md-4">
								<input type="number" class="form-control" name="modWeeks" id="modWeeks"  placeholder="type number of weeks"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="modStatus">Status:</label>
							<div class="col-md-4">
								<select name="modStatus" class="form-control" id="modStatus" class="select">
									<option value="" selected disabled>--- Select one from the list ----</option>
									<?php echo modStatusOptList($db_conx); ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="modNotes">Notes:</label>
							<div class="col-md-4">
								<input class="form-control" type="text" name="modNotes" id="modNotes"  placeholder="Notes"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-5" for=""></label>
							<div class="col-md-4">
								<input type="hidden" name="mod_scl_id" id="mod_scl_id" value="1">
								<input type="hidden" name="" id="" value="">
								<button class="btn btn-primary btn-block" id="addModuleBtn">Create module</button>
								<span class="msg"><img src="i/loader.gif"> espere un momento...</span>
							</div>
						</div>
					</fieldset>
				</form>
				<script src="js/add_module.js"></script>
			</div>
		</div>
	</body>
</html>