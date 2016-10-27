/*jslint browser: true*/
(function ($) {
    "use strict";
    /*global jQuery, document*/
    $(document).on("ready", function () {
        $('.msg').hide();
        $('#checkBtn').click(function (e) {
            e.preventDefault();
            //be allowed to Exercise
            var ak1 = "Christina is allowed to do her homework at night.", ak2 = "John is allowed to ride his new bike at night.", ak3 = "My cat is allowed to go outside the house.", ak4 = "My sister and I are allowed to swim in the sea.", ak5 = "We are allowed to hang out at the school cafeteria.", ak6 = "Christina isn't allowed to do her homework at night.", ak7 = "John isn't allowed to ride his new bike at night.", ak8 = "My cat isn't allowed to go outside the house.", ak9 = "My sister and I aren't allowed to swim in the sea.", ak10 = "We aren't allowed to hang out at the school cafeteria.", ak11 = "Is Christina allowed to do her homework at night?", ak12 = "Yes, she is.", ak13 = "No, she isn't.", ak14 = "Is John allowed to ride his new bike at night?", ak15 = "Yes, he is.", ak16 = "No, he isn't.", ak17 = "Is my cat allowed to go outside the house?", ak18 = "Yes, it is.", ak19 = "No, it isn't.", ak20 = "Are my sister and I allowed to swim in the sea?", ak21 = "Yes, we are.", ak22 = "No, we aren't.", ak23 = "Are we allowed to hang out at the school cafeteria?", ak24 = "Yes, we are.", ak25 = "No, we aren't.", nombre = $('#nombre').val(), apellido = $('#apellido').val(), q1 = $('#q1').val(), q2 = $('#q2').val(), q3 = $('#q3').val(), q4 = $('#q4').val(), q5 = $('#q5').val(), q6 = $('#q6').val(), q7 = $('#q7').val(), q8 = $('#q8').val(), q9 = $('#q9').val(), q10 = $('#q10').val(), q11 = $('#q11').val(), q12 = $('#q12').val(), q13 = $('#q13').val(), q14 = $('#q14').val(), q15 = $('#q15').val(), q16 = $('#q16').val(), q17 = $('#q17').val(), q18 = $('#q18').val(), q19 = $('#q19').val(), q20 = $('#q20').val(), q21 = $('#q21').val(), q22 = $('#q22').val(), q23 = $('#q23').val(), q24 = $('#q24').val(), q25 = $('#q25').val(), checkedValue = $('[name="optionsRadios"]:checked').val();
            if (nombre === "") {
                $('.msg').html('Escribe tu primer nombre').fadeIn(400);
            } else if (apellido === "") {
                $('.msg').html(nombre + ' escribe tu primer apellido').fadeIn(400);
            } else if (q1 === "" || q2 === "" || q3 === "" || q4 === "" || q5 === "" || q6 === "" || q7 === "" || q8 === "" || q9 === "" || q10 === "" || q11 === "" || q12 === "" || q13 === "" || q14 === "" || q15 === "" || q16 === "" || q17 === "" || q18 === "" || q19 === "" || q20 === "" || q21 === "" || q22 === "" || q23 === "" || q24 === "" || q25 === "") {
                $('.msg').html(nombre + " completa el ejercicio").fadeIn(400);
            } else if (checkedValue === "") {
                $('.msg').html('Checa si te ayud&oacute; o no este ejercicio').fadeIn(400);
            } else {
                if (q1 === ak1) {
                    $('#q1').addClass("good");
                } else {
                    $('#q1').addClass("bad");
                }
                if (q2 === ak2) {
                    $('#q2').addClass("good");
                } else {
                    $('#q2').addClass("bad");
                }
                if (q3 === ak3) {
                    $('#q3').addClass("good");
                } else {
                    $('#q3').addClass("bad");
                }
                if (q4 === ak4) {
                    $('#q4').addClass("good");
                } else {
                    $('#q4').addClass("bad");
                }
                if (q5 === ak5) {
                    $('#q5').addClass("good");
                } else {
                    $('#q5').addClass("bad");
                }
                if (q6 === ak6) {
                    $('#q6').addClass("good");
                } else {
                    $('#q6').addClass("bad");
                }
                if (q7 === ak7) {
                    $('#q7').addClass("good");
                } else {
                    $('#q7').addClass("bad");
                }
                if (q8 === ak8) {
                    $('#q8').addClass("good");
                } else {
                    $('#q8').addClass("bad");
                }
                if (q9 === ak9) {
                    $('#q9').addClass("good");
                } else {
                    $('#q9').addClass("bad");
                }
                if (q10 === ak10) {
                    $('#q10').addClass("good");
                } else {
                    $('#q10').addClass("bad");
                }
                if (q11 === ak11) {
                    $('#q11').addClass("good");
                } else {
                    $('#q11').addClass("bad");
                }
                if (q12 === ak12) {
                    $('#q12').addClass("good");
                } else {
                    $('#q12').addClass("bad");
                }
                if (q13 === ak13) {
                    $('#q13').addClass("good");
                } else {
                    $('#q13').addClass("bad");
                }
                if (q14 === ak14) {
                    $('#q14').addClass("good");
                } else {
                    $('#q14').addClass("bad");
                }
                if (q15 === ak15) {
                    $('#q15').addClass("good");
                } else {
                    $('#q15').addClass("bad");
                }
                if (q16 === ak16) {
                    $('#q16').addClass("good");
                } else {
                    $('#q16').addClass("bad");
                }
                if (q17 === ak17) {
                    $('#q17').addClass("good");
                } else {
                    $('#q17').addClass("bad");
                }
                if (q18 === ak18) {
                    $('#q18').addClass("good");
                } else {
                    $('#q18').addClass("bad");
                }
                if (q19 === ak19) {
                    $('#q19').addClass("good");
                } else {
                    $('#q19').addClass("bad");
                }
                if (q20 === ak20) {
                    $('#q20').addClass("good");
                } else {
                    $('#q20').addClass("bad");
                }
                if (q21 === ak21) {
                    $('#q21').addClass("good");
                } else {
                    $('#q21').addClass("bad");
                }
                if (q22 === ak22) {
                    $('#q22').addClass("good");
                } else {
                    $('#q22').addClass("bad");
                }
                if (q23 === ak23) {
                    $('#q23').addClass("good");
                } else {
                    $('#q23').addClass("bad");
                }
                if (q24 === ak24) {
                    $('#q24').addClass("good");
                } else {
                    $('#q24').addClass("bad");
                }
                if (q25 === ak25) {
                    $('#q25').addClass("good");
                } else {
                    $('#q25').addClass("bad");
                }        
            }
        });// Ends #checkBtn.click()
        $('input').focus(function () {
            $('.msg').fadeOut(700);
            $(this).removeClass("bad");
        });
    });
}(jQuery));