$(//add Hours
	function() {
		$('#addHoursDiv').dialog({
			autoOpen:false,
			modal:true,
			title: 'Add Hours',
			width: 490,
			height: 'auto',
			show: {effect: 'clip', duration: 400,},
			hide: {effect: 'clip', duration: 400,},
		});
		
		//addHoursBtn onClick event
		$('#addHoursBtn').on('click',function() {
			$('#addHoursDiv').dialog('open');
			$('#addHoursFrm input[type=text]').val('');
			$('#groupID option[selected]').removeAttr('selected');
			$('#action').val('Add');
		});
		
		$('#loader').hide();
		
		// ON addHoursFrm FORM SUBMIT 
		$('#addHoursFrm').on('submit',function(){
			var timeclock=$(this).serialized();
			$.ajax({
				type: 'POST',
				dataType: "json",
				url: '../hours.php',
				data: 'CETEC='+ $('#action').val() + '&' +timeclock,
				beforeSend: function(){
					$('#loader').show();
					},
				success: function(response){
					if(response.respuesta=="DONE") {
						$('#listHours').html(response.contenido);
						$('#addHoursFrm').dialog('close');
						$('#loader').hide();
					} else {
						alert('Ocurrio un error. Intentalo de nuevo.');
						$('#loader').hide();
					}
				},
				error: function(){
					alert("Servicio no disponible. Try again later.");
					$('#loader').hide();
				}
			})
			return false;
		});
		
		
		//hightlights even rows
		$('.table-data tr:even').addClass('hightlight');
		
		//changes tr bgrnd color on mouseover
		$('.table-data tr').mouseover(function(){
			$(this).addClass('mouseover');
		})
		// removes class mouseover on mouseOut
		$('.table-data tr').mouseout(function(){
			$(this).removeClass('mouseover');
		})
		
	}
	
);















