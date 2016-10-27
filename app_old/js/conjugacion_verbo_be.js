/*jslint browser: true*/
(function ($) {
	"use strict";
	/*global jQuery, document*/
	$(document).on("ready", function () {
		$('.msg').hide();
		$('#checkBtn').click(function (e) {
			e.preventDefault();
			//conjugacion verbo be ak
			var ak1 = "I am.", ak2 = "I'm.", ak3 = "You are.", ak4 = "You're.", ak5 = "He is.", ak6 = "He's.", ak7 = "She is.", ak8 = "She's.", ak9 = "It is.", ak10 = "It's.", ak11 = "We are.", ak12 = "We're.", ak13 = "You are.", ak14 = "You're.", ak15 = "They are.", ak16 = "They're.", ak17 = "I am not.", ak18 = "I'm not.", ak19 = "-", ak20 = "You are not.", ak21 = "You're not.", ak22 = "You aren't.", ak23 = "He is not.", ak24 = "He's not.", ak25 = "He isn't.", ak26 = "She is not.", ak27 = "She's not.", ak28 = "She isn't.", ak29 = "It is not.", ak30 = "It's not.", ak31 = "It isn't.", ak32 = "We are not.", ak33 = "We're not.", ak34 = "We aren't.", ak35 = "You are not.", ak36 = "You're not.", ak37 = "You aren't.", ak38 = "They are not.", ak39 = "They're not.", ak40 = "They aren't.", ak41 = "Am I?", ak42 = "Are you?", ak43 = "Is he?", ak44 = "Is she?", ak45 = "Is it?", ak46 = "Are we?", ak47 = "Are you?", ak48 = "Are they?", nombre = $('#nombre').val(), apellido = $('#apellido').val(), q1 = $('#q1').val(), q2 = $('#q2').val(), q3 = $('#q3').val(), q4 = $('#q4').val(), q5 = $('#q5').val(), q6 = $('#q6').val(), q7 = $('#q7').val(), q8 = $('#q8').val(), q9 = $('#q9').val(), q10 = $('#q10').val(), q11 = $('#q11').val(), q12 = $('#q12').val(), q13 = $('#q13').val(), q14 = $('#q14').val(), q15 = $('#q15').val(), q16 = $('#q16').val(), q17 = $('#q17').val(), q18 = $('#q18').val(), q19 = $('#q19').val(), q20 = $('#q20').val(), q21 = $('#q21').val(), q22 = $('#q22').val(), q23 = $('#q23').val(), q24 = $('#q24').val(), q25 = $('#q25').val(), q26 = $('#q26').val(), q27 = $('#q27').val(), q28 = $('#q28').val(), q29 = $('#q29').val(), q30 = $('#q30').val(), q31 = $('#q31').val(), q32 = $('#q32').val(), q33 = $('#q33').val(), q34 = $('#q34').val(), q35 = $('#q35').val(), q36 = $('#q36').val(), q37 = $('#q37').val(), q38 = $('#q38').val(), q39 = $('#q39').val(), q40 = $('#q40').val(), q41 = $('#q41').val(), q42 = $('#q42').val(), q43 = $('#q43').val(), q44 = $('#q44').val(), q45 = $('#q45').val(), q46 = $('#q46').val(), q47 = $('#q47').val(), q48 = $('#q48').val(), checkedValue = $('[name="optionsRadios"]:checked').val(), reglas_gramaticales_attr = $('div#sugerencias').attr('style');
			if (nombre === "") {
				$('.msg').html('Escribe tu primer nombre').fadeIn(400);
				} else if (apellido === "") {
				$('.msg').html(nombre + ' escribe tu primer apellido').fadeIn(400);
				} else if (q1 === "" || q2 === "" || q3 === "" || q4 === "" || q5 === "" || q6 === "" || q7 === "" || q8 === "" || q9 === "" || q10 === "" || q11 === "" || q12 === "" || q13 === "" || q14 === "" || q15 === "" || q16 === "" || q17 === "" || q18 === "" || q19 === "" || q20 === "" || q21 === "" || q22 === "" || q23 === "" || q24 === "" || q25 === "") {
				$('.msg').html(nombre + " completa el ejercicio").fadeIn(400);
				} else if (checkedValue === "") {
				$('.msg').html('Checa si te ayud&oacute; o no este ejercicio').fadeIn(400);
				} else if (reglas_gramaticales_attr === 'display:none') {
				$('.msg').html('<small class="text-danger bg-danger">' + nombre + ' lee las Reglas Gramaticales</small>').fadeIn(400);
				} else {
				if (q1 === ak1) {
					$('#q1').addClass("good");
					} else {
					$('#q1').addClass("bad");
				}
				if (q2 === ak2) {
					$('#q2').addClass("good");
					} else {
					$('#q2').addClass("bad");
				}
				if (q3 === ak3) {
					$('#q3').addClass("good");
					} else {
					$('#q3').addClass("bad");
				}
				if (q4 === ak4) {
					$('#q4').addClass("good");
					} else {
					$('#q4').addClass("bad");
				}
				if (q5 === ak5) {
					$('#q5').addClass("good");
					} else {
					$('#q5').addClass("bad");
				}
				if (q6 === ak6) {
					$('#q6').addClass("good");
					} else {
					$('#q6').addClass("bad");
				}
				if (q7 === ak7) {
					$('#q7').addClass("good");
					} else {
					$('#q7').addClass("bad");
				}
				if (q8 === ak8) {
					$('#q8').addClass("good");
					} else {
					$('#q8').addClass("bad");
				}
				if (q9 === ak9) {
					$('#q9').addClass("good");
					} else {
					$('#q9').addClass("bad");
				}
				if (q10 === ak10) {
					$('#q10').addClass("good");
					} else {
					$('#q10').addClass("bad");
				}
				if (q11 === ak11) {
					$('#q11').addClass("good");
					} else {
					$('#q11').addClass("bad");
				}
				if (q12 === ak12) {
					$('#q12').addClass("good");
					} else {
					$('#q12').addClass("bad");
				}
				if (q13 === ak13) {
					$('#q13').addClass("good");
					} else {
					$('#q13').addClass("bad");
				}
				if (q14 === ak14) {
					$('#q14').addClass("good");
					} else {
					$('#q14').addClass("bad");
				}
				if (q15 === ak15) {
					$('#q15').addClass("good");
					} else {
					$('#q15').addClass("bad");
				}
				if (q16 === ak16) {
					$('#q16').addClass("good");
					} else {
					$('#q16').addClass("bad");
				}
				if (q17 === ak17) {
					$('#q17').addClass("good");
					} else {
					$('#q17').addClass("bad");
				}
				if (q18 === ak18) {
					$('#q18').addClass("good");
					} else {
					$('#q18').addClass("bad");
				}
				if (q19 === ak19) {
					$('#q19').addClass("good");
					} else {
					$('#q19').addClass("bad");
				}
				if (q20 === ak20) {
					$('#q20').addClass("good");
					} else {
					$('#q20').addClass("bad");
				}
				if (q21 === ak21) {
					$('#q21').addClass("good");
					} else {
					$('#q21').addClass("bad");
				}
				if (q22 === ak22) {
					$('#q22').addClass("good");
					} else {
					$('#q22').addClass("bad");
				}
				if (q23 === ak23) {
					$('#q23').addClass("good");
					} else {
					$('#q23').addClass("bad");
				}
				if (q24 === ak24) {
					$('#q24').addClass("good");
					} else {
					$('#q24').addClass("bad");
				}
				if (q25 === ak25) {
					$('#q25').addClass("good");
					} else {
					$('#q25').addClass("bad");
				}
				if (q26 === ak26) {
					$('#q26').addClass("good");
					} else {
					$('#q26').addClass("bad");
				}
				if (q27 === ak27) {
					$('#q27').addClass("good");
					} else {
					$('#q27').addClass("bad");
				}
				if (q28 === ak28) {
					$('#q28').addClass("good");
					} else {
					$('#q28').addClass("bad");
				}
				if (q29 === ak29) {
					$('#q29').addClass("good");
					} else {
					$('#q29').addClass("bad");
				}
				if (q30 === ak30) {
					$('#q30').addClass("good");
					} else {
					$('#q30').addClass("bad");
				}
				if (q31 === ak31) {
					$('#q31').addClass("good");
					} else {
					$('#q31').addClass("bad");
				}
				if (q32 === ak32) {
					$('#q32').addClass("good");
					} else {
					$('#q32').addClass("bad");
				}
				if (q33 === ak33) {
					$('#q33').addClass("good");
					} else {
					$('#q33').addClass("bad");
				}
				if (q34 === ak34) {
					$('#q34').addClass("good");
					} else {
					$('#q34').addClass("bad");
				}
				if (q35 === ak35) {
					$('#q35').addClass("good");
					} else {
					$('#q35').addClass("bad");
				}
				if (q36 === ak36) {
					$('#q36').addClass("good");
					} else {
					$('#q36').addClass("bad");
				}
				if (q37 === ak37) {
					$('#q37').addClass("good");
					} else {
					$('#q37').addClass("bad");
				}
				if (q38 === ak38) {
					$('#q38').addClass("good");
					} else {
					$('#q38').addClass("bad");
				}
				if (q39 === ak39) {
					$('#q39').addClass("good");
					} else {
					$('#q39').addClass("bad");
				}
				if (q40 === ak40) {
					$('#q40').addClass("good");
					} else {
					$('#q40').addClass("bad");
				}
				if (q41 === ak41) {
					$('#q41').addClass("good");
					} else {
					$('#q41').addClass("bad");
				}
				if (q42 === ak42) {
					$('#q42').addClass("good");
					} else {
					$('#q42').addClass("bad");
				}
				if (q43 === ak43) {
					$('#q43').addClass("good");
					} else {
					$('#q43').addClass("bad");
				}
				if (q44 === ak44) {
					$('#q44').addClass("good");
					} else {
					$('#q44').addClass("bad");
				}
				if (q45 === ak45) {
					$('#q45').addClass("good");
					} else {
					$('#q45').addClass("bad");
				}
				if (q46 === ak46) {
					$('#q46').addClass("good");
					} else {
					$('#q46').addClass("bad");
				}
				if (q47 === ak47) {
					$('#q47').addClass("good");
					} else {
					$('#q47').addClass("bad");
				}
				if (q48 === ak48) {
					$('#q48').addClass("good");
					} else {
					$('#q48').addClass("bad");
				}
			}
		});// Ends #checkBtn.click()
		$('input').focus(function () {
			$('.msg').fadeOut(700);
			$(this).removeClass("bad");
		});
		$('.reglas-gramaticales-link').on('click', function (e) {
      e.preventDefault();
      $('.reglas-gramaticales-link').fadeOut(250); //hides Reglas gramaticales link.
      $('.msg').fadeOut(700); //hides msg div.
      $('#sugerencias').slideDown(1000); // Displays Reglas Gramaticales div.
		});
	});
}(jQuery));