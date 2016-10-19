<?php
    include('../inc/db_vidainglescore_conn.php');
  
	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Add student live table</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
      
        <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
       
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
				<div class="table-responsive">
					<h3>Add, edit, delete student</h3>
					<div id="live_data"></div>
				
				</div>
				
				
	
			</div>
		</div>
	</body>
</html>
<script>
	$(document).ready(function() {
		function fetch_data(){
			$.ajax({
				url: "php/php_select_studs.php",
				method: "POST",
				success: function(data){
					$('#live_data').html(data);
				}
				
			});
		}
		fetch_data();
		
		$(document).on('click', '#btn_add', function(){
			var s_matricula = $('#s_matricula').text();
			var s_status = $('#s_status').text();
			var p_apellido = $('#p_apellido').text();
			var s_apellido = $('#s_apellido').text();
			var p_nombre = $('#p_nombre').text();
			var s_nombre = $('#s_nombre').text();
			var s_genero = $('#s_genero').text();
			var s_fechainicio = $('#s_fechainicio').text();
			var s_fechafinal = $('#s_fechafinal').text();
			var s_grupo = $('#s_grupo').text();
			var s_escuela = $('#s_escuela').text();
			var s_ddn = $('#s_ddn').text();
			var s_mdn = $('#s_mdn').text();
			var s_adn = $('#s_adn').text();
			var s_email = $('#s_email').text();
			var s_mobile = $('#s_mobile').text();
			var s_phone = $('#s_phone').text();
			var s_pais = $('#s_pais').text();
			var s_estado = $('#s_estado').text();
			var s_muni = $('#s_muni').text();
			var s_asent = $('#s_asent').text();
			var s_cp = $('#s_cp').text();
			var s_dom1 = $('#s_dom1').text();
			var s_dom2 = $('#s_dom2').text();
			var s_fb = $('#s_fb').text();
			var s_twitter = $('#s_twitter').text();
			var s_youtube = $('#s_youtube').text();
			var s_skype = $('#s_skype').text();
			var s_notas = $('#s_notas').text();
			var s_cyberh_id = $('#s_cyberh_id').text();
			var s_cyberh_pass = $('#s_cyberh_pass').text();
			//alert(p_apellido + s_apellido + p_nombre + s_nombre + s_genero + s_fechainicio + s_grupo + s_escuela)
			//exit();
			
			if(p_apellido == ''|| s_apellido == '' || p_nombre == '' || s_genero == '' || s_fechainicio == '' || s_grupo == '' || s_escuela == ''){
				alert("jQuery: Todos los campos son obligatorios");
				return false;
			}
			$.ajax({
				url:"php/php_insert_live_stud_data.php",
				method: "POST",
				data: {
						s_matricula:s_matricula,
						s_status:s_status,
						p_apellido:p_apellido,
						s_apellido:s_apellido,
						p_nombre:p_nombre,
						s_nombre:s_nombre,
						s_genero:s_genero,
						s_fechainicio:s_fechainicio,
						s_fechafinal:s_fechafinal,
						s_grupo:s_grupo,
						s_escuela:s_escuela,
						s_ddn:s_ddn,
						s_mdn:s_mdn,
						s_adn:s_adn,
						s_email:s_email,
						s_mobile:s_mobile,
						s_phone:s_phone,
						s_pais:s_pais,
						s_estado:s_estado,
						s_muni:s_muni,
						s_asent:s_asent,
						s_cp:s_cp,
						s_dom1:s_dom1,
						s_dom2:s_dom2,
						s_fb:s_fb,
						s_twitter:s_twitter,
						s_youtube:s_youtube,
						s_skype:s_skype,
						s_notas:s_notas,
						s_cyberh_id:s_cyberh_id,
						s_cyberh_pass:s_cyberh_pass
					},
				dataType: "text",
				success: function(data){
					alert(data);
					fetch_data();
				}
			});
		});
		
		// LIVE EDIT STUDENT
		function live_edit_stud(id, text, column_name){
			$.ajax({
				url: "php/php_live_edit_stud_data.php",
				method: "POST",
				data: {
						id:id,
						text: text,
						column_name:column_name
				},
				dataType: "text",
				success: function(data){
					alert(data);
				}
			
			});
		}
		
		$(document).on('blur', '.p_apellido',function(){
			var id = $(this).data("id1");
			var p_apellido = $(this).text();
			live_edit_stud(id, p_apellido, "estud_papellido")
		});
		
		$(document).on('blur', '.s_apellido',function(){
			var id = $(this).data("id2");
			var s_apellido = $(this).text();
			live_edit_stud(id, s_apellido, "estud_sapellido")
		});
		
		$(document).on('blur', '.p_nombre',function(){
			var id = $(this).data("id3");
			var p_nombre = $(this).text();
			live_edit_stud(id, p_nombre, "estud_pnombre")
		});
		
		$(document).on('blur', '.s_nombre',function(){
			var id = $(this).data("id4");
			var s_nombre = $(this).text();
			live_edit_stud(id, s_nombre, "estud_snombre")
		});
		
		$(document).on('blur', '.s_genero',function(){
			var id = $(this).data("id5");
			var s_genero = $(this).text();
			live_edit_stud(id, s_genero, "genero_id")
		});
		
		$(document).on('blur', '.s_fechainicio',function(){
			var id = $(this).data("id6");
			var s_fechainicio = $(this).text();
			live_edit_stud(id, s_fechainicio, "estud_fecha_inicio")
		});
		
		$(document).on('blur', '.s_grupo',function(){
			var id = $(this).data("id7");
			var s_grupo = $(this).text();
			live_edit_stud(id, s_grupo, "grupo_id")
		});
		
		$(document).on('blur', '.s_escuela',function(){
			var id = $(this).data("id8");
			var s_escuela = $(this).text();
			live_edit_stud(id, s_escuela, "escuela_id")
		});
		
		$(document).on('blur', '.s_matricula',function(){
			var id = $(this).data("id9");
			var s_matricula = $(this).text();
			live_edit_stud(id, s_matricula, "estud_matricula")
		});
		
		$(document).on('blur', '.s_status',function(){
			var id = $(this).data("id10");
			var s_status = $(this).text();
			live_edit_stud(id, s_status, "estud_status_id")
		});
		
		$(document).on('blur', '.s_ddn',function(){
			var id = $(this).data("id11");
			var s_ddn = $(this).text();
			live_edit_stud(id, s_ddn, "estud_ddn")
		});
		
		$(document).on('blur', '.s_mdn',function(){
			var id = $(this).data("id12");
			var s_mdn = $(this).text();
			live_edit_stud(id, s_mdn, "estud_mdn")
		});
		
		$(document).on('blur', '.s_adn',function(){
			var id = $(this).data("id13");
			var s_adn = $(this).text();
			live_edit_stud(id, s_adn, "estud_adn")
		});
		
		$(document).on('blur', '.s_email',function(){
			var id = $(this).data("id14");
			var s_email = $(this).text();
			live_edit_stud(id, s_email, "estud_email")
		});
		
		$(document).on('blur', '.s_mobile',function(){
			var id = $(this).data("id15");
			var s_mobile = $(this).text();
			live_edit_stud(id, s_mobile, "estud_celular")
		});
		
		$(document).on('blur', '.s_phone',function(){
			var id = $(this).data("id16");
			var s_phone = $(this).text();
			live_edit_stud(id, s_phone, "estud_telefono")
		});
		
		$(document).on('blur', '.s_pais',function(){
			var id = $(this).data("id17");
			var s_pais = $(this).text();
			live_edit_stud(id, s_pais, "pais_id")
		});
		
		$(document).on('blur', '.s_estado',function(){
			var id = $(this).data("id18");
			var s_estado = $(this).text();
			live_edit_stud(id, s_estado, "estado_id")
		});
		
		$(document).on('blur', '.s_muni',function(){
			var id = $(this).data("id19");
			var s_muni = $(this).text();
			live_edit_stud(id, s_muni, "muni_id")
		});
		
		$(document).on('blur', '.s_asent',function(){
			var id = $(this).data("id20");
			var s_asent = $(this).text();
			live_edit_stud(id, s_asent, "asentamiento_id")
		});
		
		$(document).on('blur', '.s_cp',function(){
			var id = $(this).data("id21");
			var s_cp = $(this).text();
			live_edit_stud(id, s_cp, "estud_cp")
		});
		
		$(document).on('blur', '.s_fechafinal',function(){
			var id = $(this).data("id22");
			var s_fechafinal = $(this).text();
			live_edit_stud(id, s_fechafinal, "estud_fecha_final")
		});
		
		$(document).on('blur', '.s_dom1',function(){
			var id = $(this).data("id23");
			var s_dom1 = $(this).text();
			live_edit_stud(id, s_dom1, "estud_domicilio1")
		});
		
		$(document).on('blur', '.s_dom2',function(){
			var id = $(this).data("id24");
			var s_dom2 = $(this).text();
			live_edit_stud(id, s_dom2, "estud_domicilio2")
		});
		
	});
</script>