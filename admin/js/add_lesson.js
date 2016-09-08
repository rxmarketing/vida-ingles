/*jslint browser: true*/
(function ($) {
  "use strict";
  /*global jQuery, document*/
  $(document).on("ready", function () {
    $('#aviso').hide();
    $('#email_msg').hide();

    $('#addLessonBtn').click(function (event) {
      event.preventDefault();
      var title = $("#title").val(), cef = $("#cefid").val(), courseid = $('#courseid').val(), categoria = $('#categoriaid').val(), content = $('#content').val();
      if (title === "" || categoriaid === "" || courseid === "" || content === "") {
        $('#aviso').html('<small class="text-danger bg-danger">Los campos con asterisco son obligatorios.</small>').fadeIn(500);
      } else {
        $.ajax({
          url: "ajax/ajax_add_lesson.php",
          type: "post",
          data: $('#frmAddLesson').serialize(),
          dataType: "html",
          beforeSend: function () {
            //$('#addLessonBtn').button('loading');
            $('#aviso').html('<img src="../i/loader.gif"/>').fadeIn(500);
          }
        })//Ends $.ajax()
          .fail(function () {
            $('#aviso').html('<span style="color:red">Leccion NO agregada. Error!!</span>').fadeIn(500);
          })
          .always(function (what) {
            if (what === 'leccion_agregada') {
              var formOffset = $('.container').offset(), destination = formOffset.top;
              $(document).scrollTop(destination);
              $('#aviso').html('<span style="color:#37BF37">Leccion <b><em>"'+title+'"</em></b> a&ntilde;adida.</span>').fadeIn(500);
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
      $('#frmAddLesson :input').each( function(){
       $(this).val("");
     });
}
  });// Ends document on.ready function
}(jQuery));