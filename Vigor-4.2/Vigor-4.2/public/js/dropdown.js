 $(function(){

    $(".dropdown-menu").on('click', 'li a', function(){
      $(".dropdown-toggle:first-child").text($(this).text());
      $(".dropdown-toggle:first-child").val($(this).text());
   });

});



