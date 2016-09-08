/*jslint browser: true*/
(function ($) {
  "use strict";
  /*global jQuery, document*/
  $(document).on("ready", function () {
    $('#aviso').hide();
    $('#email_msg').hide();

    $('#msgBtn').click(function (event) {
      event.preventDefault();
      var msgnombres = $('#msg_nombres').val(), msgapellidos = $('#msg_apellidos').val(), msgemail = $('#msg_email').val(), msgasunto = $('#msg_asunto').val(), msgmensaje = $('#msg_mensaje').val(), msguserid = $('#msg_userid').val();
      if (msgnombres === "" || msgapellidos === "" || msgemail === "" || msgasunto === "" || msgmensaje === "") {
        $('#aviso').html('<small class="text-danger bg-danger">Los campos con asterisco son obligatorios.</small>').fadeIn(500);
      } else {
        $.ajax({
          url: "ajax/ajax_contacto.php",
          type: "post",
          data: $('#msgFrm').serialize(),
          dataType: "html",
          beforeSend: function () {
            //$('#addLessonBtn').button('loading');
            $('#aviso').html('<img src="i/loader.gif"/>').fadeIn(500);
          }
        })//Ends $.ajax()
          .fail(function () {
            $('#aviso').html('<span style="color:red">Error. Tu mensaje no fué enviado. Inténtalo mas tarde.</span>').fadeIn(500);
          })
          .always(function (what) {
            if (what === 'Mensaje enviado') {
              var formOffset = $('.container').offset(), destination = formOffset.top;
              $(document).scrollTop(destination);
              $('#aviso').html('<span style="color:#37BF37">'+ what +'.<br />Espera una respuesta dentro de 48 horas.</span>').fadeIn(500);
              //$('#addLessonBtn').button('reset');
              clearForm();
            } else {
              $('#aviso').html(what).fadeIn(500);
            }
          });
      }
    }); //Ends #addcursobtn .click()
    $('input').focus(function () {
      $('#aviso').fadeOut(700);
    });
    //Clear form inputs
     function clearForm() {
      $('#msgFrm :input').each( function(){
       $(this).val("");
     });
}
  });// Ends document on.ready function
}(jQuery));