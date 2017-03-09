<?php
	
	/* gather all hours and display them ----------------------------------------------------------------------------- */
	function hours($db_cetec_conx){
		$start_date = "";
		$end_date = "";
		$sel_school = "";
		$sum_hrs = "";
		$total_row = "";
		$gross_pay = "";
		$paycol = "";
		
		//return $tc_list;
	}
	
	
	/* totla hours 
	----------------------------------------------------------------------------- */
	function totalHours($db_cetec_conx){
		setlocale(LC_MONETARY, 'es_MX');
		$start_date = "";
		$end_date = "";
		$sel_school = "";
		$paycol = "";
		$prepaHon = "";
		$start_date = $_POST['startDate'];
		$end_date = $_POST['endDate'];
		$sel_school = $_POST['selSchool'];
		$total_row = "";
		$gross_pay = "";
		$sql = "SELECT SUM(tbl_time_clock.HoursWorked), tbl_groups.groupID, tbl_schools.schoolID FROM tbl_time_clock INNER JOIN tbl_groups ON tbl_groups.groupID = tbl_time_clock.groupID  INNER JOIN tbl_schools ON tbl_schools.schoolID = tbl_groups.schoolID WHERE  tcDate BETWEEN '$start_date' AND '$end_date' AND tbl_schools.schoolID='$sel_school'";
		$sumqry = mysqli_query($db_cetec_conx,$sql);
		if(mysqli_num_rows($sumqry)>0) {
			$sum_row = mysqli_fetch_row($sumqry);
			$sum_hrs = $sum_row[0];
			$gross_pay = number_format($sum_hrs * 33);
			$sumTotalQry = mysqli_query($db_cetec_conx,"SELECT SUM(tbl_time_clock.HoursWorked * tbl_modules.rate_hour) FROM tbl_time_clock INNER JOIN tbl_modules ON tbl_modules.modID = tbl_time_clock.modID INNER JOIN tbl_groups ON tbl_groups.groupID = tbl_time_clock.groupID  INNER JOIN tbl_schools ON tbl_schools.schoolID = tbl_groups.schoolID WHERE tcDate BETWEEN '$start_date' AND '$end_date' AND tbl_schools.schoolID='$sel_school'");
			$paySum = mysqli_fetch_row($sumTotalQry);
			$totalPay = $paySum[0];
			
			$prepaSql = mysqli_query($db_cetec_conx,"SELECT SUM(tbl_time_clock.HoursWorked * tbl_modules.rate_hour), tbl_modules.rate_hour FROM tbl_time_clock INNER JOIN tbl_modules ON tbl_modules.modID = tbl_time_clock.modID INNER JOIN tbl_groups ON tbl_groups.groupID = tbl_time_clock.groupID INNER JOIN tbl_schools ON tbl_schools.schoolID = tbl_groups.schoolID WHERE tcDate BETWEEN '$start_date' AND '$end_date' AND tbl_schools.schoolID = '$sel_school' AND tbl_groups.groupID = '44' ");
			$prepaSum = mysqli_fetch_row($prepaSql);
			$prepaHon = $prepaSum[0];
			$prepaRate = $prepaSum[1];
			$prepaHrs = $prepaHon / $prepaRate;
			$usaSql = mysqli_query($db_cetec_conx,"SELECT SUM(tbl_time_clock.HoursWorked * tbl_modules.rate_hour), tbl_modules.rate_hour FROM tbl_time_clock INNER JOIN tbl_modules ON tbl_modules.modID = tbl_time_clock.modID INNER JOIN tbl_groups ON tbl_groups.groupID = tbl_time_clock.groupID INNER JOIN tbl_schools ON tbl_schools.schoolID = tbl_groups.schoolID WHERE tcDate BETWEEN '$start_date' AND '$end_date' AND tbl_schools.schoolID = '$sel_school' AND tbl_groups.groupID = '43' ");
			$usaSum = mysqli_fetch_row($usaSql);
			$usaHon = $usaSum[0];
			$usaRate = $usaSum[1];
			$usaHrs = $usaHon / $usaRate;
			
			$total_row = '<tr>
			<td colspan="5" style="text-align:right"><b>Total:</b> </td>
			<td><b>'.$sum_hrs.'</b></td>
			<td><b>'.$totalPay.'</b></td>
			</tr><tr>
			<td colspan="2">Hrs Prepa: '.$prepaHrs.' = '.$prepaHon.'</td>
			<td colspan="2">Hrs USA: '.$usaHrs.' = '.$usaHon.'</td>
			<td></td>
			</tr>';
			} else {
			$total_row = '';
		}
		return $total_row;
	}
	
	
	/* select employer option list ----------------------------------------------------------------------------- */
	function employerOptionList($db_cetec_conx) {
		$employer_list = "";
		$sql = "SELECT * FROM tblemployers";
		$employerlist = mysqli_query($db_cetec_conx,$sql);
		while ($row = mysqli_fetch_array($employerlist, MYSQLI_ASSOC)) {
			$emp_id = $row['employerID'];
			$emp_shortname = $row['empShortName'];
			$employer_list .= '<option value="'.$emp_id.'">'.$emp_shortname.'</option>';
		}
		return $employer_list;
	}// Ends employerOptionList function
	
	
	/* group select option list ----------------------------------------------------------------------------- */
	function groupOptList($db_conx) {
		$group_list_opt = "";
		$grupoid = "";
		$consulta = "SELECT * FROM grupos WHERE grupo_estatus_id='5'";
		if(!$sql = $db_conx->prepare($consulta)){
			echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.";
			echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
			exit;    
		}
		$sql->execute();
		if(!$resultado = $sql->get_result()) {
			echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
			echo "Fallo obteniendo los resultados. (" . $db_conx->errno . ") " . $db_conx->error;
			exit;
		}
		while($row = $resultado->fetch_assoc()) {
			$grupoid = $row['grupo_id'];
			$grupoclave = $row['grupo_clave'];
			$grupodias = $row['grupo_dias'];
			$group_list_opt .= '<option value="'.$grupoid .'">'.$grupoclave . ' - ' . $grupodias . '</option>';
		}
		return $group_list_opt;
	}
	
	
	/* module name select option list ----------------------------------------------------------------------------- */
	function modSubCatOptList($db_conx) {
		$mod_name_list = "";
		$consulta = "SELECT * FROM modulo_subcategorias";
		if(!$sql = $db_conx->prepare($consulta)){
			echo "Estamos teniendo problemas, intentalo mas tarde! <br />";
			echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
			exit;
		}
		$sql->execute();
		if(!$resultado = $sql->get_result()){
			echo "Estamos teniendo problemas, intentalo mas tarde! <br />";
			echo "Fallo obteniendo resultados. (" . $db_conx->errno . ") " . $db_conx->error;
			exit;
		}
		while($row = $resultado->fetch_assoc()) {
			$mod_name_id = $row['modulo_subcat_id'];
			$mod_name = $row['modulo_subcat_nombre'];
			$mod_name_list .= '<option value="'.$mod_name_id.'">'.$mod_name.'</option>';
		}
		return $mod_name_list;
	}
	
	
	/* module status select option list ----------------------------------------------------------------------------- */
	function modStatusOptList($db_conx) {
		$mod_status_list = "";
		$consulta = "SELECT * FROM modulo_estatuses";
		if(!$sql = $db_conx->prepare($consulta)){
			echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.";
			echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
			exit;
		}
		$sql->execute();
		if(!$resultado = $sql->get_result()){
			echo "Estamos teniendo problemas, intentalo mas tarde.<br />";
			echo "Fallo obteniendo los resultados. (" . $db_conx->errno . ") " . $db_conx->error;
			exit;
		}
		while($row = $resultado->fetch_assoc()) {
			$mod_status_id = $row['modulo_estatus_id'];
			$mod_status_name = $row['modulo_estatus_nombre'];
			$mod_status_list .= '<option value="'.$mod_status_id.'">'.$mod_status_name.'</option>';
		}
		return $mod_status_list;
	}
	
	
	/* Group status select option list ----------------------------------------------------------------------------- */
	function groupStatusOptList($db_conx) {
		$group_status_list = "";
		$sql = "SELECT * FROM grupo_estatuses";
		$qry = mysqli_query($db_conx,$sql);
		while($row = mysqli_fetch_array($qry,MYSQLI_ASSOC)) {
			$group_status_id = $row['grupo_estatus_id'];
			$group_status_name = $row['grupo_estatus_nombre'];
			$group_status_list .= '<option value="'.$group_status_id.'">'.$group_status_name.'</option>';
		}
		return $group_status_list;
	}
	
	
	/* grupo_categoria select option list ----------------------------------------------------------------------------- */
	function grupoCatOptList($db_conx) {
		$grupo_cat_list = null;
		$consulta = "SELECT * FROM grupo_categorias";
		if(!$sql = $db_conx->prepare($consulta)){
			echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.";
			echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
			exit;
		}
		$sql->execute();
		if(!$resultado = $sql->get_result()) {
			echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
			echo "Fallo obteniendo los resultados. (" . $db_conx->errno . ") " . $db_conx->error;
			exit;
		}
		while($row = $resultado->fetch_assoc()) {
			$grp_cat_id = $row['grupo_cat_id'];
			$grp_cat_name = $row['grupo_cat_nombre'];
			$grupo_cat_list .= '<option value="'. $grp_cat_id .'">'. $grp_cat_name .'</option>';
		}
		return $grupo_cat_list;
	}
	
	
	/* module select option list ----------------------------------------------------------------------------- */
	function moduleOptionList($db_conx){
		$module_name_list = null;
		$consulta = "SELECT modulos.mod_id, grupos.grp_clave, module_names.mod_subcat_name 
		FROM modulos
		INNER JOIN grupos ON grupos.grp_id = modulos.mod_grupo_id 
		INNER JOIN module_names ON module_names.mod_subcat_id = modulos.mod_nombre_id 
		WHERE mod_estatus_id='1'";
		$modulelist = mysqli_query($db_conx,$consulta);
		while ($row = mysqli_fetch_array($modulelist, MYSQLI_ASSOC)) {
			$mod_id = $row['mod_id'];
			$mod_name = $row['mod_subcat_name'];
			$mod_groupID = $row['grp_clave'];
			$module_list .= '<option value="'.$mod_id.'">'.$mod_name.' - ' .$mod_groupID.'</option>';
		}
		return $module_list;    
		
	}
	
	
	/* classroom select option list ----------------------------------------------------------------------------- */
	$classroom_list = "";
	$sql = "SELECT * FROM aulas";
	$classroomlist = mysqli_query($db_conx,$sql);
	while($row = mysqli_fetch_array($classroomlist, MYSQLI_ASSOC)) {
		$room_id = $row['aula_id'];
		$room_name = $row['aula_nombre'];
		$classroom_list .= '<option value="'. $room_id .'">'. $room_name .'</option>';
	}
	
	
	/* student status select option list ----------------------------------------------------------------------------- */
	function studStatOptList($db_conx) {
		$stud_status_option = "";
		$stmt = "SELECT * FROM estudiante_estatuses";
		
		if(!$sql = $db_conx->query($stmt)) {
			echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
			echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
			exit;
		}
		$rowCount = $sql->num_rows;
		if($rowCount > 0) {
			while($row = $sql->fetch_assoc()){
				$stud_status_id = $row['estud_estatus_id'];
				$stud_status_name = $row['estud_estatus_nombre'];
				$stud_status_option .= '<option value="'.$stud_status_id.'">'.$stud_status_name.'</option>';
			}
			} else {
			$stud_status_option .= '<option class="bg-warning text-danger" disabled value="">No existen registros!</option>';
		}
		return $stud_status_option;
	}
	
	
	/* Escuela select option list ----------------------------------------------------------------------------- */
	$school_option_list = "";
	$consulta = "SELECT * FROM escuelas";
	if(!$sql = $db_conx->prepare($consulta)) {
		echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
		echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
		exit;
	}
	$sql->execute();
	if(!$resultado = $sql->get_result()) {
		echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
		echo "Fallo obteniendo los resultados. (" . $db_conx->errno . ") " . $db_conx->error;
	}
	while($row = $resultado->fetch_assoc()){
		$escuelaid = $row['esc_id'];
		$escuelaName = $row['esc_nombre'];
		$school_option_list .= '<option value="'.$escuelaid.'">'.$escuelaName.'</option>';
	}
	
	
	/* populates option list with asentamientos ----------------------------------------------------------------------------- */
	function asent_option_list($db_conx) {
		$asent_list = null;
		$consulta = "SELECT * FROM asentamientos ORDER BY asentamiento_nombre DESC"; 
		if(!$sql = $db_conx->prepare($consulta)) {
			echo "Lo sentimos, estamos teniendo problemas, intentelo mas tarde.";
			echo "Fallo en la preparacion: (" .$db_conx->errno . ") " .$db_conx->error;
			exit;
		}
		$sql->execute();
		if(!$resultado = $sql->get_result()) {
			echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
			echo "Fallo obteniendo los resultados. (" . $db_conx->errno . ") " . $db_conx->error;       
		}
		while($row = $resultado->fetch_assoc()) {
			$asentid = $row['asentamiento_id'];
			$asentnombre = $row['asentamiento_nombre'];
			$asentcp = $row['asentamiento_cp'];
			$asent_list .= '<option value="'. $asentid .'">'. $asentnombre .' ( '.$asentcp.' )'.'</option>';
		}
		return $asent_list;
	}
	
	
	/* Gathers all payments and display them on a table ----------------------------------------------------------------------------- */
	function qryPaymentList($db_cetec_conx) {
		$hon_list = "";
		$sql = "SELECT tblhonorarios.honID, tblhonorarios.honPeriod, tblemployers.empShortName AS 'Employer', tblhonorarios.payeeID, tblhonorarios.honGrossAmount, tblhonorarios.honISR, tblhonorarios.honNetAmount, tblhonorarios.honNotes FROM tblhonorarios INNER JOIN tblemployers ON tblhonorarios.employerID = tblemployers.employerID ORDER BY honPeriod DESC";
		$query = mysqli_query($db_cetec_conx,$sql);
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$hon_id = $row['honID'];
			$hon_date = $row['honPeriod'];
			$hon_period = strftime('%d %b, %Y',strtotime($hon_date));
			$emp_id = $row['Employer'];
			$payee_id = $row['payeeID'];
			$hon_gross = $row['honGrossAmount'];
			$hon_isr = $row['honISR'];
			$isr_percent = $hon_isr / $hon_gross;
			$hon_net = $row['honNetAmount'];
			$hon_notes = $row['honNotes'];
			$hrs_paid = round($hon_gross / 33);
			$hon_list .= '<tr> <td>'.$hon_period.'</td> <td>'.$emp_id.'</td> <td>'.$hon_gross.'</td> <td>'.$hon_isr.'</td> <td>'.$isr_percent.'</td> <td>'.$hon_net.'</td> <td>'.$hrs_paid.'</td> <td>'.$hon_notes.'</td> <td><a href="edit_payment.php?id='.$hon_id.'">Edit</a></td> </tr>';
		}
		return $hon_list;
	}// Ends function qryPaymentList
	
	
	/* Municipality select option list ----------------------------------------------------------------------------- */
	function select_muni($db_conx) {
		$muni_list = "";
		$consulta = "SELECT * FROM municipios";
		if(!$sql = $db_conx->prepare($consulta)) {
			echo "Lo sentimos, estamos teniendo problemas, intentelo mas tarde.";
			echo "Fallo en la preparacion: (" .$db_conx->errno . ") " .$db_conx->error;
			exit;          
		}
		$sql->execute();
		if(!$resultado = $sql->get_result()){
			echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
			echo "Fallo obteniendo los resultados. (" . $db_conx->errno . ") " . $db_conx->error;             
		}
		while($row = $resultado->fetch_assoc()){
			$muniid = $row['muni_id'];
			$muniname = $row['muni_nombre'];
			$muni_list .= '<option value="'.$muniid.'">'.$muniname.'</option>';
		}
		return $muni_list;
	}
	
	
	/* Teacher select option list ----------------------------------------------------------------------------- */
	function select_teacher($db_conx) {
		$teacher_list = "";
		$stmt = "SELECT maes_id, maes_pnombre, maes_snombre, maes_papellido, maes_sapellido FROM maestros";
		if(!$sql = $db_conx->query($stmt)){
			echo "Lo sentimos, estamos teniendo problemas. Intentelo mas tarde. <br>";
			echo $db_conx->errno . ") " . $db_conx->error;
			exit;
		}
		$rowCount = $sql->num_rows;
		if($rowCount > 0){
			while($row = $sql->fetch_assoc()){
				$maesid = $row['maes_id'];
				$maespnombre = $row['maes_pnombre'];
				$maessnombre = $row['maes_snombre'];
				$maespapellido = $row['maes_papellido'];
				$maessapellido = $row['maes_sapellido'];
				$teacher_list .= '<option value="'.$maesid.'">'.$maespapellido. ' '. $maessapellido. ' ' . $maespnombre . ' ' . $maessnombre . '</option>';
			}
			} else {
			$teacher_list .= '<option class="bg-warning text-danger" disabled value="">No existen registros en la tabla maestros!</option>';
		}
		
		return $teacher_list;
	}
	
	
	/* MexStates select option list ---------------------------------------------------------------------------- */
	function select_states($db_conx) {
		$state_list = "";
		$stmt = "SELECT * FROM states";
		if(!$sql = $db_conx->query($stmt)){
			echo "Lo sentimos, estamos teniendo problemas. Intentalo mas tarde.<br>";
			echo "Falló la preparación (" . $db_conx->errno . ") " . $db_conx->error;
			exit;
		}
		$rowCount = $sql->num_rows;
		if($rowCount > 0){
			while($row = $sql->fetch_assoc()) {
				$state_id = $row['estado_id'];
				$state_name = $row['estado_nombre'];
				$state_short_name = $row['estado_abrev'];
				$state_list .='<option value="' . $state_id . '">' .$state_name . '</option>';
			}
			} else {
			$state_list = '<option class="bg-warning text-danger" disabled value="">No existen registros en la tabla estados!</option>';
		}
		return $state_list;
	}
	
	
	/* Paises select option list ---------------------------------------------------------------------------- */
	function select_countries($db_conx) {
		$country_list = null;
		$consulta = "SELECT * FROM countries";
		if(!$sql = $db_conx->prepare($consulta)) {
			echo "Lo sentimos, estamos teniendo problemas, intentelo mas tarde.";
			echo "Fallo en la preparacion: (" .$db_conx->errno . ") " .$db_conx->error;
			exit;
		}
		$sql->execute();
		if(!$resultado = $sql->get_result()){
			echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
			echo "Fallo obteniendo los resultados. (" . $db_conx->errno . ") " . $db_conx->error;              
		}
		while($row = $resultado->fetch_assoc()){
			$countryid = $row['country_id'];
			$countryname = $row['country_name'];
			$country_list .= '<option value="'.$countryid.'">'.$countryname.'</option>';
		}
		return $country_list;
	}
	
	
	/* select module category option list ---------------------------------------------------------------------------- */
	function select_mod_cat($db_conx) {
		$mod_cat_list = null;
		$consulta = "SELECT * FROM modulo_categorias";
		if(!$sql = $db_conx->prepare($consulta)) {
			echo "Lo sentimos, estamos teniendo problemas, intentelo mas tarde.";
			echo "Fallo en la preparacion: (" .$db_conx->errno . ") " .$db_conx->error;
			exit;
		}
		$sql->execute();
		if(!$resultado = $sql->get_result()){
			echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
			echo "Fallo obteniendo los resultados. (" . $db_conx->errno . ") " . $db_conx->error;              
		}
		while($row = $resultado->fetch_assoc()){
			$mod_cat_id = $row['modulo_cat_id'];
			$mod_cat_name = $row['modulo_cat_nombre'];
			$mod_cat_list .= '<option value="'.$mod_cat_id.'">'.$mod_cat_name.'</option>';
		}
		return $mod_cat_list;
	}
?>	