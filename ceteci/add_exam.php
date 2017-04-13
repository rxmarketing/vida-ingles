<?php
require 'classes/Database.php';
    //echo "<pre>";
    //print_r($_POST);
    //echo "</pre>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Add exam</title>
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
          if (elem === "examPoints") {
              rx = /[^0-9]/gi;
          } else if (elem === "examNotes") {
              rx = /['"]/gi;
          }
          tf.value = tf.value.replace(rx, "");
			}
	</script>
</head>
<body>
<?php include_once 'templates/topnav-template.php'; ?>
<div class="container">
	<div class="row">
		<section class="col-md-9">
			<h1 class="">New exam</h1>
			<form action="php/php_add_exam.php" class="form" role="form" method="post" name="addExamFrm" id="addExamFrm">
				<fieldset>
					<legend>Exam info</legend>
					<div class="form-group">
						<label class="control-label" for="examDate">Exam date</label>
						<input type="date" class="form-control" name="examDate" id="examDate" placeholder="" autofocus/>
					</div>
					<div class="form-group">
						<label class="control-label" for="groupID">Group</label>
						<select name="groupID" class="form-control" id="groupID">
							<option value="" selected disabled>--- Select one from the list ----</option>
                <?php echo $grpOpt; ?>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="grp_mod_id">Module</label>
						<select class="form-control" name="grp_mod_id" id="grp_mod_id" required="required"></select>
					</div>
					<div class="form-group">
						<label class="control-label" for="mod_unit_id">Unit</label>
						<select class="form-control" name="mod_unit_id" id="mod_unit_id" required="required"></select>
					</div>
					<div class="form-group">
						<label class="control-label" for="examPoints">Points</label>
						<input type="number" class="form-control" name="examPoints" id="examPoints" placeholder="Total points"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="examNotes">Notes</label>
						<textarea class="form-control textarea" onkeyup="restrict('examNotes')" name="examNotes" id="examNotes" cols="3" rows="3">
							</textarea>
					</div>
					<div class="form-group">
						<label class="control-label" for=""></label>
						<input type="hidden" name="" id="" value="">
						<input type="hidden" name="" id="" value="">
						<button class="btn btn-primary btn-lg" id="addExamBtn">Save</button>
						<span class="msg"><img src="i/loader.gif"> espere un momento...</span>
					</div>
				</fieldset>
			</form>
		</section>
		<aside class="col-md-3">
        <?php include_once 'templates/right-side-nav.php'; ?>
		</aside>
	</div>
    <?php include_once 'templates/footer-template.php'; ?>
	<script src="js/"></script>
</div>
</body>
</html>