<?php

require 'classes/Database.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8">
	    <title>Add school</title>
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
                } else if (elem === "zip") {
                    rx = /[^0-9]/gi;
                } else if (elem === "mobilef") {
                    rx = /[^0-9]/gi;
                } else if (elem === "homef") {
                    rx = /[^0-9]/gi;
                } else if (elem === "rfc") {
                    rx = /[^a-z0-9]/gi;
                }
                tf.value = tf.value.replace(rx, "");
            }
        </script>
    </head>
<body>
<?php include_once 'templates/topnav-template.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<form action="php/php_add_school.php" class="form-signin" role="form" method="post" name="addSclFrm" id="addGrpFrm">
				<h1 class="form-signin-heading">New school</h1>
				<fieldset>
					<legend>School info</legend>
					<div class="form-group">
						<label class="control-label" for="school_name">School name</label>
						<input type="text" class="form-control" onkeyup="restrict('')" name="school_name" id="school_name" placeholder="Key in school name " maxlength="50"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="address">Address line 1</label>
						<input class="form-control" type="text" name="address" id="address" maxlength="80"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="address2">Address line 2</label>
						<input class="form-control" type="text" name="address2" id="address2" maxlength="80"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="country">Country</label>
						<select class="form-control" name="country" id="country">
							<option value="0" disabled selected>--- Select a country ----</option>
                <?php echo $countryOpt; ?>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="state">State</label>
						<select class="form-control" name="state" id="state">
							<option value="" selected disabled>--- choose a state -------</option>
                <?php echo $estadosOpt; ?>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="muni">Municipality</label>
						<select class="form-control" name="muni" id="muni">
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="asentamiento">Col/Fracc</label>
						<select name="asentamiento" id="asentamiento" class="form-control">
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="zip">Zip Code</label>
						<input class="form-control" onkeyup="restrict('zip')" type="text" name="zip" id="zip" maxlength="5" placeholder="Key in zip code"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="email">Email</label>
						<input class="form-control" onkeyup="restrict('email')" type="email" name="email" id="email" maxlength="100"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="mobilef">Mobile Phone</label>
						<input class="form-control" onkeyup="restrict('mobilef')" type="tel" name="mobilef" id="mobilef" maxlength="10"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="homef">Home Phone</label>
						<input class="form-control" onkeyup="restrict('homef')" type="tel" name="homef" id="homef" maxlength="10"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="website">Website</label>
						<input class="form-control" type="text" name="website" id="website" placeholder="Key in website" maxlength="100"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="rfc">RFC</label>
						<input class="form-control" onkeyup="restrict('rfc')" type="text" name="rfc" id="rfc" placeholder="Key in RFC" maxlength="100"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="scl_notes">Notes</label>
						<textarea class="form-control" name="scl_notes" id="scl_notes" cols="47" rows="3" placeholder="Type some notes here (optional)"></textarea>
					</div>
					<div class="form-group">
						<label for="" class="control-label"></label>
							        <button class="btn btn-primary btn-lg" id="addSchoolBtn">Guardar</button>
					</div>
				</fieldset>
				<span class="msg"></span>
			</form>
		</div>
		<div class="col-md-3">
        <?php include_once 'templates/right-side-nav.php'; ?>
		</div>
      <?php include_once 'templates/footer-template.php'; ?>
	</div>
</div>
</body>
</html>