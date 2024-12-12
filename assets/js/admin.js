$(document).ready(function(){
	$(".btn-toggle").click(function(e) {
	e.preventDefault();
	  $(".main-wrapper").toggleClass("toggled");
	  
	});
});


$(document).ready(function(){
	$('#dataTable').DataTable();
});

$(document).ready(function(){
	$('#select').niceSelect();
});

