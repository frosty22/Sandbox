$(window).load(function () {

	// Nette inicialize
	$.nette.init();

	// Simple confirm
	$("a[data-confirm]").click(function(){
		return window.confirm($(this).attr("data-confirm"));
	});


	// New window
	$("a.blank").attr("target", "_blank");

	// Popover
	$('a[title]').tooltip();


	// Place your code here



});
