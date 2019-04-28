$(function() {
	
	'use strict';

  var error_name =true,
      error_email=true,
      error_phone=true,
      error_pass=true,
      error_repass=true,
      error_age=true;

  $('.uname').blur(function(){

  	if($(this).val().length < 8 ){

  		$(this).css('border','2px solid #F00');
  		$(this).parent().find('.csal').fadeIn(300);
  	}else{
        error_name =false;
  				$(this).css('border','2px solid #080');
  				$(this).parent().find('.csal').fadeOut(300);
  	}
	});



  $('.ue').blur(function(){

    if($(this).val().length < 15){

      $(this).css('border','2px solid #F00');
      $(this).parent().find('.usere').fadeIn(300);
    }else{
        error_email =false;
          $(this).css('border','2px solid #080');
          $(this).parent().find('.usere').fadeOut(300);
    }
  });



  $('.pa').blur(function(){

    if($(this).val().length < 8 ){

      $(this).css('border','2px solid #F00');
      $(this).parent().find('.psere').fadeIn(300);
    }else{
        error_pass =false;
          $(this).css('border','2px solid #080');
          $(this).parent().find('.psere').fadeOut(300);
    }
  });




  $('.rpa').blur(function(){

    if($(this).val().length < $('.pa').val().length ){

      $(this).css('border','2px solid #F00');
      $(this).parent().find('.repass').fadeIn(300);
    }else if($(this).val() == $('.pa').val()){
          error_repass =false;
          $(this).css('border','2px solid #080');
          $(this).parent().find('.repass').fadeOut(300);
    }
  });



  $('.ph').blur(function(){

    if($(this).val().length < 11 ){

      $(this).css('border','2px solid #F00');
      $(this).parent().find('.phone').fadeIn(300);
    }else{
      error_phone =false;
          $(this).css('border','2px solid #080');
          $(this).parent().find('.phone').fadeOut(300);
    }
  });




  $('.ag').blur(function(){

    if($(this).val() <20 ){

      $(this).css('border','2px solid #F00');
      $(this).parent().find('.age').fadeIn(300);
    }else{
      error_age=false;
          $(this).css('border','2px solid #080');
          $(this).parent().find('.age').fadeOut(300);
    }
  });
  $('.f').submit(function(e){
    if(error_name ==true ||
      error_email==true ||
      error_phone==true ||
      error_pass==true ||
      error_repass==true ||
      error_age==true
) {
    e.preventDefult();
  }
  })


});


