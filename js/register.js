/*jslint browser: true*/
(function ($) {
  "use strict";
  /*global jQuery, document*/
  $(document).on("ready", function () {
    $('#aviso').hide();
    $('#email_msg').hide();
    // Ajax code checks for username duplicates
    $('#username').blur(function () {
      var un = $('#username').val();
      if (un !== "") {
        $.ajax({
          type: "post",
          url: "register.php",
          data: "usernamecheck=" + un,
          beforeSend: function () {
            $('#unamestatus').html('<div>checando... <img src="i/loader.gif"/></div>');
          }
        })
          .fail(function () {
            alert("El servidor no esta disponible. Intentalo mas tarde.");
          })
          .always(function (resp) {
            $('#unamestatus').html(resp);
          });
      }
    }); //Ends .blur()    
    function email_validation(vemail) {
      $.post('ajax/email_validation.php', { email: vemail}, function (data) {
        $('#email_msg').html(data);
      });
    }
    $('#email').focusin(function () {
      if ($('#email').val() === "") {
        $('#email_msg').html('<div class="bg-danger text-danger">Escribe un correo electrónico válido</div>').slideDown(600);
      } else {
        email_validation($('#email').val());
      }
    })//ends focusin
    .blur(function () {
      //$('#email_msg').hide(800);
    })//ends blur
    .keyup(function () {
      email_validation($('#email').val());
    }); //ends keyup
    $('#signupbtn').click(function (event) {
      event.preventDefault();
      var u = $("#username").val(), e = $("#email").val(), p1 = $('#pass1').val(), p2 = $("#pass2").val(), c = $("#country").val(), g = $("#gender").val(), terms = $('#terms').attr("style");
      if (u === "" || e === "" || p1 === "" || p2 === "" || c === "" || g === "") {
        $('#aviso').html('<small class="text-danger bg-danger">Completa el formulario</small>').fadeIn(500);
      } else if (p1 !== p2) {
        $('#aviso').html('<small class="text-danger bg-danger">Las contraseñas no son iguales</small>').fadeIn(500);
      } else if (terms === "display:none") {
        $('#aviso').html('<small class="bg-danger text-danger">Lee los Términos y Condiciones</small>').fadeIn(500);
      } else {
        $.ajax({
          url: "register.php",
          type: "post",
          data: $('#signupform').serialize(),
          dataType: "html",
          beforeSend: function () {
            $('#signupbtn').button('loading');
            $('#aviso').html('<img src="i/loader.gif"/>').fadeIn(500);
          }
        })//Ends $.ajax
          .fail(function () {
            alert("User registration failed!");
          })
          .always(function (what) {
            if (what === 'register_success') {
              var formOffset = $('#formDiv').offset(), destination = formOffset.top;
              $(document).scrollTop(destination);
              $('#formDiv').html('<div class="bg-warning text-warning vi-warning"><h3>OK ' + u + ',</h3><p>Revisa tu Bandeja de entrada o Correo no deseado en <b>' + e + '</b> para completar tu registro y activar tu cuenta ahora mismo.</p><p> No podrás disfrutar los beneficios si no acitvas tu cuenta.</p>').fadeIn(500);
            } else {
              $('#aviso').html(what).fadeIn(500);
              $('#signupbtn').button('reset');
            }
          });
      }
    }); //Ends #signupbtn .click()
    $('input, select').focus(function () {
      $('#aviso').fadeOut(700);
    });
    $('#username').bind('keyup', function () {
    }).bind('blur', function () {
      var pattern = new RegExp('[^a-z0-9]+', 'gi'), $input = $(this), value = $input.val();
      value = value.replace(pattern, '');
      $input.val(value);
    });
    $('.termsLink').on('click', function (e) {
      e.preventDefault();
      $('.termsLink').fadeOut(250);
      $('#aviso').fadeOut(700);
      $('#terms').slideDown(800);
    });//Ends #terms .on(click)
  });// Ends document on.ready function
}(jQuery));