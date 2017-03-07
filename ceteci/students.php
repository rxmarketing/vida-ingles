<?php 
	$db_conx = new mysqli("localhost","ricomx","tiotony","cetec");
	$db_conx->set_charset("utf8");
	if($db_conx->connect_errno) {
		echo "Lo sentimos, este sitio esta teniendo problemas, intentelo mas tarde. <br />";
		//echo "ERRNO: " . $db_conx->connect_errno . "<br />";
		//echo "ERROR: " . $db_conx->connect_error;
		exit;
	}
	include('inc/ceteci_functions.php');
	
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
	
	$lista_estudiantes = null;
	$consulta = "SELECT 
	estudiantes.estud_id
	,escuelas.esc_nombre_corto AS 'Escuela'
	,estudiantes.grupo_id
	,estudiantes.estud_matricula
	,estudiantes.estud_estatus_id
	,estudiantes.estud_pnombre
	,estudiantes.estud_snombre
	,estudiantes.estud_papellido
	,estudiantes.estud_sapellido
	,generos.genero_nombre_corto AS 'Genero'
	,grupos.grupo_clave AS 'Grupo'
	,estudiante_estatuses.estud_estatus_nombre AS 'Estatus'
	,modulos.mod_nivel_id AS 'Level Id'
	,modulo_niveles.modulo_nivel_nombre AS 'Nombre Nivel'
	
	FROM estudiantes 
	
	INNER JOIN escuelas ON escuelas.esc_id = estudiantes.escuela_id
	INNER JOIN generos ON generos.genero_id = estudiantes.genero_id
	INNER JOIN grupos ON grupos.grupo_id = estudiantes.grupo_id
	INNER JOIN estudiante_estatuses ON estudiante_estatuses.estud_estatus_id = estudiantes.estud_estatus_id
	INNER JOIN modulos ON modulos.mod_id = grupos.grupo_actual_modulo_id
	INNER JOIN modulo_niveles ON modulo_niveles.modulo_nivel_id = modulos.mod_nombre_id
	
	ORDER BY  grupo_id DESC";
	
	if (!$sql = $db_conx->prepare($consulta)) {
		echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
		echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
		exit;  
	}
	$sql->execute();
	if(!$resultado = $sql->get_result()) {
		echo "Fallo la fetch_result (" . $db_conx->errno . ") " . $db_conx->error;
		exit;
	}
	while($fila = $resultado->fetch_assoc()) {
		$studid = $fila['estud_id'];
		$matricula = $fila['estud_matricula'];
		$schoolclave = $fila['Escuela'];
		$grupoclave = $fila['Grupo'];
		$levelId = $fila['Level Id'];
		$levelNombre = $fila['Nombre Nivel'];
		$studestatusnombre = $fila['Estatus'];
		$pnombre = $fila['estud_pnombre'];
		$snombre = $fila['estud_snombre'];
		$papellido = $fila['estud_papellido'];
		$sapellido = $fila['estud_sapellido'];
		$studfullname = $pnombre . ' ' . $snombre . ' ' . $papellido . ' ' . $sapellido;
		$generoclave = $fila['Genero'];
		$lista_estudiantes .= '<tr>
		<td>'.$studid.'</td>
		<td>'.$matricula.'</td>
		<td>'.$studfullname.'</td>
		<td>'.$generoclave.'</td>
		<td>'.$schoolclave.'</td>
		<td>'.$grupoclave.'</td>
		<td>'.$levelNombre.'</td>
		<td>'.$studestatusnombre.'</td>
		<td><input type="button" name="view" value="View" id="' . $studid . '" class="btn btn-info btn-xs view-data" /></td>
		<td><input type="button" name="view" value="Edit" id="' . $studid . '" class="btn btn-info btn-xs edit-data" /></td>
		</tr>';
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title>Students</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/cetec.css" />
		<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script src="js/ceteci.js"></script>
    <style type="text/css">
			
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<h1>CETECi Students</h1>
					<div>
						<button class="btn btn-warning" type="button" name="add-stud-btn" id="add-stud-btn" data-toggle="modal" data-target="#add-stud-modal">Add</button>
					</div>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<th>ID</th>
								<th>Matrícula</th>
								<th>Nombre</th>
								<th>Género</th>
								<th>Escuela</th>
								<th>Grupo</th>
								<th>Nivel</th>
								<th>Estatus</th>
								<th colspan="2">Action</th>
							</thead>
							<tbody><?php echo $lista_estudiantes; ?></tbody>
						</table>
					</div>
					
					<!-- View student details modal -->
					<div class="modal fade" id="view-modal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button class="close" type="button" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Student details</h4>
								</div>
								<div class="modal-body" id="student-detail">
									
								</div>
								<div class="modal-footer">
									<button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Add student form modal -->
					<div class="modal fade" id="add-stud-modal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button class="close" type="button" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Add student</h4>
								</div>
								<div class="modal-body" id="add-student">
									<form action="php/php_add_student.php" class="form" role="form" method="post" name="addStudFrm" id="addStudFrm">
										<fieldset>
											<legend>Academic Info</legend>
											<div class="form-group">
												<label class="control-label col-md-4" for="fechaInicio">Fecha de Inicio</label>
												<div class="col-md-6">
													<input class="form-control input-md" type="date" name="fechaInicio" id="fechaInicio" autofocus required="required"/>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="schoolID">School *</label>
												<div class="col-md-6">
													<select class="form-control" name="schoolID" id="schoolID" required="required">
														<option value="" disabled selected>--- Select a school ----</option>
														<?php echo $school_option_list; ?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="cred" class="control-label col-md-4">No. Credencial</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="cred" id="cred" onkeyup="restrict('cred')" placeholder="Key in credential number"/>
													<span class="cred-aviso"></span> <span class="cred-loader"><img src="i/loader.gif" width="18" height="18" maxlength="11"/> checking for duplicates...</span>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="group">Group *</label>
												<div class="col-md-6">
													<select class="form-control" name="groupID" id="groupID" required="required">
														<option value="" selected disabled>--- Select a group ----</option>
														<?php echo groupOptList($db_conx)?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="studStatusID">Estatus *</label>
												<div class="col-md-6">
													<select class="form-control" name="studStatusID" id="studStatusID">
														<option value="" selected disabled>--- Select a status ----</option>
														<?php echo studStatOptList($db_conx) ?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="cyberhID">E-Zone ID</label>
												<div class="col-md-6">
													<input class="form-control" type="text" name="cyberhID" id="cyberhID" onkeyup="restrict('cyberhID')" maxlength="10" placeholder="E-Zone username "/>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="cyberhPass">E-Zone Password</label>
												<div class="col-md-6">
													<input class="form-control" type="text" name="cyberhPass" id="cyberhPass" onkeyup="restrict('cyberhPass')" maxlength="10" placeholder="E-Zone password"/>
												</div>
											</div>
										</fieldset>
										<fieldset>
											<legend>Personal Details</legend>
											<div class="form-group">
												<label class="control-label col-md-4" for="studPNombre">First Name *</label>
												<div class="col-md-6">
													<input class="form-control" onkeyup="restrict('studPNombre')" type="text" name="studPNombre" id="studPNombre" maxlength="30" placeholder="First name" required="required"/>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="studSNombre">Second Name</label>
												<div class="col-md-6">
													<input class="form-control" onkeyup="restrict('studSNombre')" type="text" name="studSNombre" id="studSNombre" maxlength="30" placeholder="Second name"/>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="studPApellido">First Surname *</label>
												<div class="col-md-6">
													<input class="form-control" onkeyup="restrict('studPApellido')" type="text" name="studPApellido" id="studPApellido" maxlength="30" placeholder="First surname" required="required"/>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="studSApellido">Second Surname</label>
												<div class="col-md-6">
													<input class="form-control" onkeyup="restrict('studSApellido')" type="text" name="studSApellido" id="studSApellido" maxlength="30" placeholder="Second surname"/>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="dob">Date of Birth</label>
												<div class="col-md-6">
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
												<label class="control-label col-md-4" for="gender">Gender *</label>
												<div class="col-md-6">
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
												<label class="control-label col-md-4" for="email">Email</label>
												<div class="col-md-6">
													<input class="form-control" onkeyup="restrict('email')" type="email" name="email" id="email" maxlength="100" placeholder="Email"/>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="mobilef">Mobile Phone</label>
												<div class="col-md-6">
													<input class="form-control" onkeyup="restrict('mobilef')" type="tel" name="mobilef" id="mobilef" maxlength="10" onkeyup="restrict('mobilef')" placeholder="Mobile phone"/>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="homef">Home Phone</label>
												<div class="col-md-6">
													<input class="form-control" onkeyup="restrict('homef')" type="tel" name="homef" id="homef" maxlength="10" placeholder="Home phone"/>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="country">Country *</label>
												<div class="col-md-6">
													<select class="form-control" type="text" name="country" id="country" required="required">
														<option value="" disabled selected>--- Choose a country ------</option>
														<?php echo select_countries($db_conx) ?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="state">State *</label>
												<div class="col-md-6">
													<select class="form-control" name="state" id="state">
														<option value="" selected disabled>--- choose a state -------</option>
														<?php echo select_states($db_conx) ?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="muni">Municipality *</label>
												<div class="col-md-6">
													<select class="form-control" name="muni" id="muni" required="required">
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="asentamiento">Col/Fracc *</label>
												<div class="col-md-6">
													<select name="asentamiento" id="asentamiento" class="form-control" required="required">
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="zip">Zip Code *</label>
												<div class="col-md-6">
													<input class="form-control" onkeyup="restrict('zip')" type="zip" name="zip" id="zip" maxlength="5" placeholder="Zip code"/>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="address">Address line 1</label>
												<div class="col-md-6">
													<input class="form-control" type="text" name="address" id="address" maxlength="80" placeholder="Address line 1"/>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="address2">Address line 2</label>
												<div class="col-md-6">
													<input class="form-control" type="text" name="address2" id="address2" maxlength="80" placeholder="Address line 2" />
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="twitter">Twitter</label>
												<div class="col-md-6">
													<input class="form-control" type="text" name="twitter" id="twitter" placeholder="Twitter username" maxlength="20"/>
												</div>
											</div>
											<div class="form-group">
												<label for="skype" id="" class="control-label col-md-4">Skype</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="skype" id="skype" placeholder="Skype username" maxlength="40"/>
												</div>
											</div>
											<div class="form-group">
												<label for="notas" id="" class="control-label col-md-4">Notes</label>
												<div class="col-md-6">
													<textarea class="form-control" name="notas" id="notas" cols="47" rows="3"></textarea>
												</div>
											</div>
											<div class="form-group">
												<label for="" class="control-label col-md-4"></label>
												<div class="col-md-6">
													<button class="btn btn-primary btn-block" id="addStudBtn">Save</button>
												</div>
											</div>
										</fieldset>
										<span class="msg"></span>
									</form>
								</div>
								<div class="modal-footer">
									<button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div><!-- Ends col-md-9 -->
			</div><!-- Ends .row -->
		</div><!-- Ends .container -->
		<script src="js/add_student.js"></script>
	</body>
</html>
<script>  
 $(document).ready(function(){  
    
	});  
</script>