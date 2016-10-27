/*jslint browser: true*/
(function ($) {
    "use strict";
    /*global jQuery, document*/
    $(document).on("ready", function () {
        $('.msg').hide();
        $('#checkBtn').click(function (e) {
            e.preventDefault();
            //verbo modal can ak
            var ak1 = "She can juggle three balls.", ak2 = "I can do Maths in my head.", ak3 = "Julia can swim.", ak4 = "Gabriel can play the guitar really well.", ak5 = "My cat can jump really high.", ak6 = "Carlos can't ride a bike.", ak7 = "I can't stay up late.", ak8 = "My sister can't cook.", ak9 = "His parents can't use a computer.", ak10 = "They can't drive fast.", ak11 = "Can you make brownies?", ak12 = "Yes, I can.", ak13 = "No, I can't.", ak14 = "Can he send a text message?", ak15 = "Yes, he can.", ak16 = "No, he can't.", ak17 = "Can we leave school early?", ak18 = "Yes, we can.", ak19 = "No, we can't.", ak20 = "Can Sabina and Fernando play football?", ak21 = "Yes, they can.", ak22 = "No, they can't.", ak23 = "Can they stay longer?", ak24 = "Yes, they can.", ak25 = "No, they can't.", nombre = $('#nombre').val(), apellido = $('#apellido').val(), q1 = $('#q1').val(), q2 = $('#q2').val(), q3 = $('#q3').val(), q4 = $('#q4').val(), q5 = $('#q5').val(), q6 = $('#q6').val(), q7 = $('#q7').val(), q8 = $('#q8').val(), q9 = $('#q9').val(), q10 = $('#q10').val(), q11 = $('#q11').val(), q12 = $('#q12').val(), q13 = $('#q13').val(), q14 = $('#q14').val(), q15 = $('#q15').val(), q16 = $('#q16').val(), q17 = $('#q17').val(), q18 = $('#q18').val(), q19 = $('#q19').val(), q20 = $('#q20').val(), q21 = $('#q21').val(), q22 = $('#q22').val(), q23 = $('#q23').val(), q24 = $('#q24').val(), q25 = $('#q25').val(), checkedValue = $('[name="optionsRadios"]:checked').val();
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