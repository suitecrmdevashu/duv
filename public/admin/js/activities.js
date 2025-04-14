$(document).ready(function(){
	
	// Datatable
	if($(document).find('#activites_datatable').length > 0){
		// alert('hi');
		$('#activites_datatable').DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			searching: true,
			ajax: {
				url: '/admin/activites'
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
					data: 'date',
					name: 'date',
					className: 'text-center',
					render: function(data, type, row) {
						if (type === 'display' || type === 'filter') {
							var dateObj = new Date(data);
							var day = dateObj.getDate().toString().padStart(2, '0');
							var month = (dateObj.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-based
							var year = dateObj.getFullYear().toString().slice(-2);
							return day + '-' + month + '-' + year;
						}
						return data;
					}
				},
                {
					data: 'activity',
					name: 'activity',
					className: "text-center",
					render: function (data, type, row) {
						if (type === 'display' || type === 'filter') {
							// Create a temporary element
							var tempElement = $('<div></div>');
				
							// Set its HTML content to the CKEditor data
							tempElement.html(data);
				
							// Get the text content without HTML tags
							return tempElement.text();
						}
						return data;
					}
				},
				{
					data: 'status',
					name: 'status',
					className: "text-center"
				},
				{
					data: 'action',
					name: 'action',
					className: "text-center",
					orderable: false
				}
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
	$('#create_activites_form, #edit_activites_form').validate({
		rules: {
			name: {
				required: true,
				maxlength: 300,
				alpha: true,
			},
			date: {
				required: true,
			},
            activity: {
                maxlength: 300,
				required: true,
			},
			status: {
				required: true,
			},
			
		},
		messages: {
			name: {
				required: "Please enter celebration name",
				maxlength: "Celebration name should not be more than 50 characters",
				alpha: "Please enter valid input",
			},
			date: {
				required: 'Please select date',
			},
            activity: {
				required: "Please enter activity name",
				maxlength: "Activity name should not be more than 50 characters",
				alpha: "Please enter valid input",
			},

			status: {
				required: 'Please select status',
			},
		},
		errorPlacement: function (error, element) {
			if (element.attr("name") == "logo") {
				// custom error placement
				$(element).closest('.form-group').find('.common-error').html(error.text());
			}
			else {
				// default error placement
				element.after(error);
			}
		}
	});

	$('#create_activites_form').on('submit', function(e){
		e.preventDefault();
		$('.common-error').empty();

		if($('#create_activites_form').valid()){

			$('.pre-loader').show();

			$.ajax({
				data: new FormData($('#create_activites_form')[0]),
				cache: false,
				processData: false,
    			contentType: false,
				type: 'post',
				url: "/admin/activites/store",
				success: function(response){
					var res = response;
					if(res.result == 'success'){
						
						Swal.fire({
			                text: "Activity created.",
			                type: 'success',
			                buttonsStyling: false,
			                confirmButtonText: "Ok",
			                confirmButtonClass: "btn font-weight-bold btn-primary"
			            }).then(function() {
							window.location = '/admin/activites';
						});
						
						 $('#create_activites_form')[0].reset();
					}
					else if(res.result == 'error'){
						let error_msgs = res.msg;
						for(let key in error_msgs){
							if(error_msgs.hasOwnProperty(key)){
								$('#create_activites_form').find('.'+key+'_error').html(error_msgs[key][0]);
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
	$('#edit_activites_form').on('submit', function(e){
        e.preventDefault();
        $('.common-error').empty();
    
        if ($(this).valid()) {
    
            $('.pre-loader').show();
    
            $.ajax({
                data: new FormData($(this)[0]),
                type: 'post',
                url: "/admin/activites/update",
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    let res = response;
    
                    if (res.result == 'success') {
    
                        Swal.fire({
                            text: "Activity Updated.",
                            type: 'success',
                            buttonsStyling: false,
                            confirmButtonText: "Ok",
                            confirmButtonClass: "btn font-weight-bold btn-primary"
                        }).then(function() {
                            window.location = '/admin/activites';
                        });
    
                        $('#edit_activites_form')[0].reset();
                    } else if (res.result == 'error') {
                        let error_msgs = res.msg;
                        for (let key in error_msgs) {
                            if (error_msgs.hasOwnProperty(key)) {
                                $('#edit_activites_form').find('.' + key + '_error').html(error_msgs[key][0]);
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
    
                    $('.pre-loader').hide();
                },
    
                error: function(error) {
    
                }
            });
        }
    });
    
    
	
	$(document).on('click', '.delete_activites', function () {

		Swal.fire({
			title: 'Are you sure?',
			// text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes'
		}).then((result) => {
			if (result.value) {
				$('.pre-loader').show();

				let festival_id = $(this).attr('data-id');
					
				$.ajax({
					data: {
						'festival_id': festival_id,
						'_token': $('input[name="_token"]').val()
					},
					type: 'DELETE',
					url: '/admin/activites/delete/'+festival_id,

					success: function (response) {
						let res = response;

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