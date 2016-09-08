/*jslint browser: true*/
(function ($) {
  "use strict";
  /*global jQuery, document*/
  $(document).on("ready", function () {
    $('#aviso').hide();
    $('#email_msg').hide();

    $('#addExerBtn').click(function (event) {
      event.preventDefault();
      var lessonid = $("#lessonid").val(), ejername = $("#ejerName").val(), ejerinstr = $('#ejerInstr').val(), ejerq1 = $('#ejerq1').val(), ak1 = $('#ak1').val(), ejerq2 = $('#ejerq2').val(), ak2 = $('#ak2').val(), ejerq3 = $('#ejerq3').val(), ak3 = $('#ak3').val(), ejerq4 = $('#ejerq4').val(), ak4 = $('#ak4').val(), ejerq5 = $('#ejerq5').val(), ak5 = $('#ak5').val(), ejerq6 = $('#ejerq6').val(), ak6 = $('#ak6').val(), ejerq7 = $('#ejerq7').val(), ak7 = $('#ak7').val(), ejerq8 = $('#ejerq8').val(), ak8 = $('#ak8').val(), ejerq9 = $('#ejerq9').val(), ak9 = $('#ak9').val(), ejerq10 = $('#ejerq10').val(), ak10 = $('#ak10').val();
      if (lessonid === "" || ejername === "" || ejerinstr === "" || ejerq1 === "" || ak1 === "" || ejerq2 === "" || ak2 === "" || ejerq3 === "" || ak3 === "" || ejerq4 === "" || ak4 === "" || ejerq5 === "" || ak5 === "" || ejerq6 === "" || ak6 === "" || ejerq7 === "" || ak7 === "" || ejerq8 === "" || ak8 === "" || ejerq9 === "" || ak9 === "" || ejerq10 === "" || ak10 === "") {
        $('#aviso').html('<small class="text-danger bg-danger">Los campos con asterisco son obligatorios.</small>').fadeIn(500);
      } else {
        $.ajax({
          url: "ajax/ajax_add_exercise.php",
          type: "post",
          data: $('#addExerciseFrm').serialize(),
          dataType: "html",
          beforeSend: function () {
            //$('#addLessonBtn').button('loading');
            $('#aviso').html('<img src="../i/loader.gif"/>').fadeIn(500);
          }
        })//Ends $.ajax()
          .fail(function () {
            $('#aviso').html('<span style="color:red">Ejercicio NO agregado. Error!!</span>').fadeIn(500);
          })
          .always(function (what) {
            if (what === 'ejercicio_agregado') {
              var formOffset = $('.container').offset(), destination = formOffset.top;
              $(document).scrollTop(destination);
              $('#aviso').html('<span style="color:#37BF37">Ejercicio <b><em>"'+ ejername +'"</em></b> añadido.</span>').fadeIn(500);
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
      $('#addExerciseFrm :input').each( function(){
       $(this).val("");
     });
}
  });// Ends document on.ready function
}(jQuery));