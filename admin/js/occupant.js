// $(document).ready(function() {
//     $(".submit-button").click(function() {
//         var form = $(this).closest('form');
//         var formData = form.serialize();
//         var updateButton = $("#updateButton");
//         var loader = updateButton.find('.loader');

//         updateButton.prop("disabled", true);
//         updateButton.find(".update-label").hide();
//         loader.show();

//         $.ajax({
//             type: "POST",
//             url: form.attr("action"),
//             data: formData,
//             success: function(response) {
//                 var trimmedResponse = $.trim(response);

//                 updateButton.prop("disabled", false);
//                 loader.hide();
//                 updateButton.find(".update-label").show();

//                 if (trimmedResponse === "success") {
//                     Swal.fire({
//                         title: 'Success',
//                         text: 'Info Successfully Updated',
//                         icon: 'success'
//                     }).then(function() {
//                         // Refresh the page
//                         location.reload();
//                     });
//                 } else {
//                     Swal.fire({
//                         title: 'Error',
//                         text: response,
//                         icon: 'error'
//                     });
//                 }
//                 $("#response").html(response);
//             }
//         });
//     });
// });


