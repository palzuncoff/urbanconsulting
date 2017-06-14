function drawData(obj) {
	for(var i = 0; i < obj.data.length; i++) {
		var photo_src = "https://urbanconsulting.md/wp-content/uploads/2017/03/camera.png";
		if(obj.data[i].has_photo) {
			photo_src = "https://urbanconsulting.md/serv_data/users/"+obj.data[i].wp_username+"/"+obj.data[i].id+".jpg?"+(new Date()).getTime();
		}

		var htmlForm = '\
		<li class="cf">\
			<div class="col-4 my-vacancyes__image">\
				<img src="'+photo_src+'" alt="">\
			</div>\
			<div class="col-8">\
				<div class="col-12 my-vacancyes__title">\
					<h3>'+obj.data[i].name+'</h3>\
				</div>\
				<div class="col-12 my-vacancyes__description">\
					<p class="country">Страна: '+getCountryName(obj.data[i].country)+'</p>\
					<p class="country">Город: '+getCityName(obj.data[i].country, obj.data[i].city)+'</p>\
					<p class="description">'+obj.data[i].info+'</p>\
				</div>\
				<div class="col-12 ul-info cf more-btn">\
					<div class="col-6">\
						<p class="date-bot-left">'+obj.data[i].date+'</p>\
					</div>\
					<div class="col-6">\
						<a href="https://urbanconsulting.md/job/services/list/about?id='+obj.data[i].id+'" target="_blank"><input id="test" class="btn-vacancyes more-link" type="submit" value="Подробнее"></a>\
					</div>\
				</div>\
			</div>\
		</li>';

		$("#serv-append").append(htmlForm);
	}
}

$(document).ready(function() {
	$ = jQuery;

	populateCountries("serv-country", "serv-city");

	$.ajax({
		type: "GET",
		url: "/jobs/service/serviceview/serviceview.php",
		async: true,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			var obj = JSON.parse(data);
			$("#serv-append").empty();
			if(obj.error === undefined) {
				console.log(obj);

				if(obj.data === null) {
					$("#serv-append").append("Нет данных");
				}
				else {
					drawData(obj);
				}
			}
			else {
				alert("Ошибка: "+obj.error);
			}
		},
		error: function(error) {
			alert("Ошибка при получении данных. ("+error.status+": "+error.statusText+")");
		}
	});
});

$("#serv-form").submit(function(e) {
	e.preventDefault();

	var country = document.getElementById('serv-country').value;
	var city = document.getElementById('serv-city').value;
	var category = document.getElementById('serv-category').value;

	toggleForm("#serv-form", false);
	$("#serv-append").empty();
	$("#serv-append").append('<img src="/img/loading.svg" alt="" />');

	$.ajax({
		type: "GET",
		url: "/jobs/service/serviceview/serviceview.php",
		data: "&country="+country+"&city="+city+"&category="+category,
		async: true,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			console.log(data);
			var obj = JSON.parse(data);
			$("#serv-append").empty();
			if(obj.error === undefined) {
				if(obj.data === null) {
					$("#serv-append").append("Нет данных");
				}
				else {
					drawData(obj);
				}
			}
			else {
				alert("Ошибка: "+obj.error);
			}
			toggleForm("#serv-form", true);
		},
		error: function(error) {
			alert("Ошибка при получении данных. ("+error.status+": "+error.statusText+")");
			toggleForm("#serv-form", true);
		}
	});
});
