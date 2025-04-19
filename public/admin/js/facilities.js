$(document).ready(function(){
	if($(document).find('#facilities_datatable').length > 0){
		$('#facilities_datatable').DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			"searching": true,
			ajax: {
				url: '/admin/facilities'
			},
			columns: [
				{ 
					data: 'DT_RowIndex', 
					name: 'DT_RowIndex', 
					orderable: false, 
					searchable: false,
					className: "text-center" 
				},
				{
					data: 'id',
					name: 'id',
					className: "text-center"
				},
				{
					data: 'name',
					name: 'name',
					className: "text-center"
				},
				{
					data: 'content',
					name: 'content',
					className: "text-center"
				},
				{
					data: 'photo',
					name: 'photo',
					className: "text-center"
				},
				{
					data: 'action',
					name: 'action',
					className: "text-center",
					orderable: false
				},
				
			],
			'columnDefs': [{ 'orderable': false, 'targets': 0 },{'visible': false, 'targets': [1], 'orderable': true}],
			'aaSorting': [[1, 'desc']]
		});
	}
	jQuery.validator.addMethod(
        "validEmail",
        function (value, element) {
            return this.optional(element) || /\S+@\S+\.\S+/.test(value);
        },
        "Please enter valid email"
    );
	jQuery.validator.addMethod("alpha", function (value, element) {
		return this.optional(element) || /^[a-zA-Z\s']*$/.test(value);
	}, "Invalid input");
	jQuery.validator.addMethod("alphanumeric", function (value, element) {
		return this.optional(element) || /^[a-zA-Z0-9\s']*$/.test(value);
	}, "Invalid input");
	jQuery.validator.addMethod("alphadash", function (value, element) {
		return this.optional(element) || /^[a-zA-Z \s']*$/.test(value);
	}, "Invalid input");
	// Create role
	$('#create_facilities_form, #edit_facilities_form').validate({
		rules: {
			name: {
				required: true,
				maxlength: 50,
				alphanumeric: true,
			},
			content: {
				required: true,
				maxlength: 150,
			},
			photo: {
				required: function (element) {
					return $('#edit_facilities_form').length > 0 && $('input[name="old_photo"]').val() === "";
				}
			},
			
		},
		messages: {
			name: {
				required: "Please enter name",
				maxlength: "Name should not be more than 50 characters",
				alpha: "Please enter valid input",
			},
			content: {
				required: "Please enter discription",
				maxlength: "Discription should not be more than 200 characters",
			},
			photo: {
				required: 'Please upload photo',
			},
		},
		errorPlacement: function (error, element) {
			if (element.attr("name") === "photo") {
				$(element).closest('.form-group').find('.common-error').html(error.text());
			} else {
				element.after(error);
			}
		}
	});

	$('#create_facilities_form').on('submit', function(e){
		e.preventDefault();
		$('.common-error').empty();

		if($('#create_facilities_form').valid()){

			$('.pre-loader').show();

			$.ajax({
				data: new FormData($('#create_facilities_form')[0]),
				cache: false,
				processData: false,
    			contentType: false,
				type: 'post',
				url: "/admin/facilities/store",
				success: function(response){
					var res = typeof response === 'string' ? JSON.parse(response) : response;
					if(res.result == 'success'){
						Swal.fire({
			                text: "Facility Created.",
			                type: 'success',
			                buttonsStyling: false,
			                confirmButtonText: "Ok",
			                confirmButtonClass: "btn font-weight-bold btn-primary"
			            }).then(function() {
							window.location = '/admin/facilities';
						});
						
						 $('#create_facilities_form')[0].reset();
					}
					else if(res.result == 'error'){
						let error_msgs = res.msg;
						for(let key in error_msgs){
							if(error_msgs.hasOwnProperty(key)){
								$('#create_facilities_form').find('.'+key+'_error').html(error_msgs[key][0]);
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
		}
	});

	// Edit role
	$('#edit_facilities_form').on('submit', function(e) {
		e.preventDefault();
		$('.common-error').empty();
	
		if ($('#edit_facilities_form').valid()) {
	
			$('.pre-loader').show();
	
			$.ajax({
				data: new FormData($('#edit_facilities_form')[0]),
				type: 'post',
				url: "/admin/facilities/update",
				cache: false,
				contentType: false,
				processData: false,
				success: function(response) {
					var res = typeof response === 'string' ? JSON.parse(response) : response;
					if (res.result == 'success') {
	
						Swal.fire({
							text: "Facility Updated.",
							type: 'success',
							buttonsStyling: false,
							confirmButtonText: "Ok",
							confirmButtonClass: "btn font-weight-bold btn-primary"
						}).then(function() {
							window.location = '/admin/facilities';
						});
	
						$('#edit_facilities_form')[0].reset(); // Corrected form id
					} else if (res.result == 'error') {
						let error_msgs = res.msg;
						for (let key in error_msgs) {
							if (error_msgs.hasOwnProperty(key)) {
								$('#edit_facilities_form').find('.' + key + '_error').html(error_msgs[key][0]); // Corrected form id
							}
						}
	
					} else if (res.result == 'failure') {
	
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
	
					$('.pre-loader').hide(); // Ensure this is executing properly
				},
	
				error: function(error) {
					console.error("Error occurred:", error); // Debugging
				}
			});
		}
	});
	

	
	$(document).on('click', '.delete_facilities', function () {

		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes'
		}).then((result) => {
			if (result.value) {
				$('.pre-loader').show();

				let division_id = $(this).attr('data-id');

				$.ajax({
					data: {
						'division_id': division_id,
						'_token': $('input[name="_token"]').val()
					},
					type: 'DELETE',
					url: '/admin/facilities/delete/'+division_id,

					success: function (response) {
						let res = typeof response === 'string' ? JSON.parse(response) : response;

						if (res.result == 'success') {

							Swal.fire({
								text: res.msg,
								type: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok",
								confirmButtonClass: "btn font-weight-bold btn-primary"
							}).then(function () {
								window.location.reload();
							});
						}
						else if (res.result == 'failure') {

							Swal.fire({
								text: "Something went wrong. Please try again.",
								type: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok",
								confirmButtonClass: "btn font-weight-bold btn-light"
							}).then(function () {
								window.location.reload();
							});
						}

						$('.pre-loader').hide();
					},

					error: function (error) {

					}
				});
			}
		});
	});
});