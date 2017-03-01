/*jslint browser: true*/
(function ($) {
  "use strict";
  /*global jQuery, document*/
  $(document).on("ready", function () {
    $('.aviso').hide();
    $('#addHoursBtn').on('click', function (oo) {
      oo.preventDefault();
      var date = $('#tcDate').val(), week = $('#weekNum').val(), group = $('#groupID').val(), module = $('#moduleID').val(), tcin = $('#tcIN').val(), tcout = $('#tcOUT').val(), hours = $('#hoursWorked').val(), room = $('#classRoom').val(), notes = $('#tcNotes').val(), objectives = $('#tcObjectives').val();
      if (date === "") {
        $('.aviso').addClass("text-danger");
        $('.aviso').html("Selecciona una fecha").fadeIn(700);
        $('#tcDate').addClass('border-danger');
      } else if (week === "") {
        $('.aviso').addClass("text-danger");
        $('.aviso').html("Ingresa el numero de semana del avance").fadeIn(700);
        $('#weekNum').addClass('border-danger');
      } else if (group === "") {
        $('.aviso').addClass("text-danger");
        $('.aviso').html("Selecciona el grupo").fadeIn(700);
        $('#groupID').addClass('border-danger');
      } else if (module === "") {
        $('.aviso').addClass("text-danger");
        $('.aviso').html("Selecciona el modulo").fadeIn(700);
        $('#moduleID').addClass('border-danger');
      } else if (tcin === "") {
        $('.aviso').addClass("text-danger");
        $('.aviso').html("Selecciona hora de entrada").fadeIn(700);
        $('#tcIN').addClass('border-danger');
      } else if (tcout === "") {
        $('.aviso').addClass("text-danger");
        $('.aviso').html("Selecciona hora de salida").fadeIn(700);
        $('#tcOUT').addClass('border-danger');
      } else if (hours === "") {
        $('.aviso').addClass("text-danger");
        $('.aviso').html("Teclea el total de horas").fadeIn(700);
        $('#hoursWorked').addClass('border-danger');
      } else if (room === "") {
        $('.aviso').addClass("text-danger");
        $('.aviso').html("Selecciona el aula").fadeIn(700);
        $('#classRoom').addClass('border-danger');
      } else if (notes === "") {
        $('.aviso').addClass("text-danger");
        $('.aviso').html("Escribe una nota").fadeIn(700);
        $('#tcNotes').addClass('border-danger');
      } else if (objectives === "") {
        $('.aviso').addClass("text-danger");
        $('.aviso').html("Escribe los avances...").fadeIn(700);
        $('#tcObjectives').addClass('border-danger');
      } else {
        $.ajax({
          type: 'post',
          url: 'php/php_add_hours.php',
          data: $('#addHoursFrm').serializeArray(),
          dataType: 'json',
          beforeSend: function () {
          }
        })
          .done(function () {
          })
          .fail(function () {
          //alert(see.mensaje);
          })
          .always(function (resp) {
            alert(resp.mensaje);
          });
      }
    });//Ends addHoursBtn click();
    $('input, select, textarea').focus(function () {
      $('.aviso').fadeOut(700);
      $(this).removeClass('border-danger');
    });
  });
}(jQuery));