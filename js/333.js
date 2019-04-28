$(function() {
	
	'use strict';
  $(.'uname').blur(function(){

  	if($(this).val().length < 8 ){
  		$(this).parent().find('.csal').fadeIn(300);
  	}
	});

});