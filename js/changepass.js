/*jslint browser: true*/
(function ($) {
  "use strict";
  /*global jQuery, document*/
  $(document).on("ready", function () {
    $('#changepassaviso').hide();
    $('#email_msg').hide();

    $('#btn-changepass').click(function (event) {
      event.preventDefault();
      var newpass = $('#npassword').val(), cpass = $('#cpassword').val();
      if (newpass === "" || cpass === "") {
        $('#changepassaviso').html('<span class="text-danger bg-danger">Completa el formulario</span>').fadeIn(600);
      } else if (newpass !== cpass) {
        $('#changepassaviso').html('<span class="text-danger bg-danger">Las contraseñas no son iguales.</span>').fadeIn(600);
      }
      else {
        $.ajax({
          url: "ajax/ajax_changepass.php",
          type: "post",
          data: $('#changepassFrm').serialize(),
          dataType: "html",
          beforeSend: function () {
            //$('#btn-changepass').button('loading');
            $('#changepassaviso').html('<img src="i/loader.gif"/>').fadeIn(500);
          }
        })//Ends $.ajax()
          .fail(function () {
            alert("Lo siento. No se cambio la contrase&ntilde;a");
          })
          .always(function (what) {
            if (what === 'passchange_success') {
              //var formOffset = $('#formDiv').offset(), 
              //destination = formOffset.top;
             // $(document).scrollTop(destination);
              $('#changepassaviso').html('<span style="color:#37BF37">Has cambiado tu contraseña.</span>').fadeIn(600);
              //$('#btn-changepass').button('reset');
              clearForm();
              //sleep(3);
              window.location = 'login.php';
            } else {
              $('#changepassaviso').html(what).fadeIn(500);

            }
          });
      }
    }); //Ends #btn-changepass .click()
    $('input').focus(function () {
      $('#changepassaviso').fadeOut(700);
    });
    //Clear form inputs
     function clearForm() {
      $('form :input').each( function(){
       $(this).val("");
     });
}
  });// Ends document on.ready function
}(jQuery));