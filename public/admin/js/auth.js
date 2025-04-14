$(document).ready(function(){
	
	// Communication modal configuration
	let redirect_flag = false,
		redirect_url = '';

	// Set Password
	$.validator.addMethod('validPassword', function(value, element){
		return /^(?=.*[a-zA-Z])(?=\S+$).{8,15}$/.test(value);
	});



	// Login
	$('#login_form').validate({
		
		rules: {
			email: {
				required: true,
				email: true
			},
			password: {
				required: true,
				minlength: 8,
				maxlength: 15
			},
		},

		messages: {
			email: {
				required: "Please enter your email",
				email: "Please enter valid email"
			},
			password: {
				required: "Please enter password",
				minlength: "Password should be of 8 characters atleast",
				maxlength: "Password should be a maximum of 15 characters"
			}
		},

		errorElement: 'span',
	    errorPlacement: function (error, element) {
	      error.addClass('invalid-feedback');
	      element.closest('.input-group').append(error);
	    },
	});

	$('#login_form').on('submit', function(e){
		e.preventDefault();
		$('.common-error').empty();

		if($('#login_form').valid()){
			
			$('.pre-loader').show();

			$.ajax({
				data: $('#login_form').serializeArray(),
				type: 'post',
				url: '/admin/login',

				success: function(response){
					let res = response;

					if(res.result == 'success'){						
						window.location = '/admin/dashboard';
					}
					else if(res.result == 'error'){
						let error_msgs = res.msg;
						for(let key in error_msgs){
							if(error_msgs.hasOwnProperty(key)){
								$('#login_form').find('.'+key+'_error').html(error_msgs[key][0]);
							}
						}

						$('.pre-loader').hide();
					}
					else if(res.result == 'failure'){

						Swal.fire({
			                text: "Something went wrong. Please try again.",
			                icon: "error",
			                buttonsStyling: false,
			                confirmButtonText: "Ok",
			                confirmButtonClass: "btn font-weight-bold btn-light"
			            }).then(function() {
							window.location = '/user/auth';
						});
						
						$('.pre-loader').hide();
					}
				},

				error: function(error){

				}
			});
		}

	});

	// Forgot Password
	$('#kt_login_forgot_form').validate({

		rules: {
			email: {
				required: true,
				email: true
			}
		},

		messages: {
			email: {
				required: "Please enter your email",
				email: "Please enter valid email"
			}
		}
	});

	$('#kt_login_forgot_form').on('submit', function(e){
		e.preventDefault();
		$('.common-error').empty();

		if($('#kt_login_forgot_form').valid()){
			
			$('.pre-loader').show();

			$.ajax({
				data: $('#kt_login_forgot_form').serializeArray(),
				type: 'post',
				url: "/user/process_reset_password_request",

				success: function(response){
					let res = $.parseJSON(response);

					if(res.result == 'success'){

						Swal.fire({
			                text: "We have sent you an email. Please check your inbox and follow instructions to reset the password.",
			                icon: "info",
			                buttonsStyling: false,
			                confirmButtonText: "Ok",
			                confirmButtonClass: "btn font-weight-bold btn-light-primary"
			            }).then(function() {
							window.location = '/user/auth';
						});

						$('#kt_login_forgot_form')[0].reset();
					}
					else if(res.result == 'error'){
						let error_msgs = res.msg;
						for(let key in error_msgs){
							if(error_msgs.hasOwnProperty(key)){
								$('.'+key+'_error').html(error_msgs[key][0]);
							}
						}
					}
					else if(res.result == 'failure'){

						Swal.fire({
			                text: "Something went wrong. Please try again.",
			                icon: "error",
			                buttonsStyling: false,
			                confirmButtonText: "Ok",
			                confirmButtonClass: "btn font-weight-bold btn-light"
			            }).then(function() {
							window.location = '/user/auth';
						});

					}

					$('.pre-loader').hide();
				},

				error: function(error){

				}
			});
		}

	});

});