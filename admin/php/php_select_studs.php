<?php 
	include_once("../../inc/db_vidainglescore_conn.php");
	$output = "";
	$stmt = "SELECT * FROM estudiantes ORDER BY estud_id DESC";
	$result = mysqli_query($db_conx, $stmt);
	$output .= '
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Matricula</th>
								<th>Status</th>
								<th>F Name</th>
								<th>S Name</th>
								<th>F Lastname</th>
								<th>S Lastname</th>
								<th>Gender</th>
								<th>Start date</th>
								<th>End date</th>
								<th>Group</th>
								<th>School</th>
								<th>Dia</th>
								<th>Mes</th>
								<th>Año</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Phone</th>
								<th>Pais</th>
								<th>Estado</th>
								<th>Municipio</th>
								<th>Asentamiento</th>
								<th>CP</th>
								<th>Domicilio 1</th>
								<th>Domicilio 2</th>
								<th>Facebook</th>
								<th>Twitter</th>
								<th>YouTube</th>
								<th>Skype</th>
								<th>Cyberh ID</th>
								<th>Cyberh Pass</th>
								<th>Notas</th>
								<th>Action</th>
							</tr>
						</thead>';
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_array($result)){
			$output .= '
							<tr>
								<td>'.$row["estud_id"].'</td>
								<td class="s_matricula" data-id9="'.$row["estud_id"].'" contenteditable>'.$row["estud_matricula"].'</td>
								<td class="s_status" data-id10="'.$row["estud_id"].'" contenteditable>'.$row["estud_status_id"].'</td>
								<td class="p_apellido" data-id1="'.$row["estud_id"].'" contenteditable>'.$row["estud_papellido"].'</td>
								<td class="s_apellido" data-id2="'.$row["estud_id"].'" contenteditable>'.$row["estud_sapellido"].'</td>
								<td class="p_nombre" data-id3="'.$row["estud_id"].'" contenteditable>'.$row["estud_pnombre"].'</td>
								<td class="s_nombre" data-id4="'.$row["estud_id"].'" contenteditable>'.$row["estud_snombre"].'</td>
								<td class="s_genero" data-id5="'.$row["estud_id"].'" contenteditable>'.$row["genero_id"].'</td>
								<td class="s_fechainicio" data-id6="'.$row["estud_id"].'" contenteditable>'.$row["estud_fecha_inicio"].'</td>
								<td class="s_fechafinal" data-id22="'.$row["estud_id"].'" contenteditable>'.$row["estud_fecha_final"].'</td>
								<td class="s_grupo" data-id7="'.$row["estud_id"].'" contenteditable>'.$row["grupo_id"].'</td>
								<td class="s_escuela" data-id8="'.$row["estud_id"].'" contenteditable>'.$row["escuela_id"].'</td>
								<td class="s_ddn" data-id11="'.$row["estud_id"].'" contenteditable>'.$row["estud_ddn"].'</td>
								<td class="s_mdn" data-id12="'.$row["estud_id"].'" contenteditable>'.$row["estud_mdn"].'</td>
								<td class="s_adn" data-id13="'.$row["estud_id"].'" contenteditable>'.$row["estud_adn"].'</td>
								<td class="s_email" data-id14="'.$row["estud_id"].'" contenteditable>'.$row["estud_email"].'</td>
								<td class="s_mobile" data-id15="'.$row["estud_id"].'" contenteditable>'.$row["estud_celular"].'</td>
								<td class="s_phone" data-id16="'.$row["estud_id"].'" contenteditable>'.$row["estud_telefono"].'</td>
								<td class="s_pais" data-id17="'.$row["estud_id"].'" contenteditable>'.$row["pais_id"].'</td>
								<td class="s_estado" data-id18="'.$row["estud_id"].'" contenteditable>'.$row["estado_id"].'</td>
								<td class="s_muni" data-id19="'.$row["estud_id"].'" contenteditable>'.$row["muni_id"].'</td>
								<td class="s_asent" data-id20="'.$row["estud_id"].'" contenteditable>'.$row["asentamiento_id"].'</td>
								<td class="s_cp" data-id21="'.$row["estud_id"].'" contenteditable>'.$row["estud_cp"].'</td>
								<td class="s_dom1" data-id23="'.$row["estud_id"].'" contenteditable>'.$row["estud_domicilio1"].'</td>
								<td class="s_dom2" data-id24="'.$row["estud_id"].'" contenteditable>'.$row["estud_domicilio2"].'</td>
								<td class="s_fb" data-id25="'.$row["estud_id"].'" contenteditable>'.$row["estud_fb_id"].'</td>
								<td class="s_twitter" data-id26="'.$row["estud_id"].'" contenteditable>'.$row["estud_twitter"].'</td>
								<td class="s_youtube" data-id27="'.$row["estud_id"].'" contenteditable>'.$row["estud_youtube"].'</td>
								<td class="s_skype" data-id28="'.$row["estud_id"].'" contenteditable>'.$row["estud_skype"].'</td>
								<td class="s_cyberh_id" data-id29="'.$row["estud_id"].'" contenteditable>'.$row["estud_cyberh_id"].'</td>
								<td class="s_cyberh_pass" data-id30="'.$row["estud_id"].'" contenteditable>'.$row["estud_cyberh_pass"].'</td>
								<td class="s_notas" data-id31="'.$row["estud_id"].'" contenteditable>'.$row["estud_notas"].'</td>
								<td><button name="btn_delete" id="btn_delete" data-id100=""'.$row["estud_id"].'">x</button></td>
							</tr>
						';
		}// ENDS while 
		$output .= '
					<tr>
						<td></td>
						<td id="s_matricula" contenteditable></td>
						<td id="s_status" contenteditable></td>
						<td id="p_apellido" contenteditable></td>
						<td id="s_apellido" contenteditable></td>
						<td id="p_nombre" contenteditable></td>
						<td id="s_nombre" contenteditable></td>
						<td id="s_genero" contenteditable></td>
						<td id="s_fechainicio" contenteditable></td>
						<td id="s_fechafinal" contenteditable></td>
						<td id="s_grupo" contenteditable></td>
						<td id="s_escuela" contenteditable></td>
						<td id="s_ddn" contenteditable></td>
						<td id="s_dmn" contenteditable></td>
						<td id="s_adn" contenteditable></td>
						<td id="s_email" contenteditable></td>
						<td id="s_mobile" contenteditable></td>
						<td id="s_phone" contenteditable></td>
						<td id="s_pais" contenteditable></td>
						<td id="s_estado" contenteditable></td>
						<td id="s_muni" contenteditable></td>
						<td id="s_asent" contenteditable></td>
						<td id="s_cp" contenteditable></td>
						<td id="s_dom1" contenteditable></td>
						<td id="s_dom2" contenteditable></td>
						<td id="s_fb" contenteditable></td>
						<td id="s_twitter" contenteditable></td>
						<td id="s_youtube" contenteditable></td>
						<td id="s_skype" contenteditable></td>
						<td id="s_cyberh_id" contenteditable></td>
						<td id="s_cyberh_pass" contenteditable></td>
						<td id="s_notas" contenteditable></td>
						<td><button name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
					</tr>
				';
		}
		else
		{
			$output .= '<tr>
				<td colspan="25">Data not found</td>
			</tr>';
		}
	$output .= '</table></div>';
	
	echo $output;
			
	
?>