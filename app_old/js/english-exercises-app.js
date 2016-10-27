	$(function(){
		$('.msg').hide();
		$('#checkBtn').click(function(e){
			e.preventDefault();
		
			var ak1 = "My dad has been doing exercise for three months.";
			var ak2 = "Jessica has been looking for her mobile phone all day.";
			var ak3 = "Xiomara and her cat have been sleeping since seven o'clock.";
			var ak4 = "We have been expecting our parents for dinner for too long.";
			var ak5 = "I have been working all day today.";
			var ak6 = "My dad hasn't been doing exersise for three months.";
			var ak7 = "Jessica hasn't been looking for her mobile phone all day.";
			var ak8 = "Xiomara and her cat haven't been sleeping since seven o'clock.";
			var ak9 = "We haven't been expecting our parents for dinner for too long.";
			var ak10 = "I haven't been working all day.";
			var ak11 = "Has my dad been doing exercise for three months?";
			var ak12 = "Yes, he has.";
			var ak13 = "No, he hasn't.";
			var ak14 = "Has Jessica been looking for her mobile phone all day?";
			var ak15 = "Yes, she has.";
			var ak16 = "No, she hasn't.";
			var ak17 = "Have Xiomara and her cat been sleeping since seven o'clock?";
			var ak18 = "Yes, they have.";
			var ak19 = "No, they haven't.";
			var ak20 = "Have we been expecting our parents for dinner for too long?";
			var ak21 = "Yes, we have.";
			var ak22 = "No, we haven't.";
			var ak23 = "Have I been working all day?";
			var ak24 = "Yes, I have";
			var ak25 = "No, I haven't";
			
			var nombre = $('#nombre').val();
			var apellido = $('#apellido').val();
			var q1 = $('#q1').val();
			var q2 = $('#q2').val();
			var q3 = $('#q3').val();
			var q4 = $('#q4').val();
			var q5 = $('#q5').val();
			var q6 = $('#q6').val();
			var q7 = $('#q7').val();
			var q8 = $('#q8').val();
			var q9 = $('#q9').val();
			var q10 = $('#q10').val();
			var q11 = $('#q11').val();
			var q12 = $('#q12').val();
			var q13= $('#q13').val();
			var q14 = $('#q14').val();
			var q15 = $('#q15').val();
			var q16 = $('#q16').val();
			var q17 = $('#q17').val();
			var q18 = $('#q18').val();
			var q19 = $('#q19').val();
			var q20 = $('#q20').val();
			var q21 = $('#q21').val();
			var q22 = $('#q22').val();
			var q23 = $('#q23').val();
			var q24 = $('#q24').val();
			var q25 = $('#q25').val();
			
			if(nombre==""){
				$('.msg').html('Escribe tu primer nombre').fadeIn(400);
			} else if(apellido==""){
				$('.msg').html(nombre+ ' escribe tu primer apellido').fadeIn(400);
			} else if(q1=="" || q2=="" || q3=="" || q4=="" || q5=="" || q6=="" || q7=="" || q8=="" || q9=="" || q10=="" || q11=="" || q12=="" || q13=="" || q14=="" || q15=="" || q16=="" || q17=="" || q18=="" || q19=="" || q20=="" || q21=="" || q22=="" || q23=="" || q24=="" || q25==""){
				$('.msg').html(nombre+" completa el ejercicio").fadeIn(400); 
			} else {
				if(q1==ak1){
					$('#q1').addClass("good");	
				} else {
					$('#q1').addClass("bad");	
				}
				if(q2==ak2){
					$('#q2').addClass("good");	
				} else {
					$('#q2').addClass("bad");	
				}
				if(q3==ak3){
					$('#q3').addClass("good");	
				} else {
					$('#q3').addClass("bad");	
				}
				if(q4==ak4){
					$('#q4').addClass("good");
				} else {
					$('#q4').addClass("bad");
				}
				if(q5==ak5){
					$('#q5').addClass("good");
				} else {
					$('#q5').addClass("bad");
				}
				if(q6==ak6){
					$('#q6').addClass("good");
				} else {
					$('#q6').addClass("bad");
				}
				if(q7==ak7){
					$('#q7').addClass("good");
				} else {
					$('#q7').addClass("bad");
				}
				if(q8==ak8){
					$('#q8').addClass("good");
				} else {
					$('#q8').addClass("bad");
				}
				if(q9==ak9){
					$('#q9').addClass("good");
				} else {
					$('#q9').addClass("bad");
				}
				if(q10==ak10){
					$('#q10').addClass("good");
				} else {
					$('#q10').addClass("bad");
				}
				if(q11==ak11){
					$('#q11').addClass("good");
				} else {
					$('#q11').addClass("bad");
				}
				if(q12==ak12){
					$('#q12').addClass("good");
				} else {
					$('#q12').addClass("bad");
				}
				if(q13==ak13){
					$('#q13').addClass("good");
				} else {
					$('#q13').addClass("bad");
				}
				if(q14==ak14){
					$('#q14').addClass("good");
				} else {
					$('#q14').addClass("bad");
				}
				if(q15==ak15){
					$('#q15').addClass("good");
				} else {
					$('#q15').addClass("bad");
				}
				if(q16==ak16){
					$('#q16').addClass("good");
				} else {
					$('#q16').addClass("bad");
				}
				if(q17==ak17){
					$('#q17').addClass("good");
				} else {
					$('#q17').addClass("bad");
				}
				if(q18==ak18){
					$('#q18').addClass("good");
				} else {
					$('#q18').addClass("bad");
				}
				if(q19==ak19){
					$('#q19').addClass("good");
				} else {
					$('#q19').addClass("bad");
				}
				if(q20==ak20){
					$('#q20').addClass("good");
				} else {
					$('#q20').addClass("bad");
				}
				if(q21==ak21){
					$('#q21').addClass("good");
				} else {
					$('#q21').addClass("bad");
				}
				if(q22==ak22){
					$('#q22').addClass("good");
				} else {
					$('#q22').addClass("bad");
				}
				if(q23==ak23){
					$('#q23').addClass("good");
				} else {
					$('#q23').addClass("bad");
				}
				if(q24==ak24){
					$('#q24').addClass("good");
				} else {
					$('#q24').addClass("bad");
				}
				if(q25==ak25){
					$('#q25').addClass("good");
				} else {
					$('#q25').addClass("bad");
				}
			}
		});// Ends #checkBtn.click()
		
		$('input').focus(function(){
			$('.msg').fadeOut(700);
			$(this).removeClass("bad");
		});
		
	});