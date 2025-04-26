$(document).ready(function () {
  // DataTable init
  $("#festival_datatable").DataTable();

  // View Image
  $(".view_image").click(function () {
    var imagePath = $(this).data("image");
    $("#modalImage").attr("src", imagePath);
    $("#imageModal").modal("show");
  });

  // Handle "Select All"
  $("#select_all").on("click", function () {
    $(".select_item").prop("checked", this.checked);
    toggleDeleteSelectedButton();
  });

  // Handle individual checkbox click
  $(document).on("click", ".select_item", function () {
    if ($(".select_item:checked").length == $(".select_item").length) {
      $("#select_all").prop("checked", true);
    } else {
      $("#select_all").prop("checked", false);
    }
    toggleDeleteSelectedButton();
  });

  // Enable/Disable Delete Selected Button
  function toggleDeleteSelectedButton() {
    if ($(".select_item:checked").length > 0) {
      $("#delete_selected").prop("disabled", false);
    } else {
      $("#delete_selected").prop("disabled", true);
    }
  }

  // Delete Selected
  $("#delete_selected").on("click", function () {
    var selectedIds = $(".select_item:checked")
      .map(function () {
        return $(this).val();
      })
      .get();

    if (selectedIds.length === 0) {
      Swal.fire("Please select at least one image.");
      return;
    }

    Swal.fire({
      title: "Are you sure?",
      text: "Selected images will be deleted!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete!",
    }).then((result) => {
      if (result.value) {
        $(".pre-loader").show();
        $.ajax({
          url: "/admin/scout-&-guide/delete-multiple",
          type: "POST",
          data: {
            _token: $('input[name="_token"]').val(),
            ids: selectedIds,
          },
          success: function (response) {
            if (response.result == "success") {
              Swal.fire("Deleted!", response.msg, "success").then(function () {
                window.location.reload();
              });
            } else {
              Swal.fire("Error!", response.msg, "error");
            }
            $(".pre-loader").hide();
          },
          error: function () {
            Swal.fire("Error!", "Something went wrong.", "error");
            $(".pre-loader").hide();
          },
        });
      }
    });
  });

  // Delete Single
  $(document).on("click", ".delete_banner", function () {
    let banner_id = $(this).data("id");

    Swal.fire({
      title: "Are you sure?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes",
    }).then((result) => {
      if (result.value) {
        $(".pre-loader").show();
        $.ajax({
          url: "/admin/scout-&-guide/delete/" + banner_id,
          type: "DELETE",
          data: {
            _token: $('input[name="_token"]').val(),
          },
          success: function (response) {
            if (response.result == "success") {
              Swal.fire("Deleted!", response.msg, "success").then(function () {
                window.location.reload();
              });
            } else {
              Swal.fire("Error!", "Something went wrong.", "error");
            }
            $(".pre-loader").hide();
          },
          error: function () {
            Swal.fire("Error!", "Something went wrong.", "error");
            $(".pre-loader").hide();
          },
        });
      }
    });
  });
});
