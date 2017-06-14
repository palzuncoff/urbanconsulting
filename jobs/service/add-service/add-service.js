$(document).ready(function() {
	$ = jQuery;

	populateCountries("serv-country", "serv-city");
	toggleForm("#serv-form", true);
});

$(".serv-photo input[name='serv-photo']").change(function() {
	var reader = new FileReader();
	reader.onload = function (e) {
		$('.serv-photo img').attr('src', e.target.result);
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
		url: "/jobs/service/add-service/add-service.php",
		data: formData,
		async: true,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			var obj = JSON.parse(data);
			if(obj.error === undefined) {
				window.history.back();
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