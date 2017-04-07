<?php
require 'classes/Database.php';


// populate the select options with years
	$yrs = null;
	$dob = null;
	$mob = null;
	for ($yr = date("Y"); $yr >= 1940; $yr--) {
		$yrs .= '<option value="' . $yr . '"> ' . $yr . ' </option >';
	}
	// populate the select options with dates
	for ($date = 1; $date <= 31; $date++) {
		$dob .= '<option value="' . $date . '"> ' . $date . ' </option >';
	}
	// Populate the select options with month numbers
	for($mes = 1; $mes <=12; $mes++) {
		$mob .= '<option value="'.$mes.'">'.$mes.'</option>';
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Add student</title>
		<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap-reboot.min.css"/>
		<script src="../bower_components/jquery/dist/jquery.min.js"></script>
		<script src="../bower_components/tether/dist/js/tether.min.js"></script>
		<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		
		<!--<script src="../js/jquery-migrate-3.js"></script> 
		-->
		<script src="js/ceteci.js"></script>
		<script src="js/main.js"></script>
		<script>
			function restrict(elem) {
				var tf = _(elem);
				var rx = new RegExp;
				if(elem == "studPNombre") {
					rx = /[0-9.,'"; ]/gi;
					} else if(elem == "studSNombre"){
					rx = /[0-9.,'";]/gi;
					} else if(elem == "studPApellido"){
					rx = /[0-9.,' ";]/gi;
					} else if(elem == "studSApellido"){
					rx = /[0-9.,' ";]/gi;
					} else if(elem == "mobilef"){
					rx = /[^0-9]/gi;
					} else if(elem == "homef"){
					rx = /[^0-9]/gi;
					} else if(elem == "email"){
					rx = /[' "\/]/gi;
					} else if(elem == "domicilio"){
					rx = /['"]/gi;
					} else if(elem == "domicilio2"){
					rx = /['"]/gi;
					} else if(elem == "fracc"){
					rx = /['"]/gi;
					} else if(elem == "municipio"){
					rx = /['"]/gi;
					} else if(elem == "zip"){
					rx = /[^0-9]/gi;
					} else if(elem == "estado"){
					rx = /['"]/gi;
					} else if(elem == "notas"){
					rx = /['"]/gi;
					} else if(elem == "referidopor"){
					rx = /['"]/gi;
					} else if(elem == "cred"){
					rx = /[^a-z0-9]/gi;
					} else if(elem == "cyberhID"){
					rx = /[^a-z0-9]/gi;
					} else if(elem == "cyberhPass"){
					rx = /[^a-z0-9]/gi;
				}
				tf.value = tf.value.replace(rx, "");
			}
		</script>
		
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="stud-form-wapper">
						<form action="php/php_add_student.php" class="form" role="form" method="post" name="addStudFrm" id="addStudFrm">
							<h1 class="form-signin-heading">New student</h1>
							<fieldset>
								<legend>Academic Info</legend>
								<div class="form-group">
									<label class="" for="fechaInicio">Fecha de Inicio</label>
									<input class="form-control mb‐2 mr‐sm‐2" type="date" name="fechaInicio" id="fechaInicio" autofocus required="required"/>
								</div>
								<div class="form-group">
									<label class="" for="schoolID">School *</label>
									<select class="form-control" name="schoolID" id="schoolID" required="required">
										<option value="" disabled selected>--- Select a school ----</option>
                      <?php echo $sclOpt; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="cred" class="control-label">No. Credencial</label>
									<input type="text" class="form-control" name="cred" id="cred" onkeyup="restrict('cred')" placeholder="Key in credential number"/>
									<span class="cred-aviso"></span> <span class="cred-loader"><img src="i/loader.gif" width="18" height="18"/> checking for duplicates...</span>
								</div>
								<div class="form-group">
									<label class="control-label" for="group">Group *</label>
									<select class="form-control" name="groupID" id="groupID" required="required">
										<option value="" selected disabled>--- Select a group ----</option>
                      <?php echo $grpOpt; ?>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label" for="studStatusID">Estatus *</label>
									<select class="form-control" name="studStatusID" id="studStatusID">
										<option value="" selected disabled>--- Select a status ----</option>
                      <?php echo $studStatOpt; ?>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label" for="cyberhID">E-Zone ID</label>
									<input class="form-control" type="text" name="cyberhID" id="cyberhID" onkeyup="restrict('cyberhID')" maxlength="10" placeholder="E-Zone username "/>
								</div>
								<div class="form-group">
									<label class="control-label" for="cyberhPass">E-Zone Password</label>
									<input class="form-control" type="text" name="cyberhPass" id="cyberhPass" onkeyup="restrict('cyberhPass')" maxlength="10" placeholder="E-Zone password"/>
								</div>
							</fieldset>
							<fieldset>
								<legend>Personal Details</legend>
								<div class="form-group">
									<label class="control-label" for="studPNombre">First Name *</label>
									<input class="form-control" onkeyup="restrict('studPNombre')" type="text" name="studPNombre" id="studPNombre" maxlength="30" placeholder="First name" required="required"/>
								</div>
								<div class="form-group">
									<label class="control-label" for="studSNombre">Second Name</label>
									<input class="form-control" onkeyup="restrict('studSNombre')" type="text" name="studSNombre" id="studSNombre" maxlength="30" placeholder="Second name"/>
								</div>
								<div class="form-group">
									<label class="control-label" for="studPApellido">First Surname *</label>
									<input class="form-control" onkeyup="restrict('studPApellido')" type="text" name="studPApellido" id="studPApellido" maxlength="30" placeholder="First surname" required="required"/>
								</div>
								<div class="form-group">
									<label class="" for="studSApellido">Second Surname</label>
									<input class="form-control" onkeyup="restrict('studSApellido')" type="text" name="studSApellido" id="studSApellido" maxlength="30" placeholder="Second surname"/>
								</div>
								<div class="form-group">
									<label class="control-label col-md-5" for="dob">Date of Birth</label>
									<div class="row">
										<div class="col-xs-4 col-md-4 col-lg-4">
											<select name="dob" id="dob" class="form-control">
												<option value="0" selected disabled="disabled">Day</option>
												<?php echo $dob; ?>
											</select>
										</div>
										<div class="col-xs-4 col-md-4 col-lg-4">
											<select name="mob" id="mob" class="form-control">
												<option value="0" selected disabled="disabled">Month</option>
												<?php echo $mob; ?>
											</select>
										</div>
										<div class="col-xs-4 col-md-4 col-lg-4">
											<select name="yob" id="yob" class="form-control">
												<option value="0" selected disabled="disabled">Year</option>
												<?php echo $yrs; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="" for="gender">Gender *</label>
									<div class="radio">
										<input class="" type="radio" name="gender" id="gender" value="1" /> Male
									</div>
									<div class="radio">
										<input class="" type="radio" name="gender" id="gender" value="2" /> Female
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Contact Details</legend>
								<div class="form-group">
									<label class="" for="email">Email</label>
									<input class="form-control" onkeyup="restrict('email')" type="email" name="email" id="email" maxlength="100" placeholder="Email"/>
								</div>
								<div class="form-group">
									<label class="" for="mobilef">Mobile Phone</label>
									<input class="form-control" onkeyup="restrict('mobilef')" type="tel" name="mobilef" id="mobilef" maxlength="10" placeholder="Mobile phone"/>
								</div>
								<div class="form-group">
									<label class="" for="homef">Home Phone</label>
									<input class="form-control" onkeyup="restrict('homef')" type="tel" name="homef" id="homef" maxlength="10" placeholder="Home phone"/>
								</div>
								<div class="form-group">
									<label class="control-label" for="country">Country *</label>
									<select class="form-control" type="text" name="country" id="country" required="required">
										<option value="152" selected>México</option>
                      <?php echo $countryOpt; ?>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label" for="state">State *</label>
									<select class="form-control" name="state" id="state">
										<option value="" selected disabled>--- choose a state -------</option>
                      <?php echo $estadosOpt; ?>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label" for="muni">Municipality *</label>
									<select class="form-control" name="muni" id="muni" required="required">
									</select>
								</div>
								<div class="form-group">
									<label class="control-label" for="asentamiento">Col/Fracc *</label>
									<select name="asentamiento" id="asentamiento" class="form-control" required="required">
									</select>
								</div>
								<div class="form-group">
									<label class="control-label" for="zip">Zip Code *</label>
									<input class="form-control" onkeyup="restrict('zip')" type="number" name="zip" id="zip" maxlength="5" placeholder="Zip code"/>
								</div>
								<div class="form-group">
									<label class="control-label" for="address">Address line 1</label>
									<input class="form-control" type="text" name="address" id="address" maxlength="80" placeholder="Address line 1"/>
								</div>
								<div class="form-group">
									<label class="control-label" for="address2">Address line 2</label>
									<input class="form-control" type="text" name="address2" id="address2" maxlength="80" placeholder="Address line 2" />
								</div>
								<div class="form-group">
									<label class="control-label" for="twitter">Twitter</label>
									<input class="form-control" type="text" name="twitter" id="twitter" placeholder="Twitter username" maxlength="20"/>
								</div>
								<div class="form-group">
									<label for="skype" id="" class="control-label">Skype</label>
									<input type="text" class="form-control" name="skype" id="skype" placeholder="Skype username" maxlength="40"/>
								</div>
								<div class="form-group">
									<label for="notas" id="" class="control-label">Notes</label>
									<textarea class="form-control" name="notas" id="notas" cols="47" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label for="" class="control-label"></label>
									<button class="btn btn-primary btn-lg" id="addStudBtn">Save</button>
								</div>
							</fieldset>
							<span class="msg"></span>
						</form>
						<script src="js/add_student.js"></script>
					</div>
					
				</div>
			</div>
		</div>
	</body>
</html>