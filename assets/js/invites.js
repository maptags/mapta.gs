window.onload = function() {
	$('.inviteUser').on('click', function () {
		var button = $(this);
    	button.addClass('disabled');
    	button.html('Processing');
		var request = $.ajax({
	        url: "http://mapta.gs/invite/sendinvite",
	        type: "POST",
	        data: {email: this.value},
	        dataType: "JSON",
	        success:function(data) {
	        	button.removeClass('btn-primary');
	        	button.addClass('btn-success');
	        	button.html('Invited');
	        	toastr.success('Your Friend Invited Succesfully');
	        }
	    });
	});
	$('.invited-button').on('click', function () {
		var button = $(this);
		if($('#email').val()=='') {toastr.error("Please enter Email");return false;} 
		if(!isValidEmailAddress($('#email').val())) {toastr.error("Please enter valid Email");return false;}
		var request = $.ajax({
	        url: "http://mapta.gs/invite/sendinviteemail",
	        type: "POST",
	        data: {email: $('#email').val()},
	        dataType: "JSON",
	        success:function(data) {
	        	toastr.success('Email Sent Successfully');
	        }
	    });
	});
}
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
}