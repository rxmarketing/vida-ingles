/*jslint browser: true*/
(function ($) {
  "use strict";
  /*global jQuery, document*/
  $(document).on("ready", function () {
    $('#msg').hide();
    $('#btn-signin').hide();
		
		// Checks if email exists in the system
		$('#email').blur(function () {
			var loginemail = $('#email').val();
			if (loginemail !== "") {
				$.ajax({
					type: 'post',
					url: 'ajax/ajax_loginemailcheck.php',
					data: 'logem='+ loginemail,
					beforeSend: function() {
						
					}
				}) // Ends $.ajax()
				.always(function (response) {
					if (response === 'email_ok') {
						$('#btn-signin').fadeIn(500);
						} else {
						$('#msg').html('<p class="text-danger bg-danger">'+ response +'</p>').slideDown(600);
					}
				}); // Ends .always()
			}
		}); // ends #email .blur()
		
    $('#btn-signin').click(function (prevent) {
      prevent.preventDefault();
      var e = $('#email').val(), p = $('#password').val();
      if (e === "" || p === "") {
        $('#msg').html('<p class="text-danger bg-danger">Escribe tu correo electr&oacute;nico y contrase&ntilde;a para iniciar sesi&oacute;n</p>').slideDown(500);
      } else {
        $.ajax({
          url: "http://localhost/vidaingles/ajax/ajax_login.php",
          type: "post",
          data: "e=" + e + "&p=" + p,
          dataType: "html",
          beforeSend: function () {
            $('#btn-signin').html('<img src="http://localhost/vidaingles/i/loader.gif"/>');
          }
        }) //Ends $.ajax()
          .fail(function () {
            alert('login failed!');
          })//Ends .fail()
          .always(function (sesion) {
					if (sesion !== 'wrong_pass') {
            window.location = 'http://localhost/vidaingles/usuario/' + sesion;
						} else {
							$('#msg').html('<p class="text-danger bg-danger text-center">Contrase&ntilde;a incorrecta.</p>').fadeIn(700);
            $('#btn-signin').text('Ingresar');
						}
          });//Ends .always()
      }
    }); //Ends btn-login click() function
    $('input').focus(function () {
      $('#msg').slideUp(600);
    });
  });
}(jQuery));