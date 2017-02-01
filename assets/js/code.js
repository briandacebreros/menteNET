$(document).ready(function() {
    //SCROLL SMOOTH
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {
    
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();
    
        // Store hash
        var hash = this.hash;
    
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
            scrollTop: $(hash).offset().top-100
        }, 800, function(){
                
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
        });
        } // End if
    });
    
    $("#portada").swiperight(function() {  
      $('#carousel-example-generic').carousel('prev');  
	});  
	$("#portada").swipeleft(function() {  
	  $('#carousel-example-generic').carousel('next'); 
	});
	
	$(".accionador-menu").click(function(){
	  $(".menu-desplegado").css("display","none");
	  $(this).parent().children(".menu-desplegado").css("display","block");
	});
	
	$(window).click(function() {
      $(".menu-desplegado").css("display","none");
    });
    
    $('.accionador-menu').click(function(event){
        event.stopPropagation();
    });


    $('#btn-editar-cita').click(function(){
        alert('clicked');
        $("#form-editar-cita").css("display","none");
    });
		      
});