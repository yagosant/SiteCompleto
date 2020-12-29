  // Or with jQuery

  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.slider').slider({full_width:true});
    $('select').formSelect();
    $('.dropdown-trigger').dropdown()
  });
 

function sliderprev(){
  //para o slide
  $('.slider').slider('pause');
  //volta o slide
  $('.slider').slider('prev');
}

function sliderNext(){
  //para o slide
  $('.slider').slider('pause');
  //adianta o slide
  $('.slider').slider('next');
}

