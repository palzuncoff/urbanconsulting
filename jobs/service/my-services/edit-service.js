$(document).ready(function() {
	$ = jQuery;

	var id = $_GET('id');
	if(!id.lenght) {
		//alert('No id insert');
		//return;
	}

	$.ajax({
		type: "GET",
		url: "/jobs/service/my-services/edit-service.php",
		async: true,
		cache: false,
		contentType: false,
		processData: false,
		data: 'id='+id,
		success: function(data) {
			console.log(data);
			var obj = JSON.parse(data);
			if(obj.error === undefined) {
				var src = stockPhotoUrl;
				if(obj.has_photo) {
					src = "https://urbanconsulting.md/serv_data/users/"+obj.wp_username+"/"+id+".jpg?"+(new Date()).getTime();
				}

				$(".serv-photo img").attr("src", src);
				$("#serv-form input[name='serv-id']").val(id);
				$("#serv-form input[name='serv-name']").val(obj.name);
				$("#serv-form textarea[name='serv-info']").html(obj.info);
				$("#serv-form select[name='serv-category'] option[value='"+obj.category+"']").prop('selected', true);

					switch(parseInt(obj.state)) {
						case 0: {
							$("#serv-status0").css("display", "block");
							break;
						}
						
						case 1: {
							$("#serv-status1").css("display", "block");
							break;
						}
						
						case 2: {
							$("#serv-status2").css("display", "block");
							$("#serv-status2").append(" Причина: "+obj.msg);
							break;
						}
					}
					
				indexToPopulate("serv-country", "serv-city", obj.country, obj.city);
				toggleForm("#serv-form", true);
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

$('#serv-photo').change(function() {
	var reader = new FileReader();
	reader.onload = function (e) {
		$('.photo-profile img').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
});

$("#serv-form").submit(function(e) {
	e.preventDefault();

	if($("#serv-form #serv-country").val() == -1) {
		alert("Ошибка: Необходимо выбрать страну.");
		return;
	}
	
	if($("#serv-form #serv-city").val() == -1) {
		alert("Ошибка: Необходимо выбрать город.");
		return;
	}
	
	if(!validateForm("#serv-form")) {
		alert("Ошибка: Данные в форме заполнены неправильно.");
		return;
	}
	
	var photo = document.getElementById('serv-photo');
	if(photo.files.lenght) {
		if(photo.files[0].size > 500000) {
			alert("Ошибка: Изображение не должно превышать размер в 500кб.");
			return;
		}
	}
	
	var formData = new FormData($(this)[0]);
	toggleForm("#serv-form", false);
	
	$.ajax({
		type: "POST",
		url: "/jobs/service/my-services/edit-service.php",
		data: formData,
		async: true,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			var obj = JSON.parse(data);
			if(obj.error === undefined) {
				location.reload();
			} 
			else {
				alert("Ошибка: "+obj.error);
				toggleForm("#serv-form", true);
				console.log(obj);
			}
		},
		error: function(error) {
			alert("Ошибка при отправке данных. "+error.status+": "+error.statusText);
			toggleForm("#serv-form", true);
		}
	});
});