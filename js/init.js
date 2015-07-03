(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.modal-trigger').leanModal();
    $('select').material_select();
    $("input[type=number]").focus(function(){	   
  		this.select();
	});
	$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  }); // end of document ready
})(jQuery); // end of jQuery name space

