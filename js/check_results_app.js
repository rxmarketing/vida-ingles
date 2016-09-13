/*jslint browser: true*/
(function ($) {
    "use strict";
    /*global jQuery, document*/
    $(document).on("ready", function () {
        $('.msg').hide();
		//alert('hola');
        // gathers exercise id and name and username in variables.
        var ejerid = $('#ejerid').val(), loggedUser = $('#logusername').val(), ejernombre = $('#ejerNombre').val();
        $.ajax({
			// gathers answers from database into variables
            url: 'http://localhost/vidaingles/ajax/get_answer_keys_app.php',
            data: "id=" + ejerid,
            dataType: 'json'
        }) // Ends $.ajax()
		.done(function () {
			//alert('done loading answer keys');
        })
		.error(function () {
			alert("JS: Error al tratar de cargar las respuestas.");
        })      
		.always(function (data) {
			var ak1 = data[0], ak2 = data[1], ak3 = data[2], ak4 = data[3], ak5 = data[4], ak6 = data[5], ak7 = data[6], ak8 = data[7], ak9 = data[8], ak10 = data[9], ak11 = data[10], ak12 = data[11], ak13 = data[12], ak14 = data[13], ak15 = data[14], ak16 = data[15], ak17 = data[16], ak18 = data[17], ak19 = data[18], ak20 = data[19], ak21 = data[20], ak22 = data[21], ak23 = data[22], ak24 = data[23], ak25 = data[24], ak26 = data[25], ak27 = data[26], ak28 = data[27], ak29 = data[28], ak30 = data[29], ak31 = data[30], ak32 = data[31], ak33 = data[32], ak34 = data[33], ak35 = data[34], ak36 = data[35], ak37 = data[36], ak38 = data[37], ak39 = data[38], ak40 = data[39], ak41 = data[40], ak42 = data[41], ak43 = data[42], ak44 = data[43], ak45 = data[44], ak46 = data[45], ak47 = data[46], ak48 = data[47], ak49 = data[48], ak50 = data[49], ak51 = data[50], ak52 = data[51], ak53 = data[52], ak54 = data[53], ak55 = data[54], ak56 = data[55], ak57 = data[56], ak58 = data[57], ak59 = data[58], ak60 = data[59]; //lak1 = ak1.length; lak2 = ak2.length, lak3 = ak3.length, lak4 = ak4.length, lak5 = ak5.length, lak6 = ak6.length, lak7 = ak7.length, lak8 = ak8.length, lak9 = ak9.length, lak10 = ak10.length, lak11 = ak11.length, lak12 = ak12.length, lak13 = ak13.length, lak14 = ak14.length, lak15 = ak15.length, lak16 = ak16.length, lak17 = ak17.length, lak18 = ak18.length, lak19 = ak19.length, lak20 = ak20.length, lak21 = ak21.length, lak22 = ak22.length, lak23 = ak23.length, lak24 = ak24.length, lak25 = ak25.length, lak26 = ak26.length, lak27 = ak27.length, lak28 = ak28.length, lak29 = ak29.length, lak30 = ak30.length, lak31 = ak31.length, lak32 = ak32.length, lak33 = ak33.length, lak34 = ak34.length, lak35 = ak35.length, lak36 = ak36.length, lak37 = ak37.length, lak38 = ak38.length, lak39 = ak39.length, lak40 = ak40.length, lak41 = ak41.length, lak42 = ak42.length, lak43 = ak43.length, lak44 = ak44.length, lak45 = ak45.length, lak46 = ak46.length, lak47 = ak47.length, lak48 = ak48.length, lak49 = ak49.length, lak50 = ak50.length, lak51 = ak51.length, lak52 = ak52.length, lak53 = ak53.length, lak54 = ak54.length, lak55 = ak55.length, lak56 = ak56.length, lak57 = ak57.length, lak58 = ak58.length, lak59 = ak59.length, lak60 = ak60.length, lak61 = ak61.length;
            
            
            console.log(ak1);
			
		//	$('input#inputq-1').attr({'maxlength': +lak1});
        //    $('input#inputq-2').attr({'maxlength': +lak2});
        //    $('input#inputq-3').attr({'maxlength': +lak3});
        //    $('input#inputq-4').attr({'maxlength': +lak4});
        //    $('input#inputq-5').attr({'maxlength': +lak5});
        //    $('input#inputq-6').attr({'maxlength': +lak6});
        //    $('input#inputq-7').attr({'maxlength': +lak7});
        //    $('input#inputq-8').attr({'maxlength': +lak8});
        //    $('input#inputq-9').attr({'maxlength': +lak9});
        //    $('input#inputq-10').attr({'maxlength': +lak10});
        //    $('input#inputq-11').attr({'maxlength': +lak11});
        //    $('input#inputq-12').attr({'maxlength': +lak12});
        //    $('input#inputq-13').attr({'maxlength': +lak13});
        //    $('input#inputq-14').attr({'maxlength': +lak14});
        //    $('input#inputq-15').attr({'maxlength': +lak15});
        //    $('input#inputq-16').attr({'maxlength': +lak16});
        //    $('input#inputq-17').attr({'maxlength': +lak17});
        //    $('input#inputq-18').attr({'maxlength': +lak18});
        //    $('input#inputq-19').attr({'maxlength': +lak19});
        //    $('input#inputq-20').attr({'maxlength': +lak20});
        //    $('input#inputq-21').attr({'maxlength': +lak21});
        //    $('input#inputq-22').attr({'maxlength': +lak22});
        //    $('input#inputq-23').attr({'maxlength': +lak23});
        //    $('input#inputq-24').attr({'maxlength': +lak24});
        //    $('input#inputq-25').attr({'maxlength': +lak25});
        //    $('input#inputq-26').attr({'maxlength': +lak26});
        //    $('input#inputq-27').attr({'maxlength': +lak27});
        //    $('input#inputq-28').attr({'maxlength': +lak28});
        //    $('input#inputq-29').attr({'maxlength': +lak29});
        //    $('input#inputq-30').attr({'maxlength': +lak30});
        //    $('input#inputq-31').attr({'maxlength': +lak31});
        //    $('input#inputq-32').attr({'maxlength': +lak32});
        //    $('input#inputq-33').attr({'maxlength': +lak33});
        //    $('input#inputq-34').attr({'maxlength': +lak34});
        //    $('input#inputq-35').attr({'maxlength': +lak35});
        //    $('input#inputq-36').attr({'maxlength': +lak36});
        //    $('input#inputq-37').attr({'maxlength': +lak37});
        //    $('input#inputq-38').attr({'maxlength': +lak38});
        //    $('input#inputq-39').attr({'maxlength': +lak39});
        //    $('input#inputq-40').attr({'maxlength': +lak40});
        //    $('input#inputq-41').attr({'maxlength': +lak41});
        //    $('input#inputq-42').attr({'maxlength': +lak42});
        //    $('input#inputq-43').attr({'maxlength': +lak43});
        //    $('input#inputq-44').attr({'maxlength': +lak44});
        //    $('input#inputq-45').attr({'maxlength': +lak45});
        //    $('input#inputq-46').attr({'maxlength': +lak46});
        //    $('input#inputq-47').attr({'maxlength': +lak47});
        //    $('input#inputq-48').attr({'maxlength': +lak48});
        //    $('input#inputq-49').attr({'maxlength': +lak49});
        //    $('input#inputq-50').attr({'maxlength': +lak50});
        //    $('input#inputq-51').attr({'maxlength': +lak51});
        //    $('input#inputq-52').attr({'maxlength': +lak52});
        //    $('input#inputq-53').attr({'maxlength': +lak53});
        //    $('input#inputq-54').attr({'maxlength': +lak54});
        //    $('input#inputq-55').attr({'maxlength': +lak55});
        //    $('input#inputq-56').attr({'maxlength': +lak56});
        //    $('input#inputq-57').attr({'maxlength': +lak57});
        //    $('input#inputq-58').attr({'maxlength': +lak58});
        //    $('input#inputq-59').attr({'maxlength': +lak59});
        //    $('input#inputq-60').attr({'maxlength': +lak60});
        //    $('input#inputq-61').attr({'maxlength': +lak61});
			
			$('#evalEjerBtn').click(function (e) {
				e.preventDefault();
				// gather user's answers in variables
				var uinput1 = $('#inputq-1').val(), uinput2 = $('#inputq-2').val(), uinput3 = $('#inputq-3').val(), uinput4 = $('#inputq-4').val(), uinput5 = $('#inputq-5').val(), uinput6 = $('#inputq-6').val(), uinput7 = $('#inputq-7').val(), uinput8 = $('#inputq-8').val(), uinput9 = $('#inputq-9').val(), uinput10 = $('#inputq-10').val(), uinput11 = $('#inputq-11').val(), uinput12 = $('#inputq-12').val(), uinput13 = $('#inputq-13').val(), uinput14 = $('#inputq-14').val(), uinput15 = $('#inputq-15').val(), uinput16 = $('#inputq-16').val(), uinput17 = $('#inputq-17').val(), uinput18 = $('#inputq-18').val(), uinput19 = $('#inputq-19').val(), uinput20 = $('#inputq-20').val(), uinput21 = $('#inputq-21').val(), uinput22 = $('#inputq-22').val(), uinput23 = $('#inputq-23').val(), uinput24 = $('#inputq-24').val(), uinput25 = $('#inputq-25').val(), sugerencias_attr = $('div#sugerencias').attr('style');
				
				if (sugerencias_attr === 'display:none') {
					$('.msg').html('<small class="text-danger bg-danger">' + loggedUser + ' lee las Reglas Gramaticales</small>').fadeIn(400);
					}  else {
					if (uinput1 === ak1) {
						$('#inputq-1').addClass("good");
						} else {
						$('#inputq-1').addClass("bad");
                    }
					if (uinput2 === ak2) {
						$('#inputq-2').addClass("good");
						} else {
						$('#inputq-2').addClass("bad");
                    }
					if (uinput3 === ak3) {
						$('#inputq-3').addClass("good");
						} else {
						$('#inputq-3').addClass("bad");
                    }
					if (uinput4 === ak4) {
						$('#inputq-4').addClass("good");
						} else {
						$('#inputq-4').addClass("bad");
                    }
					if (uinput5 === ak5) {
						$('#inputq-5').addClass("good");
						} else {
						$('#inputq-5').addClass("bad");
                    }
					if (uinput6 === ak6) {
						$('#inputq-6').addClass("good");
						} else {
						$('#inputq-6').addClass("bad");
                    }
					if (uinput7 === ak7) {
						$('#inputq-7').addClass("good");
						} else {
						$('#inputq-7').addClass("bad");
                    }
					if (uinput8 === ak8) {
						$('#inputq-8').addClass("good");
						} else {
						$('#inputq-8').addClass("bad");
                    }
					if (uinput9 === ak9) {
						$('#inputq-9').addClass("good");
						} else {
						$('#inputq-9').addClass("bad");
                    }
					if (uinput10 === ak10) {
						$('#inputq-10').addClass("good");
						} else {
						$('#inputq-10').addClass("bad");
                    }
					if (uinput11 === ak11) {
						$('#inputq-11').addClass("good");
						} else {
						$('#inputq-11').addClass("bad");
                    }
					if (uinput12 === ak12) {
						$('#inputq-12').addClass("good");
						} else {
						$('#inputq-12').addClass("bad");
                    }
					if (uinput13 === ak13) {
						$('#inputq-13').addClass("good");
						} else {
						$('#inputq-13').addClass("bad");
                    }
					if (uinput14 === ak14) {
						$('#inputq-14').addClass("good");
						} else {
						$('#inputq-14').addClass("bad");
                    }
					if (uinput15 === ak15) {
						$('#inputq-15').addClass("good");
						} else {
						$('#inputq-15').addClass("bad");
                    }
					if (uinput16 === ak16) {
						$('#inputq-16').addClass("good");
						} else {
						$('#inputq-16').addClass("bad");
                    }
					if (uinput17 === ak17) {
						$('#inputq-17').addClass("good");
						} else {
						$('#inputq-17').addClass("bad");
                    }
					if (uinput18 === ak18) {
						$('#inputq-18').addClass("good");
						} else {
						$('#inputq-18').addClass("bad");
                    }
					if (uinput19 === ak19) {
						$('#inputq-19').addClass("good");
						} else {
						$('#inputq-19').addClass("bad");
                    }
					if (uinput20 === ak20) {
						$('#inputq-20').addClass("good");
						} else {
						$('#inputq-20').addClass("bad");
                    }
					if (uinput21 === ak21) {
						$('#inputq-21').addClass("good");
						} else {
						$('#inputq-21').addClass("bad");
                    }
					if (uinput22 === ak22) {
						$('#inputq-22').addClass("good");
						} else {
						$('#inputq-22').addClass("bad");
                    }
					if (uinput23 === ak23) {
						$('#inputq-23').addClass("good");
						} else {
						$('#inputq-23').addClass("bad");
                    }
					if (uinput24 === ak24) {
						$('#inputq-24').addClass("good");
						} else {
						$('#inputq-24').addClass("bad");
                    }
					if (uinput25 === ak25) {
						$('#inputq-25').addClass("good");
						} else {
						$('#inputq-25').addClass("bad");
                    }        
                }
            });// Ends #checkBtn.click()
			
        });//Ends .always()       
		
        
		$('input').focus(function () {
			$('.msg').fadeOut(700);
			$(this).removeClass("bad");
        });
        $('.reglas-gramaticales-link').on('click', function (e) {
            e.preventDefault();
            $('.reglas-gramaticales-link').fadeOut(250); //hides Reglas gramaticales link.
            $('.msg').fadeOut(700); //hides aviso div.
            $('#sugerencias').slideDown(1000); // Displays Reglas Gramaticales div.
        });
		
		//save results when user clics the Save button
		$('#saveBtn').on("click", function (no) {
			no.preventDefault();
			
			$.ajax({
				type: 'post',
				url: 'http://localhost/vidaingles/ajax/insert_ejer_results_app.php',
				data: $('#ejerAppForm').serializeArray(),
				dataType: 'json',
				beforeSend: function () {
					//$('#ejerAppForm').button('loading');
					$('.msg').html('<img src="i/loader.gif"/>').fadeIn(500);
                }
            })// ENDS AJAX
			.done(function () {
				
            })
			.fail(function () {
				alert("Something went wrong");
            })
			.always(function (retorno) {
				//var maincontentOffset = $('#vi_content').offset(), destination = maincontentOffset.top;
				//$(document).scrollTop(destination);
				//alert(retorno.mensaje);
				//$('#evalEjerBtn').button('reset');
				$('.msg').html('<p>'+ retorno.mensaje +'</p>');
            });// Ends always
        }); //  Ends save btn on click
    });// Ends document on.ready function
}(jQuery));