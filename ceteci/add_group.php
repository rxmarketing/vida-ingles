<?php
require 'classes/Database.php';
//include('inc/db_ceteci_conn.php');
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
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/cetec.css" />
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script src="js/aajax.js"></script>
        <script src="js/main.js"></script>
        <script src="js/myjavascript.js"></script>
        <script src="js/ceteci.js"></script>
        <style type="text/css">

		</style>
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
                <form action="php/php_add_group.php" class="form-horizontal" role="form" method="post" name="addGrpFrm" id="addGrpFrm">
                    <h1 class="form-signin-heading">New group</h1>
                    <fieldset>
                        <legend>Group info</legend>
                        <div class="form-group">
                            <label class="control-label col-md-5" for="schoolID">School</label>
							<div class="col-md-4">
								<select class="form-control" name="schoolID" id="schoolID" required="required" autofocus>
									<option value="" disabled selected>--- Select one from the list ----</option>
                    <?php echo $sclOpt; ?>
								</select>
							</div>
						</div>
	                    <div class="form-group">
		                    <label class="control-label col-md-5" for="grpCatId">Category</label>
		                    <div class="col-md-4">
			                    <select class="form-control" name="grpCatId" id="grpCatId" required="required">
				                    <option value="" disabled selected>--- Select one from the list ----</option>
                              <?php echo $grpCatOpt; ?>
			                    </select>
		                    </div>
						</div>
                        <div class="form-group">
                            <label class="control-label col-md-5" for="fechaInicio">Start date</label>
                            <div class="col-md-4">
                            	<input class="form-control required" type="date" name="fechaInicio" id="fechaInicio" required="required"/>
							</div>
						</div>
						<div class="form-group">
                            <label class="control-label col-md-5" for="fechaFinal">End date</label>
                            <div class="col-md-4">
                            	<input class="form-control required" type="date" name="fechaFinal" id="fechaFinal" required="required"/>
							</div>
						</div>
                        <div class="form-group">
                            <label class="control-label col-md-5" for="timein">Time in</label>
							<div class="col-md-4">
								<input class="form-control" type="time" name="timein" id="timein" required="required">
							</div>
						</div>
                        <div class="form-group">
                            <label class="control-label col-md-5" for="timeout">Time out</label>
                            <div class="col-md-4">
                            	<input class="form-control" type="time" name="timeout" id="timeout" required="required">
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
                            	<label class="checkbox"><input type="checkbox" name="days[]" id="days" value="Open"/> Open</label>
							</div>
						</div>
                        <div class="form-group">
                        	<label for="teacher" class="control-label col-md-5">Teacher</label>
                        	<div class="col-md-4">
                            	<select class="form-control" name="teacher" id="teacher" required="required">
									<option value="" selected disabled>--- Select one from the list ----</option>
                                  <?php echo $teachOpt; ?>
								</select>
							</div>
						</div>
                        <div class="form-group">
                        	<label class="control-label col-md-5" for="groupCode">Code</label>
                        	<div class="col-md-4">
                        		<input type="text" class="form-control" onkeyup="restrict('groupCode')" name="groupCode" id="groupCode" placeholder="Key in group code" maxlength="8"/>
							</div>
						</div>
                        <div class="form-group">
                        	<label class="control-label col-md-5" for="groupStatusID">Status</label>
                        	<div class="col-md-4">
                            	<select class="form-control" name="groupStatusID" id="groupStatusID" required="required">
                            	    <option value="" selected disabled>--- Select one from the list ----</option>
                                  <?php echo $grpStatOpt; ?>
								</select>
							</div>
						</div>
                        <div class="form-group">
                            <label class="control-label col-md-5" for="groupNotes">Notes</label>
                            <div class="col-md-4">
                            	<textarea class="form-control textarea" onkeyup="restrict('groupNotes')" name="groupNotes" id="groupNotes" cols="3" rows="5">
								</textarea>
							</div>
						</div>
						<label for="" class="control-label col-md-5"></label>
                    <div class="col-md-4">
                    	<button class="btn btn-primary btn-block" id="addGroupBtn">Save</button>
                    	<span class="msg"></span>
                    </div>
					</fieldset>
				</form>
                <script src="js/add_group.js"></script>
			</div>
		</div>
	</body>
</html>