$(document).ready(function(){

	$('#create_visionMission_form').on('submit', function(e){
		e.preventDefault();
			$('.pre-loader').show();
			$.ajax({
				data: new FormData($('#create_visionMission_form')[0]),
				cache: false,
				processData: false,
    			contentType: false,
				type: 'post',
				url: "/admin/vision&mission/store",
				success: function(response){
					var res = typeof response === 'string' ? JSON.parse(response) : response;
					if(res.result == 'success'){
						Swal.fire({
			                text: "Mission Vision Created.",
			                type: 'success',
			                buttonsStyling: false,
			                confirmButtonText: "Ok",
			                confirmButtonClass: "btn font-weight-bold btn-primary"
			            }).then(function() {
							window.location = '/admin/vision&mission';
						});
						
						 $('#create_visionMission_form')[0].reset();
					}
					else if(res.result == 'error'){
						let error_msgs = res.msg;
						for(let key in error_msgs){
							if(error_msgs.hasOwnProperty(key)){
								$('#create_visionMission_form').find('.'+key+'_error').html(error_msgs[key][0]);
							}
						}

					}
					else if(res.result == 'failure'){
						
						Swal.fire({
			                text: "Something went wrong. Please try again.",
			                type: 'error',
			                buttonsStyling: false,
			                confirmButtonText: "Ok",
			                confirmButtonClass: "btn font-weight-bold btn-light"
			            }).then(function() {
							window.location.reload();
						});
					}

					$('.pre-loader').hide();
				},

				error: function(error){

				}
			});
		
	});
});