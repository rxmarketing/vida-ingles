$('.reglas-gramaticales-link').on('click', function (e) {
      e.preventDefault();
      $('.reglas-gramaticales-link').fadeOut(250); //hides Reglas gramaticales link.
      $('#aviso').fadeOut(700); //hides aviso div.
      $('#sugerencias').slideDown(1000); // Displays Reglas Gramaticales div.
    });