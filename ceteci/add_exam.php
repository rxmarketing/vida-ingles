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
        <title>Add exam</title>
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
                if(elem == "examPoints") {
                    rx = /[^0-9]/gi;
                    } else if(elem == "examNotes"){
                    rx = /['"]/gi;
				}
                tf.value = tf.value.replace(rx, "");
			}
		</script>
	</head>
    <body>
        <div class="container">
            <div class="stud-form-wrapper">
                <form action="php/php_add_exam.php" class="form-horizontal" role="form" method="post" name="addModFrm" id="addModFrm">
                    <h1 class="">New exam</h1>
                    <fieldset>
                        <legend>Exam info</legend>
						<div class="form-group">
                            <label class="control-label col-md-5" for="examDate">Exam date</label>
							<div class="col-md-4">
								<input type="date" class="form-control" name="examDate" id="examDate" placeholder="" autofocus/>
							</div>
						</div>
						<div class="form-group">
                            <label class="control-label col-md-5" for="groupID">Group</label>
                            <div class="col-md-4">
                            	<select name="groupID" class="form-control" id="groupID" class="select">
                            	    <option value="" selected disabled>--- Select one from the list ----</option>
                            	    <?php echo groupOptList($db_conx); ?>
								</select>
							</div>
						</div>
						<div class="form-group">
                            <label class="control-label col-md-5 col-md-5" for="grp_mod_id">Module</label>
							<div class="col-md-4">
								<select class="form-control" name="grp_mod_id" id="grp_mod_id" required="required"></select>
							</div>
						</div>
						<div class="form-group">
                            <label class="control-label col-md-5 col-md-5" for="mod_unit_id">Unit</label>
							<div class="col-md-4">
								<select class="form-control" name="mod_unit_id" id="mod_unit_id" required="required"></select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="examPoints">Points</label>
							<div class="col-md-4">
								<input type="number" class="form-control" name="examPoints" id="examPoints"  placeholder="Total points"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="examNotes">Notes</label>
							<div class="col-md-4">
								<textarea class="form-control textarea" onkeyup="restrict('examNotes')" name="examNotes" id="examNotes" cols="3" rows="3">
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for=""></label>
							<div class="col-md-4">
								<input type="hidden" name="" id="" value="">
								<input type="hidden" name="" id="" value="">
								<button class="btn btn-primary btn-block" id="addExamBtn">Save</button>
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