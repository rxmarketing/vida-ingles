<?php
	include('inc/db_ceteci_conn.php');
	include('inc/ceteci_functions.php');
	//echo "<pre>";
	//print_r($_POST);
	//echo "</pre>";
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
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		
		<script src="js/main.js"></script>
		<script src="js/ceteci.js"></script>
		<style type="text/css">
			
		</style>
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
			<div class="stud-form-wapper">
				<form action="php/php_add_student.php" class="form-horizontal" role="form" method="post" name="addStudFrm" id="addStudFrm">
					<h1 class="form-signin-heading">New student</h1>
					<fieldset>
						<legend>Academic Info</legend>
						<div class="form-group">
							<label class="control-label col-md-5" for="fechaInicio">Fecha de Inicio</label>
							<div class="col-md-4">
								<input class="form-control input-md" type="date" name="fechaInicio" id="fechaInicio" autofocus required="required"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="schoolID">School *</label>
							<div class="col-md-4">
								<select class="form-control" name="schoolID" id="schoolID" required="required">
									<option value="" disabled selected>--- Select a school ----</option>
									<?php echo $school_option_list; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="cred" class="control-label col-md-5">No. Credencial</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="cred" id="cred" onkeyup="restrict('cred')" placeholder="Key in credential number"/>
								<span class="cred-aviso"></span> <span class="cred-loader"><img src="i/loader.gif" width="18" height="18" maxlength="11"/> checking for duplicates...</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="group">Group *</label>
							<div class="col-md-4">
								<select class="form-control" name="groupID" id="groupID" required="required">
									<option value="" selected disabled>--- Select a group ----</option>
									<?php echo groupOptList($db_conx)?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="studStatusID">Estatus *</label>
							<div class="col-md-4">
								<select class="form-control" name="studStatusID" id="studStatusID">
									<option value="" selected disabled>--- Select a status ----</option>
									<?php echo studStatOptList($db_conx) ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="cyberhID">E-Zone ID</label>
							<div class="col-md-4">
								<input class="form-control" type="text" name="cyberhID" id="cyberhID" onkeyup="restrict('cyberhID')" maxlength="10" placeholder="E-Zone username "/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="cyberhPass">E-Zone Password</label>
							<div class="col-md-4">
								<input class="form-control" type="text" name="cyberhPass" id="cyberhPass" onkeyup="restrict('cyberhPass')" maxlength="10" placeholder="E-Zone password"/>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<legend>Personal Details</legend>
						<div class="form-group">
							<label class="control-label col-md-5" for="studPNombre">First Name *</label>
							<div class="col-md-4">
								<input class="form-control" onkeyup="restrict('studPNombre')" type="text" name="studPNombre" id="studPNombre" maxlength="30" placeholder="First name" required="required"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="studSNombre">Second Name</label>
							<div class="col-md-4">
								<input class="form-control" onkeyup="restrict('studSNombre')" type="text" name="studSNombre" id="studSNombre" maxlength="30" placeholder="Second name"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="studPApellido">First Surname *</label>
							<div class="col-md-4">
								<input class="form-control" onkeyup="restrict('studPApellido')" type="text" name="studPApellido" id="studPApellido" maxlength="30" placeholder="First surname" required="required"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="studSApellido">Second Surname</label>
							<div class="col-md-4">
								<input class="form-control" onkeyup="restrict('studSApellido')" type="text" name="studSApellido" id="studSApellido" maxlength="30" placeholder="Second surname"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="dob">Date of Birth</label>
							<div class="col-md-4">
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
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="gender">Gender *</label>
							<div class="col-md-4">
								<div class="radio">
									<input class="" type="radio" name="gender" id="gender" value="1" /> Male
								</div>
								<div class="radio">
									<input class="" type="radio" name="gender" id="gender" value="2" /> Female
								</div>
								<div class="radio">
									<input class="" type="radio" name="gender" id="gender" value="3" /> Other
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<legend>Contact Details</legend>
						<div class="form-group">
							<label class="control-label col-md-5" for="email">Email</label>
							<div class="col-md-4">
								<input class="form-control" onkeyup="restrict('email')" type="email" name="email" id="email" maxlength="100" placeholder="Email"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="mobilef">Mobile Phone</label>
							<div class="col-md-4">
								<input class="form-control" onkeyup="restrict('mobilef')" type="tel" name="mobilef" id="mobilef" maxlength="10" onkeyup="restrict('mobilef')" placeholder="Mobile phone"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="homef">Home Phone</label>
							<div class="col-md-4">
								<input class="form-control" onkeyup="restrict('homef')" type="tel" name="homef" id="homef" maxlength="10" placeholder="Home phone"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="country">Country *</label>
							<div class="col-md-4">
								<select class="form-control" type="text" name="country" id="country" required="required">
									<option value="" disabled selected>--- Choose a country ------</option>
									<?php echo select_countries($db_conx) ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="state">State *</label>
							<div class="col-md-4">
								<select class="form-control" name="state" id="state">
									<option value="" selected disabled>--- choose a state -------</option>
									<?php echo select_states($db_conx) ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="muni">Municipality *</label>
							<div class="col-md-4">
								<select class="form-control" name="muni" id="muni" required="required">
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="asentamiento">Col/Fracc *</label>
							<div class="col-md-4">
								<select name="asentamiento" id="asentamiento" class="form-control" required="required">
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="zip">Zip Code *</label>
							<div class="col-md-4">
								<input class="form-control" onkeyup="restrict('zip')" type="zip" name="zip" id="zip" maxlength="5" placeholder="Zip code"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="address">Address line 1</label>
							<div class="col-md-4">
								<input class="form-control" type="text" name="address" id="address" maxlength="80" placeholder="Address line 1"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="address2">Address line 2</label>
							<div class="col-md-4">
								<input class="form-control" type="text" name="address2" id="address2" maxlength="80" placeholder="Address line 2" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5" for="twitter">Twitter</label>
							<div class="col-md-4">
								<input class="form-control" type="text" name="twitter" id="twitter" placeholder="Twitter username" maxlength="20"/>
							</div>
						</div>
						<div class="form-group">
							<label for="skype" id="" class="control-label col-md-5">Skype</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="skype" id="skype" placeholder="Skype username" maxlength="40"/>
							</div>
						</div>
						<div class="form-group">
							<label for="notas" id="" class="control-label col-md-5">Notes</label>
							<div class="col-md-4">
								<textarea class="form-control" name="notas" id="notas" cols="47" rows="3"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-md-5"></label>
							<div class="col-md-4">
								<button class="btn btn-primary btn-block" id="addStudBtn">Save</button>
							</div>
						</div>
					</fieldset>
					<span class="msg"></span>
				</form>
				<script src="js/add_student.js"></script>
			</div>
		</div>
	</body>
</html>