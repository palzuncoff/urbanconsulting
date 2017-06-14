function requestData(page, count) {
	var
		country = document.getElementById('vac-country').value,
		city = document.getElementById('vac-city').value,
		category = document.getElementById('vac-category').value,
		qual = $('#vac-qual').is(':checked') ? 1 : -1,
		unqual = $('#vac-unqual').is(':checked') ? 1 : -1,
		photoSrc,
		pagesBlock = "",
		itemBlock
	;
	
	toggleForm("#vac-form", false);
	$("#vac-append").empty();
	$("#vac-append").append('<img src="/img/loading.svg" alt="" />');
	
	$.ajax({
		type: "GET",
		url: "/jobs/vacancy/vac-list/vac-list.php",
		data: "&page="+page+"&count="+count+"&country="+country+"&city="+city+"&category="+category+"&qual="+qual+"&unqual="+unqual,
		async: true,
		cache: false,
		contentType: false,
		processData: false,
		success: function(response) {
			var json = JSON.parse(response);
			$("#vac-append").empty();
			if(json.error === undefined) {
				if(json.data === null) {
					$("#vac-append").append("Нет данных");
				} else {
					
					if(json.data.pagination.totalPages > 1) {
						pagesBlock = "<div id=\"pages\">";
						for(var i = 1; i <= json.data.pagination.totalPages; ++i) {
							pagesBlock += "<a href=\"javascript:void(0);\" onclick=\"requestData("+i+",10);\">"+i+"</a>"
						}
						pagesBlock += "</div>";
					}
							
					$("#vac-append").append(pagesBlock);
					
					json.data.items.forEach(function(item) {
						photoSrc = (item.has_photo) ? 
							"https://urbanconsulting.md/vac_data/users/"+item.wp_username+"/"+item.id+".jpg" :
							"https://urbanconsulting.md/wp-content/uploads/2017/03/camera.png";
							
						itemBlock = '\
						<li class="cf">\
							<div class="col-4 my-vacancyes__image">\
								<img src="'+photoSrc+'" alt="">\
							</div>\
							<div class="col-8">\
								<div class="col-12 my-vacancyes__title">\
									<h3>'+item.name+'</h3>\
								</div>\
								<div class="col-12 my-vacancyes__description">\
									<p class="country">Страна: '+getCountryName(item.country)+'</p>\
									<p class="country">Город: '+getCityName(item.country, item.city)+'</p>\
									<p class="description">'+item.info+'</p>\
								</div>\
								<div class="col-12 ul-info cf more-btn">\
									<div class="col-6">\
										<p class="date-bot-left">'+item.date+'</p>\
									</div>\
									<div class="col-6">\
										<a href="https://urbanconsulting.md/job/job-list/view-vac?id='+item.id+'" target="_blank"><input id="test" class="btn-vacancyes more-link" type="submit" value="Подробнее"></a>\
									</div>\
								</div>\
							</div>\
						</li>';
						
						$("#vac-append").append(itemBlock);
					});
					
					$("#vac-append").append(pagesBlock);
				}
			} else {
				$("#vac-append").append("Ошибка: "+obj.error);
			}
			
			toggleForm("#vac-form", true);
		},
		error: function(error) {
			$("#vac-append").empty();
			$("#vac-append").append("Ошибка при получении данных. ("+error.status+": "+error.statusText+")");
			toggleForm("#vac-form", true);
		}
	});
}

$(document).ready(function() {
	$ = jQuery;
	populateCountries("vac-country", "vac-city");

	requestData(1, 10);
});

$("#vac-form").submit(function(e) {
	e.preventDefault();

	requestData(1, 10);
});