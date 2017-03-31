/*jslint browser: true*/
(function ($) {
    "use strict";
    /*global jQuery, document*/
    $(document).on("ready", function () {
        $('.msg').hide();
        $('#checkBtn').click(function (e) {
            e.preventDefault();
            //SIMULADOR INGLES I
            var ak1 = "a", ak2 = "b", ak3 = "b", ak4 = "b", ak5 = "c", ak6 = "a", ak7 = "a", ak8 = "c", ak9 = "c", ak10 = "c", ak11 = "b", ak12 = "d", ak13 = "a", ak14 = "b",
                ak15 = "a", ak16 = "a", ak17 = "a", ak18 = "b", ak19 = "c", ak20 = "d", ak21 = "d", ak22 = "d", ak23 = "a", ak24 = "d", ak25 = "a", ak26 = "a", ak27 = "d",
                ak28 = "c", ak29 = "c", ak30 = "c", nombre = $('#nombre').val(), apellido = $('#apellido').val(),

                checkedValue1 = $('[name="q1"]:checked').val(),
                checkedValue2 = $('[name="q2"]:checked').val(),
                checkedValue3 = $('[name="q3"]:checked').val(),
                checkedValue4 = $('[name="q4"]:checked').val(),
                checkedValue5 = $('[name="q5"]:checked').val(),
                checkedValue6 = $('[name="q6"]:checked').val(),
                checkedValue7 = $('[name="q7"]:checked').val(),
                checkedValue8 = $('[name="q8"]:checked').val(),
                checkedValue9 = $('[name="q9"]:checked').val(),
                checkedValue10 = $('[name="q10"]:checked').val(),
                checkedValue11 = $('[name="q11"]:checked').val(),
                checkedValue12 = $('[name="q12"]:checked').val(),
                checkedValue13 = $('[name="q13"]:checked').val(),
                checkedValue14 = $('[name="q14"]:checked').val(),
                checkedValue15 = $('[name="q15"]:checked').val(),
                checkedValue16 = $('[name="q16"]:checked').val(),
                checkedValue17 = $('[name="q17"]:checked').val(),
                checkedValue18 = $('[name="q18"]:checked').val(),
                checkedValue19 = $('[name="q19"]:checked').val(),
                checkedValue20 = $('[name="q20"]:checked').val(),
                checkedValue21 = $('[name="q21"]:checked').val(),
                checkedValue22 = $('[name="q22"]:checked').val(),
                checkedValue23 = $('[name="q23"]:checked').val(),
                checkedValue24 = $('[name="q24"]:checked').val(),
                checkedValue25 = $('[name="q25"]:checked').val(),
                checkedValue26 = $('[name="q26"]:checked').val(),
                checkedValue27 = $('[name="q27"]:checked').val(),
                checkedValue28 = $('[name="q28"]:checked').val(),
                checkedValue29 = $('[name="q29"]:checked').val(),
                checkedValue30 = $('[name="q30"]:checked').val();


            if (nombre === "") {
                $('.msg').html('Escribe tu primer nombre').fadeIn(400);
            } else if (apellido === "" || checkedValue1 === "") {
                $('.msg').html(nombre + ' escribe tu primer apellido').fadeIn(400);
            } else {
                if (checkedValue1 === ak1) {
                    $('#lm1').addClass("good");
                } else {
                    $('#lm1').addClass("bad");
                }
                if (checkedValue2 === ak2) {
                    $('#lm2').addClass("good");
                } else {
                    $('#lm2').addClass("bad");
                }
                if (checkedValue3 === ak3) {
                    $('#lm3').addClass("good");
                } else {
                    $('#lm3').addClass("bad");
                }
                if (checkedValue4 === ak4) {
                    $('#lm4').addClass("good");
                } else {
                    $('#lm4').addClass("bad");
                }
                if (checkedValue5 === ak5) {
                    $('#lm5').addClass("good");
                } else {
                    $('#lm5').addClass("bad");
                }
                if (checkedValue6 === ak6) {
                    $('#lm6').addClass("good");
                } else {
                    $('#lm6').addClass("bad");
                }
                if (checkedValue7 === ak7) {
                    $('#lm7').addClass("good");
                } else {
                    $('#lm7').addClass("bad");
                }
                if (checkedValue8 === ak8) {
                    $('#lm8').addClass("good");
                } else {
                    $('#lm8').addClass("bad");
                }
                if (checkedValue9 === ak9) {
                    $('#lm9').addClass("good");
                } else {
                    $('#lm9').addClass("bad");
                }
                if (checkedValue10 === ak10) {
                    $('#lm10').addClass("good");
                } else {
                    $('#lm10').addClass("bad");
                }
                if (checkedValue11 === ak11) {
                    $('#lm11').addClass("good");
                } else {
                    $('#lm11').addClass("bad");
                }
                if (checkedValue12 === ak12) {
                    $('#lm12').addClass("good");
                } else {
                    $('#lm12').addClass("bad");
                }
                if (checkedValue13 === ak13) {
                    $('#lm13').addClass("good");
                } else {
                    $('#lm13').addClass("bad");
                }
                if (checkedValue14 === ak14) {
                    $('#lm14').addClass("good");
                } else {
                    $('#lm14').addClass("bad");
                }
                if (checkedValue15 === ak15) {
                    $('#lm15').addClass("good");
                } else {
                    $('#lm15').addClass("bad");
                }
                if (checkedValue16 === ak16) {
                    $('#lm16').addClass("good");
                } else {
                    $('#lm16').addClass("bad");
                }
                if (checkedValue17 === ak17) {
                    $('#lm17').addClass("good");
                } else {
                    $('#lm17').addClass("bad");
                }
                if (checkedValue18 === ak18) {
                    $('#lm18').addClass("good");
                } else {
                    $('#lm18').addClass("bad");
                }
                if (checkedValue19 === ak19) {
                    $('#lm19').addClass("good");
                } else {
                    $('#lm19').addClass("bad");
                }
                if (checkedValue20 === ak20) {
                    $('#lm20').addClass("good");
                } else {
                    $('#lm20').addClass("bad");
                }
                if (checkedValue21 === ak21) {
                    $('#lm21').addClass("good");
                } else {
                    $('#lm21').addClass("bad");
                }
                if (checkedValue22 === ak22) {
                    $('#lm22').addClass("good");
                } else {
                    $('#lm22').addClass("bad");
                }
                if (checkedValue23 === ak23) {
                    $('#lm23').addClass("good");
                } else {
                    $('#lm23').addClass("bad");
                }
                if (checkedValue24 === ak24) {
                    $('#lm24').addClass("good");
                } else {
                    $('#lm24').addClass("bad");
                }
                if (checkedValue25 === ak25) {
                    $('#lm25').addClass("good");
                } else {
                    $('#lm25').addClass("bad");
                }
                if (checkedValue26 === ak26) {
                    $('#lm26').addClass("good");
                } else {
                    $('#lm26').addClass("bad");
                }
                if (checkedValue27 === ak27) {
                    $('#lm27').addClass("good");
                } else {
                    $('#lm27').addClass("bad");
                }
                if (checkedValue28 === ak28) {
                    $('#lm28').addClass("good");
                } else {
                    $('#lm28').addClass("bad");
                }
                if (checkedValue29 === ak29) {
                    $('#lm29').addClass("good");
                } else {
                    $('#lm29').addClass("bad");
                }
                if (checkedValue30 === ak30) {
                    $('#lm30').addClass("good");
                } else {
                    $('#lm30').addClass("bad");
                }
            }
        });// Ends #checkBtn.click()
        $('input').focus(function () {
            $('.msg').fadeOut(700);
            $(this).removeClass("bad");
        });
    });
}(jQuery));