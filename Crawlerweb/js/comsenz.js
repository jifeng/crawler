$(document).ready(function(){
						   
	$('#login').click(function(){
								
				$("#login_1").fadeOut('1');
				setTimeout(function(){$("#login_2").show();},500);
				
				return false;
			});
	$('#quxiao').click(function(){
								 
				$("#login_2").fadeOut('1');
				
				setTimeout(function(){$("#login_1").show();},500);
				return false;
			});
			var temp = $(".here");
	$('#menu').find('li').hover(
			  function () {
			 //alert(temp);
			 $(this).children().slideDown('100');
			  temp.removeClass("here");
                          
				
			  },
			  function () {
				temp.addClass("here");
				$(this).find('div').fadeOut();
			  }
			);					   			   
		
	
    $('.downnav').hover(	
		function () {
			 //alert(temp);
			  // $(this).parent().
			  temp.removeClass("here");
                          
				
			  },
			  function () {
				temp.addClass("here");
				
			  }
			);			
		
		
						   
				   
						   
});