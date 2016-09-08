/*jslint browser: true*/
(function ($) {
	"use strict";
	/*global jQuery, document*/
	$(document).on("ready", function () {
		$('#aviso').hide();
		$('#paso2').hide();
		
		$('#btn-forgotpass').click(function (event) {
			event.preventDefault();
			var email = $('#email').val();
			if (email === "") {
				$('#aviso').html('<span class="text-danger bg-danger">Escribeee tu correo electr&oacute;nico</span>').fadeIn(600);
				} else {
				$.ajax({
					url: "ajax/ajax_forgotpass.php",
					type: "post",
					data: $('#forgotpassFrm').serialize(),
					dataType: "html",
					beforeSend: function () {
						$('#btn-forgotpass').hide(500);
						//$('#changepassaviso').html('<img src="i/loader.gif"/>').fadeIn(500);
					}
				})//Ends $.ajax()
				.fail(function () {
					alert("Lo siento. Ocurri&oacute; un error. Intentalo mas tarde.");
				})
				.always(function (what) {
					if (what === 'generatetemppass_success') {
						//var formOffset = $('#formDiv').offset(), 
						//destination = formOffset.top;
						// $(document).scrollTop(destination);
						//$('#btn-forgotpass').hide();
						$('#email').hide(300);
						$('#sm_textlogin').hide(300);
						$('#paso1').wrapInner('<s></s>');
						$('#paso2').fadeIn(600);
						clearForm();
						} else {
						$('#aviso').html(what).fadeIn(500);
					}
				});
			}
		}); //Ends #btn-changepass .click()
		$('input').focus(function () {
			$('#aviso').fadeOut(700);
		});
		//Clear form inputs
		function clearForm() {
			$('form :input').each( function(){
				$(this).val("");
			});
		}
	});// Ends document on.ready function
}(jQuery));