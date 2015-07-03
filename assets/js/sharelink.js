window.onload = function() {
	$('#tog').on('click', function () {
		var classname = $('#i1').attr('class');
		if(classname=='glyphicon glyphicon-chevron-up') {
			$('#i1').attr('class','glyphicon glyphicon-chevron-down');
		}else if(classname=='glyphicon glyphicon-chevron-down') {
			$('#i1').attr('class','glyphicon glyphicon-chevron-up');
		}
	});
}