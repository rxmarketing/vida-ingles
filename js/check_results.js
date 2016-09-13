/*jslint browser: true*/
(function ($) {
  "use strict";
  /*global jQuery, document*/
  $(document).on("ready", function () {
    $('#aviso').hide();
    // gathers exercise id and name and username in variables.
    var ejerid = $('#ejerid').val(), loggedUser = $('#logusername').val(), ejernombre = $('#ejerNombre').val();
    $.ajax({
			// gathers answers from database into variables
      url: 'http://localhost/vidaingles/ajax/get_answer_keys.php',
      data: "id=" + ejerid,
      dataType: 'json'
		}) // Ends $.ajax()
		.done(function () {
			// alert('done loading answer keys');
		})
		.error(function () {
			alert("error");
		})
		.always(function (data) {
			var id = data[0], ak1 = data[2], ak2 = data[3], ak3 = data[4], ak4 = data[5], ak5 = data[6], ak6 = data[7], ak7 = data[8], ak8 = data[9], ak9 = data[10], ak10 = data[11], lak1 = ak1.length, lak2 = ak2.length, lak3 = ak3.length, lak4 = ak4.length, lak5 = ak5.length, lak6 = ak6.length, lak7 = ak7.length, lak8 = ak8.length, lak9 = ak9.length, lak10 = ak10.length;
            //console.log(ak1);
			$('input#inputq1').attr({'maxlength': +lak1});
			$('input#inputq2').attr({'maxlength': +lak2});
			$('input#inputq3').attr({'maxlength': +lak3});
			$('input#inputq4').attr({'maxlength': +lak4});
			$('input#inputq5').attr({'maxlength': +lak5});
			$('input#inputq6').attr({'maxlength': +lak6});
			$('input#inputq7').attr({'maxlength': +lak7});
			$('input#inputq8').attr({'maxlength': +lak8});
			$('input#inputq9').attr({'maxlength': +lak9});
			$('input#inputq10').attr({'maxlength': +lak10});
			// Code to run when user clicks the Checar resultados button
			$("#evalEjerBtn").on("click", function (nosub) {
				nosub.preventDefault();
				// gather user's answers in variables
				var uinput1 = $('#inputq1').val(), uinput2 = $('#inputq2').val(), uinput3 = $('#inputq3').val(), uinput4 = $('#inputq4').val(), uinput5 = $('#inputq5').val(), uinput6 = $('#inputq6').val(), uinput7 = $('#inputq7').val(), uinput8 = $('#inputq8').val(), uinput9 = $('#inputq9').val(), uinput10 = $('#inputq10').val(), sugerencias_attr = $('div#sugerencias').attr('style');
				// if input boxes are empty tell them
				if (uinput1 === "" || uinput2 === "" || uinput3 === "" || uinput4 === "" || uinput5 === "" || uinput6 === "" || uinput7 === "" || uinput8 === "" || uinput9 === "" || uinput10 === "") {
					$("#aviso").html('<small class="bg-danger text-danger">' + loggedUser + ' completa el ejercicio</small>').fadeIn(400);
					// if Reglas gramaticales isn't displayed tell them so
          } else if (sugerencias_attr === 'display:none') {
					$('#aviso').html('<small class="text-danger bg-danger">' + loggedUser + ' lee las Reglas Gramaticales</small>').fadeIn(400);
					// if visitor isn't logged in tell them to do so, or register
          } else if (loggedUser == false) {
					$('#aviso').html('<small bg-info text-info><a href="http://localhost/vidaingles/iniciar">inicia sesión</a> para ver resultados. <a href="http://localhost/vidaingles/registrar">Regístrate</a></small>').fadeIn(400);
          } else {
					$.ajax({
						type: 'post',
						url: 'http://localhost/vidaingles/ajax/insert_ejer_results.php',
						data: $('#ejerForm').serializeArray(),
						dataType: 'json',
						beforeSend: function () {
							//$('#evalEjerBtn').button('loading');
							$('#aviso').html('<img src="i/loader.gif"/>').fadeIn(500);
							if (uinput1 !== ak1) {
								$("#inputq1").addClass("wrong-answer");
                } else {
								$("#inputq1").addClass("right-answer", function () {
									$("#inputq1").removeClass("wrong-answer");
								});
							}
							if (uinput2 !== ak2) {
								$('#inputq2').addClass('wrong-answer');
                } else {
								$('#inputq2').addClass('right-answer');
								$("#inputq2").removeClass("wrong-answer");
							}
							if (uinput3 !== ak3) {
								$("#inputq3").addClass("wrong-answer");
                } else {
								$("#inputq3").addClass("right-answer", function () {
									$("#inputq3").removeClass("wrong-answer");
								});
							}
							if (uinput4 !== ak4) {
								$("#inputq4").addClass("wrong-answer");
                } else {
								$("#inputq4").addClass("right-answer", function () {
									$("#inputq4").removeClass("wrong-answer");
								});
							}
							if (uinput5 !== ak5) {
								$("#inputq5").addClass("wrong-answer");
                } else {
								$("#inputq5").addClass("right-answer", function () {
									$("#inputq5").removeClass("wrong-answer");
								});
							}
							if (uinput6 !== ak6) {
								$("#inputq6").addClass("wrong-answer");
                } else {
								$("#inputq6").addClass("right-answer", function () {
									$("#inputq6").removeClass("wrong-answer");
								});
							}
							if (uinput7 !== ak7) {
								$("#inputq7").addClass("wrong-answer");
                } else {
								$("#inputq7").addClass("right-answer", function () {
									$("#inputq7").removeClass("wrong-answer");
								});
							}
							if (uinput8 !== ak8) {
								$("#inputq8").addClass("wrong-answer");
                } else {
								$("#inputq8").addClass("right-answer", function () {
									$("#inputq8").removeClass("wrong-answer");
								});
							}
							if (uinput9 !== ak9) {
								$("#inputq9").addClass("wrong-answer");
                } else {
								$("#inputq9").addClass("right-answer", function () {
									$("#inputq9").removeClass("wrong-answer");
								});
							}
							if (uinput10 !== ak10) {
								$("#inputq10").addClass("wrong-answer");
                } else {
								$("#inputq10").addClass("right-answer", function () {
									$("#inputq10").removeClass("wrong-answer");
								});
							}
						}
					})
					.done(function () {
						
					})
					.fail(function () {
						alert("Something went wrong");
					})
					.always(function (retorno) {
						var maincontentOffset = $('#vi_content').offset(), destination = maincontentOffset.top;
						$(document).scrollTop(destination);
						//alert(retorno.mensaje);
						//$('#evalEjerBtn').button('reset');
						$('#aviso').html('<p>'+ retorno.mensaje +'</p>');
					});
				}
			}); //Ends evalExam on.click()
		});//Ends .always()
    $('.reglas-gramaticales-link').on('click', function (e) {
      e.preventDefault();
      $('.reglas-gramaticales-link').fadeOut(250); //hides Reglas gramaticales link.
      $('#aviso').fadeOut(700); //hides aviso div.
      $('#sugerencias').slideDown(1000); // Displays Reglas Gramaticales div.
		});
    $('input').focus(function () { // trigers even when input has focus.
      $('#aviso').fadeOut(700); // Hides aviso div.
      $(this).removeClass("wrong-answer"); // Removes input red background.
		});
	});// Ends document on.ready function
}(jQuery));