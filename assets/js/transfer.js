window.onload = function () {
	var paramname;
	$('.transfer').on('click',function() {
		paramname=$(this).attr("name");
		$("#trans").modal('show');
	});
	$('.modalTransfer').on('click', function () {
		var button = $(this);
		if($('#email').val()=='') {toastr.error("Please enter Email");return false;} 
		$('.modalTransfer').attr("disabled", "disabled");
		var request = $.ajax({
	        url: "http://mapta.gs/actions/transfer",
	        data: {
	        	email: $('#email').val(),
	        	param: paramname
	        	},
	        type:"POST",
	        dataType: "JSON",
	        success:function(data) {
	        	if(data[0])
	        		{
	        			toastr.success('Maptag has been transfered Successfully');
	        			location.reload();
	        		}
	        			        	
	        	else
	        		{
	        			$('.modalTransfer').removeAttr("disabled");   
	        			toastr.error("Email Doesn't Exists");
	        		}
	        }
	});
	});
}