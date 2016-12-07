$(document).on("click", ".btn-upload-image", function () {
     var id = $(this).data('id');
     $("#image-upload-form #id").val(id);
     var dependence = $(this).data('dependence');
     $("#image-upload-form #dependence").val(dependence);

});

$("#form-upload-image").submit(function(event){	
	event.preventDefault();
	$('#success').html('');
   	var formData = new FormData($(this)[0]);
    	$.ajax({
        	url: "/lar/server.php/upload",
        	type: 'POST',
        	data: formData,
        	async: false,
        	success: function (data) {
            		$('#success').html(data['response']);
        	},
		error: function (data) {
            		$('#success').html(data['responseText']);		 	
		},
        	cache: false,
        	contentType: false,
        	processData: false
    	});
});
