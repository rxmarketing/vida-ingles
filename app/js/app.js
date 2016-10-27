/*jslint browser: true*/
(function ($) {
	"use strict";
	/*global jQuery, document*/
	$(document).on("ready", function () {
    //alert("hola");
		//  $(document).on("contextmenu",function(e){  
		//   return false;  
		//  });
		//  $(document).on("cut copy paste","#txtInput",function(e) {
		//     e.preventDefault();
		// });
		$("input").attr( "autocomplete", "off" );
    jQuery(document).bind("contextmenu cut copy",function(e){
			e.preventDefault();
			alert('Copiar no esta permitido.');
		});
		
		$('#ceflevels, #estructuras, #lista-verbos').accordion({
			animate: 900,
			active: 0,
			collapsible: true,
			event: "click",
			heightStyle: "content"
		});
		$('.reglas-gramaticales-link').on('click', function (e) {
      e.preventDefault();
      $('.reglas-gramaticales-link').fadeOut(250); //hides Reglas gramaticales link.
      $('.msg').fadeOut(700); //hides msg div.
      $('#sugerencias').slideDown(1000); // Displays Reglas Gramaticales div.
		});
		
	});
}(jQuery));