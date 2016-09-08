function _(x) {
return document.getElementById(x);
}
function toggleElement(x){
var x = _(x);
if(x.style.display == 'block'){
x.style.display = 'none';
}else{
x.style.display = 'block';
}
}

/*jslint browser: true*/
(function ($) {
  "use strict";
  /*global jQuery, document*/
  $(document).on("ready", function () {
  //time ago
    $("abbr.timeago").timeago();
    
    
  //tooltip
  $('li').tooltip();
  
  
  $('#sabores').selectmenu();
  
  
  $('#ceflevels, #estructuras, #lista-verbos').accordion({
   animate: 900,
   active: 0,
   collapsible: true,
   event: "click",
   heightStyle: "content"
  });
  
  

   
  }); // Ends document on.ready function
}(jQuery));