$(document).ready(function() {
	$ = jQuery;
	
	var id = $_GET('id');
	if(!id.length) {
		alert("Ошибка: Параметры заданы неверно");
		return;
	}
	
	$.ajax({
		type: "GET",
		url: "/jobs/service/about-serv/about-serv.php",
		async: true,
		cache: false,
		contentType: false,
		processData: false,
		data: "id="+id,
		success: function(data) {
			console.log(data);
			var obj = JSON.parse(data);
			if(obj.error === undefined) {
				var photo_src = stockPhotoUrl;
				if(obj.has_photo) {
					photo_src = "https://urbanconsulting.md/serv_data/users/"+obj.wp_username+"/"+id+".jpg?"+(new Date()).getTime();
				}
					
				$(".serv-photo img").attr("src", photo_src);
				$("#serv-form input[name='serv-id']").val(id);
				$("#serv-form input[name='serv-name']").val(obj.name);
				$("#serv-form textarea[name='serv-info']").html(obj.info);
				$("#serv-form select[name='serv-category'] option[value='"+obj.category+"']").prop('selected', true);
				
				indexToPopulate("serv-country", "serv-city", obj.country, obj.city);
				//toggleForm("#serv-form", true);
			}
			else {
				alert("Ошибка: "+obj.error);
			}
		},
		error: function(error) {
			alert("Ошибка при получении данных. "+error.status+": "+error.statusText);
		}
	});
});