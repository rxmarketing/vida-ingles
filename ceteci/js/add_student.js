/*jslint browser: true*/
(function ($) {
  "use strict";
  /*global jQuery, document*/
  $( document ).ready(function() {
		
 /* Check for matricula duplicates
 -------------------------------------------------------------------------------------- */
    $('.cred-aviso').hide();
    $('.cred-loader').hide();
		
    $('#cred').blur(function () {
      var cre = $('#cred').val();
      if (cre !== "") {
        $.ajax({
          type: 'post',
          url: 'php/php_check_credential.php',
          data: 'cred=' + cre,
          //dataType: 'json',
          beforeSend: function () {
            $('.cred-loader').fadeIn(600);
          }
        })
          .done(function () {
            $('.cred-loader').hide();
          })
          .fail(function () {
            alert('Servidor no disponible.');
          })
          .always(function (mens) {
            $('.cred-aviso').html(mens).fadeIn(900);
          });
      }
    });//Ends cred check
		

    $('#cred').focus(function () {
      $('.cred-aviso').fadeOut(900);
    });
		 
		
  });
}(jQuery));